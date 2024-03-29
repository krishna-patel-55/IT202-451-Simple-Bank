<?php
    require_once(__DIR__ . "/../../partials/nav.php");
    is_logged_in(true);
    $user_id = (int)se($_GET, "id", get_user_id(), false);
    $isMe = $user_id == get_user_id();
    $isEdit = isset($_GET["edit"]);
    $db = getDB();
?>
<?php
    if (isset($_POST["save"]) && $isMe && $isEdit) {
        $firstname = se($_POST, "firstname", null, false);
        $lastname = se($_POST, "lastname", null, false);
        $email = se($_POST, "email", null, false);
        $username = se($_POST, "username", null, false);
        $vis = isset($_POST["vis"]) ? 1 : 0;
        $stmt = $db->prepare("UPDATE Users 
                              SET email = :email, username = :username, 
                                  firstname = :firstname, lastname = :lastname, 
                                  visibility = :vis 
                              WHERE id = :id");

        $params = [":email" => $email, ":username" => $username, ":id" => get_user_id(), 
                   ":firstname" => $firstname, ":lastname" => $lastname, ":vis" => $vis];
        try {
            $stmt->execute($params);
            flash("Profile saved", "success");
        } 
        catch (Exception $e) {
            if ($e->errorInfo[1] === 1062) {
                //https://www.php.net/manual/en/function.preg-match.php
                preg_match("/Users.(\w+)/", $e->errorInfo[2], $matches);
                if (isset($matches[1])) {
                    flash("The chosen " . $matches[1] . " is not available.", "warning");
                } 
                else {
                    //TODO come up with a nice error message
                    echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
                }
            } 
            else {
                //TODO come up with a nice error message
                echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
            }
        }

        //check/update password
        $current_password = se($_POST, "currentPassword", null, false);
        $new_password = se($_POST, "newPassword", null, false);
        $confirm_password = se($_POST, "confirmPassword", null, false);
        if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
            if ($new_password === $confirm_password) {
                //TODO validate current
                $stmt = $db->prepare("SELECT password from Users where id = :id");
                try {
                    $stmt->execute([":id" => get_user_id()]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    if (isset($result["password"])) {
                        if (password_verify($current_password, $result["password"])) {
                            $query = "UPDATE Users set password = :password where id = :id";
                            $stmt = $db->prepare($query);
                            $stmt->execute([":id" => get_user_id(),
                                            ":password" => password_hash($new_password, PASSWORD_BCRYPT)]);
                            flash("Password reset", "success");
                        } 
                        else {
                            flash("Current password is invalid", "warning");
                        }
                    }
                } 
                catch (Exception $e) {
                    echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
                }
            } 
            else {
                flash("New passwords don't match", "warning");
            }
        }
    }
        //select fresh data from table
    $stmt = $db->prepare("SELECT id, email, username, firstname, lastname, visibility, created 
                            FROM Users 
                            WHERE id = :id 
                            LIMIT 1");
    $isVisible = false;
    try {
        $stmt->execute([":id" => $user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if ($isMe) {
                $_SESSION["user"]["email"] = $user["email"];
                $_SESSION["user"]["username"] = $user["username"];
                $_SESSION["user"]["firstname"] = $user["firstname"];
                $_SESSION["user"]["lastname"] = $user["lastname"];
            }
            if (se($user, "visibility", 0, false) > 0) {
                $isVisible = true;
            }
            $email = se($user, "email", "", false);
            $username = se($user, "username", "", false);
            $firstname = se($user, "firstname", "", false);
            $lastname = se($user, "lastname", "", false);
            $joined = se($user, "created", "", false);
        } 
        else {
            flash("User doesn't exist", "danger");
        }
    } 
    catch (Exception $e) {
        flash("An unexpected error occurred, please try again", "danger");
        //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
    }
        
?>
<div class="container-fluid">
    <h1>Profile</h1>
    <?php if ($isMe && $isEdit) : ?>
        <?php if ($isMe) : ?>
            <div style="text-align:right">
                <a href="<?php echo get_url("profile.php"); ?>">View</a>
            </div>
        <?php endif; ?>
        <form method="POST" onsubmit="return validate(this);">
            <div style="text-align:left">
                    <div>
                        <label class="form-check-label" for="vis">Toggle Visibility</label>
                    </div>
                    <div style="text-align:left" class="form-check form-switch">
                        <input <?php if ($isVisible) {echo "checked";} ?> 
                            class="form-check-input" type="checkbox" role="switch" id="vis" name="vis">
                    </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="firstname">First Name</label>
                <input class="form-control" type="text" name="firstname" id="firstname" value="<?php se($firstname); ?>" />
            </div>
            <div class="mb-3">    
                <label class="form-label" for="lastname">Last Name</label>
                <input class="form-control" type="text" name="lastname" id="lastname" value="<?php se($lastname); ?>" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php se($email); ?>" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" type="text" name="username" id="username" value="<?php se($username); ?>" />
            </div>
            <!-- DO NOT PRELOAD PASSWORD -->
            <h3 class="mb-3">Password Reset</h3>
            <div class="mb-3">
                <label class="form-label" for="cp">Current Password</label>
                <input class="form-control" type="password" name="currentPassword" id="cp" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="np">New Password</label>
                <input class="form-control" type="password" name="newPassword" id="np" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="conp">Confirm Password</label>
                <input class="form-control" type="password" name="confirmPassword" id="conp" />
            </div>
            <input type="submit" class="mt-3 btn btn-primary" value="Update Profile" name="save" />
        </form>
    <?php else : ?>
        <?php if ($isMe) : ?>
            <div style="text-align:right">
                <a href="?edit">Edit</a>
            </div>
            <div style="text-align:center">
                <h3><?php se($firstname); echo" "; se($lastname); ?></h3>
            </div>
            <div style="text-align:center">
                Email: <?php se($email); ?>
            </div>
        <?php endif; ?>
        <?php if ($isVisible || $isMe) : ?>
            <div style="text-align:center">
                <h4>Username: <?php se($username); ?></h3>
            </div>
            <div style="text-align:center">
                Net Worth = $<?php $net_worth = getNetWorth($user_id);
                se($net_worth); ?>
            </div>
            <div style="text-align:center">
                Joined: <?php se($joined); ?>
            </div>
        <?php else : ?>
            <div style="text-align:center">
                <h3>Profile is private</h3>
            </div>
            <?php
                flash("Profile is private", "warning");
                redirect("home.php");
            ?>
        <?php endif; ?>
    <?php endif; ?>
</div>
<script>
    function validate(form) {
        let firstname = form.firstname.value;
        let lastname = form.lastname.value;
        let email = form.email.value;
        let username = form.username.value;

        let cpw = form.currentPassword.value;
        let npw = form.newPassword.value;
        let conpw = form.confirmPassword.value;

        var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        var usernamepattern = /^[a-z0-9_-]{3,16}$/; 

        let isValid = true;
        //TODO add other client side validation....
        if(firstname == ""){
            flash("Please enter your first-name.", "warning");
            isValid = false;
        }
        if(lastname == ""){
            flash("Please enter your last-name.", "warning");
            isValid = false;
        }
        if(email == ""){
            flash("Please enter your email address.", "warning");
            isValid = false;
        }
        if(!emailpattern.test(email)){
            flash("You've entered an invalid email address.", "warning");
            isValid = false;
        }
        if(username == ""){
            flash("Please enter a username.", "warning");
            isValid = false;
        }
        if(!usernamepattern.test(username)){
            flash("Invalid username.", "warning");
            isValid = false;
        }
        
        if (cpw !== "" || npw !== "" || conpw !== "") {
            if(cpw == ""){
                flash("Must enter current password to change password.", "warning");
                isValid = false;
            }
            if(npw !== ""){
                if(npw.length < 8) {
                    flash("Password must be 8 or more characters.", "warning");
                    isValid = false;
                }
                if (npw == cpw){
                    flash("Current password and new password cannot be the same", "warning");
                    isValid = false;
                }
            }
            else {
                flash("Must enter new password to change password.", "warning");
                isValid = false;
            }
            if(conpw !== ""){
                if (npw !== conpw) {
                    flash("Password and Confirm password must match", "warning");
                    isValid = false;
                }
            }
            else{
                flash("Must conform new password to change password.", "warning");
                isValid = false;
            }
        }
        return isValid;
    }
</script>
<?php
    require_once(__DIR__ . "/../../partials/flash.php");
?>