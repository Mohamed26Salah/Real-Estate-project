<?php
class About extends view
{
  public function output()
  {
    // $title = $this->model->title;
    $data = $this->model->load();
    $data2 = $this->model->load2($data);

    require APPROOT . '/views/inc/header.php';
    $IMAGEROOT2 = IMAGEROOT3;
?>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/about.css">
    <body >


      <div class="about-section">
        <h1>تواصل معنا</h1>
       
      </div>

      <div class="head">
        <h2 style="text-align:center">Our Team</h2>
      </div>

      <div class="row">
        <?php foreach ($data as $user) {
          foreach ($data2 as $user2) {
            if ($user2->ID == $user->UserID) {

              
                if (substr($user2->image, 0, 4) == 'http') {
                     $IMAGEROOT2 = '';
                } else {
                     $IMAGEROOT2 = IMAGEROOT3;
                }

              $output = <<<EOT
  <div class="column">
  <div class="card-about">
  <div class="imagecontainer">
  
    <img src=$IMAGEROOT2$user2->image style="width:100%; max-width:450px; height:100%; max-height:450px;">
    
    </div>
    <div class="container-about">
      <h2>$user2->name</h2>
      <p class="title-about">$user->Title</p>
      <p>$user->Description</p>
      <p>$user->email</p>
      
    </div>
  </div>
</div>





EOT;
              echo $output;
            }
          }
        }
        ?>



      </div>
    </body>
<?php



    require APPROOT . '/views/inc/footer2.php';
  }
}
