<?php

/**
 * Created by PhpStorm.
 * User: mostafa saleh
 * Date: 4/28/2017
 * Time: 10:22 PM
 */
include_once "database.php";
class teacher_query
{
  private $db;
 public function __construct()
 {
     $this->db =database::get_instrance();
 }
public function add_new_Teacher($user_id,$sub_id){
      $query="INSERT INTO `teacher`(`teacher_id`, `sub_id`, `user_id`) VALUES (NULL ,'$sub_id','$user_id')";
      $this->db->excute_query($query);
 }
    public function edit_Teacher($teacherid,$tusername,$tfname,$tmname,$tlname,$temail,$tpass,$tcity,$tcontry,$tstreet,$tbirthdate,$tsup,$tclassid){
        $query="UPDATE `general_user` SET `username` = '$tusername', `password` = '$tpass', `first_name` = '$tfname', `mid_name` = '$tmname', `last_name` = '$tlname', `email` = '$temail', `city` = '$tcity', `country` = '$tcontry', `street` = '$tstreet', `birth_date` = '$tbirthdate' WHERE `general_user`.`id` = '$teacherid'";
        $this->db->excute_query($query);
        $query="";
        //query must edit to table teacher
    }
    public function delete_teacher($teacherid){
        $query="DELETE FROM `general_user` WHERE `general_user`.`general_user` = '$teacherid'";
        $row =$this->db->excute_query($query);
        $query="";
        //query must delete to table teacher
    }
    public function get_all_teachers(){
        $query="SELECT * FROM `teacher`,`general_user` WHERE teacher.user_id=general_user.id";
        return $this->db->excute_query($query)->fetchAll();
    }
    public function get_teacher_sub($tech_id){
        $query="SElECT sub_id from teacher where user_id ='$tech_id'";
        return $this->db->excute_query($query)->fetch();
    }
    public function get_teacher_class($id){
        $query="SELECT * FROM class_to_teacher ,class WHERE class_to_teacher.teacher_id=$id AND class.class_id=class_to_teacher.class_id";
        return $this->db->excute_query($query)->fetchAll();
    }
    public function get_teacher_id($id){
        $query="SELECT teacher_id FROM teacher WHERE user_id=$id";
        return $this->db->excute_query($query)->fetch()['teacher_id'];
    }

}