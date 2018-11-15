<?php
//Instructor,Name,Term,Session,Subject,Catalog,Section,Descr,Count ID,Acad Org,Start Time,End Time,Days,Cap Enrl
function addNewCourse($Subject, $Catalog, $Name, $Acad_Org) {
    try {
        $db = getDBConnection();
        $query = "INSERT INTO `cis411_csaApp`.`Course` 
                      ( `Subject`, `Catalog`, `Name`,`Acad_Org`) 
                      VALUES (:subject, :catalog, :name, :acad_org)";
        $statement = $db->prepare($query);  //do we need a NULL value first?  ^^
        //echo $query;
        //$statement->bindValue(':instructor', "$InstructorName");
        $statement->bindValue(':subject', "$Subject");
        $statement->bindValue(':catalog', "$Catalog");
        $statement->bindValue(':name', "$Name");       //do we need 'name' and 'descr' ??
        $statement->bindValue(':acad_org', "$Acad_Org");
        $statement->execute();
        $statement->closeCursor();
        //$statement->debugDumpParams();
        //echo(getLastInsertRow("Name", "course"));
        $errorCode = $statement->errorCode();
        if ($errorCode != "00000")
            echo "Error code $errorCode:  Attempted to insert duplicate Primary Key:   "
                . $Acad_Org. " " .  $Subject .  $Catalog . " " .  $Name . "<br>"
                . "Duplicate course offering found in import file. <br><br>";
        return $statement->rowCount();         // Number of rows affected
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        die;
    }
}
function addNewCourseOffering($rowTotal, $Instructor, $InstructorName, $Term, $Session, $Subject, $Catalog, $Section, $Descr, $Count_ID, $Acad_Org, $Start_Time, $End_Time, $Days, $Cap_Enrl) {
    try {
        $db = getDBConnection();
        $query = "INSERT INTO `cis411_csaApp`.`CourseOffering` 
                      ( `Term`, `Session`, `Subject`, `Catalog`, `Section`, `InstructorName`, `Count_ID`,`Start_Time`, `End_Time`, `Days`, `Cap_Enrl`) 
                      VALUES (:term, :session, :subject, :catalog, :section,:instructorname, :count_id, :start_time, :end_time, :days, :cap_enrl)";
        $statement = $db->prepare($query);  //do we need a NULL value first?  ^^
        //echo $query;
        //$statement->bindValue(':instructor', "$InstructorName");
        $statement->bindValue(':instructorname', "$InstructorName");
        $statement->bindValue(':term', "$Term");
        $statement->bindValue(':session', "$Session");
        $statement->bindValue(':subject', "$Subject");
        $statement->bindValue(':catalog', "$Catalog");
        $statement->bindValue(':section', "$Section");
        //$statement->bindValue(':descr', "$Descr");
        $statement->bindValue(':count_id', "$Count_ID");
        //$statement->bindValue(':acad_org', "$Acad_Org");
        $statement->bindValue(':start_time', "$Start_Time");
        $statement->bindValue(':end_time', "$End_Time");
        $statement->bindValue(':days', "$Days");
        $statement->bindValue(':cap_enrl', "$Cap_Enrl");
        $statement->execute();
        //echo "\nPDO::errorCode(): " . $statement->errorCode() . "<br>";  //print errorcode
        $errorCode = $statement->errorCode();
        if ($errorCode != "00000"){
            if ($errorCode == "23000")
                echo "Error code $errorCode:  Duplicate Entry Found:   "
                    . $InstructorName. " " .  $Term . " " .  $Subject . " " . $Session  . " " .  $Catalog . " " .  $Section . "<br>"
                    . "On line " . $rowTotal . " <br><br>";
            else echo "Error code $errorCode:  "
                . $InstructorName. " " .  $Term . " " .  $Subject . " " . $Session  . " " .  $Catalog . " " .  $Section . "<br>"
                . "On line " . $rowTotal . " <br><br>";
        }

        $statement->closeCursor();
        //$statement->debugDumpParams();
        return $statement->rowCount();         // Number of rows affected
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        echo "This one didnt work";
        include '../view/errorPage.php';
        die;
    }
}

