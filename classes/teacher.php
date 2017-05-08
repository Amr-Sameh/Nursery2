<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 26/04/17
 * Time: 10:15 ص
 */
include_once "../database/teacher_query.php";
include_once "user.php";
class teacher extends user
{
private $Teacherid;
private  $subjectid;
private $classsid;
private $userid;
private $teacherquery;

public function __construct()
{
    $this->teacherquery =new teacher_query();
}

public function addnewTeacher($user_id,$sub_id){
  $this->teacherquery->add_new_Teacher($user_id,$sub_id);
}
    public function editteacher($teacherid,$tusername,$tfname,$tmname,$tlname,$temail,$tpass,$tcity,$tcontry,$tstreet,$tbirthdate,$tsup,$tclassid){
        return $this->teacherquery->edit_Teacher($teacherid,$tusername,$tfname,$tmname,$tlname,$temail,$tpass,$tcity,$tcontry,$tstreet,$tbirthdate,$tsup,$tclassid);
    }
    public function deletteacher($teacherid){
        return $this->teacherquery->delete_teacher($teacherid);
    }
    public function get_all_teachers(){
        return $this->teacherquery->get_all_teachers();
    }

    public function get_teacher_sub($techid){

      return $this->teacherquery->get_teacher_sub($techid);
    }

    public function addteacherclass($classid,$teid){
        $this->teacherquery->addteacherclass($classid,$teid);
    }

    function get_teacher_class($id){
        return $this->teacherquery->get_teacher_class($id);
    }

    function get_teacher_id($id){
        return $this->teacherquery->get_teacher_id($id);
    }



    /**
     * @return mixed
     */
    public function getTeacherid()
    {
        return $this->Teacherid;
    }

    /**
     * @param mixed $Teacherid
     */
    public function setTeacherid($Teacherid)
    {
        $this->Teacherid = $Teacherid;
    }

    /**
     * @return mixed
     */
    public function getSubjectid()
    {
        return $this->subjectid;
    }

    /**
     * @param mixed $subjectid
     */
    public function setSubjectid($subjectid)
    {
        $this->subjectid = $subjectid;
    }

    /**
     * @return mixed
     */
    public function getClasssid()
    {
        return $this->classsid;
    }

    /**
     * @param mixed $classsid
     */
    public function setClasssid($classsid)
    {
        $this->classsid = $classsid;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

}