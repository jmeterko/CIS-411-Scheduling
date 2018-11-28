<div class="container">
    <ul class="menu cf">
        <?php if (userIsAuthorized("HomePage")) {  ?>
            <li><a href="../controller/controller.php?action=HomePage">Home</a></li>
        <?php }
        if ($title == 'ModifyUserProgram' || $title == 'ModifyAcadProgram' || $title == 'UpdateCurrentTerm'){
            if (userIsAuthorized("ModifyUserProgram") && $title != 'ModifyUserProgram') {  ?>
                <li><a href="../controller/controller.php?action=ModifyUserProgram">Modify User-Programs</a></li>
            <?php }
            if (userIsAuthorized("ModifyAcadProgram") && $title != 'ModifyAcadProgram') {  ?>
                <li><a href="../controller/controller.php?action=ModifyAcadProgram">Modify Program-Subjects</a></li>
            <?php }
            if (userIsAuthorized("UpdateTermSettings") && $title != 'UpdateCurrentTerm') {  ?>
                <li><a href="../controller/controller.php?action=UpdateTermSettings">Update Term</a></li>

            <?php } }else{
                if (userIsAuthorized("StudentQuestion")) {  ?>
                    <li><a href="../controller/controller.php?action=StudentQuestion">Student Question</a></li>
                    <?php /*}
                if (userIsAuthorized("CourseQuestion")) {  */?><!--
                    <li><a href="../controller/controller.php?action=CourseQuestion">Course Question</a></li>-->
                <?php }
            if (userIsAuthorized("SecurityManageSearches")) {  ?>
                <li><a class="left" href="../security/index.php?action=SecurityManageSearches">Manage Searches</a></li> &nbsp;
            <?php }
                if (userIsAuthorized("Settings")) {  ?>
                    <li><a href="../controller/controller.php?action=Settings">Settings</a></li>
                <?php }
                if (userIsAuthorized("ImportData")) {  ?>
                    <li><a href="../controller/controller.php?action=ImportData">Import Data</a></li>

                <?php } }
        if (userIsAuthorized("SecurityAddUser")) {  ?>
            <li><a href="../security/index.php">Admin</a></li>
        <?php }
        if (loggedIn()) {  ?>
            <li><a href="../security/index.php?action=SecurityLogOut">Logout</a></li>
        <?php } else {
            echo "<a href=\"../security/index.php?action=SecurityLogin&RequestedPage=" . urlencode($_SERVER['REQUEST_URI']) . "\">Log In</a>";
        } ?>

    </ul>
</div>