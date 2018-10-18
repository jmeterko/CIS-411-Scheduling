<?php
require_once '../model/model.php';
$courseResults = getAllCourses();
?>

<option value="0">Select a Course</option>
<?php foreach ($courseResults as $row) { ?>
    <option><?php echo $row['Subject'] . " " . $row['Catalog'] . ":   " . $row['Name'] ?></option>
<?php } ?>