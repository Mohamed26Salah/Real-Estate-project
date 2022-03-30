<?php
class viewItem extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;
    // $user_id = $_SESSION['user_id'];
    // $user_name = $_SESSION['user_name'];
    

   
   require APPROOT . '/views/inc/header.php';
    ?>




    <body background="<?php echo IMAGEROOT2."img2.png" ;?>" >


        <!-- sidebar -->
    <form id="sidebar" >
   <ul class="sidebar-menu">
    <li><span class="nav-section-title"></span></li>
    <li class="have-children active"><a href="#"><span class="fa fa-university"></span>Type</a>
      <ul>
         <div  class= "sidebar_custom_radio">
         <div class="containerradio">

		<label class="labell">
			<input type="radio" name="radio" checked value="Flats"/>
			<div class="spanr">Flats</div>
		</label>
		<label class="labell">
			<input type="radio" name="radio"  value="Villa"/>
			<div class="spanr">Villa</div>
		</label>
		<label class="labell">
			<input type="radio" name="radio"  value="Store">
			<div class="spanr">Store</div>
		</label>
    <label class="labell">
			<input type="radio" name="radio"  value="Clinic"/>
			<div class="spanr">Clinic</div>
		</label>
    <label class="labell">
			<input type="radio" name="radio"  value="Schools"/>
			<div class="spanr">Schools</div>
		</label>
    <label class="labell">
			<input type="radio" name="radio"  value="Farm"/>
			<div class="spanr">Farm</div>
		</label>
    <label class="labell">
			<input type="radio" name="radio"  value="Factory"/>
			<div class="spanr">Factory</div>
		</label>
    <label class="labell">
			<input type="radio" name="radio"  value="Land"/>
			<div class="spanr">Land</div>
		</label>
    <label class="labell">
			<input type="radio" name="radio"  value="Residential Building"/>
			<div class="spanr">Residential Building</div>
		</label>
    <label class="labell">
			<input type="radio" name="radio"  value="Other"/>
			<div class="spanr">Other</div>
		</label>

</div>

        </div>
        
      </ul>
    </li>
    <li class="have-children active"><a href="#"><span class="fa fa-tags"></span>Price</a>
      <ul>
      <div  class= "sidebar_custom_radio">
          
    <div>
      <div class="price_change">
        <input type="number"  class = "rangeValue" id = "rangeValue" name="price"  min="0" max ="10000000" onChange="rangeChange(this.value)"> 
        <div  class="limit"> >10000000</div>
      </div>
        <div class="ranger">        <Input type="range"  id = "priceslider" class="range" name="pricerange" value="0" min="0" max="10000000" onChange="rangeSlide(this.value)" onmousemove="rangeSlide(this.value)"></Input>
