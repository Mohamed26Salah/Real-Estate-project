<?php
class Register extends view
{
  public function output()
  {
    $title = $this->model->title;

    require APPROOT . '/views/inc/header.php';
    ?>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/LoginRegister.css">
    <?php
    $this->printForm();
    require APPROOT . '/views/inc/footer2.php';
  }

  private function printForm()
  {
    $action = URLROOT . 'users/Register';
    $loginUrl = URLROOT . 'users/Login';


    $clientID = '456173517303-1quvd4kcrdb4mnc4okv1tsujdnsqaqbk.apps.googleusercontent.com';
    $clientSecret = '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';

    $redirectUrl = 'http://localhost/mvc/public/users/Register';

    $client = new Google_Client();

    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUrl);

    $client->addScope('profile');
    $client->addScope('email');

    $url = $client->createAuthUrl();


    $text = <<<EOT
    
    <body style="background-color:#ffff;">
    <div class="registration-form">
    <form action="$action" method="post">
    <h2 style="text-align: center; margin-bottom: 5%; font-size: 40px; color:#4b99ec;" >Sign Up</h2>
    <div class="form-icon">
    <span><i class="icon icon-user"></i></span>
    </div>
EOT;
    echo $text;
    $this->printName();
    $this->printEmail();
    $this->printPassword();
    $this->printConfirmPassword();
    $text = <<<EOT
    <div class="container">
      <div class="row mt-4">
        <div class="col">
          <input type="submit" value="Register" class="btn btn-block create-account" style=" border-radius: 10px;  background-color:#4b99ec;">
        </div>
        <div class="col">
        <a href="$loginUrl" class="btn btn-block create-account" style="
   border-radius: 10px;  background-color:#4b99ec;">Already have account</a>
        </div>
        <div class="col">
          <a href="$url" class="btn btn-block create-account"style="
   border-radius: 10px; background-color:#4b99ec; color:white;"><i class="fa-brands fa-google"> Sign Up with google</i></a>
        </div>
      </div>
      </div>
    </form>
    </div>
    </div>
    </div>
EOT;
    echo $text;
  }

  private function printName()
  {
    $val = $this->model->getName();
    $err = $this->model->getNameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    $validation="lettersandnumbers(this)";
    $CopyOFF="autocomplete='off' onpaste='return false;' onCopy='return false' onCut='return false' onDrag='return false'";
    $this->printInput('text', 'name', $val, $err, $valid,$validation,$CopyOFF);
  }
  private function printEmail()
  {
    $val = $this->model->getEmail();
    $err = $this->model->getEmailErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    $validation="";
    $CopyOFF="autocomplete='off' onpaste='return false;' onCopy='return false' onCut='return false' onDrag='return false'";
    $this->printInput('email', 'email', $val, $err, $valid,$validation,$CopyOFF);
  }

  private function printPassword()
  {
    $val = $this->model->getPassword();
    $err = $this->model->getPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    $validation="";
    $CopyOFF="autocomplete='off' onpaste='return false;' onCopy='return false' onCut='return false' onDrag='return false'";
    $this->printInput('password', 'password', $val, $err, $valid,$validation,$CopyOFF);
  }
  private function printConfirmPassword()
  {
    $val = $this->model->getConfirmPassword();
    $err = $this->model->getConfirmPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    $validation="";
    $CopyOFF="autocomplete='off' onpaste='return false;' onCopy='return false' onCut='return false' onDrag='return false'";
    $this->printInput('password', 'confirm_password', $val, $err, $valid,$validation,$CopyOFF);
  }

  private function printInput($type, $fieldName, $val, $err, $valid,$Validation,$CopyOFF)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    $text = <<<EOT
    <div class="form-group">
      <label for="$fieldName"> $label: <sup>*</sup></label>
      <input type="$type" name="$fieldName" class="form-control form-control-lg $valid" id="$fieldName" value="$val" onkeyup=$Validation $CopyOFF>
      <span class="invalid-feedback">$err</span>
    </div>
EOT;
    echo $text;
  }
}


