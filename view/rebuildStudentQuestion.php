<?php
$title = "MainApplicationStudentPage.html";
require '../view/headerInclude.php';
?>

<body>
<div class="container">
    <center><h1>Course Scheduling Aid</h1></center>
    <div class="container" style="margin: 0px auto">
        <h1>New Student Question</h1>
        <div class="jumbotron" style="margin:0px auto">
            <form id="issueInputForm" action="../controller/controller.php?action=ProcessStudentQuestion" method="post">
                <div class="form-group" style="margin:0px auto" id="divAnd0">
                    <label>Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown1" name="category1" onchange="makeDivVisibleOr()">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Program" id="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses" disabled><b>---COURSES---</b></option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <div class="inline" id="attach0"></div>
                <br/>
                <button type="button" id="and0" class="btn btn-primary" onclick="makeDivVisibleAnd()">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd1">
                    <button type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible()"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown2" name="category2" onchange="makeDivVisibleOr()">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses" disabled><b>---COURSES---</b></option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <div class="inline" id="attach1"></div>
                    <br/>
                <button type="button" id="and1" class="btn btn-primary" onclick="makeDivVisibleAnd()">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd2">
                    <button type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible()"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown3" name="category3" onchange="makeDivVisibleOr()">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses" disabled><b>---COURSES---</b></option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <div class="inline" id="attach2"></div>
                    <br/>
                <button type="button" id="and2" class="btn btn-primary" onclick="makeDivVisibleAnd()">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group , hiddenDiv" id="divAnd3" >
                    <button type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible()"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown4" name="category4" onchange="makeDivVisibleOr()">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses" disabled><b>---COURSES---</b></option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <div class="inline" id="attach3"></div>
                    <br/>
                <button type="button" id="and3" class="btn btn-primary" onclick="makeDivVisibleAnd()">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd4" >
                    <button type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible()"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown5" name="category5" onchange="makeDivVisibleOr()">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses" disabled><b>---COURSES---</b></option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <div class="inline" id="attach4"></div>
                    <br/>
                <button type="button" id="and4" class="btn btn-primary" onclick="makeDivVisibleAnd()">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd5" >
                    <button type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible()"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown6" name="category6" onchange="makeDivVisibleOr()">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses" disabled><b>---COURSES---</b></option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <div class="inline" id="attach5"></div>
                    <br/>
                <button type="button" id="and5" class="btn btn-primary" onclick="makeDivVisibleAnd()">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd6" >
                    <button type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible()"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown7" name="category7" onchange="makeDivVisibleOr()">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses" disabled><b>---COURSES---</b></option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <div class="inline" id="attach6"></div>
                    <br/>
                <button type="button" id="and6" class="btn btn-primary" onclick="makeDivVisibleAnd()">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd7" >
                    <button type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible()"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown8" name="category8" onchange="makeDivVisibleOr()">
                        <option value=" " selected disabled hidden>Select Category</option>
                        <option value="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses" disabled><b>---COURSES---</b></option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <div class="inline" id="attach7"></div>
                    <br/>
                <br/>
                <br/>
                </div>
                <br/><br/><br/>
                <div class="blackBorderDiv" style="width: 20%; float: left;">
                    Rank
                    <br/>
					<?php 
						//RANK 
						
						if($u->rankFR === "FR"){ echo "<input type='checkbox' value='FR' name='FR' checked='checked' id='FR'>FR"; }
						else { echo "<input type='checkbox' value='FR' name='FR' id='FR'>FR"; }
								
						if($u->rankSO === "SO"){ echo "<input type='checkbox' value='SO' name='SO' checked='checked' id='SO'>SO"; }
						else { echo "<input type='checkbox' value='SO' name='SO' id='SO'>SO"; }

						if($u->rankJR === "JR"){ echo "<input type='checkbox' value='JR' name='JR' checked='checked' id='JR'>JR"; }
						else { echo "<input type='checkbox' value='JR' name='JR' id='JR'>JR"; }

						if($u->rankSR === "SR"){ echo "<input type='checkbox' value='SR' name='SR' checked='checked' id='SR'>SR"; }
						else { echo "<input type='checkbox' value='SR' name='SR' id='SR'>SR"; }						
					?>

                </div>

                <div class="dropdownboxWidth, containerDiv" style="width: 20%; float: left">
                    GPA
                    <br/>
                    <input type="text" value="0.0" style="width: 30px" name="startGPA" id="firstGpaSpot"></input>
                    -
                    <input type="text" value="4.0" style="width: 30px" name="endGPA" id="secondGpaSpot"></input>
                </div>
                <div class="dropdownboxWidth, containerDiv" style="width: 20%; float: right">
                    <input type="checkbox" checked="checked" name="currentStudentsOnly" id="currentStudentsOnly">Current Students Only</input>
                <i>*Students who have been enrolled in the past year and have not graduated or applied for graduation</i>
                </div>
                <div>&nbsp<br/>&nbsp<br/>&nbsp<br/>&nbsp<br/>&nbsp<br/></div>

                <div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Term Range</a></li>
                        <li><a data-toggle="tab" href="#menu1">By Year</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <br/>
                                <h5><b>Only check classes between:</b></h5>
                            <select class="form-control, dropdownboxWidth" name="startSeason" id="dropdownRange1" style="width:65px;">
                                <option value="Spring" selected>Spring</option>
                                <option value="Summer">Summer</option>
                                <option value="Fall">Fall</option>
                                <option value="Winter">Winter</option>
                            </select>
                            <select class="form-control, dropdownboxWidth" name="startYear" id="dropdownRange2" style="width:65px;">
                                <option value="2007" selected>2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                            </select>
                            -
                            <select class="form-control, dropdownboxWidth" name="endSeason" id="dropdownRange3" style="width:65px;">
                                <option value="Spring">Spring</option>
                                <option value="Summer">Summer</option>
                                <option value="Fall" selected>Fall</option>
                                <option value="Winter">Winter</option>
                            </select>
                            <select class="form-control, dropdownboxWidth" name="endYear" id="dropdownRange4" style="width:65px;">
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018" selected>2018</option>
                            </select>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <br/>
                            Only check past
                            <input type="text" style="width:65px;" id="pastYears">
                            </input>
                            years
                        </div>
                    </div>
                </div>
				<input type="checkbox" name="saveQuestion"> Remember this search</input>
                <input type="submit" style="float:right" class="btn btn-success"/>
            </form>
        </div>
    </div>
</body>
</html>