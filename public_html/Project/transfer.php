<?php
    require_once(__DIR__ . "/../../partials/nav.php");
    is_logged_in(true);
    $uid = get_user_id();
    $db = getDB();
    $stmt = $db->prepare("SELECT id, account_number, account_type, balance
                        FROM Accounts 
                        WHERE user_id = :user_id AND is_active = true");
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
    <h1>Internal Transfer</h1>
    <form onsubmit="return validate(this)" method="POST">
        <div class="mb-3">
            <label for="accountSourceSelection" >Accounts Source:</label>
            <select name="accountSourceSelection" class="form-select">
                <?php if (empty($accounts)) : ?>
                    <option value='' disabled selected>No Accounts</option>
                <?php else : ?>
                    <option value='' disabled selected>Account Source Number | Type | Balance</option>
                    <?php foreach ($accounts as $account) : ?>
                        <?php if($account["account_type"] != "loan") :?>
                            <option value="<?php se($account, 'id'); ?>">
                                <?php se($account, 'account_number');?> | <?php se($account, 'account_type'); ?> | $<?php se($account, "balance");?>
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="accountDestinationSelection" >Accounts Destination:</label>
            <select name="accountDestinationSelection" class="form-select">
                <?php if (empty($accounts)) : ?>
                    <option value='' disabled selected>No Accounts</option>
                <?php else : ?>
                    <option value='' disabled selected>Account Destination Number | Type | Balance</option>
                    <?php foreach ($accounts as $account) : ?>
                        <option value="<?php se($account, 'id'); ?>">
                            <?php se($account, 'account_number');?> | <?php se($account, 'account_type'); ?> | 
                            <?php if($account["account_type"] == "loan"){
                                    echo "$";se($account["balance"]*-1);
                                  }
                                  else {
                                    echo "$";se($account, "balance");  
                                  } 
                            ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="amount">Transfer Amount:</label>
            <input type="number" class="form-control" name="amount" id="amount" placeholder="minimum $1" step="0.01" min="1" max="&infin">
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
        let accountDestinationSelected = form.accountDestinationSelection;
        let amount = form.amount.value;
        if(accountSourceSelected.selectedIndex == 0){
            flash("Please select a source account.", "warning");
            isValid = false;
        }
        if(accountDestinationSelected.selectedIndex == 0){
            flash("Please select a destination account.", "warning");
            isValid = false;
        }
        if(accountDestinationSelected.selectedIndex == accountSourceSelected.selectedIndex){
            flash("Please select a different destination account.", "warning");
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
    if (isset($_POST["accountSourceSelection"]) && isset($_POST["accountDestinationSelection"]) && isset($_POST["amount"])) {
        $accountSrcID = se($_POST, "accountSourceSelection", "", false);
        $accountDestID = se($_POST, "accountDestinationSelection", "", false);
        $amount = se($_POST, "amount", "", false);
        $memo = se($_POST, "memo", "", false);
        $accountSrcBal = get_account_balance($accountSrcID);
        $accountLoanBalance = get_account_balance($accountDestID);
        //TODO 3: validate/use
        $hasError = false;
        if($accountSrcID == '') {
            flash("A source account must be selected.");
            $hasError = true;
        }
        if($accountDestID == '') {
            flash("A destination account must be selected.");
            $hasError = true;
        }
        if($accountSrcID == $accountDestID){
            flash("The source and destination account must be different.");
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
        if($accountLoanBalance < 0 ){
            $accountLoanBalance = $accountLoanBalance * -1;
            if($amount > $accountLoanBalance){
                flash("Please enter the exact loan amount to pay off");
                $hasError = true;
            }
        }
        if(!$hasError) {
            try {
                // Account src losing funds to Account dest
                $conTransaction = make_transaction($accountSrcID, $accountDestID, $amount, "transfer", $memo);
                    if($conTransaction){
                        flash("Transferred Successfully!", "success");
                    }
            } catch (Exception $e) {
                flash("Unable to make transfer.", "danger");
                error_log(var_export($e, true));
            }
        }
    }
?>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");
?>