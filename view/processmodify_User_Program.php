
<?php
if (isset($_POST["hasPrograms"], $_POST['UserSelect'])){
    $addPrograms = $_POST["hasPrograms"];
    //print_r($addSubjects) ;
    $selectedUser = $_POST["UserSelect"];
    $selectedUserID = getUserIDforUserName($selectedUser);
    $rowsAdded = updateUserPrograms($selectedUserID, $selectedUser, $addPrograms);
    $userProgramDump = "";
    $userProgramDump .= "<br>There were " . $rowsAdded . " programs added to the user " . $selectedUser . ".";
    $userProgramDump .= "<br>" . $selectedUser . " now includes:  <br>";
    for ($i = 0; $i < count($addPrograms); $i++)
        $userProgramDump .= "   " . $addPrograms[$i] . "<br>";
    $userProgramDump .= "<h3>Your modifications have been made.</h3>";
}


include "../view/modify_User_Program_Form.php";
?>


