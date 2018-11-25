<?php
require_once '../model/model.php';
?>

<?php
$UserSelected = $_REQUEST["UserSelected"];
$SubjectsForUser = getSubjectsForUser($UserSelected);
//gets all subjects for a given user (USER CONTEXT)
$myJSON = json_encode($SubjectsForUser);
echo $myJSON;
?>