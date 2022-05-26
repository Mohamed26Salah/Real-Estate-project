<?php
class Profile extends View
{
  public function output()
  {
    
    require APPROOT . '/views/inc/header.php';
    
    ?>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Profile.css">
<?php
    $action = URLROOT . 'pages/Profile';

    $actionImage = 'ImageAjax';
    $this->printFormNameEmail();
    $this->printFormPassword();
    require APPROOT . '/views/inc/footer2.php';
   



  }
  private function printFormNameEmail() {

    $action = URLROOT . 'pages/Profile';
   
    
    $image = $this->model->getImage();
    
    if(substr($image->image,0,4) == 'http') {
        $imageRoot = '';
    }
    else {
        $imageRoot = IMAGEROOT3;
    }
    $text = <<<EOT
    <head>

    <meta charset="utf-8">

    <title>View Profile</title>
	<!-- <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
    <body  style="background-color:#003356;">
<div class="container-xl px-4 mt-5">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4" >
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header" style="background-color:#C9E0FF ;">Profile Picture</div>
                <div class="card-body text-center" style="background-color:#C9E0FF ;">
                    <!-- Profile picture image-->
                    <div id="imageContainer">
                    
                     <img class="img-account-profile rounded-circle mb-2" src="$imageRoot$image->image" alt="">
                    </div>
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 4 MB</div>
                    <!-- Profile picture upload button-->
                    <form name="imageUploadForm" method="post" enctype="multipart/form-data" id = "imageUploadForm">
                    <div class="imageUpload">
                    
                        <label for="fileToUpload">
                            Select Image <br/>
                            <i class="fa fa-2x fa-camera"></i>
                            <input type="file" name="fileToUpload" id="fileToUpload"/>
                            <br/>
                            <span id="imageName"></span>
                        </label>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header" style="background-color:#C9E0FF ;">Account Details</div>
                <div class="card-body" style="background-color:#C9E0FF ;">
                
                    <form action="$action" method="post">
EOT;
    echo $text;
    $this->printName();
    $this->printEmail();
    $rank = $_SESSION['Rank'];
    $text = <<<EOT
    
    <div class=" mb-3 col-3">
        <label class="xl mb-1">Rank</label>
        <input class="form-control"value="$rank" disabled = "disabled">
    </div>
        <input class="btn btn-primary text-white " id="button" type="submit" name="submit" value="Save Changes">
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
EOT;
    echo $text;
  }

  private function printName()
  {
    $val = $_SESSION['user_name'];
    $err = $this->model->getNameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    $validation="lettersandnumbers(this)";
    $placeHolder ="Enter your current password";
    
    $this->printInputEmailName('name', 'name', $val, $err, $valid,$validation);
  }

  private function printEmail()
  {
    $val = $_SESSION['email'];
    $err = $this->model->getEmailErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    $placeHolder ="Enter your current password";
    $validation="";
    $this->printInputEmailName('email', 'email', $val, $err, $valid,$validation);
  }

  private function printInputEmailName($type, $fieldName, $val, $err, $valid,$Validation)
  {
    $label = ucwords($fieldName);
    $text = <<<EOT
    <div class="mb-3">
        <label class="small mb-1" for="$fieldName">$label</label>
        <input class="form-control $valid" id="inputUsername" type="text" value="$val" name="$fieldName" onkeyup=$Validation>
        <span class="invalid-feedback">$err</span>
    </div>
EOT;
    echo $text;
  }

  
  private function printFormPassword() {
    $action = URLROOT . 'pages/Profile';
    $text = <<<EOT
    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xs-6">
                <!-- Change password card-->
                <div class="card mb-4">
                    <div class="card-header" style="background-color:#C9E0FF ;">Change Password</div>
                    <div class="card-body" style="background-color:#C9E0FF ;">
                        <form action="$action" method="post">
EOT;
    echo $text;
    $this->printCurrentPassword();
    $this->printNewPassword();
    $this->printConfirmPassword();
    $text = <<<EOT
    
    
        <input class="btn btn-primary text-white " id="button" type="submit" name="submit" value="Save Changesss">
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
EOT;
    echo $text;
  }
  private function printCurrentPassword()
  {
    $val = $this->model->getCurrentPassword();
    $err = $this->model->getCurrentPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    $validation="";
    $placeHolder ="Enter your current password";
    $this->printInput('password', 'currentPassword', $val, $err, $valid,$validation , $placeHolder);
  }

  private function printNewPassword()
  {
    $val = $this->model->getNewPassword();
    $err = $this->model->getNewPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    $validation="";
    $placeHolder ="Enter your new password";
    $this->printInput('password', 'newPassword', $val, $err, $valid,$validation , $placeHolder);
  }
  private function printConfirmPassword()
  {
    $val = $this->model->getConfirmPassword();
    $err = $this->model->getConfirmPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    $validation="";
    $placeHolder ="Confirm password";
    $this->printInput('password', 'confirmPassword', $val, $err, $valid,$validation ,$placeHolder);
  }

  private function printInput($type, $fieldName, $val, $err, $valid,$Validation , $placeHolder)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    $text = <<<EOT
    <div class="mb-3">
        <label class="small mb-1" for="$fieldName">$label</label>
        <input class="form-control $valid" id="$fieldName" type="$type" placeholder="$placeHolder" name="$fieldName" value="$val" onkeyup=$Validation>
        <span class="invalid-feedback">$err</span>
    </div>
EOT;
    echo $text;
  }
}

