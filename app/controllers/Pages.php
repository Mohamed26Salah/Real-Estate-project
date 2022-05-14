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

            if(isset($_POST['ShowButton'])){
                $ViewItem->setButtonShow($_POST['ShowButton']);
                $ViewItem->setID($_POST['CardID']);
                echo($ViewItem->button());
            }else if(isset($_POST['WishListValue'])){
                $ViewItem->setID($_POST['CardID']);
                echo($ViewItem->AddToWishlist($_POST['WishListValue']));
            }

        }else{
            $viewPath = VIEWS_PATH . 'pages/viewItem.php';
            require_once $viewPath;
            $indexView = new viewItem($this->getModel(), $this);
            $indexView->output();
        }
       

       
    }
    public function ajax2()
    { 
        require_once APPROOT . "/models/DashBoardModel.php";
        $DashBoard = new DashBoardModel();
        if (isset($_POST['DEL'])) {
            echo($DashBoard->DeleteUser($_POST['ID']));
        }else if(isset($_POST['EditAbout'])){
            echo($DashBoard->Listusers());
        }else if(isset($_POST['ConfirmAbout'])){
            echo($DashBoard->ConfirmUser($_POST['email'],$_POST['newEmail'],$_POST['ID'],$_POST['name1'],$_POST['title1'],$_POST['disc1']));
        }
        else if(isset($_POST['page'])){
            echo($DashBoard->switchMainDashBoard($_POST['page']));
        }
        else{
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
            //   echo $_POST['area'];
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
                // echo $_POST['HighLow'];
            }
            if($_POST['search']!="Salah"){
                $ViewItem->setSearch($_POST['search']);
            }
            if($_POST['Show']!="Salah"){
                $ViewItem->setShow($_POST['Show']);
            }
            if($_POST['Furnished']!="Salah"){
                $ViewItem->setFurnished($_POST['Furnished']);
            }
            if($_POST['Floor']!="Salah"){
                $ViewItem->setFloor($_POST['Floor']);
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            require_once APPROOT . "/models/viewRentModel.php";
            $ViewRent = new viewRentModel();
            if(isset($_POST['CardID'])){
                echo ($ViewRent->Paid($_POST['CardID']));
            }
            if(isset($_POST['joex'])){
                if($_POST['search']!="Salah"){
                    $ViewRent->setSearch($_POST['search']);
                }
                if($_POST['Rent']!="Salah"){
                    $ViewRent->setRent($_POST['Rent']);
                }
                echo($ViewRent->CheckIfRentIsStillValid($_POST['offset'],$_POST['no_of_records_per_page']));
            }
          
        }else{
        $viewPath = VIEWS_PATH . 'pages/viewRent.php';
        require_once $viewPath;
        $indexView = new viewRent($this->getModel(), $this);
        $indexView->output();
        }
    }
    public function viewDescription()
    {
        
        $viewDescription = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){

            if(isset($_GET['ID'])){
                $viewDescription->setSalahID($_GET['ID']);
                
            }

        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['joex'])){
            $viewDescription->Delete($_POST['joex']);
        }
    }
        $viewPath = VIEWS_PATH . 'pages/viewDescription.php';
        require_once $viewPath;
        $viewDescription = new viewDescription($this->getModel(), $this);
        $viewDescription->output();
    }    


       
 