function addNewStudent($ID, $Name, $Last_Term, $Current, $Location,$Total, $GPA, $Plan_1, $Plan_1_Descr, $Plan_2, $Plan_2_Descr, $Plan_3, $Plan_3_Descr, $Plan_4, $Plan_4_Descr, $Plan_5, $Plan_5_Descr, $Phone, $EagleMail_ID, $Advisor_1, $Advisor_1_Email, $Advisor_2, $Advisor_2_Email, $Degree_Term, $Degree, $Deg_Plan_1, $Deg_Plan_2, $Deg_Plan_3, $Deg_Plan_4, $Deg_Plan_5 ) {
    try {
        $db = getDBConnection();
        $query = "INSERT INTO `cis411_csaApp`.`Student` 
                      (`ID`, `Name`, `Last_Term`, `Current`, `Location`, `Total`, `GPA`, `Phone`, `EagleMail_ID`, `Advisor_1`, `Advisor_1_Email`, `Advisor_2`, `Advisor_2_Email`, `Degree_Term`, `Degree`, `Graduated_Plan_1`, `Graduated_Plan_2`, `Graduated_Plan_3`, `Graduated_Plan_4`, `Graduated_Plan_5`) 
                      VALUES (:id, :name, :last_term, :current, :location, :total, :gpa, :phone, :eaglemail_id, :advisor_1, :advisor_1_email, :advisor_2, :advisor_2_email, :degree_term, :degree, :deg_plan_1, :deg_plan_2, :deg_plan_3, :deg_plan_4, :deg_plan_5)";
        //$queryTest = "INSERT INTO `cis411_csaApp`.`Students`
        //              (`ID`, `Name`, `Last_Term`, `Current`, `Location`, `Total`, `GPA`, `Plan_1`, `Plan_1_Descr`, `Plan_2`, `Plan_2_Descr`, `Plan_3`, `Plan_3_Descr`, `Plan_4`, `Plan4_Descr`, `Plan_5`, `Plan_5_Descr`, `Phone`, `EagleMail_ID`, `Advisor_1`, `Advisor_1_Email`, `Advisor_2`, `Advisor_2_Email`, `Degree_Term`, `Degree`, `Deg_Plan_1`, `Deg_Plan_2`, `Deg_Plan_3`, `Deg_Plan_4`, `Deg_Plan_5`) VALUES ('11111132', 'David', '11', 'David', 'David', '11', '11', 'David', 'David', 'David', 'David', 'David', 'David', 'David', 'David', 'David', 'David', 'David', 'David', 'David', 'David', 'David', 'David', '11', 'David', 'David', 'David', 'David', 'David', 'David');";
        $statement = $db->prepare($query);
        //echo $query;
        $statement->bindValue(':id', "$ID");
        $statement->bindValue(':name', "$Name");
        $statement->bindValue(':last_term', "$Last_Term");
        $statement->bindValue(':current', "$Current");
        $statement->bindValue(':location', "$Location");
        $statement->bindValue(':total', "$Total");
        $statement->bindValue(':gpa', "$GPA");/*
        $statement->bindValue(':plan_1', "$Plan_1");
        $statement->bindValue(':plan_1_descr', "$Plan_1_Descr");
        $statement->bindValue(':plan_2', "$Plan_2");
        $statement->bindValue(':plan_2_descr', "$Plan_2_Descr");
        $statement->bindValue(':plan_3', "$Plan_3");
        $statement->bindValue(':plan_3_descr', "$Plan_3_Descr");
        $statement->bindValue(':plan_4', "$Plan_4");
        $statement->bindValue(':plan_4_descr', "$Plan_4_Descr");
        $statement->bindValue(':plan_5', "$Plan_5");
        $statement->bindValue(':plan_5_descr', "$Plan_5_Descr");*/
        $statement->bindValue(':phone', "$Phone");
        $statement->bindValue(':eaglemail_id', "$EagleMail_ID");
        $statement->bindValue(':advisor_1', "$Advisor_1");
        $statement->bindValue(':advisor_1_email', "$Advisor_1_Email");
        $statement->bindValue(':advisor_2', "$Advisor_2");
        $statement->bindValue(':advisor_2_email', "$Advisor_2_Email");
        $statement->bindValue(':degree_term', "$Degree_Term");
        $statement->bindValue(':degree', "$Degree");
        $statement->bindValue(':deg_plan_1', "$Deg_Plan_1");
        $statement->bindValue(':deg_plan_2', "$Deg_Plan_2");
        $statement->bindValue(':deg_plan_3', "$Deg_Plan_3");
        $statement->bindValue(':deg_plan_4', "$Deg_Plan_4");
        $statement->bindValue(':deg_plan_5', "$Deg_Plan_5");
        $statement->execute();
        $statement->closeCursor();
        return $statement->rowCount();         // Number of rows affected
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        die;
    }
}
//Instructor,Name,Term,Session,Subject,Catalog,Section,Descr,Count ID,Acad Org,Start Time,End Time,Days,Cap Enrl
function addNewSubject($Subject) {
    try {
        $db = getDBConnection();
        $query = "INSERT INTO `cis411_csaApp`.`Subject` 
                      ( `Subject`) 
                      VALUES (:subject)";
        $statement = $db->prepare($query);  //do we need a NULL value first?  ^^
        $statement->bindValue(':subject', "$Subject");
        $statement->execute();
        $statement->closeCursor();
        //$statement->debugDumpParams();
        //echo(getLastInsertRow("Name", "course"));
        $errorCode = $statement->errorCode();
        if ($statement->rowCount() < 1)
            echo "Row was not inserted for: " . $Subject . " Error code: " . $errorCode . "<br>";
        if ($errorCode != "00000")
            echo "Error code $errorCode:  Attempted to insert duplicate Primary Key:   "
                . $Subject . "<br>"
                . "Duplicate subject found in import file. <br><br>";
        return $statement->rowCount();         // Number of rows affected
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        die;
    }
}
//rowtotal is just for debugging info
function addNewProgram($rowTotal, $Plan, $PlanDescr) {
    try {
        $db = getDBConnection();
        $query = "INSERT INTO `cis411_csaApp`.`acad_program` 
                      (`Plan`, `Plan_Descr`) 
                      VALUES (:plan, :descr)";

        $statement = $db->prepare($query);  //do we need a NULL value first?  ^^
        $statement->bindValue(':plan', "$Plan");
        $statement->bindValue(':descr', "$PlanDescr");
        //echo $query;
        $statement->execute();
        $statement->closeCursor();
        //$statement->debugDumpParams();
        $errorCode = $statement->errorCode();
        if ($errorCode != "00000")
            echo "Error code $errorCode:  Integrity Constraint Violation:   "
                . $Plan . " " .  $PlanDescr . " <br>"
                . "On line " . $rowTotal . " <br><br>";
        //echo $rowTotal . " has error code: " . $errorCode . "<br>";
        return $statement->rowCount();         // Number of rows affected
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        die;
    }
}

