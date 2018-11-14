<?php
	$title = "Control Panel - Add Role";
	require '../security/headerInclude.php';
?>

	<br /><h4>Add Role</h4><br />

	<form action="../security/index.php?action=SecurityProcessRoleAddEdit" method="post">

		<label class="form_left">Name:</label> 
		<input type="text" id="Name" class="color-black" name="Name" size="20" value="" autofocus required ><br/>
		<label class="form_left">Description:</label> 
		<input type="text" id="Description" class="color-black" name="Description" size="20" value="" required><br/>
		<br/>

		<input type="submit" class="color-black submit_button" value="Submit" />

	</form>