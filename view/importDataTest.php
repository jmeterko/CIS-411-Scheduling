<?php
$title = "Import Data";
require '../view/headerInclude.php';
?>

<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<body style="
  width: 400px;
  margin: 100px auto;
  background-color: #f5f5f5;
">
    <div class="file-upload">
        <div class="file-select">
            <div class="file-select-button" id="fileName">Import Students</div>
            <div class="file-select-name" id="noFile">No file chosen...</div>
            <input name="userfilestudents" type="file" value="Students"/><br/>
        </div>
    </div>
    <br/>
    <div class="file-upload">
        <div class="file-select">
            <div class="file-select-button" id="fileName">Import Classes</div>
            <div class="file-select-name" id="noFile">No file chosen...</div>
            <input name="userfileclasses" type="file" value="Classes" /><br/>
        </div>
    </div>
    <br/>
    <div class="file-upload">
        <div class="file-select">
            <div class="file-select-button" id="fileName">Import Student-Classes</div>
            <div class="file-select-name" id="noFile">No file chosen...</div>
            <input name="ufstudclass" type="file" value="StudentsClasses"/><br/>
        </div>
    </div>
</body>