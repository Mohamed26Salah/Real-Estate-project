<?php
class ViewADD extends view
{

  public function output()
  {
    require APPROOT . '/views/inc/header.php';
    
    if(isset($_GET['ID'])){
      //  $ID=$_GET['ID'];
       $_SESSION['UnitID']=$_GET['ID'];
      }
    $action = 'ViewADD'; 
    $action2 = URLROOT . 'Pages/viewItem'; 

      ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>css/Add.css">
<html>
    <body>

<div class="All text-right" dir="rtl">
  <div class="Caution" id="Caution"></div>
<form class="form" id="form" enctype="multipart/form-data">
  <p class='field required'>
    <label class='label required' for='name'>الأسم</label>
    <input class='text-input' id='name' name='name' onkeyup="lettersandnumbers(this)" maxlength="83" required type='text'>
  </p>
 
  <p class='field required half'>
    <label class='label' for='Price'>السعر</label>
    <input class='text-input' id='Price' name='Price' onkeyup="numbers(this)" required type='text'>
  </p>
  <p class='field half required'>
    <label class='label' for='Area'>المساحة</label>
    <input class='text-input' id='Area' name='Area'required onkeyup="numbers(this)" type='text'>
  </p>
  <p class='field half required'>
    <label class='label' for='AddressUser'>العنوان للمستخدم</label>
    <input class='text-input' id='AddressUser' name='AddressUser' onkeyup="lettersandnumbers(this)" maxlength="80" required type='text'>
  </p>
  <p class='field half required'>
    <label class='label' for='AddressAdmin'>العنوان للمكتب</label>
    <input class='text-input' id='AddressAdmin' name='AddressAdmin' onkeyup="lettersandnumbers(this)" required type='text'>
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
    <input class='text-input' id='OwnerNum' name='OwnerNum' onkeyup="numbers(this)" required type='text'>
  </p>
  <p class='field required half'>
    <label class='label' for='Code'>الكود</label>
    <input class='text-input' id='Code' name='Code' onkeyup="CheckCode(this)" onkeyup="lettersandnumbersEnglishOnly(this)" maxlength="11" required type='text'>
    <span  id='CodeError' style="color:red;"></span>
  </p>
  <p class='field required'>
    <label class='label' for='DescriptionUser'>الوصف للمستخدم</label>
    <textarea class='textarea' cols='50' id='DescriptionUser' name='DescriptionUser' onkeyup="lettersandnumbers(this)" required rows='4'></textarea>
  </p>
  <p class='field required'>
    <label class='label' for='DescriptionAdmin'>الوصف للمكتب</label>
    <textarea class='textarea' cols='50' id='DescriptionAdmin' name='DescriptionAdmin' onkeyup="lettersandnumbers(this)" required rows='4'></textarea>
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
  if($_SESSION['UnitID']==1){
?>
  
  <p class='field required half'>
    <label class='label' for='Floor'> الدور</label>
    <input class='text-input' id='Floor' name='Floor' onkeyup="numbers(this)" required type='text'>
  </p>

  <p class='field required half'>
    <label class='label' for='NUMOFRooms'>عددالغرف</label>
    <input class='text-input' id='NUMOFRooms' name='NUMOFRooms' onkeyup="numbers(this)" required type='text'>
  </p>
  <p class='field required half'>
    <label class='label' for='NUMOFBathrooms'> عدد الحمامات </label>
    <input class='text-input' id='NUMOFBathrooms' name='NUMOFBathrooms' onkeyup="numbers(this)"required type='text'>
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
  <input id='NUMOFFloors' name='NUMOFFloors' type='hidden'>
  <input id='Doublex' name='Doublex' type='hidden'>
  <input id='TypeActivity' name='TypeActivity' type='hidden'>
  <input id='NUMOFAb' name='NUMOFAb' type='hidden'>

  <?php
  }else {

  ?>
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
  
  <?php
   }  
  ?>
  <p class='field required'>
   Select Image Files to Upload:
    <input type="file" id='files' name="files[]" multiple><br>
    </p>

  <p class='field half'>
    <button class='button' id="submit" onclick="Start(this)">Submit</button>
    <!-- <input class='button' id="submit" type='submit' onclick="Start()"> -->
   
  </p>
</form>
</div>

<?php
    require APPROOT . '/views/inc/footer2.php';
    ?>

<script>
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
      if( document.getElementById('name').value ) {
        name = document.getElementById('name').value;
        }
        else{
          name = "Salah";
        }
        if( document.getElementById('Price').value ) {
          Price = document.getElementById('Price').value;
        }
        else{
          Price = "Salah";
        }
        if( document.getElementById('Area').value ) {
          Area = document.getElementById('Area').value;
        }
        else{
          Area = "Salah";
        }
        if( document.getElementById('AddressUser').value ) {
          AddressUser = document.getElementById('AddressUser').value;
        }
        else{
          AddressUser = "Salah";
        }
        if( document.getElementById('AddressAdmin').value ) {
          AddressAdmin = document.getElementById('AddressAdmin').value;
        }
        else{
          AddressAdmin = "Salah";
        }
        if( document.getElementById('Owner').value ) {
          Owner = document.getElementById('Owner').value;
        }
        else{
          Owner = "Salah";
        }
        if( document.getElementById('OwnerNum').value ) {
          OwnerNum = document.getElementById('OwnerNum').value;
        }
        else{
          OwnerNum = "Salah";
        }
        if( document.getElementById('Code').value ) {
          Code = document.getElementById('Code').value;
        }
        else{
          Code = "Salah";
        }
        if( document.getElementById('DescriptionUser').value ) {
          DescriptionUser = document.getElementById('DescriptionUser').value;
        }
        else{
          DescriptionUser = "Salah";
        }
        if( document.getElementById('DescriptionAdmin').value ) {
          DescriptionAdmin = document.getElementById('DescriptionAdmin').value;
        }
        else{
          DescriptionAdmin = "Salah";
        }
        if( document.getElementById('contarctType').value ) {
          contarctType = document.getElementById('contarctType').value;
        }
        else{
          contarctType = "Salah";
        }
        if( document.getElementById('Show').value ) {
          Show = document.getElementById('Show').value;
        }
        else{
          Show = "Salah";
        }
        if( document.getElementById('Payment').value ) {
          Payment = document.getElementById('Payment').value;
        }
        else{
          Payment = "Salah";
        }
        if( document.getElementById('Importance').value ) {
          Importance = document.getElementById('Importance').value;
        }
        else{
          Importance = "Salah";
        }
        /////////////////////////////////////////////////////////////////
        if( document.getElementById('Floor').value ) {
          Floor = document.getElementById('Floor').value;
        }
        else{
          Floor = "Salah";
        }
        if( document.getElementById('NUMOFRooms').value ) {
          NUMOFRooms = document.getElementById('NUMOFRooms').value;
        }
        else{
          NUMOFRooms = "Salah";
        }
        if( document.getElementById('NUMOFBathrooms').value ) {
          NUMOFBathrooms = document.getElementById('NUMOFBathrooms').value;
        }
        else{
          NUMOFBathrooms = "Salah";
        }
        if( document.getElementById('NUMOFFloors').value ) {
          NUMOFFloors = document.getElementById('NUMOFFloors').value;
        }
        else{
          NUMOFFloors = "Salah";
        }
        if( document.getElementById('Furnished').value ) {
          Furnished = document.getElementById('Furnished').value;
        }
        else{
          Furnished = "Salah";
        }
        if( document.getElementById('Finishing').value ) {
          Finishing = document.getElementById('Finishing').value;
        }
        else{
          Finishing = "Salah";
        }
        if( document.getElementById('Doublex').value ) {
          Doublex = document.getElementById('Doublex').value;
        }
        else{
          Doublex = "Salah";
        }
        if( document.getElementById('TypeActivity').value ) {
          TypeActivity = document.getElementById('TypeActivity').value;
        }
        else{
          TypeActivity = "Salah";
        }
        if( document.getElementById('NUMOFAb').value ) {
          NUMOFAb = document.getElementById('NUMOFAb').value;
        }
        else{
          NUMOFAb = "Salah";
        }
        //////////////////////////////////////////////////////////
        if( document.getElementById('TypeID').value ) {
          TypeID = document.getElementById('TypeID').value;
        }
        else{
          TypeID = "Salah";
        }
        
        $.ajax({
          url:"<?php echo $action;?>",
          method:"POST",
          data:{TypeID:TypeID,name:name,Price:Price,Area:Area,AddressUser:AddressUser,AddressAdmin:AddressAdmin,Owner:Owner,OwnerNum:OwnerNum,Code:Code,DescriptionUser:DescriptionUser,DescriptionAdmin:DescriptionAdmin,contarctType:contarctType,Show:Show,Payment:Payment,Importance:Importance,Floor:Floor,NUMOFRooms:NUMOFRooms,NUMOFBathrooms:NUMOFBathrooms,NUMOFFloors:NUMOFFloors,Furnished:Furnished,Finishing:Finishing,Doublex:Doublex,TypeActivity:TypeActivity,NUMOFAb:NUMOFAb},
          
          success:function(data)
          {
           
            window.location.replace("<?php echo $action2;?>")

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
           
          }
          });
        
      }

function start(e){
  e.preventDefault();
  if(document.getElementById('CodeError').innerHTML=="\"هذا الكود موجود مسبقا\"")
  {
    
    $('#Caution').html("<div class='text-center fixed-top' style='margin-top:30px;'><button class='btn btn-danger' id='Db' style='width:50%'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> يا حج غير الكود </button></div>");
  }else{
    AddAjax()
    Image()
  }

}
// $('#submit').click(function() {
//   if(document.getElementById('CodeError').innerHTML=="\"هذا الكود موجود مسبقا\"")
//   {
// //     $("submit").click(function(event){
// //   event.preventDefault();
// // });
//     $('#Caution').html("<div class='text-center fixed-top' style='margin-top:30px;'><button class='btn btn-danger' id='Db' style='width:50%'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> يا حج غير الكود </button></div>");
//   }else{
//     AddAjax()
//     Image()
//   }

  
// });

// $("form").click(function(event){
//   event.preventDefault();
// });
</script>
    <?php
  }
}
?>

  </body>
</html>
