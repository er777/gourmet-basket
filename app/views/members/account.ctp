<?php echo $html->css('members.css') ?>

<div id="content">
    <div class="title-account">MY Account</div>
    <div id="items-account">
        <span>My Account</span>
        <div style="clear: both;"></div>
        <ul>
            <li><a href="/members/edit">Edit your account information</a></li>
            <li><a href="/members/password">Change your password</a></li>
            <li><a href="/members/address">Modify your address book entries</a></li>
            <li><a href="/members/logout">Logout</a></li>
        </ul>
        <span>My Orders</span>
        <div style="clear: both;"></div>
        <ul>
            <li><a href="/members/orders">View your order history</a></li>
        </ul>
    </div>
</div>