<?php
/**
 * Created by IntelliJ IDEA.
 * User: vin
 * Date: 11/10/2018
 * Time: 6:22 PM
 */
$title = "Class History";
require '../view/headerInclude.php';

?>
<?php

$studentID = $_GET['StudentHistoryID'];
//echo 'student id is ' . $studentID;
$studentCourseHistory = getCourseHistory($studentID);
//print_r($studentCourseHistory);

?>
<body>
<h1> <center> History</h1></center>
<center>
    <table class="history_table" id ="history_table">
        <tr>
            <th>Subject</th>
            <th>Catalog</th>
            <th>Descr</th>
            <th>Grade</th>
            <th>Term</th>
            <th>Session</th>
            <th>Section</th>
        </tr>
        <?php
        foreach ($studentCourseHistory as $aResult)
        {
            ?>
            <tr>
                <td><?php echo $aResult['Subject']; ?></td>
                <td><?php echo $aResult['Catalog']; ?></td>
                <td><?php echo $aResult['Descr'];  ?></td>
                <td><?php echo $aResult['Grade']; ?></td>
                <td><?php echo $aResult['Term']; ?></td>
                <td><?php echo $aResult['Session']; ?></td>
                <td><?php echo $aResult['Section'];  ?></td>
            </tr>
            <?php
        }
        ?>

    </table></center>


</body>
</html>
