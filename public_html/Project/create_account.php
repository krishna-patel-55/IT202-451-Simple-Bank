<?php
    require_once(__DIR__ . "/../../partials/nav.php");
    is_logged_in(true);
    $savingsRate = getRateAPY("savings");
    $loansRate = getRateAPY("loan");
    $uid = get_user_id();
    $db = getDB();
    $stmt = $db->prepare("SELECT id, account_number, account_type, balance
                        FROM Accounts 
                        WHERE user_id = :user_id");
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
    <h1>Create Account</h1>
    <form onsubmit="return validate(this)" method="POST">
        <div class="mb-3">
            <label for="accountTypeSelection" >Account Type</label>
            <select name="accountTypeSelection" onchange="displayFields(this.value);" class="form-select">
                <option value='' selected>Select Account Type</option>
                <option value="checking">Checking</option>
                <option value="savings">Savings</option>
                <option value="loan">Loan</option>
            </select>
        </div>
        <div class="mb-3">
            <label id="rate"></label>
        </div>
        <div style="display:none" id="loanDepositAccount" class="mb-3">
            <label for="loanDepositAccount">Deposit Account:</label>
                <select name="loanDepositAccount" class="form-select">
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
            <label for="amount">Amount:</label>
            <input type="number" class="form-control" name="amount" id="amount" placeholder="$">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3" name="save">Create</button>
        </div>
    </form>
</div>
<script>
    function displayFields(selected){
        let rateDiv = document.getElementById("rate");
        let loanDiv = document.getElementById("loanDepositAccount");
        if(selected == "savings"){
            rateDiv.textContent = "The APY for a savings account is: <?php echo $savingsRate?>%";
            loanDiv.style.display = "none";
        }
        else if(selected == "loan"){
            rateDiv.textContent = "The APY for a loan is: <?php echo $loansRate?>%";
            loanDiv.style.display = "block";
        }
        else{
            document.getElementById("rate").textContent = "";
            loanDiv.style.display = "none";
        }
    }
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        let isValid = true;
        let accountType = form.accountTypeSelection;
        let amount = form.amount.value;
        if(accountType.selectedIndex == 0){
            flash("Please select an account type.", "warning");
            isValid = false;
        }
        if(amount < 5 && accountType.value != "loan"){
            flash("A minimum of $5 must be depositied.", "warning");
            isValid = false;
        }
        if(accountType.value == "loan"){
            let loanDepositAccount = form.loanDepositAccount;
            if(loanDepositAccount.selectedIndex == 0){
                flash("Please select an account to deposit into.", "warning");
                isValid = false;
            }
            if(amount < 500){
                flash("A minimum of $500 is required.", "warning");
                isValid = false;
            }
        }
        
        return isValid;
    }
</script>
<?php
    /*
    UCID: kp55
    Date: 07/19/2022
    Site: https://stackoverflow.com/questions/13169025/generate-a-random-number-with-pre-defined-length-php
    Who: User: 'Ry-' 
    Purpose: Function to generate a 12 digit account number
    Why: Was unable to produce a method for which a random 12 digit number would include the possibility of leading 0's.
    */
    function generateAccountNumber(){
        $genAccNum = '';
        for($i = 0; $i < 12; $i++) {
            $genAccNum .= mt_rand(0, 9);
        }
        return $genAccNum;
    }

    //TODO 2: add PHP Code
    if(isset($_POST["accountTypeSelection"]) && isset($_POST["amount"])){
        $accountTypeSelection = se($_POST, "accountTypeSelection", "", false);
        $amount = se($_POST, "amount", "", false);
        $loanDepositAccount = se($_POST, "loanDepositAccount", "",false);
        //TODO 3: validate/use
        $hasError = false;
        if($accountTypeSelection == ''){
            flash("An account type must be selected.");
            $hasError = true;
        }
        if ($amount < 5 && $accountTypeSelection != "loan") {
            flash("A minimum deposit of $5 must be made.");
            $hasError = true;
        }
        if ($accountTypeSelection == "loan") {
            if($loanDepositAccount == ''){
                flash("An account must be selected in order to deposit.");
                $hasError = true;
            }
            if($amount < 500) {
                flash("A minimum of $500 is required.");
                $hasError = true;
            }
        }
        if(!$hasError){
            $user_id = get_user_id();
            //TODO 4 - create account number
            $accountNumber = generateAccountNumber(); //12 digit account number
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO Accounts (account_number, user_id, account_type) VALUES(:accountNumber, :user_id, :accountTypeSelection)");
            try {
                $r = $stmt->execute([":accountNumber" => $accountNumber, ":user_id" => $user_id, ":accountTypeSelection" => $accountTypeSelection]);
                if($r){
                    $account_id = $db->lastInsertId();
                    if($accountTypeSelection == "checking" || $accountTypeSelection == "savings"){
                        $conTransaction = make_transaction(-1, $account_id, $amount, "deposit", "new account created");
                        if($conTransaction){
                            flash("Account Successfully Created!", "success");
                            redirect("./my_accounts.php");
                        }
                    }
                    if($accountTypeSelection == "loan"){
                        $conTransaction = make_transaction($account_id, $loanDepositAccount, $amount, "deposit", "new account created");
                        if($conTransaction){
                            flash("Loan Successfully Granted!", "success");
                            redirect("./my_accounts.php");
                        }
                    }
                }
                else{
                    flash("An error occured while creating your account.", "danger");
                    $err = $stmt->errorInfo();
                    error_log(var_export($err, true));
                }
            } catch (Exception $e) {
                error_log(var_export($e, true));
            }
        }
    }
?>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");
?>