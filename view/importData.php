<?php
$title = "Import Data";
require '../view/headerInclude.php';
?>
<form enctype="multipart/form-data"
      action="../controller/controller.php?action=ProcessImportDataTest" method="post">
    Upload files:
    <br><br>
    <form enctype="multipart/form-data"
          action="../controller/controller.php?action=ProcessImportData" method="post">
        <div class="file-upload">
            <div class="file-select">
                <div class="file-select-button" id="fileName">Students&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="file-select-name" id="noFile0">No file chosen...</div>
                <input name="userfilestudents" type="file" value="Students" id="StudentsFile0" oninput="changeFileDiv(this.id)"/><br/>
            </div>
        </div>
        <br/>
        <div class="file-upload">
            <div class="file-select">
                <div class="file-select-button" id="fileName">Classes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="file-select-name" id="noFile1">No file chosen...</div>
                <input name="userfileclasses" type="file" value="Classes" id="ClassesFile1" onchange="changeFileDiv(this.id)"/><br/>
            </div>
        </div>
        <br/>
        <div class="file-upload">
            <div class="file-select">
                <div class="file-select-button" id="fileName">Student-Classes</div>
                <div class="file-select-name" id="noFile2">No file chosen...</div>
                <input name="ufstudclass" type="file" value="StudentsClasses" id="StudentClassesFile2" onchange="changeFileDiv(this.id)"/><br/>
            </div>
        </div>
    </form>
    <br/>
    <input type="button" value="Back" style="float:left" class="btn btn-danger"  onclick="window.location.href='../controller/controller.php?action=HomePage'"/>
    <input type="submit" value="Submit" style="float:right" class="btn btn-success" onclick="window.location.href='../controller/controller.php?action=Loading'"/>
</body>