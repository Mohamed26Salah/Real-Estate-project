<?php
class viewItem extends View
{
  public function output()
  {


    // $user_id = $_SESSION['user_id'];
    // $user_name = $_SESSION['user_name'];



    require APPROOT . '/views/inc/header.php';


?>




    <body style = "background-color : #fff;">


      <!-- sidebar -->
      <?php $action = URLROOT . 'Pages/viewItem'; ?>
      <form class="form" id="sidebar" <?php echo $action;?> method="post">
        <ul class="sidebar-menu">
          <li><span class="nav-section-title"></span></li>
          <li class="have-children active"><a href="#"><span class="fa fa-university"></span>Type</a>
            <ul>
             
              <div class="sidebar_custom_radio">
                <div class="containerradio">

                    <div class="row">
                    <div class="bn31" href="/">
                      <div class="bn31span" style="">Flats</div>
                    </div>
                    
                    <div class="bn31" href="/">
                      <div class="bn31span" style="">Villa</div>
                    </div>
                    <div class="bn31" href="/">
                      <div class="bn31span" style="">Store</div>
                    </div>
                    <div class="bn31" href="/">
                      <div class="bn31span" style="">Clinic</div>
                    </div>
                    <div class="bn31" href="/">
                      <div class="bn31span" style="">Schools</div>
                    </div>
                    <div class="bn31" href="/">
                      <div class="bn31span" style="">Farm</div>
                    </div>
                    <div class="bn31" href="/">
                      <div class="bn31span" style="">Factory</div>
                    </div>
                    <div class="bn31" href="/">
                      <div class="bn31span" style="">Land</div>
                    </div>
                    <div class="bn31" href="/">
                      <div class="bn31span" style="">Residential Building</div>
                    </div>
                    <div class="bn31" href="/">
                      <div class="bn31span" style="">Other</div>
                    </div>
                 
                </div>
                </div>
              </div>

            </ul>
          </li>
          <li class="have-children active"><a href="#"><span class="fa fa-tags"></span>Price</a>
            <ul>
              <div class="sidebar_custom_radio">

                <div>
                  <div class="price_change">
                    <input type="number" class="rangeValue" id="rangeValue" name="price" min="0" max="10000000" onChange="rangeChange(this.value)">
                    <div class="limit"> >10000000</div>
                  </div>
                  <div class="ranger"> <Input type="range" id="priceslider" class="range" name="pricerange" value="0" min="0" max="10000000" onChange="rangeSlide(this.value)" onmousemove="rangeSlide(this.value)" id="pricerange"></Input>
                  </div>
                </div>
              </div>
            </ul>
          </li>
          <li class="have-children active"><a href="#"><span class="fa fa-university"></span>Finishing</a>
            <ul>
              <div class="sidebar_custom_radio">
                <label class="labell">
                  <input type="radio" name="Finishing" value="1" id="Finishing" />
                  <div class="spanr">True</div>
                </label>
                <label class="labell">
                  <input type="radio" name="Finishing" value="2" id="Finishing" />
                  <div class="spanr">False</div>
                </label>
              </div>
            </ul>
          </li>
          <li class="have-children active"><a href="#"><span class="fa fa-university"></span>High/Low</a>
            <ul>
              <div class="sidebar_custom_radio">
                <label class="labell">
                  <input type="radio" name="HighLow" value="1" id="HighLow" />
                  <div class="spanr">True</div>
                </label>
                <label class="labell">
                  <input type="radio" name="HighLow" value="2" id="HighLow" />
                  <div class="spanr">False</div>
                </label>
              </div>
            </ul>
          </li>
          <li class="have-children active"><a href="#"><span class="fa fa-university"></span>Payment </a>
            <ul>
              <div class="sidebar_custom_radio">
                <label class="labell">
                  <input type="radio" name="Payment" value="Cash" id="Payment" />
                  <div class="spanr">Cash</div>
                </label>
                <label class="labell">
                  <input type="radio" name="Payment" value="instalment" id="Payment" />
                  <div class="spanr">instalment</div>
                </label>
              </div>
            </ul>
          </li>
          <li class="have-children active"><a href="#"><span class="fa fa-university"></span>contract Type</a>
            <ul>
              <div class="sidebar_custom_radio">
                <label class="labell">
                  <input type="radio" name="contarctType" value="1" id="contarctType" />
                  <div class="spanr">Purchase</div>
                </label>
                <label class="labell">
                  <input type="radio" name="contarctType" value="2" id="contarctType" />
                  <div class="spanr">rent</div>
                </label>
              </div>
            </ul>
          </li>
          <li class="have-children active"><a href="#"><span class="fa fa-university"></span>Area</a>
            <ul>
              <div class="sidebar_custom_radio">
                <label class="labell">
                  <input type="radio" name="area" value="100" id="area" />
                  <div class="spanr">100</div>
                </label>
                <label class="labell">
                  <input type="radio" name="area" value="200" id="area" />
                  <div class="spanr">200</div>
                </label>
                <label class="labell">
                  <input type="radio" name="area" value="300" id="area" />
                  <div class="spanr">300</div>
                </label>
                <label class="labell">
                  <input type="radio" name="area" value="400" id="area" />
                  <div class="spanr">400</div>
                </label>
                
              </div>
            </ul>
          </li>
          <li class="have-children active"><a href="#"><span class="fa fa-university"></span>No.OF Bathrooms</a>
            <ul>
              <div class="sidebar_custom_radio">
                <label class="labell">
                  <input type="radio" name="Bathroom" value="1" id="Bathroom" />
                  <div class="spanr">1</div>
                </label>
                <label class="labell">
                  <input type="radio" name="Bathroom" value="2" id="Bathroom" />
                  <div class="spanr">2</div>
                </label>
                <label class="labell">
                  <input type="radio" name="Bathroom" value="3" id="Bathroom" />
                  <div class="spanr">3</div>
                </label>
                <label class="labell">
                  <input type="radio" name="Bathroom" value="4" id="Bathroom" />
                  <div class="spanr">4</div>
                </label>
                <label class="labell">
                  <input type="radio" name="Bathroom" value="5" id="Bathroom" />
                  <div class="spanr">5</div>
                </label>
                
              </div>
            </ul>
          </li>
          <li class="have-children active"><a href="#"><span class="fa fa-university"></span>No.OF Rooms</a>
            <ul>
              <div class="sidebar_custom_radio">
                <label class="labell">
                  <input type="radio" name="Rooms" value="1" id="Rooms" />
                  <div class="spanr">1</div>
                </label>
                <label class="labell">
                  <input type="radio" name="Rooms" value="2" id="Rooms" />
                  <div class="spanr">2</div>
                </label>
                <label class="labell">
                  <input type="radio" name="Rooms" value="3" id="Rooms" />
                  <div class="spanr">3</div>
                </label>
                <label class="labell">
                  <input type="radio" name="Rooms" value="4" id="Rooms" />
                  <div class="spanr">4</div>
                </label>
                <label class="labell">
                  <input type="radio" name="Rooms" value="5" id="Rooms" />
                  <div class="spanr">5</div>
                </label>
                
              </div>
            </ul>
          </li>


          <input type="submit" name="submit">
        </ul>
         
        <div class="search__container">

        <input class="search__input" type="text" placeholder="Search" name="search" id="search">
      </div>
      </form>
      <!-- side bar end here -->
      <!-- search -->
      
      <!-- search end here -->
      <!-- cards start here -->
      <div class="containere" style="min-height:1100px; margin-left: 25%; margin-right: 5%;">
        <div class="col" id="TableList" style="max-width: 90%;">

          <?php
          //  pagination start

          if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
          } else {
            $pageno = 1;
          }


