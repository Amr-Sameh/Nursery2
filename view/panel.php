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
if(!isset($_GET['action']))
    $_GET['action']='members';

?>
<!--this div to push the page to right-->
    <div class="uk-offcanvas-content" id="panel-page" >


<div class="panel-body">






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






    }

    else if ($_GET['action']=='event')
        echo '<h1>event</h1>';

    else if ($_GET['action']=='survey')
        echo '<h1>survey</h1>';

    else if ($_GET['action']=='complain')
        echo '<h1>cpmplain</h1>';
    else

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



                    <ul class="uk-nav-primary uk-nav-parent-icon col-xs-12" uk-nav>




                        <li class="left-nav-link uk-active col-xs-12"><a href="<?php echo $_SERVER['PHP_SELF'].'?action=members';?>"><i class="fa fa-users <?php activ('members');?>" aria-hidden="true"></i> Members</a></li>
                        <li class="left-nav-link uk-active col-xs-12"><a href="<?php echo $_SERVER['PHP_SELF'].'?action=members&flag=student';?>">Students</a></li>
                        <li class="left-nav-link uk-active col-xs-12"><a href="<?php echo $_SERVER['PHP_SELF'].'?action=members&flag=teacher';?>">Teacher</a></li>






                        <li class="left-nav-link uk-active"><a href="<?php echo $_SERVER['PHP_SELF'].'?action=event';?>"><i class="fa fa-calendar <?php activ('event');?>" aria-hidden="true"></i>Event</a></li>
                        <li class="left-nav-link uk-active"><a href="<?php echo $_SERVER['PHP_SELF'].'?action=survey';?>"><i class="fa fa-tasks  <?php activ('survey');?>" aria-hidden="true"></i>Survey</a></li>
                        <li class="left-nav-link uk-active"><a href="<?php echo $_SERVER['PHP_SELF'].'?action=complain';?>"><i class="fa fa-frown-o <?php activ('complain');?> " aria-hidden="true"></i>Complain</a></li>



                        <li class="left-nav-link uk-active col-xs-12"><a href="<?php echo $_SERVER['PHP_SELF'].'?action=level';?>">Levels</a></li>
                        <li class="left-nav-link uk-active col-xs-12"><a href="<?php echo $_SERVER['PHP_SELF'].'?action=class';?>">Classes</a></li>






                    </ul>






                </div>
                <!-->
            </div>
        </div>
    </div>

<?php
include_once 'static/footer.php';