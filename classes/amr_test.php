<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 28/04/17
 * Time: 09:52 ص
 */
/*
 * ===========================================================================
 * ==                                                                       ==
 * ==    this is file is to test my classes functionality u can ignore it  ==
 * ==                                                                       ==
 * ===========================================================================
 */

    if(isset($_FILES['hw_upload'])){
include_once 'hw_class.php';
$hw=new hw();
$hw_id=$hw->add_hw_return_id($_POST['class_id'],$_POST['sub_id']);



        $tmp_file = $_FILES['hw_upload']['tmp_name'];
        $filename = $_FILES['hw_upload']['name'];
        $file_ex=substr($_FILES["hw_upload"]["name"], strrpos($_FILES["hw_upload"]["name"], ".") + 1);
        move_uploaded_file($tmp_file, '../upload/hw/' . $hw_id.".".$file_ex);


echo 'file Uploaded';



}
if (isset($_GET['action'])){
    include_once 'download.php';

    $x=$_GET['action'];
    $files = glob("../upload/hw/$x.*"); // Will find 2.txt, 2.php, 2.gif

// Process through each file in the list
// and output its extension
    if (count($files) > 0) {
        foreach ($files as $file) {
            $info = pathinfo($file);
        }

        download('../upload/hw/', $x . '.' . $info["extension"]);
        echo $x . '.' . $info["extension"];
    }


}

include_once 'level_class.php';
include_once '../database/level_query.php';

$level =new level_class();
//$level->add_level(5,"level 5",5);

$l=new level_query();
//$l->update_level("level 5",6,"level 9",6);
//download("","admin.php");

include_once 'download.php';

