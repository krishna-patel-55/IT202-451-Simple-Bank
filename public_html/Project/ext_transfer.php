<?php
    require_once(__DIR__ . "/../../partials/nav.php");
    is_logged_in(true);
    $uid = get_user_id();
    $db = getDB();
    $stmt = $db->prepare("SELECT id, account_number, balance
                        FROM Accounts 
                        WHERE user_id = :user_id
                        AND account_type <> 'loan'");
    $accounts = [];
    try {
        $stmt->execute([":user_id" => $uid]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $accounts = $results;
    } catch (PDOException $e) {
        flash("Unable to retreive accounts", "danger");
        error_log(var_export($e->errorInfo, true));
    }
?>
<div class="container-fluid">
    <h1>External Transfer</h1>
    <form onsubmit="return validate(this)" method="POST">
        <div class="mb-3">
            <h3>Account Source:</h3>
        </div>
        <div class="mb-3">
            <label for="accountSourceSelection" >Your Accounts:</label>
            <select name="accountSourceSelection" class="form-select">
                <?php if (empty($accounts)) : ?>
                    <option value='' disabled selected>No Accounts</option>
                <?php else : ?>
                    <option value='' disabled selected>Account Source Number -- Balance</option>
                    <?php foreach ($accounts as $account) : ?>
                        <option value="<?php se($account, 'id'); ?>">
                            <?php se($account, 'account_number');?> -- $<?php se($account, 'balance'); ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="mb-3">
            <h3>Account Destination:</h3>
        </div>
        <div class="mb-3">
            <label for="accountDestinationLastName" >Last Name:</label>
            <input type="text" class="form-control" name="accountDestinationLastName" id="accountDestinationLastName" placeholder="Type here ...">
        </div>
        <div class="mb-3">
            <label for="accountDestinationDigits" >Last 4 Digits:</label>
            <input type="text" class="form-control" name="accountDestinationDigits" id="accountDestinationDigits" placeholder="Type here ...">
        </div>
        <div class="mb-3">
            <label for="amount">Transfer Amount:</label>
            <input type="number" class="form-control" name="amount" id="amount" placeholder="minimum $1" min="1" max="&infin">
        </div>
        <div class="mb-3">
            <label for="memo">Memo: (optional)</label>
            <input type="text" class="form-control" name="memo" id="memo" placeholder="Type here ...">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3" name="save">Submit</button>
        </div>
    </form>
</div>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        let isValid = true;
        let accountSourceSelected = form.accountSourceSelection;
        let accountDestinationLastName = form.accountDestinationLastName.value;
        let accountDestinationDigits = form.accountDestinationDigits.value;
        let digitpattern = /^\d{4}$/;
        let amount = form.amount.value;
        if(accountSourceSelected.selectedIndex == 0){
            flash("Please select a source account.", "warning");
            isValid = false;
        }
        if(accountDestinationLastName == ""){
            flash("Please enter the last name on the destination account.", "warning");
            isValid = false;
        }
        if(!digitpattern.test(accountDestinationDigits)){
            flash("Please enter valid last 4 digits on the destination account.", "warning");
            isValid = false;
        }
        if(amount <= 0 || amount == ''){
            flash("Please enter a transfer amount.", "warning");
            isValid = false;
        }
        return isValid;
    }
</script>
<?php
    //TODO 2: add PHP Code
    if (isset($_POST["accountSourceSelection"]) && isset($_POST["accountDestinationLastName"]) && isset($_POST["accountDestinationDigits"]) && isset($_POST["amount"])) {
        $accountSrcID = se($_POST, "accountSourceSelection", "", false);
        $accountDestLastName = se($_POST, "accountDestinationLastName", "", false);
        $accountDestDigits = se($_POST, "accountDestinationDigits", "", false);
        $digitpattern = "/^\d{4}$/";
        $amount = se($_POST, "amount", "", false);
        $memo = se($_POST, "memo", "", false);
        $accountSrcBal = get_account_balance($accountSrcID);
        //TODO 3: validate/use
        $hasError = false;
        if(empty($accountSrcID)) {
            flash("A source account must be selected.");
            $hasError = true;
        }
        if(empty($accountDestLastName)) {
            flash("The last name on destination account must be entered.");
            $hasError = true;
        }
        if(empty($accountDestDigits)) {
            flash("The last 4 digits on destination account must be entered.");
            $hasError = true;
        }
        if(!preg_match($digitpattern, $accountDestDigits)) {
            flash("Invalid entry for last 4 digits on destination account.");
            $hasError = true;
        }
        if ($amount <= 0) {
            flash("Please enter a valid amount.");
            $hasError = true;
        }
        if($amount > $accountSrcBal) {
            flash("Insufficient funds for this transfer amount.");
            $hasError = true;
        }
        if(!$hasError) {
            try {
                $accountDestID = getExtTransferAccount($accountDestLastName, $accountDestDigits);
                if($accountDestID == 0){
                    flash("Account with that lastname and/or last 4 digits does not exist");
                }
                else{
                    // Account src losing funds to Account dest
                    $conTransaction = make_transaction($accountSrcID, $accountDestID, $amount, "ext-transfer", $memo);
                    if($conTransaction){
                        flash("Transferred Successfully!", "success");
                    }
                }
            } catch (Exception $e) {
                // flash("Unable to make transfer.", "danger");
                flash("Unable to externally transfer funds", "danger");
                error_log(var_export($e, true));
            }
        }
    }
?>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");
?>