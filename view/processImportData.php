<?php
$title = "Import Data";
require_once '../model/model.php';
require_once '../model/simplexlsx.class.php';
?>

<?php
/// Process File Import
/// Apache settings:
///                  maximumum execution time
///                  maximum file upload size
/// DB connection string
///
///



//call the file load functions
clearAllTables();
loadClasses();
loadStudents();
loadPrograms();
loadStudentsClasses();

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

   // function convertToCsv($fileToCheck){
    //    $filename = preg_replace('"\.xlsx$"', 'csv', $fileToCheck);
   // };



    if (in_array($fileToCheck, $csv_mimetypes)) {
        // possible CSV file
        return true;
    } else return false;
}

function clearAllTables(){
    //theres no logic yet for if we should call this, using it for debugging
    //should probably check all files, then clear all tables, then start adding data
    clearTable("studentclass");
    clearTable("studentmajor");
    clearTable("courseoffering");
    clearTable("course");
    clearTable("student");
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
        $isCSV = true;
        echo "This file is compatible as a CSV" . "<br>";
    }
    else {
        $isCSV = false;
        echo "this file is not compatible as a CSV" . "<br>";
    }

    if ($isCSV){
        $file = fopen($_FILES['userfilestudents']['tmp_name'], "r");
    }
    else {
        //open file and validate that it is the right file
        $xlsx = new SimpleXLSX( $_FILES['userfilestudents']['tmp_name'] );
        $file = tmpfile();
        foreach( $xlsx->rows() as $fields ) {
            fputcsv( $file, $fields);
        }
        rewind($file); //go to top
    }


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
        $rowTotal = 1;
        while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
            //INSERT INTO Student <each field>
            $rowCount += addNewStudent($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11],$data[12],$data[13],$data[14],$data[15],$data[16],$data[17],$data[18],$data[19],$data[20],$data[21],$data[22],$data[23],$data[24],$data[25],$data[26],$data[27],$data[28],$data[29]);
            $rowTotal++;
        }   //rowcount increments when a row is affected, addNewStudent returns 1
    echo    "There are " . $rowTotal . " rows in Students CSV file. <br>".
        "There should be " . $rowTotal . " rows inserted into table Students. <br>";
        $errorMessage = "Inserted $rowCount rows into table Students.<br>";
        echo $errorMessage;
        if ($rowTotal != $rowCount)
            echo "Do we have any problem data?  Duplicate student IDs?<br>";
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

