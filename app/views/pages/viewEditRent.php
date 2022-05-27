<?php
class viewEditRent extends view
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
    if(isset($_GET['IDE'])){
      $_SESSION['UnitID']=$_GET['IDE'];
      $IDE=$_GET['IDE'];
      ?>
      <input type="hidden" name="EditID" id="EditID" value="<?php echo $IDE; ?>">
      <?php
      }
      $action = 'ViewADDRent'; 
      $action2 = URLROOT . 'Pages/viewRentDescription?ID='.$IDE.'&color='.$_GET['color'];
      $action3 = 'ViewEditRent'; 

    ?>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Add.css">
    <html>
        <body>
        <input type="hidden" name="EditID" id="EditID" value="<?php echo($_GET['IDE']); ?>">
        <div class="All text-right" dir="rtl">
        <div class="Caution" id="Caution"></div>
        <form class="form" id="form" enctype="multipart/form-data">
          <!-- <div class="Edit" id="Edit"></div> -->
          </form>
        </div>
        <script>
           function ClearLastEdit(){
    document.getElementById("StartOFRent").value=""
    document.getElementById("ENDOFRent").value=""
    document.getElementById("TOR").value=""
    document.getElementById("TOREND").value=""
    $( "#StartOFRent" ).prop( "disabled", false);
    $( "#ENDOFRent" ).prop( "disabled", true );
    $( "#TOR" ).prop( "disabled", true );
    document.getElementById("TOR").min=""
    document.getElementById("TOR").max=""
    $( "#TOREND" ).prop( "disabled", true );
    document.getElementById("TOREND").min=""
    document.getElementById("TOREND").max=""
  }
  function openclose(){
    $( "#StartOFRent" ).prop( "disabled", true );
  }
  function openclose2(){
    $( "#ENDOFRent" ).prop( "disabled", true );
  }
  function openclose3(){
    $( "#TOR" ).prop( "disabled", true );
  }
  function disabledd(){
    //Disable the smaller dates
    if(document.getElementById("StartOFRent").value && document.getElementById("ENDOFRent").value ){
      $( "#TOR" ).prop( "disabled", false );
      // $( "#TOREND" ).prop( "disabled", false );
    }else{
      $( "#TOR" ).prop( "disabled", true  );
      // $( "#TOREND" ).prop( "disabled", true  );
    }
  }
  function disabledd2(){
    //disable the end of rent
    if(document.getElementById("StartOFRent").value ){
      $( "#ENDOFRent" ).prop( "disabled", false );
    }else{
      $( "#ENDOFRent" ).prop( "disabled", true );
    }
  }
  function disabledd3(){
    //disable TOREND
    if(document.getElementById("TOR").value ){
      $( "#TOREND" ).prop( "disabled", false );
    }else{
      $( "#TOREND" ).prop( "disabled", true );
    }
  }
function defineDate(){
  //define min and max for smaller dates and min for end of rent
  var date4=document.getElementById("StartOFRent").value
  // document.getElementById("TOR").value=date4
  document.getElementById("TOR").min=date4
  document.getElementById("TOREND").min=date4
  document.getElementById("ENDOFRent").min=date4

 
}
function defineDate2(){
  // document.getElementById("StartOFRent").value=""
  //define min and max for smaller dates bs
  var date5=document.getElementById("ENDOFRent").value
 
  document.getElementById("TOREND").max=date5
  // document.getElementById("TOREND").value=date5
  document.getElementById("TOR").max=date5
  
}

function defineDate3(){
  //define min and max for TOREND dates bs
  var date1=document.getElementById("TOR").value
 
  document.getElementById("TOREND").min=date1

}
        itemsAjax();
        function itemsAjax(){
        // console.log("da5l")
        var FireAJAXRent = document.getElementById('EditID').value;
        $.ajax({
          url:"<?php echo $action3;?>",
          method:"POST",
          data:{FireAJAXRent:FireAJAXRent},
          
          success:function(data)
          {
            //   console.log(data);
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
  
  function RentEdit(){
    var Add_Data = new FormData();
       
   EditIDRent=document.getElementById('EditID').value;
   Add_Data.append("EditIDRent",EditIDRent);
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
                //  console.log(data);
                 window.location.replace("<?php echo $action2; ?>");
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
            // window.location.replace("");
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
      RentEdit()
      Image()

    }else{
      RentEdit()
    //   window.location.replace("");
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

