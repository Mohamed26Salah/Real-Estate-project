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

   <ul class="sidebar-menu">
    <li><span class="nav-section-title"></span></li>
    <li class="have-children"><a href="#"><span class="fa fa-university"></span>Exhibitions</a>
      <ul>
        <li><a href="#">Add Exhibition</a></li>
        <li><a href="#">View Exhibitions</a></li>
      </ul>
    </li>
    <li class="have-children"><a href="#"><span class="fa fa-tags"></span>Category</a>
      <ul>
        <li><a href="#">Add Category</a></li>
        <li><a href="#">View Categories</a></li>
      </ul>
    </li>
    <li class="have-children"><a href="#"><span class="fa fa-trophy"></span>Award</a>
      <ul>
        <li><a href="#">Add Award</a></li>
        <li><a href="#">View Awards</a></li>
      </ul>
    </li>
    <li class="have-children"><a href="#"><span class="fa fa-gavel"></span>Jury</a>
      <ul>
        <li><a href="#">Add Jury</a></li>
        <li><a href="#">View Juries</a></li>
      </ul>
    </li>
    <li class="have-children"><a href="#"><span class="fa fa-user-o"></span>Author</a>
      <ul>
        <li><a href="#">Add Author</a></li>
        <li><a href="#">View Authors</a></li>
      </ul>
    </li>
    <li><a href="#"><span class="fa fa-picture-o"></span>Gallery</a></li>
    <li class="have-children"><a href="#"><span class="fa fa-flag"></span>Reports</a>
      <ul>
        <li><a href="#">View Judging points</a></li>
        <li><a href="#">Create Acceptances List</a></li>
        <li><a href="#">Create Awarded List</a></li>
        <li><a href="#">View Candidates for Awards</a></li>
        <li><a href="responsive_table.html">Send Report Cards</a></li>
      </ul>
    </li>
    <li><a href="#"><span class="fa fa-envelope-o"></span>Messages</a></li>
    <li><a href="#"><span class="fa fa-gear"></span>Configuration</a></li>
  </ul>

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
