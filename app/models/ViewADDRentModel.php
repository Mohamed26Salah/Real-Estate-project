<?php
class ViewADDRentModel extends model
{
    protected $Code;
    protected $Price;
    protected $Show;
    protected $Area;
    protected $NUMOFFloors;
    protected $LessorName;
    protected $LessorNum;
    protected $TenantName;
    protected $TenantNum;
    protected $Description;
    protected $furnished;
    protected $Finishing;
    protected $StartOFRent;
    protected $ENDOFRent;
    protected $TOR;
    protected $TOREND;
    protected $EditIDRent;

    public function setEditIDRent($EditIDRent)
    {
        $this->EditIDRent = $EditIDRent;
    }

    public function getCode()
    {
        return $this->Code;
    }
    public function setCode($Code)
    {
        $this->Code = $Code;
    }

    public function getPrice()
    {
        return $this->Price;
    }
    public function setPrice($Price)
    {
        $this->Price = $Price;
    }
    public function getShow()
    {
        return $this->Show;
    }
  
    public function setShow($Show)
    {
        $this->Show = $Show;
    }
//////////////////////////////////////////
    public function getArea()
    {
        return $this->Area;
    }
  
    public function setArea($Area)
    {
        $this->Area = $Area;
    }
//////////////////////////////////////////
    public function getNUMOFFloors()
    {
        return $this->NUMOFFloors;
    }
  
    public function setNUMOFFloors($NUMOFFloors)
    {
        $this->NUMOFFloors = $NUMOFFloors;
    }
    //////////////////////////////////////////
    public function getLessorName()
    {
        return $this->LessorName;
    }
    public function setLessorName($LessorName)
    {
        $this->LessorName = $LessorName;
    }
    //////////////////////////////////////////
    public function getLessorNum()
    {
        return $this->LessorNum;
    }
  
