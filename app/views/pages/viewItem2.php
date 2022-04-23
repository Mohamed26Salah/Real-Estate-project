<?php
class viewItem2 extends View
{
  public function output()
  {
    require APPROOT . '/views/inc/header.php';

    ?>
    <body>
   
    <main class="cd-main-content">
		<div class="cd-tab-filter-wrapper">
			<div class="cd-tab-filter">
				<ul class="cd-filters">
					<li class="placeholder"> 
						<a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
					</li> 
					<li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Flats</a></li>
					<li class="filter" data-filter=".color-2"><a href="#0" data-type="color-2">Residential Building</a></li>
					<li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Villa</a></li>
					<li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Store</a></li>
					<li class="filter" data-filter=".color-2"><a href="#0" data-type="color-2">clinic</a></li>
					<li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Schools</a></li>
					<li class="filter" data-filter=".color-2"><a href="#0" data-type="color-2">Farm</a></li>
					<li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Factory</a></li>
					<li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Land</a></li>
				</ul> <!-- cd-filters -->
			</div> <!-- cd-tab-filter -->
		</div> <!-- cd-tab-filter-wrapper -->

<section class="cd-gallery">
			<ul>
				
		<div class="Car-ALL">
			<div class="containerFilter">
			<img src="<?php echo IMAGEROOT2 . 'sala11.jpeg' ; ?>" width="280px" height="240px">
			<div class="title">
			<div class="switchAll" style = "margin-left:85%; margin-bottom:-6%; margin:top:-5%;">
			<label class="switch">
            <input type="checkbox" checked><span class="slider round">
			</div>
            <strong style="font-size:20px;">4800 EGP</strong>
            <hr style="border-top: 5px solid #8c8b8b;">
            <p>Lodge in SOMABAY FOR SALE WITH AMAZING SEA VIEW</p>
            <p>Villa 2 rooms 142 sqm</p>
			<div class="iconss" style="padding-top:2%;">
			<i class="fa fa-bath fa-lg" aria-hidden="true"></i>  <i class="fa fa-bed fa-lg" aria-hidden="true" style="margin-left:10px;"></i>
			</div>
            <br>
            <p>Palm Royale Soma Bay, Safaga</p>
			<div class = "purchase-info">
		   <button type = "button" class = "btn">
			 Add to WishList <i class="fa fa-heart" aria-hidden="true"></i>
		   </button>
		  
		  
		 </div>
        </div>
	</div>
    <br>

	</div>
				<li class="gap"></li>
				<li class="gap"></li>
				<li class="gap"></li>
			</ul>
			<!-- <div class="cd-fail-message">No results found</div> -->
		</section> 


		<div class="cd-filter">
			<form>
				<div class="cd-filter-block">
					<h4>Search</h4>
					
					<div class="cd-filter-content">
						<input type="search" name="search" placeholder="أبحث">
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<!-- <div class="cd-filter-block">
					<h4>Check boxes</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
			    			<label class="checkbox-label" for="checkbox1">Option 1</label>
						</li>

						<li>
							<input class="filter" data-filter=".check2" type="checkbox" id="checkbox2">
							<label class="checkbox-label" for="checkbox2">Option 2</label>
						</li>

						<li>
							<input class="filter" data-filter=".check3" type="checkbox" id="checkbox3">
							<label class="checkbox-label" for="checkbox3">Option 3</label>
						</li>
					</ul> 
				</div>  -->
			
				<div class="cd-filter-block">
					<h4></h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="selectThis" id="selectThis">
								<option>نوع العقد</option>
								<option name="contarctType" value="1">بيع</option>
								<option name="contarctType" value="2">شراء</option>
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
				<div class="cd-filter-block">
					<h4></h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="selectThis" id="selectThis">
								<option> ترتيب حسب</option>
								<option name="HighLow" value="1">من الكبير للصغير</option>
								<option name="HighLow" value="2">من الصغير للكبير</option>
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>المساحة</h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="selectThis" id="selectThis">
								<option>أختر</option>
								<option name="area" value="100">100</option>
								<option name="area" value="200">200</option>
								<option name="area" value="300">300</option>
								<option name="area" value="400">أكثر من 400</option>
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
                <div class="cd-filter-block">
					<h4>عدد الفرف</h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="selectThis" id="selectThis">
								<option>أختر</option>
								<option name="Rooms" value="1">1</option>
								<option name="Rooms" value="2">2</option>
								<option name="Rooms" value="3">3</option>
								<option name="Rooms" value="4">4</option>
								<option name="Rooms" value="5">أكثر من 5</option>
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>عدد الحمامات</h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="selectThis" id="selectThis">
								<option>أختر</option>
								<option name="Bathroom"  value="1">1</option>
								<option name="Bathroom"  value="2">2</option>
								<option name="Bathroom"  value="3">3</option>
								<option name="Bathroom"  value="4">4</option>
								<option name="Bathroom"  value="5">أكثر من 5</option>
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
              
				
				<div class="cd-filter-block">
					<h4>التشطيب</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter="" type="radio" name="Finishing" id="radio1" value="1">
							<label class="radio-label" for="radio1">نعم</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio2" type="radio" name="Finishing" id="radio2" value="2">
							<label class="radio-label" for="radio2">لا</label>
						</li>

					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
				
				<div class="cd-filter-block">
					<h4>طريقة الدفع</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter="" type="radio" name="Payment" id="radio1" value="Cash">
							<label class="radio-label" for="radio1">كاش</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio2" type="radio" name="Payment" id="radio2" value="instalment">
							<label class="radio-label" for="radio2">تقسيط</label>
						</li>

					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

			</form>

			<a href="#0" class="cd-close">Close</a>
		</div> <!-- cd-filter -->

		<a href="#0" class="cd-filter-trigger">Filters</a>
	</main> <!-- cd-main-content -->
    <footer> <?php
    require APPROOT . '/views/inc/footer2.php';
    ?> </footer>
    </body>
    <!-- <script src="js/CDFitler.js"></script>
    <script src="js/rangleSlider.js"></script> -->
    <?php 
  }
}

