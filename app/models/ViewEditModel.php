<?php
class viewEditModel extends model
{
    protected $ID;
    protected $Bathroom;
    protected $Room;
    protected $Floor;
    protected $Furnished;
    protected $Finishing;


    
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

    public function CheckCodeEdit($OldCode,$NewCode){
        if($OldCode==$NewCode){

        }else{
            $this->dbh->query("SELECT * FROM allestate WHERE Code = '".$NewCode."'");
            $ALLRECORDS = $this->dbh->single();
            if(empty($ALLRECORDS)){
                
            }else{
                echo("\"هذا الكود موجود مسبقا\"");
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
        $this->dbh->query("UPDATE `allestate` SET `image`= :uImage WHERE `ID` = ".$ID); 
        $this->dbh->bind(':uImage', $Value);
        $this->dbh->execute();
        // echo($ALLRECORDS->ID);
    }
    public function ShowEdit(){
        $this->dbh->query("SELECT * FROM `allestate` WHERE `ID` = '$this->ID'");
        $record = $this->dbh->single();
        $ContractType="";
        if($record->offered == 1){
            $ContractType=" <option value=''>أختر</option>
            <option selected value='1'>للبيع</option>
            <option value='2'>للايجار</option>";
        }else if($record->offered == 2){
            $ContractType=" <option value=''>أختر</option>
            <option value='1'>للبيع</option>
            <option selected value='2'>للايجار</option>";
        }
        $Show="";
        if($record->Visible == 1){
            $Show=" <option value=''>أختر</option>
            <option selected value='1'>أظهار للمستخدمين</option>
            <option value='2'>أخفاء للمستخدمين</option>";
        }else if($record->Visible == 2){
            $Show=" <option value=''>أختر</option>
            <option value='1'>أظهار للمستخدمين</option>
            <option selected value='2'>أخفاء للمستخدمين</option>";
        }
        $Show="";
        if($record->Visible == 1){
            $Show=" <option value=''>أختر</option>
            <option selected value='1'>أظهار للمستخدمين</option>
            <option value='2'>أخفاء للمستخدمين</option>";
        }else if($record->Visible == 2){
            $Show=" <option value=''>أختر</option>
            <option value='1'>أظهار للمستخدمين</option>
            <option selected value='2'>أخفاء للمستخدمين</option>";
        }
        $PaymentMethod="";
        if($record->PaymentMethod == "Cash"){
            $PaymentMethod="  <option value=''>أختر</option>
            <option selected  value='Cash'> كاش</option>
            <option value='instalment'> تقسيط</option>";
        }else if($record->PaymentMethod == "instalment"){
            $PaymentMethod="  <option selected value=''>أختر</option>
            <option value='Cash'> كاش</option>
            <option selected  value='instalment'> تقسيط</option>";
        }
        $Importance="";
        if($record->Priroty == "High"){
            $Importance="  <option value=''>أختر</option>
            <option selected value='High'> مهم</option>
            <option value='Low'> ليس مهم</option>";
        }else if($record->Priroty == "Low"){
            $Importance=" <option value=''>أختر</option>
            <option value='High'> مهم</option>
            <option selected value='Low'> ليس مهم</option>";
        }

        $output=<<<EOT
          
          <p class='field required'>
            <label class='label required' for='name'>الأسم</label>
            <input class='text-input' id='name' name='name' onkeyup="lettersandnumbers(this)" maxlength="83" required type='text' value="$record->Name">
          </p>
         
          <p class='field required half'>
            <label class='label' for='Price'>السعر</label>
            <input class='text-input' id='Price' name='Price' onkeyup="numbers(this)" required type='text' value="$record->Price">
          </p>
          <p class='field half required'>
            <label class='label' for='Area'>المساحة</label>
            <input class='text-input' id='Area' name='Area'required onkeyup="numbers(this)" type='text' value="$record->Area" >
          </p>
          <p class='field half required'>
            <label class='label' for='AddressUser'>العنوان للمستخدم</label>
            <input class='text-input' id='AddressUser' name='AddressUser' onkeyup="lettersandnumbers(this)" maxlength="80" required type='text' value="$record->AddressUser" >
          </p>
          <p class='field half required'>
            <label class='label' for='AddressAdmin'>العنوان للمكتب</label>
            <input class='text-input' id='AddressAdmin' name='AddressAdmin' onkeyup="lettersandnumbers(this)" required type='text' value="$record->AddressAdmin" >
          </p>
          <p class='field half required'>
            <label class='label' for='Owner'>اسم صاحب العقار</label>
            <input class='text-input' id='Owner' name='Owner' maxlength="40" onkeyup="lettersandnumbers(this)" required type='text' value="$record->Owner" >
          </p>
          <p class='field half required'>
            <label class='label' for='OwnerNum'>رقم صاحب العقار</label>
            <input class='text-input' id='OwnerNum' name='OwnerNum' onkeyup="numbers(this)" required type='text' value="$record->OwnerNumber">
          </p>
          <p class='field required half'>
            <label class='label' for='Code'>الكود</label>
            <input class='text-input' id='Code' name='Code' onkeyup="CheckCode(this)" onkeyup="lettersandnumbersEnglishOnly(this)" maxlength="11" required type='text' value="$record->Code" >
            <span  id='CodeError' style="color:red;"></span>
          </p>
          <p class='field required'>
            <label class='label' for='DescriptionUser'>الوصف للمستخدم</label>
            <textarea class='textarea' cols='50' id='DescriptionUser' name='DescriptionUser' onkeyup="lettersandnumbers(this)" required rows='4'>$record->DescriptionUser</textarea>
          </p>
          <p class='field required'>
            <label class='label' for='DescriptionAdmin'>الوصف للمكتب</label>
            <textarea class='textarea' cols='50' id='DescriptionAdmin' name='DescriptionAdmin' onkeyup="lettersandnumbers(this)" required rows='4'>$record->DescriptionAdmin</textarea>
          </p>
          <p class='field required half'>
            <label class='label' for='contarctType'>النوع</label>
            <select class='select' id='contarctType' required>
            $ContractType
            </select>
          </p>
          <p class='field required half'>
            <label class='label' for='Show'>أظهار</label>
            <select class='select' id='Show' required>
            $Show
            </select>
          </p>
          <p class='field required half'>
            <label class='label' for='Payment'>طريقة الدفع</label>
            <select class='select' id='Payment' required>
            $PaymentMethod
            </select>
          </p>
          <p class='field required half'>
            <label class='label' for='Importance'> الأهمية</label>
            <select class='select' id='Importance' required>
            $Importance
            </select>
          </p>
    EOT;
         
if($record->TypeID==1){
    
$this->dbh->query("SELECT * FROM `eav` WHERE `AllID` =".$this->ID);
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

//     if ($item->AtrributeID == 5) {
//         $this->setNumOFFloors($item->Value);
//    }

//    if ($item->AtrributeID == 9) {
//     $this->setFurnished($item->Value);
//     }
//    if ($item->AtrributeID == 1) {
//         $this->setFloor($item->Value);
//     }
//     if ($item->AtrributeID == 2) {
//       $this->setFinishing($item->Value);
//   }
}
$FinishingArray="";
if($this->Finishing == 1){
    $FinishingArray=" <option value=''>أختر</option>
    <option selected value='1'> متشطب</option>
    <option value='2'> نص تشطيب </option>
    <option value='3'> مش متشطب </option>";
}else if($this->Finishing == 2){
    $FinishingArray=" <option selected value=''>أختر</option>
    <option value='1'> متشطب</option>
    <option selected value='2'> نص تشطيب </option>
    <option value='3'> مش متشطب </option>";
}
else if($this->Finishing == 3){
    $FinishingArray=" <option selected value=''>أختر</option>
    <option value='1'> متشطب</option>
    <option value='2'> نص تشطيب </option>
    <option selected value='3'> مش متشطب </option>";
}
$FurnishedArray="";
if($this->Furnished == 1){
    $FurnishedArray="  <option value=''>أختر</option>
    <option selected value='1'> نعم</option>
    <option value='2'>  لا </option>";
}else if($this->Furnished == 2){
    $FurnishedArray="  <option selected value=''>أختر</option>
    <option value='1'> نعم</option>
    <option selected value='2'>  لا </option>";
}


        $output .=<<<EOT

          <p class='field required half'>
            <label class='label' for='Floor'> الدور</label>
            <input class='text-input' id='Floor' name='Floor' onkeyup="numbers(this)" required type='text'  value="$this->Floor" >
          </p>
        
          <p class='field required half'>
            <label class='label' for='NUMOFRooms'>عددالغرف</label>
            <input class='text-input' id='NUMOFRooms' name='NUMOFRooms' onkeyup="numbers(this)" required type='text' value="$this->Room" >
          </p>
          <p class='field required half'>
            <label class='label' for='NUMOFBathrooms'> عدد الحمامات </label>
            <input class='text-input' id='NUMOFBathrooms' name='NUMOFBathrooms' onkeyup="numbers(this)"required type='text' value="$this->Bathroom" >
          </p>
            <input id='TypeID' name='TypeID' type='hidden' value="1">
          </p>
          <p class='field half'>
            <label class='label' for='Finishing'> التشطيب</label>
            <select class='select' id='Finishing' required>
            $FinishingArray
            </select>
          </p>
          <p class='field half'>
            <label class='label' for='Furnished'> مفروشة</label>
            <select class='select' id='Furnished' required>
            $FurnishedArray
            </select>
          </p>
          <input id='NUMOFFloors' name='NUMOFFloors' type='hidden'>
          <input id='Doublex' name='Doublex' type='hidden'>
          <input id='TypeActivity' name='TypeActivity' type='hidden'>
          <input id='NUMOFAb' name='NUMOFAb' type='hidden'>
          <input id='ChechCode' name='ChechCode' type='hidden' value="$record->Code">
          <input id='EditID' name='EditID' type='hidden' value="$record->ID">

    EOT;
          
        }else {
        

       $output .=<<<EOT
          <p class='field required half'>
            <label class='label' for='NUMOFFloors'>عدد الأدوار</label>
            <input class='text-input' id='NUMOFFloors' name='NUMOFFloors' onkeyup="lettersandnumbers(this)" required type='text'>
          </p>
          
         
          <p class='field half'>
            <label class='label' for='Doublex'> دوبلكس</label>
            <select class='select' id='Doublex' required>
              <option selected value=''>أختر</option>
              <option value='1'> نعم</option>
              <option value='2'>  لا </option>
            </select>
          </p>
          <p class='field half'>
            <label class='label' for='TypeActivity'>نوع النشاط</label>
            <input class='text-input' id='TypeActivity' name='TypeActivity' onkeyup="lettersandnumbers(this)" required type='text'>
          </p>
          <p class='field required half'>
            <label class='label' for='NUMOFAB'>عدد المباني الأدارية</label>
            <input class='text-input' id='NUMOFAB' name='NUMOFAb' onkeyup="lettersandnumbers(this)" required type='text'>
          </p>
    EOT;
          
           } 

        $output .=<<<EOT
  
        </div>
          <p class='field required'>
          <div class="alert alert-danger"role="alert">
          اذا كانت الصور ليست من نوع "png","jpeg","jpg" 
          أو حجمها أكبر من 4 ميجا 
        
          ,فسيتم رفضها تلقائيا !
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