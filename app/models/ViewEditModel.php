<?php
class viewEditModel extends model
{
    protected $ID;
    protected $Bathroom;
    protected $Room;
    protected $Floor;
    protected $Furnished;
    protected $Finishing;
    protected $NumOfFloors;
    protected $NUMOFFlats;
    protected $Doublex;
    protected $TypeOFActivity;
    protected $nUMOFAB;

    
    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function getBathroom()
    {
        return $this->Bathroom;
    }
    public function setBathroom($Bathroom)
    {
        $this->Bathroom = $Bathroom;
    }
    
    public function getRoom()
    {
        return $this->Room;
    }
    public function setRoom($Room)
    {
        $this->Room = $Room;
    }

    public function getFloor()
    {
        return $this->Floor;
    }
    public function setFloor($Floor)
    {
        $this->Floor = $Floor;
    }
    
    public function getFurnished()
    {
        return $this->Furnished;
    }
    public function setFurnished($Furnished)
    {
        $this->Furnished = $Furnished;
    }

    public function getFinishing()
    {
        return $this->Finishing;
    }
    public function setFinishing($Finishing)
    {
        $this->Finishing = $Finishing;
    }


    public function getNumOfFloors()
    {
        return $this->NumOfFloors;
    }
    public function setNumOfFloors($NumOfFloors)
    {
        $this->NumOfFloors = $NumOfFloors;
    }


    public function getNUMOFFlats()
    {
        return $this->NUMOFFlats;
    }
    public function setNUMOFFlats($NUMOFFlats)
    {
        $this->NUMOFFlats = $NUMOFFlats;
    }
    public function getDoublex()
    {
        return $this->Doublex;
    }
    public function setDoublex($Doublex)
    {
        $this->Doublex = $Doublex;
    }

