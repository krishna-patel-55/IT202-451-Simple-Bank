<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>
<div class="container-fluid">
    <h1>Create Account</h1>
    <form onsubmit="return validate(this)" method="POST">
        <div class="mb-3">
            <label for="accountTypeSelection" >Account Type</label>
            <select name="accountTypeSelection" class="form-select">
                <option value='' selected>Select Account Type</option>
                <option value="checking">Checking</option>
                <option value="savings">Savings</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="initialDeposit">Balance Amount:</label>
            <input type="number" class="form-control" name="initialDeposit" id="initialDeposit" placeholder="minimum $5">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3" name="save">Create Account</button>
    </div>
    </form>
</div>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        let isValid = true;
        let accountType = form.accountTypeSelection;
        let initialDeposit = form.initialDeposit.value;
        if(accountType.selectedIndex == 0){
            flash("Please select an account type.", "warning");
            isValid = false;
        }
        if(initialDeposit < 5){
            flash("A minimum of $5 must be depositied.", "warning");
            isValid = false;
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
    if(isset($_POST["accountTypeSelection"]) && isset($_POST["initialDeposit"])){
        $accountTypeSelection = se($_POST, "accountTypeSelection", "", false);
        $initialDeposit = se($_POST, "initialDeposit", "", false);
        //TODO 3: validate/use
        $hasError = false;
        if($accountTypeSelection == ''){
            flash("An account type must be selected.");
            $hasError = true;
        }
        if ($initialDeposit < 5) {
            flash("A minimum deposit of $5 must be made.");
            $hasError = true;
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
                    $conTransaction = make_transaction(-1, $account_id, $initialDeposit, "deposit", "new account created");
                    if($conTransaction){
                        flash("Account Successfully Created!", "success");
                        redirect("./my_accounts.php");
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