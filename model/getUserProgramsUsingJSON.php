<?php
require_once '../model/model.php';
?>

<?php
$UserSelected = $_REQUEST["UserSelected"];
$UserPrograms = getUserPrograms($UserSelected);
//gets all courses and returns them as a JSON object
$myJSON = json_encode($UserPrograms);
echo $myJSON;
?>