<?php
$title = "Settings";
require '../view/headerInclude.php';
$acadPrograms = getAllAcademicPrograms();
?>

<body style="background-color: #becccc;" onload="loadDoc('../model/getProgramsUsingJSON.php', getProgramsUsingJSON)">
<div class="settingscontainer">
    <div id="card" class="weather">
        <form enctype="multipart/form-data"
              action="../controller/controller.php?action=ProcessModifyAcadProgram" onsubmit="selectAll('hasSubjectsSelect')" method="post">
            <h3>Modify a program:</h3>
            <br>
            &nbsp;
            <select name="programSelect" id="programSelect" onchange="loadProgramSubjects(this.value);" required >
                <option value="Select a program..." >Select a program...</option>
                <?php
                foreach ($acadPrograms as $program){
                    echo "<option value = '" . $program['Plan'] . "'> " . $program['Plan'] . "</option>";
                }
                ?>
            </select>
            <select name="hasSubjects[]" id="hasSubjectsSelect" size="10" multiple="multiple">
                <option >Has these subjects:</option>
                <option ></option>
                <td>
                    <input type="button" value=">>" onclick="for (let i=0; i<200; i++){swap('hasSubjectsSelect','hasNotSubjectsSelect')}">

                    <input type="button" value="<<" onclick="for (let i=0; i<200; i++){swap('hasNotSubjectsSelect','hasSubjectsSelect')}">
                </td>
            </select>
            &nbsp;
            <select name="hasNotSubjects" id="hasNotSubjectsSelect" size="10" multiple>
                <option >Does not have:</option>
                <option ></option>
            </select>

            <input type="submit" value="Submit"  />
        </form>
        <input type="button" value="Back" style="float:left" class="btn btn-danger" onclick="window.location.href='../controller/controller.php?action=Settings'"/>
    </div>
</div>
</body>
</html>