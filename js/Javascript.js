//GLOBALS
var and=0;
var or=0;
var flag=true;
var freshlyChanged=true;
var orButton=false;
var firstAnd=false;
var uniqueID=0;

//var $=document.getElementById();

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {

        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

function firstAndPress(){

}
function changeFileDiv(pID){
    console.log("changed file div");
    var filename = $('#' + pID).val().replace('', '');
    fileCounter=pID.replace( /[^0-9]/g, `` );
    var currentFileDiv=$('#noFile' + fileCounter);
    currentFileDiv.html(filename);
}

function makeDivVisibleAnd(pID){
    //alert("called");
    and=pID.replace( /[^0-9]/g, `` );
    and++;
    document.getElementById("divAnd" + and).removeAttribute("class","hiddenDiv");
    document.getElementById("divAnd" + and).setAttribute("class","visibleDiv");
    //alert("divAnd"+and);
}

function makeDivInvisible(pID){
    var attachID=`attach` + pID.replace( /[^0-9]/g, `` );
    //alert(attachID);
    while(document.getElementById(attachID).firstChild) {
        document.getElementById(attachID).removeChild(document.getElementById(attachID).firstChild);
    }
    $("#dropdown1").on("click", function () {
        $('#default').prop('selected', function() {
            return this.defaultSelected;
        });
    });
    document.getElementById("divAnd" + and).removeAttribute("class","visibleDiv");
    document.getElementById("divAnd" + and).setAttribute("class","hiddenDiv");
    and--;
}

function removeOrDiv(pID){
    var placeholder=pID.replace( /[^0-9]/g, `` );
    and=placeholder.charAt(0);
    var attachDiv=document.getElementById('attach'+and);
    if(attachDiv.children.length > 1) {
        attachDiv.removeChild(attachDiv.childNodes[or - 1]);
        or--;
    }
}

function makeDivVisibleOr(){       // **replace with stevens code**
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
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadPrograms(this.id)' class='dropdownWidth' id='MajorMinor" + and  + or +"'><option value=''" +
                "selected disabled hidden>Select Option</option><option value='Any Major'>Any Major</option><option value='Any Minor'>Any Minor</option>" +
                "</select>&nbsp;<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Location") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select class='dropdownWidth' id='Location" + and  + or +"' ><option value''" +
                "selected disabled hidden>Select Option</option><option value='Clarion'>Clarion</option><option value='Online'>Online</option>" +
                "<option value='Venango'>Venango</option></select>&nbsp;<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Taking" || $('#dropdown' + and + ' option:selected').text() == "Scheduled For" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking" || $('#dropdown' + and + ' option:selected').text() == "Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking/Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Scheduled For") { +
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadSubjects(this.id)'  onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' id='Subject" + and  + or +"'><option value=''" +
                "selected disabled hidden>Subject</option><option value='CIS'>CIS</option><option value='DA'>DA</option></select>&nbsp;<select class='dropdownboxWidthSmall' id='Catalog" + and  + or +"'>" +
                "<option value=''\ selected disabled hidden>Course No:</option></select>&nbsp<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Completed" || $('#dropdown' + and + ' option:selected').text() == "Taking/Completed") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadSubjects(this.id)'  onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' id='Subject" + and  + or +"' ><option value=''"+
                "selected disabled hidden>Subject</option><option value='CIS'>CIS</option><option value='DA'>DA</option></select>&nbsp;<select class='dropdownboxWidthSmall' id='Catalog" + and  + or +"'>" +
                "<option value=''\ selected disabled hidden>Course No:</option></select>&nbsp;<select style='20%;' id='MinGrade" + and  + or +"''>\" +\n" +
                "                \"<option value=''\\ selected disabled hidden>Min. Grade</option><option value='Passed'>Passed</option><option value='A'>A</option>" +
                "<option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select>&nbsp<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        freshlyChanged=false;
        or++;
    }
    else{
        while(attachDiv.firstChild) {
            attachDiv.removeChild(attachDiv.firstChild);
        }
        if ($('#dropdown' + and + ' option:selected').text() == "Program") {
            //alert("called");
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadPrograms(this.id)' class='dropdownWidth' id='MajorMinor" + and  + or +"'><option value=''" +
                "selected disabled hidden>Select Option</option><option value='Any Major'>Any Major</option><option value='Any Minor'>Any Minor</option>" +
                "</select>&nbsp;<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Location") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select class='dropdownWidth' id='Location" + and  + or +"' ><option value''" +
                "selected disabled hidden>Select Option</option><option value='Clarion'>Clarion</option><option value='Online'>Online</option>" +
                "<option value='Venango'>Venango</option></select>&nbsp;<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Taking" || $('#dropdown' + and + ' option:selected').text() == "Scheduled For" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking" || $('#dropdown' + and + ' option:selected').text() == "Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking/Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Scheduled For") { +
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadSubjects(this.id)'  onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' id='Subject" + and  + or +"'><option value=''" +
                "selected disabled hidden>Subject</option><option value='CIS'>CIS</option><option value='DA'>DA</option></select>&nbsp;<select class='dropdownboxWidthSmall' id='Catalog" + and  + or +"'>" +
                "<option value=''\ selected disabled hidden>Course No:</option></select>&nbsp<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Completed" || $('#dropdown' + and + ' option:selected').text() == "Taking/Completed") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadSubjects(this.id)'  onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' id='Subject" + and  + or +"' ><option value=''"+
                "selected disabled hidden>Subject</option><option value='CIS'>CIS</option><option value='DA'>DA</option></select>&nbsp;<select class='dropdownboxWidthSmall' id='Catalog" + and  + or +"'>" +
                "<option value=''\ selected disabled hidden>Course No:</option></select>&nbsp;<select style='20%;' id='MinGrade" + and  + or +"''>\" +\n" +
                "                \"<option value=''\\ selected disabled hidden>Min. Grade</option><option value='Passed'>Passed</option><option value='A'>A</option>" +
                "<option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select>&nbsp<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        or++;
    }
    attachDiv.appendChild(dynamicDiv);
    orButton=false;
}

