<?php
$title = "Import Data";
require '../view/headerInclude.php';
?>

<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<body style="
  width: 400px;
  margin: 100px auto;
  background-color: #becccc;"
">

    <form enctype="multipart/form-data"
          action="../controller/controller.php?action=ProcessImportData" method="post">
        <div class="file-upload">
            <div class="file-select">
                <div class="file-select-button" id="fileName">Students&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="file-select-name" id="noFile">No file chosen...</div>
                <input name="userfilestudents" type="file" value="Students"/><br/>
            </div>
        </div>
        <br/>
        <div class="file-upload">
            <div class="file-select">
                <div class="file-select-button" id="fileName">Classes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="file-select-name" id="noFile">No file chosen...</div>
                <input name="userfileclasses" type="file" value="Classes" /><br/>
            </div>
        </div>
        <br/>
        <div class="file-upload">
            <div class="file-select">
                <div class="file-select-button" id="fileName">Student-Classes</div>
                <div class="file-select-name" id="noFile">No file chosen...</div>
                <input name="ufstudclass" type="file" value="StudentsClasses"/><br/>
            </div>
        </div>
    </form>
    <br/>
    <input type="button" value="Back" style="float:left" class="btn btn-danger" onclick="window.location.href='../controller/controller.php?action=HomePage'"/>
    <input type="submit" value="Submit" style="float:right" class="btn btn-success" />
</body>