<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 23/04/17
 * Time: 12:30 م
 */
include_once '../database/user_query.php';

class user
{



    private $id;
    private $group_id;
    private $pass;
    private $username;
    private $f_name;
    private $m_name;
    private $l_name;
    private $gender;
    private $email;
    private $city;
    private $contry;
    private $street;
    private $birthdate;
    private $user_query;




    public function __construct()
    {
        $this->user_query=new user_query();
    }


    public function login($username , $pass){
        //TODO clean the inputs
        if($this->user_query->check_exist($username,$pass)==1){

            $user_info=$this->user_query->get_user_by_username($username);
            $_SESSION['user_type']=$user_info['group_id'];
            $_SESSION['user_id']=$user_info['id'];
            $_SESSION['first_name']=$user_info['first_name'];



            //TODO decide what's better cockies or sessien
            //TODO Move to app main page
            return $user_info['group_id'];

        }



    }
    public function logout(){
        session_destroy();

    }
    public  function  insert_user($first_name,$mid_name,$last_name,$gender,$group_id){
        return $this->user_query->insert_user($first_name,$mid_name,$last_name,$gender,$group_id);
    }







































    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param mixed $group_id
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getFName()
    {
        return $this->f_name;
    }

    /**
     * @param mixed $f_name
     */
    public function setFName($f_name)
    {
        $this->f_name = $f_name;
    }

    /**
     * @return mixed
     */
    public function getMName()
    {
        return $this->m_name;
    }

    /**
     * @param mixed $m_name
     */
    public function setMName($m_name)
    {
        $this->m_name = $m_name;
    }

    /**
     * @return mixed
     */
    public function getLName()
    {
        return $this->l_name;
    }

    /**
     * @param mixed $l_name
     */
    public function setLName($l_name)
    {
        $this->l_name = $l_name;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getContry()
    {
        return $this->contry;
    }

    /**
     * @param mixed $contry
     */
    public function setContry($contry)
    {
        $this->contry = $contry;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }


}