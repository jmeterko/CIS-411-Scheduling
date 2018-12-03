<?php
require_once '../model/model.php';
$termResults = getAllTerms();
?>

<?php
//gets all terms and returns them as a JSON object
$myJSON = json_encode($termResults);

echo $myJSON;
?>