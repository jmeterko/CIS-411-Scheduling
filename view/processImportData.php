<?php
$title = "Import Data";
require '../view/headerInclude.php';
?>

<?php

/*echo "Delete all rows in students-classes first to avoid foreign key constraints." . "<br>";
clearTable("studentsclasses");   //IMPORTANT must be cleared first
echo "<br>";                                          //foreign key constraint*/

//call the file load functions
loadStudents();
loadClasses();
//loadStudentsClasses();

///
/// to do
///     verify each file by column headers  v/DONE
///     load_students
///     load_courses
///     load_studentcourses
///


function checkIfCSV($fileToCheck){
    // pass in: $_FILES['file']['type']
    $csv_mimetypes = array(
        'text/csv',
        'text/plain',
        'application/csv',
        'text/comma-separated-values',
        'application/excel',
        'application/vnd.ms-excel',
        'application/vnd.msexcel',
        'text/anytext',
        'application/octet-stream',
        'application/txt',
    );

    if (in_array($fileToCheck, $csv_mimetypes)) {
        // possible CSV file
        return true;
    } else return false;
}
//
function loadStudents(){
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

    //check if its a CSV file
        if (checkIfCSV($_FILES['userfilestudents']['type'])){
            echo "This file is compatible as a CSV" . "<br>";
        }
        else echo "this file is not compatible as a CSV" . "<br>";

    //open file and validate that it is the right file
        $file = fopen($_FILES['userfilestudents']['tmp_name'], "r");
        $headerRow = fgetcsv($file); //load first line before looping, skips first line for output
        if ($headerRow[6] == "GPA"){
            if($headerRow[2] == "Last Term")
                if($headerRow[3] == "Current")
                    if($headerRow[4] == "Location")
                        if($headerRow[5] == "Total")
                            if($headerRow[1] == "Name")
                                if($headerRow[7] == "Plan 1")
                                    if($headerRow[8] == "Plan 1 Descr")
                                        echo "Student file has been chosen correctly." . "<br>";
        } else echo "Please choose an accurate *STUDENT* file." . "<br>";
    clearTable("student");  //deletes all rows in Students

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
}



