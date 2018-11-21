<?php
session_start();
/*$_SESSION['username'] = "admin";  //jeradstuff, comment or delete this later*/
require_once("../security/model.php");
require_once("../model/StudentQuestion.php");
require_once '../model/model.php';//require the functions from the model.php file
unQuote();          //make sure that magic_quotes_gpc added slashes are stripped back out if they are enabled.
if (isset($_POST['action'])) {  // check get and post
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    include('../view/index.php');  // default action
    exit();
}


if (!userIsAuthorized($action)) {
    if(!loggedIn()) {
        header("Location:../security/index.php?action=SecurityLogin&RequestedPage=" . urlencode($_SERVER['REQUEST_URI']));
    } else {
        include('../security/not_authorized.html');
    }
} else {

    if (isset($_POST['action'])) {  // check get and post
        $action = $_POST['action'];
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        include('../view/LoginPage.php');  // default action
        exit();
    }
    switch ($action) {
        case 'CourseQuestion':
            include '../view/MainApplicationCourseQuestion.php';
            break;
        case 'FileUpload':
            include '../view/fileUploadPage.php';
            break;
        case 'DisplayData':
            include '../view/DisplayData.php';
            break;
        case 'HomePage':
            include '../view/HomePage.php';
            break;
        case 'ImportData':
            include '../view/importDataWithAjax.php';
            break;
        case 'Loading':
            include '../view/LoadingPage.php';
            break;
        case 'Login':
            include '../view/LoginPage.php';
            break;
        case 'StudentQuestion':
            AskQuestion();
            //include '../view/mainApplicationStudentQuestion.php';  //this is my code ignore jerad's question and login stuff
            break;
        case 'ProcessStudentQuestion':
            ProcessStudentQuestion();
            break;
        case 'ProcessDisplaySerials':
            ProcessDisplaySerials();
            break;
        case 'RebuildQuestion':
            RebuildQuestion();
            break;
        case 'Home':
            include '../view/LoginPage.php';
            break;
        case 'ModifyAcadProgram':
            include '../view/modify_Acad_Program_Form.php';
            break;
        case 'ModifyUserProgram':
            include '../view/modify_User_Program_Form.php';
            break;
        case 'ProcessModifyAcadProgram':
            include '../view/processmodify_Acad_Program.php';
            break;
        case 'ProcessModifyUserProgram':
            include '../view/processmodify_User_Program.php';
            break;
        case 'ProcessImportData':
            include '../view/processImportData.php';
            break;
        case 'StudentHistory':
            include '../view/StudentHistory.php';
            break;
        case 'UpdateTermSettings':
            include '../view/updateTermSettings.php';
            break;
        case 'Wireframe':
            include '../view/wireframe.php';
            break;
        default:
            include('../view/LoginPage.php');   // default
    }
}

function unQuote() {//strips out added slashes if magic_quotes_gpc is on
    if (get_magic_quotes_gpc()) {
        function stripslashes_gpc(&$value) {
            $value = stripslashes($value);
        }
        array_walk_recursive($_GET, 'stripslashes_gpc');
        array_walk_recursive($_POST, 'stripslashes_gpc');       //strip slashes out of these php globals
        array_walk_recursive($_COOKIE, 'stripslashes_gpc');
        array_walk_recursive($_REQUEST, 'stripslashes_gpc');
    }
}
?>