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




}