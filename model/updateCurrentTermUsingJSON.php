<?php
require '../model/model.php';
?>

<?php
$CurrentTerm = $_REQUEST["CurrentTerm"];
$outputText = updateCurrentTerm($CurrentTerm);
echo $outputText;
//gets all courses and returns them as a JSON object
//echo "Current term has been updated!";

?>