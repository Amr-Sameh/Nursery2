<?php
/**
 * Created by PhpStorm.
 * User: MeGaCrazy
 * Date: 4/18/2017
 * Time: 10:25 PM
 */
include_once 'static/header.php';
include_once 'navbar.php';
include_once '../database/TL_Queries.php';
$my_tl = new TL_Queries();
$_SESSION['id'] = 1; // that will be stored in
$id = $_SESSION['id'];
$page=1;
$page_num=0;
   if(isset($_GET['page'])){
       $page=$_GET['page'];
   }
if ($_SERVER['REQUEST_METHOD'] == "POST") {
       $type_task=$_GET['action'];
       if($type_task=="newtask") {
          if(isset($_POST['tl_date'])){
              $tldate = $_POST['tl_date'];
              $time = date("Y-m-d H:i:s", strtotime($tldate));
              $my_tl->insert_NewTl($time, $_POST['headline'], $_POST['content'], $id);
              unset($_POST['tl_date']);
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
       if(isset($_POST['tl_id'])) {
           $tldate = $_POST['tl_date'];
           $time = date("Y-m-d H:i:s", strtotime($tldate));
           $my_tl->update_TL($time, $_POST['headline'], $_POST['content'], $id, $_POST['tl_id']);
           unset($_POST['tl_id']);
       }
    }
    unset($_GET['action']);
}
?>

<!-- show timeline contained-->
<div class="put">
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
    <?php
    // check exits
    $i = 0;
    $exit = $my_tl->check_exist($id);
    // for paging
    if($exit==1){
    ?>
    <ul class="timeline">


        <?php
        $i = 0;
        $stmt = $my_tl->get_tasks($id);
        // for paging
        $page_num = ($stmt->rowCount() + 9) / 10;
        for($s=1;$s<=($page-1)*10;$s++){
            $stmt->fetch();
        }
        $check_month = "0";
        while ($rows = $stmt->fetch()) {
            if($i>=10)break;
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
                        <li style="padding-right:9px;"><a uk-icon="icon: pencil" href="#edit<?php echo $rows['tl_id']?>" uk-toggle></a></li>


                        <li style=><a uk-icon="icon: trash" href="#remove<?php echo $rows['tl_id']?>"uk-toggle></a></li>
                        <!-- that for delete -->
                        <form id="remove<?php echo $rows['tl_id']?>" uk-modal class="model" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=delete"
                              method="post" style="z-index: 999999">
                            <input type="hidden" name="tl_id" value=<?php echo $rows['tl_id']; ?>>
                            <div class="uk-modal-dialog uk-modal-body"
                            ">
                            <p style="text-transform: capitalize;font-size:15px;c" class="uk-text-center">Are you sure
                                that you want delete it.</p>
                            <p class="uk-text-center">
                                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                <button class="uk-button uk-button-danger" name="delete" type="submit">Confirm
                                </button>
                            </p>
                        </form>
                </div>
                <!-- end delete -->

                <!-- start Edit -->
                <form id="edit<?php echo $rows['tl_id']?>" uk-modal="center: true" class="model" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=edit"
                      method="post" style="z-index: 99999">
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
                                       value="<?php echo date("Y-m-d",strtotime($rows['tldate'])) . "T" . date("H:i",strtotime($rows['tldate'])) ?>" name="tl_date"
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

<!-- end cart content not_invert -->
</li>
<?php } ?>
<?php if ($i % 2 == 0) { ?>
    <li class="timeline-inverted">
        <div class="tl-circ"></div>
        <div class="timeline-panel">
            <div class="tl-heading">
                <ul class="uk-invisible-hover uk-iconnav" style="float:right;">
                    <li style="padding-right: 7px;"><a uk-icon="icon: pencil" href="#edit<?php echo $rows['tl_id']?>" uk-toggle></a></li>
                    <li style=><a uk-icon="icon: trash" href="#remove<?php echo $rows['tl_id']?>" uk-toggle></a></li>
                    <!-- that for delete -->
                    <form id="remove<?php echo $rows['tl_id']?>" uk-modal class="model" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=delete" method="post" style="z-index: 99999">
                        <input type="hidden" name="tl_id" value=<?php echo $rows['tl_id']; ?>>
                        <div class="uk-modal-dialog uk-modal-body"
                        ">
                        <p style="text-transform: capitalize;font-size:15px;" class="uk-text-center">Are you sure that
                            you want delete it.</p>
                        <p class="uk-text-center">
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                            <button class="uk-button uk-button-danger " name="delete" type="submit">Confirm</button>
                        </p>
                    </form>
            </div>
            <!-- end delete -->
            <!-- start Edit inverter card -->
            <form id="edit<?php echo $rows['tl_id']?>" uk-modal="center: true" class="model" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=edit"
                  method="post">
                <input type="hidden" name="tl_id" value=<?php echo $rows['tl_id']; ?>>
                <div class="uk-modal-dialog" style="z-index: 999999">
                    <div class="uk-modal-body">
                        <label for="example-text-input" class="col-2 col-form-label"
                               style="color: #0f6ecd;">Headline</label>

                        <div class="col-10">
                            <input class="form-control" type="text" name="headline"
                                   value="<?php echo $rows['headline'] ?>" placeholder="Type" id="example-text-input"
                                   style="font-size:18px;"autocomplete="off">
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
                                   value="<?php echo date("Y-m-d",strtotime($rows['tldate'])) . "T" . date("H:i",strtotime($rows['tldate'])) ?>" name="tl_date"
                                   id="example-datetime-local-input">

                        </div
                    </div>
                    <div class="uk-modal-footer uk-text-right">

                        <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                        <button class="uk-button uk-button-primary " type="submit">Confrim</button>
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

    <?php }?> <!-- that end brackets for check timeline exits -->
<!-- start new task -->
 <div>
    <form id="newtask" uk-modal="center: true" class="model" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=newtask"
      method="post" style="display: none;"autocomplete="off">
    <div class="uk-modal-dialog" style="z-index: 999999">
        <div class="uk-modal-body">
            <label for="example-text-input" class="col-2 col-form-label" style="color: #0f6ecd;">Headline</label>
            <div class="col-10">
                <input class="form-control" value="" type="text" name="headline" placeholder="Type"
                       id="example-text-input" style="font-size:18px;" autocomplete="off">
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
</div>
<?php if($exit==1){ ?>
<div class="container">
    <footer class="page-header"></footer>

</div>

<?php } ?>
<!--  end task -->
<?php
if($page_num>1) {
    include_once 'paging.php';
}
include_once 'static/footer.php'
?>
<div class="editpading"style="margin-top: 4px">.</div>
</div>
</body>
</html>



