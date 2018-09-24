<?php
$title = "Import Data";
require '../view/headerInclude.php';
?>

<form enctype="multipart/form-data"
      action="../controller/controller.php?action=ProcessImportData" method="post">
    Upload files:
    <br><br>

    Students:
    <input name="userfilestudents" type="file" value="Students"/>
    <br>
    Classes:
    <input name="userfileclasses" type="file" value="Classes" />
    <br>
    Students-Classes:
    <input name="ufstudclass" type="file" value="StudentsClasses"/>
    <br>
    <input type="submit" value="Send Files" />
    <br>
</form>

<?php
require '../view/footerInclude.php';
?>
