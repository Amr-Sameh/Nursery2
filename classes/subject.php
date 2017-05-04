<?php

/**
 * Created by PhpStorm.
 * User: MeGaCrazy
 * Date: 4/28/2017
 * Time: 8:23 PM
 */
include '../database/subject_query.php';

class subject
{
 private $name;
 private $level_id;
 private $sub_id;
 public  function __construct($name,$level_id,$sub_id){
     $this->name=$name;
     $this->level_id=$level_id;
     $this->sub_id=$sub_id;
 }
 public function get_name(){
     return $this->name;
 }
 public function get_level_id(){
     return $this->level_id;
 }
 public function get_sub(){
     return $this->sub_id;
 }
}