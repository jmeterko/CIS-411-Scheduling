<?php
$title = "Import Data";
require '../view/headerInclude.php';
?>
<?php

$addSubjects = $_POST["hasSubjects"];
//print_r($addSubjects) ;
$selectedProgram = $_POST["programSelect"];
$rowsAdded = updateProgramSubjects($selectedProgram, $addSubjects);

echo "<br>There were " . $rowsAdded . " subjects added to the program " . $selectedProgram . ".";
echo "<br>" . $selectedProgram . " now includes:  <br>";
for ($i = 0; $i < count($addSubjects); $i++)
echo $addSubjects[$i] . "<br>";
//updateUser($UserID, $firstName, $lastName, $userName, $password, $email, $hasAttributes);
//$results = getAllUsers();
?>

<h3>Your modifications have been made.</h3>

<?php
require '../view/footerInclude.php';
?>
