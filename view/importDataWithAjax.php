<?php
$title = "Import Data Testing With Ajax";
require '../view/headerInclude.php';
?>
<!--
    This page will replace importData.php, or we will route here from controller.
    As of 11/6 this is working, it sends the form data to processImportData.php just like original importData
    All we need to do is add the loading circle and the style, and it'll be ready for shipping.

    We also still don't update settings like Latest Term yet.  When am i gonna get around to that?
--><body style="
  width: 450px;
  margin: 100px auto;
  background-color: #becccc;"
  id = "body">
<form id="file-form" action="" method="POST">
    <h1>Upload Files Using Ajax</h1>
    <div class="file-upload">
        <div class="file-select"style="width:450px;">
            <div class="file-select-button" id="fileName">Students&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <div class="file-select-name" id="noFile0">No file chosen...</div>
            <input id="userfilestudents0" name="userfilestudents" type="file" value="Students" oninput="changeFileDiv(this.id)"/>
        </div>
    </div>
    <br>
    <div class="file-upload">
        <div class="file-select" style="width:450px;">
            <div class="file-select-button" id="fileName">Classes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <div class="file-select-name" id="noFile1">No file chosen...</div>

            <input id="userfileclasses1" name="userfileclasses" type="file" value="Classes"oninput="changeFileDiv(this.id)" />
        </div>
    </div>
    <br>
    <div class="file-upload">
        <div class="file-select" style="width:450px;">
            <div class="file-select-button" id="fileName">Student-Classes</div>
            <div class="file-select-name" id="noFile2">No file chosen...</div>

            <input id="ufstudclass2" name="ufstudclass" type="file" value="StudentsClasses"oninput="changeFileDiv(this.id)"/>
        </div>
    </div>
    <br>
    <!--<input type="file" id="file-select" name="userfilestudents"/>
    <input type="file" id="file-select" name="userfilestudents"/>
    <input type="file" id="file-select" name="userfilestudents"/>-->
    <input type="button" value="Back" style="float:left" class="btn btn-danger"  onclick="window.location.href='../controller/controller.php?action=HomePage'"/>
    <input type="submit" value="Submit" id="upload-button" style="float:right" class="btn btn-success"/>
    <br><br>

</form>

<script>
    //set up references to form elements
    var form = document.getElementById('file-form');
    var studentSelect0 = document.getElementById('userfilestudents0');
    var classesSelect1 = document.getElementById('userfileclasses1');
    var studclassSelect2 = document.getElementById('ufstudclass2');
    var uploadButton = document.getElementById('upload-button');

    //set up listener for form submit event
    form.onsubmit = function(event) {
        event.preventDefault();

        // Update button text.
        uploadButton.value = 'Uploading...';

        // The rest of the code will go here...
        // Get the selected files from the input.
        var studentFile = studentSelect0.files;
        var classFile = classesSelect1.files;
        var studentclassFile = studclassSelect2.files;
        // Create a new FormData object.
        var formData = new FormData();
        // Loop through each of the selected files.
        formData.append('userfilestudents', studentSelect0.files[0]);
        formData.append('userfileclasses', classesSelect1.files[0]);
        formData.append('ufstudclass', studclassSelect2.files[0]);
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
                uploadButton.value = 'Complete!';
                uploadButton.disabled = true;
                //when complete, load the response text:
                document.getElementById('body').innerHTML = xhr.responseText;
            } else {
                alert('An error occurred!');
            }
        };
        // Send the Data.
        xhr.send(formData);
    }
</script>
<?php
require '../view/footerInclude.php';
?>
