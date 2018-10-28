//GLOBALS
var and=0;
var or=0;
var flag=true;
var freshlyChanged=true;
var orButton=false;
var firstAnd=false;
var uniqueID=0;
var or0 = 0;
var or1 = 0;
var or2 = 0;
var or3 = 0;
var or4 = 0;
var or5 = 0;
var or6 = 0;
var or7 = 0;
var formRebuilt = false;

document.addEventListener("DOMContentLoaded", function() {
	if(!formRebuilt){
		  populateElements();
		  populateOrValues0();
		  formRebuilt = true;
	}
});

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

function populateOrValues0(){
	//store counts for each row
	var orCount0 = document.getElementById("orCount0").value;
	var orCount1 = document.getElementById("orCount1").value;
	var orCount2 = document.getElementById("orCount2").value;
	var orCount3 = document.getElementById("orCount3").value;
	var orCount4 = document.getElementById("orCount4").value;
	var orCount5 = document.getElementById("orCount5").value;
	var orCount6 = document.getElementById("orCount6").value;
	var orCount7 = document.getElementById("orCount7").value;

	//set up variables, and use counter and location variable to dynamically assign each value
			var x = 0;
			var loc = 0;
				var subLocation = "";
				var corLocation = "";
				var graLocation = "";
				var pSub, pCor, pGra, select;
				
				//until all or's are accounted for, set values that were passed by stdq object
				while (x < orCount0){
					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;

					//assign values based on category, since different dropdowns have different names
					if(document.getElementById("dropdown0").value == "Taking"){
						//set the value from the hidden field to the dropdown value
							pSub = document.getElementById("val" + subLocation).value;
							pCor = document.getElementById("val" + corLocation).value;
							
							if(pSub){
								document.getElementById("Subject" + loc + x).value = pSub;					
							}
							
							if(pCor){
								select = document.getElementById("Catalog" + loc + x);
								select.options[select.options.length] = new Option(pCor, pCor);
								select.value = pCor;
							}
					} x++;	
				} loc++; x = 0; 	

				//1
				while (x < orCount1){

					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					if(document.getElementById("dropdown1").value == "Taking"){
							pSub = document.getElementById("val" + subLocation).value;
							pCor = document.getElementById("val" + corLocation).value;

							if(pSub){
								document.getElementById("Subject" + loc + x).value = pSub;					
							}
							
							if(pCor){
								select = document.getElementById("Catalog" + loc + x);
								select.options[select.options.length] = new Option(pCor, pCor);
								select.value = pCor;
							}
					} x++;	
				} loc++; x = 0;			

				//2
				while (x < orCount2){

					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					if(document.getElementById("dropdown2").value == "Taking"){
							pSub = document.getElementById("val" + subLocation).value;
							pCor = document.getElementById("val" + corLocation).value;

							if(pSub){
								document.getElementById("Subject" + loc + x).value = pSub;					
							}
							
							if(pCor){
								select = document.getElementById("Catalog" + loc + x);
								select.options[select.options.length] = new Option(pCor, pCor);
								select.value = pCor;
							}
					} x++;	
				} loc++; x = 0;			

				//3
				while (x < orCount3){

					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					if(document.getElementById("dropdown3").value == "Taking"){
							pSub = document.getElementById("val" + subLocation).value;
							pCor = document.getElementById("val" + corLocation).value;

							if(pSub){
								document.getElementById("Subject" + loc + x).value = pSub;					
							}
							
							if(pCor){
								select = document.getElementById("Catalog" + loc + x);
								select.options[select.options.length] = new Option(pCor, pCor);
								select.value = pCor;
							}
					} x++;	
				} loc++; x = 0;	

				//4
				while (x < orCount4){

					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					if(document.getElementById("dropdown4").value == "Taking"){
							pSub = document.getElementById("val" + subLocation).value;
							pCor = document.getElementById("val" + corLocation).value;

							if(pSub){
								document.getElementById("Subject" + loc + x).value = pSub;					
							}
							
							if(pCor){
								select = document.getElementById("Catalog" + loc + x);
								select.options[select.options.length] = new Option(pCor, pCor);
								select.value = pCor;
							}
					} x++;	
				} loc++; x = 0;		

				//5
				while (x < orCount5){

					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					if(document.getElementById("dropdown5").value == "Taking"){
							pSub = document.getElementById("val" + subLocation).value;
							pCor = document.getElementById("val" + corLocation).value;

							if(pSub){
								document.getElementById("Subject" + loc + x).value = pSub;					
							}
							
							if(pCor){
								select = document.getElementById("Catalog" + loc + x);
								select.options[select.options.length] = new Option(pCor, pCor);
								select.value = pCor;
							}
					} x++;	
				} loc++; x = 0;	

				//6
				while (x < orCount6){

					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					if(document.getElementById("dropdown6").value == "Taking"){
							pSub = document.getElementById("val" + subLocation).value;
							pCor = document.getElementById("val" + corLocation).value;

							if(pSub){
								document.getElementById("Subject" + loc + x).value = pSub;					
							}
							
							if(pCor){
								select = document.getElementById("Catalog" + loc + x);
								select.options[select.options.length] = new Option(pCor, pCor);
								select.value = pCor;
							}
					} x++;	
				} loc++; x = 0;		

				//7
				while (x < orCount7){

					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					if(document.getElementById("dropdown7").value == "Taking"){
							pSub = document.getElementById("val" + subLocation).value;
							pCor = document.getElementById("val" + corLocation).value;

							if(pSub){
								document.getElementById("Subject" + loc + x).value = pSub;					
							}
							
							if(pCor){
								select = document.getElementById("Catalog" + loc + x);
								select.options[select.options.length] = new Option(pCor, pCor);
								select.value = pCor;
							}
					} x++;	
				} 				
}

