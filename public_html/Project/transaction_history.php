<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
$acc_id = $_POST['view_accId'];
$acc_num = $_POST['view_accNum'];
$acc_type = $_POST['view_accType'];
$acc_created = $_POST['view_accCreated'];
$acc_bal = $_POST['view_accBal'];
$db = getDB();
$stmt = $db->prepare("SELECT Accounts.account_number,
                            balance_change, transaction_type, memo, expected_total, Transactions.created 
                    FROM Transactions 
                    INNER JOIN Accounts ON Accounts.id = Transactions.account_dest
                    WHERE account_src = :acc_id 
                    ORDER BY Transactions.created DESC LIMIT 10;");
$transactions = [];
try {
    $stmt->execute([":acc_id" => $acc_id]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $transactions = $results;
} catch (PDOException $e) {
    flash("Unable to retreive transaction history", "danger");
    error_log(var_export($e->errorInfo, true));
}
?>
<div class="container-fluid">
<h1>Transactions</h1>
<h2>Account</h2>
    <table class="table">
        <thead>
            <th>Account #</th>
            <th>Account Type</th>
            <th>Current Balance</th>
            <th>Created</th>
        </thead>
        <thead>
            <th><?php echo $acc_num; ?></th>
            <th><?php echo $acc_type; ?></th>
            <th>$<?php echo $acc_bal; ?></th>
            <th><?php echo $acc_created; ?></th>
        </thead>
    </table>
<h2>Transaction History</h2>
    <table class="table">
        <thead>
            <th>Account Src. #</th>
            <th>Account Dest. #</th>
            <th>Transaction Type</th>
            <th>Amount</th>
            <th>Occurence</th>
            <th>Expected Total</th>
            <th>Memo</th>
        </thead>
        <tbody>
        <?php if (empty($transactions)) : ?>
                <tr>
                    <td colspan="100%">No Transaction History</td>
                </tr>
            <?php else : ?>
                <?php foreach ($transactions as $transaction) : ?>
                    <tr>
                        <td><?php echo $acc_num; ?></td>
                        <td><?php se($transaction, "account_number"); ?></td>
                        <td><?php se($transaction, "transaction_type"); ?></td>
                        <td>$<?php se($transaction, "balance_change"); ?></td>
                        <td><?php se($transaction, "created"); ?></td>
                        <td>$<?php se($transaction, "expected_total"); ?></td>
                        <td><?php se($transaction, "memo"); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");
?>