function loadPrograms()
{
    //////////////////////////////////////////////////////////////////
    /// STUDENTS PROGRAMS
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
        $isCSV = true;
        echo "This file is compatible as a CSV" . "<br>";
    }
    else {
        $isCSV = false;
        echo "this file is not compatible as a CSV" . "<br>";
    }

    if ($isCSV){
        $file = fopen($_FILES['userfilestudents']['tmp_name'], "r");
    }
    else {
        //open file and validate that it is the right file
        $xlsx = new SimpleXLSX( $_FILES['userfilestudents']['tmp_name'] );
        $file = tmpfile();
        foreach( $xlsx->rows() as $fields ) {
            fputcsv( $file, $fields);
        }
        rewind($file); //go to top
    }
    
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
    clearTable("Acad_Program");  //deletes all rows in Acad_Program

    //INSERT ACAD PROGRAMS --------------------------------------------------
    //how many times do we attempt to insert a program vs how  many get inserted

    //collect unique Courses, load Course Table
    //assumes file won't use the " | " character (pipe)
    //some catalogs have multiple spellings (" 110" and "110")
    //some classes have multiple spellings ("Intro To Java" and "Intro to Java")
    $programArray = array(); //hash table implementation
    //$courseToAdd = array();
    while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
        //programArray[key] = "value"
        //programArray[BS CS] = "Computer Science BS"
        //if programArray[BS CS] exists, will overwrite the value, will still have 1 key
        $programArray[$data[7]] = $data[8];
        // $data[7] . $data[8] are plan1, plan1Descr
        // 7 and 8 are never null, others can be.
        // a student can have up to five plans
        if (!empty($data[15])){
            $programArray[$data[15]] = $data[16];
        }
        if (!empty($data[13])){
            $programArray[$data[13]] = $data[14];
        }
        if (!empty($data[11])){
            $programArray[$data[11]] = $data[12];
        }
        if (!empty($data[9])){
            $programArray[$data[9]] = $data[10];
        }
    }
    //^^^array is loaded with only unique Programs^^^
    //^^^unique ID:Plan_1   ...  value:  plan_1_Descr
    //so, we're saving each Program only once, with the description as the most recent entry

    //now, for each entry in the array, all unique, add that entry to the database
    $rowCount = 0;
    $rowTotal = 0;
    foreach ($programArray as $programKey => $programValue){  //
        $rowCount += addNewProgram($rowTotal, $programKey, $programValue);
        $rowTotal++;
        echo "Iteration: " . $rowTotal . "   Rows inserted: " . $rowCount .
            "... " . $programKey . " --- " . $programValue . "<br>";
    }
    echo    "There are " . count($programArray) . " items in programArray. <br>".
        "There should be " . count($programArray) . " rows inserted into table Acad_Program. <br>";
    $errorMessage = "Inserted $rowCount rows into table Acad_Program. <br>";
    echo $errorMessage . "<br>";
    //print courseArray for debugging
    echo "Printing out the programArray: <br>";
    ?>
    <pre>
        <?php print_r($programArray); ?>  <!--  Print the array, where are our missing classes?  -->
    </pre>
    <?php


    //Add Student Majors
    //Now, database has been loaded with Programs.
    //Next, associate students with programs.
    clearTable("StudentMajor");  //deletes all rows in StudentMajors
    rewind($file); //point to first row
    fgetcsv($file); //skip first line before looping
    $rowCount = 0;
    $rowTotal = 2;
    $studentMajorsFound = 0;
    while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
        if (!empty($data[15])) {
            $rowCount += addNewStudentMajor($rowTotal, $data[0], $data[15]);
            $studentMajorsFound++;
        }
        if (!empty($data[13])) {
            $rowCount += addNewStudentMajor($rowTotal, $data[0], $data[13]);
            $studentMajorsFound++;
        }
        if (!empty($data[11])) {
            $rowCount += addNewStudentMajor($rowTotal, $data[0], $data[11]);
            $studentMajorsFound++;
        }
        if (!empty($data[9])) {
            $rowCount += addNewStudentMajor($rowTotal, $data[0], $data[9]);
            $studentMajorsFound++;
        }
        if (!empty($data[7])) {  //this is Plan_1 ... do some students have no major?  is it ever empty?
            $rowCount += addNewStudentMajor($rowTotal, $data[0], $data[7]);
            $studentMajorsFound++;
        }
        $rowTotal++;  //line number of our CSV
    }
    echo    "There are " . $studentMajorsFound . " student majors found in Students file. <br>".
        "There should be " . $studentMajorsFound . " rows inserted into table StudentMajors. <br>";
    $errorMessage = "Inserted $rowCount rows into table StudentMajors. <br>";
    echo $errorMessage . "<br>";



    //vinny's code:
    /*while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
        //INSERT INTO Acad_program <each field>
        $rowTotal++;
        if (!empty($data[15])){
            $rowCount += addNewProgram($rowTotal, $data[15], $data[16]);
            $rowTotal++;
        }
        if (!empty($data[13])){
            $rowCount += addNewProgram($rowTotal, $data[13], $data[14]);
            $rowTotal++;
        }
        if (!empty($data[11])){
            $rowCount += addNewProgram($rowTotal, $data[11], $data[12]);
            $rowTotal++;
        }
        if (!empty($data[9])){
            $rowCount += addNewProgram($rowTotal, $data[9], $data[10]);
            $rowTotal++;
        }
        $rowCount += addNewProgram($rowTotal,$data[7],$data[8]);
        $rowTotal++;
    }   //rowcount increments when a row is affected, addNewStudent returns 1
    $errorMessage = "Inserted $rowCount rows into table acad_program.";
    echo "Attempted to insert $rowTotal rows into acad_program table (called addNewProgram $rowTotal times) <br>";
    echo $errorMessage;*/

    //AddNewProgram^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    //print 10 rows to screen for convenience
    echo "<h3>First 10 Programs are:</h3><ol>";
    rewind($file);
    fgetcsv($file); //skip first line before looping
    $printIndex = 0;
    while (($data = fgetcsv($file)) !== FALSE and $printIndex < 10) {
        echo "<li>$data[7]  " .
            "$data[8]</li>" ;
        $printIndex++;
    }
    echo "</ol>";
    fclose($file);
}