function firstAndPress(){

}


function updateORCounts(){
	document.getElementById("orCount0").value = or0;
	document.getElementById("orCount1").value = or1;
	document.getElementById("orCount2").value = or2;
	document.getElementById("orCount3").value = or3;
	document.getElementById("orCount4").value = or4;
	document.getElementById("orCount5").value = or5;
	document.getElementById("orCount6").value = or6;
	document.getElementById("orCount7").value = or7;
}

function populateElements(){
	var andCount = document.getElementById("andCount").value;
	var orCount0 = document.getElementById("orCount0").value;
	var orCount1 = document.getElementById("orCount1").value;
	var orCount2 = document.getElementById("orCount2").value;
	var orCount3 = document.getElementById("orCount3").value;
	var orCount4 = document.getElementById("orCount4").value;
	var orCount5 = document.getElementById("orCount5").value;
	var orCount6 = document.getElementById("orCount6").value;
	var orCount7 = document.getElementById("orCount7").value;
	//alert(orCount0);
	var x = 0;
	
	//if the count variable is set, generate the correct number of AND's + OR's
	
	if (andCount > 0){
		while (x < andCount){
			makeDivVisibleAnd();
			x++;
		} x = 0;
	}
	
	//0
	if (orCount0 > 0){ and = 0; or = 0;
		while (x < orCount0){
			orButtonPressed();
			x++;
		} x = 0;
	}
	
	//1
	if (orCount1 > 0){ and = 1; or = 0;
		while (x < orCount1){
			orButtonPressed();
			x++;
		} x = 0;
	}

	//2
	if (orCount2 > 0){ and = 2; or = 0;
		while (x < orCount2){
			orButtonPressed();
			x++;
		} x = 0;
	}	
	
	//3
	if (orCount3 > 0){ and = 3; or = 0;
		while (x < orCount3){
			orButtonPressed();
			x++;
		} x = 0;
	}
	
	//4
	if (orCount4 > 0){ and = 4; or = 0;
		while (x < orCount4){
			orButtonPressed();
			x++;
		} x = 0;
	}	
	
	//5
	if (orCount5 > 0){ and = 5; or = 0;
		while (x < orCount5){
			orButtonPressed();
			x++;
		} x = 0;
	}	
	
	//6
	if (orCount6 > 0){ and = 6; or = 0;
		while (x < orCount6){
			orButtonPressed();
			x++;
		} x = 0;
	}	
	
	//7
	if (orCount7 > 0){ and = 7; or = 0;
		while (x < orCount7){
			orButtonPressed();
			x++;
		} x = 0;
	}
	
}

