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
}