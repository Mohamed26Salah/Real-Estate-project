<?php
class ViewADDRent extends view
{

  public function output()
  {
    require APPROOT . '/views/inc/header.php';
    $action = 'ViewADDRent'; 
    $action2 = URLROOT . 'Pages/viewRent'; 

      ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>css/Add.css">
<html>
    <body>
<div class="All text-right" dir="rtl">
  <div class="Caution" id="Caution"></div>
<form class="form" id="form" enctype="multipart/form-data">
  <p class='field required half'>
    <label class='label' for='Code'>الكود</label>
    <input class='text-input' id='Code' name='Code' onkeyup="CheckCode(this)" onkeyup="lettersandnumbersEnglishOnly(this)" maxlength="11" required type='text'>
    <span  id='CodeError' style="color:red;"></span>
  </p>
 
  <p class='field required half'>
    <label class='label' for='Price'>السعر</label>
    <input class='text-input' id='Price' name='Price' onkeyup="numbers(this)" required type='text'>
  </p>
  <p class='field required'>
    <label class='label' for='Show'>نوع العقار</label>
    <select class='select' id='Show' required>
      <option selected value=''>نوع العقار</option>
      <option value='Flats'>شقه</option>
      <option value='Residential Building'>عمارة</option>
      <option value='Villa'>فيلا</option>
      <option value='Store'>محل</option>
      <option value='Clinic'>عيادة</option>
      <option value='Farm'>مزرعة</option>
      <option value='Factory'>مصنع</option>
      <option value='Land'>ارض</option>
    </select>
  </p>
  <p class='field half required half'>
    <label class='label' for='Area'>المساحة</label>
    <input class='text-input' id='Area' name='Area'required onkeyup="numbers(this)" type='text'>
  </p>
  <p class='field required half'>
    <label class='label' for='NUMOFFloors'>عدد الأدوار</label>
    <input class='text-input' id='NUMOFFloors' name='NUMOFFloors' onkeyup="numbers(this)" required type='text'>
   </p>
  <p class='field half required'>
    <label class='label' for='LessorName'>اسم المؤجر</label>
    <input class='text-input' id='LessorName' name='LessorName' onkeyup="lettersandnumbers(this)" maxlength="80" required type='text'>
  </p>
  
  <p class='field half required'>
    <label class='label' for='LessorNum'>رقم المؤجر</label>
    <input class='text-input' id='LessorNum' name='LessorNum' onkeyup="numbers(this)" required type='text'>
  </p>
  <p class='field half required'>
    <label class='label' for='TenantName'>اسم المستأجر</label>
    <input class='text-input' id='TenantName' name='TenantName' onkeyup="lettersandnumbers(this)" maxlength="80" required type='text'>
  </p>
  <p class='field half required'>
    <label class='label' for='TenantNum'>رقم المستأجر</label>
    <input class='text-input' id='TenantNum' name='TenantNum' onkeyup="numbers(this)" required type='text'>
  </p>
 <p class='field required'>
    <label class='label' for='Description'>الوصف</label>
    <textarea class='textarea' cols='50' id='Description' name='Description' onkeyup="lettersandnumbers(this)" required rows='4'></textarea>
  </p>
  <p class='field half required'>
    <label class='label' for='furnished'>مفروشة</label>
    <select class='select' id='furnished' required>
      <option selected value=''>اختر</option>
      <option value='1'>مفروشة</option>
      <option value='2'>ليست مفروشة</option>
    </select>
  </p>
  <p class='field half required'>
    <label class='label' for='Finishing'>تشطيب</label>
    <select class='select' id='Finishing' required>
      <option selected value=''>اختر</option>
      <option value='1'>متشطب</option>
      <option value='2'>نصف تشطيب</option>
      <option value='3'>مش متشطب</option>
    </select>
  </p>
  
 
 <p class='field half required'>
    <label class='label' for='StartOFRent'>بداية التعاقد</label>
    <input class='text-input' id='StartOFRent' name='StartOFRent' required type='date'>
  </p>
  <p class='field half required'>
    <label class='label' for='ENDOFRent'>نهاية التعاقد</label>
    <input class='text-input' id='ENDOFRent' name='ENDOFRent' required type='date'>
  </p>
<p class='field half required'>
    <label class='label' for='TOR'>بداية الأيجار الحالى</label>
    <input class='text-input' id='TOR' name='TOR' required type='date'>
  </p>
  <p class='field half required'>
    <label class='label' for='TOREND'>نهاية الأيجار الحالى</label>
    <input class='text-input' id='TOREND' name='TOREND' required type='date'>
  </p>
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
    <input class='button' id="submit" type='submit' onclick="Start()">
   
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
      
      var Add_Data = new FormData();
       

  if( document.getElementById('Code').value ) {
        Code = document.getElementById('Code').value;
        Add_Data.append("Code",Code);
        }
        else{
          Code = "Salah";
          Add_Data.append("Code",Code);
        }
        if( document.getElementById('Price').value ) {
          Price = document.getElementById('Price').value;
          Add_Data.append("Price",Price);
        }
        else{
          Price = "Salah";
          Add_Data.append("Price",Price);
        }if( document.getElementById('Show').value ) {
          Show = document.getElementById('Show').value;
          Add_Data.append("Show",Show);
        }
        else{
          Show = "Salah";
          Add_Data.append("Show",Show);
        }
        if( document.getElementById('Area').value ) {
          Area = document.getElementById('Area').value;
          Add_Data.append("Area",Area);
        }
        else{
          Area = "Salah";
          Add_Data.append("Area",Area);
        }
         if( document.getElementById('NUMOFFloors').value ) {
          NUMOFFloors = document.getElementById('NUMOFFloors').value;
          Add_Data.append("NUMOFFloors",NUMOFFloors);
        }
        else{
          NUMOFFloors = "Salah";
          Add_Data.append("NUMOFFloors",NUMOFFloors);
        }
        if( document.getElementById('LessorName').value ) {
          LessorName = document.getElementById('LessorName').value;
          Add_Data.append("LessorName",LessorName);
        }
        else{
          LessorName = "Salah";
          Add_Data.append("LessorName",LessorName);
        }
        if( document.getElementById('LessorNum').value ) {
          LessorNum = document.getElementById('LessorNum').value;
          Add_Data.append("LessorNum",LessorNum);
        }
        else{
          LessorNum = "Salah";
          Add_Data.append("LessorNum",LessorNum);
        }
        if( document.getElementById('TenantName').value ) {
          TenantName = document.getElementById('TenantName').value;
          Add_Data.append("TenantName",TenantName);
        }
        else{
          TenantName = "Salah";
          Add_Data.append("TenantName",TenantName);
        }
        if( document.getElementById('TenantNum').value ) {
          TenantNum = document.getElementById('TenantNum').value;
          Add_Data.append("TenantNum",TenantNum);
        }
        else{
          TenantNum = "Salah";
          Add_Data.append("TenantNum",TenantNum);
        }
        if( document.getElementById('Description').value ) {
          Description = document.getElementById('Description').value;
          Add_Data.append("Description",Description);
        }
        else{
          Description = "Salah";
          Add_Data.append("Description",Description);
        }
        if( document.getElementById('furnished').value ) {
          furnished = document.getElementById('furnished').value;
          Add_Data.append("furnished",furnished);
        }
        else{
          furnished = "Salah";
          Add_Data.append("furnished",furnished);
        }
        
if( document.getElementById('Finishing').value ) {
          Finishing = document.getElementById('Finishing').value;
          Add_Data.append("Finishing",Finishing);
        }
        else{
          Finishing = "Salah";
          Add_Data.append("Finishing",Finishing);
        }
        if( document.getElementById('StartOFRent').value ) {
          StartOFRent = document.getElementById('StartOFRent').value;
          Add_Data.append("StartOFRent",StartOFRent);
        }
        else{
          StartOFRent = "Salah";
          Add_Data.append("StartOFRent",StartOFRent);
        }
        if( document.getElementById('ENDOFRent').value ) {
          ENDOFRent = document.getElementById('ENDOFRent').value;
          Add_Data.append("ENDOFRent",ENDOFRent);
        }
        else{
          ENDOFRent = "Salah";
          Add_Data.append("ENDOFRent",ENDOFRent);
        }
        if( document.getElementById('TOR').value ) {
          TOR = document.getElementById('TOR').value;
          Add_Data.append("TOR",TOR);
        }
        else{
          TOR = "Salah";
          Add_Data.append("TOR",TOR);
        }
        if( document.getElementById('TOREND').value ) {
          TOREND = document.getElementById('TOREND').value;
          Add_Data.append("TOREND",TOREND);
        }
        else{
          TOREND = "Salah";
          Add_Data.append("TOREND",TOREND);
        } 
       $.ajax({
          url:"<?php echo $action;?>",
          method:"POST",
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
