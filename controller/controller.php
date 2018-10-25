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
	public $cat0, $cat1, $cat2, $cat3, $cat4, $cat5, $cat6, $cat7 = ''; 
			
	public $or0, $or1, $or2, $or3, $or4, $or5, $or6, $or7, $andCount = '';
	
	public $rankFR, $rankSO, $rankJR, $rankSR, $currentStudentsOnly, $startGPA, $startYear, $endGPA, $endYear, $searchName = '';
		
	public function __construct() {
        //ONLY ASSIGN VARIABLES IF THEIR RESPECTIVE FORM ELEMENT WAS SET BY USER
	
		//CATEGORIES
		if (isset($_POST["dropdown0"])) { $this->cat0 = $_POST['dropdown0']; }
		if (isset($_POST["dropdown1"])) { $this->cat1 = $_POST['dropdown1']; }
		if (isset($_POST["dropdown2"])) { $this->cat2 = $_POST['dropdown2']; }
		if (isset($_POST["dropdown3"])) { $this->cat3 = $_POST['dropdown3']; }
		if (isset($_POST["dropdown4"])) { $this->cat4 = $_POST['dropdown4']; }
		if (isset($_POST["dropdown5"])) { $this->cat5 = $_POST['dropdown5']; }
		if (isset($_POST["dropdown6"])) { $this->cat6 = $_POST['dropdown6']; }
		if (isset($_POST["dropdown7"])) { $this->cat7 = $_POST['dropdown7']; }
		
		//OR'S - (orCounts are used to repopulate the # of OR buttons pressed for that AND row)
		if (isset($_POST["orCount0"])) { $this->or0 = $_POST['orCount0']; }
		if (isset($_POST["orCount1"])) { $this->or1 = $_POST['orCount1']; }
		if (isset($_POST["orCount2"])) { $this->or2 = $_POST['orCount2']; }
		if (isset($_POST["orCount3"])) { $this->or3 = $_POST['orCount3']; }
		if (isset($_POST["orCount4"])) { $this->or4 = $_POST['orCount4']; }
		if (isset($_POST["orCount5"])) { $this->or5 = $_POST['orCount5']; }
		if (isset($_POST["orCount6"])) { $this->or6 = $_POST['orCount6']; }
		if (isset($_POST["orCount7"])) { $this->or7 = $_POST['orCount7']; }
		if (isset($_POST["andCount"])) { $this->andCount = $_POST['andCount']; }
		
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
		public function __set($name, $value)
		{
			$this->data[$name] = $value;
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
		
		if (isset($_POST["orCount0"])) { $row0 = $_POST['orCount0']; }
		if (isset($_POST["orCount1"])) { $row1 = $_POST['orCount1']; }
		if (isset($_POST["orCount2"])) { $row2 = $_POST['orCount2']; }
		if (isset($_POST["orCount3"])) { $row3 = $_POST['orCount3']; }
		if (isset($_POST["orCount4"])) { $row4 = $_POST['orCount4']; }
		if (isset($_POST["orCount5"])) { $row5 = $_POST['orCount5']; }
		if (isset($_POST["orCount6"])) { $row6 = $_POST['orCount6']; }
		if (isset($_POST["orCount7"])) { $row7 = $_POST['orCount7']; }
		
		//$stdq->__set($subLocation, $_POST["Subject" . 0 . 0]);
		//$stdq->__set($subLocation, $_POST["Subject" . 0 . 1]);
		
		
		//Conditional block that fills all 'set' or dropdowns and dyanmically add those properties to the student question class
		//Must run through each row until all OR's are set. (This is much nicer than having hundreds of if statements checking for every value)
		//if the row count has been set, continue filling the or's in order until there are no more. 
		
		//hold location of current row
		$loc = 0;
		
		//0
		if(isset($row0)){
			$x = 0;
			while ($x <= $row0){  // sub 0 0 
				$subLocation = "sub" . $loc . $x; 
				$corLocation = "cor" . $loc . $x; 
				$graLocation = "gra" . $loc . $x;
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				$x++; 
			} $loc++;
			//1
		if(isset($row1)){
			$x = 0;
			while ($x <= $row1){
				$subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x;
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				$x++; 
			} $loc++;
		}
		
		//2
		if(isset($row2)){
			$x = 0;
			while ($x <= $row2){
				$subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x;
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				$x++;
			} $loc++;
		}
		
		//3
		if(isset($row3)){
			$x = 0;
			while ($x <= $row3){
				$subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x;
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				$x++;
			} $loc++;
		}
		
		//4
		if(isset($row4)){
			$x = 0;
			while ($x <= $row4){
				$subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x;
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				$x++;
			} $loc++;
		}
		
		//5
		if(isset($row5)){
			$x = 0;
			while ($x <= $row5){
				$subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x;
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				$x++;
			} $loc++;
		}
		
		//6
		if(isset($row6)){
			$x = 0;
			while ($x <= $row6){
				$subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x;
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				$x++;
			} $loc++;
		}
		
		//7
		if(isset($row7)){
			$x = 0;
			while ($x <= $row7){
				$subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x;
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				$x++; 
			} $loc++;
		}
			
		}
		
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
			
			include '../view/index.php';			
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
		 $serialID = 0;
		 try {
			 if( isset($_GET['SerialID']) ) { $serialID = $_GET['SerialID']; }
			 //save the serial string into a variable to be unserialized
			 $serial = constructSavedSearch($serialID);
			 $form = unserialize($serial);
		 
		 //include '../view/index.php';
		 //include '../view/rebuildStudentQuestion.php';
		 include '../view/MainApplicationStudentQuestion.php';
		 } catch (Exception $e) {
			     echo 'Caught exception: ',  $e->getMessage(), "\n";
		 }

	}

?>