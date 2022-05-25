<?php
require_once 'UserModel.php';

class viewRentDescriptionModel extends model
{
    protected $area;
    protected $type;
    protected $rentPrice;
    protected $code;
    protected $description;
    protected $furnished;
    protected $TOR;
    protected $TOREND;
    protected $Start_OF_Rent;
    protected $END_OF_Rent;
    protected $LessorName;
    protected $TenantName;
    protected $LessorNum;
    protected $TenantNum;
    protected $floor;
    protected $dotColor;
    protected $ID;


    public function getArea()
    {
        return $this->area;
    }
  
    public function setArea($area)
    {
        $this->area = $area;
    }

    public function getDotColor()
    {
        return $this->dotColor;
    }
  
    public function setDotColor($dotColor)
    {
        $this->dotColor = $dotColor;
    }
    public function getRentPrice()
    {
        return $this->rentPrice;
    }
  
    public function setRentPrice($rentPrice)
    {
        $this->rentPrice = $rentPrice;
    }

    public function getTypeID()
    {
        return $this->typeID;
    }
    public function setTypeID($typeID)
    {
        $this->typeID = $typeID;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }



    public function getCode()
    {
        return $this->code;
    }
    public function setCode($code)
    {
        $this->code = $code;
    }

   


    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
    }

    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function rentDetails() {
         
          $this->dbh->query("SELECT * FROM `rents` WHERE `ID` = '$this->ID'");
          

          $record = $this->dbh->single();
          $this->setID($record->ID);
          return $record;

    }
    public function showPropertyImage() {

        
        $this->dbh->query("SELECT * FROM `rentsimages` WHERE `RentsID` = ".$this->getID());

        $images = array();
       
        $records = $this->dbh->resultSet();
        if(empty($records)){
            return false;
        }
        foreach($records as $imgs) {
            array_push($images, "$imgs->Image");
        }

        
        return $images;
    }
    

    


}


