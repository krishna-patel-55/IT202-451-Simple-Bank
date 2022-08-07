<?php
    //note we need to go up 1 more directory
    require(__DIR__ . "/../../../partials/nav.php");

    if (!has_role("Admin")) {
        flash("You don't have permission to view this page", "warning");
        die(header("Location: $BASE_PATH" . "home.php"));
    }
    //handle the toggle first so select pulls fresh data
    if (isset($_POST["acc_id"]) && isset($_POST["acctype"])) {
        $acc_id = se($_POST, "acc_id", "", false);
        $acc_type = se($_POST, "acctype", "", false);

        if (!empty($acc_id) && !empty($acc_type)) {
            applyInterest($acc_id, $acc_type);
        }
    }

    //possible future update: select queries for which the 'last_apy_calc' 
    //was more than a month ago from the current timestamp
    //for now: will show all savings or loan accounts that are active
    $query = "SELECT id, account_number, account_type, balance, last_apy_calc, is_active
            FROM Accounts
            WHERE is_active = true
            AND account_type <> 'checking'
            AND id <> -1";
    $params = null;
    if (isset($_POST["type"]) && !empty($_POST["type"])) {
        $select = se($_POST, "type", "", false);
        $query .= " AND account_type = :type";
        $params =  [":type" => $select];
    }
    $query .= " ORDER BY modified";
    $db = getDB();
    $stmt = $db->prepare($query);
    $roles = [];
    try {
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $accounts = $results;
        } else {
            flash("No matches found", "warning");
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

?>
<div class="container-fluid">
    <h1>List Savings and Loan Accounts</h1>
    <form method="POST" class="row row-cols-lg-auto g-3 align-items-center">
        <div class="mb-3">
            <label for="type" >Account Type</label>
            <select name="type" class="form-select">
                <option value=''disabled selected>Select Account Type</option>
                <option value=''>All</option>
                <option value="savings">Savings</option>
                <option value="loan">Loan</option>
            </select>
            <input class="btn btn-primary" type="submit" value="Filter" />
        </div>
    </form>
    <table style="text-align:center" class="table">
        <thead>
            <th>Account #</th>
            <th>Account Type</th>
            <th>Balance</th>
            <th>Last APY Calculation</th>
            <th>Active</th>
            <th>Action</th>
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
                        <td><?php se($account, "balance"); ?></td>
                        <td><?php se($account, "last_apy_calc"); ?></td>
                        <td><?php echo (se($account, "is_active", 0, false) ? "active" : "disabled"); ?></td>
                            <form method="POST">
                                <input type="hidden" name="acc_id" value="<?php se($account, 'id'); ?>" />
                                <input type="hidden" name="acctype" value="<?php se($account, 'account_type'); ?>" />
                                <td>
                                <input class="btn btn-primary" type="submit" value="Calculate" />
                                </td>
                            </form>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php
    //note we need to go up 1 more directory
    require_once(__DIR__ . "/../../../partials/flash.php");
    ?>