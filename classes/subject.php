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
 private $subject_query;
 public  function __construct(){
    $this->subject_query=new subject_query();
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
        return $this->subject_query->get_all_sub();
    }
    public function get_sub_class_hw($subid,$classid){
        return $this->subject_query->get_subject_class_hw_by_id($subid,$classid);
}

    public function get_all_subjects_not_in_level($id){
        return $this->subject_query->get_all_sub_not_in_level($id);
    }



}