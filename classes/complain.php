<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 08/05/17
 * Time: 09:19 ص
 */
include_once '../database/comp_query.php';
class complain
{
private $compquery;

    public  function __construct()
    {
        $this->compquery=new comp_query();
    }
    public function in($id,$content){
        $this->compquery->in($id,$content);
    }
    public function out(){
       return $this->compquery->out();
    }

}