<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 13/04/17
 * Time: 11:36 م
 */

session_start();
function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);
    $url=explode('?',$url);
    $url=array_shift($url);
    if($currect_page == $url){
        echo 'active-navbar'; //class name in css
    }
}

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(isset($_POST['action'])&&$_POST['action']=='login'){
        include_once '../classes/user.php';
        $user =new user();
       $result = $user->login($_POST['username'],$_POST['password']);

       echo $result;
        exit();
    }
if(isset($_POST['action'])&&$_POST['action']=='logout'){
    include_once '../classes/user.php';
    $user =new user();
   $user->logout();

    echo 'true';
    exit();
}
}

?>

<nav class="navbar navbar-default  ">

    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo 'homee.php';?>"><img class="img-responsive logo" src="images/logo2.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <!-- nav-switch class is to nav-switch between search and deafult nav -->
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-switch <?php active('homee.php'); ?>"><a class="hvr-sweep-to-right " href="<?php echo 'homee.php';?>">Home</a></li>
                <li class="nav-switch"><a class="hvr-sweep-to-right" href="">About us</a></li>
                <li class="nav-switch <?php active('event.php'); ?>"><a class="hvr-sweep-to-right" href="event.php">Events</a></li>
                <li class="nav-switch"><a class="hvr-sweep-to-right" href="#">Gallary</a></li>



                <?php
                /*
                 * check if log in show user bord
                 */
                if(isset($_SESSION['user_id'])&&$_SESSION['user_id']!=null&&$_SESSION['user_id']!='') {

                    echo ' <li class="dropdown nav-switch">
          <a href="" class="dropdown-toggle hvr-sweep-to-right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION['first_name'].'<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a class="hvr-sweep-to-right" href="#'.$_SESSION['user_id'].'"><i class="fa fa-user" aria-hidden="true"></i>
Profile</a></li>
            <li><a class="hvr-sweep-to-right" href="#"><i class="fa fa-cogs" aria-hidden="true"></i>
Settings</a></li>
            <li role="separator" class="divider"></li>
            <li><a id="logout" class="hvr-sweep-to-right" href="#"><i class="fa fa-lock" aria-hidden="true"></i>  Logout </a></li>
          </ul>
        </li>';
                }

                else {

                    echo '<li ><button class="login-link nav-switch" id="login-btn"> Login</button ></li >';
                }
                ?>


                <form class="navbar-form navbar-left ">
                    <div class="form-group">
                        <input type="text" class="form-control search-box " placeholder="Search" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>

                <li> <button  class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></button></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="start"></div>
<!--    login part -->



<div class="layer"></div>

<div class=" login col-sm-4 col-sm-offset-4 text-center col-xs-12 ">
    <form method="POST" class="logform form-group input-lg " id="login-form">
        <img src="images/aTe64exyc.gif" class="img-responsive  log-img center-block">
        <span class="user-log">
    <input type="text" class="username  " name="username" id="username" placeholder="username" autocomplete="off" required >
    </span>
        <br>

        <span class="user-log">
    <input type="password" class="password " name="password" id="password" placeholder="password" autocomplete="new-password" required>
    </span>
        <br>
        <input type="checkbox" class="remember" name="remember" id="remember">
        <hr>


        <input type="submit" id="login-submit" value="login" class="btn-primary btn-login col-sm-6 col-sm-offset-3  col-xs-8 col-xs-offset-2">
    </form>
</div>


<!-- end login-->

