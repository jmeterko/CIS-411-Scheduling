<?php
$title = "MainApplicationStudentPage.html";
require '../view/headerInclude.php';
?>
<body style="background-color: #becccc;" onload="loadDoc('../model/getCoursesUsingJSON.php', getSubjectsUsingJSON);loadDoc('../model/getTermsUsingJSON.php', getTermsUsingJSON);loadDoc('../model/getProgramsUsingJSON.php', getProgramsUsingJSON);">

<div class="container">
    <div class="container" style="margin: 0px auto">
        <?php $rebuild = false; if (isset($form) && !empty($form)) { $rebuild = true; } if ($rebuild) { ?>
            <h1>Saved Student Question - <?php echo $form->searchName;?></h1>
        <?php } else { ?>
            <h1>New Student Question</h1>
        <?php } ?>
        <div class="jumbotron" style="margin:0px auto">
            <form id="issueInputForm" action="../controller/controller.php?action=ProcessStudentQuestion" method="post">
                <div class="form-group" style="margin:0px auto" id="divAnd0">
                    <label>Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown0" name="dropdown0" onchange="dropdownFreshlyChanged(this.id)">
                        <?php $rebuild = false; if (isset($form) && !empty($form)) { $rebuild = true; } if ($rebuild) { ?>
                            <option value="" selected disabled hidden>Select Category</option>
                            <option value="Program"<?=$form->cat0 == 'Program' ? ' selected="selected"' : '';?>>Program</option>
                            <option value="Location"<?=$form->cat0 == 'Location' ? ' selected="selected"' : '';?>>Location</option>
                            <option value="courses" disabled><b>---COURSES---</b></option>
                            <option value="Taking"<?=$form->cat0 == 'Taking' ? ' selected="selected"' : '';?>>Taking</option>
                            <option value="Completed"<?=$form->cat0 == 'Completed' ? ' selected="selected"' : '';?>>Completed</option>
                            <option value="Taking/Completed"<?=$form->cat0 == 'Taking/Completed' ? ' selected="selected"' : '';?>>Taking/Completed</option>
                            <option value="Scheduled For"<?=$form->cat0 == 'Scheduled For' ? ' selected="selected"' : '';?>>Scheduled For</option>
                            <option value="Not Taking"<?=$form->cat0 == 'Not Taking' ? ' selected="selected"' : '';?>>Not Taking</option>
                            <option value="Not Completed"<?=$form->cat0 == 'Not Completed' ? ' selected="selected"' : '';?>>Not Completed</option>
                            <option value="Not Taking/Not Completed"<?=$form->cat0 == 'Not Taking/Not Completed' ? ' selected="selected"' : '';?>>Not Taking/Not Completed</option>
                            <option value="Not Scheduled For"<?=$form->cat0 == 'Not Scheduled For' ? ' selected="selected"' : '';?>>Not Scheduled For</option>
                        <?php } else { ?>
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

                            <?php if(!empty($results)){ ?>
                                <option value="courses" disabled><b>---SAVED SEARCHES---</b></option>
                                <?php         $i = 0;
                                foreach ($results as $row) { $i++; ?>

                                    <option value="<?php echo $row['id'] ?>"><?php echo htmlspecialchars($row['name']) ?></option>
                                <?php }}} ?>


                    </select>
                    <div class="inline" id="attach0"></div>
                    <br/>
                    <button type="button" id="and0" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>
                    <br/>
                    <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd1">
                    <button type="button" class="glyphicon glyphicon-minus" id="minusButton1" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown1" name="dropdown1"  onchange="dropdownFreshlyChanged(this.id)">
                        <?php if ($rebuild) {  ?>
                            <option value="" selected disabled hidden>Select Category</option>
                            <option value="Program"<?=$form->cat1 == 'Program' ? ' selected="selected"' : '';?>>Program</option>
                            <option value="Location"<?=$form->cat1 == 'Location' ? ' selected="selected"' : '';?>>Location</option>
                            <option value="courses" disabled><b>---COURSES---</b></option>
                            <option value="Taking"<?=$form->cat1 == 'Taking' ? ' selected="selected"' : '';?>>Taking</option>
                            <option value="Completed"<?=$form->cat1 == 'Completed' ? ' selected="selected"' : '';?>>Completed</option>
                            <option value="Taking/Completed"<?=$form->cat1 == 'Taking/Completed' ? ' selected="selected"' : '';?>>Taking/Completed</option>
                            <option value="Scheduled For"<?=$form->cat1 == 'Scheduled For' ? ' selected="selected"' : '';?>>Scheduled For</option>
                            <option value="Not Taking"<?=$form->cat1 == 'Not Taking' ? ' selected="selected"' : '';?>>Not Taking</option>
                            <option value="Not Completed"<?=$form->cat1 == 'Not Completed' ? ' selected="selected"' : '';?>>Not Completed</option>
                            <option value="Not Taking/Not Completed"<?=$form->cat1 == 'Not Taking/Not Completed' ? ' selected="selected"' : '';?>>Not Taking/Not Completed</option>
                            <option value="Not Scheduled For"<?=$form->cat1 == 'Not Scheduled For' ? ' selected="selected"' : '';?>>Not Scheduled For</option>
                        <?php } else { ?>
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
                        <?php } ?>
                    </select>
                    <div class="inline" id="attach1"></div>
                    <br/>
                    <button type="button" id="and1" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>                <br/>
                    <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd2">
                    <button type="button" class="glyphicon glyphicon-minus" id="minusButton2" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown2" name="dropdown2"  onchange="dropdownFreshlyChanged(this.id)">
                        <?php if ($rebuild) {  ?>
                            <option value="" selected disabled hidden>Select Category</option>
                            <option value="Program"<?=$form->cat2 == 'Program' ? ' selected="selected"' : '';?>>Program</option>
                            <option value="Location"<?=$form->cat2 == 'Location' ? ' selected="selected"' : '';?>>Location</option>
                            <option value="courses" disabled><b>---COURSES---</b></option>
                            <option value="Taking"<?=$form->cat2 == 'Taking' ? ' selected="selected"' : '';?>>Taking</option>
                            <option value="Completed"<?=$form->cat2 == 'Completed' ? ' selected="selected"' : '';?>>Completed</option>
                            <option value="Taking/Completed"<?=$form->cat2 == 'Taking/Completed' ? ' selected="selected"' : '';?>>Taking/Completed</option>
                            <option value="Scheduled For"<?=$form->cat2 == 'Scheduled For' ? ' selected="selected"' : '';?>>Scheduled For</option>
                            <option value="Not Taking"<?=$form->cat2 == 'Not Taking' ? ' selected="selected"' : '';?>>Not Taking</option>
                            <option value="Not Completed"<?=$form->cat2 == 'Not Completed' ? ' selected="selected"' : '';?>>Not Completed</option>
                            <option value="Not Taking/Not Completed"<?=$form->cat2 == 'Not Taking/Not Completed' ? ' selected="selected"' : '';?>>Not Taking/Not Completed</option>
                            <option value="Not Scheduled For"<?=$form->cat2 == 'Not Scheduled For' ? ' selected="selected"' : '';?>>Not Scheduled For</option>
                        <?php } else { ?>
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
                        <?php } ?>
                    </select>
                    <div class="inline" id="attach2"></div>
                    <br/>
                    <button type="button" id="and2" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>                <br/>
                    <br/>
                </div>

                <div class="form-group , hiddenDiv" id="divAnd3">
                    <button type="button" class="glyphicon glyphicon-minus" id="minusButton3" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown3"  name="dropdown3" onchange="dropdownFreshlyChanged(this.id)">
                        <?php if ($rebuild) {  ?>
                            <option value="" selected disabled hidden>Select Category</option>
                            <option value="Program"<?=$form->cat3 == 'Program' ? ' selected="selected"' : '';?>>Program</option>
                            <option value="Location"<?=$form->cat3 == 'Location' ? ' selected="selected"' : '';?>>Location</option>
                            <option value="courses" disabled><b>---COURSES---</b></option>
                            <option value="Taking"<?=$form->cat3 == 'Taking' ? ' selected="selected"' : '';?>>Taking</option>
                            <option value="Completed"<?=$form->cat3 == 'Completed' ? ' selected="selected"' : '';?>>Completed</option>
                            <option value="Taking/Completed"<?=$form->cat3 == 'Taking/Completed' ? ' selected="selected"' : '';?>>Taking/Completed</option>
                            <option value="Scheduled For"<?=$form->cat3 == 'Scheduled For' ? ' selected="selected"' : '';?>>Scheduled For</option>
                            <option value="Not Taking"<?=$form->cat3 == 'Not Taking' ? ' selected="selected"' : '';?>>Not Taking</option>
                            <option value="Not Completed"<?=$form->cat3 == 'Not Completed' ? ' selected="selected"' : '';?>>Not Completed</option>
                            <option value="Not Taking/Not Completed"<?=$form->cat3 == 'Not Taking/Not Completed' ? ' selected="selected"' : '';?>>Not Taking/Not Completed</option>
                            <option value="Not Scheduled For"<?=$form->cat3 == 'Not Scheduled For' ? ' selected="selected"' : '';?>>Not Scheduled For</option>
                        <?php } else { ?>
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
                        <?php } ?>
                    </select>
                    <div class="inline" id="attach3"></div>
                    <br/>
                    <button type="button" id="and3" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>                <br/>
                    <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd4">
                    <button type="button" class="glyphicon glyphicon-minus" id="minusButton4" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown4"  name="dropdown4" onchange="dropdownFreshlyChanged(this.id)">
                        <?php if ($rebuild) {  ?>
                            <option value="" selected disabled hidden>Select Category</option>
                            <option value="Program"<?=$form->cat4 == 'Program' ? ' selected="selected"' : '';?>>Program</option>
                            <option value="Location"<?=$form->cat4 == 'Location' ? ' selected="selected"' : '';?>>Location</option>
                            <option value="courses" disabled><b>---COURSES---</b></option>
                            <option value="Taking"<?=$form->cat4 == 'Taking' ? ' selected="selected"' : '';?>>Taking</option>
                            <option value="Completed"<?=$form->cat4 == 'Completed' ? ' selected="selected"' : '';?>>Completed</option>
                            <option value="Taking/Completed"<?=$form->cat4 == 'Taking/Completed' ? ' selected="selected"' : '';?>>Taking/Completed</option>
                            <option value="Scheduled For"<?=$form->cat4 == 'Scheduled For' ? ' selected="selected"' : '';?>>Scheduled For</option>
                            <option value="Not Taking"<?=$form->cat4 == 'Not Taking' ? ' selected="selected"' : '';?>>Not Taking</option>
                            <option value="Not Completed"<?=$form->cat4 == 'Not Completed' ? ' selected="selected"' : '';?>>Not Completed</option>
                            <option value="Not Taking/Not Completed"<?=$form->cat4 == 'Not Taking/Not Completed' ? ' selected="selected"' : '';?>>Not Taking/Not Completed</option>
                            <option value="Not Scheduled For"<?=$form->cat4 == 'Not Scheduled For' ? ' selected="selected"' : '';?>>Not Scheduled For</option>
                        <?php } else { ?>
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
                        <?php } ?>
                    </select>
                    <div class="inline" id="attach4"></div>
                    <br/>
                    <button type="button" id="and4" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>                <br/>
                    <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd5">
                    <button type="button" class="glyphicon glyphicon-minus" id="minusButton5" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown5"  name="dropdown5" onchange="dropdownFreshlyChanged(this.id)">
                        <?php if ($rebuild) {  ?>
                            <option value="" selected disabled hidden>Select Category</option>
                            <option value="Program"<?=$form->cat5 == 'Program' ? ' selected="selected"' : '';?>>Program</option>
                            <option value="Location"<?=$form->cat5 == 'Location' ? ' selected="selected"' : '';?>>Location</option>
                            <option value="courses" disabled><b>---COURSES---</b></option>
                            <option value="Taking"<?=$form->cat5 == 'Taking' ? ' selected="selected"' : '';?>>Taking</option>
                            <option value="Completed"<?=$form->cat5 == 'Completed' ? ' selected="selected"' : '';?>>Completed</option>
                            <option value="Taking/Completed"<?=$form->cat5 == 'Taking/Completed' ? ' selected="selected"' : '';?>>Taking/Completed</option>
                            <option value="Scheduled For"<?=$form->cat5 == 'Scheduled For' ? ' selected="selected"' : '';?>>Scheduled For</option>
                            <option value="Not Taking"<?=$form->cat5 == 'Not Taking' ? ' selected="selected"' : '';?>>Not Taking</option>
                            <option value="Not Completed"<?=$form->cat5 == 'Not Completed' ? ' selected="selected"' : '';?>>Not Completed</option>
                            <option value="Not Taking/Not Completed"<?=$form->cat5 == 'Not Taking/Not Completed' ? ' selected="selected"' : '';?>>Not Taking/Not Completed</option>
                            <option value="Not Scheduled For"<?=$form->cat5 == 'Not Scheduled For' ? ' selected="selected"' : '';?>>Not Scheduled For</option>
                        <?php } else { ?>
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
                        <?php } ?>
                    </select>
                    <div class="inline" id="attach5"></div>
                    <br/>
                    <button type="button" id="and5" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>                <br/>
                    <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd6">
                    <button type="button" class="glyphicon glyphicon-minus" id="minusButton6" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown6"  name="dropdown6" onchange="dropdownFreshlyChanged(this.id)">
                        <?php if ($rebuild) {  ?>
                            <option value="" selected disabled hidden>Select Category</option>
                            <option value="Program"<?=$form->cat6 == 'Program' ? ' selected="selected"' : '';?>>Program</option>
                            <option value="Location"<?=$form->cat6 == 'Location' ? ' selected="selected"' : '';?>>Location</option>
                            <option value="courses" disabled><b>---COURSES---</b></option>
                            <option value="Taking"<?=$form->cat6 == 'Taking' ? ' selected="selected"' : '';?>>Taking</option>
                            <option value="Completed"<?=$form->cat6 == 'Completed' ? ' selected="selected"' : '';?>>Completed</option>
                            <option value="Taking/Completed"<?=$form->cat6 == 'Taking/Completed' ? ' selected="selected"' : '';?>>Taking/Completed</option>
                            <option value="Scheduled For"<?=$form->cat6 == 'Scheduled For' ? ' selected="selected"' : '';?>>Scheduled For</option>
                            <option value="Not Taking"<?=$form->cat6 == 'Not Taking' ? ' selected="selected"' : '';?>>Not Taking</option>
                            <option value="Not Completed"<?=$form->cat6 == 'Not Completed' ? ' selected="selected"' : '';?>>Not Completed</option>
                            <option value="Not Taking/Not Completed"<?=$form->cat6 == 'Not Taking/Not Completed' ? ' selected="selected"' : '';?>>Not Taking/Not Completed</option>
                            <option value="Not Scheduled For"<?=$form->cat6 == 'Not Scheduled For' ? ' selected="selected"' : '';?>>Not Scheduled For</option>
                        <?php } else { ?>
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
                        <?php } ?>
                    </select>
                    <div class="inline" id="attach6"></div>
                    <br/>
                    <button type="button" id="and6" class="btn btn-primary" onclick="makeDivVisibleAnd(this.id)">And</button>                <br/>
                    <br/>
                </div>

                <div class="form-group, hiddenDiv" id="divAnd7">
                    <button type="button" class="glyphicon glyphicon-minus" id="minusButton7" onclick="makeDivInvisible(this.id)"></button><label>&nbsp;&nbsp;&nbsp;Category</label>
                    <select class="form-control, dropdownboxWidth" id="dropdown7"  name="dropdown7" onchange="dropdownFreshlyChanged(this.id)">
                        <?php if ($rebuild) {  ?>
                            <option value="" selected disabled hidden>Select Category</option>
                            <option value="Program"<?=$form->cat7 == 'Program' ? ' selected="selected"' : '';?>>Program</option>
                            <option value="Location"<?=$form->cat7 == 'Location' ? ' selected="selected"' : '';?>>Location</option>
                            <option value="courses" disabled><b>---COURSES---</b></option>
                            <option value="Taking"<?=$form->cat7 == 'Taking' ? ' selected="selected"' : '';?>>Taking</option>
                            <option value="Completed"<?=$form->cat7 == 'Completed' ? ' selected="selected"' : '';?>>Completed</option>
                            <option value="Taking/Completed"<?=$form->cat7 == 'Taking/Completed' ? ' selected="selected"' : '';?>>Taking/Completed</option>
                            <option value="Scheduled For"<?=$form->cat7 == 'Scheduled For' ? ' selected="selected"' : '';?>>Scheduled For</option>
                            <option value="Not Taking"<?=$form->cat7 == 'Not Taking' ? ' selected="selected"' : '';?>>Not Taking</option>
                            <option value="Not Completed"<?=$form->cat7 == 'Not Completed' ? ' selected="selected"' : '';?>>Not Completed</option>
                            <option value="Not Taking/Not Completed"<?=$form->cat7 == 'Not Taking/Not Completed' ? ' selected="selected"' : '';?>>Not Taking/Not Completed</option>
                            <option value="Not Scheduled For"<?=$form->cat7 == 'Not Scheduled For' ? ' selected="selected"' : '';?>>Not Scheduled For</option>
                        <?php } else { ?>
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
                        <?php } ?>
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
                    <?php if ($rebuild) { ?>
                        <input type='hidden' name='orCount1' id="orCount1" value='<?php echo $form->or1;?>'/>
                        <input type="checkbox" value="FR" name="FR" <?php if ($form->rankFR == "FR") echo "checked='checked'"?> id="FR">FR
                        <input type="checkbox" value="SO" name="SO" <?php if ($form->rankSO == "SO") echo "checked='checked'"?> id="SO">SO
                        <input type="checkbox" value="JR" name="JR" <?php if ($form->rankJR == "JR") echo "checked='checked'"?> id="JR">JR
                        <input type="checkbox" value="SR" name="SR" <?php if ($form->rankSR == "SR") echo "checked='checked'"?> id="SR">SR
                    <?php } else { ?>
                        <input type="checkbox" value="FR" name="FR" checked="checked" id="FR">FR
                        <input type="checkbox" value="SO" name="SO" checked="checked" id="SO">SO
                        <input type="checkbox" value="JR" name="JR" checked="checked" id="JR">JR
                        <input type="checkbox" value="SR" name="SR" checked="checked" id="SR">SR
                    <?php } ?>

                </div>

                <div class="dropdownboxWidth, containerDiv" style="width: 20%; float: left">
                    GPA
                    <br/>
                    <?php if ($rebuild) { ?>
                        <input type="text" value="<?php echo $form->startGPA;?>" style="width: 30px" name="startGPA" id="firstGpaSpot"></input>
                        -
                        <input type="text" value="<?php echo $form->endGPA;?>" style="width: 30px" name="endGPA" id="secondGpaSpot"></input>
                    <?php } else { ?>
                        <input type="text" value="0.0" style="width: 30px" name="startGPA" id="firstGpaSpot"></input>
                        -
                        <input type="text" value="4.0" style="width: 30px" name="endGPA" id="secondGpaSpot"></input>
                    <?php } ?>
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
                            <select class="form-control, dropdownboxWidth" id="dropdownRange1" name="startSeason" style="width:65px;">
                                <?php if ($rebuild) {  ?>
                                    <option value="Spring"<?=$form->startSeason == 'Spring' ? ' selected="selected"' : '';?>>Spring</option>
                                    <option value="Summer"<?=$form->startSeason == 'Summer' ? ' selected="selected"' : '';?>>Summer</option>
                                    <option value="Fall"<?=$form->startSeason == 'Fall' ? ' selected="selected"' : '';?>>Fall</option>
                                    <option value="Winter"<?=$form->startSeason == 'Winter' ? ' selected="selected"' : '';?>>Winter</option>
                                <?php } else { ?>
                                    <option value="Spring" selected>Spring</option>
                                    <option value="Summer">Summer</option>
                                    <option value="Fall">Fall</option>
                                    <option value="Winter">Winter</option>
                                <?php } ?>
                            </select>

                            <select class="form-control, dropdownboxWidth" id="dropdownRange2" style="width:65px;">
                            </select>
                            -
                            <select class="form-control, dropdownboxWidth" id="dropdownRange3" name="endSeason" style="width:65px;">
                                <?php if ($rebuild) {  ?>
                                    <option value="Spring"<?=$form->endSeason == 'Spring' ? ' selected="selected"' : '';?>>Spring</option>
                                    <option value="Summer"<?=$form->endSeason == 'Summer' ? ' selected="selected"' : '';?>>Summer</option>
                                    <option value="Fall"<?=$form->endSeason == 'Fall' ? ' selected="selected"' : '';?>>Fall</option>
                                    <option value="Winter"<?=$form->endSeason == 'Winter' ? ' selected="selected"' : '';?>>Winter</option>
                                <?php } else { ?>
                                    <option value="Spring" selected>Spring</option>
                                    <option value="Summer">Summer</option>
                                    <option value="Fall">Fall</option>
                                    <option value="Winter">Winter</option>
                                <?php } ?>
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

                        <input type="checkbox" id="saveQuestion" name="saveQuestion"> Remember this search</input>
                        <input type="text" id="searchName" class="hidden" placeholder="Enter Search Name" name="searchName"></input>
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

                            <?php $orDropdownValue = $form->data;
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
                </div>
                <input type="button" value="Back" style="float:left" class="btn btn-danger" onclick="window.location.href='../view/HomePage.html'"/>
                <input type="submit" value="Submit" style="float:right" class="btn btn-success" />
            </form>
        </div>
    </div>
</body>
</html>