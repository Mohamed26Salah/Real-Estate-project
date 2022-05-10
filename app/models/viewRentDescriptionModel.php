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


    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
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


    public function rentDetails() {
         
          $this->dbh->query("SELECT * FROM `rents` WHERE `code` = '$this->code'");
          

          $record = $this->dbh->single();

          return $record;

    }

    

    


}