    public function setLessorNum($LessorNum)
    {
        $this->LessorNum = $LessorNum;
    }
  //////////////////////////////////////////
    public function getTenantName()
    {
        return $this->TenantName;
    }
    public function setTenantName($TenantName)
    {
        $this->TenantName = $TenantName;
    }
    //////////////////////////////////////////
    public function getTenantNum()
    {
        return $this->TenantNum;
    }
    public function setTenantNum($TenantNum)
    {
        $this->TenantNum = $TenantNum;
    }
    //////////////////////////////////////////
    public function getDescription()
    {
        return $this->Description;
    }
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }
    //////////////////////////////////////////
        public function getfurnished()
    {
        return $this->furnished;
    }
    public function setfurnished($furnished)
    {
        $this->furnished = $furnished;
    }
    //////////////////////////////////////////
    
    public function getFinishing()
    {
        return $this->Finishing;
    }
    public function setFinishing($Finishing)
    {
        $this->Finishing = $Finishing;
    }
    //////////////////////////////////////////
    public function getStartOFRent()
    {
        return $this->StartOFRent;
    }
  
    public function setStartOFRent($StartOFRent)
    {
        $this->StartOFRent = $StartOFRent;
    }
    //////////////////////////////////////////
    public function getENDOFRent()
    {
        return $this->ENDOFRent;
    }
    public function setENDOFRent($ENDOFRent)
    {
        $this->ENDOFRent = $ENDOFRent;
    }
    //////////////////////////////////////////
    public function getTOR()
    {
        return $this->TOR;
    }
  
    public function setTOR($TOR)
    {
        $this->TOR = $TOR;
    }
     //////////////////////////////////////////
    public function getTOREND()
    {
        return $this->TOREND;
    }
    public function setTOREND($TOREND)
    {
        $this->TOREND = $TOREND;
    }
     
        public function DeleteImages($ID){
            $this->dbh->query(" DELETE FROM `allestateimages` WHERE allestateID = '".$ID."'");
            $this->dbh->execute();
            echo("Da5l model");
        }
        public function CheckCode(){
        $this->dbh->query("SELECT * FROM rents WHERE code = '".$this->Code."'");
        $ALLRECORDS = $this->dbh->single();
        if(empty($ALLRECORDS)){
            
        }else{
            echo("\"هذا الكود موجود مسبقا\"");
        }
        }
        public function UploadImages($Value){
            $this->dbh->query("SELECT * FROM rents ORDER BY ID DESC LIMIT 1");
            $ALLRECORDS = $this->dbh->single();
            $this->dbh->query("INSERT INTO `rentsimages`(`RentsID`, `Image`) VALUES (:uIID, :uImage)"); 
            $this->dbh->bind(':uIID', $ALLRECORDS->ID);
            $this->dbh->bind(':uImage', $Value);
            $this->dbh->execute();
            // echo($ALLRECORDS->ID);
        }
        public function AddRent(){
            if(empty($this->EditIDRent)){
                echo("44444444444444");
                $this->dbh->query("INSERT INTO rents (`AMID`,`typeName`, `area`, `description`,`rentPrice`,`furnished`,`floor`,`FD`,`TOR`,`TOREND`,`Start_OF_Rent`,`END_OF_Rent`,`status`,`LessorName`,`TenantName`,`LessorNum`,`TenantNum`,`code`) VALUES(:uAMID, :utypeName, :uarea, :udescription, :urentPrice, :ufurnished, :ufloor, :uFD, :uTOR, :uTOREND, :uStart_OF_Rent, :uEND_OF_Rent,:ustatus, :uLessorName, :uTenantName, :uLessorNum, :uTenantNum, :ucode)");
            }else{
                echo("55555555555");
                $this->dbh->query("UPDATE `rents` SET `AMID`= :uAMID,`typeName`= :utypeName,`area`= :uarea,`description`= :udescription,`rentPrice`= :urentPrice,`furnished`= :ufurnished,`floor`= :ufloor,`FD`= :uFD,`TOR`= :uTOR,`TOREND`= :uTOREND,`Start_OF_Rent`= :uStart_OF_Rent,`END_OF_Rent`= :uEND_OF_Rent,`status`= :ustatus,`LessorName`= :uLessorName,`TenantName`= :uTenantName,`LessorNum`= :uLessorNum,`TenantNum`= :uTenantNum,`code`= :ucode WHERE ID = ".$this->EditIDRent);
            }
            
        $this->dbh->bind(':uAMID', $_SESSION['user_id']);
        
        $this->dbh->bind(':utypeName',$this->Show);
        // echo($this->Show);
        // $Validatedarea=filter_var($this->Area, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uarea', $this->Area);
        // echo($this->Area);
        // $Validateddescription=filter_var($this->Description, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':udescription', $this->Description);
        // echo($this->Validateddescription);
        // $ValidatedrentPrice=filter_var($this->Price, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':urentPrice', $this->Price);
        // echo($this->ValidatedrentPrice);
        // $Validatedfurnished=filter_var($this->furnished, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':ufurnished', $this->furnished);

        // $Validatedfloor=filter_var($this->NUMOFFloors, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':ufloor', $this->NUMOFFloors);

        // $ValidatedFD=filter_var($this->Finishing, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uFD', $this->Finishing);

        
        $this->dbh->bind(':uTOR',$this->TOR);

      
        $this->dbh->bind(':uTOREND',$this->TOREND);

        $this->dbh->bind(':uStart_OF_Rent',$this->StartOFRent);

        $this->dbh->bind(':uEND_OF_Rent',$this->ENDOFRent);
        $this->dbh->bind(':ustatus',10);
        // $ValidatedLessorName=filter_var($this->LessorName, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uLessorName', $this->LessorName);

        // $ValidatedTenantName=filter_var($this->TenantName, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uTenantName', $this->TenantName);

        // $ValidatedLessorNum=filter_var($this->LessorNum, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uLessorNum', $this->LessorNum);

        // $ValidatedTenantNum=filter_var($this->TenantNum, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uTenantNum', $this->TenantNum);

        // $Validatedcode=filter_var($this->Code, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':ucode', $this->Code);

        $this->dbh->execute();
        
        }

        
}