//rowtotal is just for debugging info
function addNewStudentMajor($rowTotal, $ID, $Plan) {
    try {
        $db = getDBConnection();
        $query = "INSERT INTO `cis411_csaApp`.`studentmajor` 
                      (`ID`, `Plan`) 
                      VALUES (:id, :plan)";

        $statement = $db->prepare($query);  //do we need a NULL value first?  ^^
        $statement->bindValue(':plan', "$Plan");
        $statement->bindValue(':id', "$ID");
        //echo $query;
        $statement->execute();
        $statement->closeCursor();
        //$statement->debugDumpParams();
        $errorCode = $statement->errorCode();
        if ($errorCode != "00000")
            echo "Error code $errorCode:  Integrity Constraint Violation:   "
                . $Plan . " " .  $ID . " <br>"
                . "On line " . $rowTotal . " <br><br>";
        if ($statement->rowCount() == 0){
            echo "Error code $errorCode:  <br> StudentMajor not added:   "
                . "ID of: " . $ID . " --- Plan of: " .  $Plan . " <br>"
                . "On line " . $rowTotal . " <br> ";
            echo "Is there a duplicate entry for this ID in our import data?<br><br>";
            //echo $rowTotal . " is the rowtotal and " . $ID . " " . $Plan . " is our thing. <br>";
        }

        //echo $rowTotal . " has error code: " . $errorCode . "<br>";
        return $statement->rowCount();         // Number of rows affected
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        die;
    }
}

