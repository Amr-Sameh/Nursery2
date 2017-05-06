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
 private $db;
 public  function __construct(){
    $this->db=new subject_query();
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
    public function get_all_subjects(){
        return $this->db->get_all_sub();
    }


    public function get_all_subjects_not_in_level($id){
        return $this->db->get_all_sub_not_in_level($id);
    }



}