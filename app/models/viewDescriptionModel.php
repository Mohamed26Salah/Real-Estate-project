<?php
require_once 'UserModel.php';

class viewDescriptionModel extends model
{
    protected $area;
    protected $type;
    protected $name;
    protected $price;
    protected $code;
    protected $bathroom;
    protected $rooms;
    protected $description;
    protected $ID;
    protected $typeID;


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


    public function getBathroom()
    {
        return $this->bathroom;
    }
  
    public function setBathroom($bathroom)
    {
        $this->bathroom = $bathroom;
    }
    public function getRooms()
    {
        return $this->rooms;
    }
  
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
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

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }


    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
    }


    public function cardDetails() {
         
          $this->dbh->query("SELECT * FROM `allestate` WHERE `Code` = '$this->code'");
          

          $record = $this->dbh->single();

          $this->setID($record->ID);
          
          $this->setTypeID($record->TypeID);

          return $record;

    }

    public function bathroomAndRooms() {
         
          $this->dbh->query("SELECT * FROM `eav` WHERE `AllID` =".$this->getID());
          

          $record = $this->dbh->resultSet();

          foreach ($record as $item) {
               if ($item->AtrributeID == 4) {
                    $this->setBathroom($item->Value);
               }
               if ($item->AtrributeID == 3) {
                    $this->setRooms($item->Value);
               }
          }
    
    


     }

     public function propertyType() {
         
          $this->dbh->query("SELECT * FROM `typeofestate` WHERE `TypeID` = ".$this->gettypeID());
          

          $record = $this->dbh->single();
          $this->setType($record->TypeName);
          return $record;

    }


}


