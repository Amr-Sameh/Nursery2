<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 03/05/17
 * Time: 09:47 م
 */
include_once '../database/database.php' ;

class hw_query
{
    private $db ;

    public function __construct()
    {
        $this->db = new database();
    }
    public function get_student_hw_answer($id)
    {
        $query="SELECT * FROM `class`,`subject`,`level_to_sub` WHERE `class_id`='$id' AND level_to_sub.level_id = class.level_id AND id = level_to_sub.sub_id ";
        return $this->db->excute_query($query)->fetchAll();
    }


    public function add_hw_return_id($class_id,$sub_id,$dead){
        $query="INSERT INTO `hw`( `sub_id`, `class_id` , `dead_line`) VALUES ($sub_id,$class_id,'$dead')";
      $this->db->excute_query($query);
        $query="SELECT `hw_id` FROM `hw` ORDER BY `hw_id` DESC LIMIT 1";
        return $this->db->excute_query($query)->fetch()['hw_id'];

    }

}