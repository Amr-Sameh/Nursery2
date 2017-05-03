<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 26/04/17
 * Time: 10:15 ص
 */
include_once "../database/teacher_query.php";
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

public function addnewTeacher($tusername,$tfname,$tlname,$temail,$tpass,$tgender,$tsup,$tclassid){
  return $this->teacherquery->add_new_Teacher($tusername,$tfname,$tlname,$temail,$tpass,$tgender,$tsup,$tclassid);
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