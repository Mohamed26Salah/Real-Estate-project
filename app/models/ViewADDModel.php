<?php
class ViewADDModel extends model
{
    protected $Name;
    protected $Area;
    protected $Price;
    protected $AddressUser;
    protected $AddressAdmin;
    protected $Owner;
    protected $OwnerNum;
    protected $Code;
    protected $DescriptionUser;
    protected $DescriptionAdmin;
    protected $contarctType;
    protected $Show;
    protected $Payment;
    protected $Importance;
    protected $Floor;
    protected $NUMOFRooms;
    protected $NUMOFBathrooms;
    protected $NUMOFFloors;
    protected $Furnished;
    protected $Finishing;
    protected $Doublex;
    protected $TypeActivity;
    protected $NUMOFAb;
    protected $TypeID;
    protected $codeInput;
    protected $EditID;
    protected $NUMOFFlats;
    protected $Fix;

    public function getFix()
    {
        return $this->Fix;
    }
    public function setFix($Fix)
    {
        $this->Fix = $Fix;
    }

    public function getNUMOFFlats()
    {
        return $this->NUMOFFlats;
    }
    public function setNUMOFFlats($NUMOFFlats)
    {
        $this->NUMOFFlats = $NUMOFFlats;
    }
    public function getEditID()
    {
        return $this->EditID;
    }
  
    public function setEditID($EditID)
    {
        $this->EditID = $EditID;
    }
//////////////////////////////////////////
    public function getcodeInput()
    {
        return $this->codeInput;
    }
  
    public function setcodeInput($codeInput)
    {
        $this->codeInput = $codeInput;
    }
//////////////////////////////////////////
    public function getname()
    {
        return $this->Name;
    }
  
