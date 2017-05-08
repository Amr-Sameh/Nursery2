<?php
/**
 * Created by PhpStorm.
 * User: mostafa saleh
 * Date: 5/5/2017
 * Time: 11:37 PM
 */
if($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['action'])) {
          include "../classes/note.php";
          $not=new note();
          $r=date('Y-m-d H:i:s');
          $list= $not->getnote($_POST['action'],date('Y-m-d H:i:s',strtotime($r)-1));
          foreach ($list as $not){
                  echo $not['not_content'].'<br>';
                  echo $not['not_date'].'<br>';

          }
        exit();
        }}
?>