<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 26/04/17
 * Time: 10:56 م
 */


function activ($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);
    $url=explode('=',$url);
    $url=explode('&',$url[1]);
    $url=array_shift($url);
    if($currect_page == $url){
        echo 'active-navbar'; //class name in css
    }
}



include_once 'static/header.php';
include_once 'navbar.php';
if(!isset($_GET['action']))
    $_GET['action']='members';

?>

<div class="panel-body">



    <!-- This is an anchor toggling the off-canvas sidebar -->
    <a href="#my-id" data-uk-offcanvas>...</a>

    <!-- This is a button toggling the off-canvas sidebar -->
    <button class="uk-button" data-uk-offcanvas="{target:'#my-id'}">...</button>

    <!-- This is the off-canvas sidebar -->
    <div id="my-id" class="uk-offcanvas">
        <div class="uk-offcanvas-bar">...</div>
    </div>

    <!--start left  nav-->

    <div class="left-nav col-lg-3 ">



        <div class="member-nav col-xs-12 "><i class="fa fa-users <?php activ('members');?>" aria-hidden="true"></i><a href="<?php echo $_SERVER['PHP_SELF'].'?action=members';?>">Members</a></div>


       <div class="event-nav col-xs-12 "><i class="fa fa-calendar <?php activ('event');?>" aria-hidden="true"></i><a href="<?php echo $_SERVER['PHP_SELF'].'?action=event';?>">Event</a></div>


        <div class="survay-nav col-xs-12"><i class="fa fa-tasks  <?php activ('survey');?>" aria-hidden="true"></i><a href="<?php echo $_SERVER['PHP_SELF'].'?action=survey';?>">Survey</a></div>


        <div class="complain-nav col-xs-12 "><i class="fa fa-frown-o <?php activ('complain');?> " aria-hidden="true"></i><a href="<?php echo $_SERVER['PHP_SELF'].'?action=complain';?>">Complain</a></div>


    </div>

<!--end left nav -->




    <div class="component col-lg-9" >


    <?php
    if($_GET['action']=='members'){


        ?>

        <div class="stu-box col-lg-4"></div>


        <?php






    }

    else if ($_GET['action']=='event')
        echo '<h1>event</h1>';

    else if ($_GET['action']=='survey')
        echo '<h1>survey</h1>';

    else if ($_GET['action']=='complain')
        echo '<h1>cpmplain</h1>';
    else
        echo 'fuck you ';

    ?>


    </div>







</div>


<?php
include_once 'static/footer.php';