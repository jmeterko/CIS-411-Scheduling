<?php
$title = "Homepage";
require '../view/headerInclude.php';
?>

<body style="background-color: #becccc;"">
      <input type="button" class="btn btn-info" value="Modify User-Program" style="position: absolute; right: 50%; top: 30%;" onclick="window.location.href='../controller/controller.php?action=ModifyUserProgram'"/>
      <br/>
      <input type="button" class="btn btn-info" value="Modify Acad-Program" style="position: absolute; right: 50%; top: 40%;" onclick="window.location.href='../controller/controller.php?action=ModifyAcadProgram'"/>
      <input type="button" style="right: 50%; top: 50%;" value="Back" class="btn btn-danger" onclick="window.location.href='../controller/controller.php?action=HomePage'"/>
</body>
</html>