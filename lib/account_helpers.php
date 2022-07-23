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
function update_balance($acc, $val)
{
    $updatedBal = (INT)get_account_balance($acc) + (INT)$val;
    $db = getDB();
    try {
        $stmt = $db->prepare("UPDATE Accounts SET balance=$updatedBal WHERE id = :acc");
        $result = $stmt->execute([":acc" => $acc]);
        if($result){
            return $result;
        }
    }
    catch(Exception $e){
        flash("An error occured while updating balance.", "danger");
        error_log(var_export($e, true));
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
        update_balance($srcId, ($amount*-1));
        update_balance($destId, $amount);
        return $result;
    } catch (Exception $e) {
        flash("Unable to make deposit.", "danger");
        error_log(var_export($e, true));
    }
}
?>