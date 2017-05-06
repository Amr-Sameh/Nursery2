<?php
session_start();
$_SESSION['userid']=1;
if($_SERVER['REQUEST_METHOD']=='POST') {


    if (isset($_POST['action'])) {

        if ($_POST['action'] == 'getcomments') {
            include "../classes/classs.php";
             $class=new classs();
         $comments=$class->getcommentsofpost($_POST['id']);
         $postcomemnts='';
      foreach ($comments as $comment){
    $commentuser=$class->getuser($comment['user_id']);
    $postcomemnts.= '<article class="uk-comment uk-comment-primary comment uk-visible-toggle" id="'.$comment["comment_id"].$_POST["id"].'">
        <header class="uk-comment-header uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-auto uk-border-circle " style="width: 50px;height: 50px;overflow: hidden;padding: 0;margin-right: 5px ">
                <img class="uk-comment-avatar " src="images/child-only.png" width="100%" height="100%" alt="">
            </div>
            <div class="uk-width-expand">
                <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset"  >'.$commentuser['username'].'</a></h4>
                <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                    <li>'.$class->calculattime(strtotime($comment["Ccomment_date"])).'</li>
                </ul>
            </div>
            <div class="uk-width-auto" style="float: right;">';
                if ($_SESSION['userid'] == $comment['user_id']) {
                $postcomemnts.= '<ul class="uk-invisible-hover uk-iconnav">
                        <li><a   uk-icon="icon: pencil" href="#modal-sections" class="editcomment" id="'.'y'.$comment['comment_id'].'" uk-toggle ></a></li>
                        <li><a   uk-icon="icon: trash" class="removecomment" href="#remove" id="'.'k'.$comment['comment_id'].'" uk-toggle></a></li>
                    </ul>';
               }
$postcomemnts .= '</div>
        </header>
        <div class="uk-comment-body">
            <span class="wordwrap " id="'."h".$comment["comment_id"].'">'.$comment["comment_content"].'</span>
        </div>
    </article>';
}
echo  $postcomemnts;
            exit();
}
}
}
?>