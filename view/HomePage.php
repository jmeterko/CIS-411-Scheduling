<?php
$title = "Homepage";
require '../view/headerInclude.php';
?>

<body style="background-color: #becccc;">
<br/>
<br/>
<br/>
    <div class="container">
        <h1 class="headline">Course Scheduling Aid</h1>
        <br/>
        <ul class="menu cf">
            <li><a href="../controller/controller.php?action=StudentQuestion">New Student Question</a></li>
            <li><a href="../controller/controller.php?action=CourseQuestion">New Course Question</a></li>
            <li><a href="../controller/controller.php?action=ImportData">Import Data</a></li>
            <li><a href="Settings.php">Settings</a></li>
            <li><a href="">Logout</a></li>
        </ul>
    </div>
</body>
</html>