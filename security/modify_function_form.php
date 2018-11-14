<?php
	$title = "Control Panel - Modify Function";
	require '../security/headerInclude.php';
?>
    <br/><h4>Modify Function</h4><br/>

    <form action="../security/index.php?action=SecurityProcessFunctionAddEdit" method="post">

            <input type="hidden" name="FunctionID" value="<?php echo $id; ?>"/>

            <label class="form_left">Name:</label> 
			<input type="text" name="Name" size="20" value="<?php echo $name; ?>" autofocus required  /><br/>
            <label class="form_left">Description:</label> 
			<input type="text" name="Description" size="20" value="<?php echo $desc; ?>" />

            <br/><br/>

            <input type="submit" class="submit_button" value="Submit" />

    </form>