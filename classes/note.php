<?php

/**
 * Created by PhpStorm.
 * User: mostafa saleh
 * Date: 5/5/2017
 * Time: 11:55 PM
 */
include "../database/note_query.php";
class note
{
 private  $dp;
 public function __construct()
 {
     $this->dp=new note_query();
 }
 public function getnote($id,$time){
     return $this->dp->get_note($id,$time);
 }
}