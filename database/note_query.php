<?php

/**
 * Created by PhpStorm.
 * User: mostafa saleh
 * Date: 5/5/2017
 * Time: 11:55 PM
 */
include "database.php";
class note_query
{
private $db;
public function __construct()
{
    $this->db=new database();
}
public function get_note($id,$time){
    $query="SELECT * from `notification` WHERE `reciver_id`='$id' AND `not_date`='$time'";
    $row=$this->db->excute_query($query);
    return $row->fetchAll();
}
}