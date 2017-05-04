<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 28/04/17
 * Time: 10:09 ص
 */
include_once 'database.php';
class level_query
{

    private $db;


    public function __construct()
    {
        $this->db= new database();
    }


    public function insert_level($name){

        $query="INSERT INTO level (name)  VALUES ('$name')";
        $this->db->excute_query($query);

    }


    public function update_level($oldname,$name){
        $id=$this->get_level_id($oldname);
        $query="UPDATE `level` SET `name`='$name'  WHERE `id`=$id";
        $this->db->excute_query($query);

    }

    /**
     * @param array of subjects
     * @param level name
     */
    public function insert_subject($id , $subjects_id){
        $level_id=$id;
        foreach ($subjects_id as $sub_id){
            $query="INSERT INTO `level_to_sub` (`level_id`,`sub_id`) VALUES ('$level_id','$sub_id')";
            $this->db->excute_query($query);

        }

    }




    public function delete_level($level_id){
        $query="DELETE FROM `level` WHERE `level`.`id` = $level_id";
        $this->db->excute_query($query);

    }

    public function delete_sub($level_name,$sub_id){
        $level_id=$this->get_level_id($level_name);
        $query="DELETE FROM `level_to_sub` WHERE `level_id`='$level_id' AND `sub_id`='$sub_id'";
        $this->db->excute_query($query);
    }

    public function get_level_by_name($level_name){
        $query="SELECT * FROM `level` WHERE `name`='$level_name'";
        return  $this->db->excute_query($query)->fetch();
    }
    public function get_level_subjects(){
        //TODO imlement this
    }

public function get_classes_num($level_id){
        $query="SELECT * FROM `class` WHERE `level_id`='$level_id'";
        return $this->db->excute_query($query)->rowCount();
}

private function get_level_id($name){
        $query="SELECT `id` FROM level WHERE `name`='$name'";
       $result= $this->db->excute_query($query)->fetch();
        return$result['id'];

}

public function get_level_classes_by_level_id($level_id){
    $query="SELECT * FROM `class` WHERE `level_id`='$level_id'";
    return $this->db->excute_query($query)->fetchAll();

}

public function get_all_levels(){
    $query="SELECT * FROM level ";
   return $this->db->excute_query($query)->fetchAll();
}

public function get_level_subjects_by_id($id){
    $query="SELECT * FROM `subject`,`level_to_sub` WHERE `id`=`sub_id` AND `level_id`='$id'";
    return $this->db->excute_query($query)->fetchAll();
}

public function level_by_id($id){
    $query="SELECT * FROM `level` WHERE `id`='$id'";
    return $this->db->excute_query($query)->fetch();

}



}