function orButtonPressed(pID){
    var placeholder=pID.replace( /[^0-9]/g, `` );
    and=placeholder.charAt(0);
    //alert(and);
    orButton=true;
    makeDivVisibleOr();
}
function dropdownFreshlyChanged(pID){
    and=pID.replace( /[^0-9]/g, `` );
    //alert(and);
    or=0;
    makeDivVisibleOr();
}


//********************************************************************************
//*************  JSON STUFF  *****************************************************
//********************************************************************************


//THIS IS AN IMPORTANT FUNCTION
//This function is our real Ajax handling function
//Pass a callback function into it along with the URL that the ajax call references
//  url:          The page that will execute server-side, and give us responseText
//  cFunction:    What we want to do with that responseText
function loadDoc(url, cFunction) {
    var xhttp;
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            cFunction(this);
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}
//this is a callback function
//call this function with loadDoc(), pass in getCoursesUsingAjax.php
function loadCoursesUsingAjax(xhttp) {
    //first entry in Select, visible before dropping down
    document.getElementById("AjaxTestingSelect").innerHTML = "<option value='0'>Select a Course...</option>";
    //then, add the ajax responseText, in this case, an <option> for each of our courses
    document.getElementById("AjaxTestingSelect").innerHTML +=
        xhttp.responseText;
}

