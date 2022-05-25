<?php
class ViewEdit extends view
{

  public function output()
  {
    require APPROOT . '/views/inc/header.php';
    if(isset($_GET['IDE'])){
      $_SESSION['UnitID']=$_GET['IDE'];
      $IDE=$_GET['IDE'];
      ?>
      <input type="hidden" name="EditID" id="EditID" value="<?php echo $IDE; ?>">
      <?php
      }
      $action = 'ViewADD'; 
      $action2 = URLROOT . 'Pages/viewItem'; 
      $action3 = 'ViewEdit'; 
      $action4 = URLROOT . 'Pages/viewDescription?ID='.$IDE.'&TypeID='.$_GET['TypeID'];

    ?>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Add.css">
    <html>
        <body>
        <input type="hidden" name="TypeID" id="TypeID" value="<?php echo($_GET['TypeID']); ?>">
        <div class="All text-right" dir="rtl">
        <div class="Caution" id="Caution"></div>
        <form class="form" id="form" enctype="multipart/form-data">
          <!-- <div class="Edit" id="Edit"></div> -->
          </form>
        </div>
        <script>
        itemsAjax();
        function itemsAjax(){

        var FireAJAX = document.getElementById('EditID').value;
        $.ajax({
          url:"<?php echo $action3;?>",
          method:"POST",
          data:{FireAJAX:FireAJAX},
          
          success:function(data)
          {
              // console.log(data);
              container = document.getElementById('form')
              container.innerHTML=data;
          }
        })
        
      }
     
      function CheckCode(input){
        var OldCode=document.getElementById('ChechCode').value;
    codeInput=input.value;
    $.ajax({
          url:"<?php echo $action3;?>",
          method:"POST",
          data:{OldCode:OldCode,codeInput:codeInput},
          
          success:function(data)
          {
            // console.log(data);
            $('#CodeError').html(data);
          }
        })
      
  }
  
  function AddAjaxEdit(){
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
        EditID=document.getElementById('EditID').value;
        Add_Data.append("EditID",EditID);
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
            console.log(data);
            // window.location.replace("<?php echo $action2;?>");
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
          form_data.append("YASSER", document.getElementById('EditID').value);
          // AJAX request
          $.ajax({
          url: "<?php echo $action3;?>", 
          method:"POST",
          data: form_data,
          // dataType: 'json',
          contentType: false,
          processData: false,
          success: function (response) {
            //  console.log(response);
            $('#Caution').html(response);
            window.location.replace("<?php echo $action4;?>");
          }
          });
        
      }
  
      
      document.getElementById("form").addEventListener("submit", function(event){
      event.preventDefault();
      });
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
    function DeleteImages(){
      var IDForImages
      IDForImages=document.getElementById('EditID').value;
      $.ajax({
          url: "<?php echo $action;?>", 
          method:"POST",
          data: {IDForImages:IDForImages},
          success: function (data) {
            console.log("DeleteImages Done");
          }
          });
    }
function Start(){
  if(document.getElementById('CodeError').innerHTML=="\"هذا الكود موجود مسبقا\"")
  {
    $('#Caution').html("<div class='text-center fixed-top' style='margin-top:30px;'><button class='btn btn-danger' id='Db' style='width:50%'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> يا حج غير الكود </button></div>");
    RemoveError();
  }else if($("#files")[0].files.length > 21){
    $('#Caution').html("<div class='text-center fixed-top' style='margin-top:30px;'><button class='btn btn-danger' id='Db' style='width:50%'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i>لقد تخطيت الحد المسموح للصور, الذي يبلغ 20 صورة </button></div>");
    RemoveError();
  }
  else{
    var $myForm = $('#form');

    if (!$myForm[0].checkValidity()) {
        $myForm.find(':submit').click();
    }
    if($("#files")[0].files.length >= 1){
      DeleteImages()
      AddAjaxEdit()
      Image()

    }else{
      AddAjaxEdit()
      window.location.replace("<?php echo $action4;?>");
    }
    
  }

}
      
        </script>
        </body>
    </html>    
   <?php
   require APPROOT . '/views/inc/footer2.php';
  }
}

