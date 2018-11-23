<?php
$title = "UpdateCurrentTerm";
require '../view/headerInclude.php';
?>

<?php
//Term settings stuff
$results = getAllTerms();
$currentTermInDB = $results['Current_Term'];
$oldestTerm = $results['Oldest_Term'];
$latestTerm = $results['Latest_Term'];
$currentTerm = $currentTermInDB;
if ($currentTerm == 0)
    $currentTerm = $latestTerm;
echo "<body onload='loadDoc(`../model/getTermsUsingJSON.php`, getTermsUsingJSON)'>";

?>
<div style="
  width: 550px;
  margin:  auto;
  background-color: #becccc;"

     id = "body">
    <body style="background-color: #becccc;" >
<h3>Update the current semester:</h3>
<div id="home" class="tab-pane fade in active">
    <select class="form-control, dropdownboxWidth " id="dropdownRange1" name="startSeason" style="width:80px;">
        <option value="Spring" selected>Spring</option>
        <option value="Summer">Summer</option>
        <option value="Fall">Fall</option>
        <option value="Winter">Winter</option>
    </select>

    <select class="form-control, dropdownboxWidth " id="dropdownRange2" name="startYear" style="width:80px;">
    </select>

    <select class="form-control, dropdownboxWidth hiddenDiv" id="dropdownRange3" name="endSeason" style="width:65px;">

        <option value="Spring" selected>Spring</option>
        <option value="Summer">Summer</option>
        <option value="Fall">Fall</option>
        <option value="Winter">Winter</option>
    </select>
    <select class="form-control, dropdownboxWidth hiddenDiv" id="dropdownRange4" name="endYear" style="width:65px;">
    </select>
    <button type = "button" id="ChangeCurrentSemesterButton" onclick="updateCurrentTermUsingJSON(convertRangeToTermJS(document.getElementById('dropdownRange1').value,document.getElementById('dropdownRange2').value) );">Update Current Semester</button>
    <br><br>
</div>
Or enter custom term value...<input name='customTerm' id='customTerm' type = text /><button onclick='updateCurrentTermUsingJSON(document.getElementById(`customTerm`).value)' value='Go'>Go</button>
<div id='updatedTermLabel'></div>
<br><br><br><br>

<?php
require '../view/footerInclude.php';
?>

