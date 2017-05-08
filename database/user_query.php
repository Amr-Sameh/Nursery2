<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 23/04/17
 * Time: 12:37 م
 */
include_once 'database.php';

class user_query
{

    private $db;


    public function __construct()
    {
        $this->db = database::get_instrance();
    }


    public function check_exist($username, $pass)
    {

        $query = "SELECT * FROM general_user WHERE username='$username' and password='$pass' LIMIT 1";
        $check = $this->db->excute_query($query);
        if ($check->rowCount() == 0) {
            return false;
        } else {
            return true;
        }



}
    public function get_user_by_id($id){
        $query="SELECT * FROM  general_user WHERE id='$id' LIMIT 1";
     return   $this->db->excute_query($query)->fetch();
    }


    public function get_user_by_username($username)
    {
        $query = "SELECT * FROM  general_user WHERE username='$username' LIMIT 1";
        $row = $this->db->excute_query($query);
        return $row->fetch();
    }
    function generateRandomString($length = 4) {
        return substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
    }

    public function insert_user($first_name, $mid_name, $lastname, $gender, $group_id)
    {

        $rand="";
        while(true){
         $rand=$this->generateRandomString(8);
         $query="SELECT * FROM `general_user` WHERE username='$rand'";
         if($this->db->excute_query($query)->rowCount() ==0){
             break;
         }
      }

        $query = "INSERT INTO `general_user`(`id`, `group_id`, `username`, `password`, `first_name`, `mid_name`, `last_name`, `gender`, `email`, `city`, `country`, `street`, `birth_date`) 
                                VALUES (NULL ,$group_id,$rand,'123','$first_name','$mid_name','$lastname','$gender','' ,NULL ,NULL ,NULL ,NULL )";
        $this->db->excute_query($query);
        $query = "SELECT id from general_user where first_name='$first_name' and mid_name='$mid_name' and last_name='$lastname' ORDER  by id DESC limit 1";
        $row = $this->db->excute_query($query)->fetch();
        return $row['id'];
    }








    public function get_user_profile($id){
        $query="SELECT `first_name`, `mid_name` , `last_name` ,`email` ,`city` ,`country` ,`street` FROM `general_user` WHERE id=$id";
        return $this->db->excute_query($query)->fetch() ;

    }

    public function edit_user_profile($id,$user_name,$password){
        $query="UPDATE general_user SET username='$user_name' ,password='$password' WHERE id='$id'" ;
        $this->db->excute_query($query);
    }






}