<?php

/**
 * Created by PhpStorm.
 * User: mostafa saleh
 * Date: 4/24/2017
 * Time: 12:07 PM
 */
include_once "../database/class_query.php";

class classs
{
    public $id ;
    public $student_number ;
    public $max_student_num ;
    public $level_id ;
  private $classquery;
  public  function __construct()
  {
      $this->classquery=new class_query();
  }
  public function getpostsofclass($id){
     return $this->classquery->get_posts_of_class($id);
  }
    public function getcommentsofpost($id){
        return $this->classquery->get_comments_of_post($id);
    }
  public function calculattime($date){
      $time= time()-$date;
      if($time<3600){
          return ceil($time/60). " mins";
      }else if($time<(60*60*24)){
          return floor($time/60/60)." hours";
      }else if($time<(60*60*24*30)){
          return floor($time/60/60/24)." days";
      }else if($time<(60*60*24*30*2)){
          return date("M d:h:m",$date);
      }else if($time<(60*60*24*30*12)){
          return date("M d",$date);
      }else{
          return date("y M d",$date);
      }

  }
  public function getuser($id){
      return $this->classquery->get_user($id);
  }

  public function addpost($userid,$classid,$postcontent){
      return $this->classquery->insert_new_post($userid,$classid,$postcontent);
  }
    public function addcomment($userid,$postid,$commentcontent){
        return $this->classquery->insert_new_comment($userid,$postid,$commentcontent);
    }
    public function removepst($postid){
        return $this->classquery->remove_post($postid);
    }
    public function editpost($newpost,$postid){
        return $this->classquery->edit_post($newpost,$postid);
    }
    public function removecoment($commentid){
        return $this->classquery->remove_comment($commentid);
    }
    public function editcomment($newcomment,$commentid){
        return $this->classquery->edit_comment($newcomment,$commentid);
    }
    public function reportpost($postid){
        return $this->classquery->report_post($postid);
    }

    public function add_class($student_number,$max_student_num,$level_id){
        $this->classquery->add_class($student_number,$max_student_num ,$level_id);
    }

    public function delete_class($id){
        $this->classquery->delet_class($id);
    }

    public function update_class($id,$student_number,$max_student_num,$level_id){
        $this->classquery->update_class($id,$student_number,$max_student_num,$level_id);
    }

    public function delet_student($student_id){
        $this->classquery->delet_student($student_id) ;
    }

    public function add_student($id , $student_id){
        $this->classquery->add_student($id,$student_id);

    }
    public function get_class_students($id){
       return $this->classquery->get_class_students($id);
    }


    public function get_id(){
        return $this->id;
    }
    public function get_student_number(){
        return $this->student_number;
    }
    public function get_max_student_num(){
        return $this->max_student_num;
    }
    public function get_level_id(){
        return $this->level_id;
    }
    public function set_id($id){
        $this->title=$id;
    }

    public function set_student_number($student_number){
        $this->date=$student_number;}

    public function set_max_student_num($max_student_num){
        $this->place=$max_student_num;}

    public function set_level_id($level_id){
        $this->content=$level_id;}







}