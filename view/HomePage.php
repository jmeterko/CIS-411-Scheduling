<?php
$title = "Homepage";
require '../view/headerInclude.php';
?>

<body style="background-color: #becccc;">
<br/>
<br/>
<br/>

<!-- If you don't see it u probably are using a browser not based on webkit, so leave IE and grab anything else (Y) -->
<!-- UPDATE: works in Chrome & Safari, not Firefox. To solve that you could use an SVG insted of pure text. -->

<div class="container">
    <h1 class="headline">Course Scheduling Aid</h1>
    <br/>
    <ul class="menu cf">
        <li><a href="../controller/controller.php?action=StudentQuestion">New Student Question</a></li>
        <li><a href="../controller/controller.php?action=CourseQuestion">New Course Question</a></li>
        <li><a href="">Import Data</a></li>
        <li><a href="Settings.php">Settings</a></li>
        <li><a href="">Logout</a></li>
    </ul>
</div>
<!--
    <div class="container">
        <center><h1>Course Scheduling Aid</h1></center>
        <div class="jumbotron" style="margin:0px auto">
        <input type="button" value="New Student Question" class="btn btn-primary" onclick="window.location.href='MainApplicationStudentQuestion.php'" />
            <input type="button" value="New Course Question" class="btn btn-primary" onclick="window.location.href='MainApplicationCourseQuestion.html'" />
            <button class="glyphicon glyphicon-cloud">Import Data</button>
            <button class="glyphicon glyphicon-option-horizontal">Options</button>
            <div>
                <label>Latest Term:</label>
                <label>Current Term:</label>
            </div>
        </div>
    </div>
-->
</body>
</html>