<?php
/**
 * Created by PhpStorm.
 * User: MeGaCrazy
 * Date: 4/18/2017
 * Time: 10:25 PM
 */
include_once 'static/db_connect.php';
include_once 'static/header.php';
include_once 'navbar.php';
include_once 'static/TL_Queries.php';
$my_tl = new TL_Queries($con);
session_start();
$_SESSION['id'] = 1;
$id = $_SESSION['id'];
//$my_tl->insert_NewTl("2017-8-10 02:29:00", "Mega", "ddddd d", 1);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
       $type_task=$_GET['action'];
       if($type_task=="newtask") {
          if(isset($_POST['tl_date'])){
              $tldate = $_POST['tl_date'];
              $time = date("Y-m-d H:i:s", strtotime($tldate));
              $my_tl->insert_NewTl($time, $_POST['headline'], $_POST['content'], $id);
              unset($_POST['$tldate']);
              unset($_POST['headline']);
              unset($_POST['content']);
          }
      }
   else if($type_task=="delete"){
       if(isset($_POST['tl_id'])) {
         $tl_id = $_POST['tl_id'];
            $my_tl->delete_spTL($id, $_POST['tl_id']);
           unset($_POST['tl_id']);
         }
  }

    else if ($type_task=="edit") {
       if(isset($_POST['tl_date'])) {
           $tldate = $_POST['tl_date'];
           $time = date("Y-m-d H:i:s", strtotime($tldate));
           $my_tl->update_TL($time, $_POST['headline'], $_POST['content'], $id, $_POST['tl_id']);
           unset($_POST['$tldate']);
           unset($_POST['headline']);
           unset($_POST['content']);
           unset($_POST['tl_id']);
       }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

</head>
<body>

<!-- show timeline contained-->

<div class="container">
    <!-- new timeline -->
    <!-- show timeline contained-->
    <header class="page-header">
        <h1 style="">Timeline</h1>

        <a href="#newtask" uk-toggle class="create">
            <button type="button" class="btn btn-success" sytle="float:right;" href="#newtask">Add New</button>
        </a>

        <p class="fix"></p>
    </header>

    <ul class="timeline">


        <?php
        $i = 0;
        $stmt = $my_tl->get_tasks($id);
        // for paging
        $page_num = ($stmt->rowCount() + 10) / 10;
        $check_month = "0";
        while ($rows = $stmt->fetch()) {
        ?>
        <!-- check for same month -->
        <?php if ($check_month == "0" || $check_month != date("m", strtotime($rows['tldate']))) { ?>
            <li>
                <div class="tldate" ;><?php echo date("M Y", strtotime($rows['tldate'])); ?></div>
            </li>

            <?php $check_month = date("m", strtotime($rows['tldate']));
        } ?>

        <?php if ($i % 2) { ?>
        <li>
            <div class="tl-circ"></div>
            <div class="timeline-panel">
                <div class="tl-heading">
                    <ul class="uk-invisible-hover uk-iconnav" style="float:right;">
                        <li style="padding-right:9px;"><a uk-icon="icon: pencil" href="#edit" uk-toggle></a></li>


                        <li style=><a uk-icon="icon: trash" href="#remove" uk-toggle></a></li>
                        <!-- that for delete -->
                        <form id="remove" uk-modal class="model" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=delete"
                              method="post">
                            <input type="hidden" name="tl_id" value=<?php echo $rows['tl_id']; ?>>
                            <div class="uk-modal-dialog uk-modal-body"
                            ">
                            <p style="text-transform: capitalize;font-size:15px;c" class="uk-text-center">Are you sure
                                that you want delete it.</p>
                            <p class="uk-text-center">
                                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                <button class="uk-button uk-button-primary " name="delete" type="submit">Confirm
                                </button>
                            </p>
                        </form>
                </div>
                <!-- end delete -->

                <!-- start Edit -->
                <form id="edit" uk-modal="center: true" class="model" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=edit"
                      method="post">
                    <input type="hidden" name="tl_id" value=<?php echo $rows['tl_id']; ?>>
                    <div class="uk-modal-dialog">
                        <div class="uk-modal-body">
                            <label for="example-text-input" class="col-2 col-form-label" style="color: #0f6ecd;">Headline</label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="headline"
                                       value="<?php echo $rows['headline'] ?>" placeholder="Type"
                                       id="example-text-input" style="font-size:18px;">
                            </div>


                            <label for="example-text-input" class="col-2 col-form-label" style="color: #0f6ecd;">Description</label>
                            <div class="col-10">
                                <textarea class="form-control" type="text" name="content" id="example-text-input"
                                          rows="3" style="font-size:18px;resize: none;"
                                          autocomplete="off"><?php echo $rows['content'] ?></textarea>
                            </div>


                            <label for="example-datetime-local-input" class="col-2 col-form-label"
                                   style="color: #0f6ecd;">Date and time</label>
                            <div class="col-10">
                                <input class="form-control" type="datetime-local"
                                       value="<?php echo date("Y-m-d") . "T" . date("H:i") ?>" name="tl_date"
                                       id="example-datetime-local-input">

                            </div
                        </div>
                        <div class="uk-modal-footer uk-text-right">

                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                            <button class="uk-button uk-button-primary " type="submit">Edit</button>
                            <div class="fix"></div>

                        </div>
                    </div>
                </form>
                <!--  End edit -->


    </ul>
    <!-- card content -->
    <h4 style=" line-height: 1.2;margin: 0;"><?php echo $rows['headline'] ?>
    </h4>
    <p style="margin: 5px;">
        <small class="text-muted" style="font-style: italic;font-family:bold;"><i style="margin:0 3px 0 0;"
              class="glyphicon glyphicon-time"></i><?php echo $rows['tldate'] ?>
        </small>
    </

<div class="tl-body">
    <p style="color: #9a2d12;font-size:18px;margin: 0;"><?php echo $rows['content'] ?></p>
</div>
</div>
<!-- end cart content not_invert -->
</li>
<?php } ?>
<?php if ($i % 2 == 0) { ?>
    <li class="timeline-inverted">
        <div class="tl-circ"></div>
        <div class="timeline-panel">
            <div class="tl-heading">
                <ul class="uk-invisible-hover uk-iconnav" style="float:right;">
                    <li style="padding-right: 7px;"><a uk-icon="icon: pencil" href="#edit" uk-toggle></a></li>


                    <li style=><a uk-icon="icon: trash" href="#remove" uk-toggle></a></li>
                    <!-- that for delete -->
                    <form id="remove" uk-modal class="model" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=delete" method="post">
                        <input type="hidden" name="tl_id" value=<?php echo $rows['tl_id']; ?>>
                        <div class="uk-modal-dialog uk-modal-body"
                        ">
                        <p style="text-transform: capitalize;font-size:15px;c" class="uk-text-center">Are you sure that
                            you want delete it.</p>
                        <p class="uk-text-center">
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                            <button class="uk-button uk-button-primary " name="delete" type="submit">Confirm</button>
                        </p>
                    </form>
            </div>
            <!-- end delete -->
            <!-- start Edit inverter card -->
            <form id="edit" uk-modal="center: true" class="model" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=edit"
                  method="post">
                <input type="hidden" name="tl_id" value=<?php echo $rows['tl_id']; ?>>
                <div class="uk-modal-dialog">
                    <div class="uk-modal-body">
                        <label for="example-text-input" class="col-2 col-form-label"
                               style="color: #0f6ecd;">Headline</label>

                        <div class="col-10">
                            <input class="form-control" type="text" name="headline"
                                   value="<?php echo $rows['headline'] ?>" placeholder="Type" id="example-text-input"
                                   style="font-size:18px;">
                        </div>


                        <label for="example-text-input" class="col-2 col-form-label"
                               style="color: #0f6ecd;">Description</label>
                        <div class="col-10">
                            <textarea class="form-control" type="text" name="content" id="example-text-input" rows="3"
                                      style="font-size:18px;resize: none;"
                                      autocomplete="off"><?php echo $rows['content'] ?></textarea>
                        </div>


                        <label for="example-datetime-local-input" class="col-2 col-form-label" style="color: #0f6ecd;">Date
                            and time</label>
                        <div class="col-10">
                            <input class="form-control" type="datetime-local"
                                   value="<?php echo date("Y-m-d") . "T" . date("H:i") ?>" name="tl_date"
                                   id="example-datetime-local-input">

                        </div
                    </div>
                    <div class="uk-modal-footer uk-text-right">

                        <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                        <button class="uk-button uk-button-primary " type="submit">Edit</button>
                        <div class="fix"></div>

                    </div>

                </div>
            </form>
            <!--  End edit inverter card -->


            <!-- start content inverter -->
            </ul>
            <h4 style=" line-height: 1.2;margin: 0;"><?php echo $rows['headline'] ?></h4>
            <p style="margin:5px;">
                <small class="text-muted" style="font-style: italic;font-family:bold;"><i
                            class="glyphicon glyphicon-time"></i> <?php echo $rows['tldate'] ?></small>
            </p>
        </div>
        <div class="tl-body">
            <p style="color: #9a2d12;font-size:18px;"><?php echo $rows['content'] ?></p>
        </div>
        </div>
        <!-- End content inverter -->
    </li>
<?php } ?>

<?php $i++;
} ?>


<!-- start new task -->
<div>
<form id="newtask" uk-modal="center: true" class="model" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=newtask"
      method="post" style="display: none;">
    <div class="uk-modal-dialog">
        <div class="uk-modal-body">
            <label for="example-text-input" class="col-2 col-form-label" style="color: #0f6ecd;">Headline</label>
            <div class="col-10">
                <input class="form-control" value="" type="text" name="headline" placeholder="Type"
                       id="example-text-input" style="font-size:18px;">
            </div>


            <label for="example-text-input" class="col-2 col-form-label" style="color: #0f6ecd;">Description</label>
            <div class="col-10">
                <textarea class="form-control" type="text" name="content" id="example-text-input" rows="3"
                          style="font-size:18px;resize: none;" autocomplete="off"></textarea>
            </div>


            <label for="example-datetime-local-input" class="col-2 col-form-label" style="color: #0f6ecd;">Date and
                time</label>
            <div class="col-10">
                <input class="form-control" type="datetime-local"
                       value="<?php echo date("Y-m-d") . "T" . date("H:i") ?>" name="tl_date"
                       id="example-datetime-local-input">

            </div
        </div>
        <div class="uk-modal-footer uk-text-right">

            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary " type="submit">Confirm</button>
            <div class="fix"></div>

        </div>

    </div>
</form>
</div>
</div>
<!--  end task -->
<?php

include_once 'static/footer.php'
?>
</body>
</html>



