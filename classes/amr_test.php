<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 28/04/17
 * Time: 09:52 ص
 */
/*
 * ===========================================================================
 * ==                                                                       ==
 * ==    this is file is to test my classes functionality u can ignore it  ==
 * ==                                                                       ==
 * ===========================================================================
 */


include_once 'level_class.php';
include_once '../database/level_query.php';

$level =new level_class();
//$level->add_level(5,"level 5",5);

$l=new level_query();
//$l->update_level("level 5",6,"level 9",6);
include_once '../database/class_query.php';
$f=new class_query();
print_r($f->insert_class('omer','5','Level 9'));


