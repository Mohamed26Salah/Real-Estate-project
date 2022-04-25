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
         <li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Flats</a></li>
         <li class="filter" data-filter=".color-2"><a href="#0" data-type="color-2">Building</a></li>
         <li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Villa</a></li>
         <li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Store</a></li>
         <li class="filter" data-filter=".color-2"><a href="#0" data-type="color-2">clinic</a></li>
         <li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Schools</a></li>
         <li class="filter" data-filter=".color-2"><a href="#0" data-type="color-2">Farm</a></li>
         <li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Factory</a></li>
         <li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Land</a></li>
       </ul> <!-- cd-filters -->
     </div> <!-- cd-tab-filter -->
   </div> <!-- cd-tab-filter-wrapper -->

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


         $no_of_records_per_page = 6;
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



   <div class="cd-filter">
   <?php $action = URLROOT . 'Pages/viewItem'; ?>
   <?php $action2 = 'ajax/search.php'; ?>
   <!-- <div class="form" id="sidebar" > -->
   <form class="form" id="sidebar" method="post">
     <!-- <form class="form" id="sidebar" <?php echo $action;?> method="post" > -->
       <div class="cd-filter-block">
         <h4>Search</h4>
         
         <div class="cd-filter-content">
           <input type="search" name="search" placeholder="أبحث">
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
         
          <input type="number" class="input-min" value="0" name="pricerange1">
        </div>
        
        <div class="separator">-</div>
        
        <div class="field">
         
          <input type="number" class="input-max" value="10000000" name="pricerange2">
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
               <option value="2">شراء</option>
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
         <h4>التشطيب</h4>

         <ul class="cd-filter-content cd-filters list">
           <li>
             <input class="filter" data-filter="" type="radio" name="Finishing" id="Finishing" value="1">
             <label class="radio-label" for="radio1">نعم</label>
           </li>

           <li>
             <input class="filter" data-filter=".radio2" type="radio" name="Finishing" id="Finishing" value="2">
             <label class="radio-label" for="radio2">لا</label>
           </li>

         </ul> <!-- cd-filter-content -->
       </div> <!-- cd-filter-block -->
       
       <div class="cd-filter-block">
         <h4>طريقة الدفع</h4>

         <ul class="cd-filter-content cd-filters list">
           <li>
             <input class="filter" data-filter="" type="radio" name="Payment" id="Payment" value="Cash">
             <label class="radio-label" for="radio1">كاش</label>
           </li>

           <li>
             <input class="filter" data-filter=".radio2" type="radio" name="Payment" id="Payment" value="instalment">
             <label class="radio-label" for="radio2">تقسيط</label>
           </li>

         </ul> <!-- cd-filter-content -->
       </div> <!-- cd-filter-block -->

       <button type="submit" class="btn btn-primary" id="search" style="width:100px; height:40px; font-size:15px; background-color:#6E29A8;">Search</button>
         

       <!-- </div>  -->
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

      
      var All="";
      function itemsAjax(){
        
        // try {
        //   if( document.getElementById('pricerange').value.length != 0) {
        //   console.log("speeed");
         
        //   All.concat("pricerange:pricerange,")
        // }
        // }catch(error){
        //   pricerange = document.getElementById('pricerange').value;
        //   console.log(error);
        // }
        if( document.getElementById('Finishing').value ) {
          Finishing = document.getElementById('Finishing').value;
        }else{
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
        
        if( document.getElementById('viewItem').value ) {
          Model=document.getElementById('viewItem').value;
        }

        offset =<?php echo $offset;?>;
        no_of_records_per_page = <?php echo $no_of_records_per_page ;?>;

        All2=All.slice(0, -1);
        // alert(All);
        console.log(All);
        console.log(All2);
        $.ajax({
          url:"<?php echo $action2;?>",
          method:"POST",
          // pricerange:pricerange,
        //  Finishing:Finishing , HighLow:HighLow, Payment:Payment,contarctType:contarctType,area:area,Bathroom:Bathroom,Rooms:Rooms,search:search,Mode:Model,
          data:{Finishing:Finishing , HighLow:HighLow, Payment:Payment,contarctType:contarctType,area:area,Bathroom:Bathroom,Rooms:Rooms,search:search,Model:Model,offset:offset ,no_of_records_per_page:no_of_records_per_page},
          
          success:function(data)
          {
            console.log(data);
            
              container = document.getElementById('cards')
              container.innerHTML=data;
              
            
          }
        })
        
      }
      $( ".form" ).change(function() {
        itemsAjax();
        
      });
    </script>

<?php
  }
}