//call this function with loadDoc(), pass in getCoursesUsingJSON.php
function getCoursesUsingJSON(xhttp){
    var JSONObjectHoldingAllOfOurCourses = JSON.parse(xhttp.responseText);//#ReadableCode
    //then, do stuff with our JSON object that holds all of our courses
    console.log(JSONObjectHoldingAllOfOurCourses);
    return JSONObjectHoldingAllOfOurCourses;
    //this is what our JSON object looks like: (brace yourself)
    // ***
    // *** MY IDE LETS ME COLLAPSE THIS BLOCK COMMENT
    // *** IF YOURS DOES NOT, PLS FORGIB
    // ***
    /*
    * Array(52)
0: {0: "CIS", 1: "110", 2: "Computer Info Process", 3: "CIS", Subject: "CIS", Catalog: "110", Name: "Computer Info Process", Acad_Org: "CIS"}
1: {0: "CIS", 1: "121", 2: "What Does it Mean to be Human?", 3: "CIS", Subject: "CIS", Catalog: "121", Name: "What Does it Mean to be Human?", Acad_Org: "CIS"}
2: {0: "CIS", 1: "140", 2: "Ess Topics Discr Math Comp Sc", 3: "CIS", Subject: "CIS", Catalog: "140", Name: "Ess Topics Discr Math Comp Sc", Acad_Org: "CIS"}
3: {0: "CIS", 1: "163", 2: "Intro Prog & Algo I", 3: "CIS", Subject: "CIS", Catalog: "163", Name: "Intro Prog & Algo I", Acad_Org: "CIS"}
4: {0: "CIS", 1: "202", 2: "Intro Program and Algorithms I", 3: "CIS", Subject: "CIS", Catalog: "202", Name: "Intro Program and Algorithms I", Acad_Org: "CIS"}
5: {0: "CIS", 1: "206", 2: "Intro to Java Programming", 3: "CIS", Subject: "CIS", Catalog: "206", Name: "Intro to Java Programming", Acad_Org: "CIS"}
6: {0: "CIS", 1: "217", 2: "Appl of Micro", 3: "CIS", Subject: "CIS", Catalog: "217", Name: "Appl of Micro", Acad_Org: "CIS"}
7: {0: "CIS", 1: "230", 2: "Practicum in CIS", 3: "CIS", Subject: "CIS", Catalog: "230", Name: "Practicum in CIS", Acad_Org: "CIS"}
8: {0: "CIS", 1: "244", 2: "Intro Prog & Algo II", 3: "CIS", Subject: "CIS", Catalog: "244", Name: "Intro Prog & Algo II", Acad_Org: "CIS"}
9: {0: "CIS", 1: "253", 2: "Comp Org/Asb Lang", 3: "CIS", Subject: "CIS", Catalog: "253", Name: "Comp Org/Asb Lang", Acad_Org: "CIS"}
10: {0: "CIS", 1: "254", 2: "Data Structures", 3: "CIS", Subject: "CIS", Catalog: "254", Name: "Data Structures", Acad_Org: "CIS"}
11: {0: "CIS", 1: "270", 2: "Client-Side Web Programming", 3: "CIS", Subject: "CIS", Catalog: "270", Name: "Client-Side Web Programming", Acad_Org: "CIS"}
12: {0: "CIS", 1: "301", 2: "Comp Sys Analysis", 3: "CIS", Subject: "CIS", Catalog: "301", Name: "Comp Sys Analysis", Acad_Org: "CIS"}
13: {0: "CIS", 1: "303", 2: "Local Area Networks", 3: "CIS", Subject: "CIS", Catalog: "303", Name: "Local Area Networks", Acad_Org: "CIS"}
14: {0: "CIS", 1: "304", 2: "Internet Programming", 3: "CIS", Subject: "CIS", Catalog: "304", Name: "Internet Programming", Acad_Org: "CIS"}
15: {0: "CIS", 1: "305", 2: "Art Intell Decision Make", 3: "CIS", Subject: "CIS", Catalog: "305", Name: "Art Intell Decision Make", Acad_Org: "CIS"}
16: {0: "CIS", 1: "306", 2: "Object Oriented Programming", 3: "CIS", Subject: "CIS", Catalog: "306", Name: "Object Oriented Programming", Acad_Org: "CIS"}
17: {0: "CIS", 1: "312", 2: "Special Topics in Computing", 3: "CIS", Subject: "CIS", Catalog: "312", Name: "Special Topics in Computing", Acad_Org: "CIS"}
18: {0: "CIS", 1: "317", 2: "Microcomp Maint Conc & Tech", 3: "CIS", Subject: "CIS", Catalog: "317", Name: "Microcomp Maint Conc & Tech", Acad_Org: "CIS"}
19: {0: "CIS", 1: "330", 2: "Info Systems Programming", 3: "CIS", Subject: "CIS", Catalog: "330", Name: "Info Systems Programming", Acad_Org: "CIS"}
20: {0: "CIS", 1: "333", 2: "Info Sys Auditing & Security", 3: "CIS", Subject: "CIS", Catalog: "333", Name: "Info Sys Auditing & Security", Acad_Org: "CIS"}
21: {0: "CIS", 1: "350", 2: "Mach Arch Sys Sf", 3: "CIS", Subject: "CIS", Catalog: "350", Name: "Mach Arch Sys Sf", Acad_Org: "CIS"}
22: {0: "CIS", 1: "355", 2: "Operating Systems I", 3: "CIS", Subject: "CIS", Catalog: "355", Name: "Operating Systems I", Acad_Org: "CIS"}
23: {0: "CIS", 1: "356", 2: "Analysis of Algorithms", 3: "CIS", Subject: "CIS", Catalog: "356", Name: "Analysis of Algorithms", Acad_Org: "CIS"}
24: {0: "CIS", 1: "370", 2: "Server-Side Web Programming", 3: "CIS", Subject: "CIS", Catalog: "370", Name: "Server-Side Web Programming", Acad_Org: "CIS"}
25: {0: "CIS", 1: "375", 2: "Software Engineering", 3: "CIS", Subject: "CIS", Catalog: "375", Name: "Software Engineering", Acad_Org: "CIS"}
26: {0: "CIS", 1: "377", 2: "Computer Graphics", 3: "CIS", Subject: "CIS", Catalog: "377", Name: "Computer Graphics", Acad_Org: "CIS"}
27: {0: "CIS", 1: "402", 2: "Database Design & Implement", 3: "CIS", Subject: "CIS", Catalog: "402", Name: "Database Design & Implement", Acad_Org: "CIS"}
28: {0: "CIS", 1: "402G", 2: "Data Base System Management", 3: "CIS", Subject: "CIS", Catalog: "402G", Name: "Data Base System Management", Acad_Org: "CIS"}
29: {0: "CIS", 1: "403", 2: "Data Communications", 3: "CIS", Subject: "CIS", Catalog: "403", Name: "Data Communications", Acad_Org: "CIS"}
30: {0: "CIS", 1: "406", 2: "Mobile Application Development", 3: "CIS", Subject: "CIS", Catalog: "406", Name: "Mobile Application Development", Acad_Org: "CIS"}
31: {0: "CIS", 1: "411", 2: "Systems Devlmt Project", 3: "CIS", Subject: "CIS", Catalog: "411", Name: "Systems Devlmt Project", Acad_Org: "CIS"}
32: {0: "CIS", 1: "412", 2: "Parallel Processing", 3: "CIS", Subject: "CIS", Catalog: "412", Name: "Parallel Processing", Acad_Org: "CIS"}
33: {0: "CIS", 1: "422", 2: "Internship in Computers", 3: "CIS", Subject: "CIS", Catalog: "422", Name: "Internship in Computers", Acad_Org: "CIS"}
34: {0: "CIS", 1: "460", 2: "Programming Lang & Comp Theory", 3: "CIS", Subject: "CIS", Catalog: "460", Name: "Programming Lang & Comp Theory", Acad_Org: "CIS"}
35: {0: "CIS", 1: "462", 2: "Simulation/Modeling", 3: "CIS", Subject: "CIS", Catalog: "462", Name: "Simulation/Modeling", Acad_Org: "CIS"}
36: {0: "CIS", 1: "470", 2: "Project Management", 3: "CIS", Subject: "CIS", Catalog: "470", Name: "Project Management", Acad_Org: "CIS"}
37: {0: "CIS", 1: "499", 2: "Independent Study", 3: "CIS", Subject: "CIS", Catalog: "499", Name: "Independent Study", Acad_Org: "CIS"}
38: {0: "CIS", 1: "520", 2: "Intro to Data Warehousing", 3: "CIS", Subject: "CIS", Catalog: "520", Name: "Intro to Data Warehousing", Acad_Org: "CIS"}
39: {0: "CIS", 1: "570", 2: "Project Management", 3: "CIS", Subject: "CIS", Catalog: "570", Name: "Project Management", Acad_Org: "CIS"}
40: {0: "CIS", 1: "651", 2: "Deploying Info Tech Infras", 3: "CIS", Subject: "CIS", Catalog: "651", Name: "Deploying Info Tech Infras", Acad_Org: "CIS"}
41: {0: "DA", 1: "202", 2: "Intro Program and Algorithms I", 3: "CIS", Subject: "DA", Catalog: "202", Name: "Intro Program and Algorithms I", Acad_Org: "CIS"}
42: {0: "DA", 1: "510", 2: "Database Management Systems", 3: "CIS", Subject: "DA", Catalog: "510", Name: "Database Management Systems", Acad_Org: "CIS"}
43: {0: "DA", 1: "512", 2: "Special Topics Data Analytics", 3: "CIS", Subject: "DA", Catalog: "512", Name: "Special Topics Data Analytics", Acad_Org: "CIS"}
44: {0: "DA", 1: "520", 2: "Intro to Data Warehousing", 3: "CIS", Subject: "DA", Catalog: "520", Name: "Intro to Data Warehousing", Acad_Org: "CIS"}
45: {0: "DA", 1: "530", 2: "Analytical Methods & Optimizat", 3: "CIS", Subject: "DA", Catalog: "530", Name: "Analytical Methods & Optimizat", Acad_Org: "CIS"}
46: {0: "DA", 1: "540", 2: "Applied Data Mining", 3: "CIS", Subject: "DA", Catalog: "540", Name: "Applied Data Mining", Acad_Org: "CIS"}
47: {0: "DA", 1: "550", 2: "Predictive Analytics", 3: "CIS", Subject: "DA", Catalog: "550", Name: "Predictive Analytics", Acad_Org: "CIS"}
48: {0: "DA", 1: "560", 2: "Data Visualization", 3: "CIS", Subject: "DA", Catalog: "560", Name: "Data Visualization", Acad_Org: "CIS"}
49: {0: "DA", 1: "570", 2: "Big Data Analytics", 3: "CIS", Subject: "DA", Catalog: "570", Name: "Big Data Analytics", Acad_Org: "CIS"}
50: {0: "DA", 1: "580", 2: "Analytics Capstone", 3: "CIS", Subject: "DA", Catalog: "580", Name: "Analytics Capstone", Acad_Org: "CIS"}
51: {0: "DA", 1: "590", 2: "Field Exper in Data Analytics", 3: "CIS", Subject: "DA", Catalog: "590", Name: "Field Exper in Data Analytics", Acad_Org: "CIS"}
length: 52
    * */
    // *** YE BE WARNED
    // ***
}
//call this function with loadDoc(), pass in getCoursesUsingJSON.php
function getProgramsUsingJSON(xhttp){
    JSONObjectHoldingAllOfOurPrograms = JSON.parse(xhttp.responseText);//#ReadableCode
    //then, do stuff with our JSON object that holds all of our courses
    console.log(JSONObjectHoldingAllOfOurPrograms);
    return JSONObjectHoldingAllOfOurPrograms;
}

