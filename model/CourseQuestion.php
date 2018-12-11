<?php
/*****************************
-	COURSEQuestion Object    -
\*****************************

 */

/* Just kidding this is the course question */

class CourseQuestion {

    //DECLARE ALL VARIABLES THAT ARE AVAILABLE TO USER ON FORM
    public $cat0, $cat1, $cat2, $cat3, $cat4, $cat5, $cat6, $cat7 = '';

    public $or0, $or1, $or2, $or3, $or4, $or5, $or6, $or7, $andCount, $startSeason, $endSeason = '';

    public $seasonSP, $seasonSU, $seasonFA, $seasonWI, $startYear, $endYear = '';

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
        if (isset($_POST["startYear"])) { $this->startYear = $_POST['startYear']; }
        if (isset($_POST["endYear"])) { $this->endYear = $_POST['endYear']; }
        if (isset($_POST["startSeason"])) { $this->startSeason = $_POST['startSeason']; }
        if (isset($_POST["endSeason"])) { $this->endSeason = $_POST['endSeason']; }

        //SEASON
        if (isset($_POST["SP"])) { $this->seasonSP = $_POST['SP']; }
        if (isset($_POST["SU"])) { $this->seasonSU = $_POST['SU']; }
        if (isset($_POST["FA"])) { $this->seasonFA = $_POST['FA']; }
        if (isset($_POST["WI"])) { $this->seasonWI = $_POST['WI']; }

