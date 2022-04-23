<?php
class viewRent extends View
{
  public function output()
  {

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

                  <label class="labell">
                    <input type="radio" name="radio" checked value="Flats" />
                    <div class="spanr">Flats</div>
                  </label>
                  <label class="labell">
                    <input type="radio" name="radio" value="Villa" />
                    <div class="spanr">Villa</div>
                  </label>
                  <label class="labell">
                    <input type="radio" name="radio" value="Store">
                    <div class="spanr">Store</div>
                  </label>
                  <label class="labell">
                    <input type="radio" name="radio" value="Clinic" />
                    <div class="spanr">Clinic</div>
                  </label>
                  <label class="labell">
                    <input type="radio" name="radio" value="Schools" />
                    <div class="spanr">Schools</div>
                  </label>
                  <label class="labell">
                    <input type="radio" name="radio" value="Farm" />
                    <div class="spanr">Farm</div>
                  </label>
                  <label class="labell">
                    <input type="radio" name="radio" value="Factory" />
                    <div class="spanr">Factory</div>
                  </label>
                  <label class="labell">
                    <input type="radio" name="radio" value="Land" />
                    <div class="spanr">Land</div>
                  </label>
                  <label class="labell">
                    <input type="radio" name="radio" value="Residential Building" />
                    <div class="spanr">Residential Building</div>
                  </label>
                  <label class="labell">
                    <input type="radio" name="radio" value="Other" />
                    <div class="spanr">Other</div>
                  </label>

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
        <div class="pcontainer">
          <div class="submit-feedback high">High</div>
          <div class="submit-feedback medium">Medium</div>
          <div class="submit-feedback low">Low</div>
        </div>
        <div class="row" id="TableList" style="max-width: 90%;">

          <?php
          //  pagination start

          if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
          } else {
            $pageno = 1;
          }


          $no_of_records_per_page = 4;
          $offset = ($pageno - 1) * $no_of_records_per_page;

          $total_rows = $this->model->GetCount()->TD;

          foreach ($this->model->ViewRentOn($offset, $no_of_records_per_page) as $rent) {
            $days = $this->model->TimeLeftForRent($rent->TOR);
            $this->model->CheckIfRentIsStillValid($rent->TOR,$rent->TOREND);

            $card = <<<EOT
   <!-- single card start -->
   <div class="product-card-Rent">
   <div class="priority"></div>
   <!-- begin visible button -->
   <div class="product-details">
   <h4><div class="arabic">
   <div class="left">$rent->LessorName </div>
   <div class="right">:اسم صاحب العقار
   </div>  <br>
   </div>
   <div class="arabic">
   <div class="left">$rent->TenantName </div>
   <div class="right">:اسم المستأجر</div></div>
   <!--  -->
   <div class="arabic">
   <div class="left">$rent->Start_OF_Rent </div>
   <div class="right">:تاريخ البداية</div></div>
   <br>
   <div class="arabic">
   <div class="left">$rent->END_OF_Rent </div>
   <div class="right">:تاريخ النهاية</div></div>
   <!--  -->
   </h4>
   <div class="Rent_Price">EGP$rent->rentPrice </div>
   <!-- Timer start -->
   <div class="timer">Time left : $days days</div>
   <!-- Timer End -->
   </div>
   <div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div>
   <div class="codeblock">$rent->code</div></div></div><!-- single card end -->
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
