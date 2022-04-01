<?php
class ProfileModel extends model
{
     protected $name;
     protected $nameErr;
     protected $email;
     protected $emailErr;
 
 
     public function __construct()
     {
         parent::__construct();
         $this->name = "";
         $this->nameErr = "";
         $this->email = "";
         $this->emailErr = "";
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
         $ValidatedName=filter_var($this->name, FILTER_SANITIZE_STRING);
         $this->dbh->bind(':uname', $ValidatedName);
         $ValidatedEmail=filter_var($this->email, FILTER_SANITIZE_EMAIL); 
         $this->dbh->bind(':email', $ValidatedEmail);
        $this->dbh->bind(':id', $_SESSION['user_id']);
         return $this->dbh->execute();
     }
}