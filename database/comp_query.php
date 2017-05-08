
<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 08/05/17
 * Time: 09:21 ص
 */
include_once '../database/database.php' ;

class comp_query
{

    private $db ;

    public function __construct()
    {
        $this->db = new database();
    }

    public function in($id,$content){
        $query="INSERT INTO complain (content,user_id) VALUES ('$content', $id)";
        $this->db->excute_query($query);
    }


    public function out(){
        $query="SELECT * FROM complain";
      return  $this->db->excute_query($query)->fetchAll();
    }

}