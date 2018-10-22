<?php
require_once '../model/model.php';
$courseResults = getAllCourses();
?>

<?php
//gets all courses and returns them as a JSON object
$myJSON = json_encode($courseResults);

echo $myJSON;
?>