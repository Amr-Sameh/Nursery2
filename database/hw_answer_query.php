<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 07/05/17
 * Time: 08:30 م
 */
include_once "database.php";
class hw_answer_query
{

    private $db;
    public function __construct()
    {
        $this->db=new database();
    }
    public function add_hw_answer_return_id($hw_id,$stu_id){
        $query="INSERT INTO `hw_answer`( `hw_id`, `stu_id`) VALUES ($hw_id,$stu_id)";
        $this->db->excute_query($query);
        $query="SELECT `answer_id` FROM `hw_answer` ORDER BY `answer_id` DESC LIMIT 1";
        return $this->db->excute_query($query)->fetch()['answer_id'];
    }

    public function get_answer_id($hw_id,$stu_id){
        $query="SELECT * FROM `hw_answer` WHERE  `stu_id` = '$stu_id' AND `hw_id`= '$hw_id' LIMIT 1";
        if($this->db->excute_query($query)->rowCount()==0){
            return array(
                "grade"=> 0,
                "comment"=>"",
                "answer_id"=>-1
            );
        }else{
        return $this->db->excute_query($query)->fetch();}
    }

     public function add_grade_and_comment_answer($hw_id,$stu_id,$grade,$comment){
         $query="SELECT * FROM `hw_answer` WHERE  `stu_id` = '$stu_id' AND `hw_id`= '$hw_id' LIMIT 1";
         if($this->db->excute_query($query)->rowCount()==0){
             $query="INSERT INTO `hw_answer`( `hw_id`, `stu_id`,`grade`,`comment`) VALUES ($hw_id,$stu_id,$grade,$comment)";
             $this->db->excute_query($query);
         }else{
             $query="UPDATE `hw_answer` SET `grade` = '$grade', `comment` = '$comment' WHERE `hw_id` = '$hw_id' AND `stu_id`= '$stu_id'";
             $this->db->excute_query($query);
         }
     }

}
?>