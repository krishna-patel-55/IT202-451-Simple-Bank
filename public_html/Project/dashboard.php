<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>
<div class="container overflow-hidden text-center">
<h1>Dashboard</h1>
    <ul class="row">
        <li id="dash" class="col-sm p-3 border bg-light"><a href="profile.php">Profile</a></li>
        <li class="col-sm p-3 border bg-light"><a href="create_account.php">Create Account</a></li>
        <li class="col-sm p-3 border bg-light"><a href="my_accounts.php">My Accounts</a></li> 
    </ul>
    <ul class="row">
        <li class="col-sm p-3 border bg-light"><a href="deposit_withdraw.php?type=Deposit">Deposit</a></li>
        <li class="col-sm p-3 border bg-light"><a href="deposit_withdraw.php?type=Withdraw">Withdraw</a></li>
        <li class="col-sm p-3 border bg-light"><a href="transfer.php">Transfer</a></li>
        <li class="col-sm p-3 border bg-light"><a href="ext_transfer.php">External Transfer</a></li>
    </ul>
</div>
 
<style>
    ul {
        list-style-type: none;
    }
    li#dash {
        background: pink;
    }
</style>