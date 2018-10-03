<?php
    session_start();
    require_once("../security/model.php");
    if (isset($_POST['action'])) {	    // check get and post
        $action = $_POST['action'];
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
		$action = "SecurityHome";	// Default action that guest is authorized to use.
	}

    if ($action != 'SecurityLogin' && $action != 'SecurityProcessLogin' && !userIsAuthorized($action)) {
        if(!loggedIn()) {
            header("Location:../security/index.php?action=SecurityLogin&RequestedPage=" . urlencode($_SERVER['REQUEST_URI']));
        } else {
            include('../security/not_authorized.html');
        }
    } else {
        switch ($action) {
            case 'SecurityLogin':
                if (!isset($_SERVER['HTTPS'])) {
                    $url = 'https://' . $_SERVER['HTTP_HOST'] . 
                                                      $_SERVER['REQUEST_URI'];
                    header("Location: " . $url);
                    exit();
                }
                include('login_form.php');
                break;
            case 'SecurityCheckUserNameExists':
		CheckSecurityNameExists();
                break;
            case 'SecurityProcessLogin':
                ProcessLogin();
                break;
            case 'SecurityLogOut':
		ProcessLogOut();
                break;
            case 'SecurityManageUsers':
                ManageUsers();
                break;
            case 'SecurityUserAdd':
                UserAdd();
                break;
            case 'SecurityUserEdit':
                UserEdit();
                break;
            case 'SecurityUserDelete':
                UserDelete();
                break;
            case 'SecurityProcessUserAddEdit':
                ProcessUserAddEdit();
                break;
            case 'SecurityManageFunctions':
                ManageFunctions();
                break;
            case 'SecurityFunctionAdd':
                FunctionAdd();
                break;
            case 'SecurityFunctionEdit':
                FunctionEdit();
                break;
            case 'SecurityFunctionDelete':
                FunctionDelete();
                break;
            case 'SecurityProcessFunctionAddEdit':
                ProcessFunctionAddEdit();
                break;
            case 'SecurityManageRoles':
                ManageRoles();
                break;
            case 'SecurityRoleAdd':
                RoleAdd();
                break;
            case 'SecurityRoleEdit':
                RoleEdit();
                break;
            case 'SecurityRoleDelete':
                RoleDelete();
                break;
            case 'SecurityProcessRoleAddEdit':
                ProcessRoleAddEdit();
                break;
            default:
                include('../security/control_panel_form.php');             
        }
    }

    function ProcessLogin(){
        $username = $_POST['username'];    
        $password = $_POST['password'];
        
        $isValidLogin = clarionLogin($username, $password);//run credentials through shell command - are they a valid clarion user?
        
        if($isValidLogin){//user is clarion verified         
                if(login($username)){//find matching username and create session
                    if (isset($_REQUEST["RequestedPage"])) {
                       header('Location: http://' . $_SERVER['HTTP_HOST'] . $_REQUEST["RequestedPage"]);
                    } else {
                       header("Location:../security/index.php");
                    }
                }
        }
        else {//user does NOT have a valid clarion login
            header("Location:../security/index.php?action=SecurityLogin&LoginFailure&RequestedPage=" . urlencode($_POST["RequestedPage"]));
        }
    }
    
   function clarionLogin($username, $password) {
    $tmpFile = tempnam(sys_get_temp_dir(), 'usr');
    file_put_contents($tmpFile, $password);
    $shellResult = shell_exec('cat ' .  $tmpFile . " | kinit " . escapeshellarg($username) . " > /dev/null && printf 'Success\n'");
    unlink($tmpFile);
    return trim($shellResult) === "Success";
}
 
	function ProcessLogOut() {
		logOut();
			header("Location:../security/index.php");
	}
    function ManageUsers() {
        $results = getAllUsers();
        include('../security/manage_users_form.php');
    }
    function UserAdd() {
        include('../security/add_user_form.php');
    }
    function UserEdit() {
		$id = $_GET["id"];
		if (empty($id)) {
			displayError("An ID is required for this function.");
		} else {
			$row = getUser($id);
			if ($row == false) {
				displayError("<p>User ID is not on file.</p> ");
			} else {
				$hasAttrResults = getUserRoles($id);
				$hasNotAttrResults = getNotUserRoles($id);
				$userID = $row["UserID"];
				$firstName = $row["FirstName"];
				$lastName = $row["LastName"];
				$userName = $row["UserName"];
				$email = $row["Email"];
				include('../security/modify_user_form.php');
			}
		}
    }
    function UserDelete() {
		if(isset($_POST["numListed"]))
		{
			$numListed = $_POST["numListed"];
			for($i = 0; $i < $numListed; ++$i)
			{
				if(isset($_POST["record$i"]))
				{
					deleteUser($_POST["record$i"]);
				}
			}
		}
		$results = getAllUsers();
		include('../security/manage_users_form.php');
    }
    function ProcessUserAddEdit() {
		$errors = "";

		if(empty($_POST["FirstName"]))
				$errors .= "<li>Error, field \"First Name\" is blank.</li>";
		if(empty($_POST["LastName"]))
				$errors .= "<li>Error, field \"Last Name\" is blank.</li>";
		if(empty($_POST["UserName"]))
				$errors .= "<li>Error, field \"User Name\" is blank.</li>";
		if(empty($_POST["Email"]))
				$errors .= "<li>Error, field \"Email\" is blank.</li>";

		if($errors == "") {
                        $UserID = "";
                        if (isset($_POST["UserID"])){ $UserID = $_POST["UserID"]; }
			$firstName = $_POST["FirstName"];
			$lastName = $_POST["LastName"];
			$userName = $_POST["UserName"];
			$email = $_POST["Email"];
			if (empty($UserID)) {   // No UserID means we are processing an ADD
				$UserID = addUser($firstName, $lastName, $userName, $email);
			} else {
				$hasAttributes = "";
                                if (isset($_POST['hasAttributes'])) { $hasAttributes = $_POST["hasAttributes"]; }
				updateUser($UserID, $firstName, $lastName, $userName, $email, $hasAttributes);
			}
			$results = getAllUsers();
			include('../security/manage_users_form.php');
		} else {
			displayError($errors);
		}
    }

    function ManageFunctions() {
		$results = getAllFunctions();
		include('../security/manage_functions_form.php');
    }
    function FunctionAdd() {
		include('../security/add_function_form.php');
    }
    function FunctionEdit() {
		$id = $_GET["id"];
		if (empty($id)) {
			displayError("An ID is required for this function.");
		} else {
			$row = getFunction($id);
			if ($row == false) {
				displayError("<p>Function ID is not on file.</p> ");
			} else {
				$id = $row["FunctionID"];
				$name = $row["Name"];
				$desc = $row["Description"];
				include('../security/modify_function_form.php');
			}
        }
    }
    function FunctionDelete() {
		if(isset($_POST["numListed"]))
		{
			$numListed = $_POST["numListed"];
			for($i = 0; $i < $numListed; ++$i)
			{
				if(isset($_POST["record$i"]))
				{
					deleteFunction($_POST["record$i"]);
				}
			}
		}
		$results = getAllFunctions();
		include('../security/manage_functions_form.php');
    }
    function ProcessFunctionAddEdit() {
		$errors = "";

		if(empty($_POST["Name"]))
			$errors .= "<li>Error, field \"Name\" is blank.</li>";

		if($errors == "") {
                        $FunctionID = "";
                        if (isset($_POST["FunctionID"])){ $FunctionID = $_POST["FunctionID"]; }
			$name = $_POST["Name"];
			$desc = $_POST["Description"];
			if (empty($FunctionID)) {   // No FunctionID means we are processing an ADD
				$FunctionID = addFunction($name, $desc);
			} else {
				updateFunction($FunctionID, $name, $desc);
			}
			$results = getAllFunctions();
			include('../security/manage_functions_form.php');
		} else {
			displayError($errors);
        }
    }

    function ManageRoles() {
		$results = getAllRoles();
		include('../security/manage_roles_form.php');
    }
    function RoleAdd() {
		include('../security/add_role_form.php');
    }
    function RoleEdit() {
		$id = $_GET["id"];
		if (empty($id)) {
			displayError("An ID is required for this function.");
		} else {
			$row = getRole($id);
			if ($row == false) {
				displayError("<p>Role ID is not on file.</p> ");
			} else {
				$hasAttrResults = getRoleFunctions($id);
				$hasNotAttrResults = getNotRoleFunctions($id);
				$name = $row["Name"];
				$desc = $row["Description"];
				include('../security/modify_role_form.php');
			}
		}
    }
    function RoleDelete() {
		if(isset($_POST["numListed"]))
		{
			$numListed = $_POST["numListed"];
			for($i = 0; $i < $numListed; ++$i)
			{
				if(isset($_POST["record$i"]))
				{
					deleteRole($_POST["record$i"]);
				}
			}
		}
		$results = getAllRoles();
		include('../security/manage_roles_form.php');
    }
    function ProcessRoleAddEdit() {
		$errors = "";
		if(empty($_POST["Name"]))
			$errors .= "<li>Error, field \"Name\" is blank.</li>";
		if($errors == "") {
                        $RoleID = "";
                        if (isset($_POST["RoleID"])){ $RoleID = $_POST["RoleID"]; }
			$name = $_POST["Name"];
			$desc = $_POST["Description"];
			if (empty($RoleID)) {   // No RoleID means we are processing an ADD
				$RoleID = addRole($name, $desc);
			} else {
                                $hasAttributes = "";
                                if (isset($_POST["hasAttributes"])) { $hasAttributes = $_POST["hasAttributes"]; }
				updateRole($RoleID, $name, $desc, $hasAttributes);
			}
			$results = getAllRoles();
			include('../security/manage_roles_form.php');
		} else {
			displayError($errors);
		}
    }
    
    function CheckSecurityNameExists() {
		$username = $_GET['username'];
		$duplicate = FALSE;
		$id = 0;
		
		$row = getUserByUsername($username);
		if ($row) {
			$duplicate = TRUE;
			$id = $row['UserID'];
		}
		
		echo json_encode(array('id'=>$id, 'username'=>$username, 'duplicate'=>$duplicate));
	}

?>