function loadClasses()
{
    //////////////////////////////////////////////////////////////////
    /// CLASSES
    //////////////////////////////////////////////////////////////////
    ///
    /// Handles the Courses file to populate Course table and CourseOffering table
    /// Courses may repeat, this is avoided by storing each course identifier in a string
    /// Later, explode the string to process as an array when calling addNewCourse
    ///
    ///
    //make sure we have a file
    if ($_FILES['userfileclasses']['error'] == UPLOAD_ERR_NO_FILE) {
        echo "<p>Please choose a file first and then try again...</p>";
    } else if ($_FILES['userfileclasses']['error'] != UPLOAD_ERR_OK) {
        echo "File Read Error\n Debugging info:"; //any other error
        print_r($_FILES);
    }

    //check if its a CSV file
    if (checkIfCSV($_FILES['userfilestudents']['type'])){
        echo "This file is compatible as a CSV" . "<br>";
    }
    else echo "this file is not compatible as a CSV" . "<br>";

    ////open file and validate that it is the right file
    $file = fopen($_FILES['userfileclasses']['tmp_name'], "r");
    $headerRow = fgetcsv($file); //load first line before looping, skips first line for output
    if ($headerRow[8] == "Count ID"){
        if ($headerRow[9] == "Acad Org")
            if ($headerRow[10] == "Start Time")
                if ($headerRow[11] == "End Time")
                    if ($headerRow[12] == "Days")
                        if ($headerRow[13] == "Cap Enrl")
        echo "Classes file has been chosen correctly." . "<br>";
    } else echo "Please choose an accurate *CLASSES* file." . "<br>";

    //clear CourseOffering and Course tables
    clearTable("CourseOffering");  //deletes all rows in CourseOffering
    clearTable("Course");           //delete all rows in Course after FK constraints are cleared

    //collect unique Courses, load Course Table
    //assumes file won't use the " | " character (pipe)
    $courseArray = array(); //hash table implementation
    //$courseToAdd = array();
    while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
                            //Subject    Catalog       Name         Descr       Acad_Org
        $courseItemString = $data[4]."|".$data[5]."|".$data[1]."|".$data[7]."|".$data[9]; //assemble a string unique to the course
        $courseArray[$courseItemString] = 3;      //add it as a key to the AssociativeArray, key value is meaningless
        //echo "courseItemString is " . $courseItemString . "<br>";
    }

    //Process courseArray with a ForEach loop, add to database
    //echo "<br> Now to process courseArray with a foreach loop: <br>";
    $rowCount = 0;
    foreach ($courseArray as $courseItem => $keyThrowaway){
        $courseToAdd = explode("|", $courseItem);
        $rowCount += addNewCourse($courseToAdd[0],$courseToAdd[1],$courseToAdd[2],$courseToAdd[3],$courseToAdd[4]);
    }
    echo    "There are " . count($courseArray) . " items in courseArray. <br>".
        "There should be " . count($courseArray) . " rows inserted into table Course. <br>";
    $errorMessage = "Inserted $rowCount rows into table Course. <br>";
    echo $errorMessage . "<br>";

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //               ****Why are we only inserting 82 out of 162?****
    //
    //                                                          //idk wtf is up
    //                                                          //Is our Course table right?  PK's are alright?
    //                                                          //can a CIS 202 exist with multiple teachers in the table?
    //                                                          //I think our table should just be Subject, Catalog
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///
    //print courseArray for debugging
    echo "Printing out the courseArray: <br>";
    ?>
    <pre>
        <?php print_r($courseArray); ?>  <!--  Print the array, where are our missing classes?  -->
    </pre>
    <?php

    //INSERT COURSEOFFERING
    //Rewind file, add course offerings after foreign key constraints (course table) are added
    rewind($file);
    $rowCount = 0;
    while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
        //INSERT INTO Classes <each field>
        $rowCount += addNewCourseOffering($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11], $data[12], $data[13]);
    }   //rowcount increments when a row is affected, addNewStudent returns 1
    $errorMessage = "Inserted $rowCount rows into table CourseOffering.";
    echo $errorMessage;

    //print 10 rows to screen for convenience
    echo "<h3>First 10 Courses are:</h3><ol>";
    rewind($file);
    fgetcsv($file); //skip first line before looping
    $printIndex = 0;
    while (($data = fgetcsv($file)) !== FALSE and $printIndex < 10) {
        echo "<li>$data[0]  " .
            "$data[1]   $data[2]   $data[3]   $data[4]   $data[5]</li>";
        $printIndex++;
    }
    echo "</ol>";
    fclose($file);
    //----------------------------------------------------------------}
}

function loadStudentsClasses()
{
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
    } else if ($_FILES['ufstudclass']['error'] != UPLOAD_ERR_OK) {
        echo "File Read Error\n Debugging info:"; //any other error
        print_r($_FILES);
    }

    //check if its a CSV file
    if (checkIfCSV($_FILES['userfilestudents']['type'])){
        echo "This file is compatible as a CSV" . "<br>";
    }
    else echo "this file is not compatible as a CSV" . "<br>";

    ////open file and validate that it is the right file                              //Maximum File Size Unknown
    $file = fopen($_FILES['ufstudclass']['tmp_name'], "r");
    $headerRow = fgetcsv($file); //load first line before looping, skips first line for output$headerRow = fgetcsv($file); //load first line before looping, skips first line for output
    if ($headerRow[8] != "Grade" or $headerRow[9] != "Type"){
        echo "Please choose an accurate *STUDENTSCLASSES* file." . "<br>";
    } else echo "StudentsClasses file has been chosen correctly." . "<br>"; echo "<br>";
    //clearTable("StudentsClasses");  //deletes all rows in StudentsClasses
    $rowCount = 0;
    while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
        //INSERT INTO StudentsClasses <each field>
        $rowCount += addNewStudentCourse($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9]);
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
            "$data[1]   $data[2]   $data[3]   $data[4]   $data[5]</li>";
        $printIndex++;
    }
    echo "</ol>";
    fclose($file);
    //----------------------------------------------------------------
}
?>

<?php
require '../view/footerInclude.php';
?>
