<?php
	
	include_once 'database.php';

/**
* 
*/
class student_qurey
{
	private $db;
	
	function __construct()
	{
		 $this->db= new database();
	}
	
	public function stu_exist($user_id,$level_id,$class_id){
		$query = "SELECT * FROM student WHERE user_id='$user_id' and level_id='$level_id' and class_id = '$class_id' LIMIT 1";
    	$check = $this->db->excute_query($query);
    	return ($check->rowCount() == 0) ? false : true;
    }
    
    public function insert_stu($stu_id,$class_id,$level_id,$stage,$emrg_person_name,$emrg_person_phone,$emrg_person_relation,$iq_grade){
    	$query = "INSERT INTO student (
    	stu_id,
    	stage,
    	emrg_person_name,
    	emrg_person_relation,
    	emrg_person_phone,
    	class_id,
    	level_id,
    	iq_grade) 
    	VALUES (
    	$stu_id,
    	$.stage,
    	$emrg_person_name,
    	$emrg_person_relation,
    	$emrg_person_phone,
    	$class_id,
    	$level_id,
    	$iq_grade)";
    	$db->exec($query);
    }

    public function insert_general_user($id,$group_id,$username,$password,$first_name,$mid_name,$last_name,$gender,$email,$city,$country,$street,$birth_date){

    	$query = "INSERT INTO general_user (
    	id,
    	group_id,
    	username,
    	password,
    	first_name,
    	mid_name,
    	last_name,
    	geneder,
    	email,
    	city,
    	country,
    	street,
    	birth_date)
    	VALUES (
    	$id,
    	$group_id,
    	$username,
    	$password,
    	$first_name,
    	$mid_name,
    	$last_name,
    	$geneder,
    	$email,
    	$city,
    	$country,
    	$street,
    	$birth_date
    	)";
    	$db->exec($query);

    }
}
