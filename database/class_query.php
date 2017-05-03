<?php

/**
 * Created by PhpStorm.
 * User: mostafa saleh
 * Date: 4/24/2017
 * Time: 12:06 PM
 */
include_once "database.php";
include_once "user_query.php";
include_once '../classes/subject.php';
class class_query
{
    private $db;


    public function __construct()
    {
        $this->db= new database();

    }

    /**
     * @param $id
     * @return array
     */
    public function get_posts_of_class($id){
        $query="SELECT * FROM  post WHERE class_id='$id' ORDER BY post_id DESC";
        $row =$this->db->excute_query($query);
        return $row->fetchAll();
    }
    public function get_comments_of_post($id){
        $query="SELECT * FROM  comment WHERE post_id='$id' ORDER BY post_id DESC";
        $row =$this->db->excute_query($query);
        return $row->fetchAll();
    }

    public function insert_new_post($userid,$classid,$postcontent){
        $query="INSERT INTO post VALUES (null,'$classid','$postcontent', '$userid', CURRENT_TIMESTAMP,'0')";
        $row =$this->db->excute_query($query);

    }
    public function insert_new_comment($userid,$postid,$commentcontent){
        $query="INSERT INTO `comment` (`comment_id`, `comment_content`, `post_id`, `user_id`, `Ccomment_date`) VALUES (NULL, '$commentcontent', '$postid', '$userid', CURRENT_TIMESTAMP)";
        $row =$this->db->excute_query($query);

    }
    public function remove_post($postid){
        $query="DELETE FROM `post` WHERE `post`.`post_id` = '$postid'";
        $row =$this->db->excute_query($query);
    }
    public function remove_comment($commentid){
        $query="DELETE FROM `comment` WHERE `comment`.`comment_id` = '$commentid'";
        $row =$this->db->excute_query($query);
    }
    public function edit_post($newpost,$postid){
        $query="UPDATE `post` SET `post_content` = '$newpost' WHERE `post`.`post_id` = '$postid'";
        $row =$this->db->excute_query($query);
    }
    public function edit_comment($newcomment,$commentid){
        $query="UPDATE `comment` SET `comment_content` = '$newcomment' WHERE `comment`.`comment_id` = '$commentid'";
        $row =$this->db->excute_query($query);
    }
    public function report_post($postid){
        $query="UPDATE `post` SET `post_report` = '1' WHERE `post`.`post_id` = '$postid'";
        $row =$this->db->excute_query($query);
    }
    public function get_user($id){
        $userdp=new user_query();
        return $userdp->get_user_by_id($id);
    }
    public function get_subjects(){
        $query="SELECT * FROM `subject` ";
        $ret=$this->db->excute_query($query);
        $all_sub=array();
        while($row=$ret->fetch()) {
            echo $row['name'];
            echo $row['level_id'];
            echo $row['id'];
            $sub=new subject($row['name'],$row['level_id'],$row['id']);
            array_push($all_sub,$sub);
        }
        return $all_sub;
    }




    public function add_class($student_number,$max_student_num,$level_id) {
        $query="INSERT INTO class (student_num,max_student_num,level_id) VALUES ($student_number,$max_student_num,$level_id)" ;

        //TODO CALL FAUNCTION EXCUTE
        $this ->db ->excute_query($query);
    }

    public function delet_class($id){
        $query="DELETE FROM class WHERE id=$id";

        //TODO CALL FAUNCTION EXCUTE
        $this->db->excute_query($query);
    }

    public function update_class($class_id,$student_number,$max_student_num,$level_id){
        $query="UPDATE class SET student_number=$student_number , max_student_num=$max_student_num, level_id=$level_id WHERE id=$class_id";

        //TODO CALL FAUNCTION EXCUTE
        $this->db->excute_query($query);
    }

    public function add_student($class_id , $stu_id){
        $query="UPDATE `student` SET `class_id`='$class_id' WHERE `stu_id`='$stu_id' ";

        //TODO CALL FAUNCTION EXCUTE
        $this->db->excute_query($query);
        $stu_num=$this->stu_num($class_id)+1;
        $query=" UPDATE `class` SET `students_num`=$stu_num";
        $this->db->excute_query($query);
    }

    public function stu_num ($class_id){
        $query="SELECT students_num FROM class WHERE class_id=$class_id" ;
       return $this->db->excute_query($query)->fetch()['students_num'];

    }

    public function delet_student($class_id , $stu_id){
        $query="UPDATE `student` SET `class_id`=NULL  WHERE `stu_id`='$stu_id' " ;

        //TODO CALL FAUNCTION EXCUTE
        $this->db->excute_query($query)  ;
        $stu_num=$this->stu_num($class_id)-1;
        $query=" UPDATE `class` SET `students_num`=$stu_num";
        $this->db->excute_query($query);

    }

    public function get_class_students($class_id,$level_id){
        $query="SELECT * FROM `student`,`general_user` WHERE student.user_id=general_user.id AND level_id=$level_id AND class_id=$class_id";
       return $this->db->excute_query($query)->fetchAll();
    }

}