<?php
$title = "Settings";
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
        <?php if (userIsAuthorized("HomePage")) {  ?>
            <li><a href="../controller/controller.php?action=HomePage">Home</a></li>
            <?php }
			if (userIsAuthorized("ModifyUserProgram")) {  ?>
                <li><a href="../controller/controller.php?action=ModifyUserProgram">Modify User-Programs</a></li>
        <?php }
        if (userIsAuthorized("ModifyAcadProgram")) {  ?>
            <li><a href="../controller/controller.php?action=ModifyAcadProgram">Modify Program-Subjects</a></li>
        <?php }
        if (userIsAuthorized("UpdateTermSettings")) {  ?>
            <li><a href="../controller/controller.php?action=UpdateTermSettings">Update Term</a></li>
        <?php }
        if (userIsAuthorized("SecurityManageRoles")) {  ?>
            <li><a href="../security/index.php">Admin</a></li>
        <?php }
        if (loggedIn()) {  ?>
            <li><a href="../security/index.php?action=SecurityLogOut">Logout</a></li>
        <?php } else {
            echo "<a href=\"../security/index.php?action=SecurityLogin&RequestedPage=" . urlencode($_SERVER['REQUEST_URI']) . "\">Log In</a>";
        } ?>

    </ul>
</div>
</body>
</html>