          $no_of_records_per_page = 6;
          $offset = ($pageno - 1) * $no_of_records_per_page;

          $total_rows = $this->model->GetCount()->TD;
        
          if($this->model->Sort($offset, $no_of_records_per_page)==1){
            echo "<h1>No Result for your search</h1>";
          }
          else{
            foreach ($this->model->Sort($offset, $no_of_records_per_page) as $Item) {
              $imgroot = IMAGEROOT2;
              $card = <<<EOT
              <!-- single card start -->
              <div class="product-card">
              <div class="priority">
              </div>
              <!-- begin visible button -->
              <label class="switch">
              <input type="checkbox" checked><span class="slider round">
              </span></label><div class="product-tumb">
              <img src= "$imgroot$Item->image" alt="">
              </div><div class="product-details">
              <h4><a href=""><strong>$Item->Name</strong> </a>
              </h4><div class="product-bottom-details">
              <div class="product-price"><small>EGP 9600.00</small>EGP $Item->Price</div>
              <div class="product-links"><a href="">
              <i class="fa fa-heart"></i></a><a href="">
              <i class="fa fa-shopping-cart"></i></a>
              </div>
              </div>
              </div>
              <div class="row" style="justify-content:center;">
              <div class="priority $Item->Priroty">$Item->Priroty</div>
              <div class="codeblock">$Item->Code</div></div>
              <div class="row" style="justify-content:center;">
              <div class="col-3"><i class="fa fa-bath" aria-hidden="true" >.3</i></div>
              <div class="col-3">
              <i class="fa fa-bed" aria-hidden="true">.5</i>
              </div><div class="col-3">
              <i class="fa fa-th" aria-hidden="true">.2000</i></div></div></div>
              <!-- single card end -->
     EOT;
  
              echo $card;
            }
          }
         