//call this function with loadDoc(), pass in getUsersUsingJSON.php
function getUsersUsingJSON(xhttp){
    var JSONObjectHoldingAllOfOurUsers = JSON.parse(xhttp.responseText);//#ReadableCode
    //then, do stuff with our JSON object that holds all of our users
    console.log(JSONObjectHoldingAllOfOurUsers);
    return JSONObjectHoldingAllOfOurUsers;
}
// **AJAX GLOBALS **
//
//do we want to NOT use global variables
//are they not the solution im looking for
var JSONObjectHoldingAllOfOurCourses;
var JSONObjectHoldingAllOfOurPrograms;
var jsObjectHoldingAllOfOurSubjects;
var jsObjectHoldingAllOfOurTerms;
var ProgramSubjectsJSON;
var UserProgramsJSON;
var CurrentTermJSON;

//pass in the id of the Subject Dropdown and the Catalog dropdown you want to load
//get the value of subject dropdown
//for each catalog found in that subjects' array
//add that catalog as an option in our catalog dropdown
function loadCatalogs(pSubjectDropdownID, pCatalogDropdownID){
    var SubjectSelectedInOurDropdown = document.getElementById(pSubjectDropdownID).value;
    document.getElementById(pCatalogDropdownID).innerHTML = "<option value='Catalog' selected disabled hidden>" + "Course No." + "</option>";
    document.getElementById(pCatalogDropdownID).innerHTML += "<option value='Any...'>" + "Any..." + "</option>";
    for (i =0; i < jsObjectHoldingAllOfOurSubjects[SubjectSelectedInOurDropdown].length; i++){
        document.getElementById(pCatalogDropdownID).innerHTML += "<option value='" + jsObjectHoldingAllOfOurSubjects[SubjectSelectedInOurDropdown][i] + "'>" + jsObjectHoldingAllOfOurSubjects[SubjectSelectedInOurDropdown][i] + "</option>";
    }
    document.getElementById(pCatalogDropdownID).innerHTML += "<option value='100&#39;s'>" + "100's" + "</option>";
    document.getElementById(pCatalogDropdownID).innerHTML += "<option value='200&#39;s'>" + "200's" + "</option>";
    document.getElementById(pCatalogDropdownID).innerHTML += "<option value='300&#39;s'>" + "300's" + "</option>";
    document.getElementById(pCatalogDropdownID).innerHTML += "<option value='400&#39;s'>" + "400's" + "</option>";
    document.getElementById(pCatalogDropdownID).innerHTML += "<option value='500&#39;s'>" + "500's" + "</option>";
}

