<?php
$title = "FileUploadPage.html";
require '../view/headerInclude.php';
?>
<body>
    <div class="container">
        <center><h1>Class Scheduling Aid</h1></center>
        <center><div style="background-color: gray; width: 400px; height: 400px">
            <button class="glyphicon glyphicon-user">New Student Question</button>
            <button class="glyphicon glyphicon-book">New Course Question</button>
                <a href="../controller/controller.php?action=ImportData"><button class="glyphicon glyphicon-cloud" >Import Data</button></a>
            <button class="glyphicon glyphicon-option-horizontal">Options</button>
            <div>
                <label>Latest Term:</label>
                <label>Current Term:</label>
            </div>
        </div></center>
    </div>
</body>
</html>