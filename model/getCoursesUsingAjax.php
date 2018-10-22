<?php
require_once '../model/model.php';
$courseResults = getAllCourses();
?>

<?php foreach ($courseResults as $row) { ?>
    <option><?php echo $row['Subject'] . " " . $row['Catalog'] . ":   " . $row['Name'] ?></option>
<?php } ?>