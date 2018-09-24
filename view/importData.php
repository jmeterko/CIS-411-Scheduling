<?php
$title = "Import Data";
require '../view/headerInclude.php';
?>

<form enctype="multipart/form-data"
      action="../controller/controller.php?action=ProcessImportData" method="post">
    Upload files:
    <br><br>

    <input name="userfilestudents" type="file" value="Students"/>
    <br>
    <input name="userfileclasses" type="file" value="Classes" />
    <br>
    <input name="ufstudclass" type="file" value="StudentsClasses"/>
    <br>
    <input type="submit" value="Send Files" />
    <br>
</form>

<?php
require '../view/footerInclude.php';
?>
