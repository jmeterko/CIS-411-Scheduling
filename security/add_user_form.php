<?php
	$title = "Control Panel - Add User";
	require '../security/headerInclude.php';
?>

<script>
	function checkUserName(submitForm) {
		$.getJSON("../security/index.php",
			{	action: "SecurityCheckUserNameExists",
				username: $('#UserName').val()
			},
			function(jsonReturned) {
				if (jsonReturned.duplicate) {
					alert('That username has been taken.');
					$('#UserName').select();
				} else if (submitForm) {
					$('#AddUserForm').submit();
				}
			}
		);
	}
</script>


<div class="form">
    <br /><h4>Add User</h4><br />

    <form id="AddUserForm" action="../security/index.php?action=SecurityProcessUserAddEdit" method="post">

        <label class="form_left">First Name:<span class="required">*</span></label> 
        <input type="text" class="form_input color-black" id="FirstName" name="FirstName" size="20" value="" autofocus required ><br/>

        <label class="form_left">Last Name:<span class="required">*</span></label> 
        <input type="text" class="form_input color-black" id="LastName" name="LastName" size="20" value="" required><br/>

        <label class="form_left">User Name:<span class="required">*</span></label> 
        <input type="text" class="form_input color-black" id="UserName" onchange="checkUserName(false)" name="UserName" size="20" value="" required ><br/>

        <label class="form_left">Email:<span class="required">*</span></label> 
        <input type="email" class="form_input color-black" id="Email" name="Email" size="20" value="" required><br/>

        <br/>

        <input type="button" class="color-black submit_button" onclick="checkUserName(true)" value="Submit" />

    </form>
</div>
