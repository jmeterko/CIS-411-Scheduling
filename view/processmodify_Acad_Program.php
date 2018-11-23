
<?php
if (isset($_POST['hasSubjects'], $_POST['programSelect'])){
    $addSubjects = $_POST["hasSubjects"];
    foreach ($addSubjects as $subject){
        if ($subject == ' ' or $subject == '' or $subject == null )
            unset($subject);
    }
    //print_r($addSubjects) ;
    $selectedProgram = $_POST["programSelect"];
    $rowsAdded = updateProgramSubjects($selectedProgram, $addSubjects);

    $programSubjectsDump .= "";
    $programSubjectsDump .=  "<br>There were " . $rowsAdded . " subjects added to the program " . $selectedProgram . ".";
    $programSubjectsDump .=  "<br>" . $selectedProgram . " now includes:  <br>";
    for ($i = 0; $i < count($addSubjects); $i++)
        $programSubjectsDump .=   "   " . $addSubjects[$i] . "<br>";
    $programSubjectsDump .= '<h3>Your modifications have been made.</h3>';
}
include "../view/modify_Acad_Program_Form.php";

?>



