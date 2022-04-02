<?php
class viewDescription extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;

    require APPROOT . '/views/inc/header.php';
   
?>
<html>
  <body style = " background-color: #003356; background-attachment: fixed;">
    
    <div class = "cardd-wrapper">
      <div class = "cardd">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
            <img src="<?php echo IMAGEROOT2 . 'sala11.jpeg' ; ?>" alt = "shoe image">
            <img src="<?php echo IMAGEROOT2 . 'sala9.jpeg' ; ?>" alt = "shoe image">
            <img src="<?php echo IMAGEROOT2 . 'sala7.jpeg' ; ?>" alt = "shoe image">
            <img src="<?php echo IMAGEROOT2 . 'sala12.jpeg' ; ?>" alt = "shoe image">
          
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img src="<?php echo IMAGEROOT2 . 'sala11.jpeg' ; ?>" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "2">
              <img src="<?php echo IMAGEROOT2 . 'sala9.jpeg' ; ?>" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "3">
              <img src="<?php echo IMAGEROOT2 . 'sala7.jpeg' ; ?>" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "4">
              <img src="<?php echo IMAGEROOT2 . 'sala12.jpeg' ; ?>" alt = "shoe image">
              </a>
            </div>
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title">فيلا دوبلكس </h2>
          <a href = "#" class = "product-link">التجمع الخامس</a>
         

          <div class = "product-price">
            <!-- <p class = "last-price text-light h3">Old Price: <span>$257.00</span></p> -->
            <p class = "new-price text-light h3">Price: <span>$249.00 (5%)</span></p>
          </div>

          <div class = "product-detail">
            <h2>about this item: </h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga tenetur placeat sapiente architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius. Dignissimos, labore suscipit. Unde.</p>
            <ul>
            <li> <i class="fa fa-check-circle" aria-hidden="true"></i> Color: <span>Black</span></li>
            <li><i class="fa fa-check-circle" aria-hidden="true"></i> Available: <span>in stock</span></li>
            <li><i class="fa fa-check-circle" aria-hidden="true"></i> Category: <span>Shoes</span></li>
            <li><i class="fa fa-check-circle" aria-hidden="true"></i> Shipping Area: <span>All over the world</span></li>
            <li><i class="fa fa-check-circle" aria-hidden="true"></i>  Shipping Fee: <span>Free</span></li>
            </ul>
          </div>

          <div class = "purchase-info">
           
            <button type = "button" class = "btn">
              Add to WishList <i class="fa fa-heart" aria-hidden="true"></i>
            </button>
           
          </div>

          <div class = "social-links">
            <a href = "#">
              <i class = "fab fa-facebook-f"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-twitter"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-instagram"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-whatsapp"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-pinterest"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <style>
        
            #no-more-tables tbody,
            #no-more-tables tr,
            #no-more-tables td {
                display: block;
         
            }
            #no-more-tables thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            #no-more-tables td {
                position: relative;
                padding-left: 50%;
                border: none;
                border-bottom: 1px solid #eee;
            }
            #no-more-tables td:before {
                content: attr(data-title);
                position: absolute;
                left: 6px;
                font-weight: bold;
               
            }
            #no-more-tables tr {
                border-bottom: 1px solid #ccc;
            }
        
    </style>
</head>

<body>

<section class="p-5" style="width:70%; margin-top:5%; margin-bottom:5%; margin-left:15%; background-color:#C9E0FF; box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);    border-radius:30px;
; ">
        <h3 class="pb-2">Responsive Table</h3>
        <div class="table-responsive" id="no-more-tables">
            <table class="table">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-title="First Name">Alisha</td>
                        <td data-title="Last Name">Roy</td>
                        
                    </tr>
                    <tr>
                        <td data-title="First Name">Barun</td>
                        <td data-title="Last Name">Basu</td>
                      
                    </tr>
                    <tr>
                        <td data-title="First Name">Deena</td>
                        <td data-title="Last Name">Sharma</td>
                     
                    </tr>
                    <tr>
                        <td data-title="First Name">Suman</td>
                        <td data-title="Last Name">Kashyap</td>
                    
                    </tr>
                    <tr>
                        <td data-title="First Name">Seema</td>
                        <td data-title="Last Name">Bose</td>
                       
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

 
  </body>
  </html>
  <script>
    const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;
imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);
  </script>

  <footer> <?php
  require APPROOT . '/views/inc/footer2.php';
  ?> </footer>
</div>
<?php
    

  }
}
