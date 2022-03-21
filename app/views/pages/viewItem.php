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

<?php
    // echo $text;

  }
}
