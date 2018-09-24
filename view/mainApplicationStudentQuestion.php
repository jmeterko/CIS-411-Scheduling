<?php
$title = "MainApplicationStudentPage.html";
require '../view/headerInclude.php';
?>

<body>
<div class="container">
    <center><h1>Course Scheduling Aid</h1></center>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>New Student Question</title>
        <!-- Bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    </head>
    <body>
    <div class="container" style="margin: 0px auto">
        <h1>New Student Question</h1>
        <div class="jumbotron" style="margin:0px auto">
            <form id="issueInputForm" >
                <div class="form-group" style="margin:0px auto">
                    <label>Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown1">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Program" id="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses">---courses---</option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <button type="button" id="or1" class="btn btn-primary">Or</button>

                    <select class="dropdownboxWidth, hiddenDiv" id="dropdownOr1">
                       <option value="" selected disabled hidden></option>
                       <option value="Any Major">Any Major</option>
                       <option value="Any Major">Any Minor</option>
                    </select>
                <br/>
                <button type="button" id="and1" class="btn btn-primary" onclick="makeDivVisibleAnd()">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd1">
                    <button type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible()"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown2">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses">---courses---</option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <button type="button" id="or2" class="btn btn-primary">Or</button>
                    <br/>
                <button type="button" id="and2" class="btn btn-primary" onclick="makeDivVisibleAnd()">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd2">
                    <button type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible()"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown3">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses">---courses---</option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <button type="button" id="or3" class="btn btn-primary">Or</button>
                    <br/>
                <button type="button" id="and3" class="btn btn-primary" onclick="makeDivVisibleAnd()">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group , hiddenDiv" id="divAnd3" >
                    <button type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible()"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown4">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses">---courses---</option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <button type="button" id="or4" class="btn btn-primary">Or</button>
                    <br/>
                <button type="button" id="and4" class="btn btn-primary" onclick="makeDivVisibleAnd()">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd4" >
                    <button type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible()"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown5">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses">---courses---</option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <button type="button" id="or5" class="btn btn-primary">Or</button>
                    <br/>
                <button type="button" id="and5" class="btn btn-primary" onclick="makeDivVisibleAnd()">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd5" >
                    <button type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible()"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown6">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses">---courses---</option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <button type="button" id="or6" class="btn btn-primary">Or</button>
                    <br/>
                <button type="button" id="and6" class="btn btn-primary" onclick="makeDivVisibleAnd()">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd6" >
                    <button type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible()"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown7">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses">---courses---</option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <button type="button" id="or7" class="btn btn-primary">Or</button>
                    <br/>
                <button type="button" id="and7" class="btn btn-primary" onclick="makeDivVisibleAnd()">And</button>
                <br/>
                <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd7" >
                    <button type="button" class="glyphicon glyphicon-minus" onclick="makeDivInvisible()"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown8">
                        <option value=" " selected disabled hidden>Select Category</option>
                        <option value="Program">Program</option>
                        <option value="Location">Location</option>
                        <option value="courses">---courses---</option>
                        <option value="Taking">Taking</option>
                        <option value="Completed">Completed</option>
                        <option value="Taking/Completed">Taking/Completed</option>
                        <option value="Scheduled For">Scheduled For</option>
                        <option value="Not Taking">Not Taking</option>
                        <option value="Not Completed">Not Completed</option>
                        <option value="Not Taking/Not Completed">Not Taking/Not Completed</option>
                        <option value="Not Scheduled For">Not Scheduled For</option>
                    </select>
                    <button type="button" id="or8" class="btn btn-primary">Or</button>
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
                            <select class="form-control, dropdownboxWidth" id="dropdownRange3" style="width:65px;">
                                <option value="Spring">Spring</option>
                                <option value="Summer">Summer</option>
                                <option value="Fall" selected>Fall</option>
                                <option value="Winter">Winter</option>
                            </select>
                            <select class="form-control, dropdownboxWidth" id="dropdownRange4" style="width:65px;">
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
                <input type="submit" style="float:right" class="btn btn-success"/>
            </form>
        </div>
    </div>
</body>
</html>