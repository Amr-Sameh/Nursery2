<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="css/uikit-rtl.min.css">
    <link rel="stylesheet" href="css/uikit.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/class.css">
</head>
<body >
<div class="uk-offcanvas-content">


<ul id="classAtrbiut" class="uk-switcher">
    <div class="uk-container-expand post ">
        <div class="container">
<li >
    <div class="uk-card uk-carde uk-card-default uk-width-2-3@m uk-visible-toggle" >
        <div class="uk-card-header" style="background-color:  #f8f8f8">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-expand">
                    <h2>Post</h2>
                </div>
            </div>
        </div>
        <div style="padding: 0;">
           <textarea class="newPost" placeholder="Write some thing ..."></textarea>
        </div>
        <div class="uk-card-footer" style="background-color:  #f8f8f8">
            <a   class="uk-button uk-button-text" style="float: right">Post</a>
        </div>
    </div>
<?php
$listofposts = array('3','4');
foreach ($listofposts as $post){  ?>
    <div class="uk-card uk-carde uk-card-default uk-width-2-3@m uk-visible-toggle" id="<?php echo $post;?>">
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-auto uk-border-circle" style="width: 50px;height: 50px;overflow: hidden;padding: 0;margin-right: 5px ">
                    <img class="" width="100%" height="100%" src="images/child-only.png">
                </div>
                <div class="uk-width-expand">
                    <h3 class="uk-card-title uk-margin-remove-bottom">Title</h3>
                    <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">April 01, 2016</time></p>
                </div>
            </div>
            <div class="uk-width-auto" style="float: right;">
                <ul class="uk-invisible-hover uk-iconnav">
                    <li><a   uk-icon="icon: pencil" href="#modal-sections" uk-toggle onclick="document.getElementById('edit').innerHTML = document.getElementById('<?php echo"b".$post; ?>').textContent"></a></li>
                    <li><a   uk-icon="icon: trash" href="#remove" uk-toggle></a></li>
                </ul>
            </div>
        </div>
        <div class="uk-card-body">
            <p id="<?php echo"b".$post; ?>">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
        </div>
        <div class="uk-card-footer">
            <a   class="uk-button uk-button-text"  uk-toggle="target: #<?php echo 'A'.$post; ?>; animation:  uk-animation-slide-left, uk-animation-slide-bottom">comment</a>
        </div>
    </div>
    <div class="uk-card uk-carde uk-width-3-5@m" id="<?php echo 'A'.$post; ?>" hidden="hidden" aria-hidden="true">
        <?php
        $listofcomments = array('1','2');
        foreach ($listofcomments as $comment){  ?>
    <article class="uk-comment uk-comment-primary comment uk-visible-toggle" id="<?php echo $comment.$post;?>">
        <header class="uk-comment-header uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-auto uk-border-circle " style="width: 50px;height: 50px;overflow: hidden;padding: 0;margin-right: 5px ">
                <img class="uk-comment-avatar " src="images/child-only.png" width="100%" height="100%" alt="">
            </div>
            <div class="uk-width-expand">
                <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset"  >Author</a></h4>
                <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                    <li><a  >12 days ago</a></li>
                </ul>
            </div>
            <div class="uk-width-auto" style="float: right;">
                <ul class="uk-invisible-hover uk-iconnav">
                    <li><a   uk-icon="icon: pencil" href="#modal-sections" uk-toggle onclick="document.getElementById('edit').innerHTML = document.getElementById('<?php echo"b".$comment.$post; ?>').textContent"></a></li>
                    <li><a   uk-icon="icon: trash" href="#remove" uk-toggle></a></li>
                </ul>
            </div>
        </header>
        <div class="uk-comment-body">
            <p id="<?php echo"b".$comment.$post;?>">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
        </div>
    </article>
        <?php }?>
        <article class="uk-comment uk-comment-primary comment uk-visible-toggle" style="border: 0px">
            <div class="uk-comment-body">
                <textarea class="newPost" placeholder="Write some thing ..."></textarea>
                <button class="uk-button uk-button-default uk-width-1-1 uk-margin-small-bottom" style="margin-top: 10px;background-color: white">Comment</button>
            </div>
        </article>
    </div>
<?php }?>
</li>
        </div></div>
            <div class="uk-container-expand  subject">
                <div class="container">
    <li>
        <ul id="subjects" class="uk-switcher">
            <?php
            $listofsub = array("Arabic","English","Math","Art","Funny","Qran");
            foreach ($listofsub as $value){
                ?>
                <li>
                    <div class="uk-width-2-3@m" style="margin: auto;background-color: rgba(255,255,255,0.9)">
                        <table class="uk-table uk-table-hover">
                            <thead>
                            <tr>
                                <th >Name</th>
                                <th >HoneWork</th>
                                <th >Answer</th>
                                <th >Grade</th>
                                <th >Comment</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            for($k=0;$k<15;$k++){
                                ?>
                                <tr>
                                    <td><?php echo"HW".$k;?></td>
                                    <td >
                                        <span uk-icon="icon: cloud-download; ratio: 2"></span>
                                    </td>
                                    <td>
                                        <div uk-form-custom>
                                                <input type="file">
                                                <span uk-icon="icon:  cloud-upload; ratio: 2"  tabindex="-1"></span>
                                            </div>
                                        </td>
                                    <td class="uk-text-primary">8</td>
                                    <td class="uk-text-primary">you are good</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </li>
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
                for($k=0;$k<15;$k++){
                    ?>
                    <tr>
                        <td><div class=" uk-border-circle" style="width: 50px;height: 50px;overflow: hidden;padding: 0; ">
                                <img class="" width="100%" height="100%" src="images/child-only.png">
                            </div></td>
                        <td >
                            <a class="uk-link-reset"  >Mostafa saleh sopih mohamed</a>
                        </td>
                        <td>235664</td>
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
            <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical" uk-switcher="connect: #classAtrbiut; animation: uk-animation-fade; toggle: > :not(.uk-nav-header)">
                <li><a  >Home</a>

                <p class="uk-heading-divider"></p></li>
                <li class="uk-parent">
                    <a   uk-toggle="target: #toggle-animation; animation: uk-animation-fade">Subjects</a>
                    <ul class="uk-nav-sub" id="toggle-animation"  hidden="hidden" aria-hidden="true" uk-switcher="connect: #subjects; animation: uk-animation-fade; toggle: > :not(.uk-nav-header)">
                        <?php
                        $listofsub= array("Arabic","English","Math","Art","Funny","Qran");
                        foreach ($listofsub as $value){
                            echo "<li><a href='#'>".$value."</a></li>";
                        }
                        ?>
                    </ul>

                <p class="uk-heading-divider"></p></li>
                <li><a  >Students</a>
                <p class="uk-heading-divider"></p></li>
                <li><a  >TimeTable</a></li>
            </ul>

        </div>
    </div>

</div>
    <div id="modal-sections" uk-modal="center: true">
        <div class="uk-modal-dialog">

            <div class="uk-modal-body" >
                <textarea class="newPost" id="edit"></textarea>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="button" >Save</button>
            </div>
        </div>
    </div>
<div id="remove" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <p>are you sure that you want delete it.</p>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary uk-modal-close" type="button">Confirm</button>
        </p>
    </div>
</div>
 <footer>
     <script src="jq/jquery-1.12.3.min.js"></script>
     <script src="jq/bootstrap.min.js"></script>
     <script src="jq/uikit.min.js"></script>
     <script src="jq/uikit-icons.min.js"></script>
     <script src="jq/class.js"></script>
 </footer>
</div>
</body>
</html>
