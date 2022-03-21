<?php
class Index extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;
    // $user_id = $_SESSION['user_id'];
    // $user_name = $_SESSION['user_name'];
    

    require APPROOT . '/views/inc/header.php';

    $text = <<<EOT
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4"> $title </h1>
      <h2 class="lead">$subtitle </h2>
      
      <hr class="my-4">
      <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    </div>
  </div>
EOT;
?>
<div>
  <body background = "<?php echo IMAGEROOT . 'img2.png' ; ?>" style = "background-repeat: no-repeat;">
  </body>
</div>
<?php
    // echo $text;
    require APPROOT . '/views/inc/footer.php';
  }
}
