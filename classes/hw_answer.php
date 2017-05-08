<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 07/05/17
 * Time: 08:29 م
 */
include_once "../database/hw_answer_query.php";
class hw_answer
{
    private $hw_answer_query;
    public function __construct()
    {
        $this->hw_answer_query = new hw_answer_query();
    }
    public function add_hw_answer_return_id($hw_id,$stu_id){
        return $this->hw_answer_query->add_hw_answer_return_id($hw_id,$stu_id);
    }

    public function get_answer_id($hw_id,$stu_id){
        return $this->hw_answer_query->get_answer_id($hw_id,$stu_id);
    }
public function add_grade_and_comment_answer($hw_id,$stu_id,$grade,$comment){
        $this->hw_answer_query->add_grade_and_comment_answer($hw_id,$stu_id,$grade,$comment);
}


}