<?php
$title = "Result Page";
require_once '../view/headerInclude.php';
require_once '../model/model.php';

//test data for filling table, vinnys early test data

//test data, INNERJOIN'd results
$courseResultsTestArray = array(
    array('Instructor' => 'Kim,Soo','Term' => '2171','Season' => '2171','Session' => '1','Subject' => 'CIS','Course No.' => '230','Section' => 'C01','Description' => 'Practicum in CIS','Capacity' => '5','# Enrolled' => '1'),
    array('Instructor' => 'Strausser,Jody','Term' => '2171','Season' => '2171','Session' => '1','Subject' => 'CIS','Course No.' => '244','Section' => 'C01','Description' => 'Intro Prog & Algo II','Capacity' => '30','# Enrolled' => '19'),
    array('Instructor' => 'Strausser,Jody','Term' => '2171','Season' => '2171','Session' => '1','Subject' => 'CIS','Course No.' => '244','Section' => 'C02','Description' => 'Intro Prog & Algo II','Capacity' => '30','# Enrolled' => '27'),
    array('Instructor' => 'Wyatt,Joe','Term' => '2171','Season' => '2171','Session' => '1','Subject' => 'CIS','Course No.' => '270','Section' => 'C01','Description' => 'Client-Side Web Programming','Capacity' => '25','# Enrolled' => '27'),
    array('Instructor' => 'Kim,Soo','Term' => '2171','Season' => '2171','Session' => '1','Subject' => 'CIS','Course No.' => '303','Section' => 'C01','Description' => 'Local Area Networks','Capacity' => '28','# Enrolled' => '28'),
    array('Instructor' => 'Kim,Soo','Term' => '2171','Season' => '2171','Session' => '1','Subject' => 'CIS','Course No.' => '303','Section' => 'C02','Description' => 'Local Area Networks','Capacity' => '28','# Enrolled' => '22'),
    array('Instructor' => 'Strausser,Jody','Term' => '2171','Season' => '2171','Session' => '1','Subject' => 'CIS','Course No.' => '306','Section' => 'C01','Description' => 'Object Oriented Programming','Capacity' => '30','# Enrolled' => '30'),
    array('Instructor' => 'Strausser,Jody','Term' => '2171','Season' => '2171','Session' => '1','Subject' => 'CIS','Course No.' => '312','Section' => 'C01','Description' => 'Special Topics in Computing','Capacity' => '28','# Enrolled' => '32'),
    array('Instructor' => 'Agyei-Mensah,Stephen O','Term' => '2171','Season' => '2171','Session' => '1','Subject' => 'CIS','Course No.' => '317','Section' => 'C01','Description' => 'Microcomp Maint Conc & Tech','Capacity' => '30','# Enrolled' => '26'),
    array('Instructor' => 'Childs,Jeffrey S','Term' => '2171','Season' => '2171','Session' => '1','Subject' => 'CIS','Course No.' => '356','Section' => 'C01','Description' => 'Analysis of Algorithms','Capacity' => '30','# Enrolled' => '39'),
    array('Instructor' => 'ODonnell,Jon P','Term' => '2171','Season' => '2171','Session' => '1','Subject' => 'CIS','Course No.' => '370','Section' => 'C01','Description' => 'Server-Side Web Programming','Capacity' => '30','# Enrolled' => '14'),
    array('Instructor' => 'Childs,Jeffrey S','Term' => '2171','Season' => '2171','Session' => '1','Subject' => 'CIS','Course No.' => '375','Section' => 'C01','Description' => 'Software Engineering','Capacity' => '30','# Enrolled' => '13'),
    array('Instructor' => 'Wyatt,Joe','Term' => '2171','Season' => '2171','Session' => '1','Subject' => 'CIS','Course No.' => '377','Section' => 'C01','Description' => 'Computer Graphics','Capacity' => '25','# Enrolled' => '23'),
    array('Instructor' => 'ODonnell,Jon P','Term' => '2171','Season' => '2171','Session' => '1','Subject' => 'CIS','Course No.' => '411','Section' => 'C01','Description' => 'Systems Devlmt Project','Capacity' => '0','# Enrolled' => '14'),
    array('Instructor' => 'ODonnell,Jon P','Term' => '2171','Season' => '2171','Session' => '1','Subject' => 'CIS','Course No.' => '422','Section' => 'X01','Description' => 'Internship in Computers','Capacity' => '0','# Enrolled' => '1'),
    array('Instructor' => 'Annadatha,Jayakumar','Term' => '2171','Season' => '2171','Session' => '7W1','Subject' => 'DA','Course No.' => '540','Section' => 'W01','Description' => 'Applied Data Mining','Capacity' => '30','# Enrolled' => '11'),
    array('Instructor' => 'Annadatha,Jayakumar','Term' => '2171','Season' => '2171','Session' => '7W2','Subject' => 'DA','Course No.' => '550','Section' => 'W01','Description' => 'Predictive Analytics','Capacity' => '30','# Enrolled' => '10'),
    array('Instructor' => 'Annadatha,Jayakumar','Term' => '2175','Season' => '2175','Session' => '7W1','Subject' => 'DA','Course No.' => '510','Section' => 'I01','Description' => 'Database Management Systems','Capacity' => '0','# Enrolled' => '1'),
    array('Instructor' => 'Annadatha,Jayakumar','Term' => '2175','Season' => '2175','Session' => '7W1','Subject' => 'DA','Course No.' => '560','Section' => 'W01','Description' => 'Data Visualization','Capacity' => '30','# Enrolled' => '8'),
    array('Instructor' => 'Strausser,Jody','Term' => '2175','Season' => '2175','Session' => '7W2','Subject' => 'CIS','Course No.' => '202','Section' => 'W01','Description' => 'Intro Program and Algorithms I','Capacity' => '35','# Enrolled' => '8'),
    array('Instructor' => 'Agyei-Mensah,Stephen O','Term' => '2175','Season' => '2175','Session' => '7W2','Subject' => 'CIS','Course No.' => '570','Section' => 'W01','Description' => 'Project Management','Capacity' => '20','# Enrolled' => '11'),
    array('Instructor' => 'Annadatha,Jayakumar','Term' => '2175','Season' => '2175','Session' => '7W2','Subject' => 'DA','Course No.' => '520','Section' => 'I01','Description' => 'Intro to Data Warehousing','Capacity' => '0','# Enrolled' => '1'),
    array('Instructor' => 'Childs,Jeffrey S','Term' => '2175','Season' => '2175','Session' => 'S3','Subject' => 'CIS','Course No.' => '110','Section' => 'W01','Description' => 'Computer Info Process','Capacity' => '35','# Enrolled' => '11'),
    array('Instructor' => 'Childs,Jeffrey S','Term' => '2175','Season' => '2175','Session' => 'S3','Subject' => 'CIS','Course No.' => '217','Section' => 'W01','Description' => 'Appl of Micro','Capacity' => '35','# Enrolled' => '21'),
    array('Instructor' => 'ODonnell,Jon P','Term' => '2175','Season' => '2175','Session' => 'S3','Subject' => 'CIS','Course No.' => '422','Section' => 'X01','Description' => 'Internship in Computers','Capacity' => '9','# Enrolled' => '5'),
    array('Instructor' => 'Childs,Jeffrey S','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '110','Section' => 'C01','Description' => 'Computer Info Process','Capacity' => '35','# Enrolled' => '35'),
    array('Instructor' => 'Childs,Jeffrey S','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '110','Section' => 'C02','Description' => 'Computer Info Process','Capacity' => '35','# Enrolled' => '35'),
    array('Instructor' => 'Kim,Soo','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '140','Section' => 'C01','Description' => 'Ess Topics Discr Math Comp Sc','Capacity' => '35','# Enrolled' => '35'),
    array('Instructor' => 'Wyatt,Joe','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '202','Section' => 'C01','Description' => 'Intro Program and Algorithms I','Capacity' => '30','# Enrolled' => '30'),
    array('Instructor' => 'Wyatt,Joe','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '202','Section' => 'C02','Description' => 'Intro Program and Algorithms I','Capacity' => '30','# Enrolled' => '33'),
    array('Instructor' => 'Hunter,Nancie L','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '217','Section' => 'C01','Description' => 'Appl of Micro','Capacity' => '35','# Enrolled' => '33'),
    array('Instructor' => 'Hunter,Nancie L','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '217','Section' => 'C02','Description' => 'Appl of Micro','Capacity' => '35','# Enrolled' => '34'),
    array('Instructor' => 'Hunter,Nancie L','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '217','Section' => 'C03','Description' => 'Appl of Micro','Capacity' => '35','# Enrolled' => '29'),
    array('Instructor' => 'Lucas,Ronald','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '217','Section' => 'C04','Description' => 'Appl of Micro','Capacity' => '35','# Enrolled' => '35'),
    array('Instructor' => 'Lucas,Ronald','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '217','Section' => 'C05','Description' => 'Appl of Micro','Capacity' => '35','# Enrolled' => '33'),
    array('Instructor' => 'Hunter,Nancie L','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '217','Section' => 'V01','Description' => 'Appl of Micro','Capacity' => '27','# Enrolled' => '22'),
    array('Instructor' => 'George,Randall Lee','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '217','Section' => 'W01','Description' => 'Appl of Micro','Capacity' => '35','# Enrolled' => '35'),
    array('Instructor' => 'Zboran,Beth','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '217','Section' => 'W02','Description' => 'Appl of Micro','Capacity' => '35','# Enrolled' => '34'),
    array('Instructor' => 'Zboran,Beth','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '217','Section' => 'W03','Description' => 'Appl of Micro','Capacity' => '35','# Enrolled' => '32'),
    array('Instructor' => 'Kim,Soo','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '230','Section' => 'C01','Description' => 'Practicum in CIS','Capacity' => '5','# Enrolled' => '1'),
    array('Instructor' => 'Wyatt,Joe','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '253','Section' => 'C01','Description' => 'Comp Org/Asb Lang','Capacity' => '25','# Enrolled' => '18'),
    array('Instructor' => 'Childs,Jeffrey S','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '254','Section' => 'C01','Description' => 'Data Structures','Capacity' => '35','# Enrolled' => '23'),
    array('Instructor' => 'Wyatt,Joe','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '270','Section' => 'C01','Description' => 'Client-Side Web Programming','Capacity' => '35','# Enrolled' => '24'),
    array('Instructor' => 'Strausser,Jody','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '301','Section' => 'C01','Description' => 'Comp Sys Analysis','Capacity' => '35','# Enrolled' => '21'),
    array('Instructor' => 'Strausser,Jody','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '301','Section' => 'C02','Description' => 'Comp Sys Analysis','Capacity' => '30','# Enrolled' => '26'),
    array('Instructor' => 'Strausser,Jody','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '330','Section' => 'C01','Description' => 'Info Systems Programming','Capacity' => '30','# Enrolled' => '31'),
    array('Instructor' => 'Kim,Soo','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '355','Section' => 'C01','Description' => 'Operating Systems I','Capacity' => '35','# Enrolled' => '34'),
    array('Instructor' => 'ODonnell,Jon P','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '402','Section' => 'C01','Description' => 'Database Design & Implement','Capacity' => '35','# Enrolled' => '23'),
    array('Instructor' => 'Kim,Soo','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '403','Section' => 'C01','Description' => 'Data Communications','Capacity' => '28','# Enrolled' => '21'),
    array('Instructor' => 'Strausser,Jody','Term' => '2178','Season' => '2178','Session' => '1','Subject' => 'CIS','Course No.' => '406','Section' => 'C01','Description' => 'Mobile Application Development','Capacity' => '28','# Enrolled' => '24')
);

$courseResultsTestArray = convertTermsForCourseQuestionResults($courseResultsTestArray);

echo '<pre>';
print_r($courseResultsTestArray);
echo '</pre>';


$course = $courseResultsTestArray;
?>

<body style="font-size: 20px; " class="wowItLooksReallyNice" onload="hideStuff()">
<h1><center>
        <input type="button" value="Back"  class="btn btn-danger left"  onclick="window.history.back()"/>
        <?php
        if (isset($stdq->searchName) and $stdq->searchName != "" and $stdq->searchName != null){
            echo ($stdq->searchName);
        }
        else if (isset($_POST['loadedSearch'])){
            echo $_POST['loadedSearch'];
        }
        ?>

</h1></center>

<center><br><h3>Results Found: <?php echo count($course); ?></h3></center>

<center>
    <table class="result_table" id ="result_table">
        <tr>
            <th id="checkboxes">&nbsp;</th>
            <th onclick = sortTable(1)>Instructor</th>
            <th onclick = sortTable(2)>Term</th>
            <th onclick = sortTable(3)>Season</th>
            <th onclick = sortTable(4)>Session</th>
            <th onclick = sortTable(5)>Subject</th>
            <th onclick = sortTable(6)>Course No.</th>
            <th onclick = sortTable(7)>Section</th>
            <th onclick = sortTable(8)>Description</th>
            <th onclick = sortTable(9)>Capacity</th>
            <th onclick = sortTable(10)># Enrolled</th>
        </tr>

        <?php
        foreach ($course as $aResult)
        {
            ?>
            <tr>
                <td><input type="checkbox"/></td>
                <td><?php echo $aResult['Instructor']; ?></td>
                <td><?php echo $aResult['Term']; ?></td>
                <td><?php echo $aResult['Season']; // need location on this ?></td>
                <td><?php echo $aResult['Session']; ?></td>
                <td><?php echo $aResult['Subject']; ?></td>
                <td><?php echo $aResult['Course No.']; ?></td>
                <td><?php echo $aResult['Section']; ?></td>
                <td><?php echo $aResult['Description']; ?></td>
                <td><?php echo $aResult['Capacity']; ?></td>
                <td><?php echo $aResult['# Enrolled']; ?></td>
            </tr>
            <?php
        }
        ?>

    </table></center>

<!--this is a div that contains all the buttons the user can interact with-->
<br>
<div id = "resultsButtons"><center>
        <button onclick = "selectAllResults()" > Check all </button>
        <button onclick = "deselectAllResults()" > Uncheck all </button>
        <button onclick = "exportTableToExcel('result_export_table', 'student-question-results')" > Export to Excel</button>


        <!--this is where the list of emails is stored-->
        <input id="emailList" type="text" readonly>
    </center></div>


<!--this here is where we hold the table that gets exported to excel sheet-->
<div id ="exportResults"  >

    <table class="result_export_table" id ="result_export_table">
            <tr>
                <th onclick = sortTable(1)>Instructor</th>
                <th onclick = sortTable(2)>Term</th>
                <th onclick = sortTable(3)>Season</th>
                <th onclick = sortTable(4)>Session</th>
                <th onclick = sortTable(5)>Subject</th>
                <th onclick = sortTable(6)>Course No.</th>
                <th onclick = sortTable(7)>Section</th>
                <th onclick = sortTable(8)>Description</th>
                <th onclick = sortTable(9)>Capacity</th>
                <th onclick = sortTable(10)># Enrolled</th>
            </tr>

            <?php
            foreach ($course as $aResult)
            {
                ?>
                <tr>
                    <td><?php echo $aResult['Instructor']; ?></td>
                    <td><?php echo $aResult['Term']; ?></td>
                    <td><?php echo $aResult['Season']; // need location on this ?></td>
                    <td><?php echo $aResult['Session']; ?></td>
                    <td><?php echo $aResult['Subject']; ?></td>
                    <td><?php echo $aResult['Course No.']; ?></td>
                    <td><?php echo $aResult['Section']; ?></td>
                    <td><?php echo $aResult['Description']; ?></td>
                    <td><?php echo $aResult['Capacity']; ?></td>
                    <td><?php echo $aResult['# Enrolled']; ?></td>
                </tr>
                <?php
            }
            ?>

        </table>
</div>

</body>
</html>