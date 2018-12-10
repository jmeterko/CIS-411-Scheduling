
function alertCourseQuestion(){
    alert("This is the course question JS file");
}


function makeDivVisibleOrCourseQuestion(){
    //loadDoc("../model/getCoursesUsingAjax.php", loadCoursesUsingAjax);  //AJAX call
    //getSubjectsAndCatalogsForDropdown();
    //loadDoc("../model/getCoursesUsingJSON.php", getSubjectsUsingJSON);  //AJAX call, uses JSON
    var attachDiv=document.getElementById('attach'+and);
    //or=attachDiv.children.length+1;
    var dynamicDiv=document.createElement("div");
    $(dynamicDiv).addClass("inline");
    $(dynamicDiv).addClass("fixedWidthToPreventBreakup");
    if(freshlyChanged || orButton) {
        if ($('#dropdown' + and + ' option:selected').text() == "Program") {
            //alert("called");
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"'  onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadPrograms(this.id)' class='dropdownWidth' name='MajorMinor" + and + or +"' id='MajorMinor" + and  + or +"'><option value=''" +
                "selected disabled hidden>Select Option</option><option value='Any Major'>Any Major</option><option value='Any Minor'>Any Minor</option>" +
                "</select>&nbsp;<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressedCourseQuestion(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Location" || $('#dropdown' + and + ' option:selected').text() == "Campus") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select class='dropdownWidth' name='Location" + and + or +"' id='Location" + and  + or +"' ><option value''" +
                ">Select Option</option><option value='Clarion'>Clarion</option><option value='Online'>Online</option>" +
                "<option value='Venango'>Venango</option></select>&nbsp;<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressedCourseQuestion(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Taking" || $('#dropdown' + and + ' option:selected').text() == "Scheduled For" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking" || $('#dropdown' + and + ' option:selected').text() == "Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking/Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Scheduled For" || $('#dropdown' + and + ' option:selected').text() == "Course") { +
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadSubjects(this.id)' onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' name='Subject" + and + or +"' id='Subject" + and  + or +"'><option value=''" +
                "selected disabled hidden>Subject</option>" + SubjectOptionsString + "</select>&nbsp;<select class='dropdownboxWidthSmall' name='Catalog" + and + or +"' id='Catalog" + and  + or +"'>" +
                "<option value=''\ selected disabled hidden>Course No:</option></select>&nbsp<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressedCourseQuestion(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Completed" || $('#dropdown' + and + ' option:selected').text() == "Taking/Completed") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadSubjects(this.id)'  onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' name='Subject" + and + or +"' id='Subject" + and  + or +"' ><option value=''"+
                "selected disabled hidden>Subject</option>" + SubjectOptionsString + "</select>&nbsp;<select class='dropdownboxWidthSmall' name='Catalog" + and + or +"' id='Catalog" + and  + or +"'>" +
                "<option value=''\ selected disabled hidden>Course No:</option></select>&nbsp;<select style='20%;' name='MinGrade" + and + or +"' id='MinGrade" + and  + or +"''>\" +\n" +
                "                \"<option value=''\\ selected disabled hidden>Min. Grade</option><option value='Passed'>Passed</option><option value='A'>A</option>" +
                "<option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select>&nbsp<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressedCourseQuestion(this.id)'>Or</button>&nbsp;&nbsp;");
        }else if ($('#dropdown' + and + ' option:selected').text() == "Instructor") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' name='removeOrDiv" + and + or +"' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadInstructors(this.id)' class='dropdownWidth' name='Instructor" + and + or +"' id='Instructor" + and  + or +"'><option value=''" +
                "selected disabled hidden>Select Option</option><option value='Any Major'>Any Major</option><option value='Any Minor'>Any Minor</option>" +
                "</select>&nbsp;<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressedCourseQuestion(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        freshlyChanged=false;
        or++;
        orValueChanged();
    }
    else{
        while(attachDiv.firstChild) {
            attachDiv.removeChild(attachDiv.firstChild);
        }
        if ($('#dropdown' + and + ' option:selected').text() == "Program")  {
            //alert("called");
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadPrograms(this.id)' class='dropdownWidth' name='MajorMinor" + and + or +"' id='MajorMinor" + and  + or +"'><option value=''" +
                "selected disabled hidden>Select Option</option><option value='Any Major'>Any Major</option><option value='Any Minor'>Any Minor</option>" +
                "</select>&nbsp;<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressedCourseQuestion(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Location" || $('#dropdown' + and + ' option:selected').text() == "Campus") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' name='Location" + and + or +"' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select class='dropdownWidth' name='Location" + and + or +"' id='Location" + and  + or +"' ><option value''" +
                ">Select Option</option><option value='Clarion'>Clarion</option><option value='Online'>Online</option>" +
                "<option value='Venango'>Venango</option></select>&nbsp;<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressedCourseQuestion(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Taking" || $('#dropdown' + and + ' option:selected').text() == "Scheduled For" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking" || $('#dropdown' + and + ' option:selected').text() == "Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking/Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Scheduled For" || $('#dropdown' + and + ' option:selected').text() == "Course") { +
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' name='Subject" + and + or +"' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadSubjects(this.id)'  onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' name='Subject" + and + or +"' id='Subject" + and  + or +"'><option value=''" +
                "selected disabled hidden>Subject</option>" + SubjectOptionsString + "</select>&nbsp;<select class='dropdownboxWidthSmall' name='Catalog" + and + or +"' id='Catalog" + and  + or +"'>" +
                "<option value=''\ selected disabled hidden>Course No:</option></select>&nbsp<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressedCourseQuestion(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Completed" || $('#dropdown' + and + ' option:selected').text() == "Taking/Completed") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadSubjects(this.id)'  onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' name='Subject" + and + or +"' id='Subject" + and  + or +"' ><option value=''"+
                "selected disabled hidden>Subject</option>" + SubjectOptionsString + "</select>&nbsp;<select class='dropdownboxWidthSmall' name='Catalog" + and + or +"' id='Catalog" + and  + or +"'>" +
                "<option value=''\ selected disabled hidden>Course No:</option></select>&nbsp;<select style='20%;' name='MinGrade" + and + or +"' id='MinGrade" + and  + or +"''>\" +\n" +
                "                \"<option value=''\\ selected disabled hidden>Min. Grade</option><option value='Passed'>Passed</option><option value='A'>A</option>" +
                "<option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select>&nbsp<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressedCourseQuestion(this.id)'>Or</button>&nbsp;&nbsp;");
        }else if ($('#dropdown' + and + ' option:selected').text() == "Instructor") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' name='removeOrDiv" + and + or +"' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadInstructors(this.id)' class='dropdownWidth' name='Instructor" + and + or +"' id='Instructor" + and  + or +"'><option value=''" +
                "selected disabled hidden>Select Option</option>" +
                "</select>&nbsp;<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressedCourseQuestion(this.id)'>Or</button>&nbsp;&nbsp;");
        }

        or++;
        orValueChanged();
    }
    attachDiv.appendChild(dynamicDiv);
    orButton=false;
}


