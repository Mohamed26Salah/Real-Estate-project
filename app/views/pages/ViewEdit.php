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
        EditID=document.getElementById('EditID').value;
        $.ajax({
          url:"<?php echo $action;?>",
          method:"POST",
          data:{EditID:EditID,TypeID:TypeID,name:name,Price:Price,Area:Area,AddressUser:AddressUser,AddressAdmin:AddressAdmin,Owner:Owner,OwnerNum:OwnerNum,Code:Code,DescriptionUser:DescriptionUser,DescriptionAdmin:DescriptionAdmin,contarctType:contarctType,Show:Show,Payment:Payment,Importance:Importance,Floor:Floor,NUMOFRooms:NUMOFRooms,NUMOFBathrooms:NUMOFBathrooms,NUMOFFloors:NUMOFFloors,Furnished:Furnished,Finishing:Finishing,Doublex:Doublex,TypeActivity:TypeActivity,NUMOFAb:NUMOFAb},
          
          success:function(data)
          {
           
          console.log("aDD Ajax worked");

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

