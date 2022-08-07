<?php
    require_once(__DIR__ . "/../../partials/nav.php");
    is_logged_in(true);
    $transaction_type = $_GET['type'];
    $uid = get_user_id();
    $db = getDB();
    $stmt = $db->prepare("SELECT id, account_number, account_type, balance
                        FROM Accounts 
                        WHERE user_id = :user_id AND is_active = true
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
    <h1><?php se($transaction_type);?></h1>
    <form onsubmit="return validate(this)" method="POST">
        <div class="mb-3">
            <label for="accountSelection" >Your Accounts</label>
            <select name="accountSelection" class="form-select">
                <?php if (empty($accounts)) : ?>
                    <option value='' disabled selected>No Accounts</option>
                <?php else : ?>
                    <option value='' disabled selected>Account Number | Type | Balance</option>
                    <?php foreach ($accounts as $account) : ?>
                        <option value="<?php se($account, 'id'); ?>">
                            <?php se($account, 'account_number');?>  |  <?php se($account, 'account_type'); ?>  |  $<?php se($account, 'balance'); ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="amount">Amount to <?php se($transaction_type); ?>:</label>
            <input type="number" class="form-control" name="amount" id="amount" step="0.01" placeholder="minimum $1" min="1" max="&infin">
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
        let transactionType = "<?php echo $transaction_type; ?>".toLowerCase();
        let accountSelected = form.accountSelection;
        let amount = form.amount.value;
        if(accountSelected.selectedIndex == 0){
            flash("Please select an account.", "warning");
            isValid = false;
        }
        if(amount <= 0 || amount == ''){
            flash("Please enter an amount.", "warning");
            isValid = false;
        }
        return isValid;
    }
</script>
<?php
    //TODO 2: add PHP Code
    if(isset($_POST["accountSelection"]) && isset($_POST["amount"])) {
        $accountID = se($_POST, "accountSelection", "", false);
        $amount = se($_POST, "amount", "", false);
        $memo = se($_POST, "memo", "", false);
        $accountBal = get_account_balance($accountID);
        $transaction_type = strtolower($transaction_type);
        //TODO 3: validate/use
        $hasError = false;
        if($accountID == '') {
            flash("An account must be selected.");
            $hasError = true;
        }
        if ($amount <= 0) {
            flash("Please enter a valid amount.");
            $hasError = true;
        }
        if ($transaction_type == "withdraw") {
            if($amount > $accountBal) {
                flash("Insufficient funds for this withdrawal amount.");
                $hasError = true;
            }
        }
        elseif($transaction_type == "deposit"){
            if($amount <= 0) {
                flash("Please enter a valid deposit amount");
                $hasError = true;
            }
        }
        if(!$hasError){
            if ($transaction_type == "deposit") {
                try {
                    // Account src losing funds to Account dest
                    $conTransaction = make_transaction(-1, $accountID, $amount, $transaction_type, $memo);
                        if($conTransaction){
                            flash("Deposited Successfully!", "success");
                            redirect("./my_accounts.php");
                        }
                } catch (Exception $e) {
                    flash("Unable to make deposit.", "danger");
                    error_log(var_export($e, true));
                }
            }
            if ($transaction_type == "withdraw") {
                try {
                    // Account dest gaining funds from Account src
                    $conTransaction = make_transaction(-1, $accountID, ($amount*-1), $transaction_type, $memo);
                        if($conTransaction){
                            flash("Withdrawn Successfully!", "success");
                            redirect("./my_accounts.php");
                        }
                } catch (Exception $e) {
                    flash("Unable to make withdrawal.", "danger");
                    error_log(var_export($e, true));
                }
            }
        }
    }
?>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");
?>