          $total_pages = ceil($total_rows / $no_of_records_per_page);


          // pagination end
          ?>
        </div>
      </div>
      <!-- cards end here -->
      <!-- pagination  start-->
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
      <!-- pagination end -->
      <footer> <?php
                require APPROOT . '/views/inc/footer2.php';
                ?> </footer>
    </body>
    <script>
      var All="";
      function itemsAjax(){
        
        // try {
        //   if( document.getElementById('pricerange').value.length != 0) {
        //   console.log("speeed");
         
        //   All.concat("pricerange:pricerange,")
        // }
        // }catch(error){
        //   pricerange = document.getElementById('pricerange').value;
        //   console.log(error);
        // }
        if( document.getElementById('Finishing').value.length != 0 ) {
          Finishing = document.getElementById('Finishing').value;
          All.concat("Finishing:Finishing,")
        }
        if( document.getElementById('HighLow').value ) {
          HighLow = document.getElementById('HighLow').value;
          All.concat("HighLow:HighLow,")
        }
        if( document.getElementById('Payment').value ) {
          Payment = document.getElementById('Payment').value;
          All.concat("Payment:Payment,")
        }
        if( document.getElementById('contarctType').value ) {
          contarctType = document.getElementById('contarctType').value;
          All.concat("contarctType:contarctType,")
        }
        if( document.getElementById('area').value ) {
          area = document.getElementById('area').value;
          All.concat("area:area,")
        }
        if( document.getElementById('Bathroom').value ) {
          Bathroom = document.getElementById('Bathroom').value;
          All.concat("Bathroom:Bathroom,")
        }
        if( document.getElementById('Rooms').value ) {
          Rooms = document.getElementById('Rooms').value;
          All.concat("Rooms:Rooms,")
        }
        if( document.getElementById('search').value ) {
          search = document.getElementById('search').value;
          All.concat("search:search,")
        }  
        All=All.slice(0, -1);
        // alert(All);
        $.ajax({
          url:"<?php echo $action;?>",
          method:"POST",
          // pricerange:pricerange,Finishing:Finishing , HighLow:HighLow, Payment:Payment,contarctType:contarctType,area:area,Bathroom:Bathroom,Rooms:Rooms,search:search
          data:{All},
          success:function(data)
          {
            // console.log(data);
          }
        })
        
      }
      $( ".form" ).change(function() {
        // itemsAjax();
        // console.log("sALAH AND SPEED AND JOEX AND YUONUS and oncihanaaaaaan");
      });
    </script>

<?php
  }
}

