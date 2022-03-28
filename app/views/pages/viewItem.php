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

        
<div class="main-container">
  <aside class="sidebar">
    <header></header>
    
     <div class="clearfix accordian-block blog-cats">
      <h2>Navigation</h2><a class="item" href="#">Home</a><a class="item" href="#">About Us</a><a class="item" href="#">Blog</a><a class="item" href="#">Contact Us</a>
    </div>
    <div class="clearfix accordian-block blog-cats">
      <h2>Categories</h2><a class="item" href="#">Rambles</a><a class="item" href="#">CSS</a><a class="item" href="#">Design</a><a class="item" href="#">How-to's</a>
    </div>
    <div class="clearfix accordian-block recent">
      <h2>Most Recent Posts</h2><a class="item" href="#">How to suck eggs</a><a class="item" href="#">This is really cool!</a><a class="item" href="#">Fish are friends not food</a><a class="item" href="#">Its cool!</a>
    </div>
    <div class="clearfix accordian-block archive">
      <h2>Archive</h2>
    </div>
    <div class="clearfix accordian-block social-stuff">
      <h2>Social Stuff</h2>
      <div class="social"><a href=""></a><a href=""></a><a href=""></a><a href=""></a></div>
    </div>
  </aside>
  <section class="main-content"></section>
</div>


<!-- side bar end here -->
<!-- search -->
         <div class="search__container">
   
    <input class="search__input" type="text" placeholder="Search">
</div>  
<!-- search end here -->

<!-- cards start here -->
    <div class="containere" style="margin-left: 25%; margin-right: 5%;">
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
  require APPROOT . '/views/inc/footer.php';
  ?> </footer>
</body>
<?php
  }
}
