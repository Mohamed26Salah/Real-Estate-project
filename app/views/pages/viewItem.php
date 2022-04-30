<?php
class viewItem extends View
{
  public function output()
  {


    require APPROOT . '/views/inc/header.php';

?>

<body>
   
  <main class="cd-main-content">
   <div class="cd-tab-filter-wrapper">
     <div class="cd-tab-filter">
       <ul class="cd-filters">
         <li class="placeholder"> 
           <a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
         </li> 
         <?php 
         $uri = $_SERVER['REQUEST_URI'];
         if (str_contains($uri, 'viewItem')) { 
          ?>
          <li class="filter" style="background-color:purple; border-radius:4px;" data-filter=".color-1"><a href="viewItem" data-type="color-1" style="color:white;">Flats</a></li>
          <?php
         }
         ?>
        
         <li class="filter" data-filter=".color-2"><a href="#0" data-type="color-2">Building</a></li>
         <li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Villa</a></li>
         <li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Store</a></li>
         <li class="filter" data-filter=".color-2"><a href="#0" data-type="color-2">clinic</a></li>
         <li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Schools</a></li>
         <li class="filter" data-filter=".color-2"><a href="#0" data-type="color-2">Farm</a></li>
         <li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Factory</a></li>
         <li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Land</a></li>
       </ul> 
     </div> 
   </div> 

   <section class="cd-gallery">
     <ul>
       
   <div class="Car-ALL">

   <?php
         //  pagination start
    
         if (isset($_GET['pageno'])) {
           $pageno = $_GET['pageno'];
         } else {
           $pageno = 1;
         }


         $no_of_records_per_page = 20;
         $offset = ($pageno - 1) * $no_of_records_per_page;

         $total_rows = $this->model->GetCount()->TD;
       
         
         
        ?>
        <div id="cards">
         </div>
        <?php
          
         
        


         $total_pages = ceil($total_rows / $no_of_records_per_page);


         // pagination end
         ?>
       <!-- </div>
       </div>
       <li class="gap"></li>
       <li class="gap"></li>
       <li class="gap"></li> -->
     </ul>
   </section>
     <!-- cards end here -->
     <!-- pagination  start-->
     <ul class="pagination">
       <li><a href="?pageno=1">First</a></li>
       <li class="<?php if ($pageno <= 1) {
                     echo 'disabled';
                   } ?>">
         <a href="<?php if ($pageno <= 1) {
                     echo '#';
                   } else {
                     echo "?pageno=" . ($pageno - 1);
                   } ?>">Prev</a>
       </li>
       <li class="<?php if ($pageno >= $total_pages) {
                     echo 'disabled';
                   } ?>">
         <a href="<?php if ($pageno >= $total_pages) {
                     echo '#';
                   } else {
                     echo "?pageno=" . ($pageno + 1);
                   } ?>">Next</a>
       </li>
       <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
     </ul>



   
   <?php $action = URLROOT . 'Pages/viewItem'; ?>
   <?php $action2 = 'ajax'; ?>
   <?php $action3 = 'viewItem'; ?>
   <?php $action4 = URLROOT . 'users/Login'; ?>

   
   <!-- <div class="form" id="sidebar" > -->
  <div class="cd-filter">
   <form class="form" method="post">
     <!-- <form class="form" id="sidebar" <?php echo $action;?> method="post" > -->
       <div class="cd-filter-block">
         <h4>Search</h4>
         
         <div class="cd-filter-content">
           <input type="search" name="search" id="search" placeholder="أبحث">
         </div> <!-- cd-filter-content -->
       </div> <!-- cd-filter-block -->

       <!-- <div class="cd-filter-block">
         <h4>Check boxes</h4>

         <ul class="cd-filter-content cd-filters list">
           <li>
             <input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
               <label class="checkbox-label" for="checkbox1">Option 1</label>
           </li>

           <li>
             <input class="filter" data-filter=".check2" type="checkbox" id="checkbox2">
             <label class="checkbox-label" for="checkbox2">Option 2</label>
           </li>

           <li>
             <input class="filter" data-filter=".check3" type="checkbox" id="checkbox3">
             <label class="checkbox-label" for="checkbox3">Option 3</label>
           </li>
         </ul> 
       </div>  -->
      <input type="hidden" name="viewItem" value="viewItem" id="viewItem">
       <div class="wrapper">
      <header>
        <h2>Price Range</h2>
      </header>
      <span style="font-size:20px; margin-left:5%; ">Min</span><span style="font-size:20px; float:right; margin-right:5%;">Max</span>
      <div class="price-input">
        <div class="field">
         
          <input type="number" class="input-min" value="0" name="pricerange1" id="pricerange1">
        </div>
        
        <div class="separator">-</div>
        
        <div class="field">
         
          <input type="number" class="input-max" value="10000000" name="pricerange2" id="pricerange2">
        </div>
      </div>
      <div class="slider">
        <div class="progress"></div>
      </div>
      <div class="range-input">
        <input type="range" class="range-min" min="0" max="10000000" value="0" step="10000">
        <input type="range" class="range-max" min="0" max="10000000" value="10000000" step="10000">
      </div>
    </div>

     
       <div class="cd-filter-block">
         <h4></h4>
         
         <div class="cd-filter-content">
           <div class="cd-select cd-filters">
             <select class="filter" name="contarctType" id="contarctType">
               <option selected value="">نوع العقد</option>
               <option value="1">بيع</option>
               <option value="2">ايجار</option>
             </select>
           </div> 
         </div> 
       </div> 
       <div class="cd-filter-block">
         <h4></h4>
         
         <div class="cd-filter-content">
           <div class="cd-select cd-filters">
             <select class="filter" name="HighLow" id="HighLow">
               <option selected value="">ترتيب حسب</option>
               <option value="1">من الكبير للصغير</option>
               <option value="2">من الصغير للكبير</option>
             </select>
           </div>
         </div>
       </div>

       <div class="cd-filter-block">
         <h4>المساحة</h4>
         
         <div class="cd-filter-content">
           <div class="cd-select cd-filters">
             <select class="filter" name="area" id="area">
               <option selected value="">أختر</option>
               <option value="100">100</option>
               <option value="200">200</option>
               <option value="300">300</option>
               <option value="400">أكثر من 400</option>
             </select>
           </div> 
         </div> 
       </div> 
        <div class="cd-filter-block">
         <h4>عدد الفرف</h4>
         
         <div class="cd-filter-content">
           <div class="cd-select cd-filters">
             <select class="filter" name="Rooms" id="Rooms">
               <option selected value="">أختر</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">أكثر من 5</option>
             </select>
           </div> 
         </div> 
       </div> 

       <div class="cd-filter-block">
         <h4>عدد الحمامات</h4>
         
         <div class="cd-filter-content">
           <div class="cd-select cd-filters">
             <select class="filter" name="Bathroom" id="Bathroom">
              <option selected value="">أختر</option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">أكثر من 5</option>
             </select>
           </div> 
         </div> 
       </div>  
       <div class="cd-filter-block">
         <h4> التشطيب</h4>
         
         <div class="cd-filter-content">
           <div class="cd-select cd-filters">
             <select class="filter" name="Finishing" id="Finishing">
              <option selected value="">أختر</option>
               <option value="1">Mtshstb</option>
               <option value="2">Not Mtshstb</option>
             </select>
           </div> 
         </div> 
       </div>  
       <div class="cd-filter-block">
         <h4> طريقةالدفع</h4>
         
         <div class="cd-filter-content">
           <div class="cd-select cd-filters">
             <select class="filter" name="Payment" id="Payment">
              <option selected value="">أختر</option>
               <option value="Cash">Cash</option>
               <option value="instalment">instalment</option>
             </select>
           </div> 
         </div> 
       </div>  
       <div class="cd-filter-block">
         <h4> العقارات الظاهرة</h4>
         
         <div class="cd-filter-content">
           <div class="cd-select cd-filters">
             <select class="filter" name="Show" id="Show">
              <option selected value="">أختر</option>
               <option value="1">الظاهر</option>
               <option value="2">الخفي</option>
             </select>
           </div> 
         </div> 
       </div>  
       
      
         

    
    </form>

     <a href="#0" class="cd-close">Close</a>
  </div> <!-- cd-filter -->

   <a href="#0" class="cd-filter-trigger">Filters</a>
 </main> <!-- cd-main-content -->


    
      <footer> <?php
                require APPROOT . '/views/inc/footer2.php';
                ?> </footer>
    </body>
    <script src="<?php echo URLROOT; ?>js/Slider.js"></script>

    <script>

