<?php
    session_start();
    require_once("../security/model.php");  
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
    
    switch ($action) {
        case 'Example': //example action passed in url
            include '../view/index.php';
            break;       
        default:
            include('../view/index.php');//default case
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