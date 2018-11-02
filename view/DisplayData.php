<?php
$title = "Homepage";
require '../view/headerInclude.php';
?>


<body style="font-size: 20px; ">
<center><h1>Results</h1></center>
<center>
    <table class="my_table" id ="result_table">
        <tr>
            <th id="checkboxes">&nbsp;</th>
            <th>ID</th>
            <th>Name</th>
            <th>Campus</th>
            <th>Current</th>
            <th>Last Term</th>
            <th>Total Credits</th>
            <th>Rank</th>
            <th>GPA</th>
            <th>Programs</th>
            <th>Eagle Mail</th>
            <th>History</th>
        </tr>
        <tr>
            <td><input type="checkbox"/></td>
            <td>123456789</td>
            <td>Bob Smith</td>
            <td>Clarion</td>
            <td>Y</td>
            <td>Spring 2018</td>
            <td>110</td>
            <td>Junior</td>
            <td>2.5</td>
            <td>CIS</td>
            <td>b.p.smith@eagle.clarion.edu</td>
            <td>History</td>
        </tr>
        <tr>
            <td><input type="checkbox"/></td>
            <td>123456789</td>
            <td>Bob Smith</td>
            <td>Clarion</td>
            <td>Y</td>
            <td>Spring 2018</td>
            <td>110</td>
            <td>Junior</td>
            <td>2.5</td>
            <td>CIS</td>
            <td>b.n.smith@eagle.clarion.edu</td>
            <td>History</td>
        </tr>
        <tr>
            <td><input type="checkbox"/></td>
            <td>123456789</td>
            <td>Bob Smith</td>
            <td>Clarion</td>
            <td>Y</td>
            <td>Spring 2018</td>
            <td>110</td>
            <td>Junior</td>
            <td>2.5</td>
            <td>CIS</td>
            <td>b.m.smith@eagle.clarion.edu</td>
            <td>History</td>
        </tr>
        <tr>
            <td><input type="checkbox"/></td>
            <td>123456789</td>
            <td>Bob Smith</td>
            <td>Clarion</td>
            <td>Y</td>
            <td>Spring 2018</td>
            <td>110</td>
            <td>Junior</td>
            <td>2.5</td>
            <td>CIS</td>
            <td>b.k.smith@eagle.clarion.edu</td>
            <td>History</td>
        </tr>
        <tr>
            <td><input type="checkbox"/></td>
            <td>123456789</td>
            <td>Bob Smith</td>
            <td>Clarion</td>
            <td>Y</td>
            <td>Spring 2018</td>
            <td>110</td>
            <td>Junior</td>
            <td>2.5</td>
            <td>CIS</td>
            <td>b.l.smith@eagle.clarion.edu</td>
            <td>History</td>
        </tr>
    </table></center>
<!--the copy emails button-->
<button onclick = "copyEmailsToClipboard()" > Copy Selected Emails to Clipboard </button>

<div id = "emails">
    <input id="emailList" type="text" visibility="hidden" readonly>
</div>

</body>
</html>