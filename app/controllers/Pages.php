<?php
class Pages extends Controller
{
public function index()
    {
        $viewPath = VIEWS_PATH . 'pages/Index.php';
        require_once $viewPath;
        $indexView = new Index($this->getModel(), $this);
        $indexView->output();
    }
public function viewItem()
    {
        $viewPath = VIEWS_PATH . 'pages/viewItem.php';
        require_once $viewPath;
        $indexView = new viewItem($this->getModel(), $this);
        $indexView->output();
    }
public function viewRent()
    {
        $viewPath = VIEWS_PATH . 'pages/viewRent.php';
        require_once $viewPath;
        $indexView = new viewRent($this->getModel(), $this);
        $indexView->output();
    }
public function viewDescription()
    {
        $viewPath = VIEWS_PATH . 'pages/viewDescription.php';
        require_once $viewPath;
        $indexView = new viewDescription($this->getModel(), $this);
        $indexView->output();
    }    

    public function WishList()
    {
        $viewPath = VIEWS_PATH . 'pages/wishlist.php';
        require_once $viewPath;
        $WishListView = new WishList($this->getModel(), $this);
        $WishListView->output();
    }
    
    public function about()
    {
        $viewPath = VIEWS_PATH . 'pages/about.php';
        require_once $viewPath;
        $WishListView = new About($this->getModel(), $this);
        $WishListView->output();
    }    
    public function DashBoard()
    {
        $viewPath = VIEWS_PATH . 'pages/DashBoard.php';
        require_once $viewPath;
        $WishListView = new DashBoard($this->getModel(), $this);
        $WishListView->output();
    } 
    public function Profile()
    {
            $ProfileModel = $this->getModel();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                if(!empty($_POST['name'])){ $ProfileModel->setName(trim($_POST['name']));}
                if(!empty($_POST['email'])){ $ProfileModel->setEmail(trim($_POST['email']));}
                if(!empty($_POST['currentPassword'])){ $ProfileModel->setCurrentPassword(trim($_POST['currentPassword']));}
                if(!empty($_POST['newPassword'])){  $ProfileModel->setNewPassword(trim($_POST['newPassword']));}
                if(!empty($_POST['name'])){ $ProfileModel->setConfirmPassword(trim($_POST['confirmPassword']));}

               
               
                //validation
                if (empty($ProfileModel->getName())) {
                    $ProfileModel->setNameErr('Please enter a name');
                }
                if (empty($ProfileModel->getEmail())) {
                    $ProfileModel->setEmailErr('Please enter an email');
                } elseif ($ProfileModel->emailExist($_POST['email'])) {
                    $ProfileModel->setEmailErr('Email is already registered');
                }
                //////////////////////////////////////////////////////////////////////////////////////
                // if (empty($ProfileModel->getNewPassword())) {
                //     $ProfileModel->setNewPasswordErr('Please enter a password');
                // } elseif (strlen($ProfileModel->getNewPassword()) < 4) {
                //     $ProfileModel->setNewPasswordErr('Password must contain at least 4 characters');
                // }
    
                // if ($ProfileModel->getNewPassword() != $ProfileModel->getConfirmPassword()) {
                //     $ProfileModel->setConfirmPasswordErr('Passwords do not match');
                // }
                // if(empty($ProfileModel->getNewPasswordErr()) && empty($ProfileModel->getConfirmPasswordErr())){
                    if ($ProfileModel->EditPassword()) {
                        //header('location: ' . URLROOT . 'users/login');
                        flash('register_success', 'You have Updated your password successfully');
                        redirect('users/Profile');
                    } else {
                        die('Error in Editing the password');
                    }
                // }
                //////////////////////////////////////////////////////////////////////////////////////
                if ( empty($ProfileModel->getNameErr()) || empty($ProfileModel->getEmailErr())) {
                    //Hash Password
    
                    if ($ProfileModel->EditProfile()) {
                        //header('location: ' . URLROOT . 'users/login');
                        flash('register_success', 'You have Updated your Profile successfully');
                        $this->updateUserSession($ProfileModel);
                        redirect('pages/Profile');
                    } else {
                        die('Error in Editing the profile');
                    }
                }
            }
           

        ////////////////////////////////////////////////////////////////////////////////////////////////////
        $viewPath = VIEWS_PATH . 'pages/Profile.php';
        require_once $viewPath;
        $WishListView = new Profile($this->getModel(), $this);
        $WishListView->output();
    }   
    public function updateUserSession($user)
    {

        $_SESSION['user_name'] = $user->getName();
        $_SESSION['email'] = $user->getEmail();
       //header('location: ' . URLROOT . 'pages');
    }
  
}
