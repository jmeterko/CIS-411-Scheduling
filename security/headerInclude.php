
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Security</title>
            <meta charset="utf-8">
            <link rel="icon" type="image/png" href="../images/rune_logo.png">
            <link rel="stylesheet" href="../css/main.css" />
            <link rel="stylesheet" href="../css/bootstrap.min.css" />
            <script src ="../js/jquery-3.1.1.js"></script>
            <script src ="../js/bootstrap.min.js"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script type="text/javascript" src="attributes.js"></script>
            </head>
             <body class="center login">
			 
<section class="height-full login-block">
    <div class="container">
	<div class="row">
	<?php if(!loggedIn()){ ?>
				<div class="col-md-4 login-sec pad-bottom">
	<?php } else { ?>
				<div class="col-md-8 login-sec pad-bottom">
		<h1>Control Panel</h1>

		<?php
            if (userIsAuthorized("HomePage")) {  ?>
				<a class="left" href="../controller/controller.php?action=HomePage">Home</a> &nbsp;
        <?php }
        if (userIsAuthorized("Settings")) {  ?>
            <a class="left" href="../controller/controller.php?action=Settings">Settings</a> &nbsp;
        <?php }
        if (userIsAuthorized("SecurityManageUsers")) {  ?>
            <a class="left" href="../security/index.php?action=SecurityManageUsers">Manage Users</a> &nbsp;
        <?php }
        if (userIsAuthorized("SecurityManageFunctions")) {  ?>
            <a class="left" href="../security/index.php?action=SecurityManageFunctions">Manage Functions</a> &nbsp;
        <?php }
			if (userIsAuthorized("SecurityManageRoles")) {  ?>
				<a class="left" href="../security/index.php?action=SecurityManageRoles">Manage Roles</a> &nbsp;
        <?php }
        if (userIsAuthorized("SecurityManageSearches")) {  ?>
            <a class="left" href="../security/index.php?action=SecurityManageSearches">Manage Searches</a> &nbsp;
        <?php }
			if (loggedIn()) {  ?>
				<a class="left" href="../security/index.php?action=SecurityLogOut">Logout</a>
		<?php } else { 
				echo "<a href=\"../security/index.php?action=SecurityLogin&RequestedPage=" . urlencode($_SERVER['REQUEST_URI']) . "\">Log In</a>";
		} 
	}?>
