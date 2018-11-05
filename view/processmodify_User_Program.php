<?php
$title = "Import Data";
require '../view/headerInclude.php';
?>
<?php

$addPrograms = $_POST["hasPrograms"];
//print_r($addSubjects) ;
$selectedUser = $_POST["UserSelect"];
$rowsAdded = updateUserPrograms($selectedUser, $addPrograms);

echo "<br>There were " . $rowsAdded . " programs added to the user " . $selectedUser . ".";
echo "<br>" . $selectedUser . " now includes:  <br>";
for ($i = 0; $i < count($addPrograms); $i++)
    echo $addPrograms[$i] . "<br>";
//updateUser($UserID, $firstName, $lastName, $userName, $password, $email, $hasAttributes);
//$results = getAllUsers();
?>

<h3>Your modifications have been made.</h3>

<?php
require '../view/footerInclude.php';
?>