    public function getTypeOFActivity()
    {
        return $this->TypeOFActivity;
    }
    public function setTypeOFActivity($TypeOFActivity)
    {
        $this->TypeOFActivity = $TypeOFActivity;
    }
    public function getnUMOFAB()
    {
        return $this->nUMOFAB;
    }
    public function setnUMOFAB($nUMOFAB)
    {
        $this->nUMOFAB = $nUMOFAB;
    }
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }
    public function CheckCodeEdit($OldCode,$NewCode){
        if($OldCode==$NewCode){

        }else{
          // $ValidatedCkeckCode=filter_var($NewCode, FILTER_SANITIZE_STRING);
            $this->dbh->query("SELECT * FROM allestate WHERE Code = :ValidatedCkeckCode");
            $ValidatedCkeckCode=$this->test_input($NewCode);
            $this->dbh->bind(':ValidatedCkeckCode', $ValidatedCkeckCode);
            $ALLRECORDS = $this->dbh->single();
            if(empty($ALLRECORDS)){
                
            }else{
                echo("\"?????? ?????????? ?????????? ??????????\"");
            }
        }
       
        }
    public function UploadImagesEdit($Value,$ID){
          $this->dbh->query("INSERT INTO `allestateimages`(`allestateID`, `Image`) VALUES (:uIID, :uImage)"); 
          $this->dbh->bind(':uIID', $ID);
          $this->dbh->bind(':uImage', $Value);
          $this->dbh->execute();
      }
      public function OneImages($Value,$ID){
        $this->dbh->query("UPDATE `allestate` SET `image`= :uImage WHERE `ID` = :uIID"); 
         $this->dbh->bind(':uIID', $ID);
        $this->dbh->bind(':uImage', $Value);
        $this->dbh->execute();
        // echo($ALLRECORDS->ID);
    }
    public function ShowEdit(){
        $this->dbh->query("SELECT * FROM `allestate` WHERE `ID` = :uuID");
        $this->dbh->bind(':uuID', $this->ID);
        $record = $this->dbh->single();
        $ContractType="";
        if($record->offered == 1){
            $ContractType=" <option value=''>????????</option>
            <option selected value='1'>??????????</option>
            <option value='2'>??????????????</option>";
        }else if($record->offered == 2){
            $ContractType=" <option value=''>????????</option>
            <option value='1'>??????????</option>
            <option selected value='2'>??????????????</option>";
        }
        $Show="";
        if($record->Visible == 1){
            $Show=" <option value=''>????????</option>
            <option selected value='1'>?????????? ????????????????????</option>
            <option value='2'>?????????? ????????????????????</option>";
        }else if($record->Visible == 2){
            $Show=" <option value=''>????????</option>
            <option value='1'>?????????? ????????????????????</option>
            <option selected value='2'>?????????? ????????????????????</option>";
        }
        $Show="";
        if($record->Visible == 1){
            $Show=" <option value=''>????????</option>
            <option selected value='1'>?????????? ????????????????????</option>
            <option value='2'>?????????? ????????????????????</option>";
        }else if($record->Visible == 2){
            $Show=" <option value=''>????????</option>
            <option value='1'>?????????? ????????????????????</option>
            <option selected value='2'>?????????? ????????????????????</option>";
        }
        $PaymentMethod="";
        if($record->PaymentMethod == "Cash"){
            $PaymentMethod="  <option value=''>????????</option>
            <option selected  value='Cash'> ??????</option>
            <option value='instalment'> ??????????</option>";
        }else if($record->PaymentMethod == "instalment"){
            $PaymentMethod="  <option selected value=''>????????</option>
            <option value='Cash'> ??????</option>
            <option selected  value='instalment'> ??????????</option>";
        }
        $Importance="";
        if($record->Priroty == "High"){
            $Importance="  <option value=''>????????</option>
            <option selected value='High'> ??????</option>
            <option value='Low'> ?????? ??????</option>";
        }else if($record->Priroty == "Low"){
            $Importance=" <option value=''>????????</option>
            <option value='High'> ??????</option>
            <option selected value='Low'> ?????? ??????</option>";
        }

        $output=<<<EOT
          
          <p class='field required'>
            <label class='label required' for='name'>??????????</label>
            <input class='text-input' id='name' name='name' onkeyup="lettersandnumbers(this)" maxlength="83" required type='text' value="$record->Name">
          </p>
         
          <p class='field required half'>
            <label class='label' for='Price'>??????????</label>
            <input class='text-input' id='Price' name='Price' onkeyup="numbers(this)" required type='text' maxlength="7" value="$record->Price">
          </p>
          <p class='field half required'>
            <label class='label' for='Area'>??????????????</label>
            <input class='text-input' id='Area' name='Area'required onkeyup="numbers(this)" type='text' maxlength="20" value="$record->Area" >
          </p>
          <p class='field half required'>
            <label class='label' for='AddressUser'>?????????????? ????????????????</label>
            <input class='text-input' id='AddressUser' name='AddressUser' onkeyup="Address(this)" maxlength="60" required type='text' value="$record->AddressUser" >
          </p>
          <p class='field half required'>
            <label class='label' for='AddressAdmin'>?????????????? ????????????</label>
            <input class='text-input' id='AddressAdmin' name='AddressAdmin' onkeyup="Address(this)" required maxlength="300" type='text' value="$record->AddressAdmin" >
          </p>
          <p class='field half required'>
            <label class='label' for='Owner'>?????? ???????? ????????????</label>
            <input class='text-input' id='Owner' name='Owner' maxlength="40" onkeyup="lettersandnumbers(this)" required type='text' value="$record->Owner" >
          </p>
          <p class='field half required'>
            <label class='label' for='OwnerNum'>?????? ???????? ????????????</label>
            <input class='text-input' id='OwnerNum' name='OwnerNum' onkeyup="numbers(this)" maxlength="20" required type='text' value="$record->OwnerNumber">
          </p>
          <p class='field required half'>
            <label class='label' for='Code'>??????????</label>
            <input class='text-input' id='Code' name='Code' onkeyup="CheckCode(this),lettersandnumbersEnglishOnly(this)" maxlength="11" required type='text' value="$record->Code" >
            <span  id='CodeError' style="color:red;"></span>
          </p>
          <p class='field required'>
            <label class='label' for='DescriptionUser'>?????????? ????????????????</label>
            <textarea class='textarea' cols='50' id='DescriptionUser' name='DescriptionUser' onkeyup="lettersandnumbers(this)" maxlength="500" required rows='4'>$record->DescriptionUser</textarea>
          </p>
          <p class='field required'>
            <label class='label' for='DescriptionAdmin'>?????????? ????????????</label>
            <textarea class='textarea' cols='50' id='DescriptionAdmin' name='DescriptionAdmin' onkeyup="lettersandnumbers(this)" maxlength="1000" required rows='4'>$record->DescriptionAdmin</textarea>
          </p>
          <p class='field required half'>
            <label class='label' for='contarctType'>??????????</label>
            <select class='select' id='contarctType' required>
            $ContractType
            </select>
          </p>
          <p class='field required half'>
            <label class='label' for='Show'>??????????</label>
            <select class='select' id='Show' required>
            $Show
            </select>
          </p>
          <p class='field required half'>
            <label class='label' for='Payment'>?????????? ??????????</label>
            <select class='select' id='Payment' required>
            $PaymentMethod
            </select>
          </p>
          <p class='field required half'>
            <label class='label' for='Importance'> ??????????????</label>
            <select class='select' id='Importance' required>
            $Importance
            </select>
          </p>
    EOT;
         
if($record->TypeID==1){
    
$this->dbh->query("SELECT * FROM `eav` WHERE `AllID` = :uuID");
$this->dbh->bind(':uuID', $this->ID);
$recordEav = $this->dbh->resultSet();

foreach ($recordEav as $item) {
        if ($item->AtrributeID == 4) {
            $this->setBathroom($item->Value);
        }
        if ($item->AtrributeID == 3) {
            $this->setRoom($item->Value);
        }

        if ($item->AtrributeID == 9) {
        $this->setFurnished($item->Value);
        }
        if ($item->AtrributeID == 1) {
            $this->setFloor($item->Value);
        }
        if ($item->AtrributeID == 2) {
        $this->setFinishing($item->Value);
        }
        if ($item->AtrributeID == 6) {
        $this->setDoublex($item->Value);
        }


}
$FinishingArray="";
if($this->Finishing == 1){
    $FinishingArray=" <option value=''>????????</option>
    <option selected value='1'> ??????????</option>
    <option value='2'> ???? ?????????? </option>
    <option value='3'> ???? ?????????? </option>";
}else if($this->Finishing == 2){
    $FinishingArray=" <option selected value=''>????????</option>
    <option value='1'> ??????????</option>
    <option selected value='2'> ???? ?????????? </option>
    <option value='3'> ???? ?????????? </option>";
}
else if($this->Finishing == 3){
    $FinishingArray=" <option selected value=''>????????</option>
    <option value='1'> ??????????</option>
    <option value='2'> ???? ?????????? </option>
    <option selected value='3'> ???? ?????????? </option>";
}
$FurnishedArray="";
if($this->Furnished == 1){
    $FurnishedArray="  <option value=''>????????</option>
    <option selected value='1'> ??????</option>
    <option value='2'>  ???? </option>";
}else if($this->Furnished == 2){
    $FurnishedArray="  <option selected value=''>????????</option>
    <option value='1'> ??????</option>
    <option selected value='2'>  ???? </option>";
}
$DoublexArray="";
if($this->Doublex == 1){
    $DoublexArray="  <option value=''>????????</option>
    <option selected value='1'> ??????</option>
    <option value='2'>  ???? </option>";
}else if($this->Doublex == 2){
    $DoublexArray="  <option selected value=''>????????</option>
    <option value='1'> ??????</option>
    <option selected value='2'>  ???? </option>";
}


        $output .=<<<EOT

          <p class='field required half'>
            <label class='label' for='Floor'> ??????????</label>
            <input class='text-input' id='Floor' name='Floor' onkeyup="numbers(this)" required type='text' maxlength="5"  value="$this->Floor" >
          </p>
        
          <p class='field required half'>
            <label class='label' for='NUMOFRooms'>????????????????</label>
            <input class='text-input' id='NUMOFRooms' name='NUMOFRooms' onkeyup="numbers(this)" required type='text' maxlength="5" value="$this->Room" >
          </p>
          <p class='field required half'>
            <label class='label' for='NUMOFBathrooms'> ?????? ???????????????? </label>
            <input class='text-input' id='NUMOFBathrooms' name='NUMOFBathrooms' onkeyup="numbers(this)"required type='text' maxlength="5" value="$this->Bathroom" >
          </p>
            <input id='TypeID' name='TypeID' type='hidden' value="1">
          </p>
          <p class='field half'>
            <label class='label' for='Finishing'> ??????????????</label>
            <select class='select' id='Finishing' required>
            $FinishingArray
            </select>
          </p>
          <p class='field half'>
            <label class='label' for='Furnished'> ????????????</label>
            <select class='select' id='Furnished' required>
            $FurnishedArray
            </select>
          </p>

          <p class='field half'>
          <label class='label' for='Doublex'> ????????????</label>
          <select class='select' id='Doublex' required>
          $DoublexArray
          </select>
          </p>
       
         

    EOT;
          
        }else if($record->TypeID==2){
          $this->dbh->query("SELECT * FROM `eav` WHERE `AllID` = :uuID");
          $this->dbh->bind(':uuID', $this->ID);
          $recordEav = $this->dbh->resultSet();

          foreach ($recordEav as $item) {
            if ($item->AtrributeID == 11) {
              $this->setNUMOFFlats($item->Value);
            }
              if ($item->AtrributeID == 5) {
                  $this->setNumOfFloors($item->Value);
              }
             
          }
          $output .=<<<EOT
          <p class='field required half'>
          <label class='label' for='NUMOFFlats'>?????? ??????????</label>
          <input class='text-input' id='NUMOFFlats' name='NUMOFFlats' onkeyup="numbers(this)" maxlength="5" required type='text' value="$this->NUMOFFlats">
          </p>

          <p class='field required half'>
          <label class='label' for='NUMOFFloors'>?????? ??????????????</label>
          <input class='text-input' id='NUMOFFloors' name='NUMOFFloors' onkeyup="numbers(this)" maxlength="5" required type='text' value="$this->NumOfFloors">
          </p>
          EOT;

       }
      
        else if($record->TypeID==3){
           
$this->dbh->query("SELECT * FROM `eav` WHERE `AllID` = :uuID");
$this->dbh->bind(':uuID', $this->ID);
$recordEav = $this->dbh->resultSet();

foreach ($recordEav as $item) {
        if ($item->AtrributeID == 4) {
            $this->setBathroom($item->Value);
        }
        if ($item->AtrributeID == 3) {
            $this->setRoom($item->Value);
        }

        if ($item->AtrributeID == 9) {
        $this->setFurnished($item->Value);
        }
        if ($item->AtrributeID == 5) {
            $this->setNUMOFFloors($item->Value);
        }
        if ($item->AtrributeID == 2) {
        $this->setFinishing($item->Value);
    }


}
$FinishingArray="";
if($this->Finishing == 1){
    $FinishingArray=" <option value=''>????????</option>
    <option selected value='1'> ??????????</option>
    <option value='2'> ???? ?????????? </option>
    <option value='3'> ???? ?????????? </option>";
}else if($this->Finishing == 2){
    $FinishingArray=" <option selected value=''>????????</option>
    <option value='1'> ??????????</option>
    <option selected value='2'> ???? ?????????? </option>
    <option value='3'> ???? ?????????? </option>";
}
else if($this->Finishing == 3){
    $FinishingArray=" <option selected value=''>????????</option>
    <option value='1'> ??????????</option>
    <option value='2'> ???? ?????????? </option>
    <option selected value='3'> ???? ?????????? </option>";
}
$FurnishedArray="";
if($this->Furnished == 1){
    $FurnishedArray="  <option value=''>????????</option>
    <option selected value='1'> ??????</option>
    <option value='2'>  ???? </option>";
}else if($this->Furnished == 2){
    $FurnishedArray="  <option selected value=''>????????</option>
    <option value='1'> ??????</option>
    <option selected value='2'>  ???? </option>";
}


        $output .=<<<EOT

          <p class='field required half'>
          <label class='label' for='NUMOFFloors'>?????? ??????????????</label>
          <input class='text-input' id='NUMOFFloors' name='NUMOFFloors' onkeyup="numbers(this)" maxlength="5" required type='text' value="$this->NumOfFloors">
          </p>
          <p class='field required half'>
            <label class='label' for='NUMOFRooms'>????????????????</label>
            <input class='text-input' id='NUMOFRooms' name='NUMOFRooms' onkeyup="numbers(this)" maxlength="5" required type='text' value="$this->Room" >
          </p>
          <p class='field required half'>
            <label class='label' for='NUMOFBathrooms'> ?????? ???????????????? </label>
            <input class='text-input' id='NUMOFBathrooms' name='NUMOFBathrooms' onkeyup="numbers(this)" maxlength="5" required type='text' value="$this->Bathroom" >
          </p>
            <input id='TypeID' name='TypeID' type='hidden' value="1">
          </p>
          <p class='field half'>
            <label class='label' for='Finishing'> ??????????????</label>
            <select class='select' id='Finishing' required>
            $FinishingArray
            </select>
          </p>
          <p class='field half'>
            <label class='label' for='Furnished'> ????????????</label>
            <select class='select' id='Furnished' required>
            $FurnishedArray
            </select>
          </p>
       
         

    EOT;

      
          
          } else if($record->TypeID==4||$record->TypeID==5||$record->TypeID==7){
              $this->dbh->query("SELECT * FROM `eav` WHERE `AllID` = :uuID");
              $this->dbh->bind(':uuID', $this->ID);
              $recordEav = $this->dbh->resultSet();

              foreach ($recordEav as $item) {
              if ($item->AtrributeID == 7) {
              $this->setTypeOFActivity($item->Value);
              }

              }
              $output .=<<<EOT
              <p class='field required half'>
              <label class='label' for='TypeOFActivity'>?????? ????????????</label>
              <input class='text-input' id='TypeOFActivity' name='TypeOFActivity' onkeyup="lettersandnumbers(this)" maxlength="50" required type='text' value="$this->TypeOFActivity">
              </p>
              EOT;

       }
       else if($record->TypeID==6){
        $this->dbh->query("SELECT * FROM `eav` WHERE `AllID` = :uuID");
        $this->dbh->bind(':uuID', $this->ID);
        $recordEav = $this->dbh->resultSet();

        foreach ($recordEav as $item) {
        if ($item->AtrributeID == 7) {
        $this->setTypeOFActivity($item->Value);
        }
        if ($item->AtrributeID == 8) {
          $this->setnUMOFAB($item->Value);
          }

        }
        $output .=<<<EOT
        <p class='field required half'>
        <label class='label' for='TypeOFActivity'>?????? ????????????</label>
        <input class='text-input' id='TypeOFActivity' name='TypeOFActivity' maxlength="50" onkeyup="lettersandnumbers(this)" required type='text' value="$this->TypeOFActivity">
        </p>
        <p class='field required half'>
        <label class='label' for='nUMOFAB'>?????? ?????????????? ????????????????</label>
        <input class='text-input' id='nUMOFAB' name='nUMOFAB' onkeyup="lettersandnumbers(this)" maxlength="5" required type='text' value="$this->nUMOFAB">
        </p>
        EOT;

 }
 else if($record->TypeID==8||$record->TypeID==9){
  $output .=<<<EOT
  <input class='text-input' id='Fix' name='Fix' type='hidden' value="0">
  EOT;

}
   

        $output .=<<<EOT
        <input id='ChechCode' name='ChechCode' type='hidden' value="$record->Code">
        <input id='EditID' name='EditID' type='hidden' value="$record->ID">
        </div>
          <p class='field required'>
          <div class="alert alert-danger"role="alert">
          ?????? ???????? ?????????? ???????? ???? ?????? "png","jpeg","jpg" 
          ???? ?????????? ???????? ???? 4 ???????? 
        
          ,?????????? ?????????? ?????????????? !
        </div>
        </p>
          <p class='field required'>
           Select Image Files to Upload:
            <input type="file" id='files' name="files[]" multiple><br>
            </p>
            
          <p class='field half'>
            <!-- <button class='button' id="submit" onclick="Start(this)" style="background-color:green;">Edit</button> -->
            <input class='button' id="submit" type='submit' onclick="Start()" style="background-color:green;" value="Edit">
           
          </p>
      
      EOT;
    
        return $output;

    }
}
?>