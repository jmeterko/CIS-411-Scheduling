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
    case 'DisplayData':
        include '../view/DisplayData.html';
        break;
    case 'FileUpload':
        include '../view/fileUploadPage.php';
        break;
    case 'ImportData':
        include '../view/importDataWithAjax.php';
        break;
    case 'Login':
        include '../view/LoginPage.php';
        break;
    case 'StudentQuestion':
        include '../view/MainApplicationStudentQuestion.php';
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
    case 'Wireframe':
        include '../view/wireframe.php';
        break;
    default:
        include('../view/LoginPage.php');   // default
}


?>