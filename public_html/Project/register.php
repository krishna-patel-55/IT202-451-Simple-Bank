<?php
    require(__DIR__ . "/../../partials/nav.php");
    reset_session();
?>
<div class="container-fluid">
    <h1>Register</h1>
    <form onsubmit="return validate(this)" method="POST">
        <div class="mb-3">
            <label class="form-label" for="firstname">First Name</label>
            <input class="form-control" type="text" id="firstname" name="firstname" value="<?php echo $_POST["firstname"] ?? ""; ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="lastname">Last Name</label>
            <input class="form-control" type="text" id="lastname" name="lastname" value="<?php echo $_POST["lastname"] ?? ""; ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email" value="<?php echo $_POST["email"] ?? ""; ?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" type="text" name="username" required maxlength="30" value="<?php echo $_POST["username"] ?? ""; ?>"/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="pw">Password</label>
            <input class="form-control" type="password" id="pw" name="password" required minlength="8" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="confirm">Confirm</label>
            <input class="form-control" type="password" name="confirm" required minlength="8" />
        </div>
        <input type="submit" class="mt-3 btn btn-primary" value="Register" />
    </form>
</div>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        let isValid = true;
        let fn = form.firstname.value;
        let ln = form.lastname.value;
        let em = form.email.value;
        let un = form.username.value;
        let pw = form.password.value;
        let con = form.confirm.value;
        var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        var usernamepattern = /^[a-z0-9_-]{3,16}$/; 
        if(fn == ""){
            flash("Please enter your first name.", "warning");
            isValid = false;
        }
        if(ln == ""){
            flash("Please enter your last name.", "warning");
            isValid = false;
        }
        if(em == ""){
            flash("Please enter your email address.", "warning");
            isValid = false;
        }
        if(!emailpattern.test(em)){
            flash("You've entered an invalid email address.", "warning");
            isValid =  false;
        }
        if(un == ""){
            flash("Please enter a username.", "warning");
            isValid = false;
        }
        if(!usernamepattern.test(un)){
            flash("You've entered an invalid username.", "warning");
            isValid = false;
        }
        if(pw == ""){
            flash("Please enter a password.", "warning");
            isValid = false;
        }
        if(pw.length < 8){
            flash("Password must be 8 or more characters.", "warning");
            isValid = false;
        }
        if(pw != "" && con == ""){
            flash("Please confirm password", "warning");
            isValid = false;
        }
        if(pw >= 8 && pw !== con){
            flash("Passwords do not match.", "warning");
            isValid = false;
        }
        return isValid;
    }
</script>
<?php
    //TODO 2: add PHP Code
    if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"]) && isset($_POST["username"]) && isset($_POST["firstname"]) && isset($_POST["lastname"])) {
        $firstname = se($_POST, "firstname", "", false);
        $lastname = se($_POST, "lastname", "", false);
        $email = se($_POST, "email", "", false);
        $password = se($_POST, "password", "", false);
        $confirm = se($_POST, "confirm", "", false);
        $username = se($_POST, "username", "", false);
        //TODO 3
        $hasError = false;
        if (empty($firstname)) {
            flash("First-name must not be empty", "danger");
            $hasError = true;
        }
        if (empty($lastname)) {
            flash("Last-name must not be empty", "danger");
            $hasError = true;
        }
        if (empty($email)) {
            flash("Email must not be empty", "danger");
            $hasError = true;
        }
        //sanitize
        $email = sanitize_email($email);
        //validate
        if (!is_valid_email($email)) {
            flash("Invalid email address", "danger");
            $hasError = true;
        }
        if (!is_valid_username($username)) {
            flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "danger");
            $hasError = true;
        }
        if (empty($password)) {
            flash("password must not be empty", "danger");
            $hasError = true;
        }
        if (empty($confirm)) {
            flash("Confirm password must not be empty", "danger");
            $hasError = true;
        }
        if (!is_valid_password($password)) {
            flash("Password too short", "danger");
            $hasError = true;
        }
        if (
            strlen($password) > 0 && $password !== $confirm
        ) {
            flash("Passwords must match", "danger");
            $hasError = true;
        }
        if (!$hasError) {
            //TODO 4
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO Users (email, password, username, firstname, lastname) VALUES(:email, :password, :username, :firstname, :lastname)");
            try {
                $stmt->execute([":email" => $email, ":password" => $hash, ":username" => $username, ":firstname" => $firstname, ":lastname" => $lastname]);
                flash("Successfully registered!", "success");
                redirect("login.php");
            } catch (Exception $e) {
                users_check_duplicate($e->errorInfo);
            }
        }
    }
?>
<?php
    require(__DIR__ . "/../../partials/flash.php");
?>