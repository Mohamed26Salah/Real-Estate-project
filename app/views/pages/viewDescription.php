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
   
?>

<html>
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/viewDescription.css">
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
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="10"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="11"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="12"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="13"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="14"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="15"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="16"></li>
                  
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo IMAGEROOT2 . 'image-slider-3.jpg' ;?>" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo IMAGEROOT2 . 'image-slider-2.jpg' ;?>" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo IMAGEROOT2 . 'image-slider-4.jpg' ;?>" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo IMAGEROOT2 . 'image-slider-2.jpg' ;?>" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo IMAGEROOT2 . 'image-slider-4.jpg' ;?>" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo IMAGEROOT2 . 'image-slider-2.jpg' ;?>" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo IMAGEROOT2 . 'image-slider-4.jpg' ;?>" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo IMAGEROOT2 . 'image-slider-4.jpg' ;?>" alt="Third slide">
                  </div>

                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo IMAGEROOT2 . 'image-slider-2.jpg' ;?>" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo IMAGEROOT2 . 'image-slider-4.jpg' ;?>" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo IMAGEROOT2 . 'image-slider-2.jpg' ;?>" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo IMAGEROOT2 . 'image-slider-4.jpg' ;?>" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo IMAGEROOT2 . 'image-slider-2.jpg' ;?>" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo IMAGEROOT2 . 'image-slider-4.jpg' ;?>" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo IMAGEROOT2 . 'image-slider-4.jpg' ;?>" alt="Third slide">
                  </div>
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

            <div class="col-md-12 mt-5">
	        		<div class="product-dtl">
        				<div class="product-info">
		        			<div class="product-name"><?php echo $cardDetails->Name; ?></div>
		        			
		        			<div class="product-price-discount"><span><?php echo number_format($cardDetails->Price); ?> EGP</span></div>

                  <div class="col-md-6 mt-3">
	        					<label for="color" style="font-size:22px;">Code: </label>
								<span style="font-size:30px; color:red; "><?php echo $cardDetails->Code; ?> </span>
	        				</div>

		        		</div>
	        			
	        			<div class="row">
                  <div class="col-md-6 mt-4">
                  <i class="fa fa-home fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="color" >Property Type:</label>
								<span><?php echo $type->TypeName; ?></span>
	        				</div>
	        				<div class="col-md-6 mt-4">
                  <i class="fa fa-bath fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="size"  > Bathrooms:  </label>
								<span><?php echo $bathrooms; ?></span>
	        				</div>

                  <div class="col-md-6 mt-3">
                    <i class="fa fa-bed fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="color" > Rooms: </label>
								<span><?php echo $rooms; ?> </span>
	        				</div>

                  


                  <div class="col-md-6 mt-3">
                  <i class="fa fa-table-cells-large fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="color" >Area: </label>
								<span><?php echo $cardDetails->Area; ?> sqm</span>
	        				</div>


                  <div class="col-md-6 mt-3">
                  <i class="fa fa-sack-dollar fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color">Payment Method: </label>
								<span><?php echo $cardDetails->PaymentMethod; ?></span>
	        				</div>

                  <?php
                  if(!empty($_SESSION['Rank'])) {
                  if($_SESSION['Rank'] == "Admin") {
                  ?>
                        <div class="col-md-6 mt-3">
                        <i class="fa fa-user fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color" > Owner Name: </label>
                            <span><?php echo $cardDetails->Owner; ?> </span>
                        </div>

                        <div class="col-md-6 mt-3">
                        <i class="fa fa-location-dot fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color" > Address(User):  </label>
                            <span><?php echo $cardDetails->AddressUser; ?> </span>
                        </div>

                        <div class="col-md-6 mt-3">
                        <i class="fa fa-phone-flip fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color"> Owner Number: </label>
                            <span><?php echo $cardDetails->OwnerNumber; ?> </span>
                        </div>

                        
                       

                        <div class="col-md-6 mt-3">
                        <i class="fa fa-location-dot fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color" > Address(Admin):  </label>
                            <span><?php echo $cardDetails->AddressAdmin; ?> </span>
                        </div>


                  <?php
                  }
                }
                  ?>
                  
	        				
	        			</div>
	        			<div class="product-count">
	        				
							    <a href="#" class="round-black-btn btn-lg" style= "float:right;">Add to wishlist<i class='fa fa-heart' aria-hidden='true'></i></a>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	        	
	        <div class="product-info-tabs shadow p-4 mb-4 bg-white">
		        <ul class="nav nav-tabs" id="myTab" role="tablist">
				  	<li class="nav-item">
				    	<a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true" style = "font-size: 30px;">Description</a>
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
                  <span style = "font-weight:bold;">User Description:</span><br><br>
                  <?php
                   echo $cardDetails->DescriptionUser . "<br><br>"; 

                   ?>
                  <span style = "font-weight:bold;">Admin Description:</span><br><br>
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
