<?php
$title = "MainApplicationStudentPage.html";
require '../view/headerInclude.php';
?>




<!--                                     Should we fetch the data when the page is fully loaded? -->
<body style="background-color: #becccc;" onload="loadDoc('../model/getCoursesUsingJSON.php', getSubjectsUsingJSON);loadDoc('../model/getTermsUsingJSON.php', getTermsUsingJSON);loadDoc('../model/getProgramsUsingJSON.php', getProgramsUsingJSON);">
<div class="container">
    <!DOCTYPE html>
    <html lang="en">
    <div class="container" style="margin: 0px auto">
        <h1>New Student Question</h1>
        <div class="jumbotron" style="margin:0px auto">
            <form id="issueInputForm" >
                <div class="form-group" style="margin:0px auto" id="divAnd0">
                    <label>Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown0" onchange="dropdownFreshlyChanged(this.id)">
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
                <button type="button" id="and0" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd1">
                    <button id="minus1" type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown1" onchange="dropdownFreshlyChanged(this.id)">
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
                <button type="button" id="and1" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd2">
                    <button id="minus1" type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown2" onchange="dropdownFreshlyChanged(this.id)">
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
                <button type="button" id="and2" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group , hiddenDiv" id="divAnd3" >
                    <button  id="minus1" type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown3" onchange="dropdownFreshlyChanged(this.id)">
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
                <button type="button" id="and3" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd4" >
                    <button  id="minus1" type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown4" onchange="dropdownFreshlyChanged(this.id)">
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
                <button type="button" id="and4" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd5" >
                    <button  id="minus1" type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown5" onchange="dropdownFreshlyChanged(this.id)">
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
                <button type="button" id="and5" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd6" >
                    <button  id="minus1" type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown6" onchange="dropdownFreshlyChanged(this.id)">
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
                <button type="button" id="and6" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd7" >
                    <button  id="minus1" type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown7" onchange="dropdownFreshlyChanged(this.id)">
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
                    <input type="checkbox" value="FR" checked="checked" id="FR">FR
                    <input type="checkbox" value="SO" checked="checked" id="SO">SO
                    <input type="checkbox" value="JR" checked="checked" id="JR">JR
                    <input type="checkbox" value="SR+" checked="checked" id="SR">SR
                </div>

                <div class="dropdownboxWidth, containerDiv" style="width: 20%; float: left">
                    GPA
                    <br/>
                    <input type="text" value="0.0" style="width: 30px" id="firstGpaSpot"></input>
                    -
                    <input type="text" value="4.0" style="width: 30px" id="secondGpaSpot"></input>
                </div>
                <div class="dropdownboxWidth, containerDiv" style="width: 20%; float: right">
                    <input type="checkbox" checked="checked" id="currentStudentsOnly">Current Students Only</input>
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
                            <select class="form-control, dropdownboxWidth" id="dropdownRange1" style="width:65px;">
                                <option value="Spring" selected>Spring</option>
                                <option value="Summer">Summer</option>
                                <option value="Fall">Fall</option>
                                <option value="Winter">Winter</option>
                            </select>
                            <select class="form-control, dropdownboxWidth" id="dropdownRange2" style="width:65px;">
                            </select>
                            -
                            <select class="form-control, dropdownboxWidth" id="dropdownRange3" style="width:65px;">
                                <option value="Spring">Spring</option>
                                <option value="Summer">Summer</option>
                                <option value="Fall" selected>Fall</option>
                                <option value="Winter">Winter</option>
                            </select>
                            <select class="form-control, dropdownboxWidth" id="dropdownRange4" style="width:65px;">
                            </select>
                        </div>
                        <br/>
                        <div id="menu1" class="tab-pane fade">
                            <br/>
                            Only check past
                            <input type="text" style="width:65px;" id="pastYears">
                            </input>
                            years
                        </div>

                        <b style="float:right">Save this question</b> <input type="checkbox" style="float:right"/>
                        <br/>
                        <br/>
                    </div>
                </div>
                <input type="button" value="Back" style="float:left" class="btn btn-danger" onclick="window.location.href='../view/HomePage.html'"/>
                <input type="button" value="Submit" style="float:right" class="btn btn-success" onclick="window.location.href='../view/DisplayData.html'" />
            </form>
        </div>
    </div>
</body>
</html>