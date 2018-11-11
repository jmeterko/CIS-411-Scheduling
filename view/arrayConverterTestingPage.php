<?php
$title = "Import Data";
require '../view/headerInclude.php';
require_once '../model/model.php';
?>

<h3>Array converter testing page</h3>

<?php
//here's the array we'll be testing with
//This is what the results of an INNER JOIN look like for students and student-majors
$studentResults = array(
    array('ID' => '10017948','NAME' => 'Black,Katie Nicole','CURRENT' => 'N','Last_Term' => '2081','Total' => '125.000','GPA' => '3.208','Program' => 'BS CS', 'EagleMail_ID' => 'K.N.Black@eagle.clarion.edu'),
    array('ID' => '10017948','NAME' => 'Black,Katie Nicole','CURRENT' => 'N','Last_Term' => '2081','Total' => '125.000','GPA' => '3.208','Program' => 'BS IS', 'EagleMail_ID' => 'K.N.Black@eagle.clarion.edu'),
    array('ID' => '10017948','NAME' => 'Black,Katie Nicole','CURRENT' => 'N','Last_Term' => '2081','Total' => '125.000','GPA' => '3.208','Program' => 'MN SPAN', 'EagleMail_ID' => 'K.N.Black@eagle.clarion.edu'),
    array('ID' => '10020394','NAME' => 'McNaughton,Torey Taylor','CURRENT' => 'Y','Last_Term' => '2188','Total' => '79.500','GPA' => '2.763','Program' => 'BS CS','EagleMail_ID' => 'T.T.Mcnaughton@eagle.clarion.edu'),
    array('ID' => '10020394','NAME' => 'McNaughton,Torey Taylor','CURRENT' => 'Y','Last_Term' => '2188','Total' => '79.500','GPA' => '2.763','Program' => 'BS MATH','EagleMail_ID' => 'T.T.Mcnaughton@eagle.clarion.edu'),
    array('ID' => '10028629','NAME' => 'Sanders,Robert Ethan','CURRENT' => 'N','Last_Term' => '2031','Total' => '38.000','GPA' => '1.830','Program' => 'BS CS','EagleMail_ID' => 'R.E.Sanders@eagle.clarion.edu'),
    array('ID' => '10028629','NAME' => 'Sanders,Robert Ethan','CURRENT' => 'N','Last_Term' => '2031','Total' => '38.000','GPA' => '1.830','Program' => 'BS DA','EagleMail_ID' => 'R.E.Sanders@eagle.clarion.edu'),
    array('ID' => '10031852','NAME' => 'Pruett,Robert Lee','CURRENT' => 'N','Last_Term' => '2078','Total' => '121.000','GPA' => '3.458','Program' => 'BS CS','EagleMail_ID' => 'R.L.Pruett@eagle.clarion.edu'),
    array('ID' => '10031852','NAME' => 'Pruett,Robert Lee','CURRENT' => 'N','Last_Term' => '2078','Total' => '121.000','GPA' => '3.458','Program' => 'BS ENG','EagleMail_ID' => 'R.L.Pruett@eagle.clarion.edu'),
    array('ID' => '10032557','NAME' => 'Barclay II,Roy L','CURRENT' => 'N','Last_Term' => '2088','Total' => '122.000','GPA' => '2.935','Program' => 'BS CS','EagleMail_ID' => 'R.L.Barclay@eagle.clarion.edu'),
    array('ID' => '10032557','NAME' => 'Barclay II,Roy L','CURRENT' => 'N','Last_Term' => '2088','Total' => '122.000','GPA' => '2.935','Program' => 'BS QUAD','EagleMail_ID' => 'R.L.Barclay@eagle.clarion.edu'),
    array('ID' => '10036901','NAME' => 'DeSantis,Kelley R','CURRENT' => 'N','Last_Term' => '2081','Total' => '120.000','GPA' => '2.544','Program' => 'BS CS','EagleMail_ID' => 'K.R.Desantis@eagle.clarion.edu'),
    array('ID' => '10036901','NAME' => 'DeSantis,Kelley R','CURRENT' => 'N','Last_Term' => '2081','Total' => '120.000','GPA' => '2.544','Program' => 'BS BICH','EagleMail_ID' => 'K.R.Desantis@eagle.clarion.edu'),
    array('ID' => '10041076','NAME' => 'Fox,Dylan Lewis','CURRENT' => 'N','Last_Term' => '2088','Total' => '26.000','GPA' => '1.548','Program' => 'BS CS','EagleMail_ID' => 'D.L.Fox@eagle.clarion.edu'),
    array('ID' => '10041076','NAME' => 'Fox,Dylan Lewis','CURRENT' => 'N','Last_Term' => '2088','Total' => '26.000','GPA' => '1.548','Program' => 'BS GBY','EagleMail_ID' => 'D.L.Fox@eagle.clarion.edu'),
    array('ID' => '10042711','NAME' => 'Janoski,Evan Joseph','CURRENT' => 'N','Last_Term' => '2078','Total' => '169.000','GPA' => '3.548','Program' => 'BS CS','EagleMail_ID' => 'E.J.Janoski@eagle.clarion.edu'),
    array('ID' => '10042711','NAME' => 'Janoski,Evan Joseph','CURRENT' => 'N','Last_Term' => '2078','Total' => '169.000','GPA' => '3.548','Program' => 'BS IS','EagleMail_ID' => 'E.J.Janoski@eagle.clarion.edu'),
    array('ID' => '10043657','NAME' => 'Rossey,Kenny Matthew','CURRENT' => 'N','Last_Term' => '2078','Total' => '156.000','GPA' => '3.275','Program' => 'BS CS','EagleMail_ID' => 'K.M.Rossey@eagle.clarion.edu'),
    array('ID' => '10044761','NAME' => 'Shaw,Stevi Lynn','CURRENT' => 'N','Last_Term' => '2075','Total' => '95.000','GPA' => '2.953','Program' => 'BS IS','EagleMail_ID' => 'S.L.Shaw@eagle.clarion.edu'),
    array('ID' => '10044761','NAME' => 'Shaw,Stevi Lynn','CURRENT' => 'N','Last_Term' => '2075','Total' => '95.000','GPA' => '2.953','Program' => 'MN CS','EagleMail_ID' => 'S.L.Shaw@eagle.clarion.edu'),
    array('ID' => '10051018','NAME' => 'Ward,Mary Catherine','CURRENT' => 'N','Last_Term' => '2085','Total' => '120.000','GPA' => '2.564','Program' => 'BS QR','EagleMail_ID' => 'M.C.Ward@eagle.clarion.edu'),
    array('ID' => '10051450','NAME' => 'Flaskos,Harry Michael','CURRENT' => 'N','Last_Term' => '2078','Total' => '120.000','GPA' => '3.100','Program' => 'BS ZL','EagleMail_ID' => 'H.M.Flaskos@eagle.clarion.edu'),
    array('ID' => '10051450','NAME' => 'Flaskos,Harry Michael','CURRENT' => 'N','Last_Term' => '2078','Total' => '120.000','GPA' => '3.100','Program' => 'BS CS','EagleMail_ID' => 'H.M.Flaskos@eagle.clarion.edu'),
    array('ID' => '10051487','NAME' => 'Gallo,Allison Marie','CURRENT' => 'N','Last_Term' => '2081','Total' => '132.000','GPA' => '2.969','Program' => 'BS HIST','EagleMail_ID' => 'A.M.Gallo@eagle.clarion.edu'),
    array('ID' => '10051611','NAME' => 'Hurst,Lon J','CURRENT' => 'N','Last_Term' => '2161','Total' => '122.000','GPA' => '1.863','Program' => 'BS FOO','EagleMail_ID' => 'L.J.Hurst@eagle.clarion.edu'),

);

echo "First we print the original array, with INNERJOIN results:<br>";
echo "<pre>";
print_r($studentResults);
echo "</pre>";

echo "Then we print the processed array, with results in the format our results page needs:<br>";
echo "<pre>";
print_r(combineJoinResults($studentResults));
echo "</pre>";



?>
<?php
require '../view/footerInclude.php';
?>
