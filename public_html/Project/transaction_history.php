<?php
    require_once(__DIR__ . "/../../partials/nav.php");
    is_logged_in(true);
    $acc_id = se($_SESSION, 'selected_account', null, false);
    $db = getDB();
    $stmt = $db->prepare("SELECT account_number, balance, account_type, created
                        FROM Accounts 
                        WHERE id = :acc_id 
                        LIMIT 1");
    $selected_acc = [];
    try {
        $stmt->execute([":acc_id" => $acc_id]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $selected_acc = $results;
    } catch (PDOException $e) {
        flash("Unable to retreive selected account info", "danger");
        error_log(var_export($e->errorInfo, true));
    }
?>
<?php
    $transactions = [];
    $transactionType = se($_GET, "transactionTypeFilter", "", false);
        if (!in_array($transactionType, ["", "deposit", "ext-transfer", "transfer", "withdraw"])) {
            $transactionType = "";
        }
    $startDate = se($_GET, "startDate", "", false);
    $endDate = se($_GET, "endDate", "", false);

    $base_query = "SELECT Accounts.user_id, Accounts.account_number, account_dest, balance_change, transaction_type, memo, expected_total, Transactions.created 
                FROM Transactions
                INNER JOIN Accounts ON Accounts.id = account_dest";
    $total_query = "SELECT count(1) as total FROM Transactions";

    $query = " WHERE account_src = :acc_id";
    $params = [];
    $params[":acc_id"]= $acc_id;
    if (!empty($startDate) && !empty($endDate)) {
        $query .= " AND Transactions.created BETWEEN :startDate and :endDate"; 
        $params[":startDate"]= $startDate;
        $params[":endDate"]= $endDate;
    }
    if (!empty($transactionType)) {
        $query .= " AND transaction_type = :transaction_type";
        $params[":transaction_type"]= $transactionType;
    }
    $query .= " ORDER BY Transactions.created DESC";
    //paginate function
    $per_page = 10;
    paginate($total_query . $query, $params, $per_page);
  
    $query .= " LIMIT :offset, :count";
    $params[":offset"] = $offset;
    $params[":count"] = $per_page;

    $stmt = $db->prepare($base_query . $query); //dynamically generated query
    //we'll want to convert this to use bindValue so ensure they're integers so lets map our array
    foreach ($params as $key => $value) {
        $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
        $stmt->bindValue($key, $value, $type);
    }
    $params = null; //set it to null to avoid issues

    try {
        $stmt->execute($params);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $transactions = $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching transaction history", "danger");
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
                <th><?php se($selected_acc, "account_number"); ?></th>
                <th><?php se($selected_acc, "account_type"); ?></th>
                <th>$<?php se($selected_acc, "balance"); ?></th>
                <th><?php se($selected_acc, "created"); ?></th>
            </thead>
        </table>
    <h2>Transaction History</h2>    
        <!---------------------------Filters--------------------------->
        <form class="row row-cols-auto g-3 align-items-center">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-text">Transaction Type:</div>
                    <select class="form-control" id="transactionTypeFilter" name="transactionTypeFilter" data="">
                        <option value="">All</option>
                        <option value="deposit">Deposits</option>
                        <option value="ext-transfer">External Transfers</option>
                        <option value="transfer">Transfers</option>
                        <option value="withdraw">Withdrawals</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <div class="input-group-text">Date Range:</div>
                    <input class="form-control" type="date" id="startDate" name="startDate" data="" value="<?php se($_GET, "startDate"); ?>"/>
                    <div class="input-group-text">to</div>
                    <input class="form-control" type="date" id="endDate" name="endDate" data="" value="<?php se($_GET, "endDate"); ?>"/>
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <input type="submit" class="btn btn-primary" value="Apply" />
                </div>
            </div>
        </form>
        <!---------------------------end filters--------------------------->
        <table id="filteredTransactionTable" class="table">
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
                            <td><?php se($selected_acc, "account_number");?></td>
                            <td>
                                <?php
                                    if ($transaction["user_id"] != -1)
                                    {
                                        $user_acc_id = se($transaction, "user_id", 0, false);
                                        $user_acc_num = se($transaction, "account_number", "", false);
                                        include(__DIR__ . "/../../partials/profile_link.php"); 
                                    }
                                    else 
                                    {
                                        se($transaction, "account_number"); 
                                    }
                                ?>
                            </td>
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
</div>
<?php
require_once(__DIR__ . "/../../partials/pagination.php");
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");
?>