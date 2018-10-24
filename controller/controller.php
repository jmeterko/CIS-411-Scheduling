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
    case 'HomePage':
        include '../view/HomePage.php';
        break;
    case 'ImportData':
        include '../view/importData.php';
        break;
    case 'Login':
        include '../view/LoginPage.php';
        break;
    case 'StudentQuestion':
        $courseResults = getAllCourses();
        $programResults = getAllAcademicPrograms();
        include '../view/MainApplicationStudentQuestion.php';
        break;
    case 'Home':
        include '../view/LoginPage.php';
        break;
    case 'ProcessImportData':
        include '../view/processImportData.php';
        break;
    case 'Wireframe':
        include '../view/wireframe.php';
        break;
    default:
        include('../view/LoginPage.php');   // default
}

?>