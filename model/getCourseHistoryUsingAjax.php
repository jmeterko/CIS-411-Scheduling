<?php
require_once '../model/model.php';
?>

<?php
$StudentToLookup = $_REQUEST["StudentToLookup"];
//gets all courses and returns them as a JSON object
$courseResults = getCourseHistory($StudentToLookup);
$myJSON = json_encode($courseResults);

echo $myJSON;
?>