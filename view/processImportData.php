<?php
$title = "Import Data";
require '../view/headerInclude.php';
?>

<?php
/// Process File Import
/// Apache settings:
///                  maximumum execution time
///                  maximum file upload size
/// DB connection string
///
///


clearTable("studentclass");   //IMPORTANT must be cleared first

//call the file load functions
loadPrograms();
loadStudents();
loadClasses();
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
    clearTable("Acad_Program");  //deletes all rows in Acad_Program

    $programArray = array();//hash table implementation

    while (($data = fgetcsv($file)) !== FALSE) {
        if (!empty($data[15])){
            $ProgramItemStringValue = $data[15]."|". $data[16]; //PROGRAM|DESC
            $ProgramItemStringKey = $data[15]."|". $data[16]; //same thing
            $programArray[strtoupper($ProgramItemStringKey)] = $ProgramItemStringValue;      //add it as a key to the AssociativeArray, value is original format, key is UPPERCASE
        }

        if (!empty($data[13])){
            $ProgramItemStringValue = $data[13]."|". $data[14]; //PROGRAM|DESC
            $ProgramItemStringKey = $data[13]."|". $data[14]; //same thing
            $programArray[strtoupper($ProgramItemStringKey)] = $ProgramItemStringValue;      //add it as a key to the AssociativeArray, value is original format, key is UPPERCASE
        }
        if (!empty($data[11])){
            $ProgramItemStringValue = $data[11]."|". $data[12]; //PROGRAM|DESC
            $ProgramItemStringKey = $data[11]."|". $data[12]; //same thing
            $programArray[strtoupper($ProgramItemStringKey)] = $ProgramItemStringValue;      //add it as a key to the AssociativeArray, value is original format, key is UPPERCASE
        }
        if (!empty($data[9])){
            $ProgramItemStringValue = $data[9]."|". $data[10]; //PROGRAM|DESC
            $ProgramItemStringKey = $data[9]."|". $data[10]; //same thing
            $programArray[strtoupper($ProgramItemStringKey)] = $ProgramItemStringValue;      //add it as a key to the AssociativeArray, value is original format, key is UPPERCASE
        }
        $ProgramItemStringValue = $data[7]."|". $data[8]; //PROGRAM|DESC
        $ProgramItemStringKey = $data[7]."|". $data[8]; //same thing
        $programArray[strtoupper($ProgramItemStringKey)] = $ProgramItemStringValue;      //add it as a key to the AssociativeArray, value is original format, key is UPPERCASE
    }

    //Process programArray with a ForEach loop, add to database
    //echo "<br> Now to process courseArray with a foreach loop: <br>";
    $rowCount = 0;
    $testingCount = 0;
    foreach ($programArray as $programKey => $programValue){  //
        $programToAdd = explode("|", $programValue);
        $rowCount += addNewProgram($testingCount,$programToAdd[0],$programToAdd[1]);
        $testingCount++;
        echo "Iteration: " . $testingCount . "   Rows inserted: " . $rowCount .
            "... " . $programValue . "<br>";
    }
    echo    "There are " . count($programArray) . " items in programArray. <br>".
        "There should be " . count($programArray) . " rows inserted into table Acad_program. <br>";
    $errorMessage = "Inserted $rowCount rows into table Acad_Program. <br>";
    echo $errorMessage . "<br>";
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
    //some catalogs have multiple spellings (" 110" and "110")
    //some classes have multiple spellings ("Intro To Java" and "Intro to Java")
    $courseArray = array(); //hash table implementation
    //$courseToAdd = array();
    while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
        //file headings:       //Subject    Catalog       Name         Descr       Acad_Org
        //$courseItemString = $data[4]."|".$data[5]."|".$data[1]."|".$data[7]."|".$data[9]; //assemble a string unique to the course
        $courseItemStringValue = $data[4]."|".str_replace(' ', '', $data[5])."|".$data[7]."|".$data[9]; //SUBJ|CATA|DESCR|ACADORG //string unique to course
        $courseItemStringKey = $data[4]."|".str_replace(' ', '', $data[5]);
        //remove whitespace from catalog     ^^^
        //$courseArray[$courseItemString] = 3;      //add it as a key to the AssociativeArray, key value is meaningless
        $courseArray[strtoupper($courseItemStringKey)] = $courseItemStringValue;      //add it as a key to the AssociativeArray, value is original format, key is UPPERCASE
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

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //               ****Why are we only inserting 82 out of 162?****
    //
    //                                                          //idk wtf is up
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
    $rowTotal = 0;
    fgetcsv($file);//skip first line
    while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
        //INSERT INTO Classes <each field>
        $rowTotal++;
        $rowCount += addNewCourseOffering($rowTotal, $data[0], $data[1], $data[2], $data[3], $data[4], str_replace(' ', '', $data[5]), $data[6], $data[7], $data[8], $data[9], $data[10], $data[11], $data[12], $data[13]);
    }   //rowcount increments when a row is affected, addNewStudent returns 1
    echo    "There are " . $rowTotal . " rows in Course CSV file. <br>".
    "There should be " . $rowTotal . " rows inserted into table CourseOffering. <br>";
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
    clearTable("studentclass");  //deletes all rows in StudentsClasses
    $rowCount = 0;
    $rowTotal = 0;
    while (($data = fgetcsv($file)) !== FALSE) { //loop through the file one step at a time
        //INSERT INTO StudentsClasses <each field>
        $rowTotal++;
        $rowCount += addNewStudentCourse($rowTotal, $data[0], $data[2], $data[3], $data[4], $data[5], $data[6]);
    }                                           //addNewStudentsClasses^^^
    echo    "There are " . $rowTotal . " rows in Students-Courses CSV file. <br>".
        "There should be " . $rowTotal . " rows inserted into table StudentCourse. <br>";
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
