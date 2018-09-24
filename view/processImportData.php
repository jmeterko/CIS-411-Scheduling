<?php
$title = "Import Data";
require '../view/headerInclude.php';
?>

<?php

echo "Delete all rows in students-classes first to avoid foreign key constraints." . "<br>";
clearTable("studentsclasses");   //IMPORTANT must be cleared first
echo "<br>";                                          //foreign key constraint


//////////////////////////////////////////////////////////////////
/// STUDENTS
//////////////////////////////////////////////////////////////////
//make sure we have a file
if ($_FILES['userfilestudents']['error'] == UPLOAD_ERR_NO_FILE) {
    echo "<p>Please choose a file first and then try again...</p>";
}  else if ($_FILES['userfilestudents']['error'] != UPLOAD_ERR_OK){
    echo "File Read Error\n Debugging info:"; //any other error
    print_r($_FILES);
}

//begin reading csv file
$file = fopen($_FILES['userfilestudents']['tmp_name'], "r");
clearTable("students");  //deletes all rows in Students
fgetcsv($file); //load first line before looping, skips first line for output
$rowCount = 0;
while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
    //INSERT INTO Student <each field>
    $rowCount += addNewStudent($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11],$data[12],$data[13],$data[14],$data[15],$data[16],$data[17],$data[18],$data[19],$data[20],$data[21],$data[22],$data[23],$data[24],$data[25],$data[26],$data[27],$data[28],$data[29]);
}   //rowcount increments when a row is affected, addNewStudent returns 1
$errorMessage = "Inserted $rowCount rows into table Students.";
echo $errorMessage;
//AddNewStudent^^^
//print 10 rows to screen for convenience
echo "<h3>First 10 Students are:</h3><ol>";
rewind($file);
fgetcsv($file); //skip first line before looping
$printIndex = 0;
while (($data = fgetcsv($file)) !== FALSE and $printIndex < 10) {
    echo "<li>$data[0]  " .
        "$data[1]   $data[2]   $data[3]   $data[4]   $data[5]</li>" ;
    $printIndex++;
}
echo "</ol>";
fclose($file);
//----------------------------------------------------------------



//////////////////////////////////////////////////////////////////
/// CLASSES
//////////////////////////////////////////////////////////////////
//make sure we have a file
if ($_FILES['userfileclasses']['error'] == UPLOAD_ERR_NO_FILE) {
    echo "<p>Please choose a file first and then try again...</p>";
}  else if ($_FILES['userfileclasses']['error'] != UPLOAD_ERR_OK){
    echo "File Read Error\n Debugging info:"; //any other error
    print_r($_FILES);
}

//begin reading csv file
$file = fopen($_FILES['userfileclasses']['tmp_name'], "r");
clearTable("Classes");  //deletes all rows in Classes
fgetcsv($file); //load first line before looping, skips first line for output
$rowCount = 0;
while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
    //INSERT INTO Classes <each field>
    $rowCount += addNewCourse($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11],$data[12],$data[13]);
}   //rowcount increments when a row is affected, addNewStudent returns 1
$errorMessage = "Inserted $rowCount rows into table Classes.";
echo $errorMessage;

//print 10 rows to screen for convenience
echo "<h3>First 10 Courses are:</h3><ol>";
rewind($file);
fgetcsv($file); //skip first line before looping
$printIndex = 0;
while (($data = fgetcsv($file)) !== FALSE and $printIndex < 10) {
    echo "<li>$data[0]  " .
        "$data[1]   $data[2]   $data[3]   $data[4]   $data[5]</li>" ;
    $printIndex++;
}
echo "</ol>";
fclose($file);
//----------------------------------------------------------------



//////////////////////////////////////////////////////////////////
/// STUDENTS-CLASSES
///
/// There was an error when uploading original students-classes file
/// It is assumed that the file was too large (2400kb)
/// A smaller version of it is working for us (74kb)
/// When we get larger file upload permissions on vcisprod it can work
/// For now test with 74kb version in ../CSV_Test_Files
//////////////////////////////////////////////////////////////////
//make sure we have a file
if ($_FILES['ufstudclass']['error'] == UPLOAD_ERR_NO_FILE) {
    echo "<p>Please choose a file first and then try again...</p>";
}  else if ($_FILES['ufstudclass']['error'] != UPLOAD_ERR_OK){
    echo "File Read Error\n Debugging info:"; //any other error
    print_r($_FILES);
}

//begin reading csv file                                                //Maximum File Size Unknown
$file = fopen($_FILES['ufstudclass']['tmp_name'], "r");
clearTable("StudentsClasses");  //deletes all rows in StudentsClasses
//fgetcsv($file); //load first line before looping, skips first line for output
$rowCount = 0;
while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
    //INSERT INTO StudentsClasses <each field>
    $rowCount += addNewStudentCourse($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9]);
}                                           //addNewStudentsClasses^^^
$errorMessage = "Inserted $rowCount rows into table Students-Classes.";
echo $errorMessage;

//print 10 rows to screen for convenience
echo "<h3>First 10 Students-Classes are:</h3><ol>";
rewind($file);
fgetcsv($file); //skip first line before looping
$printIndex = 0;
while (($data = fgetcsv($file)) !== FALSE and $printIndex < 10) {
    echo "<li>$data[0]  " .
        "$data[1]   $data[2]   $data[3]   $data[4]   $data[5]</li>" ;
    $printIndex++;
}
echo "</ol>";
fclose($file);
//----------------------------------------------------------------
?>

<?php
require '../view/footerInclude.php';
?>
