<?php

/**
 * Created by PhpStorm.
 * User: mostafa saleh
 * Date: 4/24/2017
 * Time: 12:07 PM
 */
include_once "../database/hw_query.php";
class hw
{
    public $id ;
    public $student_number ;
    public $max_student_num ;
    public $level_id ;
    private $hw_query;


  public  function __construct()
  {
      $this->hw_query=new hw_query();

  }

}