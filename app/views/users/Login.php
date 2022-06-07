<?php
class Login extends view
{
  public function output()
  {
    $title = $this->model->title;

    require APPROOT . '/views/inc/header.php';
    flash('register_success');
    ?>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/LoginRegister.css">
    <?php
   
    $this->printForm();
    require APPROOT . '/views/inc/footer2.php';
  }

  private function printForm()
  {
    $action = URLROOT . 'users/login';
    $registerUrl = URLROOT . 'users/register';


    $clientID = '456173517303-1quvd4kcrdb4mnc4okv1tsujdnsqaqbk.apps.googleusercontent.com';
    $clientSecret = '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';

    $redirectUrl = 'http://localhost/mvc/public/users/Login';

    $client = new Google_Client();

    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUrl);

    $client->addScope('profile');
    $client->addScope('email');

    $url = $client->createAuthUrl();

   
    $text = <<<EOT
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/LoginRegister.css">
    <body style="background-color:#ffff;">
    <div class="registration-form">
    <form action="$action" method="post">
    <h2 style="text-align: center; margin-bottom: 5%; font-size: 40px; color:#4b99ec;" >Login</h2>
    <div class="form-icon">
    
    <span><i class="icon icon-user"></i></span>
    </div>
 
EOT;

    echo $text;
    $this->printEmail();
    $this->printPassword();

    $text = <<<EOT
    <div class="container">
    <div class="checkbox mb-3 mt-3">
      </div>
      <div class="row mt-4">
        <div class="col">
          <input type="submit" value="Login" class="btn btn-block create-account" style=" border-radius: 10px;  background-color:#4b99ec;">
        </div>
        <div class="col">
        <a href="$registerUrl" class="btn btn-block create-account" style="
   border-radius: 10px;  background-color:#4b99ec;"> New User </a>
         </div>
        <div class="col">
          
          <a href="$url" class="btn btn-block create-account" style="
   border-radius: 10px; background-color:#4b99ec; color:white;"><i class="fa-brands fa-google"> Login with google</i></a>
          
        </div>
      </div>
      </div>
    </form>
    </div>
    </body>
   
EOT;
    echo $text;
  }

  private function printEmail()
  {
    $val = $this->model->getEmail();
    $err = $this->model->getEmailErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    $PlaceHolder="Your Email";
    $validation="";
    $this->printInput('email', 'email', $val, $err, $valid,$PlaceHolder,$validation);
  }

  private function printPassword()
  {
    $val = $this->model->getPassword();
    $err = $this->model->getPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    $PlaceHolder="Your Password";
    $validation="";
    $this->printInput('password', 'password', $val, $err, $valid,$PlaceHolder,$validation);
  }

  private function printInput($type, $fieldName, $val, $err, $valid,$PlaceHolder,$Validation)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    $text = <<<EOT
    <div class="form-group">
    <label for="$fieldName"> $label: <sup>*</sup></label>
    <input type="$type" name="$fieldName" class="form-control item $valid" id="$fieldName" value="$val" required="" placeholder="$PlaceHolder" onkeyup=$Validation>
    <span class="invalid-feedback">$err</span>
    </div>
EOT;
    echo $text;
  }
}