//loads a particular dropdown with all of our subjects
function loadSubjects(pSubjectDropdownID){
    document.getElementById(pSubjectDropdownID).innerHTML = "<option value='Subject' selected disabled hidden>" + "Subject" + "</option>";
    for (ProgramSubjectPairFound in jsObjectHoldingAllOfOurSubjects){
        document.getElementById(pSubjectDropdownID).innerHTML += "<option value='" + ProgramSubjectPairFound + "'>" + ProgramSubjectPairFound + "</option>";
    }
}
//loads a particular dropdown with all of our programs
function loadPrograms(pProgramDropdownID){
    console.log(JSONObjectHoldingAllOfOurPrograms);
    document.getElementById(pProgramDropdownID).innerHTML = "<option value='Program' selected disabled hidden>" + "Program" + "</option>";
    for (ProgramFound in JSONObjectHoldingAllOfOurPrograms){
        document.getElementById(pProgramDropdownID).innerHTML += "<option value='" + JSONObjectHoldingAllOfOurPrograms[ProgramFound]['Plan'] + "'>" + JSONObjectHoldingAllOfOurPrograms[ProgramFound]['Plan'] + "</option>";
    }
}
function loadProgramSubjects(pProgramName){
    let xhttp;
    xhttp=new XMLHttpRequest();
    let ProgramSubjectPairFound;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            ProgramSubjectsJSON = JSON.parse(xhttp.responseText);
            console.log(ProgramSubjectsJSON);
            //alert(ProgramSubjectsJSON);
            document.getElementById('hasSubjectsSelect').innerHTML = "<option>Has these subjects: </option><option></option>";
            document.getElementById('hasNotSubjectsSelect').innerHTML = "<option>Does not have: </option><option></option>";
            for (ProgramSubjectPairFound in ProgramSubjectsJSON){
                document.getElementById('hasSubjectsSelect').innerHTML +=
                    "<option value='" + ProgramSubjectsJSON[ProgramSubjectPairFound][`Subject`] + "'>" + ProgramSubjectsJSON[ProgramSubjectPairFound][`Subject`] + "</option>";
            }
            //when xhttpResponse is ready and our HasSubjects are loaded, load the HasNotSubjects
            loadNotProgramSubjects(pProgramName);
        }
    };
    xhttp.open("GET", "../model/getProgramSubjectsUsingJSON.php?ProgramSelected=" + pProgramName, true);
    xhttp.send();
}

