<?php
function get_account_balance($account_id){
    $db = getDB();
    $stmt = $db->prepare("SELECT balance from Accounts WHERE id = :id");
    try {
        $stmt->execute([":id" => $account_id]);
        $balance = $stmt->fetch(PDO::FETCH_ASSOC);
        return $balance['balance'] ?? 0;
    } catch (Exception $e) {
        flash("Unable to retreive balance amount.", "danger");
        error_log(var_export($e, true));
    }
}
function getNetWorth($user_id){
    $db = getDB();
    $stmt = $db->prepare("SELECT balance from Accounts WHERE user_id = :user_id");
    try {
        $stmt->execute([":user_id" => $user_id]);
        $balances = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($balances) {
            $net_worth = 0;
            $value = 0;
            foreach($balances as $balance)
            {
                $value = (int)$balance["balance"];
                $net_worth += $value;
            }
        }
        else{
            return 0;
        }
        return $net_worth;
    } catch (Exception $e) {
        flash("Unable to retreive balance amount.", "danger");
        error_log(var_export($e, true));
    }
}
function get_user_account_ids($user_id){
    $db = getDB();
    try {
        $stmt = $db->prepare("SELECT id from Accounts WHERE user_id = :user_id");
        $stmt->execute([":user_id" => $user_id]);
        $account_ids = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        return $account_ids;
    } catch (Exception $e) {
        flash("Unable to retreive account ids.", "danger");
        error_log(var_export($e, true));
    }
}
function update_balance($acc){
    $query = "UPDATE Accounts set balance = (SELECT IFNULL(SUM(balance_change), 0) from Transactions WHERE account_src = :src) where id = :src";
    $db = getDB();
    $stmt = $db->prepare($query);
    try {
        $stmt->execute([":src" => $acc]);
    } catch (PDOException $e) {
        error_log(var_export($e->errorInfo, true));
        flash("Error updating balance", "danger");
    }
}
function make_transaction($srcId, $destId, $amount, $mode, $memo){   
    $src_extotal = get_account_balance($srcId) - $amount;
    $dest_extotal = get_account_balance($destId) + $amount;
    $db = getDB();
    try {
        $stmt = $db->prepare(
        "INSERT into Transactions
            (account_src, account_dest, balance_change, transaction_type, memo, expected_total) 
        VALUES 
            (:srcId_from, :destId_to, :amount_from, :mode_from, :memo_from, :srcExTotal), 
            (:destId_from, :srcId_to, :amount_to, :mode_to, :memo_to, :destExTotal)
        ");
        $result = $stmt->execute([":srcId_from" => $srcId,
                                ":destId_to" => $destId,
                                ":amount_from" => ($amount*-1),
                                ":mode_from" => $mode,
                                ":memo_from" => $memo,
                                ":srcExTotal" => $src_extotal,
                                ":destId_from" => $destId,
                                ":srcId_to" => $srcId,
                                ":amount_to" => $amount,
                                ":mode_to" => $mode,
                                ":memo_to" => $memo,
                                ":destExTotal" => $dest_extotal]);
        update_balance($srcId);
        update_balance($destId);
        return $result;
    } catch (Exception $e) {
        flash("Unable to make deposit.", "danger");
        error_log(var_export($e, true));
    }
}
function getExtTransferAccount($lastname, $lastdigits){
    $db = getDB();
    try {
        $stmt = $db->prepare("SELECT Accounts.id 
                            FROM Accounts 
                            INNER JOIN Users ON lastname = :lastname
                            WHERE account_number LIKE '%$lastdigits'
                            LIMIT 1");
        $stmt->execute([":lastname" => $lastname]);
        $account_id = $stmt->fetch(PDO::FETCH_ASSOC);
        return $account_id['id'] ?? 0;
    } catch (Exception $e) {
        error_log(var_export($e, true));
    }
}
function getRateAPY($type){
    $db = getDB();
    $stmt = $db->prepare("SELECT value 
                        FROM System_Properties
                        WHERE name = :type");
    try {
        $stmt->execute([":type" => $type]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $rate = $result['value'];
        return $rate;
    } 
    catch (PDOException $e) {
        flash("Error fetching apy rate", "danger");
        error_log(var_export($e->errorInfo, true));
    }
}
function applyInterest($acc_id, $acc_type){
    $apy = getRateAPY($acc_type);
    $current_balance = get_account_balance($acc_id);
    if($current_balance != 0){
        $interest = round(($current_balance * (($apy/100)/12)), 2) ;
        $updated_balance = $current_balance + $interest;
        $query = "UPDATE Accounts 
                SET balance = :updated_balance 
                WHERE id = :acc_id";
        $db = getDB();
        $stmt = $db->prepare($query);
        try {
            $result = $stmt->execute([":updated_balance" => $updated_balance, ":acc_id" => $acc_id]);
            if($result){
                showInterestTransaction($acc_id, $updated_balance, $interest);
            }
            flash("Updated balance with interest", "success");
        } catch (PDOException $e) {
            error_log(var_export($e->errorInfo, true));
            flash("Error updating balance with interest", "danger");
        }
    }
    else {
        flash("You've selected an account with a balance of 0", "warning");
    }
}
function showInterestTransaction($acc_id, $expected_total, $interest){
    $interest = abs($interest);
    $db = getDB();
    try {
        $stmt = $db->prepare(
        "INSERT into Transactions
            (account_src, account_dest, balance_change, transaction_type, memo, expected_total) 
        VALUES 
            (:acc_id, :accid, :interest, :mode, :memo, :expected_total)");
        $result = $stmt->execute([":acc_id" => $acc_id,
                                ":accid" => $acc_id,
                                ":interest" => $interest,
                                ":mode" => "interest",
                                ":memo" => "interest applied",
                                ":expected_total" => $expected_total]);
        return $result;
    } catch (Exception $e) {
        flash("Unable to make create interest entry.", "danger");
        error_log(var_export($e, true));
    }
}
?>