function makeDivVisibleAnd(){
	if(and == 0){
		or0 = getNumberOfChildren();
	} else if (and == 1){
		or1 = getNumberOfChildren();
	} else if (and == 2){
		or2 = getNumberOfChildren();
	} else if (and == 3){
		or3 = getNumberOfChildren();
	} else if (and == 4){
		or4 = getNumberOfChildren();
	} else if (and == 5){
		or5 = getNumberOfChildren();
	} else if (and == 6){
		or6 = getNumberOfChildren();
	} else if (and == 7){
		or7 = getNumberOfChildren();
	} 
	if (!document.getElementById("rebuildFlag").value){	updateORCounts(); } 
	if (and < 7) { and++; }
	document.getElementById("andCount").value = and;
    document.getElementById("divAnd" + and).removeAttribute("class","hiddenDiv");
    document.getElementById("divAnd" + and).setAttribute("class","visibleDiv");
    //alert("divAnd"+and);
}

function makeDivInvisible(){
    document.getElementById("divAnd" + and).removeAttribute("class","visibleDiv");
    document.getElementById("divAnd" + and).setAttribute("class","hiddenDiv");
    and--;
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

function getNumberOfChildren(){
    var attachDiv=document.getElementById('attach'+and);
    return attachDiv.children.length;
}

function makeDivVisibleOr(){
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
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select class='dropdownWidth' name='MajorMinor" + and + or +"' id='MajorMinor" + and  + or +"'><option value=''" +
                ">Select Option</option><option value='Any Major'>Any Major</option><option value='Any Minor'>Any Minor</option>" +
                "</select>&nbsp;<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Location") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select class='dropdownWidth' name='Location" + and + or +"' id='Location" + and  + or +"' ><option value''" +
                ">Select Option</option><option value='Clarion'>Clarion</option><option value='Online'>Online</option>" +
                "<option value='Venango'>Venango</option></select>&nbsp;<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Taking" || $('#dropdown' + and + ' option:selected').text() == "Scheduled For" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking" || $('#dropdown' + and + ' option:selected').text() == "Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking/Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Scheduled For") { +
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select onfocus='loadSubjects(this.id)'  onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' name='Subject" + and + or +"' id='Subject" + and  + or +"'><option value=''" +
                ">Subject</option><option value='CIS'>CIS</option><option value='DA'>DA</option></select>&nbsp;<select class='dropdownboxWidthSmall' name='Catalog" + and + or +"' id='Catalog" + and  + or +"'>" +
                "<option value=''\ >Course #:</option></select>&nbsp<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Completed" || $('#dropdown' + and + ' option:selected').text() == "Taking/Completed") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select onfocus='loadSubjects(this.id)'  onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' name='Subject" + and + or +"' id='Subject" + and  + or +"' ><option value=''"+
                ">Subject</option><option value='CIS'>CIS</option><option value='DA'>DA</option></select>&nbsp;<select class='dropdownboxWidthSmall' name='Catalog" + and + or +"' id='Catalog" + and  + or +"'>" +
                "<option value=''\ >Course #:</option></select>&nbsp;<select style='20%;' name='MinGrade" + and + or +"' id='MinGrade" + and  + or +"''>\" +\n" +
                "                \"<option value=''\\ >Min. Grade</option><option value='Passed'>Passed</option><option value='A'>A</option>" +
                "<option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select>&nbsp<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
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
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select class='dropdownWidth' name='MajorMinor" + and + or +"' id='MajorMinor" + and  + or +"'><option value=''" +
                ">Select Option</option><option value='Any Major'>Any Major</option><option value='Any Minor'>Any Minor</option>" +
                "</select>&nbsp;<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Location") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select class='dropdownWidth' name='Location" + and + or +"' id='Location" + and  + or +"' ><option value''" +
                ">Select Option</option><option value='Clarion'>Clarion</option><option value='Online'>Online</option>" +
                "<option value='Venango'>Venango</option></select>&nbsp;<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Taking" || $('#dropdown' + and + ' option:selected').text() == "Scheduled For" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking" || $('#dropdown' + and + ' option:selected').text() == "Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking/Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Scheduled For") { +
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select onfocus='loadSubjects(this.id)'  onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' name='Subject" + and + or +"' id='Subject" + and  + or +"'><option value=''" +
                ">Subject</option><option value='CIS'>CIS</option><option value='DA'>DA</option></select>&nbsp;<select class='dropdownboxWidthSmall' name='Catalog" + and + or +"' id='Catalog" + and  + or +"'>" +
                "<option value=''\ >Course #:</option></select>&nbsp<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Completed" || $('#dropdown' + and + ' option:selected').text() == "Taking/Completed") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' onclick='removeOrDiv()'></button>&nbsp;<select onfocus='loadSubjects(this.id)'  onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' name='Subject" + and + or +"' id='Subject" + and  + or +"'><option value=''"+
                ">Subject</option><option value='CIS'>CIS</option><option value='DA'>DA</option></select>&nbsp;<select class='dropdownboxWidthSmall' name='Catalog" + and + or +"' id='Catalog" + and  + or +"'>" +
                "<option value=''\ >Course #:</option></select>&nbsp;<select style='20%;' name='MinGrade" + and + or +"' id='MinGrade" + and  + or +"''>\" +\n" +
                "                \"<option value=''\\ >Min. Grade</option><option value='Passed'>Passed</option><option value='A'>A</option>" +
                "<option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select>&nbsp<button type='button' class='btn btn-danger' onclick='orButtonPressed()'>Or</button>&nbsp;&nbsp;");
        }
        or++;
    }
    attachDiv.appendChild(dynamicDiv);
    orButton=false;
}

