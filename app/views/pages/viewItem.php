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




    <body style = "background-color : #003356;">


      <!-- sidebar -->
      <form id="sidebar">
        <ul class="sidebar-menu">
          <li><span class="nav-section-title"></span></li>
          <li class="have-children active"><a href="#"><span class="fa fa-university"></span>Type</a>
            <ul>
              <div class="sidebar_custom_radio">
                <div class="containerradio">

                  <div class="row">
                    <a class="bn31" href="/">
                      <div class="bn31span" style="">Flats</div>
                    </a>
                    <a class="bn31" href="/">
                      <div class="bn31span" style="">Villa</div>
                    </a>
                    <a class="bn31" href="/">
                      <div class="bn31span" style="">Store</div>
                    </a>
                    <a class="bn31" href="/">
                      <div class="bn31span" style="">Clinic</div>
                    </a>
                    <a class="bn31" href="/">
                      <div class="bn31span" style="">Schools</div>
                    </a>
                    <a class="bn31" href="/">
                      <div class="bn31span" style="">Farm</div>
                    </a>
                    <a class="bn31" href="/">
                      <div class="bn31span" style="">Factory</div>
                    </a>
                    <a class="bn31" href="/">
                      <div class="bn31span" style="">Land</div>
                    </a>
                    <a class="bn31" href="/">
                      <div class="bn31span" style="">Residential Building</div>
                    </a>
                    <a class="bn31" href="/">
                      <div class="bn31span" style="">Other</div>
                    </a>
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
                  <div class="ranger"> <Input type="range" id="priceslider" class="range" name="pricerange" value="0" min="0" max="10000000" onChange="rangeSlide(this.value)" onmousemove="rangeSlide(this.value)"></Input>
                  </div>
                </div>
              </div>
            </ul>
          </li>
          <li class="have-children active"><a href="#"><span class="fa fa-university"></span>Finishing</a>
            <ul>
              <div class="sidebar_custom_radio">
                <label class="labell">
                  <input type="radio" name="Finishing" checked value="True" />
                  <div class="spanr">True</div>
                </label>
                <label class="labell">
                  <input type="radio" name="Finishing" value="False" />
                  <div class="spanr">False</div>
                </label>
              </div>
            </ul>
          </li>
          <li class="have-children active"><a href="#"><span class="fa fa-university"></span>Payment </a>
            <ul>
              <div class="sidebar_custom_radio">
                <label class="labell">
                  <input type="radio" name="Payment" checked value="Cash" />
                  <div class="spanr">Cash</div>
                </label>
                <label class="labell">
                  <input type="radio" name="Payment" value="instalment" />
                  <div class="spanr">instalment</div>
                </label>
              </div>
            </ul>
          </li>
          <li class="have-children active"><a href="#"><span class="fa fa-university"></span>contract Type</a>
            <ul>
              <div class="sidebar_custom_radio">
                <label class="labell">
                  <input type="radio" name="contarctType" checked value="rent" />
                  <div class="spanr">rent</div>
                </label>
                <label class="labell">
                  <input type="radio" name="contarctType" value="Purchase" />
                  <div class="spanr">Purchase</div>
                </label>
              </div>
            </ul>
          </li>
          <li class="have-children active"><a href="#"><span class="fa fa-university"></span>Area</a>
            <ul>
              <div class="sidebar_custom_radio">
                <label class="labell">
                  <input type="radio" name="area" checked value="none" />
                  <div class="spanr">none</div>
                </label>
                <label class="labell">
                  <input type="radio" name="area" value="100" />
                  <div class="spanr">100</div>
                </label>
                <label class="labell">
                  <input type="radio" name="area" value="200" />
                  <div class="spanr">200</div>
                </label>
                <label class="labell">
                  <input type="radio" name="area" value="300" />
                  <div class="spanr">300</div>
                </label>
                <label class="labell">
                  <input type="radio" name="area" value="400" />
                  <div class="spanr">400</div>
                </label>
                <label class="labell">
                  <input type="radio" name="area" value=">400" />
                  <div class="spanr">>400</div>
                </label>
              </div>
            </ul>
          </li>
          <li class="have-children active"><a href="#"><span class="fa fa-university"></span>No.Rooms</a>
            <ul>
              <div class="sidebar_custom_radio">
                <div class="price_change">
                  <input type="number" name="price" min="0" max="10">

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
        <div class="row" id="TableList" style="max-width: 90%;">

          <?php
          //  pagination start

          if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
          } else {
            $pageno = 1;
          }


          $no_of_records_per_page = 1;
          $offset = ($pageno - 1) * $no_of_records_per_page;

          $total_rows = $this->model->GetCount()->TD;

          foreach ($this->model->ViewItemOn($offset, $no_of_records_per_page) as $Item) {
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
<?php
  }
}
