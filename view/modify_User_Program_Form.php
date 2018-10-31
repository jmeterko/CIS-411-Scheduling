<?php
$title = "Modify Users' Programs";
require '../view/headerInclude.php';
?>
<?php
$allUsers = getAllUsers();
?>
<body onload="loadDoc('../model/getUsersUsingJSON.php', getUsersUsingJSON)" >
<form enctype="multipart/form-data"
      action="../controller/controller.php?action=ProcessModifyUserProgram" onsubmit="selectAll('hasProgramsSelect')" method="post">
    <h3>Modify a user's programs:</h3>
    <br>
    <select name="UserSelect" id="UserSelect" onchange="loadUserPrograms(this.value);" required >
        <option value="Select a user..."  >Select a user...</option>
        <?php
        foreach ($allUsers as $user){
            echo "<option value = '" . $user['UserName'] . "'> " . $user['UserName'] . "</option>";
        }
        ?>
    </select>
    &nbsp;
    <select name="hasPrograms[]" id="hasProgramsSelect" size="10" multiple="multiple">
        <option >Has these programs:</option>
        <option ></option>
        <td>
            <input type="button" value=">>" onclick="for (let i=0; i<200; i++){swap('hasProgramsSelect','hasNotProgramsSelect')}">

            <input type="button" value="<<" onclick="for (let i=0; i<200; i++){swap('hasNotProgramsSelect','hasProgramsSelect')}">
        </td>
    </select>
    &nbsp;
    <select name="hasNotPrograms" id="hasNotProgramsSelect" size="10" multiple>
        <option >Does not have:</option>
        <option ></option>


    </select>

    <input type="submit" value="Submit"  />
</form>
<br>

</body>
<?php
require '../view/footerInclude.php';
?>
