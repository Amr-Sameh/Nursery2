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
include_once 'subject.php';
$f=new subject_query();
print_r($f->get_all_sub_not_in_level(9));


