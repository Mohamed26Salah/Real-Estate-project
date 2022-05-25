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
        $this->dbh->query("SELECT * FROM rents WHERE code = '".$this->codeInput."'");
        $ALLRECORDS = $this->dbh->single();
        if(empty($ALLRECORDS)){
            
        }else{
            echo("\"هذا الكود موجود مسبقا\"");
        }
        }
        public function OneImages($Value){
            $this->dbh->query("SELECT * FROM allestate ORDER BY ID DESC LIMIT 1");
            $ALLRECORDS = $this->dbh->single();
            $this->dbh->query("UPDATE `allestate` SET `image`= :uImage WHERE `ID` = ".$ALLRECORDS->ID); 
            // $this->dbh->bind(':uIID', $ALLRECORDS->ID);
            $this->dbh->bind(':uImage', $Value);
            $this->dbh->execute();
            // echo($ALLRECORDS->ID);
        }
        public function UploadImages($Value){
            $this->dbh->query("SELECT * FROM allestate ORDER BY ID DESC LIMIT 1");
            $ALLRECORDS = $this->dbh->single();
            $this->dbh->query("INSERT INTO `allestateimages`(`allestateID`, `Image`) VALUES (:uIID, :uImage)"); 
            $this->dbh->bind(':uIID', $ALLRECORDS->ID);
            $this->dbh->bind(':uImage', $Value);
            $this->dbh->execute();
            // echo($ALLRECORDS->ID);
        }
        public function AddRent(){
            if(empty($this->EditID)){
                $this->dbh->query("INSERT INTO rents (`AMID`,`typeName`, `area`, `description`,`rentPrice`,`furnished`,`floor`,`FD`,`TOR`,`TOREND`,`Start_OF_Rent`,`END_OF_Rent`,`Visible`,`Code`,`TypeID`,`offered`) VALUES(:uAMID, :uAddressUser, :uAddressAdmin, :uArea, :uPrice, :uPayment, :uOwner, :uOwnerNum, :uDescriptionUser, :uDescriptionAdmin, :uName, :uImportance, :uShow, :uCode, :uTypeID, :ucontarctType)");
            }else{
                $this->dbh->query("UPDATE `allestate` SET `AMID`= :uAMID, `AddressUser`=:uAddressUser,`AddressAdmin`= :uAddressAdmin,`Area`= :uArea,`Price`= :uPrice,`PaymentMethod`= :uPayment,`Owner`= :uOwner,`OwnerNumber`= :uOwnerNum,`DescriptionUser`= :uDescriptionUser,`DescriptionAdmin`= :uDescriptionAdmin,`Name`= :uName,`Priroty`= :uImportance,`Visible`= :uShow,`Code`= :uCode,`TypeID`= :uTypeID,`offered`= :ucontarctType WHERE ID = ".$this->EditID);
            }
        $this->dbh->bind(':uAMID', $_SESSION['user_id']);
        $ValidatedAddressUser=filter_var($this->AddressUser, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uAddressUser', $ValidatedAddressUser);
        $ValidatedAddressAdmin=filter_var($this->AddressAdmin, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uAddressAdmin', $ValidatedAddressAdmin);
        $ValidatedArea=filter_var($this->Area, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uArea', $ValidatedArea);
        $ValidatedPrice=filter_var($this->Price, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uPrice', $ValidatedPrice);
        $ValidatedPayment=filter_var($this->Payment, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uPayment', $ValidatedPayment);
        $ValidatedOwner=filter_var($this->Owner, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uOwner', $ValidatedOwner);
        $ValidatedOwnerNum=filter_var($this->OwnerNum, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uOwnerNum', $ValidatedOwnerNum);
        $ValidatedDescriptionUser=filter_var($this->DescriptionUser, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uDescriptionUser', $ValidatedDescriptionUser);
        $ValidatedDescriptionAdmin=filter_var($this->DescriptionAdmin, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uDescriptionAdmin', $ValidatedDescriptionAdmin);
        $ValidatedName=filter_var($this->Name, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uName', $ValidatedName);
        $ValidatedImportance=filter_var($this->Importance, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uImportance', $ValidatedImportance);
        $ValidatedShow=filter_var($this->Show, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uShow', $ValidatedShow);
        $ValidatedCode=filter_var($this->Code, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uCode', $ValidatedCode);
        $ValidatedTypeID=filter_var($this->TypeID, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uTypeID', $ValidatedTypeID);
        $ValidatedcontarctType=filter_var($this->contarctType, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':ucontarctType', $ValidatedcontarctType);
        $this->dbh->execute();
        
       
        }

        
}