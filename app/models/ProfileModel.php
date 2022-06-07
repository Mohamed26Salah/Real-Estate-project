<?php
// require_once 'UserModel.php';
class ProfileModel extends model
{
    protected $name;
    protected $nameErr;

    protected $email;
    protected $emailErr;

    protected $currentPassword;
    protected $currentPasswordErr;

    protected $newPassword;
    protected $newPasswordErr;
    
    protected $confirmPassword;
    protected $confirmPasswordErr;
     public function __construct()
     {
         parent::__construct();
         $this->name = "";
         $this->nameErr = "";

         $this->email = "";
         $this->emailErr = "";

         $this->confirmPassword = "";
         $this->confirmPasswordErr = "";

         $this->currentPassword = "";
         $this->currentPasswordErr = "";

         $this->newPassword = "";
         $this->newPasswordErr = "";

         
     }
 //////////////////////////////////////////////////////////////////////////////////////////////////////
 public function getCurrentPassword()
     {
         return $this->currentPassword;
     }
     public function setCurrentPassword($currentPassword)
     {
         $this->currentPassword = $currentPassword;
     }

     public function getCurrentPasswordErr()
     {
         return $this->currentPasswordErr;
     }
     public function setCurrentPasswordErr($currentPasswordErr)
     {
         $this->currentPasswordErr = $currentPasswordErr;
     }

 /////////////////////////////////////////////////////////////////////////////////////////////////////
 public function getNewPassword()
 {
     return $this->newPassword;
 }
 public function setNewPassword($newPassword)
 {
     $this->newPassword = $newPassword;
 }

 public function getNewPasswordErr()
 {
     return $this->newPasswordErr;
 }
 public function setNewPasswordErr($newPasswordErr)
 {
     $this->newPasswordErr = $newPasswordErr;
 }

 ////////////////////////////////////////////////////////////////////////////////////////////////////
 public function getConfirmPassword()
 {
     return $this->confirmPassword;
 }
 public function setConfirmPassword($confirmPassword)
 {
     $this->confirmPassword = $confirmPassword;
 }

 public function getConfirmPasswordErr()
 {
     return $this->confirmPasswordErr;
 }
 public function setConfirmPasswordErr($confirmPasswordErr)
 {
     $this->confirmPasswordErr = $confirmPasswordErr;
 }
 ////////////////////////////////////////////////////////////////////////////////////////////////////
     public function getName()
     {
         return $this->name;
     }
 
     public function setName($name)
     {
         $this->name = $name;
     }
 
     public function getNameErr()
     {
         return $this->nameErr;
     }
 
     public function setNameErr($nameErr)
     {
         $this->nameErr = $nameErr;
     }
     public function setEmail($email)
     {
         $this->email = $email;
     }
 
     public function getEmail()
     {
         return $this->email;
     } 
     public function setEmailErr($emailErr)
     {
         $this->emailErr = $emailErr;
     }
     public function getEmailErr()
    {
        return $this->emailErr;
    }
 
     public function emailExist($email)
     {
         return $this->findUserByEmail($email) > 0;
     }
     function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
     public function findUserByEmail($email)
     {
         $this->dbh->query('select * from user where email= :email');
         $this->dbh->bind(':email', $email);
 
         $userRecord = $this->dbh->single();
         return $this->dbh->rowCount();
     }
     public function EditProfile()
     {
         $this->dbh->query("UPDATE user SET `name`=:uname, `email`=:email WHERE ID=:id");
        //  $ValidatedName=filter_var($this->name, FILTER_SANITIZE_STRING);
         $ValidatedName=$this->test_input($this->name);
         $this->dbh->bind(':uname', $ValidatedName);
         $ValidatedEmail=filter_var($this->email, FILTER_SANITIZE_EMAIL); 
         $this->dbh->bind(':email', $ValidatedEmail);
        $this->dbh->bind(':id', $_SESSION['user_id']);
         return $this->dbh->execute();
     }
     public function EditPassword()
     {
        $this->dbh->query('SELECT * from user WHERE email = :email');
        $this->dbh->bind(':email', $_SESSION['email']);
        echo"<script>console.log('da5l el edit password')</script>";

        $record = $this->dbh->single();
        $hash_pass = $record->password;

        if (password_verify($this->currentPassword, $hash_pass)) {
            echo"<script>console.log('da5l el password verify')</script>";
            $this->dbh->query("UPDATE user SET `password`=:upassword WHERE ID=:id");
            $this->dbh->bind(':id', $_SESSION['user_id']);
            $HashedPassword=password_hash($this->newPassword, PASSWORD_DEFAULT);
            $this->dbh->bind(':upassword',$HashedPassword );
            $this->dbh->execute();
            return true;


        } else {
            return false;
        }
     }

     public function checkCurrentPassword() {
        $this->dbh->query('SELECT * from user WHERE email = :email');
        $this->dbh->bind(':email', $_SESSION['email']);
        echo"<script>console.log('da5l el edit password')</script>";

        $record = $this->dbh->single();
        $hash_pass = $record->password;

        if (password_verify($this->currentPassword, $hash_pass)) {

            return true;
        }
        else {
            return false;
        }
     }

     public function insertImage($image , $target_dir) {
        $this->dbh->query('UPDATE `user` SET `image`="'.$image.'"  WHERE ID=:id ');
        $this->dbh->bind(':id', $_SESSION['user_id']);

        $this->dbh->execute();

        $target = "$target_dir$image";
        return '<img class="img-account-profile rounded-circle mb-2" src = "'.IMAGEROOT3.$image.'">';
     }

     public function getImage() {
        $this->dbh->query('SELECT * FROM `user` WHERE ID=:id ');
        $this->dbh->bind(':id', $_SESSION['user_id']);
        $image = $this->dbh->single();
    
        return $image;
     }

     public function getUserPassword() {
        $this->dbh->query('SELECT * FROM `user` WHERE ID=:id ');
        $this->dbh->bind(':id', $_SESSION['user_id']);

        $password = $this->dbh->single();

        return $password;
     }
}