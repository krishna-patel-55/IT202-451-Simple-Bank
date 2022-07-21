<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
$uid = get_user_id();
$db = getDB();
$stmt = $db->prepare("SELECT account_number, balance, account_type, modified 
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
                    <tr>
                        <td><?php se($account, "account_number"); ?></td>
                        <td><?php se($account, "account_type"); ?></td>
                        <td><?php se($account, "modified"); ?></td>
                        <td>$<?php se($account, "balance"); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");
?>