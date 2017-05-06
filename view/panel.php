<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 26/04/17
 * Time: 10:56 م
 */
//TODO pop-up iframe window to view events

function activ($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);
    $url=explode('=',$url);
    $url=explode('&',$url[1]);
    $url=array_shift($url);
    if($currect_page == $url){
        echo 'active-left-nav'; //class name in css
    }
}



include_once 'static/header.php';
include_once 'navbar.php';

?>
<!--this div to push the page to right-->
    <div class="uk-offcanvas-content" id="panel-page" >







<div class="container">
    <div class="component col-xs-12" >


    <?php
    if($_GET['action']=='members'){
        ?>
            <a href="#" class="stu-panel-link">
                    <div class="stu-box col-lg-6">
                        <div class="lay"></div>
                        <img src="images/stu-panel.jpg" class="img-responsive stu-panel-pic col-xs-12">

                    </div>
            </a>


        <div class="teacher-box col-lg-6"></div>
        <?php


    } else if ($_GET['action']=='event') {



?>



        <br>
        <br>
        <input class="input-lg panel_add_event_input col-xs-3" placeholder="Event Title" id="panel_add_event_title">
        <input type="date" class="input-lg panel_add_event_input col-xs-3 col-xs-offset-1" id="panel_add_event_date">
        <input type="text" class="input-lg panel_add_event_input col-xs-3 col-xs-offset-1" placeholder="Place" id="panel_add_event_place">
        <br>
        <br>
        <br>
        <br>
        <textarea class="input-lg panel_add_event_input col-xs-6" placeholder="content ..." id="panel_add_event_content"></textarea>
        <input type="file"  class="input-lg panel_add_event_input  col-xs-offset-1 " id="panel_add_event_image_url">
        <button class=" btn-lg btn-primary col-xs-offset-2 " id="add_event"> Add Event <i class="fa fa-plus-circle"
                                                                                         aria-hidden="true"></i>
        </button>
        <br>
        <br>
        <br>
        <br>


        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Event Title</th>
            </tr>
            </thead>
            <tbody id="eventTable">


            </tbody>
        </table>












        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="event_edit_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
                    </div>
                    <div class="modal-body">
                        <br>
                        <input class="input-lg panel_add_event_input col-xs-12" placeholder="Event Title" id="panel_edit_event_title">
                        <input type="date" class="input-lg panel_add_event_input col-xs-12 " id="panel_edit_event_date">
                        <input type="text" class="input-lg panel_add_event_input col-xs-12" placeholder="Place" id="panel_edit_event_place">
                        <br>
                        <br>
                        <br>
                        <br>
                        <textarea class="input-lg panel_edit_event_input col-xs-12" placeholder="content ..." id="panel_edit_event_content"></textarea>
                        <input type="file"  class="input-lg panel_edit_event_input  " id="panel_add_event_image_url">
                    </div>
                    <div class="modal-footer" id="edit_event_submit">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>










<?php


    }else if ($_GET['action']=='student'){ ?>
        <div class="tabbable"> <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
        <?php
        //TODO get levels name and id
        include '../classes/level_class.php';
        $level_class = new level_class();
        $levels=$level_class->get_all_levels();
        foreach ($levels as $level){
            ?>
                <li class="getstudentfromlevel"  id="<?php echo "AB".$level['id']?>"><a href="#tab<?php echo $level['id']?>" data-toggle="tab">Level <?php echo $level['name']?></a></li>
            <?php }?>
            </ul>

            <div class="tab-content">
                <?php foreach ($levels as $level){?>
                    <div class="tab-pane" id="tab<?php echo $level['id']?>">
                        <div class="tabbable"> <!-- Only required for left/right tabs -->
                            <ul class="nav nav-tabs">
                                <?php
                                    //TODO get classes name and id of level $level['levelid']
                                       $classes=$level_class->get_level_classes_by_level_id($level['id']);
                                        foreach ($classes as $class){
                                    ?>
                                    <li class="getstudent" id="<?php echo"A".$class['class_id']?>"><a href="#<?php echo $class['class_id']?>" data-toggle="tab"><?php echo"class"?></a></li>
                                <?php }?>
                            </ul>
                            <div class="tab-content">
                                <?php
                                foreach ($classes as $class){// the classes number in the choosen level
                                    ?>
                                    <div class="tab-pane" id="<?php echo $class['class_id']?>">
                                        <div class="uk-width-4-5@m" style="margin: auto">
                                            <table class="uk-table uk-table-hover">
                                                <thead>
                                                <tr >
                                                    <th >Pictur</th>
                                                    <th >Name</th>
                                                    <th >ID</th>
                                                    <th >Edit</th>
                                                    <th >Delet</th>
                                                </tr>
                                                </thead>
                                                <tbody id="<?php echo'StudentsList'.$class['class_id'];?>">



                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>

        <?php
    } else if ($_GET['action']=='teacher') {?>
        <div class="uk-width-4-5@m" style="margin: auto">
            <table class="uk-table uk-table-hover">
                <thead>
                <tr >
                    <th >Pictur</th>
                    <th >Name</th>
                    <th >ID</th>
                    <th >Edit</th>
                    <th >Delet</th>
                </tr>
                </thead>
                <tbody id="teachers">

                </tbody>
            </table>
        </div>

    <?php
    }else if ($_GET['action']=='survey')
        echo '<h1>survey</h1>';

    else if ($_GET['action']=='complain')
        echo '<h1>cpmplain</h1>';
    else if ($_GET['action']=='event'){
        ?>

<?php }
else if ($_GET['action']=='add_tech') {
    ?>

        <div class="add_teach">
        <form class="form-group" method="post" id="panel_add_tech">

             <label for="firstName" class="col-xs-12"style="color: #0e6dcd;font-size:17px;">FirstName <small class="glyphicon glyphicon-asterisk" style="color: #de0000"></small></label>
             <input type="text" name="first_name" class="col-xs-12"autocomplete="off" style="margin-left: 8px;"required>
            <label for="MidName" class="col-xs-12"style="color: #de0000;font-size:17px;margin-top: 2%">MidName <small class="glyphicon glyphicon-asterisk"style="color: #de0000;margin-left:1.2% "></small> </label>
            <input type="text" name="mid_name" class="col-xs-12"autocomplete="off" style="margin-left: 8px;"required>

            <label for="lastName" class="col-xs-12" style="color:#9bcc2e;font-size:17px;margin-top: 2%">LastName <small class="glyphicon glyphicon-asterisk"style="color: #de0000;"></small></label>
            <input type="text" name="last_name" class="col-xs-12"autocomplete="off"style="margin-left: 8px;"required>

            <label for="gender"class="col-xs-12"style="color: #0e6dcd;font-size:19px;margin-top: 2%"> <small class="glyphicon glyphicon-user"style="color: black"></small> Gender</label>
            <input type="radio" name="gender" value="male" style="margin-left: 12px;"> <span style="color: #de0000;font-size:17px;font-weight: bold;margin-left:1.5% "> Male </span> <br>
            <input type="radio" name="gender" value="female"style="margin-left: 12px;margin-bottom: 5%"><span style="color: #0e6dcd;font-size:17px;font-weight: bold;margin-left:1.5%"> Female </span><br>


            <label for="subject" class="col-xs-12"style="color:#9bcc2e;font-size:17px;font-weight: bold">Subject</label>


            <select class="col-xs-3"name="subject"style="margin-top:1.5%;margin-left:1.6%;" id="add_tech_sub">

            </select>
            <button class="uk-button uk-button-primary " type="submit"style="margin-top: 8%;margin-left: 4%;float: right">Confirm</button>
            <button class="uk-button uk-button-default " type="reset"style="margin-top: 8%;margin-left: 4%;float: right;">Cancel</button>


        </form>
        </div>



        <?php }
        else if($_GET['action']=='add_stud'){
    ?>
          <!-- add student -->
            <div class="add_stud">
                <form class="form-group" method="post"id="panel_add_stud">

                    <label for="firstName" class="col-xs-12"style="color: #0e6dcd;font-size:17px;">FirstName <small class="glyphicon glyphicon-asterisk" style="color: #de0000"></small></label>
                    <input  type="text" name="first_name" class="col-xs-12"autocomplete="off" style="margin-left: 8px;"required>
                    <label for="MidName" class="col-xs-12"style="color: #de0000;font-size:17px;margin-top: 2%">MidName <small class="glyphicon glyphicon-asterisk"style="color: #de0000;margin-left:1.2% "></small> </label>
                    <input type="text" name="mid_name" class="col-xs-12"autocomplete="off" style="margin-left: 8px;"required>

                    <label for="lastName" class="col-xs-12" style="color:#9bcc2e;font-size:17px;margin-top: 2%">LastName <small class="glyphicon glyphicon-asterisk"style="color: #de0000;"></small></label>
                    <input type="text" name="last_name" class="col-xs-12"autocomplete="off"style="margin-left: 8px;"required>

                    <label for="gender"class="col-xs-12"style="color: #0e6dcd;font-size:19px;margin-top: 2%"> <small class="glyphicon glyphicon-user"style="color: black"></small> Gender</label>
                    <input type="radio" name="gender" value="1" style="margin-left: 12px;"> <span style="color: #de0000;font-size:17px;font-weight: bold;margin-left:1.5% "> Male </span> <br>
                    <input type="radio" name="gender" value="0"style="margin-left: 12px;margin-bottom: 5%"><span style="color: #0e6dcd;font-size:17px;font-weight: bold;margin-left:1.5%"> Female </span><br>


                    <label for="class" class="col-xs-5"style="color:#0e6dcd;font-size:17px;font-weight: bold">Level</label>
                    <label for="class" class="col-xs-5"style="color:#de0000;font-size:17px;margin-left: 13%;font-weight: bold">Class</label>
                    <select class="col-xs-5" name="level_id"  style="margin-left: 3%;margin-top:1.5%">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>

                    </select>


                    <select class="col-xs-5"name="class_id" style="margin-left: 10%;margin-top:1.5%">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>

                    </select>
                    <button class="uk-button uk-button-primary " type="submit"style="margin-top: 8%;margin-left: 4%;float: right">Confirm</button>
                    <button class="uk-button uk-button-default " type="reset"style="margin-top: 8%;margin-left: 4%;float: right;">Cancel</button>


                </form>
            </div>











        <?php }
        else if($_GET['action']=='level') { ?>
            <br>
            <br>
            <input class="input-lg panel_add_level_input col-xs-6" placeholder="Level Name" id="panel_add_level_input">
            <button class=" btn-lg btn-primary col-xs-offset-2" id="add_level"> Add Level <i class="fa fa-plus-circle"
                                                                                             aria-hidden="true"></i>
            </button>
            <br>
            <br>

            <div class="col-xs-6 col-xs-offset-2 level_info" id="level_info">

                <!--    get values form ajax-->

            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Level Name</th>
                    <th>Level ID</th>
                </tr>
                </thead>
                <tbody id="levelTable">


                </tbody>
            </table>









            <!-- Edit Level  Modal -->
            <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close close_level_edit" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">j</h4>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="level_new_name" disabled class="col-xs-6 ">
                            <button class="col-xs-3 col-xs-offset-1  btn-primary" id="level_new_name_toogle">Edit</button>
                            <br>
                            <br>
                            <br>
                            <br>
                            <label>Subjects : </label>

                            <select multiple id="edit_level_multilist" >

                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default close_level_edit" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="update_level">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>









            <?php
        }
        else if ($_GET['action']=='class') {

        ?>
            <!--
        <br>
        <br>
        <input class="input-lg panel_add_class_input col-xs-2" style="margin-right: 15px" placeholder="Class - Name" id="panel_add_class_input">
        <input class="input-lg panel_add_max_number_input col-xs-2" style="margin-right: 15px" placeholder="Max -  Number" id="panel_add_max_number_input">
         <input class="input-lg panel_add_level_number_input col-xs-2" placeholder="Level - Name" id="panel_add_leve_number_input">

        <button class=" btn-lg btn-primary col-xs-offset-2" id="add_class"> Add Class <i class="fa fa-plus-circle" aria-hidden="true"></i> </button>
        <br>
        <br>

        <div class="col-xs-6 col-xs-offset-2 class_info" id="class_info" >

            <!--    get values form ajax-

        </div>
        <table class="table" style="text-align: center">
            <thead>
            <tr>
                <th>#</th>
                <th>Class - Name</th>
                <th>Max - Student</th>
                <th>Student - Number</th>
                <th>Level ID</th>
            </tr>
            </thead>
            <tbody id="classTable" >


            </tbody>
        </table>

-->

<div id="panel_class_levels_tabs">

</div>
            <br>
            <br>



            <input class="input-lg panel_add_class_input col-xs-2" style="margin-right: 15px" placeholder="Class - Name" id="panel_add_class_input">
            <input class="input-lg panel_add_max_number_input col-xs-2" style="margin-right: 15px" placeholder="Max -  Number" id="panel_add_max_number_input">

            <div id="panel_classTable" ></div>
















            <div class="modal fade" id="class_edit_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Class</h4>
                        </div>
                        <div class="modal-body">
                                <input type="text " class="input-lg col-xs-12" placeholder="Class - Name ">
                            <br>
                            <br>
                            <br>
                            <input type="text " class="input-lg col-xs-12" placeholder="Max - Number">
                            <br>
                            <br>
                            <br>
                        <div class="modal-footer" id="edit_class_submit">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>







        <?php
        }?>






    </div>







</div>



</div>
<!-- continer ended-->





<!--        left nav-->

        <button class="uk-button uk-button-default uk-margin-small-right push-left-nav" type="button" uk-toggle="target: #offcanvas-push"><i class="fa fa-angle-double-right" aria-hidden="true"></i></button>

        <div id="offcanvas-push" uk-offcanvas="mode: push; overlay: true">
            <div class="uk-offcanvas-bar uk-flex uk-flex-column">

                <button class="uk-offcanvas-close" type="button" uk-close></button>

<div  class="uk-width-1-2@s uk-margin-auto uk-nav-center uk-margin-auto-vertical">
                    <ul class="uk-nav-primary" uk-nav>


                        <li class="left-nav-link uk-parent col-xs-12"><a href="<?php echo $_SERVER['PHP_SELF'].'?action=members';?>"><i class="fa fa-users <?php activ('members');?>" aria-hidden="true"></i> Members</a>
    <ul class="uk-nav-sub">

        <li><a  href="<?php echo $_SERVER['PHP_SELF'].'?action=student';?>">Student</a></li>
        <li id="showteasher"><a  href="<?php echo $_SERVER['PHP_SELF'].'?action=teacher';?>" >Teacher</a></li>
                     </ul></li>


                        <li class="left-nav-link "><a href="<?php echo $_SERVER['PHP_SELF'].'?action=event';?>"><i class="fa fa-calendar <?php activ('event');?>" aria-hidden="true"></i>Event</a></li>
                        <li class="left-nav-link "><a href="<?php echo $_SERVER['PHP_SELF'].'?action=survey';?>"><i class="fa fa-tasks  <?php activ('survey');?>" aria-hidden="true"></i>Survey</a></li>
                        <li class="left-nav-link "><a href="<?php echo $_SERVER['PHP_SELF'].'?action=complain';?>"><i class="fa fa-frown-o <?php activ('complain');?> " aria-hidden="true"></i>Complain</a></li>


                        <li class="left-nav-link col-xs-12"><a href="<?php echo $_SERVER['PHP_SELF'].'?action=level';?>">Levels</a></li>
                        <li class="left-nav-link col-xs-12"><a href="<?php echo $_SERVER['PHP_SELF'].'?action=class';?>">Classes</a></li>
                    </ul>
                   </div>
                </div>
            </div>
        </div>
<?php
include_once 'static/footer.php';

