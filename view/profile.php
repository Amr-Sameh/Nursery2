<?php
/**
 * Created by PhpStorm.
 * User: fatma
 * Date: 5/6/2017
 * Time: 6:53 PM
 */
include_once 'static/header.php';
include_once 'navbar.php';
include_once '../classes/user.php';
$id=$_SESSION['user_id'];
$user=new user();
$data=$user->get_user_profile($id);
// check if method post request
$username='';
$password='';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['submit_edit'])){
    $username =$_POST['user'];
    $password =$_POST['pass'];
        $user->edit_user_profile( $id,$username,$password);

    }

    if(isset($_POST['submit_comp'])) {
        $complain = $_POST['comp'];
        include_once '../classes/complain.php';
        $comp=new complain();
        $comp->in($id,$complain);
    }
}








?>

    <div class="back" >
        <div class="profile col-xs-offset-2 col-xs-8">
            <div class="pro_pic col-xs-12 col-xs-offset-4">
                <img src="images/child-only.png"  class="img-responsive">
            </div>
            <div class="data col-xs-8 col-xs-offset-2" >
                <input class="col-xs-12 wow bounceInLeft" type="text"  value="NAME :<?php echo $data['first_name'],' ',$data['mid_name'],' ',$data['last_name'] ?> "  disabled>
                <input class="col-xs-12 wow bounceInRight" type="email" value="EMAIL : <?php echo $data['email'] ?>" disabled>
                <input class="col-xs-12 wow bounceInLeft" type="text" value="ADDRESS : <?php echo $data['city'],$data['country'],$data['street'] ?>" disabled>
                <button class="col-xs-4 col-xs-offset-2 wow bounceInLeft" id="edit" data-toggle="modal" data-target="#profile_edit_model"> edit data</button>
                <button type="button" class="  col-xs-4 wow bounceInRight"" data-toggle="modal" data-target="#profile_complain_model">
                complain
                </button>
            </div>
        </div>
    </div>

    <!-- edit Modal -->
    <div class="modal fade" id="profile_edit_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">edit data</h4>
                </div>
                <div class="modal-body">
                    <form action=" <?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <input class="form-control col-xs-12" type="text"  name="user" placeholder="user name"   onautocomplete="0" >
                        <input class="form-control col-xs-12" type="password" name="pass" placeholder="password" onautocomplete="0">
                        <input type="submit" value="edit" class="btn btn-primary" name="submit_edit">
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <!--complain Modal -->
    <div class="modal fade" id="profile_complain_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    <h4 class="modal-title" id="myModalLabel">complain</h4>
                </div>
                <div class="modal-body">
                    <form action=" <?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <textarea class="col-xs-9" name="comp" placeholder="right your complain here please"></textarea>
                        <input type="submit" value="send" class="btn btn-primary" name="submit_comp">
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
<?php



include_once 'static/footer.php';