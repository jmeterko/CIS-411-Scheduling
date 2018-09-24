//GLOBALS
var and=0;
var or=0;
var flag=true;

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

/*
function makeDivVisibleOr(){
    //alert("Main Function");
    var dynamicOrButton = document.createElement("button");
    var dynamicSelectBox = document.createElement("select");
    var xButton=document.createElement("button");
    $(dynamicOrButton).addClass("btn btn-danger");
    $(dynamicOrButton).click(makeDivVisibleOr);
    dynamicOrButton.innerHTML = "Or";
    dynamicOrButton.type="button";
    dynamicOrButton.id="or"+or;
    dynamicSelectBox.id = "SelectBoxOr" + or;
    $(xButton).addClass("glyphicon glyphicon-remove");
    xButton.type="button";
    $(xButton).click(removeOrDropdown);
    if($('#dropdown1 option:selected').text()=="Program") {
        //alert("Program Called");
        dynamicSelectBox.innerHTML = "<select class='dropdownboxWidth'><option value=''selected disabled hidden></option>" +
            "<option value='Any Major'>Any Major</option><option value='Any Minor'>Any Minor</option>" +
            "</select>";
        document.getElementById('attach'+ and).appendChild(xButton);
        document.getElementById('attach' + and).appendChild(dynamicSelectBox);
        document.getElementById('attach' + and).appendChild(dynamicOrButton);
    }
    else if($('#dropdown1 option:selected').text()=="Location") {
        dynamicSelectBox.innerHTML = "<select class='dropdownboxWidth'><option value=''selected disabled hidden></option>" +
            "<option value='Clarion'>Clarion</option><option value='Online'>Online</option><option value='Venango'>Venango</option>" +
            "</select>";
        document.getElementById('attach'+ and).appendChild(xButton);
        document.getElementById('attach' + and).appendChild(dynamicSelectBox);
        document.getElementById('attach' + and).appendChild(dynamicOrButton);
    }
    or++;
}
*/

function removeOrDiv(){
    var attachDiv=document.getElementById('attach'+and);
    attachDiv.removeChild(attachDiv.childNodes[or-1]);
    or--;
}

function howManyChildren(){
    var attachDiv=document.getElementById('attach'+and);
    alert(attachDiv.children.length);
}

function makeDivVisibleOr(){
    var dynamicDiv=document.createElement("div");
    dynamicDiv.innerHTML="dynamicOrDiv";
    $(dynamicDiv).addClass("inline");
    if($('#dropdown1 option:selected').text()=="Program") {
        $(dynamicDiv).html("<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select class='dropdownWidth'><option value=''" +
            "selected disabled hidden></option><option value='Any Major'>Any Major</option><option value='Any Minor'>Any Minor</option>" +
            "</select>&nbsp;<button type='button' class='btn btn-danger' onclick='makeDivVisibleOr()'>Or</button>&nbsp;&nbsp;");
    }
    else if($('#dropdown1 option:selected').text()=="Location") {
        $(dynamicDiv).html("<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select class='dropdownWidth'><option value=''" +
            "selected disabled hidden></option><option value='Clarion'>Clarion</option><option value='Online'>Online</option>" +
            "<option value='Venango'>Venango</option></select>");
    }
    else if($('#dropdown1 option:selected').text()=="Taking") {
        
    }
    document.getElementById('attach'+ and).appendChild(dynamicDiv);
    or++;
}