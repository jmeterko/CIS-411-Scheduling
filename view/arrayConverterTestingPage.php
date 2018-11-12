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
    array('ID' => '10042603','NAME' => 'Porter,Hunter J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '42.000','GPA' => '2.224','EagleMail_ID' => 'H.J.Porter@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '10042603','NAME' => 'Porter,Hunter J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '42.000','GPA' => '2.224','EagleMail_ID' => 'H.J.Porter@eagle.clarion.edu','Plan' => 'MN INF SYS'),
    array('ID' => '10509518','NAME' => 'Corvino,Melissa Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '39.000','GPA' => '3.923','EagleMail_ID' => 'M.M.Corvino@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11015216','NAME' => 'Walentosky,Matthew James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '30.000','GPA' => '3.667','EagleMail_ID' => 'M.J.Walentosky@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11018162','NAME' => 'Hoffmann,Maximilian','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '32.000','GPA' => '2.682','EagleMail_ID' => 'M.Hoffmann1@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11021113','NAME' => 'Martin,Kenneth Earl','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2135','Total' => '30.000','GPA' => '2.735','EagleMail_ID' => 'K.E.Martin1@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11024439','NAME' => 'McCoy,Andrew Edward','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '50.000','GPA' => '3.360','EagleMail_ID' => 'A.E.Mccoy@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11028036','NAME' => 'O\'Donnell,David Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2149','Total' => '39.000','GPA' => '3.231','EagleMail_ID' => 'D.M.Odonnell@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11028036','NAME' => 'O\'Donnell,David Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2149','Total' => '39.000','GPA' => '3.231','EagleMail_ID' => 'D.M.Odonnell@eagle.clarion.edu','Plan' => 'BS MATH'),
    array('ID' => '11030628','NAME' => 'Kissick,Charles','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '59.000','GPA' => '3.071','EagleMail_ID' => 'C.Kissick@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11030628','NAME' => 'Kissick,Charles','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '59.000','GPA' => '3.071','EagleMail_ID' => 'C.Kissick@eagle.clarion.edu','Plan' => 'MN FRENCH'),
    array('ID' => '11030628','NAME' => 'Kissick,Charles','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '59.000','GPA' => '3.071','EagleMail_ID' => 'C.Kissick@eagle.clarion.edu','Plan' => 'MN MATH'),
    array('ID' => '11037970','NAME' => 'Brown,Kegan Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '30.000','GPA' => '2.100','EagleMail_ID' => 'K.M.Brown4@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11038258','NAME' => 'Hinton,Lorri Ann','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '33.000','GPA' => '3.719','EagleMail_ID' => 'L.A.Hinton@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11039847','NAME' => 'MacNamara,Drew William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '59.000','GPA' => '3.390','EagleMail_ID' => 'D.W.MacNamara@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11039847','NAME' => 'MacNamara,Drew William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '59.000','GPA' => '3.390','EagleMail_ID' => 'D.W.MacNamara@eagle.clarion.edu','Plan' => 'MN ART'),
    array('ID' => '11039847','NAME' => 'MacNamara,Drew William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '59.000','GPA' => '3.390','EagleMail_ID' => 'D.W.MacNamara@eagle.clarion.edu','Plan' => 'MN WEB DEV'),
    array('ID' => '11041024','NAME' => 'Ramsey,Landon Arthur','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '36.000','GPA' => '2.475','EagleMail_ID' => 'L.A.Ramsey@eagle.clarion.edu','Plan' => 'BS CS')
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
