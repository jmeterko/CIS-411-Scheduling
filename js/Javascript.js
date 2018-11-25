//GLOBALS
var and=0;
var or=0;
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
var orCount0 = 0;
var orCount1 = 0;
var orCount2 = 0;
var orCount3 = 0;
var orCount4 = 0;
var orCount5 = 0;
var orCount6 = 0;
var orCount7 = 0;
var fileCounter=0;
var ajaxCompletedCount=0;
const AJAX_CALL_TOTAL=4;
var SubjectOptionsString = "<option value='CIS'>CIS</option><option value='DA'>DA</option>";

var formRebuilt = false;

document.addEventListener("DOMContentLoaded", function() {
	document.getElementById("saveQuestion").addEventListener("change", toggleSaveQuestion);	
	
	document.getElementById("updateSearch").addEventListener("click", function(){
		document.getElementById("updateFlag").value = true;
		document.getElementById("issueInputForm").submit();
	});	
	
	document.getElementById("dropdown0").addEventListener("change", function(){ 
		var dropdown = document.getElementById("dropdown0").value;
		if (dropdown > 0){
			window.location.href = "../controller/controller.php?action=RebuildQuestion&SerialID=" + dropdown;
		}
	}); 
	
	if(!formRebuilt){
			console.log("REBUILD FORM - START");
			console.log(formRebuilt);
		  setOrCounts();						    console.log("Form Counts Set");
		  populateElements(formRebuilt);		  	console.log("Elements Created");
		  populateOrTaking(formRebuilt);		  	console.log("Populate Taking");
		  populateOrProgram(formRebuilt);		  	console.log("Populate Programs");
		  populateOrCompleted(formRebuilt);		  	console.log("Populate Completed");
		  populateOrLocation(formRebuilt);
		  
		  
		  finishBuild();
	}
});

function incrementAjaxCompletionCounter(){
    ajaxCompletedCount++;
    console.log("ajaxCompleted count is now: " + ajaxCompletedCount);
    if (ajaxCompletedCount == AJAX_CALL_TOTAL ){
        console.log("AJAX_CALL_TOTAL REACHED: ajaxCompleted count is: " + ajaxCompletedCount);
        console.log("We will now get serials ready:");
        getSerialsReady();
    }
}
function getSerialsReady() {
    document.getElementById("saveQuestion").addEventListener("change", toggleSaveQuestion);
    document.getElementById("dropdown0").addEventListener("change", function(){
        var dropdown = document.getElementById("dropdown0").value;
        if (dropdown > 0){
            window.location.href = "../controller/controller.php?action=RebuildQuestion&SerialID=" + dropdown;
        }
    });

    if(!formRebuilt){
        console.log("REBUILD FORM - START");
        console.log(formRebuilt);
        setOrCounts();						    console.log("Form Counts Set");
        populateElements(formRebuilt);		  	console.log("Elements Created");
        populateOrTaking(formRebuilt);		  	console.log("Populate Taking");
        populateOrProgram(formRebuilt);		  	console.log("Populate Programs");
        populateOrCompleted(formRebuilt);		  	console.log("Populate Completed");
        populateOrLocation(formRebuilt);


        finishBuild();
    }
}

function finishBuild(){
	formRebuilt = true;
	console.log("Finished");
}

function checkSearchName(submitForm) {
		$.getJSON("../controller/controller.php",
			{	action: "CheckSearchNameExists",		
				searchName: $('#searchName').val()
			},
			function(jsonReturned) {
				if (jsonReturned.duplicate) {
					$('#modal').modal('toggle');
					document.getElementById('submitButton').disabled = true;
					$('#searchName').select();
				} else  {
					document.getElementById('submitButton').disabled = false;
				}
			}
		);
	}

function toggleSaveQuestion(){
		if( document.getElementById("saveQuestion").checked == true ) { 
			document.getElementById("searchName").classList.remove('hidden');
			document.getElementById("searchName").required = true;
		}
		if( document.getElementById("saveQuestion").checked == false ) { 
			document.getElementById("searchName").classList.add('hidden'); 
			document.getElementById("searchName").required = false;
		}	
		
}

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

function orValueChanged(){
	if(and == 0){
		or0 = getNumberOfChildren() + 1;
	} else if (and == 1){
		or1 = getNumberOfChildren() + 1;
	} else if (and == 2){
		or2 = getNumberOfChildren() + 1;
	} else if (and == 3){
		or3 = getNumberOfChildren() + 1;
	} else if (and == 4){
		or4 = getNumberOfChildren() + 1;
	} else if (and == 5){
		or5 = getNumberOfChildren() + 1;
	} else if (and == 6){
		or6 = getNumberOfChildren() + 1;
	} else if (and == 7){
		or7 = getNumberOfChildren() + 1;
	} 
	updateORCounts();
}

function setOrCounts(){
	 orCount0 = document.getElementById("orCount0").value;
	 orCount1 = document.getElementById("orCount1").value;
	 orCount2 = document.getElementById("orCount2").value;
	 orCount3 = document.getElementById("orCount3").value;
	 orCount4 = document.getElementById("orCount4").value;
	 orCount5 = document.getElementById("orCount5").value;
	 orCount6 = document.getElementById("orCount6").value;
	 orCount7 = document.getElementById("orCount7").value;
}


