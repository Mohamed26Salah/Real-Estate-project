<?php
class viewRent extends View
{
   public function output()
  {


    require APPROOT . '/views/inc/header.php';

?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/ViewPage.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/resetFilter.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/styleFilter.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/RentCards.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/Button.css">

<body>
   

  <main class="cd-main-content">
  

   <section class="cd-gallery">
     <ul>
       
   <div class="Car-ALL">

   <?php
         //  pagination start
        //  $this->model->CheckIfRentIsStillValid(0,6);
         if (isset($_GET['pageno'])) {
           $pageno = $_GET['pageno'];
         } else {
           $pageno = 1;
         }


         $no_of_records_per_page = 20;
         $offset = ($pageno - 1) * $no_of_records_per_page;

         $total_rows = $this->model->GetCount()->TD;
       
        ?>
         <div class="container bootstrap snippets bootdeys">
           
        <div id="cards" class="row"></div>
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



   
   <?php $action = URLROOT . 'Pages/viewRent'; ?>
   <?php $action2 = 'viewRent'; ?>


   
   <!-- <div class="form" id="sidebar" > -->
  <div class="cd-filter">
   <form class="form">
     <!-- <form class="form" id="sidebar" <?php echo $action;?> method="post" > -->
       <div class="cd-filter-block">
         <h4>Search</h4>
         
         <div class="cd-filter-content">
           <input type="search" name="search" id="search" placeholder="أبحث" onkeyup="RentAjax()" >
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
       <input id="offset" name="offset" type="text" hidden value="<?php echo $offset;?>">
       <input id="no_of_records_per_page" name="no_of_records_per_page" type="text" hidden value="<?php echo $no_of_records_per_page;?>">

       <div class="cd-filter-block">
         <h4>المساحة</h4>
         
         <div class="cd-filter-content">
           <div class="cd-select cd-filters">
             <select class="filter" name="Rent" id="Rent">
               <option selected value="">الايجارات</option>
               <option value="1">مستمر </option>
               <option value="2">يجب الدفع</option>
               <option value="3">انتهي</option>
               <option value="4">لم يبدأ</option>
             </select>
           </div> 
         </div> 
       </div> 
     

    
    </form>

     <a href="#0" class="cd-close">Close</a>
  </div>

   <a href="#0" class="cd-filter-trigger">Filters</a>
 </main> 


    
      <footer> <?php
                require APPROOT . '/views/inc/footer2.php';
                ?> </footer>
    </body>

    <script>

function button(CardID){
var CardID=CardID;
// console.log(CardID);
// var btnRent = document.querySelector( '.btnRent' );
// var btnFront = btnRent.querySelector( '.btnRent-front' );
// var btnYes = btnRent.querySelector( '.btnRent-back .yes' );
// var btnNo = btnRent.querySelector( '.btnRent-back .no' );

var btnRent = document.getElementById( 'btnRent'+CardID );
var btnFront = document.getElementById( 'btnRent-front'+CardID );
var btnYes = document.getElementById( 'yes'+CardID );
var btnNo = document.getElementById( 'no'+CardID );

// btnFront.addEventListener( 'click', function( event ) {
  var mx = event.clientX - btnRent.offsetLeft,
      my = event.clientY - btnRent.offsetTop;

  var w = btnRent.offsetWidth,
      h = btnRent.offsetHeight;
    
  var directions = [
    { id: 'top', x: w/2, y: 0 },
    { id: 'right', x: w, y: h/2 },
    { id: 'bottom', x: w/2, y: h },
    { id: 'left', x: 0, y: h/2 }
  ];
  
  directions.sort( function( a, b ) {
    return distance( mx, my, a.x, a.y ) - distance( mx, my, b.x, b.y );
  } );
  
  btnRent.setAttribute( 'data-direction', directions.shift().id );
  btnRent.classList.add( 'is-open' );

// } );

// btnYes.addEventListener( 'click', function( event ) { 
 
 
// } );

// btnNo.addEventListener( 'click', function( event ) {
//    console.log("No");
  
  
// } );
$('#yes'+CardID).unbind().click(function() {
  $.ajax({
          url:"viewRent",
          method:"POST",
          data:{CardID:CardID},
          
          success:function(data)
          {
            //  console.log(data);
             var result = data.substr(22, 1);
             var result2=data.substr(0, 21);
             if(result=="1"){
            $('#btnRent'+CardID).html("");
            $('#btnRent'+CardID).remove();
            $('#TOR'+CardID).html(data);
            $('#Background'+CardID).css({backgroundColor: "#20AF1C"});
             }else if(result=="2"){
            $('#TOR'+CardID).html(result2);
            $('#Background'+CardID).css({backgroundColor: "#B709D3"});
             }
           
          }
        })  
  btnRent.classList.remove( 'is-open' );
 
});
$('#no'+CardID).unbind().click(function() {
  btnRent.classList.remove( 'is-open' );
  console.log("No");
});

function distance( x1, y1, x2, y2 ) {
  var dx = x1-x2;
  var dy = y1-y2;
  return Math.sqrt( dx*dx + dy*dy );
}
}

      function RentAjax(){
      var offset
      var no_of_records_per_page
        if( document.getElementById('Rent').value ) {
          Rent = document.getElementById('Rent').value;
        }else{
          Rent = "Salah";
        }
       
        if( document.getElementById('search').value ) {
          search = document.getElementById('search').value;
        }else{
          search = "Salah";
        }  
        if( document.getElementById('offset').value ) {
          offset = document.getElementById('offset').value;
        }else{
          offset = "Salah";
        } 
        if( document.getElementById('no_of_records_per_page').value ) {
          no_of_records_per_page = document.getElementById('no_of_records_per_page').value;
        }else{
          no_of_records_per_page = "Salah";
        } 
        
      
       
        var joex="joex";
        $.ajax({
          url:"<?php echo $action2;?>",
          method:"POST",
          data:{joex:joex,Rent:Rent,search:search,offset:offset ,no_of_records_per_page:no_of_records_per_page},
          
          success:function(data)
          {
              container = document.getElementById('cards')
              container.innerHTML=data;
            
          }
        })
        
      }
      $( ".form" ).change(function() {
        //schow item on change
        RentAjax();

      });
      //Show item first time 
      RentAjax();

    </script>

<?php
  }
}