function loadUserPrograms(pUserName){
    let xhttp;
    xhttp=new XMLHttpRequest();
    let UserProgramPairFound;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            UserProgramsJSON = JSON.parse(xhttp.responseText);
            console.log(UserProgramsJSON);
            //alert(ProgramSubjectsJSON);
            document.getElementById('hasProgramsSelect').innerHTML = "<option>Has these programs: </option><option></option>";
            document.getElementById('hasNotProgramsSelect').innerHTML = "<option>Does not have: </option><option></option>";
            for (UserProgramPairFound in UserProgramsJSON){
                document.getElementById('hasProgramsSelect').innerHTML +=
                    "<option value='" + UserProgramsJSON[UserProgramPairFound][`Plan`] + "'>" + UserProgramsJSON[UserProgramPairFound][`Plan`] + "</option>";
            }
            //when xhttpResponse is ready and our HasSubjects are loaded, load the HasNotSubjects
            loadNotUserPrograms(pUserName);
        }
    };
    xhttp.open("GET", "../model/getUserProgramsUsingJSON.php?UserSelected=" + pUserName, true);
    xhttp.send();
}

function loadNotProgramSubjects(pProgramName){
    let xhttp;
    let allSubjectsJSON;
    let ProgramSubjectPairFound;
    let SubjectFoundFromAllSubjects;
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            allSubjectsJSON = JSON.parse(xhttp.responseText);
            console.log(allSubjectsJSON);
            //alert(ProgramSubjectsJSON);

            //remove the subjects that we DO have
            //now our allSubjectsJSON is our HasNot array
            for (ProgramSubjectPairFound in ProgramSubjectsJSON){
                for (SubjectFoundFromAllSubjects in allSubjectsJSON)
                    if (allSubjectsJSON[SubjectFoundFromAllSubjects][0] == ProgramSubjectsJSON[ProgramSubjectPairFound][1]){
                        console.log(allSubjectsJSON[SubjectFoundFromAllSubjects][0] + " from: allSubjectsJSON");
                        console.log(ProgramSubjectsJSON[ProgramSubjectPairFound][1] + " from: programsSubjectsJSON");
                        delete allSubjectsJSON[SubjectFoundFromAllSubjects];
                    }
            }

            //once our HasNot array is ready, load it into the second select
            document.getElementById('hasNotSubjectsSelect').innerHTML = "<option>Does not have: </option><option></option>";
            for (ProgramSubjectPairFound in allSubjectsJSON){
                document.getElementById('hasNotSubjectsSelect').innerHTML +=
                    "<option value='" + allSubjectsJSON[ProgramSubjectPairFound][`Subject`] + "'>" + allSubjectsJSON[ProgramSubjectPairFound][`Subject`] + "</option>";
            }
        }
    };
    xhttp.open("GET", "../model/getAllSubjectsUsingJSON.php?ProgramSelected=" + pProgramName, true);
    xhttp.send();
}
function loadNotUserPrograms(pUserName){
    let xhttp;
    let allProgramsJSON;
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            allProgramsJSON = JSON.parse(xhttp.responseText);
            console.log(allProgramsJSON);
            //alert(ProgramSubjectsJSON);

            //remove the subjects that we DO have
            //now our allProgramsJSON is our HasNot array
            for (UserProgramPairFound in UserProgramsJSON){
                for (ProgramFoundFromAllPrograms in allProgramsJSON)
                    if (allProgramsJSON[ProgramFoundFromAllPrograms][0] == UserProgramsJSON[UserProgramPairFound][1]){
                        console.log(allProgramsJSON[ProgramFoundFromAllPrograms][0] + " from: allProgramsJSON");
                        console.log(UserProgramsJSON[UserProgramPairFound][1] + " from: UserProgramsJSON");
                        delete allProgramsJSON[ProgramFoundFromAllPrograms];
                    }
            }

            //once our HasNot array is ready, load it into the second select
            document.getElementById('hasNotProgramsSelect').innerHTML = "<option>Does not have: </option><option></option>";
            for (UserProgramPairFound in allProgramsJSON){
                document.getElementById('hasNotProgramsSelect').innerHTML +=
                    "<option value='" + allProgramsJSON[UserProgramPairFound][`Plan`] + "'>" + allProgramsJSON[UserProgramPairFound][`Plan`] + "</option>";
            }
        }
    };
    xhttp.open("GET", "../model/getProgramsUsingJSON.php?ProgramSelected=" + pUserName, true);
    xhttp.send();
}
//this gets all unique Subjects found in Courses table only!!
// does not use Subjects table
//this is an ajax callback function
//call this function with loadDoc(), passing in getCoursesUsingJSON.php and this function
//this will send an ajax request to getCoursesUsingJSON.php, store the response, then run this function on it
function getSubjectsUsingJSON(xhttp){
    //parse the Ajax responseText into a JSON object, just as it was encoded into a JSON string
    //create a JS Object to hold our unique subject values much like a PHP associative array
    JSONObjectHoldingAllOfOurCourses = JSON.parse(xhttp.responseText);
    jsObjectHoldingAllOfOurSubjects = {};
    //load unique values into associative array (shit makes me rock hard)
    //key->value where key is the same as value
    //upon finding a new key, creates a new entry in array
    //upon finding a duplicate key, replaces the value of that key (therefore never repeating duplicates)
    //keys are unique, so, we only have unique Subject values
    //arrayOfSubjects         [              CIS                   ] = "               CIS                 "
    //arrayOfSubjects         [              DA                    ] = "                DA                 "
    //the whole point is so that we don't end up with 50 values of CIS, and instead just have one
    for (rowEntry in JSONObjectHoldingAllOfOurCourses) {
        jsObjectHoldingAllOfOurSubjects[JSONObjectHoldingAllOfOurCourses[rowEntry].Subject] = JSONObjectHoldingAllOfOurCourses[rowEntry].Subject;
    }
    //now, we have a JS object with each unique subject
    //so, we'll use that to store the catalogs of each class for each subject
    //first, replace the value at each subject with an array
    // our object now looks like this:
    // { "CIS": [], "DA": [] }
    for (subjectKeyFound in jsObjectHoldingAllOfOurSubjects){
        jsObjectHoldingAllOfOurSubjects[subjectKeyFound] = [];
    }
    //then, load those arrays with the catalogs for each subject
    //for each class
    //  go to our subject object, find that class's subject
    //  add the catalog to the array associated with that subject
    // our js object will now look something like this:
    // { "CIS": ["202", "244", "254", "306"], "DA": ["510", "512", "520"]  }
    //so, each subject is a key and that key's value is an array of that subject's respective catalogs
    for (rowEntry in JSONObjectHoldingAllOfOurCourses){
        jsObjectHoldingAllOfOurSubjects[JSONObjectHoldingAllOfOurCourses[rowEntry].Subject].push(JSONObjectHoldingAllOfOurCourses[rowEntry].Catalog);
    }
    console.log(jsObjectHoldingAllOfOurSubjects);

    //if you want, you can use this line to load the first dropdown:
    //loadSubjects("JSONTestingSelect3434");


    return jsObjectHoldingAllOfOurSubjects;
    // { "CIS": ["202", "244", "254", "306"], "DA": ["510", "512", "520"]  }
}
//used for loading terms into dropdowns on student question page
function getTermsUsingJSON(xhttp){
    //parse the Ajax responseText into a JSON object, just as it was encoded into a JSON string
    //create a JS Object to hold our unique term values much like a PHP associative array
    JSONObjectHoldingAllOfOurTerms = JSON.parse(xhttp.responseText);
    let oldestYear = "20" + JSONObjectHoldingAllOfOurTerms.Oldest_Term.substr(1,2);
    let newestYear = "20" + JSONObjectHoldingAllOfOurTerms.Latest_Term.substr(1,2);
    console.log("Our Oldest Term is: " + JSONObjectHoldingAllOfOurTerms.Oldest_Term);
    console.log("Our Current Term is: " + JSONObjectHoldingAllOfOurTerms.Current_Term);
    console.log("Our Latest Term is: " + JSONObjectHoldingAllOfOurTerms.Latest_Term);

    console.log("Our oldest year is: " +  oldestYear);
    console.log("Our newest year is: " +  newestYear);

    document.getElementById("dropdownRange2").innerHTML += "";
    document.getElementById("dropdownRange4").innerHTML += "";
    for (let i = oldestYear; i <= newestYear; i++){
        if (i == oldestYear)//first year
            document.getElementById("dropdownRange2").innerHTML += "<option selected value='" + i + "'>" + i + "</option>";
        else
            document.getElementById("dropdownRange2").innerHTML += "<option value='" + i + "'>" + i + "</option>";
        if (i == (newestYear))//last year
            document.getElementById("dropdownRange4").innerHTML += "<option selected value='" + i + "'>" + i + "</option>";
        else
            document.getElementById("dropdownRange4").innerHTML += "<option value='" + i + "'>" + i + "</option>";
        //console.log(i);
    }


    return JSONObjectHoldingAllOfOurTerms;
    // { "CIS": ["202", "244", "254", "306"], "DA": ["510", "512", "520"]  }
}
function updateCurrentTermUsingJSON(pCurrentTerm){
    console.log("Button clicked, pCurrentTerm is " + pCurrentTerm);
    let xhttp;
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhttp.responseText);
            document.getElementById('updatedTermLabel').innerHTML = "**Current term has been updated** to: " + xhttp.responseText;
        }
    };
    xhttp.open("GET", "../model/updateCurrentTermUsingJSON.php?CurrentTerm=" + pCurrentTerm, true);
    xhttp.send();

    return CurrentTermJSON;
}


