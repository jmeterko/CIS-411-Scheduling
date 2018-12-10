<?php
require_once '../model/model.php';
$instructorResults = getAllInstructors();
?>

<?php

function getAllInstructors() {
    try {
        $db = getDBConnection();
        $query = "select * from instructor";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;           // Assoc Array of Rows
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        die;
    }
}

//gets all instructors and returns them as a JSON object
$myJSON = json_encode($instructorResults);
echo $myJSON;
?>