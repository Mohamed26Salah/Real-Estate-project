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
    $finishing = $this->model->getFinishing();
    $furnished = $this->model->getFurnished();
    $floor = $this->model->getFloor();
    $action = URLROOT . 'Pages/viewEdit';
    $action2 = URLROOT . 'Pages/viewItem';

    $TypeID = $_GET['TypeID'];

    $typeOfActivity = $this->model->getTypeOfActivity();

    $TheNumberOFAB = $this->model->getTheNumberOFAB();

    $NumOfFlats = $this->model->getNumOfFlats();

    $NumOfFloors = $this->model->getNumOfFloors();

    $doublex = $this->model->getDoublex();
    
   
?>

<html>

<link rel="stylesheet" href="<?php echo URLROOT; ?>css/viewRentDescription.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/Button.css">

  <!--Important link from https://bootsnipp.com/snippets/XqvZr-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <input type="hidden" id="Salah" value="<?php echo($_GET['ID']); ?>">
<div class="pd-wrap">
		<div class="container">
    <a href="<?php echo URLROOT . 'pages/viewItem?TypeID='.$cardDetails->TypeID;?>"><button type="button" class="btn btn-dark"> < Back</button></a>
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

                  <?php if($TypeID == 1 || $TypeID == 3) {  ?>

                          <div class="col-md-6 mt-4">
                              <i class="fa fa-bath fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="size"  > الحمامات :  </label>
                              <span><?php echo $bathrooms; ?></span>
                          </div>

                        <div class="col-md-6 mt-4">
                          <i class="fa fa-paint-roller fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="size"  > التشطيب :  </label>
                          <?php
                            if($finishing == 1) {
                              echo "<span>متشطب</span>";

                            }

                            else if($finishing == 2) {
                              echo "<span> نص تشطيب</span>";
                            }

                            else if($finishing == 3) {
                              echo "<span> مش متشطب</span>";
                            }
                    ?>
                    </div>


                    <div class="col-md-6 mt-3">
                        <i class="fa fa-bed fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="color" > الغرف : </label>
                        <span><?php echo $rooms; ?> </span>
	        				  </div>
                  <?php } ?>

            
                
                <?php if($TypeID == 1) {  ?>
                  <div class="col-md-6 mt-4">
                      <i class="fa fa-arrow-right-to-city fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="size"  > الدور : </label>
                      <span><?php echo $floor; ?></span>
	        				</div>

                  <div class="col-md-6 mt-4">
                            <i class="fa fa-couch fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="size"  > الفرش :  </label>
                            <?php
                              if($furnished == 1) {
                                echo "<span>مفروشة</span>";

                              }

                              else if($furnished == 2) {
                                echo "<span> ليست مفروشة</span>";
                              }


                              if($doublex == 1) {
                                echo "<span>دوبلكس</span>";

                              }

                              else if($doublex == 2) {
                                echo "<span> مش دوبلكس</span>";
                              }
                          ?>
                        </div>

                        <div class="col-md-6 mt-4">
                            <i class="fa fa-stairs fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="size"  > دوبلكس :  </label>
                            <?php
                        

                              if($doublex == 1) {
                                echo "<span>دوبلكس</span>";

                              }

                              else if($doublex == 2) {
                                echo "<span> مش دوبلكس</span>";
                              }
                          ?>
                        </div>
                  
                  <?php 
                }
                ?>

            

                  

                        <?php if($TypeID == 4 || $TypeID == 5 ||$TypeID == 6 || $TypeID == 7 ) { ?>  

                          <div class="col-md-6 mt-3">
                              <i class="fa fa-store fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="color" >نوع النشاط : </label>
                              <span><?php echo $typeOfActivity; ?> </span>
	        			        	</div>

                    <?php } ?>


                    <?php if($TypeID == 6) { ?>  

                      <div class="col-md-6 mt-3">
                          <i class="fa fa-city fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="color" >عدد المباني الادارية : </label>
                          <span><?php echo $TheNumberOFAB; ?> </span>
	        			  	</div>

                    <?php } ?>


                    <?php if($TypeID == 2) { ?>  

                      <div class="col-md-6 mt-3">
                          <i class="fa fa-building fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="color" >عدد الشقق : </label>
                          <span><?php echo $NumOfFlats; ?> </span>
	        			  	</div>

                      <?php } ?>


                      <?php if($TypeID == 2 || $TypeID == 3) { ?>  

                        <div class="col-md-6 mt-3">
                          <i class="fa fa-arrow-right-to-city fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="color" >عدد الادوار : </label>
                          <span><?php echo $NumOfFloors; ?> </span>
	        			      	</div>

                        <?php } ?>

                  <div class="col-md-6 mt-3">
                  <i class="fa fa-table-cells-large fa-lg" aria-hidden="true"style="font-weight: bold;"></i><label for="color" >المساحة : </label>
								<span><?php echo $cardDetails->Area; ?> sqm</span>
	        				</div>


                  <div class="col-md-6 mt-3">
                  <i class="fa fa-sack-dollar fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color">طريقة الدفع : </label>
								<span><?php echo $cardDetails->PaymentMethod; ?></span>
	        				</div>


                  <div class="col-md-6 mt-3">
                        <i class="fa fa-location-dot fa-lg" aria-hidden="true"style="font-weight: bold; "></i><label for="color" > العنوان :   </label>
                            <span><?php echo $cardDetails->AddressUser; ?> </span>
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
                   <div class="btnRent" id="btnRent" style= "float:left; margin-left:-1%;">
                    <div class="btnRent-back" id="btnRent-back">
                    <p style="font-size:30px">هل أنت متأكد ؟</p>
                    <button class="yes" id="yes" style="font-size:20px" >نعم</button>
                    <button class="no" id="no" style="font-size:20px">لا</button>
                    </div>
                    <div class="btnRent-front" ID="btnRent-front" onclick="button()">احذف</div>
                   
                    </div>

                  <a href="<?php echo $action; ?>?IDE=<?php echo $cardDetails->ID; ?> &TypeID=<?php echo $TypeID; ?>" class="btn btn-success btn-lg" style= "float:left; color:white; text-decoration:none; margin-top:1rem; margin-left:25px;">Edit</a>

               
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
  <script>
    function button(){

   
    var btnRent = document.getElementById( 'btnRent' );
var btnFront = document.getElementById( 'btnRent-front' );
var btnYes = document.getElementById( 'yes' );
var btnNo = document.getElementById( 'no');

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
$('#yes').unbind().click(function() {
  btnRent.classList.remove( 'is-open' );
  var joex = document.getElementById("Salah").value;
  $.ajax({
          url:"viewDescription",
          method:"POST",
          data:{joex:joex},
          
          success:function(data)
          {
            console.log(data);
            window.location.replace("<?php echo($action2); ?>")   
          }
        })
       

});
$('#no').unbind().click(function() {
  btnRent.classList.remove( 'is-open' );
  console.log("No");
});

function distance( x1, y1, x2, y2 ) {
  var dx = x1-x2;
  var dy = y1-y2;
  return Math.sqrt( dx*dx + dy*dy );
}
    }
  </script>
  <footer> <?php
  require APPROOT . '/views/inc/footer2.php';
  ?> </footer>
</div>
<?php
    

  }
}