////////////////////////////////////
//stolen from 370 security framework
function swap(srcId,dstId)
{
    src = document.getElementById(srcId);
    dst = document.getElementById(dstId);

    index = src.selectedIndex;

    if(index != -1)
    {
        txt = src.options[ index ].text;
        value = src.options[ index ].value;

        dst.options[ dst.options.length] = new Option( txt, value );
        src.options[ index ] = null;
    }
}
function selectAll(id)
{
    var select = document.getElementById(id);

    for(i = 0; i < select.length; ++i)
    {
        select[i].selected = true;
        //alert("checking each selection");
    }
}

//Vinny's stuff
//the function that copies selected emails to clipboard
function copyEmailsToClipboard() {
    //this is pretty gross we have a hidden text box where the emails are typed
    document.getElementById("emailList").style.visibility="visible";
    //the list of emails
    var emailsList = "";
    //the table
    var table = document.getElementById("result_table");
    //which row we are on
    var rows = table.getElementsByTagName("tr");
    //row counter
    var i;
    //cycle through the table adding the email of the row we're on to emalList if that row is checked
    for (i=1; i<rows.length; i++) {
        if (table.rows[i].cells[0].getElementsByTagName('input')[0].checked) {
            //alert(table.rows[i].cells[0].getElementsByTagName('input')[0].checked);
            emailsList += (table.rows[i].cells[10].innerHTML);
            emailsList += ", ";
            // alert(emailsList);
            // alert(rows.length);
        }
    }
    //put our list of emails in a hidden textbox so we can select and copy them
    document.getElementById("emailList").value = emailsList;
    //select and copy the content of the textbox
    var copyList = document.querySelector("#emailList");
    copyList.select();
    document.execCommand("copy");
    //and then we hide that textbox after its all copied again
    document.getElementById("emailList").style.visibility="hidden";
    //alert to see if it all worked and nothing broke along  the way
    alert("Emails of selected rows successfully copied.");

}

