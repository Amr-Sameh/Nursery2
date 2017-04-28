<?php
/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 3/10/2017
 * Time: 5:22 PM
 */
if(isset($_POST['upload'])) {
    echo $_FILES['filee']['tmp_name'];

}
include_once 'static/header.php' ;
include_once '../database/class_query.php';
?>
<?php
?>


<?php
include 'static/footer.php';
?>


