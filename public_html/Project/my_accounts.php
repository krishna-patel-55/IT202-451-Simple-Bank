<?php
    require_once(__DIR__ . "/../../partials/nav.php");
    is_logged_in(true);
    $uid = get_user_id();
 
    if(isset($_POST["submit"])){
        $_SESSION["selected_account"] = se($_POST, "account", "", false);
        die(header("Location:transaction_history.php"));
    }

    $db = getDB();
    $stmt = $db->prepare("SELECT id, account_number, balance, account_type, created, modified 
                        FROM Accounts 
                        WHERE user_id = :user_id 
                        ORDER BY modified desc LIMIT 5");
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
    <h1>My Accounts</h1>
    <table class="table">
        <thead>
            <th>Account #</th>
            <th>Type</th>
            <th>Modified</th>
            <th>Balance</th>
        </thead>
        <tbody>
            <?php if (empty($accounts)) : ?>
                <tr>
                    <td colspan="100%">No Accounts</td>
                </tr>
            <?php else : ?>
                <?php foreach ($accounts as $account) : ?>
                    <form method="POST">
                        <tr>
                            <td><?php se($account, "account_number"); ?></td>
                            <td><?php se($account, "account_type"); ?></td>
                            <td><?php se($account, "modified"); ?></td>
                            <td>$<?php se($account, "balance"); ?></td>
                            <td>
                                <input type="hidden" name="account" value=<?php se($account, 'id'); ?> />
                                <input class="btn btn-primary" type="submit" name="submit" value="VIEW"/>
                            </td>
                        </tr>
                    </form>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php
?>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");
?>