//check all the results
function selectAllResults(){
    //the table
    var table = document.getElementById("result_table");
    var rows = table.getElementsByTagName("tr");
    //row counter
    var i;
    //cycle through the table checking all the boxes
    for (i=1; i<rows.length;i++)
    {
        table.rows[i].cells[0].getElementsByTagName('input')[0].checked = true;

    }
}

//uncheck all the results
function deselectAllResults(){
    //the table
    var table = document.getElementById("result_table");
    var rows = table.getElementsByTagName("tr");
    //row counter
    var i;
    //cycle through the table unchecking all the boxes
    for (i=1; i<rows.length;i++)
    {
        table.rows[i].cells[0].getElementsByTagName('input')[0].checked = false;

    }
}

//hide the email list text box on page load
function hideStuff(){
    document.getElementById("emailList").style.visibility="hidden";
    document.getElementById("exportResults").style.visibility="hidden";
}

// so i straight ripped this function from the internet i have no idea how it works

//so this one i could not figure out how to rename so i scrapped that and copied a different one LUL
// var tableToExcel = (function() {
//
//     var uri = 'data:application/vnd.ms-excel;base64,'
//         , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
//         , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
//         , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
//     return function(table, name) {
//         if (!table.nodeType) table = document.getElementById(table)
//         var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
//         window.location.href = uri + base64(format(template, ctx))
//     }
//
// })();
/////////////////////////////////////// this one!
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}

function displayClassHistory(){
    var tab = window.open('StudentHistory.php', '_blank');
    tab.focus();
}