    public function setname($Name)
    {
        $this->Name = $Name;
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
    public function getPrice()
    {
        return $this->Price;
    }
  
    public function setprice($Price)
    {
        $this->Price = $Price;
    }
  //////////////////////////////////////////
    public function getAddressUser()
    {
        return $this->AddressUser;
    }
    public function setAddressUser($AddressUser)
    {
        $this->AddressUser = $AddressUser;
    }
    //////////////////////////////////////////
    public function getAddressAdmin()
    {
        return $this->AddressAdmin;
    }
    public function setAddressAdmin($AddressAdmin)
    {
        $this->AddressAdmin = $AddressAdmin;
    }
    //////////////////////////////////////////
    public function getOwner()
    {
        return $this->Owner;
    }
    public function setOwner($Owner)
    {
        $this->Owner = $Owner;
    }
    //////////////////////////////////////////
    public function getOwnerNum()
    {
        return $this->OwnerNum;
    }
  
    public function setOwnerNum($OwnerNum)
    {
        $this->OwnerNum = $OwnerNum;
    }
    //////////////////////////////////////////
    public function getCode()
    {
        return $this->Code;
    }
    public function setCode($Code)
    {
        $this->Code = $Code;
    }
    //////////////////////////////////////////
    public function getDescriptionUser()
    {
        return $this->DescriptionUser;
    }
  
    public function setDescriptionUser($DescriptionUser)
    {
        $this->DescriptionUser = $DescriptionUser;
    }
     //////////////////////////////////////////
    public function getDescriptionAdmin()
    {
        return $this->DescriptionAdmin;
    }
    public function setDescriptionAdmin($DescriptionAdmin)
    {
        $this->DescriptionAdmin = $DescriptionAdmin;
    }
     //////////////////////////////////////////
    public function getcontarctType()
    {
        return $this->contarctType;
    }
    public function setcontarctType($contarctType)
    {
        $this->contarctType = $contarctType;
    }
    //////////////////////////////////////////
    public function getShow()
    {
        return $this->Show;
    }
    public function setShow($Show)
    {
        $this->Show = $Show;
    }
     //////////////////////////////////////////
     public function getPayment()
     {
         return $this->Payment;
     }
     public function setPayment($Payment)
     {
         $this->Payment = $Payment;
     }
      //////////////////////////////////////////
      public function getImportance()
      {
          return $this->Importance;
      }
      public function setImportance($Importance)
      {
          $this->Importance = $Importance;
      }
       //////////////////////////////////////////
       public function getFloor()
       {
           return $this->Floor;
       }
       public function setFloor($Floor)
       {
           $this->Floor = $Floor;
       }
        //////////////////////////////////////////
        public function getNUMOFRooms()
       {
           return $this->NUMOFRooms;
       }
       public function setNUMOFRooms($NUMOFRooms)
       {
           $this->NUMOFRooms = $NUMOFRooms;
       }
        //////////////////////////////////////////
        public function getNUMOFBathrooms()
       {
           return $this->NUMOFBathrooms;
       }
       public function setNUMOFBathrooms($NUMOFBathrooms)
       {
           $this->NUMOFBathrooms = $NUMOFBathrooms;
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
        public function getFurnished()
       {
           return $this->Furnished;
       }
       public function setFurnished($Furnished)
       {
           $this->Furnished = $Furnished;
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
        public function getDoublex()
       {
           return $this->Doublex;
       }
       public function setDoublex($Doublex)
       {
           $this->Doublex = $Doublex;
       }
        //////////////////////////////////////////
        public function getTypeActivity()
        {
            return $this->TypeActivity;
        }
        public function setTypeActivity($TypeActivity)
        {
            $this->TypeActivity = $TypeActivity;
        }
         //////////////////////////////////////////
         public function getNUMOFAb()
        {
            return $this->NUMOFAb;
        }
        public function setNUMOFAb($NUMOFAb)
        {
            $this->NUMOFAb = $NUMOFAb;
        }
         //////////////////////////////////////////
         public function getTypeID()
         {
             return $this->TypeID;
         }
         public function setTypeID($TypeID)
         {
             $this->TypeID = $TypeID;
         }
          //////////////////////////////////////////
        public function DeleteImages($ID){
            $this->dbh->query(" DELETE FROM `allestateimages` WHERE allestateID = '".$ID."'");
            $this->dbh->execute();
            echo("Da5l model");
        }
        public function CheckCode(){
        $this->dbh->query("SELECT * FROM allestate WHERE Code = '".$this->codeInput."'");
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
        public function Eav($AllID,$AtrributeID,$Value){
            $this->dbh->query("INSERT INTO `eav`(`AllID`, `AtrributeID`, `Value`) VALUES (:uAllID, :uAtrributeID, :uValue)"); 
            $this->dbh->bind(':uAllID', $AllID);
            $this->dbh->bind(':uAtrributeID', $AtrributeID);
            $this->dbh->bind(':uValue', $Value);
            $this->dbh->execute();
        }
        public function EditEav($AllID,$AtrributeID,$Value){
            $this->dbh->query("UPDATE `eav` SET `Value`= :uValue WHERE `AllID`= '".$AllID."' AND `AtrributeID` = ".$AtrributeID); 
            $this->dbh->bind(':uValue', $Value);
            $this->dbh->execute();
        }
        public function Add(){
            if(empty($this->EditID)){
                $this->dbh->query("INSERT INTO allestate (`AMID`,`AddressUser`, `AddressAdmin`, `Area`,`Price`,`PaymentMethod`,`Owner`,`OwnerNumber`,`DescriptionUser`,`DescriptionAdmin`,`Name`,`Priroty`,`Visible`,`Code`,`TypeID`,`offered`) VALUES(:uAMID, :uAddressUser, :uAddressAdmin, :uArea, :uPrice, :uPayment, :uOwner, :uOwnerNum, :uDescriptionUser, :uDescriptionAdmin, :uName, :uImportance, :uShow, :uCode, :uTypeID, :ucontarctType)");
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
        if(empty($this->EditID)){
            $this->dbh->query("SELECT * FROM allestate ORDER BY ID DESC LIMIT 1");
            $ALLRECORDS = $this->dbh->single();
            if($this->TypeID==1){
                $this->Eav($ALLRECORDS->ID,1,$this->Floor);
                $this->Eav($ALLRECORDS->ID,2,$this->Finishing);
                $this->Eav($ALLRECORDS->ID,3,$this->NUMOFRooms);
                $this->Eav($ALLRECORDS->ID,4,$this->NUMOFBathrooms);
                $this->Eav($ALLRECORDS->ID,6,$this->Doublex);
                $this->Eav($ALLRECORDS->ID,9,$this->Furnished);
            }
        }else if($this->TypeID==2){
            $this->Eav($ALLRECORDS->ID,5,$this->NUMOFFloors);
            $this->Eav($ALLRECORDS->ID,11,$this->NUMOFFlats);
        } else if($this->TypeID==3){
            $this->Eav($ALLRECORDS->ID,5,$this->NUMOFFloors);
            $this->Eav($ALLRECORDS->ID,2,$this->Finishing);
            $this->Eav($ALLRECORDS->ID,3,$this->NUMOFRooms);
            $this->Eav($ALLRECORDS->ID,4,$this->NUMOFBathrooms);
            $this->Eav($ALLRECORDS->ID,9,$this->Furnished);
           
        } else if($this->TypeID==4||$this->TypeID==5||$this->TypeID==7){
            $this->Eav($ALLRECORDS->ID,7,$this->TypeActivity); 
        }
        else if($this->TypeID==6){
            $this->Eav($ALLRECORDS->ID,7,$this->TypeActivity); 
            $this->Eav($ALLRECORDS->ID,8,$this->NUMOFAb);
        }
       
        }

        
}