public function ViewADD()
    {

        $Add = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            if(isset($_POST['name'])){
            if($_POST['name']!="Salah"){
                $Add->setname($_POST['name']);
            }
            if($_POST['Price']!="Salah"){
                $Add->setPrice($_POST['Price']);
            }
            if($_POST['Area']!="Salah"){
                $Add->setArea($_POST['Area']);
            }
            if($_POST['AddressUser']!="Salah"){
                $Add->setAddressUser($_POST['AddressUser']);
            }
            if($_POST['AddressAdmin']!="Salah"){
                $Add->setAddressAdmin($_POST['AddressAdmin']);
            }
            if($_POST['Owner']!="Salah"){
                $Add->setOwner($_POST['Owner']);
            }
            if($_POST['OwnerNum']!="Salah"){
                $Add->setOwnerNum($_POST['OwnerNum']);
            }
            if($_POST['Code']!="Salah"){
                $Add->setCode($_POST['Code']);
            }
            if($_POST['DescriptionUser']!="Salah"){
                $Add->setDescriptionUser($_POST['DescriptionUser']);
            }
            if($_POST['DescriptionAdmin']!="Salah"){
                $Add->setDescriptionAdmin($_POST['DescriptionAdmin']);
            }
            if($_POST['contarctType']!="Salah"){
                $Add->setcontarctType($_POST['contarctType']);
            }
            if($_POST['Show']!="Salah"){
                $Add->setShow($_POST['Show']);
            }
            if($_POST['Payment']!="Salah"){
                $Add->setPayment($_POST['Payment']);
            }
            if($_POST['Importance']!="Salah"){
                $Add->setImportance($_POST['Importance']);
            }
            if($_POST['Floor']!="Salah"){
                $Add->setFloor($_POST['Floor']);
            }
            if($_POST['NUMOFRooms']!="Salah"){
                $Add->setNUMOFRooms($_POST['NUMOFRooms']);
            }
            if($_POST['NUMOFBathrooms']!="Salah"){
                $Add->setNUMOFBathrooms($_POST['NUMOFBathrooms']);
            }
            if($_POST['NUMOFFloors']!="Salah"){
                $Add->setNUMOFFloors($_POST['NUMOFFloors']);
            }
            if($_POST['Furnished']!="Salah"){
                $Add->setFurnished($_POST['Furnished']);
            }
            if($_POST['Finishing']!="Salah"){
                $Add->setFinishing($_POST['Finishing']);
            }
            if($_POST['Doublex']!="Salah"){
                $Add->setDoublex($_POST['Doublex']);
            }
            if($_POST['TypeActivity']!="Salah"){
                $Add->setTypeActivity($_POST['TypeActivity']);
            }
            if($_POST['NUMOFAb']!="Salah"){
                $Add->setNUMOFAb($_POST['NUMOFAb']);
            }
            if($_POST['TypeID']!="Salah"){
                $Add->setTypeID($_POST['TypeID']);
            }
            if($_POST['EditID']!="Salah"){
                $Add->setEditID($_POST['EditID']);
            }
            echo("Da5l Add");
            echo($Add->Add());
            }
            if(!empty($_FILES['files']['name'])){
                $countfiles = count($_FILES['files']['name']);

                // Upload Location
                $upload_location = IMAGEROOT;
                
                // To store uploaded files path
                $files_arr = array();
                
                // Loop all files
                // for($index = 0;$index < $countfiles;$index++){
                for($index = 0;$index < 20 ;$index++){
                
                   if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
                      // File name
                      $filename = $_FILES['files']['name'][$index];
                      $file_size = $_FILES['files']['size'][$index];
                      
                      // Get extension
                      $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                
                      // Valid image extension
                      $valid_ext = array("png","jpeg","jpg");
                
                      // Check extension
                      if(in_array($ext, $valid_ext)){
                        if($file_size < 4194304){
                         // File path
                         $path = $upload_location.$filename;
                
                         // Upload file
                         if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                            $Add->UploadImages($filename);
                         }
                        }
                      }else{
                          echo "<div class='text-center fixed-top' style='margin-top:30px;'><button class='btn btn-danger' id='Db' style='width:50%'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> واحدة من الصور ليست بصورة لذا تم رفضها</button></div>";
                      }
                   }
                }
                
            }
            if(isset($_POST['codeInput'])){
                $Add->setcodeInput($_POST['codeInput']);
                echo($Add->CheckCode()); 
            }
           


        }else{
            $viewPath = VIEWS_PATH . 'pages/ViewADD.php';
        require_once $viewPath;
        $ViewADD = new ViewADD($this->getModel(), $this);
        $ViewADD->output();
        }
      
    } 

    public function viewRentDescription()
    {
        
        $viewRentDescription = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){

            if(isset($_GET['code']) && isset($_GET['color'])){
                $viewRentDescription->setCode($_GET['code']);
                $viewRentDescription->setDotColor($_GET['color']);
                
                
            }

        }

        $viewPath = VIEWS_PATH . 'pages/viewRentDescription.php';
        require_once $viewPath;
        $viewRentDescription = new viewRentDescription($this->getModel(), $this);
        $viewRentDescription->output();
    }    

    public function viewEdit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ViewEdit = $this->getModel();
            if(isset($_POST['FireAJAX'])){
                $ViewEdit->setID($_POST['FireAJAX']);
                echo($ViewEdit->ShowEdit());
            }else if($_POST['codeInput']){
                echo($ViewEdit->CheckCodeEdit($_POST['OldCode'],$_POST['codeInput']));
            }

        }else{
            $viewPath = VIEWS_PATH . 'pages/viewEdit.php';
            require_once $viewPath;
            $viewEdit = new viewEdit($this->getModel(), $this);
            $viewEdit->output();
        }
       
    }    

    public function WishList()
    {
        $WishListView = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['work'])){
                echo($WishListView->sort());
            }else if(isset($_POST['WishListValue'])){
                $WishListView->setID($_POST['CardID']);
                echo($WishListView->AddToWishlist($_POST['WishListValue']));
            }
        }else{
        $viewPath = VIEWS_PATH . 'pages/wishlist.php';
        require_once $viewPath;
        $WishListView = new WishList($this->getModel(), $this);
        $WishListView->output();
        }
      
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
                if(!empty($_POST['confirmPassword'])){ $ProfileModel->setConfirmPassword(trim($_POST['confirmPassword']));}
                

               
                // $ProfileModel->EditPassword();
                //validation
                if (empty($ProfileModel->getName())) {
                    $ProfileModel->setNameErr('Please enter a name');
                }
                else if($ProfileModel->getName() == $_SESSION['user_name']) {
                    $ProfileModel->setNameErr('');
                }
                if (empty($ProfileModel->getEmail())) {
                    $ProfileModel->setEmailErr('Please enter an email');
                } elseif ($ProfileModel->getEmail() == $_SESSION['email']) {
                    $ProfileModel->setEmailErr('');
                }

                if(!$ProfileModel->checkCurrentPassword()) {
                    $ProfileModel->setCurrentPasswordErr('Please Enter a valid password');
                    echo"<script>console.log('invalid')</script>";
                }
                
                //////////////////////////////////////////////////////////////////////////////////////
                if (empty($ProfileModel->getNewPassword())) {
                    $ProfileModel->setNewPasswordErr('Please enter a password');
                } elseif (strlen($ProfileModel->getNewPassword()) < 5) {
                    $ProfileModel->setNewPasswordErr('Password must contain at least 5 characters');
                }
    
                if ($ProfileModel->getNewPassword() != $ProfileModel->getConfirmPassword()) {
                    $ProfileModel->setConfirmPasswordErr('Passwords do not match');
                }
                if(empty($ProfileModel->getNewPasswordErr()) && empty($ProfileModel->getConfirmPasswordErr()) && empty($ProfileModel->getCurrentPasswordErr())){
                    
                    
                    if($ProfileModel->EditPassword()) {
                       
                        echo "alert('You have Updated your Profile successfully')";
                        redirect('users/Profile');
                    }
                    flash('register_success', 'You have Updated your Profile successfully');
                        // flash('register_success', 'You have Updated your password successfully');
                         
                }
                
                //////////////////////////////////////////////////////////////////////////////////////
                if ( empty($ProfileModel->getNameErr()) || empty($ProfileModel->getEmailErr())) {
                    //Hash Password
    
                    if ($ProfileModel->EditProfile()) {
                        $ProfileModel->setCurrentPasswordErr('');
                        $ProfileModel->setNewPasswordErr('');
                        $ProfileModel->setConfirmPasswordErr('');
                        //header('location: ' . URLROOT . 'users/login');
                        flash('register_success', 'You have Updated your Profile successfully');
                        echo"<script>console.log('editprofile')</script>";
                        $this->updateUserSession($ProfileModel);
                        // redirect('pages/Profile');
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

    

    public function ImageAjax() {
        if(!empty($_FILES['fileToUpload']['name'])){
            $errors= array();
            $file_name = $_FILES['fileToUpload']['name'];
            $file_size = $_FILES['fileToUpload']['size'];
            $file_tmp = $_FILES['fileToUpload']['tmp_name'];
            $file_type = $_FILES['fileToUpload']['type'];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            
            $expensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$expensions)===false){
              ?>
                <div class="text-center fixed-top" style="margin-top:30px;">  
                      <button class="btn btn-danger" id="Db" style="width:50%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> extension not allowed,please choose a JPEG or PNG file </button>
                    </div>
                    <?php
                    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if($file_size >4194304) {
              ?>
              <div class="text-center fixed-top" style="margin-top:30px;">  
                      <button class="btn btn-info" id="Db" style="width:50%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> File size must be excately 4 MB or less</button>
                    </div>
                    <?php
               $errors[]='File size must be excately 4 MB';
            }
            
            if(empty($errors)==true){
                    $target_dir = IMAGEROOT;
                   
                    $target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
                    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
                    $name = basename($_FILES['fileToUpload']['name']);
                     move_uploaded_file($tmp_name, "$target_dir$name");

                    // $uploadfile = $_SERVER['DOCUMENT_ROOT'] . "$target_dir$name";
                    require_once APPROOT . "/models/ProfileModel.php";
                    $profileModel = new ProfileModel();
            
                    echo($profileModel->insertImage($name , $target_dir));
                  }
                else {
                    require_once APPROOT . "/models/ProfileModel.php";
                    $profileModel = new ProfileModel();
                    if(empty($profileModel->getImage()->image)) {
                        echo '';
                    }
                    else {
                        if(substr($profileModel->getImage()->image,0,4) == 'http') {
                            $imageRoot = '';
                        }
                        else {
                            $imageRoot = IMAGEROOT3;
                        }
                        echo("Warning");
                    }
                    
                }
            
              } 
       
    }


    
  
}

