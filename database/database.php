<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 23/04/17
 * Time: 12:44 م
 */
class database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "cia";
    private $database_connection;
    private $dsn = 'mysql:host=localhost;dbname=CIA';

    private $option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );

    public function __construct()
    {
        try {
          $this->database_connection = new PDO($this->dsn, $this->username, $this->password, $this->option);
            $this->database_connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            die('failed to connect to DataBase' . $e->getMessage());
        }
    }





public function excute_query($query){

        $value=$this->database_connection->prepare($query);
        $value->execute();
        return $value;
}






}