</div>
    </div>
      </div>
      </ul>
    </li>
    <li class="have-children active"><a href="#"><span class="fa fa-university"></span>Finishing</a>
      <ul>
      <div  class= "sidebar_custom_radio">
      <label class="labell">
			<input type="radio" name="Finishing" checked value="True"/>
			<div class="spanr">True</div>
		</label>
		<label class="labell">
			<input type="radio" name="Finishing"  value="False"/>
			<div class="spanr">False</div>
		</label>
      </div>
      </ul>
    </li>
    <li class="have-children active"><a href="#"><span class="fa fa-university"></span>Payment </a>
      <ul>
      <div  class= "sidebar_custom_radio">
      <label class="labell">
			<input type="radio" name="Payment" checked value="Cash"/>
			<div class="spanr">Cash</div>
		</label>
		<label class="labell">
			<input type="radio" name="Payment"  value="instalment"/>
			<div class="spanr">instalment</div>
		</label>
      </div>
      </ul>
    </li>
    <li class="have-children active"><a href="#"><span class="fa fa-university"></span>contract Type</a>
      <ul>
      <div  class= "sidebar_custom_radio">
      <label class="labell">
			<input type="radio" name="contarctType" checked value="rent"/>
			<div class="spanr">rent</div>
		</label>
		<label class="labell">
			<input type="radio" name="contarctType"  value="Purchase"/>
			<div class="spanr">Purchase</div>
		</label>
      </div>
      </ul>
    </li>
    <li class="have-children active"><a href="#"><span class="fa fa-university"></span>Area</a>
      <ul>
      <div  class= "sidebar_custom_radio">
      <label class="labell">
			<input type="radio" name="area" checked value="none"/>
			<div class="spanr">none</div>
		</label>
      <label class="labell">
			<input type="radio" name="area"  value="100"/>
			<div class="spanr">100</div>
		</label>
		<label class="labell">
			<input type="radio" name="area"  value="200"/>
			<div class="spanr">200</div>
		</label>
    <label class="labell">
			<input type="radio" name="area"  value="300"/>
			<div class="spanr">300</div>
		</label>
    <label class="labell">
			<input type="radio" name="area"  value="400"/>
			<div class="spanr">400</div>
		</label>
    <label class="labell">
			<input type="radio" name="area"  value=">400"/>
			<div class="spanr">>400</div>
		</label>
      </div>
      </ul>
    </li>
    <li class="have-children active"><a href="#"><span class="fa fa-university"></span>No.Rooms</a>
      <ul>
      <div  class= "sidebar_custom_radio">
      <div class="price_change">
              <input type="number" name="price"  min="0" max ="10" > 
              
            </div>
     </div>
      </ul>
    </li>
    
    
    
  </ul>
  </form>
<!-- side bar end here -->
<!-- search -->
         <div class="search__container">
   
    <input class="search__input" type="text" placeholder="Search">
</div>  
<!-- search end here -->

