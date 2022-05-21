<?php
class Users extends Controller
{
    public function register()
    {
         $registerModel = $this->getModel();


        $clientID = '456173517303-1quvd4kcrdb4mnc4okv1tsujdnsqaqbk.apps.googleusercontent.com';
        $clientSecret = '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';

        $redirectUrl = 'http://localhost/mvc/public/users/Register';

        // Creating client request to google
        $client = new Google_Client();

        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUrl);

        $client->addScope('profile');
        $client->addScope('email');
        $client->addScope('picture');

        if(isset($_GET['code'])) {
            $token= $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token);


            $gauth = new Google_Service_Oauth2($client);
            $google_info = $gauth->userinfo->get();
            $email = $google_info->email;
            $name = $google_info->name;

            // $$google_info['picture']

            
            $registerModel->setEmail($email);
            $registerModel->setName($name);
            $registerModel->setImg($google_info['picture']);
            // $registerModel->setImage($google_info['picture']);

            
            // $sora = '<img src="'.$_SESSION['image'].'">';
            // echo $sora;
            if($registerModel->emailExist($email)) {
                $loggedGoogleUser = $registerModel->loginWithGoogle();
                    if ($loggedGoogleUser) {
                        //create related session variables
                        $this->createUserSession($loggedGoogleUser);
                        
                        die('Success log in User');
                    }
            }
            if ($registerModel->signupGoogle() && !$registerModel->emailExist($email)) {
                //header('location: ' . URLROOT . 'users/login');
                flash('register_success', 'You have registered successfully');
                
                    
                    //create related session variables
                    // $_SESSION['user_id'] = $user->ID;

                    $loggedGoogleUser = $registerModel->loginWithGoogle();
                    if ($loggedGoogleUser) {
                        //create related session variables
                        $this->createUserSession($loggedGoogleUser);
                        
                        
                        die('Success log in User');
                    }
                // $_SESSION['user_name'] = $name;
                // $_SESSION['email'] = $email;
                // die('Success log in User');
                
                // redirect('index');
             } 
             else {
                $loggedGoogleUser = $registerModel->loginWithGoogle();
                    if ($loggedGoogleUser) {
                        //create related session variables
                        $this->createUserSession($loggedGoogleUser);
                       
                        die('Success log in User');
                    }
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $registerModel->setName(trim($_POST['name']));
            $registerModel->setEmail(trim($_POST['email']));
            $registerModel->setPassword(trim($_POST['password']));
            $registerModel->setConfirmPassword(trim($_POST['confirm_password']));

            //validation
            if (empty($registerModel->getName())) {
                $registerModel->setNameErr('Please enter a name');
            }
            if (empty($registerModel->getEmail())) {
                $registerModel->setEmailErr('Please enter an email');
            } elseif ($registerModel->emailExist($_POST['email'])) {
                $registerModel->setEmailErr('Email is already registered');
            }
            if (empty($registerModel->getPassword())) {
                $registerModel->setPasswordErr('Please enter a password');
            } elseif (strlen($registerModel->getPassword()) < 4) {
                $registerModel->setPasswordErr('Password must contain at least 4 characters');
            }

            if ($registerModel->getPassword() != $registerModel->getConfirmPassword()) {
                $registerModel->setConfirmPasswordErr('Passwords do not match');
            }

            if (
                empty($registerModel->getNameErr()) &&
                empty($registerModel->getEmailErr()) &&
                empty($registerModel->getPasswordErr()) &&
                empty($registerModel->getConfirmPasswordErr())
            ) {
                //Hash Password
                $registerModel->setPassword(password_hash($registerModel->getPassword(), PASSWORD_DEFAULT));

                if ($registerModel->signup()) {
                    //header('location: ' . URLROOT . 'users/login');
                    flash('register_success', 'You have registered successfully');
                    redirect('users/login');
                } else {
                    die('Error in sign up');
                }
            }
        }
        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'users/Register.php';
        require_once $viewPath;
        $view = new Register($this->getModel(), $this);
        $view->output();
    }
    public function login()
    {
        $userModel = $this->getModel();


        $clientID = '456173517303-1quvd4kcrdb4mnc4okv1tsujdnsqaqbk.apps.googleusercontent.com';
        $clientSecret = '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';

        $redirectUrl = 'http://localhost/mvc/public/users/Login';

        // Creating client request to google
        $client = new Google_Client();

        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUrl);

        $client->addScope('profile');
        $client->addScope('email');
        $client->addScope('picture');

        if(isset($_GET['code'])) {
            $token= $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token);


            $gauth = new Google_Service_Oauth2($client);
            $google_info = $gauth->userinfo->get();
            $email = $google_info->email;
            $name = $google_info->name;

            // $$google_info['picture']

            
            $userModel->setEmail($email);
            // $userModel->setName($name);
            $userModel->setImg($google_info['picture']);
            // $registerModel->setImage($google_info['picture']);

            
            // $sora = '<img src="'.$_SESSION['image'].'">';
            // echo $sora;
            if($userModel->emailExist($email)) {
                $loggedGoogleUser = $userModel->loginWithGoogle();
                    if ($loggedGoogleUser) {
                        //create related session variables
                        $this->createUserSession($loggedGoogleUser);
                        
                        die('Success log in User');
                    }
            }
             else if(!$userModel->emailExist($email)) {
                $userModel->setEmailErr('No user found');
            }
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $userModel->setEmail(trim($_POST['email']));
            $userModel->setPassword(trim($_POST['password']));

            //validate login form
            if (empty($userModel->getEmail())) {
                $userModel->setEmailErr('Please enter an email');
            } elseif (!($userModel->emailExist($_POST['email']))) {
                $userModel->setEmailErr('No user found');
            }

            if (empty($userModel->getPassword())) {
                $userModel->setPasswordErr('Please enter a password');
            } elseif (strlen($userModel->getPassword()) < 4) {
                $userModel->setPasswordErr('Password must contain at least 4 characters');
            }

            // If no errors
            if (
                empty($userModel->getEmailErr()) &&
                empty($userModel->getPasswordErr())
            ) {
                //Check login is correct
                $loggedUser = $userModel->login();
                if ($loggedUser) {
                    //create related session variables
                    $this->createUserSession($loggedUser);
                    die('Success log in User');
                } else {
                    $userModel->setPasswordErr('Password is not correct');
                }
            }
        }
        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'users/Login.php';
        require_once $viewPath;
        $view = new Login($userModel, $this);
        $view->output();
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->ID;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['email'] = $user->email;
        $_SESSION['Rank'] = $user->Rank;
       

        //header('location: ' . URLROOT . 'pages');
        redirect('index');
    }

    public function SignOut()
    {
        echo 'logout called';
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        // unset($_SESSION['user_name']);
        unset($_SESSION['email']);
        unset($_SESSION['Rank']);
        session_destroy();
        redirect('index');
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
    public function Profile()
    {
       
        ////////////////////////////////////////////////////////////////////////////////////////////////////
        $viewPath = VIEWS_PATH . 'pages/Profile.php';
        require_once $viewPath;
        $WishListView = new Profile($this->getModel(), $this);
        $WishListView->output();
    }   
}

