<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>
<h1>Dashboard</h1>
    <ul class="centerDashboard">
        <!-- <li><a href="my_accounts.php">My Accounts</a></li>
        <li><a href="deposit.php">Deposit</a></li>
        <li><a href="withdraw.php">Withdraw</a></li>
        <li><a href="transfer.php">Transfer</a></li>-->
        <li><a href="create_account.php">Create Account</a></li>
        <li><a href="my_accounts.php">My Accounts</a></li>
        <li><a href="#">Deposit</a></li>
        <li><a href="#">Withdraw</a></li>
        <li><a href="#">Transfer</a></li>
        <li><a href="profile.php">Profile</a></li>
    </ul>
<style>
    ul.centerDashboard {
        margin-left: 25%;
        list-style-type: none;
        overflow: hidden;
    }
    li {
        float: left;
        margin-left: 30px;
    }
</style>