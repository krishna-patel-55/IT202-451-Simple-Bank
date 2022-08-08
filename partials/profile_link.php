<?php
if (!isset($user_acc_id)) {
    $user_acc_id = 0;
}
if (!isset($user_acc_num)) {
    $user_acc_num = "";
}
?>
<a href="<?php echo get_url("profile.php?id=");
            se($user_acc_id); ?>"><?php se($user_acc_num); ?></a>