function orButtonPressed(){
    orButton=true;
    makeDivVisibleOr();
}
function dropdownFreshlyChanged(){
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

//do we want to NOT use global variables
//are they not the solution im looking for
var JSONObjectHoldingAllOfOurCourses;
var jsObjectHoldingAllOfOurSubjects;

//pass in the id of the Subject Dropdown and the Catalog dropdown you want to load
//get the value of subject dropdown
//for each catalog found in that subjects' array
//add that catalog as an option in our catalog dropdown
function loadCatalogs(pSubjectDropdownID, pCatalogDropdownID){
    var SubjectSelectedInOurDropdown = document.getElementById(pSubjectDropdownID).value;
    document.getElementById(pCatalogDropdownID).innerHTML = "<option>" + "Course Number..." + "</option>";
    for (i =0; i < jsObjectHoldingAllOfOurSubjects[SubjectSelectedInOurDropdown].length; i++){
        document.getElementById(pCatalogDropdownID).innerHTML += "<option>" + jsObjectHoldingAllOfOurSubjects[SubjectSelectedInOurDropdown][i] + "</option>";
    }
}

//loads a particular dropdown with all of our subjects
function loadSubjects(pSubjectDropdownID){
    document.getElementById(pSubjectDropdownID).innerHTML = "<option value='Subject'>" + "Subject" + "</option>";
    for (subjectFound in jsObjectHoldingAllOfOurSubjects){
        document.getElementById(pSubjectDropdownID).innerHTML += "<option value='" + subjectFound + "'>" + subjectFound + "</option>";
    }
}

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

//table