//rowtotal is just for debugging info
function addNewStudentCourse($rowTotal, $ID, $Term, $Session, $Subject, $Catalog, $Section, $Grade, $Descr) {
    try {
        $db = getDBConnection();
        $query = "INSERT INTO `cis411_csaApp`.`studentclass` 
                      (`ID`, `Term`, `Session`, `Subject`, `Catalog`, `Section`, `Grade`, `Descr`) 
                      VALUES (:id, :term, :session, :subject, :catalog, :section, :grade, :descr)";
        //$queryTest = "INSERT INTO `studentclass` (`ID`, `Name`, `Term`, `Session`, `Subject`, `Catalog`, `Section`, `Descr`, `Grade`, `Type`) VALUES ('11020640', 'Aaron,Shianne E', '2098', '1', 'CIS', '217', '03', 'Appl Of Micro', 'A', 'OG');";
        $statement = $db->prepare($query);  //do we need a NULL value first?  ^^
        $statement->bindValue(':id', "$ID");
        $statement->bindValue(':term', "$Term");
        $statement->bindValue(':session', "$Session");
        $statement->bindValue(':subject', "$Subject");
        $statement->bindValue(':catalog', "$Catalog");
        $statement->bindValue(':section', "$Section");
        $statement->bindValue(':grade', "$Grade");
        $statement->bindValue(':descr', "$Descr");
        //echo $query;
        $statement->execute();
        $statement->closeCursor();
        //$statement->debugDumpParams();
        $errorCode = $statement->errorCode();
        if ($errorCode != "00000")
            echo "Error code $errorCode:  Integrity Constraint Violation:   "
                . $ID . " " .  $Term . " " . $Session  . " " .  $Subject . " " .  $Catalog . " " .  $Section . "<br>"
                . "On line " . $rowTotal . " <br><br>";
        //echo $rowTotal . " has error code: " . $errorCode . "<br>";
        return $statement->rowCount();         // Number of rows affected
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        die;
    }
}
function clearTable($tableName ) {
    try {
        $db = getDBConnection();
        $query = "DELETE FROM $tableName";
        $statement = $db->prepare($query);
        $statement->execute();
        $count = $statement->rowCount();
        $statement->closeCursor();
        echo $count . " rows were deleted from table: " . $tableName . "<br>";
        return $count;           // return # of rows affected
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        die;
    }
}

