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
    $this->db= new database();
}


public function check_exist($id , $pass){

    $query = "SELECT * FROM general_user WHERE id='$id' and password='$pass' LIMIT 1";
    $check = $this->db->excute_query($query);
    return ($check->rowCount() == 0) ? false : true;


}


public function get_user_by_id($id){
    $query="SELECT * FROM  general_user WHERE id='$id' LIMIT 1";
    $row =$this->db->excute_query($query);
    return $row->fetch();
}



}