function WishList(IDArray){
        // console.log(IDArray); 
        // console.log(document.getElementById('button'+IDArray).value);
       
        var CardID=IDArray;
        var WishListValue=document.getElementById('button'+IDArray).value;
      
         $.ajax({
          url:"<?php echo $action3;?>",
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

        var change;
        function salah(IDArray){
        console.log( IDArray); 
        console.log( document.getElementById('buttonClick'+IDArray).value);
        var CardID=IDArray;
        var ShowButton=document.getElementById('buttonClick'+IDArray).value;
         $.ajax({
          url:"<?php echo $action3;?>",
          method:"POST",
          data:{ShowButton:ShowButton,CardID:CardID},
          
          success:function(data)
          {
              change=data;
              if(change==2){
                change="off";
              }else if(change==1){
                change="on";
              }
              document.getElementById('buttonClick'+IDArray).value=change
               
          }
        })
      
        }
      
      
       
      function itemsAjax(){
        if( document.getElementById('pricerange1').value ) {
          pricerange1 = document.getElementById('pricerange1').value;
        }
        else{
          pricerange1 = "Salah";
        }if( document.getElementById('pricerange2').value ) {
          pricerange2 = document.getElementById('pricerange2').value;
        }
        else{
          pricerange2 = "Salah";
        }
      
        if( document.getElementById('Finishing').value ) {
          Finishing = document.getElementById('Finishing').value;
        }
        else{
          Finishing = "Salah";
        }
        if( document.getElementById('HighLow').value ) {
          HighLow = document.getElementById('HighLow').value;
        }else{
          HighLow = "Salah";
        }
        if( document.getElementById('Payment').value ) {
          Payment = document.getElementById('Payment').value;
        }else{
          Payment = "Salah";
        }
        if( document.getElementById('contarctType').value ) {
          contarctType = document.getElementById('contarctType').value;
        }else{
          contarctType = "Salah";
        }
        if( document.getElementById('area').value ) {
          area = document.getElementById('area').value;
        }else{
          area = "Salah";
        }
        if( document.getElementById('Bathroom').value ) {
          Bathroom = document.getElementById('Bathroom').value;
        }else{
          Bathroom = "Salah";
        }
        if( document.getElementById('Rooms').value ) {
          Rooms = document.getElementById('Rooms').value;
        }else{
          Rooms = "Salah";
        }
        if( document.getElementById('search').value ) {
          search = document.getElementById('search').value;
        }else{
          search = "Salah";
        }  
        if( document.getElementById('Show').value ) {
          Show = document.getElementById('Show').value;
         
        }else{
          Show = "Salah";
        }  
        
        if( document.getElementById('viewItem').value ) {
          Model=document.getElementById('viewItem').value;
        }
      
        offset =<?php echo $offset;?>;
        no_of_records_per_page = <?php echo $no_of_records_per_page ;?>;

      
        $.ajax({
          url:"<?php echo $action2;?>",
          method:"POST",
          data:{Finishing:Finishing , HighLow:HighLow, Payment:Payment,contarctType:contarctType,area:area,Bathroom:Bathroom,Rooms:Rooms,search:search,Model:Model,offset:offset ,no_of_records_per_page:no_of_records_per_page,pricerange1:pricerange1,pricerange2:pricerange2,Show:Show},
          
          success:function(data)
          {
              container = document.getElementById('cards')
              container.innerHTML=data;
              
               
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

