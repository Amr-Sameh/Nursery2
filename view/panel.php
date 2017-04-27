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
    <div class="uk-offcanvas-content" id="page" style="min-height: 100vh">
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




<a   href="class.php">jfhslfkdlkjf</a>


</div>

        <button class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #offcanvas-push">Push</button>

        <div id="offcanvas-push" uk-offcanvas="mode: push; overlay: true">
            <div class="uk-offcanvas-bar uk-flex uk-flex-column">

                <button class="uk-offcanvas-close" type="button" uk-close></button>
                <div class="uk-width-1-2@s uk-margin-auto uk-nav-center uk-margin-auto-vertical" >
                    <ul class="uk-nav-primary uk-nav-parent-icon " uk-nav>
                        <li class="uk-active"><a href="#">Active</a></li>
                        <li class="uk-parent">
                            <a href="#">Parent</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>
                        <li class="uk-parent">
                            <a href="#">Parent</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>
                        <li><a href="class.php">Item</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php
include_once 'static/footer.php';