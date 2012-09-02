<div id="menu">
<span class="titleMenu">Account Management</span>
<?php
	if (!empty($_GET['acct'])){
		$selected = $_GET["acct"];
		if ($selected == "myaccount"){
?>
<a href="?acct=myaccount" class="selected" title="My Account">My Account</a><a href="?acct=settings" class="menu" title="Account Settings">Account Settings</a><?php if (checkPriviledge($_SESSION["uid"]) === true){?><a href="?acct=systemsettings" class="menu" title="System Settings">System Settings</a><a href="?acct=registeracct" class="menu" title="Register Account">Register Account</a><a href="?acct=manageacct" class="menu" title="Manage Accounts">Manage Accounts</a><?php } ?>
<?php
		}
		if ($selected == "systemsettings"){
?>
<a href="?acct=myaccount" class="menu" title="My Account">My Account</a><a href="?acct=settings" class="menu" title="Account Settings">Account Settings</a><?php if (checkPriviledge($_SESSION["uid"]) === true){?><a href="?acct=systemsettings" class="selected" title="System Settings">System Settings</a><a href="?acct=registeracct" class="menu" title="Register Account">Register Account</a><a href="?acct=manageacct" class="menu" title="Manage Accounts">Manage Accounts</a><?php } ?>
<?php
		}
		if ($selected == "settings"){
?>
<a href="?acct=myaccount" class="menu" title="My Account">My Account</a><a href="?acct=settings" class="selected" title="Account Settings">Account Settings</a><?php if (checkPriviledge($_SESSION["uid"]) === true){?><a href="?acct=systemsettings" class="menu" title="System Settings">System Settings</a><a href="?acct=registeracct" class="menu" title="Register Account">Register Account</a><a href="?acct=manageacct" class="menu" title="Manage Accounts">Manage Accounts</a><?php } ?>
<?php
		}
		if ($selected == "registeracct"){
?>
<a href="?acct=myaccount" class="menu" title="My Account">My Account</a><a href="?acct=settings" class="menu" title="Account Settings">Account Settings</a><?php if (checkPriviledge($_SESSION["uid"]) === true){?><a href="?acct=systemsettings" class="menu" title="System Settings">System Settings</a><a href="?acct=registeracct" class="selected" title="Register Account">Register Account</a><a href="?acct=manageacct" class="menu" title="Manage Accounts">Manage Accounts</a><?php } ?>
<?php
		}
		if ($selected == "manageacct"){
?>
<a href="?acct=myaccount" class="menu" title="My Account">My Account</a><a href="?acct=settings" class="menu" title="Account Settings">Account Settings</a><?php if (checkPriviledge($_SESSION["uid"]) === true){?><a href="?acct=systemsettings" class="menu" title="System Settings">System Settings</a><a href="?acct=registeracct" class="menu" title="Register Account">Register Account</a><a href="?acct=manageacct" class="selected" title="Manage Accounts">Manage Accounts</a><?php } ?>
<?php
		}
	}else{
?>
<a href="?acct=myaccount" class="selected" title="My Account">My Account</a><a href="?acct=settings" class="menu" title="Account Settings">Account Settings</a><?php if (checkPriviledge($_SESSION["uid"]) === true){?><a href="?acct=systemsettings" class="menu" title="System Settings">System Settings</a><a href="?acct=registeracct" class="menu" title="Register Account">Register Account</a><a href="?acct=manageacct" class="menu" title="Manage Accounts">Manage Accounts</a><?php } ?>
<?php
	}
?>
</div>