<!-- cards start here -->
    <div class="containere" style="min-height:1100px; margin-left: 25%; margin-right: 5%;">
    <div class="row" id="TableList"  style="max-width: 90%;">
     <!-- single card start -->
       
     <div class="product-card">
         <div class="priority">
         </div>
   
   <!-- begin visible button   -->
   <label class="switch">
     <input type="checkbox" checked>
     <span class="slider round"></span>
   </label>
   
   
       <div class="product-tumb">
         <img src="https://i.imgur.com/xdbHo4E.png" alt="">
       </div>
       <div class="product-details">
         <h4><a href="">Women leather bag</a></h4>
        
         <div class="product-bottom-details">
           <div class="product-price"><small>$96.00</small>$230.99</div>
           <div class="product-links">
             <a href=""><i class="fa fa-heart"></i></a>
             <a href=""><i class="fa fa-shopping-cart"></i></a>
           </div>
         </div>
       </div>
       <div class="row" style="margin-left:10%">
       <div class="priority high">
         high
       </div>
       <div class="codeblock">
         A50
       </div>
   
       </div>
       <div class="row" style="margin:5%">
         <div class="col-3">
          <i class="fa fa-bath" aria-hidden="true" >.3</i>
         </div>
         <div class="col-3">
          <i class="fa fa-bed" aria-hidden="true">.5</i>
         </div>
          <div class="col-3">
          <i class="fa fa-th" aria-hidden="true">.2000</i>
         </div>
          </div>
     </div>
    
     <!-- single card end -->
      <!-- single card start -->
       
      <div class="product-card">
         <div class="priority">
         </div>
   
   <!-- begin visible button   -->
   <label class="switch">
     <input type="checkbox" checked>
     <span class="slider round"></span>
   </label>
   
   
       <div class="product-tumb">
         <img src="https://i.imgur.com/xdbHo4E.png" alt="">
       </div>
       <div class="product-details">
         <h4><a href="">Women leather bag</a></h4>
        
         <div class="product-bottom-details">
           <div class="product-price"><small>$96.00</small>$230.99</div>
           <div class="product-links">
             <a href=""><i class="fa fa-heart"></i></a>
             <a href=""><i class="fa fa-shopping-cart"></i></a>
           </div>
         </div>
       </div>
       <div class="row" style="margin-left:10%">
       <div class="priority high">
         high
       </div>
       <div class="codeblock">
         A50
       </div>
   
       </div>
       <div class="row" style="margin:5%">
         <div class="col-3">
          <i class="fa fa-bath" aria-hidden="true" >.3</i>
         </div>
         <div class="col-3">
          <i class="fa fa-bed" aria-hidden="true">.5</i>
         </div>
          <div class="col-3">
          <i class="fa fa-th" aria-hidden="true">.2000</i>
         </div>
          </div>
     </div>
    
     <!-- single card end -->
      <!-- single card start -->
       
      <div class="product-card">
         <div class="priority">
         </div>
   
   <!-- begin visible button   -->
   <label class="switch">
     <input type="checkbox" checked>
     <span class="slider round"></span>
   </label>
   
   
       <div class="product-tumb">
         <img src="https://i.imgur.com/xdbHo4E.png" alt="">
       </div>
       <div class="product-details">
         <h4><a href="">Women leather bag</a></h4>
        
         <div class="product-bottom-details">
           <div class="product-price"><small>$96.00</small>$230.99</div>
           <div class="product-links">
             <a href=""><i class="fa fa-heart"></i></a>
             <a href=""><i class="fa fa-shopping-cart"></i></a>
           </div>
         </div>
       </div>
       <div class="row" style="margin-left:10%">
       <div class="priority high">
         high
       </div>
       <div class="codeblock">
         A50
       </div>
   
       </div>
       <div class="row" style="margin:5%">
         <div class="col-3">
          <i class="fa fa-bath" aria-hidden="true" >.3</i>
         </div>
         <div class="col-3">
          <i class="fa fa-bed" aria-hidden="true">.5</i>
         </div>
          <div class="col-3">
          <i class="fa fa-th" aria-hidden="true">.2000</i>
         </div>
          </div>
     </div>
    
     <!-- single card end -->
      <!-- single card start -->
       
      <div class="product-card">
         <div class="priority">
         </div>
   
   <!-- begin visible button   -->
   <label class="switch">
     <input type="checkbox" checked>
     <span class="slider round"></span>
   </label>
   
   
       <div class="product-tumb">
         <img src="https://i.imgur.com/xdbHo4E.png" alt="">
       </div>
       <div class="product-details">
         <h4><a href="">Women leather bag</a></h4>
        
         <div class="product-bottom-details">
           <div class="product-price"><small>$96.00</small>$230.99</div>
           <div class="product-links">
             <a href=""><i class="fa fa-heart"></i></a>
             <a href=""><i class="fa fa-shopping-cart"></i></a>
           </div>
         </div>
       </div>
       <div class="row" style="margin-left:10%">
       <div class="priority high">
         high
       </div>
       <div class="codeblock">
         A50
       </div>
   
       </div>
       <div class="row" style="margin:5%">
         <div class="col-3">
          <i class="fa fa-bath" aria-hidden="true" >.3</i>
         </div>
         <div class="col-3">
          <i class="fa fa-bed" aria-hidden="true">.5</i>
         </div>
          <div class="col-3">
          <i class="fa fa-th" aria-hidden="true">.2000</i>
         </div>
          </div>
     </div>
    
     <!-- single card end -->
      <!-- single card start -->
       
      <div class="product-card">
         <div class="priority">
         </div>
   
   <!-- begin visible button   -->
   <label class="switch">
     <input type="checkbox" checked>
     <span class="slider round"></span>
   </label>
   
   
       <div class="product-tumb">
         <img src="https://i.imgur.com/xdbHo4E.png" alt="">
       </div>
       <div class="product-details">
         <h4><a href="">Women leather bag</a></h4>
        
         <div class="product-bottom-details">
           <div class="product-price"><small>$96.00</small>$230.99</div>
           <div class="product-links">
             <a href=""><i class="fa fa-heart"></i></a>
             <a href=""><i class="fa fa-shopping-cart"></i></a>
           </div>
         </div>
       </div>
       <div class="row" style="margin-left:10%">
       <div class="priority high">
         high
       </div>
       <div class="codeblock">
         A50
       </div>
   
       </div>
       <div class="row" style="margin:5%">
         <div class="col-3">
          <i class="fa fa-bath" aria-hidden="true" >.3</i>
         </div>
         <div class="col-3">
          <i class="fa fa-bed" aria-hidden="true">.5</i>
         </div>
          <div class="col-3">
          <i class="fa fa-th" aria-hidden="true">.2000</i>
         </div>
          </div>
     </div>
    
     <!-- single card end -->
      <!-- single card start -->
       
      <div class="product-card">
         <div class="priority">
         </div>
   
   <!-- begin visible button   -->
   <label class="switch">
     <input type="checkbox" checked>
     <span class="slider round"></span>
   </label>
   
   
       <div class="product-tumb">
         <img src="https://i.imgur.com/xdbHo4E.png" alt="">
       </div>
       <div class="product-details">
         <h4><a href="">Women leather bag</a></h4>
        
         <div class="product-bottom-details">
           <div class="product-price"><small>$96.00</small>$230.99</div>
           <div class="product-links">
             <a href=""><i class="fa fa-heart"></i></a>
             <a href=""><i class="fa fa-shopping-cart"></i></a>
           </div>
         </div>
       </div>
       <div class="row" style="margin-left:10%">
       <div class="priority high">
         high
       </div>
       <div class="codeblock">
         A50
       </div>
   
       </div>
       <div class="row" style="margin:5%">
         <div class="col-3">
          <i class="fa fa-bath" aria-hidden="true" >.3</i>
         </div>
         <div class="col-3">
          <i class="fa fa-bed" aria-hidden="true">.5</i>
         </div>
          <div class="col-3">
          <i class="fa fa-th" aria-hidden="true">.2000</i>
         </div>
          </div>
     </div>
    
     <!-- single card end -->
      <!-- single card start -->
       
      <div class="product-card">
         <div class="priority">
         </div>
   
   <!-- begin visible button   -->
   <label class="switch">
     <input type="checkbox" checked>
     <span class="slider round"></span>
   </label>
   
   
       <div class="product-tumb">
         <img src="https://i.imgur.com/xdbHo4E.png" alt="">
       </div>
       <div class="product-details">
         <h4><a href="">Women leather bag</a></h4>
        
         <div class="product-bottom-details">
           <div class="product-price"><small>$96.00</small>$230.99</div>
           <div class="product-links">
             <a href=""><i class="fa fa-heart"></i></a>
             <a href=""><i class="fa fa-shopping-cart"></i></a>
           </div>
         </div>
       </div>
       <div class="row" style="margin-left:10%">
       <div class="priority high">
         high
       </div>
       <div class="codeblock">
         A50
       </div>
   
       </div>
       <div class="row" style="margin:5%">
         <div class="col-3">
          <i class="fa fa-bath" aria-hidden="true" >.3</i>
         </div>
         <div class="col-3">
          <i class="fa fa-bed" aria-hidden="true">.5</i>
         </div>
          <div class="col-3">
          <i class="fa fa-th" aria-hidden="true">.2000</i>
         </div>
          </div>
     </div>
    
     <!-- single card end -->
      <!-- single card start -->
       
      <div class="product-card">
         <div class="priority">
         </div>
   
   <!-- begin visible button   -->
   <label class="switch">
     <input type="checkbox" checked>
     <span class="slider round"></span>
   </label>
   
   
       <div class="product-tumb">
         <img src="https://i.imgur.com/xdbHo4E.png" alt="">
       </div>
       <div class="product-details">
         <h4><a href="">Women leather bag</a></h4>
        
         <div class="product-bottom-details">
           <div class="product-price"><small>$96.00</small>$230.99</div>
           <div class="product-links">
             <a href=""><i class="fa fa-heart"></i></a>
             <a href=""><i class="fa fa-shopping-cart"></i></a>
           </div>
         </div>
       </div>
       <div class="row" style="margin-left:10%">
       <div class="priority high">
         high
       </div>
       <div class="codeblock">
         A50
       </div>
   
       </div>
       <div class="row" style="margin:5%">
         <div class="col-3">
          <i class="fa fa-bath" aria-hidden="true" >.3</i>
         </div>
         <div class="col-3">
          <i class="fa fa-bed" aria-hidden="true">.5</i>
         </div>
          <div class="col-3">
          <i class="fa fa-th" aria-hidden="true">.2000</i>
         </div>
          </div>
     </div>
    
     <!-- single card end -->
      <!-- single card start -->
       
      <div class="product-card">
         <div class="priority">
         </div>
   
   <!-- begin visible button   -->
   <label class="switch">
     <input type="checkbox" checked>
     <span class="slider round"></span>
   </label>
   
   
       <div class="product-tumb">
         <img src="https://i.imgur.com/xdbHo4E.png" alt="">
       </div>
       <div class="product-details">
         <h4><a href="">Women leather bag</a></h4>
        
         <div class="product-bottom-details">
           <div class="product-price"><small>$96.00</small>$230.99</div>
           <div class="product-links">
             <a href=""><i class="fa fa-heart"></i></a>
             <a href=""><i class="fa fa-shopping-cart"></i></a>
           </div>
         </div>
       </div>
       <div class="row" style="margin-left:10%">
       <div class="priority high">
         high
       </div>
       <div class="codeblock">
         A50
       </div>
   
       </div>
       <div class="row" style="margin:5%">
         <div class="col-3">
          <i class="fa fa-bath" aria-hidden="true" >.3</i>
         </div>
         <div class="col-3">
          <i class="fa fa-bed" aria-hidden="true">.5</i>
         </div>
          <div class="col-3">
          <i class="fa fa-th" aria-hidden="true">.2000</i>
         </div>
          </div>
     </div>
    
     <!-- single card end -->
      <!-- single card start -->
       
      <div class="product-card">
         <div class="priority">
         </div>
   
   <!-- begin visible button   -->
   <label class="switch">
     <input type="checkbox" checked>
     <span class="slider round"></span>
   </label>
   
   
       <div class="product-tumb">
         <img src="https://i.imgur.com/xdbHo4E.png" alt="">
       </div>
       <div class="product-details">
         <h4><a href="">Women leather bag</a></h4>
        
         <div class="product-bottom-details">
           <div class="product-price"><small>$96.00</small>$230.99</div>
           <div class="product-links">
             <a href=""><i class="fa fa-heart"></i></a>
             <a href=""><i class="fa fa-shopping-cart"></i></a>
           </div>
         </div>
       </div>
       <div class="row" style="margin-left:10%">
       <div class="priority high">
         high
       </div>
       <div class="codeblock">
         A50
       </div>
   
       </div>
       <div class="row" style="margin:5%">
         <div class="col-3">
          <i class="fa fa-bath" aria-hidden="true" >.3</i>
         </div>
         <div class="col-3">
          <i class="fa fa-bed" aria-hidden="true">.5</i>
         </div>
          <div class="col-3">
          <i class="fa fa-th" aria-hidden="true">.2000</i>
         </div>
          </div>
     </div>
    
     <!-- single card end -->
      
      
      

</div>

</div>
<!-- cards end here -->

<!-- pagination  start-->
<div class="center">
  <div class="pagination">
  <a href="javascript:prevPage()" id="btn_prev">&laquo;</a>
  
  <a href="javascript:nextPage()" id="btn_next">&raquo;</a>
  </div>
</div>
<!-- pagination end -->
  <footer> <?php
  require APPROOT . '/views/inc/footer2.php';
  ?> </footer>
</body>
<?php
  }
}
