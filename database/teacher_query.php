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
  private $dp;
 public function __construct()
 {
     $this->dp =new database();
 }
public function add_new_Teacher($tusername,$tfname,$tlname,$temail,$tpass,$tgender,$tsup,$tclassid){
     $query="INSERT INTO `general_user` (`id`, `group_id`, `username`, `password`, `first_name`, `mid_name`, `last_name`, `gender`, `email`, `city`, `country`, `street`, `birth_date`) VALUES (NULL, '2', '$tusername', '$tpass', '$tfname', NULL, '$tlname', '$tgender', '$temail', NULL, NULL, NULL, NULL);";
     $this->dp->excute_query($query);
     $query="";
     //query must added to table teacher
 }
    public function edit_Teacher($teacherid,$tusername,$tfname,$tmname,$tlname,$temail,$tpass,$tcity,$tcontry,$tstreet,$tbirthdate,$tsup,$tclassid){
        $query="UPDATE `general_user` SET `username` = '$tusername', `password` = '$tpass', `first_name` = '$tfname', `mid_name` = '$tmname', `last_name` = '$tlname', `email` = '$temail', `city` = '$tcity', `country` = '$tcontry', `street` = '$tstreet', `birth_date` = '$tbirthdate' WHERE `general_user`.`id` = '$teacherid'";
        $this->dp->excute_query($query);
        $query="";
        //query must edit to table teacher
    }
    public function delete_teacher($teacherid){
        $query="DELETE FROM `general_user` WHERE `general_user`.`general_user` = '$teacherid'";
        $row =$this->db->excute_query($query);
        $query="";
        //query must delete to table teacher
    }
}