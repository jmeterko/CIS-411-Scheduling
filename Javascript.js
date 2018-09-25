//GLOBALS
var and=0;
var or=0;
var flag=true;
var freshlyChanged=true;
var orButton=false;

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

function makeDivVisibleAnd(){
    document.getElementById("divAnd" + and).removeAttribute("class","hiddenDiv");
    document.getElementById("divAnd" + and).setAttribute("class","visibleDiv");
    and++;
    //alert("divAnd"+and);
}

function makeDivInvisible(){
    and--;
    document.getElementById("divAnd" + and).removeAttribute("class","visibleDiv");
    document.getElementById("divAnd" + and).setAttribute("class","hiddenDiv");
}

function removeOrDiv(){
    var attachDiv=document.getElementById('attach'+and);
    if(attachDiv.children.length > 1) {
        attachDiv.removeChild(attachDiv.childNodes[or - 1]);
        or--;
    }
}

function howManyChildren(){
    var attachDiv=document.getElementById('attach'+and);
    alert(attachDiv.children.length);
}

function makeDivVisibleOr(){
    var attachDiv=document.getElementById('attach'+and);
    //or=attachDiv.children.length+1;
    var dynamicDiv=document.createElement("div");
    $(dynamicDiv).addClass("inline");
    if(freshlyChanged || orButton) {
        if ($('#dropdown1 option:selected').text() == "Program") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select class='dropdownWidth' id='dropdown'+and+or><option value=''" +
                "selected disabled hidden>Select Option</option><option value='Any Major'>Any Major</option><option value='Any Minor'>Any Minor</option>" +
                "</select>&nbsp;<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown1 option:selected').text() == "Location") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select class='dropdownWidth' id='dropdown'+and+or><option value=''" +
                "selected disabled hidden>Select Option</option><option value='Clarion'>Clarion</option><option value='Online'>Online</option>" +
                "<option value='Venango'>Venango</option></select>&nbsp;<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown1 option:selected').text() == "Taking" || "Scheduled For" || "Not Taking" || "Not Completed" || "Not Taking/Not Completed" || "Not Scheduled For") { +
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select class='dropdownWidth' id='dropdown'+and+or><option value=''" +
                "selected disabled hidden>Subject</option><option value='CIS'>CIS</option><option value='DA'>DA</option></select>&nbsp;<select class='dropdownboxWidthSmall' id='dropdown'+and+or>" +
                "<option value=''\ selected disabled hidden>Course #:</option></select>&nbsp<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown1 option:selected').text() == "Completed" || "Taking/Completed") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select class='dropdownWidth' id='dropdown'+and+or><option value=''" +
                "selected disabled hidden>Subject</option><option value='CIS'>CIS</option><option value='DA'>DA</option></select>&nbsp;<select class='dropdownboxWidthSmall' id='dropdown'+and+or>" +
                "<option value=''\ selected disabled hidden>Course #:</option></select>&nbsp;<select style='20%;' id='dropdown'+and+or>\" +\n" +
                "                \"<option value=''\\ selected disabled hidden>Min. Grade</option><option value='Passed'>Passed</option><option value='A'>A</option>" +
                "<option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select>&nbsp<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
        }
        freshlyChanged=false;
    }
    else{
        while(attachDiv.firstChild) {
            attachDiv.removeChild(attachDiv.firstChild);
            if ($('#dropdown1 option:selected').text() == "Program") {
                $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select class='dropdownWidth' id='dropdown'+and+or><option value=''" +
                    "selected disabled hidden>Select Option</option><option value='Any Major'>Any Major</option><option value='Any Minor'>Any Minor</option>" +
                    "</select>&nbsp;<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
            }
            else if ($('#dropdown1 option:selected').text() == "Location") {
                $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select class='dropdownWidth' id='dropdown'+and+or><option value=''" +
                    "selected disabled hidden>Select Option</option><option value='Clarion'>Clarion</option><option value='Online'>Online</option>" +
                    "<option value='Venango'>Venango</option></select>&nbsp;<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
            }
            else if ($('#dropdown1 option:selected').text() == "Taking" || "Scheduled For" || "Not Taking" || "Not Completed" || "" +
                "Not Taking/Not Completed" || "Not Scheduled For") {
                $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select class='dropdownWidth' id='dropdown'+and+or><option value=''" +
                    "selected disabled hidden>Subject</option><option value='CIS'>CIS</option><option value='DA'>DA</option></select>&nbsp;<select class='dropdownboxWidthSmall' id='dropdown'+and+or>" +
                    "<option value=''\ selected disabled hidden>Course #:</option></select>&nbsp<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
            }
            else if ($('#dropdown1 option:selected').text() == "Completed" || "Taking/Completed") {
                $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select class='dropdownWidth' id='dropdown'+and+or><option value=''" +
                    "selected disabled hidden>Subject</option><option value='CIS'>CIS</option><option value='DA'>DA</option></select>&nbsp;<select class='dropdownboxWidthSmall' id='dropdown'+and+or>" +
                    "<option value=''\ selected disabled hidden>Course #:</option></select>&nbsp<select style='20%;' id='dropdown'+and+or>\" +\n" +
                    "                \"<option value=''\\ selected disabled hidden>Min. Grade</option><option value='Passed'>Passed</option><option value='A'>A</option>" +
                    "<option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select>&nbsp<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
            }
            or=0;
        }
    }
    attachDiv.appendChild(dynamicDiv);
    or++;
    orButton=false;
}

function orButtonPressed(){
    orButton=true;
    makeDivVisibleOr();
}