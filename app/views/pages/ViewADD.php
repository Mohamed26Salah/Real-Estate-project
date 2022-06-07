<?php
class ViewADD extends view
{

  public function output()
  {
    try{
      if(empty($_SESSION['user_id'])||$_SESSION['Rank']== "User")  {
        throw new Exception('not Admin');
      }    
        }
        catch(Exception $e){
                redirect('index');
        }
    require APPROOT . '/views/inc/header.php';
    $TypeID="";
    if(isset($_GET['TypeID'])){
      //  $ID=$_GET['ID'];
       $TypeID=$_GET['TypeID'];
      }
    $action = 'ViewADD'; 
    $action2 = URLROOT . 'Pages/viewItem?TypeID='.$_GET['TypeID']; 

      ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>css/Add.css">
<html>
    <body>
    <!-- <div style="display:none; " id="loader"></div> -->

<input type="hidden" name="TypeID" id="TypeID" value="<?php echo($_GET['TypeID']); ?>">

<div class="All text-right" dir="rtl">
  <div class="Caution" id="Caution"></div>
<form class="form" id="form" enctype="multipart/form-data">
  <p class='field required'>
    <label class='label required' for='name'>الأسم</label>
    <input class='text-input' id='name' name='name' onkeyup="lettersandnumbers(this)" maxlength="83" required type='text'>
  </p>
 
  <p class='field required half'>
    <label class='label' for='Price'>السعر</label>
    <input class='text-input' id='Price' name='Price' onkeyup="numbers(this)" required type='text' maxlength="20">
  </p>
  <p class='field half required'>
    <label class='label' for='Area'>المساحة</label>
    <input class='text-input' id='Area' name='Area'required onkeyup="numbers(this)" type='text' maxlength="20">
  </p>
  <p class='field half required'>
    <label class='label' for='AddressUser'>العنوان للمستخدم</label>
    <input class='text-input' id='AddressUser' name='AddressUser' onkeyup="lettersandnumbers(this)" maxlength="60" required type='text'>
  </p>
  <p class='field half required'>
    <label class='label' for='AddressAdmin'>العنوان للمكتب</label>
    <input class='text-input' id='AddressAdmin' name='AddressAdmin' onkeyup="lettersandnumbers(this)" required type='text' maxlength="300">
  </p>

  <!-- <p class='field half'>
    <label class='label' for='TypeActivity'>نوع النشاط</label>
    <input class='text-input' id='TypeActivity' name='TypeActivity'required type='text'>
  </p> -->
  <!-- <p class='field half required error'>
   
  </p> -->
  <p class='field half required'>
    <label class='label' for='Owner'>اسم صاحب العقار</label>
    <input class='text-input' id='Owner' name='Owner' maxlength="40" onkeyup="lettersandnumbers(this)" required type='text'>
  </p>
  <p class='field half required'>
    <label class='label' for='OwnerNum'>رقم صاحب العقار</label>
    <input class='text-input' id='OwnerNum' name='OwnerNum' maxlength="20" onkeyup="numbers(this)" required type='text'>
  </p>
  <p class='field required half'>
    <label class='label' for='Code'>الكود</label>
    <input class='text-input' id='Code' name='Code' onkeyup="CheckCode(this),lettersandnumbersEnglishOnly(this)"  maxlength="11" required type='text'>
    <span  id='CodeError' style="color:red;"></span>
  </p>
  <p class='field required'>
    <label class='label' for='DescriptionUser'>الوصف للمستخدم</label>
    <textarea class='textarea' cols='50' id='DescriptionUser' name='DescriptionUser' onkeyup="lettersandnumbers(this)" maxlength="500" required rows='4'></textarea>
  </p>
  <p class='field required'>
    <label class='label' for='DescriptionAdmin'>الوصف للمكتب</label>
    <textarea class='textarea' cols='50' id='DescriptionAdmin' name='DescriptionAdmin' onkeyup="lettersandnumbers(this)" required maxlength="1000" rows='4'></textarea>
  </p>

  
  <p class='field required half'>
    <label class='label' for='contarctType'>النوع</label>
    <select class='select' id='contarctType' required>
      <option selected value=''>أختر</option>
      <option value='1'>للبيع</option>
      <option value='2'>للايجار</option>
    </select>
  </p>
  <p class='field required half'>
    <label class='label' for='Show'>أظهار</label>
    <select class='select' id='Show' required>
      <option selected value=''>أختر</option>
      <option value='1'>أظهار للمستخدمين</option>
      <option value='2'>أخفاء للمستخدمين</option>
    </select>
  </p>
  <p class='field required half'>
    <label class='label' for='Payment'>طريقة الدفع</label>
    <select class='select' id='Payment' required>
      <option selected value=''>أختر</option>
      <option value='Cash'> كاش</option>
      <option value='instalment'> تقسيط</option>
    </select>
  </p>
  <p class='field required half'>
    <label class='label' for='Importance'> الأهمية</label>
    <select class='select' id='Importance' required>
      <option selected value=''>أختر</option>
      <option value='High'> مهم</option>
      <option value='Low'> ليس مهم</option>
    </select>
  </p>
  <!-- <p class='field half'>
    <label class='label' for='select'>دوبلكس ؟</label>
    <select class='select' id='select'>
      <option selected value=''>أختر</option>
      <option value='ceo'>CEO</option>
      <option value='1'>نعم</option>
      <option value='2'>لا</option>
    </select>
  </p> -->
  <?php
  if($TypeID==1){
    ?>
    <p class='field required half'>
    <label class='label' for='Floor'> الدور</label>
    <input class='text-input' id='Floor' name='Floor' onkeyup="numbers(this)" maxlength="5" required type='text'>
  </p>
  <p class='field half'>
    <label class='label' for='Doublex'> دوبلكس</label>
    <select class='select' id='Doublex' required>
      <option selected value=''>أختر</option>
      <option value='1'> نعم</option>
      <option value='2'>  لا </option>
    </select>
  </p>
<?php
  }
  if($TypeID==1|| $TypeID==3){
?>
  
 
  <p class='field required half'>
    <label class='label' for='NUMOFRooms'>عددالغرف</label>
    <input class='text-input' id='NUMOFRooms' name='NUMOFRooms' onkeyup="numbers(this)" maxlength="5" required type='text'>
  </p>
  <p class='field required half'>
    <label class='label' for='NUMOFBathrooms'> عدد الحمامات </label>
    <input class='text-input' id='NUMOFBathrooms' name='NUMOFBathrooms' onkeyup="numbers(this)" maxlength="5" required type='text'>
  </p>
    <input id='TypeID' name='TypeID' type='hidden' value="1">
  </p>
  <p class='field half'>
    <label class='label' for='Finishing'> التشطيب</label>
    <select class='select' id='Finishing' required>
      <option selected value=''>أختر</option>
      <option value='1'> متشطب</option>
      <option value='2'> نص تشطيب </option>
      <option value='3'> مش متشطب </option>
    </select>
  </p>
  <p class='field half'>
    <label class='label' for='Furnished'> مفروشة</label>
    <select class='select' id='Furnished' required>
      <option selected value=''>أختر</option>
      <option value='1'> نعم</option>
      <option value='2'>  لا </option>
    </select>
  </p>
  <!-- <input id='NUMOFFloors' name='NUMOFFloors' type='hidden'>
  <input id='Doublex' name='Doublex' type='hidden'>
  <input id='TypeActivity' name='TypeActivity' type='hidden'>
  <input id='NUMOFAb' name='NUMOFAb' type='hidden'> -->

  <?php
  }
  if($TypeID==2|| $TypeID==3){
    ?>
    <p class='field required half'>
    <label class='label' for='NUMOFFloors'>عدد الأدوار</label>
    <input class='text-input' id='NUMOFFloors' name='NUMOFFloors' onkeyup="numbers(this)" maxlength="5" required type='text'>
   </p>
  
   <?php
  }
  if($TypeID==2){
    ?>
    <p class='field required half'>
    <label class='label' for='NUMOFFlats'>عدد الشقق</label>
    <input class='text-input' id='NUMOFFlats' name='NUMOFFlats' onkeyup="numbers(this)" maxlength="5" required type='text'>
   </p>
   <?php
  }
  
  if($TypeID==4||$TypeID==5||$TypeID==6||$TypeID==7){
    ?>
   <p class='field required half'>
    <label class='label' for='TypeOFActivity'>نوع النشاط</label>
    <input class='text-input' id='TypeOFActivity' name='TypeOFActivity' onkeyup="lettersandnumbers(this)" maxlength="50" required type='text'>
  </p>
   <?php
  }
  if($TypeID==6){
    ?>
   <p class='field required half'>
    <label class='label' for='nUMOFAB'>عدد المباني الأدارية</label>
    <input class='text-input' id='nUMOFAB' name='nUMOFAB' onkeyup="numbers(this)" required type='text' maxlength="5">
  </p>
   <?php
  }
 
 if($TypeID==8|| $TypeID==9){
    ?>
  
    <input class='text-input' id='Fix' name='Fix' type='hidden' value="0">

   <?php
  }
 ?>
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
    <input type="file" id='files' name="files[]" multiple required><br>
    </p>
    
  <p class='field half'>
    <!-- <button class='button' id="submit" onclick="Start(this)">Submit</button> -->
    <input class='button' id="submit" type='submit' onclick="Start()">
   
  </p>
</form>
</div>

<?php
    require APPROOT . '/views/inc/footer2.php';
    ?>

<script>
//    var myVar;

// function myFunction() {
//   myVar = setTimeout(showPage, 5000);
// }

// function showPage() {
//   document.getElementById("loader").style.display = "block";
// }
  function CheckCode(input){
    codeInput=input.value;
    $.ajax({
          url:"<?php echo $action;?>",
          method:"POST",
          data:{codeInput:codeInput},
          
          success:function(data)
          {
            // console.log(data);
            $('#CodeError').html(data);
          }
        })
      
  }
    function AddAjax(){
      var TypeID = document.getElementById('TypeID').value
      var Add_Data = new FormData();
        var Doublex = "Salah";
        var nUMOFAB = "Salah";
        var Bathroom = "Salah";
        var Rooms = "Salah";
        var Furnished = "Salah";
        var Finishing = "Salah";
        var Floor = "Salah";
        var TypeOFActivity = "Salah";
        var NUMOFFlats="Salah";
        var NUMOFFloors="Salah";
        var Fix = "Salah";
        //
   if(TypeID==8 || TypeID==9) {
      if( document.getElementById('Fix').value ) {
        Fix = document.getElementById('Fix').value;
        Add_Data.append("Fix",Fix);
      }
      else{
        Fix = "Salah";
        Add_Data.append("Fix",Fix);
      }
      
    }
    if(TypeID==1) {
      if( document.getElementById('Floor').value ) {
          Floor = document.getElementById('Floor').value;
          Add_Data.append("Floor",Floor);
        }
        else{
          Floor = "Salah";
          Add_Data.append("Floor",Floor);
        }
        if( document.getElementById('Doublex').value ) {
          Doublex = document.getElementById('Doublex').value;
          Add_Data.append("Doublex",Doublex);
        }
        else{
          Doublex = "Salah";
          Add_Data.append("Doublex",Doublex);
        }
    }
    if(TypeID==1 || TypeID==3) {
      if( document.getElementById('NUMOFRooms').value ) {
          NUMOFRooms = document.getElementById('NUMOFRooms').value;
          Add_Data.append("NUMOFRooms",NUMOFRooms);
        }
        else{
          NUMOFRooms = "Salah";
          Add_Data.append("NUMOFRooms",NUMOFRooms);
        }
        if( document.getElementById('NUMOFBathrooms').value ) {
          NUMOFBathrooms = document.getElementById('NUMOFBathrooms').value;
          Add_Data.append("NUMOFBathrooms",NUMOFBathrooms);
        }
        else{
          NUMOFBathrooms = "Salah";
          Add_Data.append("NUMOFBathrooms",NUMOFBathrooms);
        }
        if( document.getElementById('Furnished').value ) {
          Furnished = document.getElementById('Furnished').value;
          Add_Data.append("Furnished",Furnished);
        }
        else{
          Furnished = "Salah";
          Add_Data.append("Furnished",Furnished);
        }
        if( document.getElementById('Finishing').value ) {
          Finishing = document.getElementById('Finishing').value;
          Add_Data.append("Finishing",Finishing);
        }
        else{
          Finishing = "Salah";
          Add_Data.append("Finishing",Finishing);
        }
  
    }
    if(TypeID==2||TypeID==3) {
      if( document.getElementById('NUMOFFloors').value ) {
          NUMOFFloors = document.getElementById('NUMOFFloors').value;
          Add_Data.append("NUMOFFloors",NUMOFFloors);
        }
        else{
          NUMOFFloors = "Salah";
          Add_Data.append("NUMOFFloors",NUMOFFloors);
        }
    }
    if(TypeID==2) {
      if( document.getElementById('NUMOFFlats').value ) {
          NUMOFFlats = document.getElementById('NUMOFFlats').value;
          Add_Data.append("NUMOFFlats",NUMOFFlats);
        }
        else{
          NUMOFFlats = "Salah";
          Add_Data.append("NUMOFFlats",NUMOFFlats);
        }
    }
    if(TypeID==4||TypeID==5||TypeID==6||TypeID==7) {
      if( document.getElementById('TypeOFActivity').value ) {
          TypeOFActivity = document.getElementById('TypeOFActivity').value;
          // console.log(document.getElementById('TypeOFActivity').value);
          // console.log("View Part")
          Add_Data.append("TypeOFActivity",TypeOFActivity);
        }
        else{
          TypeOFActivity = "Salah";
          Add_Data.append("TypeOFActivity",TypeOFActivity);
        }
    }
    if(TypeID==6) {
      if( document.getElementById('nUMOFAB').value ) {
          nUMOFAB = document.getElementById('nUMOFAB').value;
          Add_Data.append("nUMOFAB",nUMOFAB);
        }
        else{
          nUMOFAB = "Salah";
          Add_Data.append("nUMOFAB",nUMOFAB);
        }
    }
      if( document.getElementById('name').value ) {
        name = document.getElementById('name').value;
        Add_Data.append("name",name);
        }
        else{
          name = "Salah";
          Add_Data.append("name",name);
        }
        if( document.getElementById('Price').value ) {
          Price = document.getElementById('Price').value;
          Add_Data.append("Price",Price);
        }
        else{
          Price = "Salah";
          Add_Data.append("Price",Price);
        }
        if( document.getElementById('Area').value ) {
          Area = document.getElementById('Area').value;
          Add_Data.append("Area",Area);
        }
        else{
          Area = "Salah";
          Add_Data.append("Area",Area);
        }
        if( document.getElementById('AddressUser').value ) {
          AddressUser = document.getElementById('AddressUser').value;
          Add_Data.append("AddressUser",AddressUser);
        }
        else{
          AddressUser = "Salah";
          Add_Data.append("AddressUser",AddressUser);
        }
        if( document.getElementById('AddressAdmin').value ) {
          AddressAdmin = document.getElementById('AddressAdmin').value;
          Add_Data.append("AddressAdmin",AddressAdmin);
        }
        else{
          AddressAdmin = "Salah";
          Add_Data.append("AddressAdmin",AddressAdmin);
        }
        if( document.getElementById('Owner').value ) {
          Owner = document.getElementById('Owner').value;
          Add_Data.append("Owner",Owner);
        }
        else{
          Owner = "Salah";
          Add_Data.append("Owner",Owner);
        }
        if( document.getElementById('OwnerNum').value ) {
          OwnerNum = document.getElementById('OwnerNum').value;
          Add_Data.append("OwnerNum",OwnerNum);
        }
        else{
          OwnerNum = "Salah";
          Add_Data.append("OwnerNum",OwnerNum);
        }
        if( document.getElementById('Code').value ) {
          Code = document.getElementById('Code').value;
          Add_Data.append("Code",Code);
        }
        else{
          Code = "Salah";
          Add_Data.append("Code",Code);
        }
        if( document.getElementById('DescriptionUser').value ) {
          DescriptionUser = document.getElementById('DescriptionUser').value;
          Add_Data.append("DescriptionUser",DescriptionUser);
        }
        else{
          DescriptionUser = "Salah";
          Add_Data.append("DescriptionUser",DescriptionUser);
        }
        if( document.getElementById('DescriptionAdmin').value ) {
          DescriptionAdmin = document.getElementById('DescriptionAdmin').value;
          Add_Data.append("DescriptionAdmin",DescriptionAdmin);
        }
        else{
          DescriptionAdmin = "Salah";
          Add_Data.append("DescriptionAdmin",DescriptionAdmin);
        }
        if( document.getElementById('contarctType').value ) {
          contarctType = document.getElementById('contarctType').value;
          Add_Data.append("contarctType",contarctType);
        }
        else{
          contarctType = "Salah";
          Add_Data.append("contarctType",contarctType);
        }
        if( document.getElementById('Show').value ) {
          Show = document.getElementById('Show').value;
          Add_Data.append("Show",Show);
        }
        else{
          Show = "Salah";
          Add_Data.append("Show",Show);
        }
        if( document.getElementById('Payment').value ) {
          Payment = document.getElementById('Payment').value;
          Add_Data.append("Payment",Payment);
        }
        else{
          Payment = "Salah";
          Add_Data.append("Payment",Payment);
        }
        if( document.getElementById('Importance').value ) {
          Importance = document.getElementById('Importance').value;
          Add_Data.append("Importance",Importance);
        }
        else{
          Importance = "Salah";
          Add_Data.append("Importance",Importance);
        }
    
     
      
        //////////////////////////////////////////////////////////
        if( document.getElementById('TypeID').value ) {
          TypeID = document.getElementById('TypeID').value;
          Add_Data.append("TypeID",TypeID);
        }
        else{
          TypeID = "Salah";
          Add_Data.append("TypeID",TypeID);
        }
        
       $.ajax({
          url:"<?php echo $action;?>",
          method:"POST",
          // data:{Fix:Fix,TypeID:TypeID,name:name,Price:Price,Area:Area,AddressUser:AddressUser,AddressAdmin:AddressAdmin,Owner:Owner,OwnerNum:OwnerNum,Code:Code,DescriptionUser:DescriptionUser,DescriptionAdmin:DescriptionAdmin,contarctType:contarctType,Show:Show,Payment:Payment,Importance:Importance,Floor:Floor,NUMOFRooms:NUMOFRooms,NUMOFBathrooms:NUMOFBathrooms,NUMOFFloors:NUMOFFloors,Furnished:Furnished,Finishing:Finishing,Doublex:Doublex,TypeOFActivity:TypeOFActivity,nUMOFAB:nUMOFAB},
          data: Add_Data,
          contentType: false,
          processData: false,
          success:function(data)
          {
            // console.log(data);
            window.location.replace("<?php echo $action2;?>");
          }
        })
      
        
      }
     
      function Image(){
        var form_data = new FormData();
          // Read selected files
          var totalfiles = document.getElementById('files').files.length;
          for (var index = 0; index < totalfiles; index++) {
            console.log(document.getElementById('files').files[index]);
            // form_data.append("array",document.getElementById('files').files[index]);
            form_data.append("files[]", document.getElementById('files').files[index]);
          // console.log(form_data.array);
          }
          // AJAX request
          $.ajax({
          url: "<?php echo $action;?>", 
          method:"POST",
          data: form_data,
          // dataType: 'json',
          contentType: false,
          processData: false,
          success: function (response) {
            $('#Caution').html(response);
          }
          });
        
      }
      document.getElementById("form").addEventListener("submit", function(event){
      event.preventDefault();
      });
    // $("#files").on("change", function() {
    // if ($("#files")[0].files.length > 2) {
      
    // } else {
    //   $("#imageUploadForm").submit();
    // }
    // });
    function RemoveError(){
      var myTimeout = setTimeout(timeout, 5000);
  function timeout(){ $("#Db").fadeOut("slow");}; 
  $(document).ready(function(){
  $("button").click(function (){
    // $("#Db").fadeOut();
    $("#Db").fadeOut("slow");
    // $("#Db").fadeOut(3000);
  });
 });
 
    }
function Start(){
 
  if(document.getElementById('CodeError').innerHTML=="\"هذا الكود موجود مسبقا\"")
  {
    $('#Caution').html("<div class='text-center fixed-top' style='margin-top:30px;'><button class='btn btn-danger' id='Db' style='width:50%'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> يا حج غير الكود </button></div>");
    RemoveError();
  }else if( !document.getElementById('files').value){
    $('#Caution').html("<div class='text-center fixed-top' style='margin-top:30px;'><button class='btn btn-danger' id='Db' style='width:50%'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> يا حج  حط صورة </button></div>");
    RemoveError();
  }else if($("#files")[0].files.length > 21){
    $('#Caution').html("<div class='text-center fixed-top' style='margin-top:30px;'><button class='btn btn-danger' id='Db' style='width:50%'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i>لقد تخطيت الحد المسموح للصور, الذي يبلغ 20 صورة </button></div>");
    RemoveError();
  }
  else{
    // myFunction()
    var $myForm = $('#form');

if (!$myForm[0].checkValidity()) {
    $myForm.find(':submit').click();
}
    AddAjax()
    Image()
  }

}

</script>
    <?php
  }
}
?>

  </body>
</html>
