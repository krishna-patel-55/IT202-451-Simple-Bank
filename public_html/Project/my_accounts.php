<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
$uid = get_user_id();
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
                    <form method="POST" action="transaction_history.php">
                    <tr>
                        <td><?php se($account, "account_number"); ?></td>
                        <td><?php se($account, "account_type"); ?></td>
                        <td><?php se($account, "modified"); ?></td>
                        <td>$<?php se($account, "balance"); ?></td>
                        <td>
                            <input type="hidden" name="view_accId" value="<?php se($account, 'id'); ?>" />
                            <input type="hidden" name="view_accCreated" value="<?php se($account, 'created'); ?>" />
                            <input type="hidden" name="view_accNum" value="<?php se($account, "account_number"); ?>"/>
                            <input type="hidden" name="view_accType" value="<?php se($account, "account_type"); ?>"/>
                            <input type="hidden" name="view_accBal" value="<?php se($account, "balance"); ?>"/>
                            <input class="btn btn-primary" type="submit" value="VIEW" />
                        </td>
                    </tr>
                    </form>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");
?>