<?php

/**
 * Created by PhpStorm.
 * User: meir
 * Date: 15/04/17
 * Time: 12:07 م
 */
/* inclu*/

include_once '../database/event_query.php' ;

class event_class
{
    public $id ;
    public $title ;
    public $date ;
    public $place ;
    public $content ;
    public $image ;
    private $query ;
    private $goin ;

    public function __construct()
    {
        $this->query = new event_query();
    }

    public function add_event($content,$title,$date,$place,$image)
    {

        $this->query->add_event($title,$content,$place,$date,$image) ;
    }

    public function delet_event($id)
    {
        $this->query->delet_event($id) ;
    }

    public function update_event($title,$content,$place,$date,$image)
    {
        $this->query->update_event($title,$content,$place,$date,$image );
    }

    public  function getevent_from(){
        return $this->query->getevent_from();
    }

    public function page_num($event_per_page){
        return $this->query->page_num($event_per_page) ;
    }


    public function get_title(){
        return $this->title;
    }
    public function get_date(){
        return $this->date;
    }
    public function get_place(){
        return $this->place;
    }
    public function get_content(){
        return $this->content;
    }
    public function get_image()
    {
        return $this->image;
    }
    public function get_goin(){
        return $this->goin;
    }

    public function set_title($title){
        $this->title=$title;
    }

    public function set_date($date){
        $this->date=$date;}

    public function set_place($place){
        $this->place=$place;}

    public function set_content($content){
        $this->content=$content;}

    public function set_image($image){
        $this->image=$image;
    }

    public function set_goin($goin){
        $this->goin=$goin ;
    }



}



?>