        //OTHER VARIABLES
            //empty for now
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

//echo $stdq->rankFR; // $StudentQuestion->propertyYoureAccessing - how to access a student question object property
function ProcessCourseQuestion() {

    //The $saveQuestion flag will dete

    //create a CourseQuestion object, crdq, and begin to assign the orCount values and any dynamically added filters
    $crdq = new CourseQuestion();

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
            $insLocation = "ins" . $loc . $x;
            $locLocation = "loc" . $loc . $x;

            //Check to see what Subjects, Catalogs, Grades, Major/Minor, and Locations were set. If one was set in this row, add it to the crdq data array
            if (isset($_POST["Subject" . $loc . $x])) { $crdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
            if (isset($_POST["Catalog" . $loc . $x])) { $crdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
            if (isset($_POST["MinGrade" . $loc . $x])) { $crdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}
            if (isset($_POST["Instructor" . $loc . $x])) { $crdq->__set($insLocation, $_POST["Instructor" . $loc . $x]);}
            if (isset($_POST["Location" . $loc . $x])) { $crdq->__set($locLocation, $_POST["Location" . $loc . $x]);}

            //increment counter variables, then repeat the same algorithm for rows 1-7
            $x++;
        } $loc++;

        //1
        if(isset($row1)){
            $x = 0;
            while ($x <= $row1){
                $subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x;
                $insLocation = "ins" . $loc . $x; $locLocation = "loc" . $loc . $x;
                if (isset($_POST["Subject" . $loc . $x])) { $crdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
                if (isset($_POST["Catalog" . $loc . $x])) { $crdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
                if (isset($_POST["MinGrade" . $loc . $x])) { $crdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}
                if (isset($_POST["Instructor" . $loc . $x])) { $crdq->__set($insLocation, $_POST["Instructor" . $loc . $x]);}
                if (isset($_POST["Location" . $loc . $x])) { $crdq->__set($locLocation, $_POST["Location" . $loc . $x]);}
                $x++;
            } $loc++;
        }

        //2
        if(isset($row2)){
            $x = 0;
            while ($x <= $row2){
                $subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x;
                $insLocation = "ins" . $loc . $x; $locLocation = "loc" . $loc . $x;
                if (isset($_POST["Subject" . $loc . $x])) { $crdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
                if (isset($_POST["Catalog" . $loc . $x])) { $crdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
                if (isset($_POST["MinGrade" . $loc . $x])) { $crdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}
                if (isset($_POST["Instructor" . $loc . $x])) { $crdq->__set($insLocation, $_POST["Instructor" . $loc . $x]);}
                if (isset($_POST["Location" . $loc . $x])) { $crdq->__set($locLocation, $_POST["Location" . $loc . $x]);}
                $x++;
            } $loc++;
        }

        //3
        if(isset($row3)){
            $x = 0;
            while ($x <= $row3){
                $subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x;
                $insLocation = "ins" . $loc . $x; $locLocation = "loc" . $loc . $x;
                if (isset($_POST["Subject" . $loc . $x])) { $crdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
                if (isset($_POST["Catalog" . $loc . $x])) { $crdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
                if (isset($_POST["MinGrade" . $loc . $x])) { $crdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}
                if (isset($_POST["Instructor" . $loc . $x])) { $crdq->__set($insLocation, $_POST["Instructor" . $loc . $x]);}
                if (isset($_POST["Location" . $loc . $x])) { $crdq->__set($locLocation, $_POST["Location" . $loc . $x]);}
                $x++;
            } $loc++;
        }

        //4
        if(isset($row4)){
            $x = 0;
            while ($x <= $row4){
                $subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x;
                $insLocation = "ins" . $loc . $x; $locLocation = "loc" . $loc . $x;
                if (isset($_POST["Subject" . $loc . $x])) { $crdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
                if (isset($_POST["Catalog" . $loc . $x])) { $crdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
                if (isset($_POST["MinGrade" . $loc . $x])) { $crdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}
                if (isset($_POST["Instructor" . $loc . $x])) { $crdq->__set($insLocation, $_POST["Instructor" . $loc . $x]);}
                if (isset($_POST["Location" . $loc . $x])) { $crdq->__set($locLocation, $_POST["Location" . $loc . $x]);}
                $x++;
            } $loc++;
        }

        //5
        if(isset($row5)){
            $x = 0;
            while ($x <= $row5){
                $subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x;
                $insLocation = "ins" . $loc . $x; $locLocation = "loc" . $loc . $x;
                if (isset($_POST["Subject" . $loc . $x])) { $crdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
                if (isset($_POST["Catalog" . $loc . $x])) { $crdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
                if (isset($_POST["MinGrade" . $loc . $x])) { $crdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}
                if (isset($_POST["Instructor" . $loc . $x])) { $crdq->__set($insLocation, $_POST["Instructor" . $loc . $x]);}
                if (isset($_POST["Location" . $loc . $x])) { $crdq->__set($locLocation, $_POST["Location" . $loc . $x]);}
                $x++;
            } $loc++;
        }

        //6
        if(isset($row6)){
            $x = 0;
            while ($x <= $row6){
                $subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x;
                $insLocation = "ins" . $loc . $x; $locLocation = "loc" . $loc . $x;
                if (isset($_POST["Subject" . $loc . $x])) { $crdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
                if (isset($_POST["Catalog" . $loc . $x])) { $crdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
                if (isset($_POST["MinGrade" . $loc . $x])) { $crdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}
                if (isset($_POST["Instructor" . $loc . $x])) { $crdq->__set($insLocation, $_POST["Instructor" . $loc . $x]);}
                if (isset($_POST["Location" . $loc . $x])) { $crdq->__set($locLocation, $_POST["Location" . $loc . $x]);}
                $x++;
            } $loc++;
        }

        //7
        if(isset($row7)){
            $x = 0;
            while ($x <= $row7){
                $subLocation = "sub" . $loc . $x; $corLocation = "cor" . $loc . $x; $graLocation = "gra" . $loc . $x;
                $insLocation = "ins" . $loc . $x; $locLocation = "loc" . $loc . $x;
                if (isset($_POST["Subject" . $loc . $x])) { $crdq->__set($subLocation, $_POST["Subject" . $loc . $x]);}
                if (isset($_POST["Catalog" . $loc . $x])) { $crdq->__set($corLocation, $_POST["Catalog" . $loc . $x]);}
                if (isset($_POST["MinGrade" . $loc . $x])) { $crdq->__set($graLocation, $_POST["MinGrade" . $loc . $x]);}
                if (isset($_POST["Instructor" . $loc . $x])) { $crdq->__set($insLocation, $_POST["Instructor" . $loc . $x]);}
                if (isset($_POST["Location" . $loc . $x])) { $crdq->__set($locLocation, $_POST["Location" . $loc . $x]);}
                $x++;
            } $loc++;
        }

    }

    include '../view/DisplayDataCourseQuestion.php';
}
?>