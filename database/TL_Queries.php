<?php

/**
 * Created by PhpStorm.
 * User: MeGaCrazy
 * Date: 4/20/2017
 * Time: 3:46 PM
 */
include_once 'database.php';
class TL_Queries

{
    private $db;

    public function __construct()
    {
        $this->db =database::get_instrance();
    }

    public function insert_NewTl($tldate, $headline, $content, $id)
    {
        $check=date("y-m-d H:i:s");
        if($check>$tldate)return;
        $query="INSERT INTO timeline (`fr_tech_id`,`tldate`,`headline`,`content`) VALUES('$id','$tldate','$headline','$content')";
        $this->db->excute_query($query);
    }

    public function update_TL($tldate, $headline, $content, $id,$tl_id)
    {
        $query ="UPDATE timeline set tldate='$tldate',headline='$headline',content='$content'where fr_tech_id='$id' and tl_id='$tl_id'";
        $this->db->excute_query($query);
    }

    public function delete_useless($id)
    {
        $query ="SELECT headline,tldate,content,tl_id FROM timeline WHERE fr_tech_id= '$id' ORDER BY tldate ASC";
        $count=$this->db->execute($query)->rowCount();
        if ($count > 0) {
            $query =("DELETE FROM timeline where tldate<CURRENT_TIMESTAMP and fr_tech_id='$id'");
            $this->db->excute_query($query);
        }
    }
    public function delete_spTL($id,$tl_id)
    {
        $query ="SELECT headline,tldate,content FROM timeline WHERE fr_tech_id= '$id' and tl_id='$tl_id'";
        $count=$this->db->excute_query($query)->rowCount();
        if ($count > 0) {
            $query = ("DELETE FROM timeline where tl_id='$tl_id' and fr_tech_id='$id'");
            $this->db->excute_query($query);
        }
    }
    public function get_tasks($id){
        $query ="SELECT headline,tldate,content,tl_id FROM timeline WHERE fr_tech_id= '$id' ORDER BY tldate ASC";
        return $this->db->excute_query($query);
    }
    public function check_exist($id){
        $query ="SELECT headline,tldate,content FROM timeline WHERE  fr_tech_id= '$id'";
        $count=$this->db->excute_query($query)->rowCount();
        if($count>=1){
            return 1;
        }
        else return 0;
    }
}