$subjectArray = array();
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
    if (checkIfCSV($_FILES['userfileclasses']['type'])){
        $isCSV = true;
        echo "This file is compatible as a CSV" . "<br>";
    }
    else {
        $isCSV = false;
        echo "this file is not compatible as a CSV" . "<br>";
    }

    if ($isCSV){
        $file = fopen($_FILES['userfileclasses']['tmp_name'], "r");
    }
    else {
        //open file and validate that it is the right file
        $xlsx = new SimpleXLSX( $_FILES['userfileclasses']['tmp_name'] );
        $file = tmpfile();
        foreach( $xlsx->rows() as $fields ) {
            fputcsv( $file, $fields);
        }
        rewind($file); //go to top
    }

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
    //some catalogs have multiple spellings (" 110" and "110")
    //some classes have multiple spellings ("Intro To Java" and "Intro to Java")
    $courseArray = array(); //hash table implementation
    $subjectArray = array();
    //$courseToAdd = array();
    while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
        //file headings:       //Subject    Catalog       Name         Descr       Acad_Org
        //$courseItemString = $data[4]."|".$data[5]."|".$data[1]."|".$data[7]."|".$data[9]; //assemble a string unique to the course
        $courseItemStringValue = $data[4]."|".str_replace(' ', '', $data[5])."|".$data[7]."|".$data[9]; //SUBJ|CATA|DESCR|ACADORG //string unique to course
        $courseItemStringKey = $data[4]."|".str_replace(' ', '', $data[5]);
        $subjectItem = $data[4];
        //remove whitespace from catalog     ^^^
        //$courseArray[$courseItemString] = 3;      //add it as a key to the AssociativeArray, key value is meaningless
        $courseArray[strtoupper($courseItemStringKey)] = $courseItemStringValue;      //add it as a key to the AssociativeArray, value is original format, key is UPPERCASE
        $subjectArray[strtoupper($subjectItem)] = $subjectItem;
        //^^^unique ID:case-insensitive string...  value:case-sensitive
        //so, we're saving each class only once, spelling it the way it is spelled the last time we find it
        //echo "courseItemString is " . $courseItemString . "<br>";
    }

    //Process courseArray with a ForEach loop, add to database
    //echo "<br> Now to process courseArray with a foreach loop: <br>";
    $rowCount = 0;
    $testingCount = 0;
    foreach ($courseArray as $courseKey => $courseValue){  //
        $courseToAdd = explode("|", $courseValue);
        $rowCount += addNewCourse($courseToAdd[0],$courseToAdd[1],$courseToAdd[2],$courseToAdd[3]);
        $testingCount++;
        echo "Iteration: " . $testingCount . "   Rows inserted: " . $rowCount .
             "... " . $courseValue . "<br>";
    }
    echo    "There are " . count($courseArray) . " items in courseArray. <br>".
        "There should be " . count($courseArray) . " rows inserted into table Course. <br>";
    $errorMessage = "Inserted $rowCount rows into table Course. <br>";
    echo $errorMessage . "<br>";

    //process subjectArray with a ForEach loop, add to database
    $rowCount = 0;
    $testingCount = 0;
    echo sizeof($subjectArray) . " unique subjects found in Courses file, attempting to add to Subject table:<br>";
    foreach ($subjectArray as $subjectKey => $subjectValue){
        $rowCount += addNewSubject($subjectValue);
        $testingCount++;
        echo "Iteration: " . $testingCount . "   Subjects inserted: " . $rowCount .
            "... " . $subjectValue . "<br>";
    }


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
    $rowTotal = 0;
    $oldestTerm = 0;
    $currentTerm = 0;
    $latestTerm = 0;
    $currentDate = date ("Y-m-d");
    echo "<br> current date is " . $currentDate . "<br>";
    fgetcsv($file);//skip first line
    while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
        //INSERT INTO Classes <each field>
        $rowTotal++;
        $rowCount += addNewCourseOffering($rowTotal, $data[0], $data[1], $data[2], $data[3], $data[4], str_replace(' ', '', $data[5]), $data[6], $data[7], $data[8], $data[9], $data[10], $data[11], $data[12], $data[13]);
        //on first row, set $lowest and $latest to the first term we read
        if ($rowTotal == 1){
            $oldestTerm = $data[2];
            $latestTerm = $data[2];
        }
        //if the term we read is lower  than our current Oldest Term, its our new value
        //if the term we read is higher than our current Latest Term, its our new value
        if ($data[2] < $oldestTerm)
            $oldestTerm = $data[2];
        if ($data[2] > $latestTerm)
            $latestTerm = $data[2];
    }   //rowcount increments when a row is affected, addNewStudent returns 1
    echo    "There are " . $rowTotal . " rows in Course CSV file. <br>".
    "There should be " . $rowTotal . " rows inserted into table CourseOffering. <br>";
    $errorMessage = "Inserted $rowCount rows into table CourseOffering.<br>";
    echo $errorMessage;

    //Term settings stuff

    $currentTermInDB = getCurrentTerm();
    $currentTerm = $currentTermInDB;
    if ($currentTerm == 0)
        $currentTerm = $latestTerm;
    echo "<br><br>Our Oldest Term is " . $oldestTerm . " and our Latest Term is " . $latestTerm . "<br>";
    //NOW
    //  WE GOTTA insert the terms into settings bruh
    echo "current term in the database settings is " . $currentTermInDB . '<br>';
    //if we find a newer term than our current term in the database
    if ($currentTermInDB != $latestTerm)
        echo "Our Latest Term has been updated, may need to update Current Term.<br>";
    echo "the date is " . $currentDate . '<br>';
    if(updateSettings($oldestTerm, $currentTerm, $latestTerm, $currentDate))
        echo "Settings have been updated!<br>";
    echo "Set current term to: <br>";
    echo "<button onclick='updateCurrentTermUsingJSON(this.value)' value ='" . $currentTermInDB . "'>" . $currentTermInDB . "</button>&nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp 
          <button onclick='updateCurrentTermUsingJSON(this.value)' value ='" . $latestTerm . "'>" . $latestTerm .  "</button><br>
          Or enter custom value...<input name='customTerm' id='customTerm' type = text /><button onclick='updateCurrentTermUsingJSON(document.getElementById(`customTerm`).value)' value='Go'>Go</button>
          <div id='updatedTermLabel'></div>";

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
    if (checkIfCSV($_FILES['ufstudclass']['type'])){
        $isCSV = true;
        echo "This file is compatible as a CSV" . "<br>";
    }
    else {
        $isCSV = false;
        echo "this file is not compatible as a CSV" . "<br>";
    }

    if ($isCSV){
        $file = fopen($_FILES['ufstudclass']['tmp_name'], "r");
    }
    else {
        //open file and validate that it is the right file
        $xlsx = new SimpleXLSX( $_FILES['ufstudclass']['tmp_name'] );
        $file = tmpfile();
        foreach( $xlsx->rows() as $fields ) {
            fputcsv( $file, $fields);
        }
        rewind($file); //go to top
    }

    $headerRow = fgetcsv($file); //load first line before looping, skips first line for output$headerRow = fgetcsv($file); //load first line before looping, skips first line for output
    if ($headerRow[8] != "Grade" or $headerRow[9] != "Type"){
        echo "Please choose an accurate *STUDENTSCLASSES* file." . "<br>";
    } else echo "StudentsClasses file has been chosen correctly." . "<br>"; echo "<br>";
    clearTable("studentclass");  //deletes all rows in StudentsClasses
    $rowCount = 0;
    $rowTotal = 0;
    while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
        //INSERT INTO StudentsClasses <each field>
        $rowTotal++;
        $rowCount += addNewStudentCourse($rowTotal, $data[0], $data[2], $data[3], $data[4], $data[5], $data[6], $data[8], $data[7]);
        $subjectItem = $data[4];
        $subjectArray[strtoupper($subjectItem)] = $subjectItem;
    }                                           //addNewStudentsClasses^^^
    echo    "There are " . $rowTotal . " rows in Students-Courses CSV file. <br>".
        "There should be " . $rowTotal . " rows inserted into table StudentCourse. <br>";
    $errorMessage = "Inserted $rowCount rows into table Students-Classes.<br>";
    echo $errorMessage;

    //process subjectArray with a ForEach loop, add to database
    $rowCount = 0;
    $testingCount = 0;
    echo sizeof($subjectArray) . " unique subjects found in Students-Courses file, attempting to add to Subject table:<br>";
    foreach ($subjectArray as $subjectKey => $subjectValue){
        $rowCount += addNewSubject($subjectValue);
        $testingCount++;
        echo "Iteration: " . $testingCount . "   Subjects inserted: " . $rowCount .
            "... " . $subjectValue . "<br>";
    }
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