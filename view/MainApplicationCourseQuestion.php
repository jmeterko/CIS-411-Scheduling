<?php
$title = "MainApplicationCourseQuestion";
require '../view/headerInclude.php';
?>
<body style="background-color: #becccc;" onload="getSubjectsForUserUsingJSON('<?php echo $_SESSION['username'] ?>');loadDoc('../model/getCoursesUsingJSON.php', getSubjectsUsingJSON);loadDoc('../model/getTermsUsingJSON.php', getTermsUsingJSON);getProgramsUsingJSON('<?php echo $_SESSION['username'] ?>');getInstructorsUsingJSON();">
<div class="container">
    <div class="container" style="margin: 0px auto">
            <h1>New Course Question</h1>
        <div class="jumbotron" style="margin:0px auto">
            <form id="issueInputForm" action="../controller/controller.php?action=ProcessCourseQuestion" method="post">
                <div class="form-group" style="margin:0px auto" id="divAnd0">
                    <label>Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown0" name="dropdown0" onchange="dropdownFreshlyChangedCourseQuestion(this.id)">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Campus">Campus</option>
                        <option value="Course">Course</option>
                        <option value="Instructor">Instructor</option>
                    </select>
                    <div class="inline" id="attach0"></div>
                    <br/>
                    <button type="button" id="and0" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>
                    <br/>
                    <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd1">
                    <button type="button" class="glyphicon glyphicon-minus" id="minusButton1" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown1" name="dropdown1"  onchange="dropdownFreshlyChangedCourseQuestion(this.id)">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Campus">Campus</option>
                        <option value="Course">Course</option>
                        <option value="Instructor">Instructor</option>
                    </select>
                    <div class="inline" id="attach1"></div>
                    <br/>
                    <button type="button" id="and1" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>                <br/>
                    <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd2">
                    <button type="button" class="glyphicon glyphicon-minus" id="minusButton2" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown2" name="dropdown2"  onchange="dropdownFreshlyChangedCourseQuestion(this.id)">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Campus">Campus</option>
                        <option value="Course">Course</option>
                        <option value="Instructor">Instructor</option>
                    </select>
                    <div class="inline" id="attach2"></div>
                    <br/>
                    <button type="button" id="and2" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>                <br/>
                    <br/>
                </div>

                <div class="form-group , hiddenDiv" id="divAnd3">
                    <button type="button" class="glyphicon glyphicon-minus" id="minusButton3" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown3"  name="dropdown3" onchange="dropdownFreshlyChangedCourseQuestion(this.id)">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Campus">Campus</option>
                        <option value="Course">Course</option>
                        <option value="Instructor">Instructor</option>
                    </select>
                    <div class="inline" id="attach3"></div>
                    <br/>
                    <button type="button" id="and3" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>                <br/>
                    <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd4">
                    <button type="button" class="glyphicon glyphicon-minus" id="minusButton4" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown4"  name="dropdown4" onchange="dropdownFreshlyChangedCourseQuestion(this.id)">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Campus">Campus</option>
                        <option value="Course">Course</option>
                        <option value="Instructor">Instructor</option>
                    </select>
                    <div class="inline" id="attach4"></div>
                    <br/>
                    <button type="button" id="and4" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>                <br/>
                    <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd5">
                    <button type="button" class="glyphicon glyphicon-minus" id="minusButton5" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown5"  name="dropdown5" onchange="dropdownFreshlyChangedCourseQuestion(this.id)">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Campus">Campus</option>
                        <option value="Course">Course</option>
                        <option value="Instructor">Instructor</option>
                    </select>
                    <div class="inline" id="attach5"></div>
                    <br/>
                    <button type="button" id="and5" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>                <br/>
                    <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd6">
                    <button type="button" class="glyphicon glyphicon-minus" id="minusButton6" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown6"  name="dropdown6" onchange="dropdownFreshlyChangedCourseQuestion(this.id)">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Campus">Campus</option>
                        <option value="Course">Course</option>
                        <option value="Instructor">Instructor</option>
                    </select>
                    <div class="inline" id="attach6"></div>
                    <br/>
                    <button type="button" id="and6" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>                <br/>
                    <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd7">
                    <button type="button" class="glyphicon glyphicon-minus" id="minusButton7" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown7"  name="dropdown7" onchange="dropdownFreshlyChangedCourseQuestion(this.id)">
                        <option value="" selected disabled hidden>Select Category</option>
                        <option value="Campus">Campus</option>
                        <option value="Course">Course</option>
                        <option value="Instructor">Instructor</option>
                    </select>
                    <div class="inline" id="attach7"></div>
                    <br/>
                    <br/>
                    <br/>
                </div>
                <br/><br/><br/>
                <div class="blackBorderDiv" style="width: 30%; float: left;">
                    <br/>
                        <input type="checkbox" value="SP" name="SP" checked="checked" id="SP">SPRING
                        <input type="checkbox" value="SU" name="SU" checked="checked" id="SU">SUMMER
                        <input type="checkbox" value="FA" name="FA" checked="checked" id="FA">FALL
                        <input type="checkbox" value="WI" name="WI" checked="checked" id="WI">WINTER

                </div>


                <div>&nbsp<br/>&nbsp<br/>&nbsp<br/>&nbsp<br/>&nbsp<br/></div>

                <div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Term Range</a></li>
                        <!--<li><a data-toggle="tab" href="#menu1">By Year</a></li>-->
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <br/>
                            <h5><b>Only check classes between:</b></h5>
                            <select class="form-control, dropdownboxWidth" id="dropdownRange1" name="startSeason" style="width:65px;">
                                    <option value="Spring" selected>Spring</option>
                                    <option value="Summer">Summer</option>
                                    <option value="Fall">Fall</option>
                                    <option value="Winter">Winter</option>
                            </select>

                            <select class="form-control, dropdownboxWidth" id="dropdownRange2" name="startYear" style="width:65px;">
                            </select>
                            -
                            <select class="form-control, dropdownboxWidth" id="dropdownRange3" name="endSeason" style="width:65px;">
                                    <option value="Spring">Spring</option>
                                    <option value="Summer">Summer</option>
                                    <option value="Fall" selected>Fall</option>
                                    <option value="Winter">Winter</option>
                            </select>
                            <select class="form-control, dropdownboxWidth" id="dropdownRange4" name="endYear" style="width:65px;">

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

                        <?php if ($rebuild) { ?>
                            <input type='hidden' name='andCount' id="andCount" value='<?php echo $form->andCount;?>'/>
                            <input type='hidden' name='orCount0' id="orCount0" value='<?php echo $form->or0;?>'/>
                            <input type='hidden' name='orCount1' id="orCount1" value='<?php echo $form->or1;?>'/>
                            <input type='hidden' name='orCount2' id="orCount2" value='<?php echo $form->or2;?>'/>
                            <input type='hidden' name='orCount3' id="orCount3" value='<?php echo $form->or3;?>'/>
                            <input type='hidden' name='orCount4' id="orCount4" value='<?php echo $form->or4;?>'/>
                            <input type='hidden' name='orCount5' id="orCount5" value='<?php echo $form->or5;?>'/>
                            <input type='hidden' name='orCount6' id="orCount6" value='<?php echo $form->or6;?>'/>
                            <input type='hidden' name='orCount7' id="orCount7" value='<?php echo $form->or7;?>'/>
                            <!--rebuildFlag will tell the javascript functions to work based off this flag-->
                            <input type='hidden' name='rebuildFlag' id="rebuildFlag" value='true'/>

                            <?php
                            $orDropdownValue = $form->data;
                            foreach ($orDropdownValue as $item => $value) {
                                echo ("<input type='hidden' name='val" . $item . "' id='val" . $item . "' value='" . $value . "'/>");

                                /*  $orDropdownValue = $form->data;
                              foreach ($orDropdownValue as $item => $value) {
                                  echo $item . ": " . $value  . "\n";
                              }*/

                            }
                        } else { ?>
                            <input type='hidden' name='andCount' id="andCount" value='0'/>
                            <input type='hidden' name='orCount0' id="orCount0" value='0'/>
                            <input type='hidden' name='orCount1' id="orCount1" value='0'/>
                            <input type='hidden' name='orCount2' id="orCount2" value='0'/>
                            <input type='hidden' name='orCount3' id="orCount3" value='0'/>
                            <input type='hidden' name='orCount4' id="orCount4" value='0'/>
                            <input type='hidden' name='orCount5' id="orCount5" value='0'/>
                            <input type='hidden' name='orCount6' id="orCount6" value='0'/>
                            <input type='hidden' name='orCount7' id="orCount7" value='0'/>
                            <input type='hidden' name='rebuildFlag' id="rebuildFlag" value='false'/>

                        <?php } ?>
                        <br/>
                        <br/>
                    </div>
                </div><input type="button" value="Back" style="float:left" class="btn btn-danger" onclick="window.location.href='../controller/controller.php?action=HomePage'"/>
                <input type="submit" id="submitButton" name="AddSearch" style="float:right" class="btn btn-success" value="Submit" />
            </form>
        </div>
    </div>
</body>
</html>