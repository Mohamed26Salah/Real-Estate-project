<?php
class viewEditRentModel extends model
{
    protected $ID;
        
    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
    }
    


    public function CheckCodeEdit($OldCode,$NewCode){
        if($OldCode==$NewCode){

        }else{
            $this->dbh->query("SELECT * FROM rents WHERE code = '".$NewCode."'");
            $ALLRECORDS = $this->dbh->single();
            if(empty($ALLRECORDS)){
                
            }else{
                echo("\"هذا الكود موجود مسبقا\"");
            }
        }
       
        }
    public function UploadImagesEdit($Value,$ID){
          $this->dbh->query("INSERT INTO `rentsimages`(`RentsID`, `Image`) VALUES (:uIID, :uImage)"); 
          $this->dbh->bind(':uIID', $ID);
          $this->dbh->bind(':uImage', $Value);
          $this->dbh->execute();
      }
    public function ShowEditRent(){
        $this->dbh->query("SELECT * FROM `rents` WHERE `ID` = '$this->ID'");
        $record = $this->dbh->single();
     

        $output=<<<EOT
            <p class='field required half'>
        <label class='label' for='Code'>الكود</label>
        <input class='text-input' id='Code' name='Code' onkeyup="CheckCode(this)" onkeyup="lettersandnumbersEnglishOnly(this)" maxlength="11" required type='text' value="$record->code">
        <span  id='CodeError' style="color:red;"></span>
        </p>

        <p class='field required half'>
        <label class='label' for='Price'>السعر</label>
        <input class='text-input' id='Price' name='Price' onkeyup="numbers(this)" required type='text' maxlength="7" value="$record->rentPrice">
        </p>
        EOT;
        $TypeNameArray="";
        if($record->typeName=="Flats"){
            $TypeNameArray= "<option value=''>نوع العقار</option>
            <option selected value='Flats'>شقه</option>
            <option value='Residential Building'>عمارة</option>
            <option value='Villa'>فيلا</option>
            <option value='Store'>محل</option>
            <option value='Clinic'>عيادة</option>
            <option value='Farm'>مزرعة</option>
            <option value='Factory'>مصنع</option>
            <option value='Land'>ارض</option>";
        }else if($record->typeName=="Residential Building"){
            $TypeNameArray= "<option value=''>نوع العقار</option>
            <option value='Flats'>شقه</option>
            <option selected value='Residential Building'>عمارة</option>
            <option value='Villa'>فيلا</option>
            <option value='Store'>محل</option>
            <option value='Clinic'>عيادة</option>
            <option value='Farm'>مزرعة</option>
            <option value='Factory'>مصنع</option>
            <option value='Land'>ارض</option>";
        }
        else if($record->typeName=="Villa"){
            $TypeNameArray= "<option value=''>نوع العقار</option>
            <option value='Flats'>شقه</option>
            <option value='Residential Building'>عمارة</option>
            <option selected value='Villa'>فيلا</option>
            <option value='Store'>محل</option>
            <option value='Clinic'>عيادة</option>
            <option value='Farm'>مزرعة</option>
            <option value='Factory'>مصنع</option>
            <option value='Land'>ارض</option>";
        }
        else if($record->typeName=="Store"){
            $TypeNameArray= "<option value=''>نوع العقار</option>
            <option value='Flats'>شقه</option>
            <option value='Residential Building'>عمارة</option>
            <option value='Villa'>فيلا</option>
            <option selected value='Store'>محل</option>
            <option value='Clinic'>عيادة</option>
            <option value='Farm'>مزرعة</option>
            <option value='Factory'>مصنع</option>
            <option value='Land'>ارض</option>";
        }
        else if($record->typeName=="Clinic"){
            $TypeNameArray= "<option value=''>نوع العقار</option>
            <option value='Flats'>شقه</option>
            <option value='Residential Building'>عمارة</option>
            <option value='Villa'>فيلا</option>
            <option value='Store'>محل</option>
            <option selected value='Clinic'>عيادة</option>
            <option value='Farm'>مزرعة</option>
            <option value='Factory'>مصنع</option>
            <option value='Land'>ارض</option>";
        }
        else if($record->typeName=="Farm"){
            $TypeNameArray= "<option value=''>نوع العقار</option>
            <option value='Flats'>شقه</option>
            <option value='Residential Building'>عمارة</option>
            <option value='Villa'>فيلا</option>
            <option value='Store'>محل</option>
            <option value='Clinic'>عيادة</option>
            <option selected value='Farm'>مزرعة</option>
            <option value='Factory'>مصنع</option>
            <option value='Land'>ارض</option>";
        }
        else if($record->typeName=="Factory"){
            $TypeNameArray= "<option value=''>نوع العقار</option>
            <option value='Flats'>شقه</option>
            <option value='Residential Building'>عمارة</option>
            <option value='Villa'>فيلا</option>
            <option value='Store'>محل</option>
            <option value='Clinic'>عيادة</option>
            <option value='Farm'>مزرعة</option>
            <option selected value='Factory'>مصنع</option>
            <option value='Land'>ارض</option>";
        }else if($record->typeName=="Land"){
            $TypeNameArray= "<option value=''>نوع العقار</option>
            <option value='Flats'>شقه</option>
            <option value='Residential Building'>عمارة</option>
            <option value='Villa'>فيلا</option>
            <option value='Store'>محل</option>
            <option value='Clinic'>عيادة</option>
            <option value='Farm'>مزرعة</option>
            <option value='Factory'>مصنع</option>
            <option selected value='Land'>ارض</option>";
        }
        $output.=<<<EOT
        <p class='field required'>
        <label class='label' for='Show'>نوع العقار</label>
        <select class='select' id='Show' required>
        $TypeNameArray;
        </select>
        </p>
        <p class='field half required half'>
        <label class='label' for='Area'>المساحة</label>
        <input class='text-input' id='Area' name='Area'required onkeyup="numbers(this)" type='text' maxlength="20" value="$record->area">
        </p>
        <p class='field required half'>
        <label class='label' for='NUMOFFloors'> الدور</label>
        <input class='text-input' id='NUMOFFloors' name='NUMOFFloors' onkeyup="numbers(this)" required type='text' maxlength="5" value="$record->floor">
        </p>
        <p class='field half required'>
        <label class='label' for='LessorName'>اسم المؤجر</label>
        <input class='text-input' id='LessorName' name='LessorName' onkeyup="lettersandnumbers(this)" maxlength="80" required type='text' value="$record->LessorName">
        </p>

        <p class='field half required'>
        <label class='label' for='LessorNum'>رقم المؤجر</label>
        <input class='text-input' id='LessorNum' name='LessorNum' onkeyup="numbers(this)" required type='text' maxlength="20" value="$record->LessorNum">
        </p>
        <p class='field half required'>
        <label class='label' for='TenantName'>اسم المستأجر</label>
        <input class='text-input' id='TenantName' name='TenantName' onkeyup="lettersandnumbers(this)" maxlength="80" required type='text' value="$record->TenantName">
        </p>
        <p class='field half required'>
        <label class='label' for='TenantNum'>رقم المستأجر</label>
        <input class='text-input' id='TenantNum' name='TenantNum' onkeyup="numbers(this)" required type='text' maxlength="20" value="$record->TenantNum">
        </p>
        <p class='field required'>
        <label class='label' for='Description'>الوصف</label>
        <textarea class='textarea' cols='50' id='Description' name='Description' onkeyup="lettersandnumbers(this)" maxlength="1000" required rows='4'>$record->description</textarea>
        </p>
        EOT;
        $furnishedString="";
        if($record->furnished=="1"){
            $furnishedString="<option value=''>اختر</option>
            <option selected value='1'>مفروشة</option>
            <option value='2'>ليست مفروشة</option>";
        }else if($record->furnished=="2"){
            $furnishedString="<option value=''>اختر</option>
            <option value='1'>مفروشة</option>
            <option selected value='2'>ليست مفروشة</option>";
        }
        $output.=<<<EOT
        <p class='field half required'>
        <label class='label' for='furnished'>مفروشة</label>
        <select class='select' id='furnished' required>
        $furnishedString
        </select>
        </p>
        EOT;
        $FinishingString="";
        if($record->FD=="1"){
            $FinishingString=" <option value=''>اختر</option>
            <option selected value='1'>متشطب</option>
            <option value='2'>نصف تشطيب</option>
            <option value='3'>مش متشطب</option>";
        }else if($record->FD=="2"){
            $FinishingString="<option selected value=''>اختر</option>
            <option value='1'>متشطب</option>
            <option selected value='2'>نصف تشطيب</option>
            <option value='3'>مش متشطب</option>";
        }
        else if($record->FD=="4"){
            $FinishingString="<option selected value=''>اختر</option>
            <option value='1'>متشطب</option>
            <option value='2'>نصف تشطيب</option>
            <option selected value='3'>مش متشطب</option>";
        }
        $output.=<<<EOT
        <p class='field half required'>
        <label class='label' for='Finishing'>تشطيب</label>
        <select class='select' id='Finishing' required>
        $FinishingString
        </select>
        </p>

        
        <p class='field half required'>
        <label class='label' for='StartOFRent'>بداية التعاقد</label>
        <input class='text-input' id='StartOFRent' onchange="defineDate(),disabledd(),disabledd2()" name='StartOFRent' required type='date' value="$record->Start_OF_Rent" disabled>
        </p>
        <p class='field half required'>
        <label class='label' for='ENDOFRent'>نهاية التعاقد</label>
        <input class='text-input' id='ENDOFRent' onchange="defineDate2(),disabledd(),openclose()" name='ENDOFRent' required type='date' value="$record->END_OF_Rent" min="" max="" disabled>
        </p>
        <p class='field half required'>
        <label class='label' for='TOR'>بداية الأيجار الحالى</label>
        <input class='text-input' id='TOR' onchange="defineDate3(),disabledd3(),openclose2()" name='TOR' required type='date' value="$record->TOR" min="" max="" disabled >
        </p>
        <p class='field half required'>
        <label class='label' for='TOREND'>نهاية الأيجار الحالى</label>
        <input class='text-input' id='TOREND' onchange="openclose3()" name='TOREND' required type='date' value="$record->TOREND" min="" max="" disabled>
        </p>
        <button type="button" onclick="ClearLastEdit()" class="btn btn-primary"> أمسح التواريخ من أجل تغيرها</button>


        <p class='field required'>
        <div class="alert alert-danger"role="alert">
        ملحوظة:
        <br>
        1/
        اذا كانت الصور ليست من نوع "png","jpeg","jpg" 
        أو حجمها أكبر من 4 ميجا 
        ,فسيتم رفضها تلقائيا !
        <br>
        2/
        مسموح بعدد 20 صورة فقط !
        </div>
        </p>

        <p class='field required'>
        Select Image Files to Upload:
        <input type="file" id='files' name="files[]" multiple><br>
        </p>
        <input id='ChechCode' name='ChechCode' type='hidden' value="$record->code">
        <p class='field half'>
        <input class='button' id="submit" type='submit' onclick="Start()">

        </p>


      
       EOT;
    
        return $output;

    }
}