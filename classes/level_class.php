<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 28/04/17
 * Time: 09:46 ص
 */
include_once '../database/level_query.php';
class level_class
{
    private $id;
    private $stage;
    private $name;
    private $value;
    private $level_query;




    public function __construct()
    {
        $this->level_query=new level_query();
    }



    public function add_level(){
        $this->level_query->insert_level($this->stage,$this->name,$this->value);

    }
    public function edit_level($name,$stage,$value){
        $this->level_query->update_level($this->name,$stage,$name,$value);

    }
    public function add_subject($subjects_id){
        $this->level_query->insert_subject($this->name,$subjects_id);
    }
    public function remove_level(){
        $this->level_query->delete_level($this->name);
    }
    public function remove_sub($sub_id){
        $this->level_query->delete_sub($this->name,$sub_id);

    }
    public function get_level_by_name($level_name){

        $this->name=$level_name;
       $info= $this->level_query->get_level_by_name($this->name);
        $this->stage=$info['stage'];
        $this->value=$info['val'];
        $this->id=$info['id'];

    }
    public function classes_num(){
        return $this->level_query->get_classes_num($this->id);
    }

    /**
     * @return level_query
     */
   












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
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * @param mixed $stage
     */
    public function setStage($stage)
    {
        $this->stage = $stage;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

}
