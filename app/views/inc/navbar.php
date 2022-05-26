<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <title>Website Menu #3</title>
  </head>
  <body>
    <?php 
      $uri = $_SERVER['REQUEST_URI'];
      if (str_contains($uri, 'index')) { 
        $activeIndex="active";
    }else if (str_contains($uri, 'viewItem'))
    {
      $activeItem="active";
    }
    else if (str_contains($uri, 'viewRent'))
    {
      $activeRent="active";
    }
    else if (str_contains($uri, 'viewDescription'))
    {
      $activeViewDescripion="active";
    }
    else if (str_contains($uri, 'DashBoard'))
    {
      $activeDashboard="active";
    }
    else if (str_contains($uri, 'wishlist'))
    {
      $activeWishList="active";
    }
    else if (str_contains($uri, 'Profile'))
    {
      $activeProfile="active";
    }
    else if (str_contains($uri, 'about'))
    {
      $activeAbout="active";
    }
       
  
    ?>
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar" style="position: relative; background-color: white; " role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="<?php echo URLROOT . 'index'; ?>"><img src="<?php echo IMAGEROOT2 . 'LogoAman.png';?>" alt = "shoe image" width="70px" height="100px"></a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li style = "font-weight:1000;" class="<?php echo $activeIndex; ?>"><a href="<?php echo URLROOT . 'index'; ?>"><span>الصفحة الرئيسية</span></a></li>
                <!-- <li class="<?php echo $activeItem; ?>"><a href="<?php echo URLROOT . 'pages/viewItem'; ?>"><span>view Item</span></a></li> -->
                
                <li style = "font-weight:1000;" class="<?php echo $activeAbout; ?>"><a href="<?php echo URLROOT . 'pages/about'; ?>"><span>عن أمان</span></a></li>

                <?php if(!empty($_SESSION['user_id'])) {
                   if($_SESSION['Rank']=="Admin"||$_SESSION['Rank'] == "Moderator"){
                    ?>
                  <li style = "font-weight:1000;"  class="<?php echo $activeRent; ?>"><a href="<?php echo URLROOT . 'pages/viewRent'; ?>"><span>الايجارات</span></a></li>
                  <?php
                   }
                  if($_SESSION['Rank']=="Admin"){
                ?>
                <li class="<?php echo $activeDashboard; ?>"><a href="<?php echo URLROOT . "pages/DashBoard"; ?>"><span>DashBoard</span></a></li>
                <?php }
               
                }
                 ?>
                 
                 <?php
                 if(!empty($_SESSION['user_id'])){
                   ?>
                  <li class="<?php echo $activeWishList; ?>"><a href="<?php echo URLROOT . 'pages/wishlist'; ?>"><span><i class="fa fa-heart" aria-hidden="true"></i></span></a></li>
                  <?php
                 } 
                 ?>

                <?php if(!empty($_SESSION['user_id'])){
                    ?>
                 <li class="<?php echo $activeProfile; ?>"><a href="<?php echo URLROOT . 'pages/Profile'; ?> "><span> <?php echo $_SESSION['user_name'];?>   <i class="fa fa-user" aria-hidden="true"></i>
                <?php } ?>
          
                <li class="has-children">
                  <a><span  style = "font-weight:1000;" >انضم الينا</span></a>
                  <ul class="dropdown arrow-top">
                    <?php if(empty($_SESSION['user_id'])){
                      ?>
                       <li><a href="<?php echo URLROOT . 'users/Login'; ?>"  style = "font-weight:1000;" >تسجيل الدخول</a></li>
                       <li><a href="<?php echo URLROOT . 'users/Register'; ?> "  style = "font-weight:1000;" >انشاء حساب</a></li>
                      <?php
                    }
                   ?>
                   
                    <?php if(!empty($_SESSION['user_id'])){
                    ?>
                <li><a href="<?php echo URLROOT . 'users/SignOut'; ?> "  style = "font-weight:1000;" >تسجيل الخروج </a></li>
                <?php } ?>
                  </ul>
                </li>
                
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>