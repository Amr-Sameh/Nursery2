<?php
//TODO but class id in $classid
//and user id in $user id
//and gropid in $gropid
include_once "../classes/hw_answer.php";
$answer=new hw_answer();
session_start();
if(!isset($_GET['class'])){
    header('location:homee.php');
}else {
    if(!isset($_SESSION['user_type'])&&!isset($_SESSION['user_id']))
        header('location:homee.php');

    include_once '../classes/student.php';
    $stu=new student();
    $classid = $_GET['class'];
    $userid = $_SESSION['user_id'];
    $gropid = $_SESSION['user_type'];
    $stu_id=$stu->get_stu_id_by_user_id($userid);
}
include_once "../classes/classs.php";
$class=new classs();
$posts=$class->getpostsofclass($classid);
if(isset($_POST["posttext"])){
    $class->addpost( $userid,2,$_POST["posttext"]);
}
if(isset($_POST["commenttext"])){
    $class->addcomment( $userid,$_POST["id"],$_POST["commenttext"]);
}
if(isset($_POST["removepost"])){
    $class->removepst($_POST['removepost']);
}
if(isset($_POST["newpost"])){
    $class->editpost($_POST['newpost'],$_POST['postid']);
}
if(isset($_POST["removecommentid"])){
    $class->removecoment($_POST['removecommentid']);
}
if(isset($_POST["newcomment"])){
    $class->editcomment($_POST['newcomment'],$_POST['commentid']);
}
if(isset($_POST["reportpostid"])){
    $class->reportpost($_POST['reportpostid']);
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="css/uikit-rtl.min.css">
    <link rel="stylesheet" type="text/css" href="css/uikit.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/class.css">
</head>
<body style="min-height: 100vh" >
<div class="uk-offcanvas-content" id="page" style="min-height: 100vh;overflow: hidden">
    <span id="hh"></span>
    <ul id="classAtrbiut" class="uk-switcher"style="min-height: 100vh">
        <div class="uk-container-expand post ">
            <div class="container">
                <li class="hlhl" >
                    <div class="note"  id="<?php echo $userid;?>"></div>
                    <div class="uk-card uk-carde uk-card-default uk-width-2-3@m uk-visible-toggle" >
                        <div class="uk-card-header" style="background-color:  #f8f8f8">
                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                <div class="uk-width-expand">
                                    <h2>Post</h2>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0;">
                            <textarea class="newPost" id="klpa" placeholder="Write some thing ..."></textarea>
                        </div>
                        <div class="uk-card-footer" style="background-color:  #f8f8f8">
                            <a   class="uk-button uk-button-text" id="addnewpost" style="float: right">Post</a>
                        </div>
                    </div>
                    <?php
                    foreach ($posts as $post){
                        $postuser=$class->getuser($post['user_id']);?>


                        <div class="uk-card uk-carde uk-card-default uk-width-2-3@m uk-visible-toggle"
                             id="<?php echo $post["post_id"]; ?>">
                            <div class="uk-card-header">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-auto uk-border-circle"
                                         style="width: 50px;height: 50px;overflow: hidden;padding: 0;margin-right: 5px ">
                                        <img class="" width="100%" height="100%" src="images/child-only.png">
                                    </div>
                                    <div class="uk-width-expand">
                                        <h3 class="uk-card-title uk-margin-remove-bottom"><?php echo $postuser['username']?></h3>
                                        <p class="uk-text-meta uk-margin-remove-top">
                                            <time datetime="2016-04-01T19:00"><?php echo $class->calculattime(strtotime($post["post_date"])) ?></time>
                                        </p>
                                    </div>
                                </div>
                                <div class="uk-width-auto" style="float: right;">
                                    <ul class="uk-invisible-hover uk-iconnav">
                                        <?php if ($userid == $post['user_id']||$gropid==1) {
                                            ?>
                                            <li><a uk-icon="icon: pencil" href="#modal-sections" class="editpost" uk-toggle id="<?php echo 'y'.$post['post_id']?>"></a>
                                            </li>
                                            <li><a uk-icon="icon: trash" class="removepost" href="#remove" id="<?php echo 'g'.$post['post_id']?>" uk-toggle></a></li>
                                            <?php
                                        }else { ?>
                                            <li><a uk-icon="icon: warning" class="reportpost" id="<?php echo 'x'.$post['post_id']?>"></a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="uk-card-body">
                                <span class="wordwrap " id="<?php echo"b".$post["post_id"]; ?>"><?php echo $post["post_content"]?></span>
                            </div>
                            <div class="uk-card-footer">
                                <a   class="uk-button uk-button-text krkr" id="<?php echo 'KL'.$post["post_id"];  ?>" uk-toggle="target: #<?php echo 'A'.$post["post_id"];  ?>; animation:  uk-animation-slide-left, uk-animation-slide-bottom">comment</a>
                            </div>
                        </div>
                        <div class="uk-card uk-carde uk-width-3-5@m " id="<?php echo 'A'.$post["post_id"]; ?>" hidden="hidden" aria-hidden="true">
                            <div class="getcomments" id="<?php echo 'G'.$post["post_id"]; ?>">
                                <?php
                                $comments=$class->getcommentsofpost($post["post_id"]);
                                foreach ($comments as $comment){
                                    $commentuser=$class->getuser($comment['user_id']);?>
                                    <article class="uk-comment uk-comment-primary comment uk-visible-toggle" id="<?php echo $comment["comment_id"].$post["post_id"];?>">
                                        <header class="uk-comment-header uk-grid-small uk-flex-middle" uk-grid>
                                            <div class="uk-width-auto uk-border-circle " style="width: 50px;height: 50px;overflow: hidden;padding: 0;margin-right: 5px ">
                                                <img class="uk-comment-avatar " src="images/child-only.png" width="100%" height="100%" alt="">
                                            </div>
                                            <div class="uk-width-expand">
                                                <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset"  ><?php echo $commentuser['username']?></a></h4>
                                                <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                                    <li><?php echo $class->calculattime(strtotime($comment["Ccomment_date"])) ?></li>
                                                </ul>
                                            </div>
                                            <div class="uk-width-auto" style="float: right;">
                                                <?php if ($userid == $comment['user_id']||$gropid==1) {
                                                    ?>
                                                    <ul class="uk-invisible-hover uk-iconnav">
                                                        <li><a   uk-icon="icon: pencil" href="#modal-sections" class="editcomment" uk-toggle id="<?php echo 'y'.$comment['comment_id']?>"></a></li>
                                                        <li><a   uk-icon="icon: trash" class="removecomment" href="#remove" id="<?php echo 'k'.$comment['comment_id']?>" uk-toggle></a></li>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                        </header>
                                        <div class="uk-comment-body">
                                            <span class="wordwrap " id="<?php echo"h".$comment["comment_id"]; ?>"><?php echo $comment["comment_content"]?></span>
                                        </div>
                                    </article>
                                <?php }?>
                            </div>
                            <article class="uk-comment uk-comment-primary comment uk-visible-toggle" style="border: 0px">
                                <div class="uk-comment-body">
                                    <textarea class="newPost" id="<?php echo"c".$post['post_id'];?>" placeholder="Write some thing ..."></textarea>
                                    <button class="uk-button uk-button-default uk-width-1-1 uk-margin-small-bottom huhu" id="<?php echo"d".$post['post_id'];?>" style="margin-top: 10px;background-color: white">Comment</button>
                                </div>
                            </article>
                        </div>

                    <?php } ?>
                </li>
            </div></div>
        <div class="uk-container-expand  subject">
            <div class="container">
                <?php
                if($gropid!=2){
                    ?>
                    <li>
                        <ul id="subjects" class="uk-switcher">
                            <?php
                            $listofsub=$class->get_all_class_subs($classid);
                            foreach ($listofsub as $sub){

                                ?>
                                <li>
                                    <div class="uk-width-2-3@m" style="margin: auto;background-color: rgba(255,255,255,0.9)">
                                        <table class="uk-table uk-table-hover">
                                            <thead>
                                            <tr>
                                                <th >Name</th>
                                                <th >HoneWork</th>
                                                <th >Deadline</th>
                                                <th >Answer</th>
                                                <th >Grade</th>
                                                <th >Comment</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            include_once "../classes/subject.php";
                                            $sube = new subject();
                                            $listofHw=$sube->get_sub_class_hw($sub['id'],$classid);
                                            foreach ($listofHw as $val){
                                                ?>
                                                <tr>
                                                    <td><?php echo"HW ".$val['hw_id'];?></td>
                                                    <td >
                                                        <a class="download" href="<?php echo '../classes/amr_test.php?action='.$val['hw_id'];?>" uk-icon="icon: cloud-download; ratio: 2" id="<?php echo $val['hw_id'];?>"></a>
                                                    </td>
                                                    <td><?php echo $val['dead_line']?></td>
                                                    <td>


                                                        <form id="<?php echo "upload_hw_answer".$val['hw_id']?>">
                                                            <div uk-form-custom>
                                                                <input class="ubloadanswer" type="file" id="<?php echo $val['hw_id']?>" name="stu_id_answer">
                                                                <span uk-icon="icon:  cloud-upload; ratio: 2"  tabindex="-1" class="answer_upload_span"  name="answer_upload_span" id="<?php echo $stu_id; ?>"></span>
                                                            </div>
                                                        </form>




                                                        <?php $answerid=$answer->get_answer_id($val['hw_id'],$stu_id)?>

                                                    </td>
                                                    <td class="uk-text-primary"><?php echo $answerid['grade']?></td>
                                                    <td class="uk-text-primary"><?php echo $answerid['comment']?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php }else if($gropid==2){
                    ?>
                    <li>
                        <ul id="subjects" class="uk-switcher">
                            <?php
                            include "../classes/teacher.php";
                            $teacher = new teacher();
                            include_once "../classes/subject.php";
                            $sube = new subject();
                                $sub_id=$teacher->get_teacher_sub($userid)['sub_id'];
                            $listofHw=$sube->get_sub_class_hw($sub_id,$classid);
                            foreach ($listofHw as $value){

                                ?>
                                <li>
                                    <div class="uk-width-2-3@m" style="margin: auto;background-color: rgba(255,255,255,0.9)">
                                        <table class="uk-table uk-table-hover">
                                            <thead>
                                            <tr>
                                                <th >Name</th>
                                                <th >Id</th>
                                                <th >Dadeline</th>
                                                <th >Answer</th>
                                                <th >Grade</th>
                                                <th >Comment</th>
                                                <th >submit</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $classstudent=$class->get_class_students($classid);
                                                foreach ($classstudent as $student){
                                                ?>
                                                <tr>

                                                    <td><p><?php echo $student['first_name']." ".$student['mid_name']." ".$student['last_name'];?></p></td>
                                                    <td><p><?php echo $student['username']?></p></td>
                                                    <td><?php echo $value['dead_line']?></td>

                                                    <td >
                                                        <?php $answerid=$answer->get_answer_id($value['hw_id'],$student['stu_id'])?>
                                                        <a class="download" href="<?php echo '../classes/amr_test.php?downloadanswer='.$answerid['answer_id'];?>" uk-icon="icon: cloud-download; ratio: 2" id="<?php echo $val['hw_id'];?>"></a>
                                                    </td>
                                                    <td class="uk-text-primary"><input type="text" placeholder="Grade" value="<?php echo $answerid['grade']?>" id="grade<?php echo $value['hw_id']."".$student['stu_id']?>"></td>
                                                    <td class="uk-text-primary"><input type="text" placeholder="Comment" value="<?php echo $answerid['comment']?>" id="comment<?php echo $value['hw_id']."".$student['stu_id']?>"></td>
                                                    <td class="uk-text-primary"><button class="uk-button-primary submit_grade_comment" id="<?php echo $value['hw_id']."%".$student['stu_id']?>">submit</button></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php }
                ?>
            </div></div>
        <div class="uk-container-expand students">
            <div class="container">
                <li>
                    <div class="uk-width-2-3@m" style="margin: auto;background-color: rgba(255,255,255,0.9)">
                        <table class="uk-table uk-table-hover">
                            <thead>
                            <tr>
                                <th >Pictur</th>
                                <th >Name</th>
                                <th >ID</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $classstudent=$class->get_class_students($classid);
                            foreach ($classstudent as $student){
                                ?>
                                <tr>
                                    <td><div class=" uk-border-circle" style="width: 50px;height: 50px;overflow: hidden;padding: 0; ">
                                            <img class="" width="100%" height="1002%" src="images/child-only.png">
                                        </div></td>
                                    <td >
                                        <a class="uk-link-reset"  ><?php echo $student['first_name']." ".$student['mid_name']." ".$student['last_name'];?></a>
                                    </td>
                                    <td><?php echo $student['username']?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </li>
            </div></div>
        <div class="uk-container-expand Timetable" >
            <div class="container">
                <li>
                    <div class="uk-grid">
                        <div class="uk-card uk-card-default uk-card-body uk-width-2-3@m m-scroll">
                            <table class="uk-table uk-table-hover ">
                                <thead>
                                <tr>
                                    <th style="background-color:  #f8f8f8" >Time\Day</th>
                                    <th style="background-color:  #f8f8f8">Sunday</th>
                                    <th style="background-color:  #f8f8f8">Monday</th>
                                    <th style="background-color:  #f8f8f8">Tuesday</th>
                                    <th style="background-color:  #f8f8f8">Wednesday</th>
                                    <th style="background-color:  #f8f8f8">Thursday</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $listofsub= array("Arabic","English","Math","Art","Funny","Qran");
                                for($k=0;$k<11;$k++){
                                    shuffle($listofsub);
                                    ?>
                                    <tr>
                                        <td style="background-color:  #f8f8f8"><?php if($k+1>10){echo "0". $k+1 . ":00";}else{echo $k+1 . ":00";}
                                            ?></td>
                                        <td><?php echo $listofsub[1];?></td>
                                        <td><?php echo $listofsub[2];?></td>
                                        <td></td>
                                        <td><?php echo $listofsub[4];?></td>
                                        <td><?php echo $listofsub[0];?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="uk-card uk-card-default uk-card-body uk-flex-first@l uk-width-1-3@m">
                            <h2 class="uk-card-header"> Today</h2>
                            <div class="uk-card-body">
                                <dl class="uk-description-list ">
                                    <dt>Time</dt>
                                    <dd>Start at 08:00<br>End at 12:00<br>Parts 10</dd>
                                    <dt>subjects</dt>
                                    <dd>Arabic,English,Art.</dd>
                                    <dt>incomplete Tasks</dt>
                                    <dd>No tasks incomplete</dd>
                                    <dt>Tasks</dt>
                                    <dd>No tasks complete</dd>
                                </dl>
                            </div>
                        </div >
                        <div  class="uk-card uk-card-default uk-card-body uk-flex-last uk-width-2-3@m">
                            <h2 class="uk-card-header"> Arabic</h2>
                            <div class="uk-card-body">
                                <dl class="uk-description-list ">
                                    <dt>Time</dt>
                                    <dd>Start at 08:00<br>End at 08:30</dd>
                                    <dt>Teacher</dt>
                                    <dd>Mostafa saleh </dd>
                                    <dt>attend</dt>
                                    <dd>here</dd>
                                    <dt>Tasks</dt>
                                    <dd>2 Homework</dd>

                                </dl>
                            </div>
                        </div>
                    </div>
                </li>
            </div></div>
    </ul>
    <button class="uk-button uk-margin-small-right cata uk-box-shadow-hover-xlarge "  type="button" uk-toggle="target: #offcanvas-push"><a   class="uk-slidenav-large" uk-slidenav-next></a></button>
    <div id="offcanvas-push" uk-offcanvas="mode: push; overlay: true">
        <div class="uk-offcanvas-bar uk-flex uk-flex-column">
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <div class="uk-width-1-2@s uk-margin-auto uk-nav-center uk-margin-auto-vertical" >
                <ul class="uk-nav-primary" uk-nav  uk-switcher="connect: #classAtrbiut; animation: uk-animation-fade; toggle: > :not(.uk-nav-header)">
                    <li class="uk-active"><a href="#">Home</a><p class="uk-heading-divider"></p></li>
                    <li class="uk-parent">

                        <?php
                        if($gropid!=2) {
                            ?>
                            <a href="#">Subjects</a>
                            <ul class="uk-nav-sub" uk-switcher="connect: #subjects; animation: uk-animation-fade; toggle: > :not(.uk-nav-header)">
                                <?php
                                $listofsub=$class->get_all_class_subs($classid);
                                foreach ($listofsub as $sube){
                                    echo "<li><a href='#'>".$sube['name']."</a></li>";
                                }
                                    ?>
                                    </ul>
                                    <?php
                                    }else if($gropid==2){
                                    ?>
                                    <a  href="#">HomeWork</a>
                                    <ul class="uk-nav-sub" uk-switcher="connect: #subjects; animation: uk-animation-fade; toggle: > :not(.uk-nav-header)">
                                    <?php
                                    foreach ($listofHw as $hw) {
                                        echo "<li><a href='#'> HW " . $hw['hw_id'] . "</a></li>";
                                    }
                                ?>


                            </ul>

                        <?php }?>
                        <p class="uk-heading-divider"></p></li>
                    <li><a href="#">students</a><p class="uk-heading-divider"></p></li>
                    <li><a href="panel.php">Timetable</a><p class="uk-heading-divider"></p></li>
                </ul>
                <?php
                if($gropid==2)
                    echo ' <button  href="#dateline" uk-toggle>llll</button>';
                ?>


            </div>
            <!-->
        </div>


    </div>

</div>
<div class="tryy" id="modal-sections" uk-modal>
    <div class="uk-modal-dialog">
        <label class="uk-label-danger"></label>
        <div class="uk-modal-body" >
            <textarea class="newPost" id="edit"></textarea>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close tryy" type="button" id="noedit">Cancel</button>
            <button class="uk-button uk-button-primary  uk-modal-close" type="button" id="yesedit" >Save</button>
        </div>
    </div>
</div>
<div class="try" id="remove" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <p>are you sure that you want delete it.</p>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close try" type="button" id="nodelet">Cancel</button>
            <button class="uk-button uk-button-primary uk-modal-close" id="yesdelet" type="button">Confirm</button>
        </p>
    </div>

    <div id="dateline" uk-modal="center: true">
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title">Modal Title</h2>
            </div>
            <div class="uk-modal-body">
                <form id="quta" class="uk-form">
                    <div class="test-upload" uk-form-custom>
                        <input type="file" multiple name="hw_upload" id="hw_upload" required>
                        <button class="uk-button uk-button-default hw_upload_btn" type="button" tabindex="-1 " name="<?php echo $classid?>" id="<?php echo $sub_id ?>">Add New HW</button>
                    </div>

                    <input type="date" data-uk-datepicker="{format:'DD.MM.YYYY'}" name="hw_deadline" required>

                </form></div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="button" id="submit_new_hw">Save</button>
            </div>
        </div>
    </div>

</div>
<footer>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <script src="js/class.js"></script>
</footer>
</div>

</body>
</html>
