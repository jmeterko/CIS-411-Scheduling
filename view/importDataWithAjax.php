<?php
$title = "Import Data Testing With Ajax";
require '../view/headerInclude.php';
?>
<!--
    This page will replace importData.php, or we will route here from controller.
    As of 11/6 this is working, it sends the form data to processImportData.php just like original importData
    All we need to do is add the loading circle and the style, and it'll be ready for shipping.
-->
<form id="file-form" action="importDataWithAjax.php" method="POST">
    <h1>Upload Files Using Ajax</h1>
    Students:
    <input id="userfilestudents" name="userfilestudents" type="file" value="Students"/>
    <br>
    Classes:
    <input id="userfileclasses" name="userfileclasses" type="file" value="Classes" />
    <br>
    Students-Classes:
    <input id="ufstudclass" name="ufstudclass" type="file" value="StudentsClasses"/>
    <br>
    <!--<input type="file" id="file-select" name="userfilestudents"/>
    <input type="file" id="file-select" name="userfilestudents"/>
    <input type="file" id="file-select" name="userfilestudents"/>-->
    <button type="submit" id="upload-button">Upload</button>
</form>

<script>
    //set up references to form elements
    var form = document.getElementById('file-form');
    var studentSelect = document.getElementById('userfilestudents');
    var classesSelect = document.getElementById('userfileclasses');
    var studclassSelect = document.getElementById('ufstudclass');
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
<?php
require '../view/footerInclude.php';
?>