/***********  populateOrValues  ***************
	Need to maintain these Javascript functions? I'd like to apologize if you need to make changes to these, but I'll do my best to explain whats going on.
	
	NOTE: 10/28/18 - populateOrValues is getting broken out into their own functions based on dropdown value for each row. 
		populateOrTaking, populateOrProgram, populateOrScheduledFor, etc. 

	Description:
		This function helps enable the 'crude' passing of data from controller student class object, to javascript.
		It runs fast, but this code is far from optimal. Because the form AJAX calls respond when the dropdown onchange fires, 
		it was difficult to get the values into the dropdowns without breaking javascript. This algorithm was ported from our controller file, 
		as the loops we needed to generate these values also can read through them. Two pointers, x and loc, will determine which ID we need to set.
		
		*To not break javascript, this function uses several combinations of conditionals and loops to determine what the original value of the dropdown was,
		then check the appropriate id's. If ANY id returns null, all the form rebuild will break. So the amount of conditionals below is required. 
		
		**There is probably a much easier way to let javascript know about the php object by converting the serial to JSON array, but the hidden elements
		populated from the loop in mainApplicationStudentQuestion.php were easy to access, since I was already accessing all of the count variables in this fashion. 
		It just makes terrible, repeated code blocks. 
		
		*NOTE: Maybe split into two Javascript files ? one for form controls and one for rebuild?
			- nice to have
		
	Algorithm: 
		1. The orCount values were placed onto the form by hidden input. Select by ID and store the count for later use.
		
		2. Set up location variables as 'pointers' to which ID## we are at in each for loop. 
		
		3. Build the correct id and store it in the location variables. Generated by "name" + locationValue + xValue. 
			*x is counter for loop, loc is counter for row
		
		4. This is where the mess is. Because the dropdowns' value tells what or dropdowns to create, we must check for the dropdowns value,
			then set the appropriate names based on that. 
				Example:
					If dropdown0 is "Program", the dropdown it generates on OR is MajorMinor00.
					So, we need to only loop through this row, outputting the values through MajorMinor0-X
					If dropdown1 is "Taking", the dropdowns it makes on OR are Subject10 and Catalog11
					So in this case, we need to loop through, setting values for all Subjects and Catalogs. 
					If these aren't checked, any null document.getElementById will break the rebuild. 
					
		5. The rest of the code is repeated blocks of the same while loops, iterating for each row set in the GLOBAL and variable.
		
	KNOWN BUGS: all orCounts are being set in the and button click, this needs to be an on hover
*/
function populateOrTaking(formRebuilt){
		if(!formRebuilt){
	//2. set up variables, and use counter and location variable to dynamically assign each value
			var x = 0;
			var loc = 0;
			var dropdownVal = document.getElementById("dropdown0").value;
				var subLocation = "";
				var corLocation = "";
				var pSub, pCor, select;
				
				//3. until all or's are accounted for, set values that were passed by stdq object
				
				//0
				while (x < orCount0){
					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 

					//4. assign values based on category, since different dropdowns have different names
					
					//=====[ TAKING || Subject + Catalog Combo - Row0 ]=====//		
					if(dropdownVal == "Taking" || dropdownVal == "Not Taking" ||
					   dropdownVal == "Scheduled For" || dropdownVal == "Not Scheduled For" ||
					   dropdownVal == "Not Taking/Not Completed" || dropdownVal == "Not Completed"){
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
						}										
					x++;	
				} // ** END Row0 ** //

				//increase loc to next row, reset x at starting position of that row.
				loc++; x = 0; 	
				dropdownVal = document.getElementById("dropdown1").value;
				//1
				while (x < orCount1){

					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					
					if(dropdownVal == "Taking" || dropdownVal == "Not Taking" ||
					   dropdownVal == "Scheduled For" || dropdownVal == "Not Scheduled For" ||
					   dropdownVal == "Not Taking/Not Completed" || dropdownVal == "Not Completed"){
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
				dropdownVal = document.getElementById("dropdown2").value;
				//2
				while (x < orCount2){

					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					
					if(dropdownVal == "Taking" || dropdownVal == "Not Taking" ||
					   dropdownVal == "Scheduled For" || dropdownVal == "Not Scheduled For" ||
					   dropdownVal == "Not Taking/Not Completed" || dropdownVal == "Not Completed"){
							pSub = document.getElementById("val" + subLocation).value;
							pCor = document.getElementById("val" + corLocation).value;
							console.log(corLocation);

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
				dropdownVal = document.getElementById("dropdown3").value;
				//3
				while (x < orCount3){

					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					
					if(dropdownVal == "Taking" || dropdownVal == "Not Taking" ||
					   dropdownVal == "Scheduled For" || dropdownVal == "Not Scheduled For" ||
					   dropdownVal == "Not Taking/Not Completed" || dropdownVal == "Not Completed"){
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
                dropdownVal = document.getElementById("dropdown4").value;
				//4
				while (x < orCount4){

					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					
					if(dropdownVal == "Taking" || dropdownVal == "Not Taking" ||
					   dropdownVal == "Scheduled For" || dropdownVal == "Not Scheduled For" ||
					   dropdownVal == "Not Taking/Not Completed" || dropdownVal == "Not Completed"){
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
				dropdownVal = document.getElementById("dropdown5").value;
				//5
				while (x < orCount5){

					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					
					if(dropdownVal == "Taking" || dropdownVal == "Not Taking" ||
					   dropdownVal == "Scheduled For" || dropdownVal == "Not Scheduled For" ||
					   dropdownVal == "Not Taking/Not Completed" || dropdownVal == "Not Completed"){
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
				dropdownVal = document.getElementById("dropdown6").value;
				//6
				while (x < orCount6){

					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					
					if(dropdownVal == "Taking" || dropdownVal == "Not Taking" ||
					   dropdownVal == "Scheduled For" || dropdownVal == "Not Scheduled For" ||
					   dropdownVal == "Not Taking/Not Completed" || dropdownVal == "Not Completed"){
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
				dropdownVal = document.getElementById("dropdown7").value;
				//7
				while (x < orCount7){

					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					
					if(dropdownVal == "Taking" || dropdownVal == "Not Taking" ||
					   dropdownVal == "Scheduled For" || dropdownVal == "Not Scheduled For" ||
					   dropdownVal == "Not Taking/Not Completed" || dropdownVal == "Not Completed"){
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
}}

function populateOrLocation(formRebuilt){
	if(!formRebuilt){

			var x = 0;
			var loc = 0;
				var locLocation = "";
				var pLoc, select;

				//0
				while (x < orCount0){
					//this variable name happened by naming convention, but it's staying
					locLocation = "loc" + loc + x;
																			
					//---- [ LOCATION - Row0 ] ----//
					if(document.getElementById("dropdown0").value == "Location"){
							//set the value from the hidden field to the dropdown value
								pLoc = document.getElementById("val" + locLocation).value;
							
								if(pLoc){
									document.getElementById("Location" + loc + x).value = pLoc;					
								}
					} x++; 	
				} loc++; x = 0;
				
				//1
				while (x < orCount1){
					//this variable name happened by naming convention, but it's staying
					locLocation = "loc" + loc + x;
																			
					//---- [ LOCATION - Row1 ] ----//
					if(document.getElementById("dropdown1").value == "Location"){
							//set the value from the hidden field to the dropdown value
								pLoc = document.getElementById("val" + locLocation).value;
 								if(pLoc){
									document.getElementById("Location" + loc + x).value = pLoc;					
								}
					} x++; 	
				} loc++; x = 0;	

				//2
				while (x < orCount2){
					//this variable name happened by naming convention, but it's staying
					locLocation = "loc" + loc + x;
																			
					//---- [ LOCATION - Row2 ] ----//
					if(document.getElementById("dropdown2").value == "Location"){
							//set the value from the hidden field to the dropdown value
								pLoc = document.getElementById("val" + locLocation).value;
 								if(pLoc){
									document.getElementById("Location" + loc + x).value = pLoc;					
								}
					} x++; 	
				} loc++; x = 0;				
				
				//3
				while (x < orCount3){
					//this variable name happened by naming convention, but it's staying
					locLocation = "loc" + loc + x;
																			
					//---- [ LOCATION - Row3 ] ----//
					if(document.getElementById("dropdown3").value == "Location"){
							//set the value from the hidden field to the dropdown value
								pLoc = document.getElementById("val" + locLocation).value;
 								if(pLoc){
									document.getElementById("Location" + loc + x).value = pLoc;					
								}
					} x++; 	
				} loc++; x = 0;
				
				//4
				while (x < orCount4){
					//this variable name happened by naming convention, but it's staying
					locLocation = "loc" + loc + x;
																			
					//---- [ LOCATION - Row4 ] ----//
					if(document.getElementById("dropdown4").value == "Location"){
							//set the value from the hidden field to the dropdown value
								pLoc = document.getElementById("val" + locLocation).value;
 								if(pLoc){
									document.getElementById("Location" + loc + x).value = pLoc;					
								}
					} x++; 	
				} loc++; x = 0;
				
				//5
				while (x < orCount5){
					//this variable name happened by naming convention, but it's staying
					locLocation = "loc" + loc + x;
																			
					//---- [ LOCATION - Row5 ] ----//
					if(document.getElementById("dropdown5").value == "Location"){
							//set the value from the hidden field to the dropdown value
								pLoc = document.getElementById("val" + locLocation).value;
 								if(pLoc){
									document.getElementById("Location" + loc + x).value = pLoc;					
								}
					} x++; 	
				} loc++; x = 0;
				
				//6
				while (x < orCount6){
					//this variable name happened by naming convention, but it's staying
					locLocation = "loc" + loc + x;
																			
					//---- [ LOCATION - Row6 ] ----//
					if(document.getElementById("dropdown6").value == "Location"){
							//set the value from the hidden field to the dropdown value
								pLoc = document.getElementById("val" + locLocation).value;
 								if(pLoc){
									document.getElementById("Location" + loc + x).value = pLoc;					
								}
					} x++; 	
				} loc++; x = 0;
				
				//7
				while (x < orCount7){
					//this variable name happened by naming convention, but it's staying
					locLocation = "loc" + loc + x;
																			
					//---- [ LOCATION - Row7 ] ----//
					if(document.getElementById("dropdown7").value == "Location"){
							//set the value from the hidden field to the dropdown value
								pLoc = document.getElementById("val" + locLocation).value;
 								if(pLoc){
									document.getElementById("Location" + loc + x).value = pLoc;					
								}
					} x++; 	
				} loc++; x = 0;
	}
}

function populateOrProgram(formRebuilt){
	if(!formRebuilt){

			var x = 0;
			var loc = 0;
				var majLocation = "";
				var pMaj, select;

				//0
				while (x < orCount0){
					majLocation = "maj" + loc + x;
																			
					//---- [ PROGRAM - Row0 ] ----//
					if(document.getElementById("dropdown0").value == "Program"){
							//set the value from the hidden field to the dropdown value
								pMaj = document.getElementById("val" + majLocation).value;
								if(pMaj){
									select = document.getElementById("MajorMinor" + loc + x);
									select.options[select.options.length] = new Option(pMaj, pMaj);
									select.value = pMaj;
									document.getElementById("MajorMinor" + loc + x).value = pMaj;					
								}
					} x++; 	
				} loc++; x = 0;

				//1
				while (x < orCount1){
					majLocation = "maj" + loc + x;
																			
					//---- [ PROGRAM - Row1 ] ----//
					if(document.getElementById("dropdown1").value == "Program"){
							//set the value from the hidden field to the dropdown value
								pMaj = document.getElementById("val" + majLocation).value;

								if(pMaj){
									select = document.getElementById("MajorMinor" + loc + x);
									select.options[select.options.length] = new Option(pMaj, pMaj);
									select.value = pMaj;
									document.getElementById("MajorMinor" + loc + x).value = pMaj;	
								}
					} x++; 	
				} loc++; x = 0;
			
				//2
				while (x < orCount2){
					majLocation = "maj" + loc + x;
																			
					//---- [ PROGRAM - Row2 ] ----//
					if(document.getElementById("dropdown2").value == "Program"){
							//set the value from the hidden field to the dropdown value
								pMaj = document.getElementById("val" + majLocation).value;

								if(pMaj){
									select = document.getElementById("MajorMinor" + loc + x);
									select.options[select.options.length] = new Option(pMaj, pMaj);
									select.value = pMaj;
									document.getElementById("MajorMinor" + loc + x).value = pMaj;	
								}
					} x++; 	
				} loc++; x = 0;			

				//3
				while (x < orCount3){
					majLocation = "maj" + loc + x;
																			
					//---- [ PROGRAM - Row3 ] ----//
					if(document.getElementById("dropdown3").value == "Program"){
							//set the value from the hidden field to the dropdown value
								pMaj = document.getElementById("val" + majLocation).value;

								if(pMaj){
									select = document.getElementById("MajorMinor" + loc + x);
									select.options[select.options.length] = new Option(pMaj, pMaj);
									select.value = pMaj;
									document.getElementById("MajorMinor" + loc + x).value = pMaj;	
								}
					} x++; 	
				} loc++; x = 0;		

				//4
				while (x < orCount4){
					majLocation = "maj" + loc + x;
																			
					//---- [ PROGRAM - Row4 ] ----//
					if(document.getElementById("dropdown4").value == "Program"){
							//set the value from the hidden field to the dropdown value
								pMaj = document.getElementById("val" + majLocation).value;

								if(pMaj){
									select = document.getElementById("MajorMinor" + loc + x);
									select.options[select.options.length] = new Option(pMaj, pMaj);
									select.value = pMaj;
									document.getElementById("MajorMinor" + loc + x).value = pMaj;	
								}
					} x++; 	
				} loc++; x = 0;		

				//5
				while (x < orCount5){
					majLocation = "maj" + loc + x;
																			
					//---- [ PROGRAM - Row5 ] ----//
					if(document.getElementById("dropdown5").value == "Program"){
							//set the value from the hidden field to the dropdown value
								pMaj = document.getElementById("val" + majLocation).value;

								if(pMaj){
									select = document.getElementById("MajorMinor" + loc + x);
									select.options[select.options.length] = new Option(pMaj, pMaj);
									select.value = pMaj;
									document.getElementById("MajorMinor" + loc + x).value = pMaj;	
								}
					} x++; 	
				} loc++; x = 0;

				//6
				while (x < orCount6){
					majLocation = "maj" + loc + x;
																			
					//---- [ PROGRAM - Row6 ] ----//
					if(document.getElementById("dropdown6").value == "Program"){
							//set the value from the hidden field to the dropdown value
								pMaj = document.getElementById("val" + majLocation).value;

								if(pMaj){
									select = document.getElementById("MajorMinor" + loc + x);
									select.options[select.options.length] = new Option(pMaj, pMaj);
									select.value = pMaj;
									document.getElementById("MajorMinor" + loc + x).value = pMaj;	
								}
					} x++; 	
				} loc++; x = 0;		

				//7
				while (x < orCount7){
					majLocation = "maj" + loc + x;
																			
					//---- [ PROGRAM - Row7 ] ----//
					if(document.getElementById("dropdown7").value == "Program"){
							//set the value from the hidden field to the dropdown value
								pMaj = document.getElementById("val" + majLocation).value;

								if(pMaj){
									select = document.getElementById("MajorMinor" + loc + x);
									select.options[select.options.length] = new Option(pMaj, pMaj);
									select.value = pMaj;
									document.getElementById("MajorMinor" + loc + x).value = pMaj;	
								}
					} x++; 	
				} loc++; x = 0;				
		}
}

function populateOrCompleted(formRebuilt){
	if(!formRebuilt){
			var x = 0;
			var loc = 0;
				var subLocation = "";
				var corLocation = "";
				var graLocation = "";
				var pSub, pCor, pGra, select;
								
				//0
				while (x < orCount0){
					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					
					//=====[ COMPLETED - Row0 ]=====//		
					if(document.getElementById("dropdown0").value == "Completed" || document.getElementById("dropdown0").value == "Taking/Completed"){
						pSub = document.getElementById("val" + subLocation).value;
						pCor = document.getElementById("val" + corLocation).value;
						pGra = document.getElementById("val" + graLocation).value;
								
								if(pSub){
									document.getElementById("Subject" + loc + x).value = pSub;					
								}
								
								if(pCor){
									select = document.getElementById("Catalog" + loc + x);
									select.options[select.options.length] = new Option(pCor, pCor);
									select.value = pCor;
								}
								
								if(pGra){
									select = document.getElementById("MinGrade" + loc + x);
									select.options[select.options.length] = new Option(pGra, pGra);
									select.value = pGra;
								}
						}										
					x++;	
				} loc++; x = 0;
				
				//1
				while (x < orCount1){
					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					
					//=====[ COMPLETED - Row1 ]=====//		
					if(document.getElementById("dropdown1").value == "Completed" || document.getElementById("dropdown1").value == "Taking/Completed"){
						pSub = document.getElementById("val" + subLocation).value;
						pCor = document.getElementById("val" + corLocation).value;
						pGra = document.getElementById("val" + graLocation).value;
								
								if(pSub){
									document.getElementById("Subject" + loc + x).value = pSub;					
								}
								
								if(pCor){
									select = document.getElementById("Catalog" + loc + x);
									select.options[select.options.length] = new Option(pCor, pCor);
									select.value = pCor;
								}
								
								if(pGra){
									select = document.getElementById("MinGrade" + loc + x);
									select.options[select.options.length] = new Option(pGra, pGra);
									select.value = pGra;
								}
						}										
					x++;	
				} loc++; x = 0;		

				//2
				while (x < orCount2){
					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					
					//=====[ COMPLETED - Row2 ]=====//		
					if(document.getElementById("dropdown2").value == "Completed" || document.getElementById("dropdown2").value == "Taking/Completed"){
						pSub = document.getElementById("val" + subLocation).value;
						pCor = document.getElementById("val" + corLocation).value;
						pGra = document.getElementById("val" + graLocation).value;
								
								if(pSub){
									document.getElementById("Subject" + loc + x).value = pSub;					
								}
								
								if(pCor){
									select = document.getElementById("Catalog" + loc + x);
									select.options[select.options.length] = new Option(pCor, pCor);
									select.value = pCor;
								}
								
								if(pGra){
									select = document.getElementById("MinGrade" + loc + x);
									select.options[select.options.length] = new Option(pGra, pGra);
									select.value = pGra;
								}
						}										
					x++;	
				} loc++; x = 0;		

				//3
				while (x < orCount3){
					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					
					//=====[ COMPLETED - Row3 ]=====//		
					if(document.getElementById("dropdown3").value == "Completed" || document.getElementById("dropdown3").value == "Taking/Completed"){
						pSub = document.getElementById("val" + subLocation).value;
						pCor = document.getElementById("val" + corLocation).value;
						pGra = document.getElementById("val" + graLocation).value;
								
								if(pSub){
									document.getElementById("Subject" + loc + x).value = pSub;					
								}
								
								if(pCor){
									select = document.getElementById("Catalog" + loc + x);
									select.options[select.options.length] = new Option(pCor, pCor);
									select.value = pCor;
								}
								
								if(pGra){
									select = document.getElementById("MinGrade" + loc + x);
									select.options[select.options.length] = new Option(pGra, pGra);
									select.value = pGra;
								}
						}										
					x++;	
				} loc++; x = 0;

				//4
				while (x < orCount4){
					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					
					//=====[ COMPLETED - Row4 ]=====//		
					if(document.getElementById("dropdown4").value == "Completed" || document.getElementById("dropdown4").value == "Taking/Completed"){
						pSub = document.getElementById("val" + subLocation).value;
						pCor = document.getElementById("val" + corLocation).value;
						pGra = document.getElementById("val" + graLocation).value;
								
								if(pSub){
									document.getElementById("Subject" + loc + x).value = pSub;					
								}
								
								if(pCor){
									select = document.getElementById("Catalog" + loc + x);
									select.options[select.options.length] = new Option(pCor, pCor);
									select.value = pCor;
								}
								
								if(pGra){
									select = document.getElementById("MinGrade" + loc + x);
									select.options[select.options.length] = new Option(pGra, pGra);
									select.value = pGra;
								}
						}										
					x++;	
				} loc++; x = 0;				
		
				//5
				while (x < orCount5){
					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					
					//=====[ COMPLETED - Row5 ]=====//		
					if(document.getElementById("dropdown5").value == "Completed" || document.getElementById("dropdown5").value == "Taking/Completed"){
						pSub = document.getElementById("val" + subLocation).value;
						pCor = document.getElementById("val" + corLocation).value;
						pGra = document.getElementById("val" + graLocation).value;
								
								if(pSub){
									document.getElementById("Subject" + loc + x).value = pSub;					
								}
								
								if(pCor){
									select = document.getElementById("Catalog" + loc + x);
									select.options[select.options.length] = new Option(pCor, pCor);
									select.value = pCor;
								}
								
								if(pGra){
									select = document.getElementById("MinGrade" + loc + x);
									select.options[select.options.length] = new Option(pGra, pGra);
									select.value = pGra;
								}
						}										
					x++;	
				} loc++; x = 0;	

				//6
				while (x < orCount6){
					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					
					//=====[ COMPLETED - Row6 ]=====//		
					if(document.getElementById("dropdown6").value == "Completed" || document.getElementById("dropdown6").value == "Taking/Completed"){
						pSub = document.getElementById("val" + subLocation).value;
						pCor = document.getElementById("val" + corLocation).value;
						pGra = document.getElementById("val" + graLocation).value;
								
								if(pSub){
									document.getElementById("Subject" + loc + x).value = pSub;					
								}
								
								if(pCor){
									select = document.getElementById("Catalog" + loc + x);
									select.options[select.options.length] = new Option(pCor, pCor);
									select.value = pCor;
								}
								
								if(pGra){
									select = document.getElementById("MinGrade" + loc + x);
									select.options[select.options.length] = new Option(pGra, pGra);
									select.value = pGra;
								}
						}										
					x++;	
				} loc++; x = 0;
				
				//7
				while (x < orCount7){
					subLocation = "sub" + loc + x; 
					corLocation = "cor" + loc + x; 
					graLocation = "gra" + loc + x;
					
					//=====[ COMPLETED - Row7 ]=====//		
					if(document.getElementById("dropdown7").value == "Completed" || document.getElementById("dropdown7").value == "Taking/Completed"){
						pSub = document.getElementById("val" + subLocation).value;
						pCor = document.getElementById("val" + corLocation).value;
						pGra = document.getElementById("val" + graLocation).value;
								
								if(pSub){
									document.getElementById("Subject" + loc + x).value = pSub;					
								}
								
								if(pCor){
									select = document.getElementById("Catalog" + loc + x);
									select.options[select.options.length] = new Option(pCor, pCor);
									select.value = pCor;
								}
								
								if(pGra){
									select = document.getElementById("MinGrade" + loc + x);
									select.options[select.options.length] = new Option(pGra, pGra);
									select.value = pGra;
								}
						}										
					x++;	
				} loc++; x = 0;						
		}
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

function populateElements(formRebuild){
	if(!formRebuild){
	var andCount = document.getElementById("andCount").value;
	var x = 0;
	
	//if the count variable is set, generate the correct number of AND's + OR's
	if (andCount > 0){
		while (x < andCount){
			rebuildDivs();
			x++;
		} x = 0;
	}
	
	//0
	if (orCount0 > 0){ and = 0; or = 0;
		while (x < orCount0){
			orButtonPressedRebuild();
			x++;
		} x = 0;
	}
	
	//1
	if (orCount1 > 0){ and = 1; or = 0;
		while (x < orCount1){
			orButtonPressedRebuild();
			x++;
		} x = 0;
	}

	//2
	if (orCount2 > 0){ and = 2; or = 0;
		while (x < orCount2){
			orButtonPressedRebuild();
			x++;
		} x = 0;
	}	
	
	//3
	if (orCount3 > 0){ and = 3; or = 0;
		while (x < orCount3){
			orButtonPressedRebuild();
			x++;
		} x = 0;
	}
	
	//4
	if (orCount4 > 0){ and = 4; or = 0;
		while (x < orCount4){
			orButtonPressedRebuild();
			x++;
		} x = 0;
	}	
	
	//5
	if (orCount5 > 0){ and = 5; or = 0;
		while (x < orCount5){
			orButtonPressedRebuild();
			x++;
		} x = 0;
	}	
	
	//6
	if (orCount6 > 0){ and = 6; or = 0;
		while (x < orCount6){
			orButtonPressedRebuild();
			x++;
		} x = 0;
	}	
	
	//7
	if (orCount7 > 0){ and = 7; or = 0;
		while (x < orCount7){
			orButtonPressedRebuild();
			x++;
		} x = 0;
	}
  }
}

function makeDivVisibleAnd2(){
	if (and < 7) { and++; }
	document.getElementById("andCount").value = and;
    document.getElementById("divAnd" + and).removeAttribute("class","hiddenDiv");
    document.getElementById("divAnd" + and).setAttribute("class","visibleDiv");
}

function rebuildDivs(){
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
	
	if (and < 7) { and++; }
	document.getElementById("andCount").value = and;
    document.getElementById("divAnd" + and).removeAttribute("class","hiddenDiv");
	document.getElementById("divAnd" + and).setAttribute("class","visibleDiv");
}

function makeDivVisibleAnd(pID){
    //alert("called");
    and=pID.replace( /[^0-9]/g, `` );
    and++;
    $('#dropdown' + and).prop('disabled', false);
	document.getElementById("andCount").value = and;
    document.getElementById("divAnd" + and).removeAttribute("class","hiddenDiv");
    document.getElementById("divAnd" + and).setAttribute("class","visibleDiv");
}

function makeDivInvisible(pID){
    var attachID=`attach` + pID.replace( /[^0-9]/g, `` );
    var ID_Only_Numerics = pID.replace( /[^0-9]/g, `` );
    //alert(attachID);
    while(document.getElementById(attachID).firstChild) {
        document.getElementById(attachID).removeChild(document.getElementById(attachID).firstChild);
    }
    $("#dropdown1").on("click", function () {
        $('#default').prop('selected', function() {
            return this.defaultSelected;
        });
    });
    document.getElementById("divAnd" + ID_Only_Numerics).removeAttribute("class","visibleDiv");
    document.getElementById("divAnd" + ID_Only_Numerics).setAttribute("class","hiddenDiv");
    if(and>0)
        and--;
}

function removeOrDiv(pID){
    var orTemp = or;
    let subOffset = 0;  //if we do reduce the OR value by 1, we set this to 1 before subtracting
    var placeholder=pID.replace( /[^0-9]/g, `` );
    and = placeholder.charAt(0);
    or = placeholder.charAt(1);
    var attachDiv=document.getElementById('attach' + and);
    if (or == 0 && attachDiv.children.length > 1){
        attachDiv.removeChild(attachDiv.childNodes[ 0 ]);
    }
    else{
        if (or > attachDiv.children.length)
            or = attachDiv.children.length;
        if(attachDiv.children.length > 1) {
            attachDiv.removeChild(attachDiv.childNodes[ or - 1 ]);
            subOffset = 1;
        }
    }
    or = (orTemp - subOffset);//will be 0 or 1, where we used to use or--, we now use subOffset = 1
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
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"'  onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadPrograms(this.id)' class='dropdownWidth' name='MajorMinor" + and + or +"' id='MajorMinor" + and  + or +"'><option value=''" +
                "selected disabled hidden>Select Option</option><option value='Any Major'>Any Major</option><option value='Any Minor'>Any Minor</option>" +
                "</select>&nbsp;<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Location") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select class='dropdownWidth' name='Location" + and + or +"' id='Location" + and  + or +"' ><option value''" +
                ">Select Option</option><option value='Clarion'>Clarion</option><option value='Online'>Online</option>" +
                "<option value='Venango'>Venango</option></select>&nbsp;<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Taking" || $('#dropdown' + and + ' option:selected').text() == "Scheduled For" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking" || $('#dropdown' + and + ' option:selected').text() == "Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking/Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Scheduled For" || $('#dropdown' + and + ' option:selected').text() == "Course") { +
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadSubjects(this.id)' onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' name='Subject" + and + or +"' id='Subject" + and  + or +"'><option value=''" +
                "selected disabled hidden>Subject</option>" + SubjectOptionsString + "</select>&nbsp;<select class='dropdownboxWidthSmall' name='Catalog" + and + or +"' id='Catalog" + and  + or +"'>" +
                "<option value=''\ selected disabled hidden>Course No:</option></select>&nbsp<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Completed" || $('#dropdown' + and + ' option:selected').text() == "Taking/Completed") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadSubjects(this.id)'  onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' name='Subject" + and + or +"' id='Subject" + and  + or +"' ><option value=''"+
                "selected disabled hidden>Subject</option>" + SubjectOptionsString + "</select>&nbsp;<select class='dropdownboxWidthSmall' name='Catalog" + and + or +"' id='Catalog" + and  + or +"'>" +
                "<option value=''\ selected disabled hidden>Course No:</option></select>&nbsp;<select style='20%;' name='MinGrade" + and + or +"' id='MinGrade" + and  + or +"''>\" +\n" +
                "                \"<option value=''\\ selected disabled hidden>Min. Grade</option><option value='Passed'>Passed</option><option value='A'>A</option>" +
                "<option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select>&nbsp<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        freshlyChanged=false;
        or++;
		orValueChanged();
    }
    else{
        while(attachDiv.firstChild) {
            attachDiv.removeChild(attachDiv.firstChild);
        }
        if ($('#dropdown' + and + ' option:selected').text() == "Program") {
            //alert("called");
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadPrograms(this.id)' class='dropdownWidth' name='MajorMinor" + and + or +"' id='MajorMinor" + and  + or +"'><option value=''" +
                "selected disabled hidden>Select Option</option><option value='Any Major'>Any Major</option><option value='Any Minor'>Any Minor</option>" +
                "</select>&nbsp;<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Location") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' name='Location" + and + or +"' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select class='dropdownWidth' name='Location" + and + or +"' id='Location" + and  + or +"' ><option value''" +
                ">Select Option</option><option value='Clarion'>Clarion</option><option value='Online'>Online</option>" +
                "<option value='Venango'>Venango</option></select>&nbsp;<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Taking" || $('#dropdown' + and + ' option:selected').text() == "Scheduled For" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking" || $('#dropdown' + and + ' option:selected').text() == "Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Taking/Not Completed" ||
            $('#dropdown' + and + ' option:selected').text() == "Not Scheduled For" || $('#dropdown' + and + ' option:selected').text() == "Course") { +
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' name='Subject" + and + or +"' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadSubjects(this.id)'  onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' name='Subject" + and + or +"' id='Subject" + and  + or +"'><option value=''" +
                "selected disabled hidden>Subject</option>" + SubjectOptionsString + "</select>&nbsp;<select class='dropdownboxWidthSmall' name='Catalog" + and + or +"' id='Catalog" + and  + or +"'>" +
                "<option value=''\ selected disabled hidden>Course No:</option></select>&nbsp<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        else if ($('#dropdown' + and + ' option:selected').text() == "Completed" || $('#dropdown' + and + ' option:selected').text() == "Taking/Completed") {
            $(dynamicDiv).html("&nbsp;&nbsp;<button type='button' class='glyphicon glyphicon-remove' id='removeOrDiv" + and  + or +"' onclick='removeOrDiv(this.id)'></button>&nbsp;<select onfocus='loadSubjects(this.id)'  onchange='loadCatalogs(this.id, `Catalog` + this.id.replace( /[^0-9]/g, `` ))' class='dropdownWidth' name='Subject" + and + or +"' id='Subject" + and  + or +"' ><option value=''"+
                "selected disabled hidden>Subject</option>" + SubjectOptionsString + "</select>&nbsp;<select class='dropdownboxWidthSmall' name='Catalog" + and + or +"' id='Catalog" + and  + or +"'>" +
                "<option value=''\ selected disabled hidden>Course No:</option></select>&nbsp;<select style='20%;' name='MinGrade" + and + or +"' id='MinGrade" + and  + or +"''>\" +\n" +
                "                \"<option value=''\\ selected disabled hidden>Min. Grade</option><option value='Passed'>Passed</option><option value='A'>A</option>" +
                "<option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select>&nbsp<button type='button' class='btn btn-danger' id='orButton" + and  + or +"' onclick='orButtonPressed(this.id)'>Or</button>&nbsp;&nbsp;");
        }
        or++;
		orValueChanged();
    }
    attachDiv.appendChild(dynamicDiv);
    orButton=false;
}

function orButtonPressedRebuild(){
    orButton=true;
    makeDivVisibleOr();
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

function changeFileDiv(pID){
    var filename = $('#' + pID).val().replace(/C:\\fakepath\\/i, '');
    fileCounter=pID.replace( /[^0-9]/g, `` );
    var currentFileDiv=$('#noFile' + fileCounter);
    currentFileDiv.html(filename);
}

//SAVE QUESTION POPUP BOX

// When the user clicks anywhere outside of the modal, close it

function checkIfUserWantsToSaveQuestion(){
    var modal = document.getElementById('myModal');

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    if($('#userSaveQuestion').prop('checked')){
        //alert("yes");
        modal.style.display = "block";
    }
    else {
        //alert("no");
        window.location.replace("../controller/controller.php?action=Loading");
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
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
function getProgramsUsingJSON(pUser){
    let xhttp;
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            JSONObjectHoldingAllOfOurPrograms = JSON.parse(xhttp.responseText);//#ReadableCode
            //then, do stuff with our JSON object that holds all of our courses
            console.log(JSONObjectHoldingAllOfOurPrograms);
            incrementAjaxCompletionCounter();//when this gets to four, we load serial data
            return JSONObjectHoldingAllOfOurPrograms;
        }
    };
    xhttp.open("GET", "../model/getUserProgramsUsingJSON.php?UserSelected=" + pUser, true);
    xhttp.send();

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
var SubjectsForUserJSON;

//pass in the id of the Subject Dropdown and the Catalog dropdown you want to load
//get the value of subject dropdown
//for each catalog found in that subjects' array
//add that catalog as an option in our catalog dropdown
function loadCatalogs(pSubjectDropdownID, pCatalogDropdownID){
    var SubjectSelectedInOurDropdown = document.getElementById(pSubjectDropdownID).value;
    document.getElementById(pCatalogDropdownID).innerHTML = "<option value='Catalog' selected disabled hidden>" + "Course No." + "</option>";
    document.getElementById(pCatalogDropdownID).innerHTML += "<option value='Any...'>" + "Any..." + "</option>";
    if (jsObjectHoldingAllOfOurSubjects[SubjectSelectedInOurDropdown] != undefined)
        for (i =0; i < jsObjectHoldingAllOfOurSubjects[SubjectSelectedInOurDropdown].length; i++){
            document.getElementById(pCatalogDropdownID).innerHTML += "<option value='" + jsObjectHoldingAllOfOurSubjects[SubjectSelectedInOurDropdown][i] + "'>" + jsObjectHoldingAllOfOurSubjects[SubjectSelectedInOurDropdown][i] + "</option>";
        }
    document.getElementById(pCatalogDropdownID).innerHTML += "<option value='100s'>" + "100s" + "</option>";
    document.getElementById(pCatalogDropdownID).innerHTML += "<option value='200s'>" + "200s" + "</option>";
    document.getElementById(pCatalogDropdownID).innerHTML += "<option value='300s'>" + "300s" + "</option>";
    document.getElementById(pCatalogDropdownID).innerHTML += "<option value='400s'>" + "400s" + "</option>";
    document.getElementById(pCatalogDropdownID).innerHTML += "<option value='500s'>" + "500s" + "</option>";
}

//loads a particular dropdown with all of our subjects
//**FOR USER CONTEXT we will load it with the results of a USER CONTEXT SQL QUERY
//**I THINK THE LOADCATALOGS FUNCTION CAN REMAIN THE SAME AND OUR JSON OBJECT IS STILL USEFUL
//**FOR PERFORMANCE, WE MIGHT WANT TO MAKE GETALLSUBJECTSUSINGJSON ALSO IMPLEMENT USER CONTEXT TO LIMIT RESULT SIZE
function loadSubjects(pSubjectDropdownID){
    console.log("Our subjects are: ");  console.log(jsObjectHoldingAllOfOurSubjects);
    document.getElementById(pSubjectDropdownID).innerHTML = "<option value='Subject' selected disabled hidden>" + "Subject" + "</option>";
    for (SubjFound in SubjectsForUserJSON){
        document.getElementById(pSubjectDropdownID).innerHTML += "<option value='" + SubjectsForUserJSON[SubjFound]['Subject'] + "'>" + SubjectsForUserJSON[SubjFound]['Subject'] + "</option>";
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
            document.getElementById('hasSubjectsSelect').innerHTML = "<option disabled>Has these subjects: </option><option disabled></option>";
            document.getElementById('hasNotSubjectsSelect').innerHTML = "<option disabled>Does not have: </option><option disabled></option>";
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
            console.log("Our User's programs are: "); console.log(UserProgramsJSON);
            //alert(ProgramSubjectsJSON);
            document.getElementById('hasProgramsSelect').innerHTML = "<option disabled>Has these programs: </option><option disabled></option>";
            document.getElementById('hasNotProgramsSelect').innerHTML = "<option disabled>Does not have: </option><option disabled></option>";
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
            console.log("In loadNotUserPrograms, our allProgramsJSON is: "); console.log(allProgramsJSON);
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
    incrementAjaxCompletionCounter();//when this gets to four, we load serial data

    //if you want, you can use this line to load the first dropdown:
    //loadSubjects("JSONTestingSelect3434");


    return jsObjectHoldingAllOfOurSubjects;
    // { "CIS": ["202", "244", "254", "306"], "DA": ["510", "512", "520"]  }
}
//For USER CONTEXT
function getSubjectsForUserUsingJSON(pUser){
    //parse the Ajax responseText into a JSON object, just as it was encoded into a JSON string
    //create a JS Object to hold our unique subject values much like a PHP associative array
    console.log("Current User: " + pUser);
    let xhttp;
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            SubjectsForUserJSON = JSON.parse(xhttp.responseText);
            console.log("The Subjects for this user are: ");
            console.log(SubjectsForUserJSON);
            SubjectOptionsString = "";
            for (SubjFound in SubjectsForUserJSON){
                SubjectOptionsString += "<option value='" + SubjectsForUserJSON[SubjFound]['Subject'] + "'>" + SubjectsForUserJSON[SubjFound]['Subject'] + "</option>";
            }
            incrementAjaxCompletionCounter();//when this gets to four, we load serial data
        }
    };
    xhttp.open("GET", "../model/getSubjectsForUserJSON.php?UserSelected=" + pUser, true);
    xhttp.send();

    return SubjectsForUserJSON;
    // { "CIS": ["202", "244", "254", "306"], "DA": ["510", "512", "520"]  }
}
//used for loading terms into dropdowns on student question page
function getTermsUsingJSON(xhttp){
    //parse the Ajax responseText into a JSON object, just as it was encoded into a JSON string
    //create a JS Object to hold our unique term values much like a PHP associative array
    JSONObjectHoldingAllOfOurTerms = JSON.parse(xhttp.responseText);
    console.log(JSONObjectHoldingAllOfOurTerms);
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
    incrementAjaxCompletionCounter();//when this gets to four, we load serial data


    return JSONObjectHoldingAllOfOurTerms;
    // { "CIS": ["202", "244", "254", "306"], "DA": ["510", "512", "520"]  }
}
function convertRangeToTermJS(pSeason, pYear){
    if (pSeason == 'Spring')
        seasonResult = '1';
    if (pSeason == 'Summer')
        seasonResult = '5';
    if (pSeason == 'Fall' || pSeason == 'Winter')  //2018 = 2                  //2018 = 18
        seasonResult = '8';
    yearToTerm = pYear.substring(0,1) + pYear.substring(2,4);
    finalResult = yearToTerm + seasonResult; // = 2185
    return finalResult;
}
function updateCurrentTermUsingJSON(pCurrentTerm){
    console.log("Button clicked, pCurrentTerm is " + pCurrentTerm);
    let xhttp;
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhttp.responseText);
            document.getElementById('updatedTermLabel').innerHTML = "<br>**Current term has been updated** to: " + xhttp.responseText;
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

function displayClassHistory(pStudentID){
    //console.log(pStudentID);
    var tab = window.open('../controller/controller.php?action=StudentHistory&StudentHistoryID=' + pStudentID, '_blank'); //make the page exist before ajax stuff
    tab.focus();
}

function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("result_table");
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
        first, which contains table headers): */
        for (i = 1; i < (rows.length - 1); i++) {
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Get the two elements you want to compare,
            one from current row and one from the next: */
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /* Check if the two rows should switch place,
            based on the direction, asc or desc: */
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            /* If a switch has been marked, make the switch
            and mark that a switch has been done: */
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount++;
        } else {
            /* If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again. */
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
