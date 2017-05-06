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
          echo $r;
          $list= $not->getnote($_POST['action'],date('Y-m-d H:i:s'));
          foreach ($list as $note){
                  echo $note['not_content'].'<br>';
                  echo $note['not_date'].'<br>';

          }
        exit();
        }}
?>