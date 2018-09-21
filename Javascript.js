//GLOBALS
var and=1;
var or=1;

//var document.getElementById=document.getElementById();

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