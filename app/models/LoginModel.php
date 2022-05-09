<?php
require_once 'UserModel.php';
class LoginModel extends UserModel
{
    public  $title = 'User Login Page';

    public function login()
    {
        $this->dbh->query('SELECT * from user WHERE email = :email');
        $ValidatedEmail=filter_var($this->email, FILTER_SANITIZE_EMAIL); 
        $this->dbh->bind(':email', $ValidatedEmail);

        $record = $this->dbh->single();
        $hash_pass = $record->password;

        if (password_verify($this->password,  $hash_pass)) {
            return $record;
        } else {
            return false;
        }
    }


    public function loginWithGoogle() {

        $this->dbh->query('SELECT * from user WHERE email = :email');
        $ValidatedEmail=filter_var($this->email, FILTER_SANITIZE_EMAIL); 
        $this->dbh->bind(':email', $ValidatedEmail);

        $record = $this->dbh->single();

        
        
        return $record;  

    }
}