function orButtonPressedCourseQuestion(pID){
    var placeholder=pID.replace( /[^0-9]/g, `` );
    and=placeholder.charAt(0);
    //alert(and);
    orButton=true;
    makeDivVisibleOrCourseQuestion();
}
function dropdownFreshlyChangedCourseQuestion(pID){
    and=pID.replace( /[^0-9]/g, `` );
    //alert(and);
    or=0;
    makeDivVisibleOrCourseQuestion();
}

var JSONObjectHoldingAllOfOurInstructors;
//call this function with loadDoc(), pass in getCoursesUsingJSON.php
function getInstructorsUsingJSON(){
    console.log("getting instructors with ajax");
    let xhttp;
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            JSONObjectHoldingAllOfOurInstructors = JSON.parse(xhttp.responseText);//#ReadableCode
            //then, do stuff with our JSON object that holds all of our courses
            console.log("instructors:");
            console.log(JSONObjectHoldingAllOfOurInstructors);
            return JSONObjectHoldingAllOfOurInstructors;
        }
    };
    xhttp.open("GET", "../model/getInstructorsUsingJSON.php", true);
    xhttp.send();

}

//loads a particular dropdown with all of our programs
function loadInstructors(pInstructorDropdownID){
    console.log("Instructors:");
    console.log(JSONObjectHoldingAllOfOurInstructors);
    document.getElementById(pInstructorDropdownID).innerHTML = "<option value='Instructor' selected disabled hidden>" + "Instructor" + "</option>";
    for (InstructorFound in JSONObjectHoldingAllOfOurInstructors){
        document.getElementById(pInstructorDropdownID).innerHTML += "<option value='" + JSONObjectHoldingAllOfOurInstructors[InstructorFound]['InstructorName'] + "'>" + JSONObjectHoldingAllOfOurInstructors[InstructorFound]['InstructorName'] + "</option>";
    }
}