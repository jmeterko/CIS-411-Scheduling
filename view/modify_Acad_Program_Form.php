<?php
$title = "Modify Program";
require '../view/headerInclude.php';
?>
<?php
    $acadPrograms = getAllAcademicPrograms();
?>
<?php if (isset($programSubjectsDump)) {echo "<pre style='font-size:18px;'>" . $programSubjectsDump . "</pre>";} ?>
<body  >
    <form enctype="multipart/form-data"
          action="../controller/controller.php?action=ProcessModifyAcadProgram" onsubmit="selectAll('hasSubjectsSelect')" method="post">
        <h3>Modify a program:</h3>
        <br>
        <select name="programSelect" id="programSelect" onchange="loadProgramSubjects(this.value);" required >
            <option value="Select a program..." >Select a program...</option>
            <?php
                foreach ($acadPrograms as $program){
                    echo "<option value = '" . $program['Plan'] . "'> " . $program['Plan'] . "</option>";
                }
            ?>
        </select>
        &nbsp;
        <select name="hasSubjects[]" id="hasSubjectsSelect" size="10" multiple="multiple">
            <option disabled>Has these subjects:</option>
            <option disabled></option>
            <td>
                <input type="button" value=">>" onclick="for (let i=0; i<200; i++){swap('hasSubjectsSelect','hasNotSubjectsSelect')}">

                <input type="button" value="<<" onclick="for (let i=0; i<200; i++){swap('hasNotSubjectsSelect','hasSubjectsSelect')}">
            </td>
        </select>
        &nbsp;
        <select name="hasNotSubjects" id="hasNotSubjectsSelect" size="10" multiple>
            <option disabled>Does not have:</option>
            <option disabled></option>


        </select>

        <input type="submit" value="Submit"  />
    </form>
    <br>

</body>
<?php
require '../view/footerInclude.php';
?>
