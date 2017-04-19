<?php
/**
 * Created by PhpStorm.
 * User: PC - MeiR
 * Date: 3/7/2017
 * Time: 5:58 PM
 */

/*
=======================================================================

==============          Connect To DataBase         ===================

=======================================================================
*/

/*
 * editable values
 */

$host="localhost";
$dbname="test";
$user="root";
$pass="";

/**************************************************************************************************/

$dsn='mysql:host='.$host.';dbname='.$dbname;
$option=array(
    PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',
);
try{
    $con =new PDO($dsn,$user,$pass,$option);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo $e->getMessage();
}






