<?php
class viewRentDescription extends View
{
  public function output()
  {
    require APPROOT . '/views/inc/header.php';

    $rentDetails = $this->model->rentDetails();
    $images = $this->model->showPropertyImage();
    
?>

<html>
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/viewRentDescription.css">
  <!--Important link from https://bootsnipp.com/snippets/XqvZr-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<div class="pd-wrap">
		<div class="container">
    <a href="<?php echo URLROOT . 'pages/viewRent';?>"><button type="button" class="btn btn-dark"> < Back</button></a>
	        <div class="heading-section">
	            <h2>Rent Details</h2>
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
		        			<div class="product-name">

                            </div>
		        			
		        			<div class="product-price-discount"><span style = "font-size: 45px;"><?php echo number_format($rentDetails->rentPrice); ?> EGP</span></div>
                            
                  <div class="col-md-6 mt-3">
                                <span style="font-size:30px; color:red; " class = "text-left" dir="ltr" ><?php echo $rentDetails->code; ?> </span>
	        					<label for="color" style="font-size:22px;" class = "text-left" dir="ltr">Code: </label>
								
	        				</div>

		        		</div>
	        			
	        			<div class="row">
                  <div class="col-md-6 mt-3">
                  <i class="fa fa-home fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="color" >نوع العقار :</label>
								<span><?php echo $rentDetails->typeName; ?></span>
	        		</div>

                    <div class="col-md-6 mt-3">
                        <i class="fa fa-table-cells-large fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="color" >الدور : </label>
                        <span><?php echo $rentDetails->floor; ?> </span>
	        	  </div>

                  <div class="col-md-6 mt-3">
                        <i class="fa fa-table-cells-large fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="color" >المساحة : </label>
                        <span><?php echo $rentDetails->area; ?> sqm</span>
	        	  </div>

                    <div class="col-md-6 mt-3">
                    <i class="fa fa-calendar fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="size"  > بداية الايجار الحالي : </label>
                        <span style = "font-weight:1000;"><?php echo $rentDetails->TOR; ?></span>
                    </div>

                  <div class="col-md-6 mt-3">
                  <i class="fa fa-calendar fa-lg" aria-hidden="true"style="font-weight: bold;"></i> <label for="color" > نهاية الايجار الحالي : </label>
                        <span style = "font-weight:1000;"><?php echo $rentDetails->TOREND; ?> </span>
	        	  </div>


                  <div class="col-md-6 mt-4">
                  <i class="fa fa-calendar fa-lg" aria-hidden="true"style="font-weight: bold;"></i> <label for="size"  > بداية التعاقد :  </label>
                        <span style = "font-weight:1000;"><?php echo $rentDetails->Start_OF_Rent; ?></span>
                    </div>

                  <div class="col-md-6 mt-3">
                  <i class="fa fa-calendar fa-lg" aria-hidden="true"style="font-weight: bold;"></i> <label for="color" > نهاية التعاقد :  </label>
                        <span style = "font-weight:1000;"><?php echo $rentDetails->END_OF_Rent; ?> </span>
	        	  </div>

                  
                  <div class="col-md-6 mt-3">
                    <i class="fa fa-user fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color" > اسم المؤجر: </label>
                        <span><?php echo $rentDetails->LessorName; ?> </span>
                    </div>


                    <div class="col-md-6 mt-3">
                    <i class="fa fa-user fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color" > اسم المستأجر:  </label>
                        <span><?php echo $rentDetails->TenantName; ?> </span>
                    </div>

                    <div class="col-md-6 mt-3">
                    <i class="fa fa-phone-flip fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color"> رقم المؤجر : </label>
                        <span><?php echo $rentDetails->LessorNum; ?> </span>
                    </div>

                    
                    

                    <div class="col-md-6 mt-3">
                        <i class="fa fa-phone-flip fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color" > رقم المستأجر : </label>
                        <span><?php echo $rentDetails->TenantNum; ?> </span>
                    </div>
                  
	        				
	        		</div>
	        			
	        		</div>
	        	</div>
                <?php 
                    $dotColor = $this->model->getDotColor();
                    
                    
                ?>
                <span class="dot" style = "background-color:#<?php echo $dotColor; ?>"> </span>
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
                         echo $rentDetails->description; 
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
