<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 03/05/17
 * Time: 09:47 م
 */
include_once '../database/database.php' ;

class subject_query
{
    private $db ;

    public function __construct()
    {
        $this->db = new database();
    }

    public function get_subject_hw_by_id($id)
    {
    	$query = "SELECT * FROM hw WHERE sub_id ='$id'";
    	return $this->db->excute_query($query)->fetchAll();
    }

public function get_all_sub_not_in_level($level_id){
        if ($level_id==null)
            $level_id='';
    $query = "SELECT * FROM subject WHERE subject.id NOT IN (SELECT sub_id FROM level_to_sub WHERE level_id=$level_id)";
    return $this->db->excute_query($query)->fetchAll();
}


}