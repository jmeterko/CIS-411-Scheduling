<?php
	$title = "Control Panel - Add Function";
	require '../security/headerInclude.php';
?>

	<br /><h4>Add Function</h4><br />

	<form action="../security/index.php?action=SecurityProcessFunctionAddEdit" method="post">
		
		<label class="form_left">Name:</label> 
		<input type="text" id="Name" name="Name" class="color-black" size="20" value="" maxlength="64" autofocus required ><br/> 
		<label class="form_left">Description:</label> 
		<input type="text" id="Description" class="color-black" name="Description" size="20" value="" required><br/> 
		
		<br/>
		
		<input type="submit" class="color-black submit_button" value="Submit" />

	</form>