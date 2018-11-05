<?php
require_once '../model/model.php';
$programResults = getAllAcademicPrograms();
?>

<?php
//gets all courses and returns them as a JSON object
$myJSON = json_encode($programResults);

echo $myJSON;
?>