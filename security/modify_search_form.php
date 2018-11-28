<?php
$title = "Control Panel - Modify Search";
require_once '../security/headerInclude.php';
?>
<br/><h4>Modify Search</h4><br/>

<form action="../security/index.php?action=SecurityProcessSearchEdit" method="post">

    <input type="hidden" name="SearchID" value="<?php echo $id; ?>"/>

    <label class="form_left">Name:</label>
    <input type="text" name="Name" size="20" value="<?php echo $name; ?>" autofocus required  /><br/>

    <br/><br/>

    <input type="submit" class="submit_button" value="Submit" />

</form>