<?php
require_once '../model/model.php';
?>

<?php
$ProgramSelected = $_REQUEST["ProgramSelected"];
$programSubjects = getAllSubjects($ProgramSelected);
//gets all courses and returns them as a JSON object
$myJSON = json_encode($programSubjects);
echo $myJSON;
?>