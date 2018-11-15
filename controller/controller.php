<?php
require_once '../model/model.php';

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
    case 'DisplayData':
        include '../view/DisplayData.php';
        break;
    case 'Home':
        include '../view/LoginPage.php';
        break;
    case 'HomePage':
        include '../view/HomePage.php';
        break;
    case 'ImportData':
        include '../view/importData.php';
        break;
    case 'Loading':
        include '../view/LoadingPage.php';
        break;
    case 'Login':
        include '../security/login_form.php';
        break;
    case 'ModifyAcadProgram':
        include '../view/modifyAcadProgramUpdated.php';
        break;
    case 'ModifyUserProgram':
        include '../view/modifyUserProgramUpdated.php';
        break;
    case 'ProcessModifyAcadProgram':
        include '../view/modifyAcadProgramUpdated.php';
        break;
    case 'ProcessModifyUserProgram':
        include '../view/processmodify_User_Program.php';
        break;
    case 'Settings':
        include '../view/settings.php';
        break;
    case 'StudentQuestion':
        $courseResults = getAllCourses();
        $programResults = getAllAcademicPrograms();
        include '../view/MainApplicationStudentQuestion.php';
        break;
    case 'ProcessImportData':
        include '../view/processImportData.php';
        break;
    default:
        include('../security/login_form.php');   // default
}
?>