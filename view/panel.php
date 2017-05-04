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
                        <img src="images/stu-panel.jpg"class="img-responsive stu-panel-pic col-xs-12">

                    </div>
            </a>


        <div class="teacher-box col-lg-6"></div>
        <?php


    } else if ($_GET['action']=='event') {
        echo "ldkasdklasl";
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


    else if($_GET['action']=='addTech'){ ?>
        <div class="container">
    <form action="" method="post">
        <label for="name" class="col-xs-4">FirstName</label>
        <label for="name" class="col-xs-4">MidName</label>
        <label for="name" class="col-xs-4">LastName</label>
        <input type="text" class="col-xs-4"name="FirstName">
        <input type="text" class="col-xs-4"name="MidName">
        <input type="text" class="col-xs-4"name="LastName">

        <label for="county" class="col-xs-4">Country</label>
        <label for="county" class="col-xs-4">City</label>
        <label for="county" class="col-xs-4">Street</label>
        <input type="text" class="col-xs-4"name="Countr">
        <input type="text" class="col-xs-4"name="City">
        <input type="text" class="col-xs-4"name="Street">


        <label for="level" class="col-xs-4">level</label>
        <label for="class" class="col-xs-4">class</label>
        <label for="subjects"class="col-xs-4">Subjects</label>
        <select class="from-control col-xs-4">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <select class="from-control col-xs-4">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <select class="from-control col-xs-4">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
    </form>

</div>





    <?php }
    else if ($_GET['action']=='event'){
        ?>














<?php }
else if ($_GET['action']=='level') {
    ?>
<br>
<br>
<input class="input-lg panel_add_level_input col-xs-6" placeholder="Level Name" id="panel_add_level_input">
    <button class=" btn-lg btn-primary col-xs-offset-2" id="add_level"> Add Level <i class="fa fa-plus-circle" aria-hidden="true"></i> </button>
<br>
    <br>

<div class="col-xs-6 col-xs-offset-2 level_info" id="level_info" >

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









    <?php
}
    ?>








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
        <li><a  href="<?php echo $_SERVER['PHP_SELF'].'?action=teacher';?>" id="showteasher">Teacher</a></li>
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

