<?php
require_once 'UserModel.php';
class viewItemModel extends model
{
    /////////////////////////////////////////////////////////////////////////////////////////////
    protected $area;
    protected $price;
    protected $Payment;
    protected $contarctType;
    protected $Bathroom;
    protected $Rooms;
    public function getArea()
    {
        return $this->area;
    }
  
    public function setArea($area)
    {
        $this->area = $area;
    }
    public function getprice()
    {
        return $this->price;
    }
  
    public function setprice($price)
    {
        $this->price = $price;
    }
    public function getPayment()
    {
        return $this->Payment;
    }
  
    public function setPayment($Payment)
    {
        $this->Payment = $Payment;
    }
    public function getcontarctType()
    {
        return $this->contarctType;
    }
  
    public function setcontarctType($contarctType)
    {
        $this->contarctType = $contarctType;
    }
    public function getBathroom()
    {
        return $this->Bathroom;
    }
  
    public function setBathroom($Bathroom)
    {
        $this->Bathroom = $Bathroom;
    }
    public function getRooms()
    {
        return $this->Rooms;
    }
  
    public function setRooms($Rooms)
    {
        $this->Rooms = $Rooms;
    }




 
    public function Sort($offset, $no_of_records_per_page)
    {
        //SELECT * FROM `allestate` WHERE Area >= 300 AND Area < 400 
        $AllSort="TypeID=1 AND ";
        $join=" AS allestate, eav AS eav ";
        $AllJoin="AND eav.AllID = allestate.ID";
        $UltimateJoin="";
        if(!empty($this->area)){
            
          if($this->area==400){
            $AllSort.="Area >= ".$this->area;
            $AllSort.=" AND ";
          }
          else{
            $AllSort.="Area >= ".$this->area." AND Area <".$this->area+100;
            $AllSort.=" AND ";
          }
          
        }
        if(!empty($this->price)){
          $AllSort.="Price <= ".$this->price;
          $AllSort.=" AND ";
        }
        if(!empty($this->Payment)){
            $AllSort.="`Payment Method` = '".$this->Payment."'";
            $AllSort.=" AND ";
        }
        if(!empty($this->contarctType)){
            $AllSort.="offered = ".$this->contarctType;
            $AllSort.=" AND ";
        }
        if(!empty($this->Bathroom)){
            $UltimateJoin.=" AND ";
            $UltimateJoin.="eav.AtrributeID = 4 AND eav.Value=".$this->Bathroom;
            
        }
        if(!empty($this->Rooms)){
            $UltimateJoin.=" AND ";
            $UltimateJoin.="eav.AtrributeID = 3 AND eav.Value=".$this->Rooms;
        }
 
 
        
        $AllSort=substr_replace($AllSort ,"", -4);
        // $UltimateJoin=substr_replace($UltimateJoin ,"", -4);
        if(empty($AllSort)){
            $AllSort="1";
        }
        // echo $AllSort;
        // echo $UltimateJoin;
        // $this->dbh->query("SELECT * FROM `allestate`WHERE ".$AllSort." LIMIT $offset, $no_of_records_per_page");

        $QUERY= "SELECT * FROM `allestate`".$join."WHERE ".$AllSort.$AllJoin.$UltimateJoin." LIMIT $offset, $no_of_records_per_page";
        // echo $QUERY;
        $this->dbh->query($QUERY);
        $ALLRECORDS = $this->dbh->resultSet();
        if(empty($ALLRECORDS)){
            return 1;
        }
        return $ALLRECORDS;
    }



    ////////////////////////////////////////////////////////////////////////////////////////////
     public function GetCount()
     {
         $this->dbh->query("SELECT COUNT(*) as TD FROM `rents`");
 
         $ALLRECORDS = $this->dbh->single();
 
         return $ALLRECORDS;
     }
     public function ViewItemOn($offset, $no_of_records_per_page)
     {
         $this->dbh->query("SELECT * FROM `allestate`  LIMIT $offset, $no_of_records_per_page");
 
         $ALLRECORDS = $this->dbh->resultSet();
 
         return $ALLRECORDS;
     }
     
}

