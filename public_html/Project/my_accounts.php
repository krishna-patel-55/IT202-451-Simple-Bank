<?php
    require_once(__DIR__ . "/../../partials/nav.php");
    is_logged_in(true);
    $loanAPY = getRateAPY("loan");
    $savingsAPY = getRateAPY("savings");
    $uid = get_user_id();
 
    if(isset($_POST["submit"])){
        $_SESSION["selected_account"] = se($_POST, "account", "", false);
        redirect("transaction_history.php");
    }

    $db = getDB();
    $stmt = $db->prepare("SELECT id, account_number, balance, account_type, created, modified 
                        FROM Accounts 
                        WHERE user_id = :user_id 
                        ORDER BY modified desc");
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
            <th>APY</th>
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
                            <td>$<?php if($account["account_type"] == "loan"){
                                            if($account["balance"] == 0){
                                                echo ($account["balance"]);
                                            }
                                            else{
                                                echo ($account["balance"]*-1);
                                            }
                                        }
                                        else{
                                            se($account, "balance");  
                                        } 
                                ?>
                            </td>
                            <td><?php if($account["account_type"] == "loan"){
                                        se($loanAPY); echo "%";
                                    }   
                                    else if($account["account_type"] == "savings"){
                                        se($savingsAPY); echo "%";
                                    }
                                    else{
                                        echo "-";
                                    }
                                ?>
                            </td>
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