function getCourseHistory($pStudentToLookup) {
    try {
        //echo "Model is echoing," . $pStudentToLookup . '<br>';
        $db = getDBConnection();
        //$query = "SELECT * FROM `cis411_csaapp`.`studentclass` WHERE `ID` = " . "$pStudentToLookup" . "why are there symbols here";
        $query = "SELECT * FROM `studentclass` WHERE ID = $pStudentToLookup";
        //echo $query;
        $statement = $db->prepare($query);
        //$statement->bindValue(':id', "$pStudentToLookup");
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
function getAllCourses() {
    try {
        $db = getDBConnection();
        $query = "select * from Course";
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
function getAllAcademicPrograms() {
    try {
        $db = getDBConnection();
        $query = "select * from Acad_Program";
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
//////////////////////////////////////
/// WHERE CLAUSE
//////////////////////////////////////
/// If you'd like to see the results of this current hardcoded question, visit SQL Example Scripts
/// There, we also demonstrate the processed results after CombineJoinResults is used.
///
/// At this point, we still need to say for Taking / Scheduled For / Taking/Completed 
///     WHERE Term == $currentTerm
function getStudentQuestionResults() {
    try {
        $db = getDBConnection();

        //we will use this to determine "taking", "scheduled for", "taking/completed"
        $currentTerm = getCurrentTerm();

        //we will use these ones for "Completed", "Not Completed" as this is the only time range matters.
        //these are defaulted here, but change based on user selection from Student Question
        $lowerTerm  = 2011; //spring 2001 is lowest term
        $higherTerm = 2188; //fall 2018 is highest term

                  //always start with this.  it determines what our results will look like
        $query = "SELECT student.ID, NAME, LOCATION, CURRENT, Last_Term, Total, GPA, EagleMail_ID, Plan
                  FROM student 
                  INNER JOIN studentmajor ON student.ID = studentmajor.ID
                  WHERE TRUE "

                  //then, any number of AND statements that represent our selections:

                  //Students with a CS Major
                  ."AND ID IN 
                  (SELECT ID FROM studentmajor WHERE PLAN = 'BS CS')"

                  //Who are a Sophomore
                  ."AND Total >= 30 AND Total < 60"

                  //who's location is clarion
                  ."AND LOCATION = 'Clarion'"

                  //who are not current students
                  ."AND CURRENT = 'N'"

                  //who's GPA is greater than 2.0
                  ."AND GPA > 2.000"

                  //who have completed a 200's level CS class
                  //where the class was completed between Spring 2002 (2021) and Fall 2009 (2098) **changed to variable value now
                  //where the class was between lowerTerm and higherTerm, chosen from dropdowns on Student Question
                  //where they got a C or higher
                    ."
                          AND student.ID IN (
                          SELECT ID FROM studentclass 
                          WHERE Subject = 'CIS' 
                          AND Catalog BETWEEN 200 AND 299
                          AND Term BETWEEN $lowerTerm AND $higherTerm
                          AND Grade = 'A' OR 'B' OR 'C')"

        ;
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
////////////////////////////////////////
function getAllSubjects() {
    try {
        $db = getDBConnection();
        $query = "select * from Subject";
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
function getAllTerms() {
    try {
        $db = getDBConnection();
        $query = "select Oldest_Term, Current_Term, Latest_Term from Settings";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();
        return $results;           // Assoc Array of Rows
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        die;
    }
}
function getAllUsers() {
    try {
        $db = getDBConnection();
        $query = "select * from Users";
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
function getProgramSubjects($pProgramName) {
    try {
        $db = getDBConnection();
        $query = "SELECT * FROM programsubject WHERE Plan='" . $pProgramName . "'";
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

function getUserPrograms($pUserName) {
    try {
        $db = getDBConnection();
        $query = "SELECT * FROM userprograms WHERE UserName='" . $pUserName . "'";
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
//remove all the entries with that Program, then add the selected ones
function updateProgramSubjects($pProgramName, $addSubjects)
{
    try {
        $rowCount = 0;
        $db = getDBConnection();
        $query = "DELETE FROM programsubject WHERE Plan= :programName";
        $statement = $db->prepare($query);
        $statement->bindValue(':programName', $pProgramName);
        $statement->execute();
        ////process the array that was passed in
        for ($i = 0; $i < count($addSubjects); $i++) {
            $subjectToAdd = $addSubjects[$i];
            $query = "INSERT INTO programsubject (`Plan`, `Subject`) VALUES (:programName, :subjectToAdd)";
            $statement = $db->prepare($query);
            $statement->bindValue(':programName', $pProgramName);
            $statement->bindValue(':subjectToAdd', $subjectToAdd);
            $success = $statement->execute();
            $rowCount += $statement->rowCount();
        }
        $statement->closeCursor();
        return $rowCount;           // how many rows affected
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        //die;
    }
}

//remove all the entries with that Program, then add the selected ones
function updateUserPrograms($pUserName, $addPrograms)
{
    try {
        $rowCount = 0;
        $db = getDBConnection();
        $query = "DELETE FROM userprograms WHERE UserName= :userName";
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $pUserName);
        $statement->execute();
        ////process the array that was passed in
        for ($i = 0; $i < count($addPrograms); $i++) {
            $programToAdd = $addPrograms[$i];
            $query = "INSERT INTO userprograms (`UserName`, `Plan`) VALUES (:userName, :programToAdd)";
            $statement = $db->prepare($query);
            $statement->bindValue(':userName', $pUserName);
            $statement->bindValue(':programToAdd', $programToAdd);
            $success = $statement->execute();
            $rowCount += $statement->rowCount();
        }
        $statement->closeCursor();
        return $rowCount;           // how many rows affected
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        //die;
    }
}

function getNotProgramSubjects($pProgramName) {
    try {
        $db = getDBConnection();
        $query = "SELECT * FROM programsubject WHERE Plan <>'" . $pProgramName . "'";
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
function getDBConnection() {
    $dsn = 'mysql:host=localhost;dbname=cis411_csaApp';
    $username = 's_dmodonnell';
    $password = 'Mysteriummmm06';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        die;
    }
    return $db;
}
function getLastInsertRow($columnName, $tableName){

    try {
        $db = getDBConnection();
        $query = "SELECT LAST($columnName) FROM $tableName";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        die;
    }
}
function getCurrentTerm(){

    try {
        $db = getDBConnection();
        $query = "SELECT Current_Term FROM settings
                  ORDER BY Current_Term DESC
                  LIMIT 1;";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result[0];
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        die;
    }
}
//returns the count of rows of a table, returns just a number, not an array
function countRows($tablename){

    try {
        $db = getDBConnection();
        $query = "SELECT COUNT(*) FROM $tablename";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result[0];
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        die;
    }
}

//remove all the entries with that Program, then add the selected ones
function updateSettings($pOldestTerm, $pCurrentTerm, $pLatestTerm, $pDate)
{
    try {
        //clear the settings if they exist
        clearTable('settings');
        $db = getDBConnection();
        $query = "INSERT INTO `cis411_csaApp`.`Settings` 
                          ( `Oldest_Term`, `Current_Term`,`Latest_Term`, `Last_Import_Date`) 
                          VALUES (:oldestterm, :currentterm, :latestterm, :date)";
        $statement = $db->prepare($query);  //do we need a NULL value first?  ^^
        $statement->bindValue(':oldestterm', "$pOldestTerm");
        $statement->bindValue(':currentterm', "$pCurrentTerm");
        $statement->bindValue(':latestterm', "$pLatestTerm");
        $statement->bindValue(':date', "$pDate");
        $statement->execute();
        $statement->closeCursor();
        $errorCode = $statement->errorCode();
        if ($statement->rowCount() < 1)
            echo "Row was not inserted  Error code: " . $errorCode . "<br>";

        return $statement->rowCount();         // Number of rows affected
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        die;
}

}
function updateCurrentTerm($pCurrentTerm)
{
    try {
        $db = getDBConnection();
        $query = "    UPDATE Settings
                          SET Current_Term = :currentterm;";
        $statement = $db->prepare($query);  //do we need a NULL value first?  ^^
        $statement->bindValue(':currentterm', "$pCurrentTerm");
        $statement->execute();
        $statement->closeCursor();
        $errorCode = $statement->errorCode();

        return $pCurrentTerm;         // Number of rows affected
    } catch (PDOException $e) {
        $errorMessage = $e->getMessage();
        include '../view/errorPage.php';
        die;
    }
}
function logSQLError($errorInfo) {
    $errorMessage = $errorInfo[2];
    include '../view/errorPage.php';
}


function constructSavedSearch($serialID){
    $row = getSerial($serialID);
    if ($row == false) {
        displayError("<p>Serial ID is not on file.</p> ");
    } else {
        return $serial = $row["serial"];
    }
}
/*
function AskQuestion(){
    $user = $_SESSION['username'];
    $results = getSerialsForUser($user);

    include '../view/MainApplicationStudentQuestion.php';
}*/

function RebuildQuestion(){
    $serialID = 0;
    try {
        if( isset($_GET['SerialID']) ) { $serialID = $_GET['SerialID']; }
        //save the serial string into a variable to be unserialized
        $serial = constructSavedSearch($serialID);
        $form = unserialize($serial);

        include '../view/MainApplicationStudentQuestion.php';

    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}


function combineJoinResults($pStudentArray){
    //convert Program to an array so we can merge later
    for ($i = 0; $i < count($pStudentArray); $i++) {
        $temp = $pStudentArray[$i]['Plan'];
        $pStudentArray[$i]['Plan'] = array($temp);
    }
    //save the original length of the array, before casting the children back to hell where they belong:
    $originalLength = count($pStudentArray);
    //merge the Program arrays that each studentRow holds with the Program arrays of matching students
    for ($i = 0; $i < count($pStudentArray); $i++){
        //take all the kiddos for ur array lasso
        //a student can have up to five programs, so to avoid going out of bounds of the array, we use magic:
        //So the parent looks at its children and grabs Programs:
        if(isset($pStudentArray[$i]));{
            if ($i < (count($pStudentArray) - 4)){    //don't look past the end of the array
                if ($pStudentArray[$i]['ID'] == $pStudentArray[($i+1)]['ID']){
                    $pStudentArray[$i]['Plan'] = array_merge($pStudentArray[$i]['Plan'], $pStudentArray[$i+1]['Plan']);
                    $pStudentArray[$i+1]['ID'] = 6666666; //children are the devil
                }
                if ($pStudentArray[$i]['ID'] == $pStudentArray[($i+2)]['ID']){
                    $pStudentArray[$i]['Plan'] = array_merge($pStudentArray[$i]['Plan'], $pStudentArray[$i+2]['Plan']);
                    $pStudentArray[$i+2]['ID'] = 6666666; //children are the devil
                }
                if ($pStudentArray[$i]['ID'] == $pStudentArray[($i+3)]['ID']){
                    $pStudentArray[$i]['Plan'] = array_merge($pStudentArray[$i]['Plan'], $pStudentArray[$i+3]['Plan']);
                    $pStudentArray[$i+3]['ID'] = 6666666; //children are the devil
                }
                if ($pStudentArray[$i]['ID'] == $pStudentArray[($i+4)]['ID']){
                    $pStudentArray[$i]['Plan'] = array_merge($pStudentArray[$i]['Plan'], $pStudentArray[$i+4]['Plan']);
                    $pStudentArray[$i+4]['ID'] = 6666666; //children are the devil
                }
            }
            if ($i == (count($pStudentArray) - 4)){    //don't look past the end of the array
                if ($pStudentArray[$i]['ID'] == $pStudentArray[($i+1)]['ID']){
                    $pStudentArray[$i]['Plan'] = array_merge($pStudentArray[$i]['Plan'], $pStudentArray[$i+1]['Plan']);
                    $pStudentArray[$i+1]['ID'] = 6666666; //children are the devil
                }
                if ($pStudentArray[$i]['ID'] == $pStudentArray[($i+2)]['ID']){
                    $pStudentArray[$i]['Plan'] = array_merge($pStudentArray[$i]['Plan'], $pStudentArray[$i+2]['Plan']);
                    $pStudentArray[$i+2]['ID'] = 6666666; //children are the devil
                }
                if ($pStudentArray[$i]['ID'] == $pStudentArray[($i+3)]['ID']){
                    $pStudentArray[$i]['Plan'] = array_merge($pStudentArray[$i]['Plan'], $pStudentArray[$i+3]['Plan']);
                    $pStudentArray[$i+3]['ID'] = 6666666; //children are the devil
                }
            }
            if ($i == (count($pStudentArray) - 3)){    //don't look past the end of the array
                if ($pStudentArray[$i]['ID'] == $pStudentArray[($i+1)]['ID']){
                    $pStudentArray[$i]['Plan'] = array_merge($pStudentArray[$i]['Plan'], $pStudentArray[$i+1]['Plan']);
                    $pStudentArray[$i+1]['ID'] = 6666666; //children are the devil
                }
                if ($pStudentArray[$i]['ID'] == $pStudentArray[($i+2)]['ID']){
                    $pStudentArray[$i]['Plan'] = array_merge($pStudentArray[$i]['Plan'], $pStudentArray[$i+2]['Plan']);
                    $pStudentArray[$i+2]['ID'] = 6666666; //children are the devil
                }
            }
            if ($i == (count($pStudentArray) - 2)){    //don't look past the end of the array
                if ($pStudentArray[$i]['ID'] == $pStudentArray[($i+1)]['ID']){
                    $pStudentArray[$i]['Plan'] = array_merge($pStudentArray[$i]['Plan'], $pStudentArray[$i+1]['Plan']);
                    $pStudentArray[$i+1]['ID'] = 6666666; //children are the devil
                }
            }
        }
    }
    //then, we send the children back to hell where they belong:
    for ($i = 0; $i < $originalLength; $i++){
        if ($pStudentArray[$i]['ID'] == 6666666)
            unset($pStudentArray[$i]);
    }
    //and we end up with the array that we need for Vinny's results page:
    return $pStudentArray;


}
?>
