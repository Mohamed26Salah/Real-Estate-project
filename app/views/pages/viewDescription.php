<?php
class viewDescription extends View
{
  public function output()
  {
    require APPROOT . '/views/inc/header.php';

    $cardDetails = $this->model->cardDetails();

    $this->model->bathroomAndRooms();

    $bathrooms = $this->model->getBathroom();
    $rooms = $this->model->getRooms();

    $type = $this->model->propertyType();

    $images = $this->model->showPropertyImage();

    $furnished = $this->model->getFurnished();
    $floor = $this->model->getFloor();


    
   
?>

<html>
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/viewRentDescription.css">
  <!--Important link from https://bootsnipp.com/snippets/XqvZr-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<div class="pd-wrap">
		<div class="container">
      
	        <div class="heading-section">
	            <h2>Unit Details</h2>
	        </div>
	        <div class="row" >
	        	<div class="col-lg-12 shadow p-4 mb-4 bg-white">
            <!-- ################################################################################################ -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  
                <?php
                if(!$images) {
                  ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class = "active"></li>
                <?php
                }
                else {

               
                      for ($i = 0 ; $i <count($images) ; $i++ ) { 
                       
                          if($i == 0) {
                            ?>
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class = "active"></li>
                            <?php
                          }
                          else {
                            ?>
                              <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"></li>
                            <?php
                          }
                          
                      }
                    }
                      ?>
                </ol>
                <div class="carousel-inner">
                  
                    <?php
                    if(!$images) {
                      ?>
                      <div class="carousel-item active">
                              <img class="d-block w-100" src="<?php echo IMAGEROOT3 . 'no-image.png' ;?>" alt="First slide" height="500">
                          </div>
                    <?php
                    }
                    else {

                  
                      for ($i = 0 ; $i <count($images) ; $i++ ) { 
                        if($i == 0) {
                          ?>
                            <div class="carousel-item active">
                              <img class="d-block w-100" src="<?php echo IMAGEROOT3 . $images[0] ;?>" alt="First slide" height="500">
                            </div>
                          <?php
                           }
                          else {
                            ?>
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="<?php echo IMAGEROOT3 . $images[$i] ;?>" alt="First slide" height="500">
                                </div>
                          <?php
                          }
                      }
                    }
                      ?>
              
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>


             <!-- ################################################################################################ -->

            <div class="col-md-12 mt-5 text-right" dir="rtl">
	        		<div class="product-dtl">
        				<div class="product-info">
		        			<div class="product-name"><?php echo $cardDetails->Name; ?></div>
		        			
		        			<div class="product-price-discount"><span style = "font-size: 45px;"><?php echo number_format($cardDetails->Price); ?> EGP</span></div>

                  <div class="col-md-6 mt-3">
                  <span style="font-size:30px; color:red; " class = "text-left" dir="ltr" ><?php echo $cardDetails->Code; ?> </span>
	        					<label for="color" style="font-size:22px;" class = "text-left" dir="ltr">Code: </label>
                    
	        				</div>

		        		</div>
	        			
	        			<div class="row">
                  <div class="col-md-6 mt-4">
                    <i class="fa fa-home fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="color" >نوع العقار :</label>
                    <span><?php echo $type->TypeName; ?></span>
	        				</div>


	        				<div class="col-md-6 mt-4">
                      <i class="fa fa-bath fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="size"  > الحمامات :  </label>
                      <span><?php echo $bathrooms; ?></span>
	        				</div>

                  <div class="col-md-6 mt-4">
                      <i class="fa fa-arrow-right-to-city fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="size"  > الدور : </label>
                      <span><?php echo $floor; ?></span>
	        				</div>


                  <div class="col-md-6 mt-4">
                     <i class="fa fa-couch fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="size"  > التشطيب :  </label>
                    <?php
                      if($furnished == 1) {
                        echo "<span>Furnished</span>";
                    
                      }

                      else if($furnished == 2) {
                        echo "<span> Not Furnished</span>";
                      }
                   
                     ?>
                     
	        				</div>

                  <div class="col-md-6 mt-3">
                    <i class="fa fa-bed fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="color" > الغرف : </label>
								<span><?php echo $rooms; ?> </span>
	        				</div>

                  


                  <div class="col-md-6 mt-3">
                  <i class="fa fa-table-cells-large fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="color" >المساحة : </label>
								<span><?php echo $cardDetails->Area; ?> sqm</span>
	        				</div>


                  <div class="col-md-6 mt-3">
                  <i class="fa fa-sack-dollar fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color">طريقة الدفع : </label>
								<span><?php echo $cardDetails->PaymentMethod; ?></span>
	        				</div>

                  <?php
                  if(!empty($_SESSION['Rank'])) {
                  if($_SESSION['Rank'] == "Admin") {
                  ?>
                        <div class="col-md-6 mt-3">
                        <i class="fa fa-user fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color" > اسم صاحب العقار: </label>
                            <span><?php echo $cardDetails->Owner; ?> </span>
                        </div>

                        <div class="col-md-6 mt-3">
                        <i class="fa fa-location-dot fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color" > العنوان(المستخدم):  </label>
                            <span><?php echo $cardDetails->AddressUser; ?> </span>
                        </div>

                        <div class="col-md-6 mt-3">
                        <i class="fa fa-phone-flip fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color"> رقم صاحب العقار: </label>
                            <span><?php echo $cardDetails->OwnerNumber; ?> </span>
                        </div>

                        
                       

                        <div class="col-md-6 mt-3">
                        <i class="fa fa-location-dot fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color" > العنوان(المشرف):  </label>
                            <span><?php echo $cardDetails->AddressAdmin; ?> </span>
                        </div>


                  <?php
                  }
                }
                  ?>
                  
	        				
	        			</div>
	        			<div class="product-count">
	        				
							    <a href="#" class="round-black-btn btn-lg" style= "float:right;">Add to wishlist<i class='fa fa-heart' aria-hidden='true'></i></a>
                  <a href="#" class="btn btn-dark btn-lg" style= "float:left; color:white; text-decoration:none;">Delete</a>
                  <a href="#" class="btn btn-success btn-lg" style= "float:left; color:white; text-decoration:none; margin-top:0.1rem; margin-left:25px;">Edit</a>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	        	
	        <div class="product-info-tabs shadow p-4 mb-4 bg-white text-right" dir="rtl">
		        <ul class="nav nav-tabs" id="myTab" role="tablist">
				  	<li class="nav-item">
				    	<a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true" style = "font-size: 30px;">الوصف</a>
				  	</li>
				  	<!-- <li class="nav-item">
				    	<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (0)</a>
				  	</li> -->
				</ul>
				<div class="tab-content" id="myTabContent">
				  	<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <?php
              if(!empty($_SESSION['Rank'])) {

              
                if($_SESSION['Rank'] == "Admin") {
                  ?>
                  <span style = "font-weight:bold;"> وصف المستخدم :</span><br><br>
                  <?php
                   echo $cardDetails->DescriptionUser . "<br><br>"; 

                   ?>
                  <span style = "font-weight:bold;"> وصف المشرف :</span><br><br>
                  <?php
                   echo $cardDetails->DescriptionAdmin; 
                }
              }
                
                  echo $cardDetails->DescriptionUser . "<br><br>"; 
                
                
                
                
              ?>
				  	
				  	</div>


				  	<!-- <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab"> -->
				  		
				    </div>
			</div>
			
			
		</div>
	</div>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

  <footer> <?php
  require APPROOT . '/views/inc/footer2.php';
  ?> </footer>
</div>
<?php
    

  }
}
