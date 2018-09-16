var $=document.getElementById();

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

function makeDivVisible(){
    var and=1;
    var or=1;
    //alert("divAnd"+and);
    document.getElementById("divAnd1").removeAttribute("class","hiddenDiv");
    document.getElementById("divAnd1").setAttribute("class","visibleDiv");
}

$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});