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


    public function get_user_by_username($username)
    {
        $query = "SELECT * FROM  general_user WHERE username='$username' LIMIT 1";
        $row = $this->db->excute_query($query);
        return $row->fetch();
    }

    public function insert_user($first_name, $mid_name, $lastname, $gender, $group_id)
    {
        $query = "INSERT INTO `general_user`(`id`, `group_id`, `username`, `password`, `first_name`, `mid_name`, `last_name`, `gender`, `email`, `city`, `country`, `street`, `birth_date`) 
                                VALUES (NULL ,$group_id,'Temp_username','123','$first_name','$mid_name','$lastname','$gender','' ,NULL ,NULL ,NULL ,NULL )";

        $this->db->excute_query($query);
        $query = "SELECT id from general_user where first_name='$first_name' and mid_name='$mid_name' and last_name='$lastname' ORDER  by id DESC limit 1";
        $row = $this->db->excute_query($query)->fetch();
        return $row['id'];
    }


}