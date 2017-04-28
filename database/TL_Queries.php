<?php

/**
 * Created by PhpStorm.
 * User: MeGaCrazy
 * Date: 4/20/2017
 * Time: 3:46 PM
 */
class TL_Queries

{
    private $connect;

    public function __construct($con)
    {
        $this->connect = $con;
    }

    public function insert_NewTl($tldate, $headline, $content, $id)
    {
        $check=date("y-m-d H:i:s");
        if($check>$tldate)return;
        $stmt = $this->connect->prepare("INSERT INTO timeline (`id`,`tldate`,`headline`,`content`) VALUES('$id','$tldate','$headline','$content')");
        $stmt->execute();
    }

    public function update_TL($tldate, $headline, $content, $id,$tl_id)
    {
        $stmt = $this->connect->prepare("UPDATE timeline set tldate='$tldate',headline='$headline',content='$content'where id='$id' and tl_id='$tl_id'");
        $stmt->execute();
    }

    public function delete_useless($id)
    {
        $stmt = $this->connect->prepare("SELECT headline,tldate,content,tl_id FROM timeline WHERE id= ? ORDER BY tldate ASC");
        $stmt->execute(array($id));
        $count = $stmt->rowCount();
        if ($count > 0) {
            $stmt = $this->connect->prepare("DELETE FROM timeline where tldate<CURRENT_TIMESTAMP and id=?");
            $stmt->execute(array($id));
        }
    }
    public function delete_spTL($id,$tl_id)
    {
        $stmt = $this->connect->prepare("SELECT headline,tldate,content FROM timeline WHERE id= ?  ORDER BY tldate ASC");
        $stmt->execute(array($id));
        $count = $stmt->rowCount();
        if ($count > 0) {
            $stmt = $this->connect->prepare("DELETE FROM timeline where tl_id=? and id=?");
            $stmt->execute(array($tl_id,$id));
        }
    }
    public function get_tasks($id){
        $stmt = $this->connect->prepare("SELECT headline,tldate,content,tl_id FROM timeline WHERE id= '$id' ORDER BY tldate ASC");
        $stmt->execute();
        return $stmt;
    }
    public function check_exist($id,$tldate){
        $stmt = $this->connect->prepare("SELECT headline,tldate,content FROM timeline WHERE tldate=? and id= ? ORDER BY tldate ASC");
        $stmt->execute(array($tldate,$id));
        if($stmt->rowCount()>1){
            return 0;
        }
        else return 1;
    }
}