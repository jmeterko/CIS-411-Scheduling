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
function addNewStudentCourse($rowTotal, $ID, $Term, $Session, $Subject, $Catalog, $Section) {
    try {
        $db = getDBConnection();
        $query = "INSERT INTO `cis411_csaApp`.`studentclass` 
                      (`ID`, `Term`, `Session`, `Subject`, `Catalog`, `Section`) 
                      VALUES (:id, :term, :session, :subject, :catalog, :section)";
        //$queryTest = "INSERT INTO `studentclass` (`ID`, `Name`, `Term`, `Session`, `Subject`, `Catalog`, `Section`, `Descr`, `Grade`, `Type`) VALUES ('11020640', 'Aaron,Shianne E', '2098', '1', 'CIS', '217', '03', 'Appl Of Micro', 'A', 'OG');";
        $statement = $db->prepare($query);  //do we need a NULL value first?  ^^
        $statement->bindValue(':id', "$ID");
        $statement->bindValue(':term', "$Term");
        $statement->bindValue(':session', "$Session");
        $statement->bindValue(':subject', "$Subject");
        $statement->bindValue(':catalog', "$Catalog");
        $statement->bindValue(':section', "$Section");
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
function getDBConnection() {
    $dsn = 'mysql:host=localhost;dbname=cis411_csaApp';
    $username = 's_vjconiglio';
    $password = 'baseball';

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
function logSQLError($errorInfo) {
    $errorMessage = $errorInfo[2];
    include '../view/errorPage.php';
}
?>