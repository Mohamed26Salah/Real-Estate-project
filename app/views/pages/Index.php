<?php
class Index extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;
 

    require APPROOT . '/views/inc/header.php';
   

?>
<div>
  <body background = "<?php echo IMAGEROOT . 'img2.png' ; ?>" style = " background-attachment: fixed;
   
   ">
   <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->
 <div class="cards-list" style="postion: fixed;"> 



    <div class="cards-index 1">
    <div class="cards-index_image">
      <img src="<?php echo IMAGEROOT . 'management.png' ; ?>" />
      </div>
    <div class="cards-index_title title-white">

    </div>
  </div>

  <div class="cards-index 2">
    <div class="cards-index_image">
      <img src="<?php echo IMAGEROOT . 'barn.png' ; ?>" />
    </div>
    <div class="cards-index_title">

    </div>
  </div>

    <div class="cards-index 3">
    <div class="cards-index_image">
      <img src="<?php echo IMAGEROOT . 'factory.png' ; ?>" />
      </div>
    <div class="cards-index_title title-black">

    </div>
    </div>


    <div class="cards-index 4">
    <div class="cards-index_image">
      <img src="<?php echo IMAGEROOT . 'flat.png' ; ?>" />
      </div>
    <div class="cards-index_title title-black">

    </div>
    </div>


    <div class="cards-index 5">
    <div class="cards-index_image">
      <img src="<?php echo IMAGEROOT . 'hospital.png' ; ?>" />
      </div>
    <div class="cards-index_title title-black">

  </div>
    </div>

    <div class="cards-index 6">
    <div class="cards-index_image">
      <img src="<?php echo IMAGEROOT . 'school.png' ; ?>" />
      </div>
    <div class="cards-index_title title-black">
    </div>
    </div>


    <div class="cards-index 7">
    <div class="cards-index_image">
      <img src="<?php echo IMAGEROOT . 'villa.png' ; ?>" />
      </div>
    <div class="cards-index_title title-black">
    </div>
    </div>

    <div class="cards-index 8">
    <div class="cards-index_image">
      <img src="<?php echo IMAGEROOT . 'house.png' ; ?>" />
      </div>
    <div class="cards-index_title title-black">
    </div>
    </div>


    <div class="cards-index 9">
    <div class="cards-index_image">
      <img src="<?php echo IMAGEROOT . 'logo.png' ; ?>" />
      </div>
    <div class="cards-index_title title-black">
    </div>
    </div>

</div>
  </body>
</div>
      <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->

   
  </body>
  <footer> <?php
  require APPROOT . '/views/inc/footer.php';
  ?> </footer>
</div>
<?php
    

  }
}
