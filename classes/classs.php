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


}