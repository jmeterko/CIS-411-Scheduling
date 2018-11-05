<?php 
    /*****************************
	-	StudentQuestion Object    -
    \*****************************
		A StudentQuestion will store all values posted from our dynamic form. 
		The public variables displayed below are all static elements from the form. All categories, OrCounts, AndCount,
		starting GPA and Year filters, and student rank must be set to something, therefore, all these variables must be set. 
		
		The constructor of this class contains the following code:
					if (isset($_POST["dropdown0"])) { $this->cat0 = $_POST['dropdown0']; }
			This will double check that each value that is expected, is set before setting the class property. 
		
		The StudentQuestion also has a function that will dynamically add properties to the class after it is initialized.
		This is a very important component to the class, and allows for any number of AND's and OR's added to the form. Otherwise,
		hundreds of varaibles need to be publically declared as a property of the class, then set according to what the user posted. 
		With this built in __set function, we only need to add the variables we need, saving on space and allowing for any number of variables
	*/
	class StudentQuestion {
		
	//DECLARE ALL VARIABLES THAT ARE AVAILABLE TO USER ON FORM
	public $cat0, $cat1, $cat2, $cat3, $cat4, $cat5, $cat6, $cat7 = ''; 
			
	public $or0, $or1, $or2, $or3, $or4, $or5, $or6, $or7, $andCount, $startSeason, $endSeason = '';
	
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
		if (isset($_POST["startSeason"])) { $this->startSeason = $_POST['startSeason']; }
		if (isset($_POST["endSeason"])) { $this->endSeason = $_POST['endSeason']; }
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
	
		/*_set takes 2 parameters : the $name of the variable you want to create, and the $value to store there
		*	this will dynamically add all user added filters from dropdowns. Since we don't have the variables declared in the class, 
		*   they must be added in this fashion. They are added as a data array, and must be accessed appropriately. 
		*
		*	Example of accessing data array:
		*		$array = $form->data;					// $StudentQuestion->data is the location of the array, stored in $array
		*		  foreach ($array as $item => $value) { // $item holds the name of variable, $value is the value
		*			  echo $item . " " . $value;		// output of each item and value in the array
		*/
		public function __set($name, $value)
		{
			$this->data[$name] = $value;
		}
} 

	//Debugging function that will display all saved searches for the current username
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
				
  //echo $stdq->rankFR; // $StudentQuestion->propertyYoureAccessing - how to access a student question object property		
	function ProcessStudentQuestion() {	

		//The $saveQuestion flag will determine if we should serialize and save this search
		$saveQuestion = false; 
		
		if (isset($_POST["saveQuestion"])) { $saveQuestion = true; }
		
		//create a StudentQuestion object, stdq, and begin to assign the orCount values and any dynamically added filters
		$stdq = new StudentQuestion();
		
		if (isset($_POST["orCount0"])) { $row0 = $_POST['orCount0']; }
		if (isset($_POST["orCount1"])) { $row1 = $_POST['orCount1']; }
		if (isset($_POST["orCount2"])) { $row2 = $_POST['orCount2']; }
		if (isset($_POST["orCount3"])) { $row3 = $_POST['orCount3']; }
		if (isset($_POST["orCount4"])) { $row4 = $_POST['orCount4']; }
		if (isset($_POST["orCount5"])) { $row5 = $_POST['orCount5']; }
		if (isset($_POST["orCount6"])) { $row6 = $_POST['orCount6']; }
		if (isset($_POST["orCount7"])) { $row7 = $_POST['orCount7']; }
		
		//Conditional block that fills all 'set' or dropdowns and dyanmically add those properties to the student question class
		//Must run through each row until all OR's are set. (This is much nicer than having hundreds of if statements checking for every value)
		//if the row count has been set, continue filling the or's in order until there are no more. 
		
		//hold location of current row
		$loc = 0;
		
		//0
		if(isset($row0)){
			$x = 0;
			while ($x <= $row0){  // sub 0 0 
			//locations that will constantly change based on the loop iteration. row0 will be "name" 0 0. Next in the row will be "name" 0 1, and so on.
			//in the next while loop, loc is incremented, changing the new location values to "name" 1 0. 
				$subLocation = "sub" . $loc . $x; 
				$corLocation = "cor" . $loc . $x; 
				$graLocation = "gra" . $loc . $x;
				$majLocation = "maj" . $loc . $x;
				$locLocation = "loc" . $loc . $x;
				
				//Check to see what Subjects, Catalogs, Grades, Major/Minor, and Locations were set. If one was set in this row, add it to the stdq data array
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				if (isset($_POST["MajorMinor" . $loc . $x])) { $stdq->__set($majLocation, $_POST["MajorMinor" . $loc . $x]);}					
				if (isset($_POST["Location" . $loc . $x])) { $stdq->__set($locLocation, $_POST["Location" . $loc . $x]);}	

				//increment counter variables, then repeat the same algorithm for rows 1-7
				$x++; 
			} $loc++;
			
			//1
		if(isset($row1)){
			$x = 0;
			while ($x <= $row1){
				$subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x; 
				$majLocation = "maj" . $loc . $x; $locLocation = "loc" . $loc . $x;
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				if (isset($_POST["MajorMinor" . $loc . $x])) { $stdq->__set($majLocation, $_POST["MajorMinor" . $loc . $x]);}	
				if (isset($_POST["Location" . $loc . $x])) { $stdq->__set($locLocation, $_POST["Location" . $loc . $x]);}									
				$x++; 
			} $loc++;
		}
		
		//2
		if(isset($row2)){
			$x = 0;
			while ($x <= $row2){
				$subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x; 
				$majLocation = "maj" . $loc . $x; $locLocation = "loc" . $loc . $x;
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				if (isset($_POST["MajorMinor" . $loc . $x])) { $stdq->__set($majLocation, $_POST["MajorMinor" . $loc . $x]);}	
				if (isset($_POST["Location" . $loc . $x])) { $stdq->__set($locLocation, $_POST["Location" . $loc . $x]);}									
				$x++;
			} $loc++;
		}
		
		//3
		if(isset($row3)){
			$x = 0;
			while ($x <= $row3){
				$subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x; 
				$majLocation = "maj" . $loc . $x; $locLocation = "loc" . $loc . $x;
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				if (isset($_POST["MajorMinor" . $loc . $x])) { $stdq->__set($majLocation, $_POST["MajorMinor" . $loc . $x]);}	
				if (isset($_POST["Location" . $loc . $x])) { $stdq->__set($locLocation, $_POST["Location" . $loc . $x]);}									
				$x++;
			} $loc++;
		}
		
		//4
		if(isset($row4)){
			$x = 0;
			while ($x <= $row4){
				$subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x; 
				$majLocation = "maj" . $loc . $x; $locLocation = "loc" . $loc . $x;
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				if (isset($_POST["MajorMinor" . $loc . $x])) { $stdq->__set($majLocation, $_POST["MajorMinor" . $loc . $x]);}
				if (isset($_POST["Location" . $loc . $x])) { $stdq->__set($locLocation, $_POST["Location" . $loc . $x]);}									
				$x++;
			} $loc++;
		}
		
		//5
		if(isset($row5)){
			$x = 0;
			while ($x <= $row5){
				$subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x; 
				$majLocation = "maj" . $loc . $x; $locLocation = "loc" . $loc . $x;
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				if (isset($_POST["MajorMinor" . $loc . $x])) { $stdq->__set($majLocation, $_POST["MajorMinor" . $loc . $x]);}	
				if (isset($_POST["Location" . $loc . $x])) { $stdq->__set($locLocation, $_POST["Location" . $loc . $x]);}									
				$x++;
			} $loc++;
		}
		
		//6
		if(isset($row6)){
			$x = 0;
			while ($x <= $row6){
				$subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x; 
				$majLocation = "maj" . $loc . $x; $locLocation = "loc" . $loc . $x;
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				if (isset($_POST["MajorMinor" . $loc . $x])) { $stdq->__set($majLocation, $_POST["MajorMinor" . $loc . $x]);}	
				if (isset($_POST["Location" . $loc . $x])) { $stdq->__set($locLocation, $_POST["Location" . $loc . $x]);}									
				$x++;
			} $loc++;
		}
		
		//7
		if(isset($row7)){
			$x = 0;
			while ($x <= $row7){
				$subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x; 
				$majLocation = "maj" . $loc . $x; $locLocation = "loc" . $loc . $x;
				if (isset($_POST["Subject" . $loc . $x])) { $stdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
				if (isset($_POST["Catalog" . $loc . $x])) { $stdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
				if (isset($_POST["MinGrade" . $loc . $x])) { $stdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}					
				if (isset($_POST["MajorMinor" . $loc . $x])) { $stdq->__set($majLocation, $_POST["MajorMinor" . $loc . $x]);}
				if (isset($_POST["Location" . $loc . $x])) { $stdq->__set($locLocation, $_POST["Location" . $loc . $x]);}									
				$x++; 
			} $loc++;
		}
			
		}
		
		if($saveQuestion){//if user checked the box to save
			if(empty($stdq->searchName)){//user did not provide a name for the search
				$errorMessage = "No search name provided.";
				//should never reach this code. Make search name a required field if SaveQuestion is checked. 
				include '../view/errorPage.php';			
			}
			
			//user wants to save a provided a name 
			else {//serialize and save to user profile under their given search name
				$s = serialize($stdq); 			        //serialize the object, store string in $s
				$user = $_SESSION['username'];          //see who the current user is
				addSerial($user, $s, $stdq->searchName);//save the search under the saved name and user who created it. 
			}
			
			/**IMPORTANT* index.php is my current output page for testing my seriailzier. Instead of going here after the form is submitted, 
			*   you will include the resultspage.php or some kind of executeStudentQuestion function instead.
			*	If you are including a page, you dont need to pass the object. On your included page, just access variables as normal.
			*   If you are running a function here, you must pass $stdq as an arguement in order to access it there. 
			*
			*	Accessing StudentQuestion class properties:
			* 	$stdq->cat0 // accesses the value stored in the first category dropdown0 (see more examples in mainAppStudentQuestion.php)
			*/
			include '../view/index.php';			
		}
	}
?>