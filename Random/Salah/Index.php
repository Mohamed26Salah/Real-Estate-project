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
   <div class="cards-list">



    <div class="card 1">
    <div class="card_image">
      <img src="<?php echo IMAGEROOT . 'management.png' ; ?>" />
      </div>
    <div class="card_title title-white">

    </div>
  </div>

  <div class="card 2">
    <div class="card_image">
      <img src="<?php echo IMAGEROOT . 'barn.png' ; ?>" />
    </div>
    <div class="card_title">

    </div>
  </div>

    <div class="card 3">
    <div class="card_image">
      <img src="<?php echo IMAGEROOT . 'factory.png' ; ?>" />
      </div>
    <div class="card_title title-black">

    </div>
    </div>


    <div class="card 4">
    <div class="card_image">
      <img src="<?php echo IMAGEROOT . 'flat.png' ; ?>" />
      </div>
    <div class="card_title title-black">

    </div>
    </div>


    <div class="card 5">
    <div class="card_image">
      <img src="<?php echo IMAGEROOT . 'hospital.png' ; ?>" />
      </div>
    <div class="card_title title-black">

  </div>
    </div>

    <div class="card 6">
    <div class="card_image">
      <img src="<?php echo IMAGEROOT . 'school.png' ; ?>" />
      </div>
    <div class="card_title title-black">
    </div>
    </div>


    <div class="card 7">
    <div class="card_image">
      <img src="<?php echo IMAGEROOT . 'villa.png' ; ?>" />
      </div>
    <div class="card_title title-black">
    </div>
    </div>

    <div class="card 8">
    <div class="card_image">
      <img src="<?php echo IMAGEROOT . 'house.png' ; ?>" />
      </div>
    <div class="card_title title-black">
    </div>
    </div>


    <div class="card 9">
    <div class="card_image">
      <img src="<?php echo IMAGEROOT . 'logo.png' ; ?>" />
      </div>
    <div class="card_title title-black">
    </div>
    </div>

</div>
  </body>
</div>
      <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->

   
  </body>
</div>
<?php
    

  }
}
