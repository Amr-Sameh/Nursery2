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
        <?php $v=50;$z=50;$y=0;$u=0; for ($x=0;$x<2;$x++){?>
                <li><a href="#tab<?php $y=$y+1; echo $y;?>" data-toggle="tab">Level <?php echo $x+1?></a></li>
            <?php }?>
            </ul>

            <div class="tab-content">
                <?php for ($x=0;$x<2;$x++){?>
                    <div class="tab-pane" id="tab<?php $u=$u+1; echo $u;?>">
                        <div class="tabbable"> <!-- Only required for left/right tabs -->
                            <ul class="nav nav-tabs">
                                <?php for ($f=0;$f<2;$f++){?>
                                    <li><a href="#<?php $v=$v+1; echo $v.$f;?>" data-toggle="tab">Class <?php echo $f+1?></a></li>
                                <?php }?>
                            </ul>
                            <div class="tab-content">
                                <?php for ($f=0;$f<2;$f++){?>
                                    <div class="tab-pane" id="<?php $z=$z+1; echo $z.$f;?>">
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
                                                <tbody>
                                                <?php
                                                for($k=0;$k<15;$k++){
                                                    ?>
                                                    <tr uk-toggle="target: #<?php echo $k?>; animation:  uk-animation-slide-left, uk-animation-slide-bottom">
                                                        <td><div class=" uk-border-circle" style="width: 50px;height: 50px;overflow: hidden;padding: 0; ">
                                                                <img class="" width="100%" height="100%" src="images/child-only.png">
                                                            </div></td>
                                                        <td >
                                                            <a class="uk-link-reset"  >Mostafa saleh sopih mohamed</a>
                                                        </td>
                                                        <td>235664</td>
                                                        <td><button class="uk-button uk-button-default" type="button">edit</button></td>
                                                        <td><button class="uk-button uk-button-default" type="button">delete</button></td>
                                                    </tr>
                                                    <tr id="<?php echo $k?>" class="uk-card uk-card-default uk-card-body uk-margin-small" hidden="hidden" aria-hidden="true">
                                                        <td ><div >aslkadsdjkalsdlkajskdljaskdjksajd dfklsdjfds fsdklfjsdkf dfkljsdlf dikfljsdkf diokfljsdkkf dklsfjsdlkfdkls;ad</div></td>
                                                        <td ><div >aslkadsdjkalsdlkajskdljaskdjksajd dfklsdjfds fsdklfjsdkf dfkljsdlf dikfljsdkf diokfljsdkkf dklsfjsdlkfdkls;ad</div></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                <?php } ?>
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
                <tbody>
                <?php
                for($k=0;$k<15;$k++){
                    ?>
                    <tr uk-toggle="target: #<?php echo $k?>; animation:  uk-animation-slide-left, uk-animation-slide-bottom">
                        <td><div class=" uk-border-circle" style="width: 50px;height: 50px;overflow: hidden;padding: 0; ">
                                <img class="" width="100%" height="100%" src="images/child-only.png">
                            </div></td>
                        <td >
                            <a class="uk-link-reset"  >Mostafa saleh sopih mohamed</a>
                        </td>
                        <td>235664</td>
                        <td><button class="uk-button uk-button-primary" type="button">edit</button></td>
                        <td><button class="uk-button uk-button-danger" type="button">delete</button></td>
                    </tr>
                    <tr id="<?php echo $k?>" class="uk-card uk-card-default uk-card-body uk-margin-small" hidden="hidden" aria-hidden="true">
                        <td ><div >aslkadsdjkalsdlkajskdljaskdjksajd dfklsdjfds fsdklfjsdkf dfkljsdlf dikfljsdkf diokfljsdkkf dklsfjsdlkfdkls;ad</div></td>
                        <td ><div >aslkadsdjkalsdlkajskdljaskdjksajd dfklsdjfds fsdklfjsdkf dfkljsdlf dikfljsdkf diokfljsdkkf dklsfjsdlkfdkls;ad</div></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    <?php
    }else if ($_GET['action']=='survey')
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

<div  class="uk-width-1-2@s uk-margin-auto uk-nav-center uk-margin-auto-vertical">
                    <ul class="uk-nav-primary" uk-nav>


                        <li class="left-nav-link uk-parent col-xs-12"><a href="<?php echo $_SERVER['PHP_SELF'].'?action=members';?>"><i class="fa fa-users <?php activ('members');?>" aria-hidden="true"></i> Members</a>
    <ul class="uk-nav-sub">

        <li><a  href="<?php echo $_SERVER['PHP_SELF'].'?action=student';?>">Student</a></li>
        <li><a  href="<?php echo $_SERVER['PHP_SELF'].'?action=teacher';?>">Teacher</a></li>
                            </ul></li>


                        <li class="left-nav-link "><a href="<?php echo $_SERVER['PHP_SELF'].'?action=event';?>"><i class="fa fa-calendar <?php activ('event');?>" aria-hidden="true"></i>Event</a></li>
                        <li class="left-nav-link "><a href="<?php echo $_SERVER['PHP_SELF'].'?action=survey';?>"><i class="fa fa-tasks  <?php activ('survey');?>" aria-hidden="true"></i>Survey</a></li>
                        <li class="left-nav-link "><a href="<?php echo $_SERVER['PHP_SELF'].'?action=complain';?>"><i class="fa fa-frown-o <?php activ('complain');?> " aria-hidden="true"></i>Complain</a></li>


                        <li class="left-nav-link col-xs-12"><a href="<?php echo $_SERVER['PHP_SELF'].'?action=level';?>">Levels</a></li>
                        <li class="left-nav-link col-xs-12"><a href="<?php echo $_SERVER['PHP_SELF'].'?action=class';?>">Classes</a></li>


                    </ul>


    </div>



                </div>
                <!-->
            </div>
        </div>


<?php
include_once 'static/footer.php';