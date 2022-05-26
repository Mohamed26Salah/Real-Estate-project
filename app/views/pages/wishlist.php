<?php
class WishList extends View
{
  public function output()
  {

    try{
      if(empty($_SESSION['user_id']))  {
        throw new Exception('no user found');
      }    
        }
        catch(Exception $e){
                redirect('index');
        }
  


    require APPROOT . '/views/inc/header.php';

?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/ViewPage.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/resetFilter.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/styleFilter.css">
<body style="background-image: url('https://assets.codepen.io/1462889/back-page.svg');">

        
   
         <div id="cardsEmpty" style="font-weight: 900; font-size:25px;margin-left:30%;margin-right:25%;margin-top:10%;">
         </div>
        <div id="cards">
         </div>
         <div style="margin-top:35%;"></div>

   <?php 
        $action = URLROOT . 'Pages/viewItem'; 
        $action2 = 'WishList'; 
        $action4 = URLROOT . 'users/Login'; 
   ?>

  

      <footer> <?php
                require APPROOT . '/views/inc/footer2.php';
                ?> </footer>
    </body>
   
    <script>
      function WishList(IDArray){
        // console.log(IDArray); 
        // console.log(document.getElementById('button'+IDArray).value);
       
        var CardID=IDArray;
        var WishListValue=document.getElementById('button'+IDArray).value;
      
         $.ajax({
          url:"<?php echo $action2;?>",
          method:"POST",
          data:{CardID:CardID,WishListValue:WishListValue},
          
          success:function(data)
          {
            if(data=="denied"){
              // window.location.replace("http://localhost/mvc/public/users/Login");
              window.location.replace("<?php echo $action4; ?>");

            }
            if(WishListValue=="green"){
              WishListValue="red";
              $('#button'+IDArray).css("background-color", "red");
              $('#Span'+IDArray).html("Add to WishList <i class='fa fa-heart' aria-hidden='true'></i>");
              }else if(WishListValue=="red"){
              WishListValue="green";
              $('#button'+IDArray).css("background-color", "green");
              $('#Span'+IDArray).html("Saved");
              }
            document.getElementById('button'+IDArray).value=WishListValue;
          }
        })
      
        }
      function itemsAjax(){
       var work=2;
        $.ajax({
          url:"<?php echo $action2;?>",
          method:"POST",
          data:{work:work},
          
          success:function(data)
          {
              if(data){
                container = document.getElementById('cards')
                container.innerHTML=data;
              }else{
                container = document.getElementById('cardsEmpty')
                container.innerHTML="You need to Add items to your wishlist in order to see it.";
              }
             
              
               
          }
        })
        
      }
      $( ".form" ).change(function() {
        //schow item on change
        itemsAjax();

      });
      //Show item first time 
      itemsAjax();

    </script>

<?php
  }
}

