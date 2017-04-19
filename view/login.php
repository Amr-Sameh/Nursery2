<?php
/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 3/9/2017
 * Time: 3:03 PM
 */
/**
 * @TODO "USe AjAx to POST"
 */

include_once 'static/db_connect.php' ;

if($_SERVER['REQUEST_METHOD']=='POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];

   $sql_stat=$con->prepare("SELECT username , pass FROM user  WHERE username='$username' AND pass='$password'");
   $sql_stat->execute();
   $count =$sql_stat->rowCount();
   if($count==1){
       echo 'welcome ';
      header('location: '.$_SERVER['HTTP_REFERER']);
   }
   else{
       echo 'hramy';
   }
}
include_once 'static/header.php';

?>



<div class="layer"></div>

<div class=" login col-sm-3 col-sm-offset-4 text-center col-xs-12">
<form method="POST" class="logform form-group input-lg " >
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


    <input type="submit" value="login" class="btn-primary btn-login col-sm-6 col-sm-offset-3  col-xs-8 col-xs-offset-2">
</form>
</div>


<?php
include 'static/footer.php';
?>

