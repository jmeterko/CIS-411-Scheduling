<?php
$title = "HomePage";
require_once '../view/headerInclude.php';
?>

<body style="background-color: #becccc;">
<br/>
<br/>
<br/>
<div class="container">
    <h1 class="headline">Course Scheduling Aid</h1>
    <br/>
    <ul class="menu cf">
		<?php if (userIsAuthorized("StudentQuestion")) {  ?>
        <li><a style="text-decoration:none;" href="../controller/controller.php?action=StudentQuestion">Student Question</a></li>
		<?php /*}
			if (userIsAuthorized("CourseQuestion")) {  */?><!--
                <li><a href="../controller/controller.php?action=CourseQuestion">Course Question</a></li>-->
		<?php }
        if (userIsAuthorized("ImportData")) {  ?>
            <li><a style="text-decoration:none;" href="../controller/controller.php?action=ImportData">Import Data</a></li>
        <?php }
        if (userIsAuthorized("Settings")) {  ?>
            <li><a style="text-decoration:none;" href="../controller/controller.php?action=Settings">Settings</a></li>
        <?php }
        if (userIsAuthorized("SecurityManageUsers")) {  ?>
            <li><a style="text-decoration:none;" href="../security/index.php">Admin</a></li>
        <?php }
			if (loggedIn()) {  ?>
                <li><a style="text-decoration:none;" href="../security/index.php?action=SecurityLogOut">Logout</a></li>
		<?php } else {
				echo "<a href=\"../security/index.php?action=SecurityLogin&RequestedPage=" . urlencode($_SERVER['REQUEST_URI']) . "\">Log In</a>";
		} ?>

    </ul>
</div>
</body>
</html>
