//GLOBALS
var and=0;
var or=0;

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

function makeDivVisibleOr(){
    //alert("Main Function");
    if($('#dropdown1 option:selected').text()=="Program") {
        //alert("Program Called");
        var dynamicOrButton = document.createElement("button");
        $(dynamicOrButton).addClass("btn btn-danger");
        $(dynamicOrButton).click(makeDivVisibleOr);
        dynamicOrButton.innerHTML = "Or";
        dynamicOrButton.type="button";
        dynamicOrButton.id="or"+or;
        var dynamicSelectBox = document.createElement("select");
        dynamicSelectBox.id = "SelectBoxOr" + or;
        dynamicSelectBox.innerHTML = "<select class='dropdownboxWidth'><option value=''selected disabled hidden></option>" +
            "<option value='Any Major'>Any Major</option><option value='Any Minor'>Any Minor</option>" +
            "</select>";
        var xButton=document.createElement("button");
        $(xButton).addClass("glyphicon glyphicon-remove");
        xButton.type="button";
        $(xButton).click(removeOrDropdown);
        document.getElementById('attach'+ and).appendChild(xButton);
        document.getElementById('attach' + and).appendChild(dynamicSelectBox);
        document.getElementById('attach' + and).appendChild(dynamicOrButton);
    }
    else if($('#dropdown1 option:selected').text()=="Location") {
        var dynamicOrButton=document.createElement("button");
        $(dynamicOrButton).addClass("btn btn-danger");
        $(dynamicOrButton).click(makeDivVisibleOr);
        dynamicOrButton.innerHTML="Or";
        dynamicOrButton.type="button";
        var dynamicSelectBox = document.createElement("select");
        dynamicSelectBox.id = "SelectBoxOr" + or;
        dynamicOrButton.id="or"+or;
        dynamicSelectBox.innerHTML = "<select class='dropdownboxWidth'><option value=''selected disabled hidden></option>" +
            "<option value='Clarion'>Clarion</option><option value='Online'>Online</option><option value='Venango'>Venango</option>" +
            "</select>";
        document.getElementById('attach' + and).appendChild(dynamicSelectBox);
        document.getElementById('attach' + and).appendChild(dynamicOrButton);
    }
    or++;
}

function removeOrDropdown(){
    var attachDiv=document.getElementById('attach'+and);
    attachDiv.removeChild(attachDiv.childNodes[or]);
    attachDiv.removeChild(attachDiv.childNodes[or+1]);
    //attachDiv.removeChild(attachDiv.childNodes[or-2]);
}