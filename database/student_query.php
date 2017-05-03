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
		 $this->db=database::get_instrance();
	}
	
	public function stu_exist($stu_id){
		$query = "SELECT * FROM student WHERE stu_id='$stu_id' LIMIT 1";
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
    	'NULL',
    	'$stage',
    	'$emrg_person_name',
    	'$emrg_person_relation',
    	'$emrg_person_phone',
    	'$class_id',
    	'$level_id',
    	'$iq_grade')";
    	$this->db->excute_query($query);
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
    	'$id',
    	'$group_id',
    	'$username',
    	'$password',
    	'$first_name',
    	'$mid_name',
    	'$last_name',
    	'$gender',
    	'$email',
    	'$city',
    	'$country',
    	'$street',
    	'$birth_date'
    	);
    	INSERT INTO student (user_id) VALUES ('$user_id')";
    	$this->db->excute_query($query);

    }

    public function delete_stu_stuT($stu_id){
    	$query = "DELETE FROM student where stu_id = '$stu_id'";
    	$db->exec($query);
    }

    public function delete_stu_userT($user_id){
    	$query = "DELETE FROM general_user where user_id = '$user_id'";
    	$db->exec($query);
    }
    public function edit_stu_info($user_id,$stu_id,$class_id,$level_id,$emrg_person_name,$emrg_person_relation,$emrg_person_phone,$iq_grade,$stage){
    	$query = "UPDATE student SET stu_id = '$stu_id',stage = '$stage',emrg_persone_name = '$emrg_persone_name',emrg_persone_relation = '$emrg_persone_relation',emrg_persone_phone = '$emrg_persone_phone',class_id = '$class_id',level_id = '$level_id',iq_grade = '$iq_grade' WHERE user_id = '$user_id'";
    	$db->exec($query);
    }
}
