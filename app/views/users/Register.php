<?php
class Register extends view
{
  public function output()
  {
    $title = $this->model->title;

    require APPROOT . '/views/inc/header.php';

    $this->printForm();
    require APPROOT . '/views/inc/footer2.php';
  }

  private function printForm()
  {
    $action = URLROOT . 'users/register';
    $loginUrl = URLROOT . 'users/login';

    $text = <<<EOT
    <body style="background-color:#ffdede;">
    <div class="registration-form">
    <form action="$action" method="post">
    <h2 style="text-align: center; margin-bottom: 5%; font-size: 40px; color:#f64749;" >Sign Up</h2>
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
          <input type="submit" value="Register" class="btn btn-block create-account">
        </div>
        <div class="col">
          <a href="$loginUrl" class="btn btn-block create-account">Current user, login here</a>
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
    $this->printInput('text', 'name', $val, $err, $valid,$validation);
  }
  private function printEmail()
  {
    $val = $this->model->getEmail();
    $err = $this->model->getEmailErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    $validation="";
    $this->printInput('email', 'email', $val, $err, $valid,$validation);
  }

  private function printPassword()
  {
    $val = $this->model->getPassword();
    $err = $this->model->getPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    $validation="";
    $this->printInput('password', 'password', $val, $err, $valid,$validation);
  }
  private function printConfirmPassword()
  {
    $val = $this->model->getConfirmPassword();
    $err = $this->model->getConfirmPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');
    $validation="";
    $this->printInput('password', 'confirm_password', $val, $err, $valid,$validation);
  }

  private function printInput($type, $fieldName, $val, $err, $valid,$Validation)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    $text = <<<EOT
    <div class="form-group">
      <label for="$fieldName"> $label: <sup>*</sup></label>
      <input type="$type" name="$fieldName" class="form-control form-control-lg $valid" id="$fieldName" value="$val" onkeyup=$Validation>
      <span class="invalid-feedback">$err</span>
    </div>
EOT;
    echo $text;
  }
}

