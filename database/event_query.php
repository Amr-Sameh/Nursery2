<?php

/**
 * Created by PhpStorm.
 * User: fatma
 * Date: 4/23/2017
 * Time: 3:35 PM
 */
include_once '../database/database.php' ;
class event_query
{
    private $db ;

    public function __construct()
    {
        $this->db = new database();
    }

    //TODO create object from the database
function add_event($title,$content,$place,$date,$image){
    $query="INSERT INTO event (title,content,place,date,image) VALUES ($title,$content,$place,$date,$image)" ;
    //TODO CALL FUUNCTION EXCUTE
    $this->db->excute_query($query);

}

function delet_event($id){
    $query="DELETE FROM event WHERE id =$id";
    //TODO CALL FUUNCTION EXCUTE
    $this->db->excute_query($query);
}
function geteventnumber(){
    $query="SELECT * FROM event";
    $result=$this->db->excute_query($query);
    return $result->rowCount();

}

function page_num($event_per_page){
    $event_num=$this->geteventnumber();
    if($event_num%$event_per_page==0)
        return $event_num/$event_per_page ;

    return ($event_num/$event_per_page)+1 ;

}

    /**
     * @param $start index in database to start from
     * @param $num number of events to get
     */
function getevent_from($start ,$num){
    $query="SELECT * FROM event LIMIT $start,$num";
  return  $this->db->excute_query($query)->fetchAll();
}

function update_event ($title,$content,$place,$date,$image){
    $query = "UPDATE event Set title= $title , content =$content ,place =$place , date=$date ,image =$image" ;
    //TODO CALL FUUNCTION EXCUTE
    $this->db->excute_query($query);
}
}

