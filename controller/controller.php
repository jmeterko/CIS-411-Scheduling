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
    case 'FileUpload':
        include '../view/fileUploadPage.php';
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
    case 'ProcessImportData':
        include '../view/processImportData.php';
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
	
	class StudentQuestion {
		
	//DECLARE ALL VARIABLES THAT ARE AVAILABLE TO USER ON FORM
	public $cat1 = ''; 
	public $cat2 = ''; 
	public $cat3 = ''; 
	public $cat4 = ''; 
	public $cat5 = ''; 
	public $cat6 = ''; 
	public $cat7 = ''; 
	public $cat8 = ''; 
	public $rankFR = ''; 
	public $rankSO = ''; 
	public $rankJR = ''; 
	public $rankSR = ''; 
	public $currentStudentsOnly = ''; 
	public $startGPA = ''; 
	public $startYear = ''; 
	public $endGPA = ''; 
	public $endYear = '';
	public $searchName = '';
	
	public function __construct() {
        //ONLY ASSIGN VARIABLES IF THEIR RESPECTIVE FORM ELEMENT WAS SET BY USER
	
		//CATEGORIES
		if (isset($_POST["category1"])) { $this->cat1 = $_POST['category1']; }
		if (isset($_POST["category2"])) { $this->cat2 = $_POST['category2']; }
		if (isset($_POST["category3"])) { $this->cat3 = $_POST['category3']; }
		if (isset($_POST["category4"])) { $this->cat4 = $_POST['category4']; }
		if (isset($_POST["category5"])) { $this->cat5 = $_POST['category5']; }
		if (isset($_POST["category6"])) { $this->cat6 = $_POST['category6']; }
		if (isset($_POST["category7"])) { $this->cat7 = $_POST['category7']; }
		if (isset($_POST["category8"])) { $this->cat8 = $_POST['category8']; }

		//YEAR
		if (isset($_POST["currentStudentsOnly"])) { $this->currentStudentsOnly = $_POST['currentStudentsOnly']; }
		if (isset($_POST["startYear"])) { $this->startYear = $_POST['startYear']; }
		if (isset($_POST["endYear"])) { $this->endYear = $_POST['endYear']; }
		if (isset($_POST["startGPA"])) { $this->startGPA = $_POST['startGPA']; }
		if (isset($_POST["endGPA"])) { $this->endGPA = $_POST['endGPA']; }
		
		//RANK
		if (isset($_POST["FR"])) { $this->rankFR = $_POST['FR']; }
		if (isset($_POST["SO"])) { $this->rankSO = $_POST['SO']; }
		if (isset($_POST["JR"])) { $this->rankJR = $_POST['JR']; }
		if (isset($_POST["SR"])) { $this->rankSR = $_POST['SR']; }
				
		//GPA
		if (isset($_POST["startGPA"])) { $this->startGPA = $_POST['startGPA']; }
		if (isset($_POST["endGPA"])) { $this->endGPA = $_POST['endGPA']; }
		
		//OTHER VARIABLES
		if (isset($_POST["searchName"])) { $this->searchName = $_POST['searchName']; }

    }
} 

     function ProcessDisplaySerials(){
		   $user = $_SESSION['username']; 
		   $results = getSerialsForUser($user);					
					
		if (count($results) == 0) {
			$errorMessage = "No data found.";
			include '../view/errorPage.php';
		} else if (count($results) == 1) {
			$onlyRow = $results[0];
           include '../view/index.php';
		} else {           
           include '../view/index.php';
		}
     }
				
  //echo $stdq->rankFR; //how to access a student question object property		
  //file_put_contents('store', $s); // store $s somewhere where page2.php can find it.
	function ProcessStudentQuestion() {	

		$saveQuestion = false; 
		
		//The $saveQuestion flag will determine if we should serialize and save this search
		if (isset($_POST["saveQuestion"])) { $saveQuestion = true; }
		
		$stdq = new StudentQuestion();
		
		if($saveQuestion){//if user checked the box to save
			if(empty($stdq->searchName)){//user did not provide a name for the search
				$errorMessage = "No search name provided.";
				//send back to page, rebuilt with stdq object
				include '../view/errorPage.php';			
			}
			
			else {//serialize and save to user profile under their given search name
				$s = serialize($stdq); //serialize the object
				$user = $_SESSION['username']; 
				addSerial($user, $s, $stdq->searchName);
			}
		}
	}
	
    function constructSavedSearch($serialID){
       $row = getSerial($serialID);
			if ($row == false) {
				displayError("<p>Serial ID is not on file.</p> ");
			} else {
				return $serial = $row["serial"];	
			}
	}    
	
	function RebuildQuestion(){
		 $serialID = $_GET['SerialID'];
		 //save the serial string into a variable to be unserialized
		 $serial = constructSavedSearch($serialID);
		 $u = unserialize($serial);
		 
		 //include '../view/index.php';
		 include '../view/rebuildStudentQuestion.php';
	}

?>