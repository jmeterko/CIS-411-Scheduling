<?php
require_once '../model/model.php';
$userResults = getAllUsers();
?>

<?php
//gets all courses and returns them as a JSON object
$myJSON = json_encode($userResults);

echo $myJSON;
?>