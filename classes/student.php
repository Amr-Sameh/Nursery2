﻿<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 26/04/17
 * Time: 10:15 ص
 */
include "../database/student_query.php";

class student extends user 
{

	private $class_id;
	private $level_id;
	private $stu_id;
	private $emrg_person_name;
	private $emrg_person_relation;
	private $emrg_person_phone;
	private $iq_grade;
	private $stage;
	private $student_query;

	public function __construct()
    {
        $this->student_query=new student_query();
    }

    
    public function addStudent(){
    	 if(!$this->student_query->check_exist($this->stu_id)){
    		$this->student_query->insert_stu($this->stu_id,$this->class_id,$this->level_id,$this->emrg_person_name,$this->emrg_person_relation,$this->emrg_person_phone,$this->stage,$this->iq_grade);
    	}
    }

    /*
     *  insert new student michael edit
     * */
    public  function insert_student($user_id,$level_id,$class_id){
        $this->student_query->insert_student($user_id,$level_id,$class_id);
    }




    public function deleteStudent_StudentTable(){
    	if($this->student_query->check_exist($this->stu_id)){
    		$this->student_query->delete_stu_stuT($this->stu_id);
    	}
    }

    public function deleteStudent_UserTable($user_id){
    	if($this->student_query->check_exist($user_id)){
    		$this->student_query->delete_stu_userT($user_id);
    	}
    }

    public function update_student_info($stu_id){
    if($this->student_query->check_exist($this->user_id)){
    		$this->student_query->edit_stu_info($this->user_id,$stu_id,$this->class_id,$this->level_id,$this->emrg_person_name,$this->emrg_person_relation,$this->emrg_person_phone,$this->iq_grade,$this->stage);
    	}	
    }
 	
 	public function setClass_id($class_id){
    	$this->class_id = $class_id;
    }

    public function setLevel_id($level){
    	$this->level_id = $level;
    }

    public function setStu_id($stu_id){
    	$this->stu_id = $stu_id;
    }

    public function setStage($stage){
    	$this->stage = $stage;
    }
    public function setEmrg_person_name($emrg_person_name){
    	$this->emrg_person_name = $emrg_person_name;
    }

    public function setEmrg_person_relation($emrg_person_relation){
    	$this->emrg_person_relation = $emrg_person_relation;
    }

    public function setEmrg_person_phone($emrg_person_phone){
    	$this->emrg_person_phone = $emrg_person_phone;
    }

    public function setIq_grade($iq_grade){
    	$this->emrg_person_name = $this->emrg_person_name;
    }
    
    public function getClass_id(){
    	return $this->class_id;
    }
    
    public function getLevel_id(){
    	return $this->level_id;
    }

    public function getStu_id(){
    	return $this->stu_id;
    }

    public function getEmrg_person_name(){
    	return $this->emrg_person_name;
    }

    public function getEmrg_person_relation(){
    	return $this->emrg_person_relation;
    }

    public function getEmrg_person_phone(){
    	return $this->emrg_person_relation;
    }

    public function getIq_grade(){
    	return $this->iq_grade;
    }
}