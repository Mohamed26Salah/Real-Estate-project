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
        $ViewItem = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!empty($_POST['area'])){
                $ViewItem->setArea($_POST['area']);
              echo $_POST['area'];
            }
            if(!empty($_POST['pricerange1'])){
                $ViewItem->setprice1($_POST['pricerange1']);
            }
            if(!empty($_POST['pricerange2'])){
                $ViewItem->setprice2($_POST['pricerange2']);
            }
            if(!empty($_POST['Payment'])){
                $ViewItem->setPayment($_POST['Payment']);
            }
            if(!empty($_POST['contarctType'])){
                $ViewItem->setcontarctType($_POST['contarctType']);
            }
            if(!empty($_POST['Bathroom'])){
                $ViewItem->setBathroom($_POST['Bathroom']);
            }
            if(!empty($_POST['Rooms'])){
                $ViewItem->setRooms($_POST['Rooms']);
            }
            if(!empty($_POST['Finishing'])){
                $ViewItem->setFinishing($_POST['Finishing']);
            }
            if(!empty($_POST['HighLow'])){
                $ViewItem->setHighLow($_POST['HighLow']);
            }
            if(!empty($_POST['search'])){
                $ViewItem->setSearch($_POST['search']);
            }
             
           
        }

        $viewPath = VIEWS_PATH . 'pages/viewItem.php';
        require_once $viewPath;
        $indexView = new viewItem($this->getModel(), $this);
        $indexView->output();
    }
    public function ajax2()
    { 
        require_once APPROOT . "/models/DashBoardModel.php";
        $DashBoard = new DashBoardModel();
        if (isset($_POST['DEL'])) {
            echo($DashBoard->DeleteUser($_POST['ID']));
        }else{
            echo($DashBoard->EditConfirm($_POST['ConfirmID'],$_POST['Rank'],$_POST['valuee']));

        }
       

    }
    public function ajax()
    {
        // $ViewItem = $this->getModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
           
            $Model=$_POST['Model']."Model";
            // echo($Model);
            require_once APPROOT . "/models/viewItemModel.php";
            $ViewItem = new viewItemModel();
            
            if($_POST['area']!="Salah"){
                $ViewItem->setArea($_POST['area']);
              echo $_POST['area'];
            }
            if($_POST['pricerange1']!="Salah"){
                $ViewItem->setprice1($_POST['pricerange1']);
            }
            if($_POST['pricerange2']!="Salah"){
                $ViewItem->setprice2($_POST['pricerange2']);
            }
            if($_POST['Payment']!="Salah"){
                $ViewItem->setPayment($_POST['Payment']);
            }
            if($_POST['contarctType']!="Salah"){
                $ViewItem->setcontarctType($_POST['contarctType']);
            }
            if($_POST['Bathroom']!="Salah"){
                $ViewItem->setBathroom($_POST['Bathroom']);
            }
            if($_POST['Rooms']!="Salah"){
                $ViewItem->setRooms($_POST['Rooms']);
            }
            if($_POST['Finishing']!="Salah"){
                $ViewItem->setFinishing($_POST['Finishing']);
            }
            if($_POST['HighLow']!="Salah"){
                $ViewItem->setHighLow($_POST['HighLow']);
                echo $_POST['HighLow'];
            }
            if($_POST['search']!="Salah"){
                $ViewItem->setSearch($_POST['search']);
            }
          
           
             echo($ViewItem->Sort($_POST['offset'],$_POST['no_of_records_per_page']));
        }

        // $viewPath = VIEWS_PATH . 'ajax/search.php';
        // require_once $viewPath;
        // $ajax = new ajax($this->getModel(), $this);
        // $ajax->output();
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
                

               
                $ProfileModel->EditPassword();
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
                if (empty($ProfileModel->getNewPassword())) {
                    $ProfileModel->setNewPasswordErr('Please enter a password');
                } elseif (strlen($ProfileModel->getNewPassword()) < 4) {
                    $ProfileModel->setNewPasswordErr('Password must contain at least 4 characters');
                }
    
                if ($ProfileModel->getNewPassword() != $ProfileModel->getConfirmPassword()) {
                    $ProfileModel->setConfirmPasswordErr('Passwords do not match');
                }
                if(empty($ProfileModel->getNewPasswordErr()) && empty($ProfileModel->getConfirmPasswordErr())){
                    echo"<script>alert('yasser gwa if kbeeraaa')</script>";
                    $ProfileModel->EditPassword();
                        // flash('register_success', 'You have Updated your password successfully');
                        // redirect('users/Profile');
                }
                
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

