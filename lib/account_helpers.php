<?php
function get_account_balance($account_id)
{
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
function get_user_account_ids($user_id)
{
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
function update_balance($acc)
{
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
function make_transaction($srcId, $destId, $amount, $mode, $memo)
{   
    $src_extotal = (INT)get_account_balance($srcId) - $amount;
    $dest_extotal = (INT)get_account_balance($destId) + $amount;
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
function getExtTransferAccount($lastname, $lastdigits)
{
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
?>