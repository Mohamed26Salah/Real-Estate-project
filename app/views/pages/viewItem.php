<?php
class viewItem extends View
{
  public function output()
  {


    require APPROOT . '/views/inc/header.php';

?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/ViewPage.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/resetFilter.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/styleFilter.css">
<body>
 

  <main class="cd-main-content">
   <div class="cd-tab-filter-wrapper">
     <div class="cd-tab-filter">
       <ul class="cd-filters">
         <li class="placeholder"> 
           <a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
         </li> 
         <?php 
         $actionAdd = URLROOT . 'Pages/ViewADD';
         if ($_GET['TypeID']==1) { 
          $StyleFlat="background-color:purple; border-radius:4px; color:white; ";
          $prop = "شقة";
         }else if($_GET['TypeID']==2){
          $StyleBuilding="background-color:purple; border-radius:4px; color:white; ";
          $prop = "عمارة";
         }else if($_GET['TypeID']==3){
          $StyleVilla="background-color:purple; border-radius:4px; color:white;";
          $prop = "فيلا";
         }else if($_GET['TypeID']==4){
          $StyleStore="background-color:purple; border-radius:4px; color:white; ";
          $prop = "محل";
         }else if($_GET['TypeID']==5){
          $StyleClinic="background-color:purple; border-radius:4px; color:white; ";
          $prop = "عيادة";
         }else if($_GET['TypeID']==6){
          $StyleFarm="background-color:purple; border-radius:4px; color:white;  ";
          $prop = "مزرعة";
         }else if($_GET['TypeID']==7){
          $StyleFactory="background-color:purple; border-radius:4px; color:white; ";
          $prop = "مصنع";
         }else if($_GET['TypeID']==8){
          $StyleLand="background-color:purple; border-radius:4px; color:white;";
          $prop = "ارض";
         }else if($_GET['TypeID']==9){
          $StyleOther="background-color:purple; border-radius:4px; color:white; ";
          $prop = "";
         }
         ?>
          <li class="filter" style="<?php echo($StyleFlat);?> " data-filter=".color-1"><a href="viewItem?TypeID=1" data-type="color-1" style = "font-size:20px; " >شقق</a></li>
          <li class="filter" style="<?php echo($StyleBuilding);?>  " data-filter=".color-1"><a href="viewItem?TypeID=2" data-type="color-1" style = "font-size:20px; " >عمارات</a></li>
          <li class="filter" style="<?php echo($StyleVilla);?> " data-filter=".color-1"><a href="viewItem?TypeID=3" data-type="color-1" style = "font-size:20px; ">فيلا</a></li>
          <li class="filter" style="<?php echo($StyleStore);?> " data-filter=".color-1"><a href="viewItem?TypeID=4" data-type="color-1" style = "font-size:20px; ">محلات</a></li>
          <li class="filter" style="<?php echo($StyleClinic);?> " data-filter=".color-2"><a href="viewItem?TypeID=5" data-type="color-2" style = "font-size:20px; ">عيادات</a></li>
          <li class="filter" style="<?php echo($StyleFarm);?> " data-filter=".color-2"><a href="viewItem?TypeID=6" data-type="color-2" style = "font-size:20px; ">مزارع</a></li>
          <li class="filter" style="<?php echo($StyleFactory);?>  " data-filter=".color-1"><a href="viewItem?TypeID=7" data-type="color-1" style = "font-size:20px; ">مصانع</a></li>
          <li class="filter" style="<?php echo($StyleLand);?> " data-filter=".color-1"><a href="viewItem?TypeID=8" data-type="color-1" style = "font-size:20px; ">أراضي</a></li>
          <li class="filter" style="<?php echo($StyleOther);?> " data-filter=".color-1"><a href="viewItem?TypeID=9" data-type="color-1" style = "font-size:20px; ">أخري</a></li>
         
       </ul> 
     </div> 
   </div> 
   <?php if(!empty($_SESSION['user_id'])) { 
     if($_SESSION['Rank'] == "Admin") {
       ?>
       <a href="<?php echo $actionAdd;?>?TypeID=<?PHP echo($_GET['TypeID'])?>" class="AddbuttonViewPage" style="color:white; font-size:20px; float:right; list-style-type: none; ">أضافة <?php  echo $prop; ?></a>
<?php
     }
   } ?>
   <section class="cd-gallery">
     <ul>
       
   <div class="Car-ALL">

   <?php
         //  pagination start
         $pageno="";
         if (isset($_GET['pageno'])) {
           $pageno = $_GET['pageno'];
         } else {
           $pageno = 1;
         }


         $no_of_records_per_page = 5;
         $offset = ($pageno - 1) * $no_of_records_per_page;

       
        ?>
        <div id="cards">
         </div>

         <ul class="row" onclick=itemsAjax2();>

            <li id="LoadMore" style="width:25%; cursor: pointer; font-size:20px;">تحميل المزيد</li>
        </ul>
        <?php

        


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
 

   
   <?php $action = URLROOT . 'Pages/viewItem'; ?>
   <?php $action2 = 'ajax'; ?>
   <?php $action3 = 'viewItem'; ?>
   <?php $action4 = URLROOT . 'users/Login'; ?>

   <input type="hidden" name="TypeID" id="TypeID" value="<?php echo($_GET['TypeID']); ?>">
   <!-- <div class="form" id="sidebar" > -->
  <div class="cd-filter">
   <form class="form" method="post">
     <!-- <form class="form" id="sidebar" <?php echo $action;?> method="post" > -->
       <div class="cd-filter-block">
         <h4>Search</h4>
         
         <div class="cd-filter-content">
           <input type="search" name="search" id="search" placeholder="أبحث" >
         </div> <!-- cd-filter-content -->
       </div> <!-- cd-filter-block -->

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
      <?php
      if($_GET['TypeID']==1||$_GET['TypeID']==3) {

      ?>
       <div class="cd-filter-block">
         <h4> عدد الفرف</h4>
         <div class="cd-filter-content">
             <input type="text" id="Rooms" name="Rooms" > 
         </div> 
       </div> 
     
       <div class="cd-filter-block">
         <h4> عدد الحمامات</h4>
         <div class="cd-filter-content">
             <input type="text" id="Bathroom" name="Bathroom" > 
         </div> 
       </div> 
       <?php
       } 
    
      if($_GET['TypeID']==1) {

      ?>
       <div class="cd-filter-block">
         <h4>الدور</h4>
         <div class="cd-filter-content">
             <input type="text" id="Floor" name="Floor" > 
         </div> 
       </div> 
       <?php
       } 
       if($_GET['TypeID']==2||$_GET['TypeID']==3) {

        ?>
       <!-- ////////////////////////////////////////////////////////////////////////////////////// -->
       <div class="cd-filter-block">
         <h4> عدد الأدوار</h4>
         <div class="cd-filter-content">
             <input type="text" id="NUMOFFloors" name="NUMOFFloors" > 
         </div> 
       </div> 
       <?php 
       }
       if($_GET['TypeID']==2) {

        ?>
       <!-- ////////////////////////////////////////////////////////////////////////////////////// -->
       <div class="cd-filter-block">
         <h4> عدد الشقق</h4>
         <div class="cd-filter-content">
             <input type="text" id="NUMOFFlats" name="NUMOFFlats" > 
         </div> 
       </div> 
       <?php 
       }
      if($_GET['TypeID']==1||$_GET['TypeID']==3) {

      ?>
         <div class="cd-filter-block">
         <h4> التشطيب</h4>
         
         <div class="cd-filter-content">
           <div class="cd-select cd-filters">
             <select class="filter" name="Finishing" id="Finishing">
              <option selected value="">أختر</option>
               <option value="1">Mtshstb</option>
               <option value="2">half Mtshstb</option>
               <option value="3">Not Mtshstb</option>
             </select>
           </div> 
         </div> 
       </div>  

         <!-- ////////////////////////////////////////////////////////////////////////////////////// -->
       
      <?php 
      }
      if($_GET['TypeID']==1||$_GET['TypeID']==3){
        ?>
        <div class="cd-filter-block">
        <h4> مفروشة ؟</h4>
        <div class="cd-filter-content">
          <div class="cd-select cd-filters">
            <select class="filter" name="Furnished" id="Furnished">
             <option selected value="">أختر</option>
              <option value="1">نعم</option>
              <option value="2">لا</option>
            </select>
          </div> 
        </div> 
      </div>  
      <?php
      }
      if($_GET['TypeID']==1) {

        ?>
       <div class="cd-filter-block">
         <h4> دوبلكس</h4>
         <div class="cd-filter-content">
           <div class="cd-select cd-filters">
             <select class="filter" name="Doublex" id="Doublex">
              <option selected value="">أختر</option>
               <option value="1">نعم</option>
               <option value="2">لا</option>
             </select>
           </div> 
         </div> 
       </div> 
       <?php
        } 
        if($_GET['TypeID']==6) {

          ?> 
       <div class="cd-filter-block">
         <h4> عدد المباني الأدارية</h4>
         <div class="cd-filter-content">
             <input type="text" id="nUMOFAB" name="nUMOFAB" > 
         </div> 
       </div> 
       <?php
        } 
        if($_GET['TypeID']==6||$_GET['TypeID']==7||$_GET['TypeID']==4||$_GET['TypeID']==5) {
          ?> 
       <div class="cd-filter-block">
         <h4> نوع النشاط </h4>
         <div class="cd-filter-content">
             <input type="text" id="TypeOFActivity" name="TypeOFActivity" > 
         </div> 
       </div> 
       
      <?php
        } 
      ?>
    
       <div class="cd-filter-block">
         <h4> طريقة الدفع</h4>
         
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
       <div class="cd-filter-block">
         <h4> الأهمية </h4>
         
         <div class="cd-filter-content">
           <div class="cd-select cd-filters">
             <select class="filter" name="Importance" id="Importance">
              <option selected value="">أختر</option>
               <option value="High">مهم</option>
               <option value="Low">ليس مهم</option>
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
offset =<?php echo $offset;?>;
no_of_records_per_page = <?php echo $no_of_records_per_page ;?>;
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
            console.log(data);
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
      
      
      var oldData='';
      function itemsAjax(){
        var TypeID = document.getElementById('TypeID').value
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
      if(TypeID==2 || TypeID==3) {
        if( document.getElementById('NUMOFFloors').value ) {
          NUMOFFloors = document.getElementById('NUMOFFloors').value;
        }
        else{
          NUMOFFloors = "Salah";
        }
      }
      if(TypeID==1) {
        if( document.getElementById('Doublex').value ) {
          Doublex = document.getElementById('Doublex').value;
        }
        else{
          Doublex = "Salah";
        }
      }
        if(TypeID==6) {
        if( document.getElementById('nUMOFAB').value ) {
          nUMOFAB = document.getElementById('nUMOFAB').value;
        }
        else{
          nUMOFAB = "Salah";
        }
      }
        if(TypeID==4 || TypeID==5|| TypeID==6|| TypeID==7) {
        if( document.getElementById('TypeOFActivity').value ) {
          TypeOFActivity = document.getElementById('TypeOFActivity').value;
        }
        else{
          TypeOFActivity = "Salah";
        }
      }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////
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
     
      
       ///////////////////////////////////////////////////////////////////////////////////////////////////////
        if( document.getElementById('HighLow').value ) {
          HighLow = document.getElementById('HighLow').value;
        }else{
          HighLow = "Salah";
        }
        if( document.getElementById('Importance').value ) {
          Importance = document.getElementById('Importance').value;
        }else{
          Importance = "Salah";
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
      ///////////////////////////////////////////////////////////////////////////////////////////////////////
      if( TypeID==2){
        if( document.getElementById('NUMOFFlats').value ) {
          NUMOFFlats = document.getElementById('NUMOFFlats').value;
        }else{
          NUMOFFlats = "Salah";
        }
      }
      if( TypeID==1 || TypeID==3) {

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
       
        if( document.getElementById('Finishing').value ) {
          Finishing = document.getElementById('Finishing').value;
        }
        else{
          Finishing = "Salah";
        }
      }
      if(TypeID==1 || TypeID==3){
        if( document.getElementById('Furnished').value ) {
          Furnished = document.getElementById('Furnished').value;
        }else{
          Furnished = "Salah";
        }  
      }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////
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
          ///////////////////////////////////////////////////////////////////////////////////////////////////////
      if(TypeID==1) {
        if( document.getElementById('Floor').value ) {
          Floor = document.getElementById('Floor').value;
        }else{
          Floor = "Salah";
        }  
      }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////
        if( document.getElementById('viewItem').value ) {
          Model=document.getElementById('viewItem').value;
        }
        
      
     
        console.log(offset+'  '+no_of_records_per_page);
        // TypeID=document.getElementById('TypeID').value;
        $.ajax({
          url:"<?php echo $action2;?>",
          method:"POST",
          data:{Importance:Importance,NUMOFFlats:NUMOFFlats,NUMOFFloors:NUMOFFloors,TypeOFActivity:TypeOFActivity,nUMOFAB:nUMOFAB,Doublex:Doublex,TypeID:TypeID,Floor:Floor,Finishing:Finishing , HighLow:HighLow, Payment:Payment,contarctType:contarctType,area:area,Bathroom:Bathroom,Rooms:Rooms,search:search,Model:Model,offset:offset ,no_of_records_per_page:no_of_records_per_page,pricerange1:pricerange1,pricerange2:pricerange2,Show:Show,Furnished:Furnished},
          
          success:function(data)
          {
              // container = document.getElementById('cards')
              // container.innerHTML=data;
              if(!data){
              loadMore = document.getElementById('LoadMore').innerHTML='لا يوجد المزيد';
               console.log(data);
              }else{
              container = document.getElementById('cards')
              container.innerHTML+=data;
              oldData=data;
              console.log(data);
            }
               
          }
        })
        
      }
      $( ".form" ).change(function() {
        //schow item on change
        console.log("here2");
        document.getElementById('cards').innerHTML='';
        offset=0;
        no_of_records_per_page=<?php echo $no_of_records_per_page ;?>;
        itemsAjax();
        document.getElementById('LoadMore').innerHTML='<a  onclick=itemsAjax2(); >Load More</a>';
        

      });

      function OnKeyUpSearch() {
        
        //schow item on change
        // console.log("here1");
        document.getElementById('cards').innerHTML='';
        
        offset=0;
        no_of_records_per_page=<?php echo $no_of_records_per_page ;?>;
        itemsAjax();
        document.getElementById('LoadMore').innerHTML='<a  onclick=itemsAjax2(); >Load More</a>';

      }
      // $('#search').bind("cut copy paste",function(e) {
      // e.preventDefault();
      // });

      //Show item first time 
      itemsAjax();

      function itemsAjax2(){
        offset+=no_of_records_per_page;
        
        itemsAjax();


      }
      
    </script>

<?php
  }
}

