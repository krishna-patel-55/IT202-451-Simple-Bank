<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>
<h1>Dashboard</h1>
    <ul class="centerDashboard">
        <!--<li><a href="transfer.php">Transfer</a></li>-->
        <li><a href="profile.php">Profile</a></li>
        <li><a href="create_account.php">Create Account</a></li>
        <li><a href="my_accounts.php">My Accounts</a></li> 
        <li><a href="deposit_withdraw.php?type=Deposit">Deposit</a></li>
        <li><a href="deposit_withdraw.php?type=Withdraw">Withdraw</a></li>
        <li><a href="#">Transfer</a></li>
    </ul>
<style>
    ul.centerDashboard {
        margin-left: 22%;
        list-style-type: none;
        overflow: hidden;
    }
    li {
        display: inline-block;
        float: left;
        margin-left: 30px;
        padding: 1px 6px;
    }
    input[type="submit"] {
        background: none;
        border: none;
        outline: none;
        text-decoration: underline;
        cursor: pointer;
    }
</style>