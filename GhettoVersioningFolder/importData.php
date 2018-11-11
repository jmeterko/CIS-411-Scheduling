<?php
$title = "Import Data";
require '../view/headerInclude.php';
?>

<body style="
  width: 400px;
  margin: 100px auto;
  background-color: #becccc;"
">

    <form id="file-form" method="POST" action="">
        <div class="file-upload">
            <div class="file-select">
                <div class="file-select-button" id="fileName">Students&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="file-select-name" id="noFile0">No file chosen...</div>
                <input name="userfilestudents" type="file" value="Students" id="StudentsFile0" oninput="changeFileDiv(this.id)"/><br/>
            </div>
        </div>
        <br/>
        <div class="file-upload">
            <div class="file-select">
                <div class="file-select-button" id="fileName">Classes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="file-select-name" id="noFile1">No file chosen...</div>
                <input name="userfileclasses" type="file" value="Classes" id="ClassesFile1" onchange="changeFileDiv(this.id)"/><br/>
            </div>
        </div>
        <br/>
        <div class="file-upload">
            <div class="file-select">
                <div class="file-select-button" id="fileName">Student-Classes</div>
                <div class="file-select-name" id="noFile2">No file chosen...</div>
                <input name="ufstudclass" type="file" value="StudentsClasses" id="StudentClassesFile2" onchange="changeFileDiv(this.id)"/><br/>
            </div>
        </div>
    <br/>
    <input type="button" value="Back" style="float:left" class="btn btn-danger"  onclick="window.location.href='../controller/controller.php?action=HomePage'"/>
    <input type="submit" value="Submit" id="upload-button" style="float:right" class="btn btn-success"/>
    </form>
</body>

<script>
    //set up references to form elements
    var form = document.getElementById('file-form');
    var studentSelect = document.getElementById('StudentsFile0');
    var classesSelect = document.getElementById('ClassesFile1');
    var studclassSelect = document.getElementById('StudentClassesFile2');
    var uploadButton = document.getElementById('upload-button');

    //set up listener for form submit event
    form.onsubmit = function(event) {
        event.preventDefault();

        // Update button text.
        uploadButton.innerHTML = 'Uploading...';

        // The rest of the code will go here...
        // Get the selected files from the input.
        var studentFile = studentSelect.files;
        var classFile = classesSelect.files;
        var studentclassFile = studclassSelect.files;
        // Create a new FormData object.
        var formData = new FormData();
        // Loop through each of the selected files.
        formData.append('userfilestudents', studentSelect.files[0]);
        formData.append('userfileclasses', classesSelect.files[0]);
        formData.append('ufstudclass', studclassSelect.files[0]);
        /*for (var i = 0; i < files.length; i++) {
            var file = files[i];

            /!*!// Check the file type.
            if (!file.type.match('application/vnd.ms-excel')) {
                continue;
            }*!/
            let whichFileName = 'whichfilenameisit';
            if (i == 0)
                whichFileName = 'userfilestudents';
            else if (i == 1)
                whichFileName = 'userfileclasses';
            else if (i == 2)
                whichFileName = 'ufstudclass';
            // Add the file to the request.
            formData.append(whichFileName, file, file.name);
        }*/
        // Set up the request.
        var xhr = new XMLHttpRequest();
        // Open the connection.
        xhr.open('POST', '../view/processImportData.php', true);
        // Set up a handler for when the request finishes.
        xhr.onload = function () {
            if (xhr.status === 200) {
                // File(s) uploaded.
                uploadButton.innerHTML = 'Upload';
            } else {
                alert('An error occurred!');
            }
        };
        // Send the Data.
        xhr.send(formData);
    }
</script>
