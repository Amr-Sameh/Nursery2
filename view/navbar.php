<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 13/04/17
 * Time: 11:36 م
 */


function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);
    $url=explode('?',$url);
    $url=array_shift($url);
    if($currect_page == $url){
        echo 'active-navbar'; //class name in css
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
                if($id!='') {

                    echo ' <li class="dropdown nav-switch">
          <a href="" class="dropdown-toggle hvr-sweep-to-right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Amr Sameh <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a class="hvr-sweep-to-right" href="#"><i class="fa fa-user" aria-hidden="true"></i>
Profile</a></li>
            <li><a class="hvr-sweep-to-right" href="#"><i class="fa fa-cogs" aria-hidden="true"></i>
Settings</a></li>
            <li role="separator" class="divider"></li>
            <li><a  class="hvr-sweep-to-right" href="#"><i class="fa fa-lock" aria-hidden="true"></i>  Logout </a></li>
          </ul>
        </li>';
                }

                else {

                    echo '<li ><button class="login-link nav-switch" > Login</button ></li >';
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

