<?php
require_once 'UserModel.php';
class RegisterModel extends UserModel
{
    public  $title = 'User Registration Page';
    protected $name;
    protected $nameErr;
    protected $confirmPassword;
    protected $confirmPasswordErr;


    public function __construct()
    {
        parent::__construct();
        $this->name     = "";
        $this->nameErr = "";

        $this->confirmPassword = "";
        $this->confirmPasswordErr = "";
    }

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
    public function signup()
    {

        $this->dbh->query("INSERT INTO user (`name`, `email`, `password`,`Rank`) VALUES(:uname, :email, :pass,:Ranke)");
        $ValidatedName=filter_var($this->name, FILTER_SANITIZE_STRING);
        $this->dbh->bind(':uname', $ValidatedName);
        $ValidatedEmail=filter_var($this->email, FILTER_SANITIZE_EMAIL); 
        $this->dbh->bind(':email', $ValidatedEmail);
        $this->dbh->bind(':pass', $this->password);
        $User="User";
        $this->dbh->bind(':Ranke', $User);
        return $this->dbh->execute();
    }
}

