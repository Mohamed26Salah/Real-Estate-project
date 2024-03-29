<?php
$AdminPath = models_PATH . 'AdminModel.php';
require_once $AdminPath;

$ClienPath = models_PATH . 'Client.php';
require_once $ClienPath;
function myCustomErrorHandler(int $errNo, string $errMsg, string $file, int $line) {
    echo "Wow my custom error handler got #[$errNo] occurred in [$file] at line [$line]: [$errMsg]";
    redirect('index?ERROR=1');
    }
class Pages extends Controller
{
    protected $ID;

   
        
        

    public function index()
    {
        try {

            $viewPath = VIEWS_PATH . 'pages/Index.php';
            require_once $viewPath;

            $indexView = new Index($this->getModel(), $this);

            $indexView->output();
        } catch (Exception  $e) {
            echo "<h1 style='display:flex; justify-content:center; margin-top:20%;'>" . $e->getMessage() . '</h1>';
        }
    }


    public function viewItem()
    {
        set_error_handler('myCustomErrorHandler');
        try {
            $viewItemAdmin = new AdminModel();
            $ViewItem = $this->getModel();
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){


          
            echo $viewItemAdmin->viewItem();

            }
           
            // echo $ViewItem->viewItem();

           else {

           $viewPath = VIEWS_PATH . 'pages/viewItem.php';
            require_once $viewPath;
            $indexView = new viewItem($this->getModel(), $this);
            $indexView->output();
           }
        } catch (Exception  $e) {
            echo "<h1 style='display:flex; justify-content:center; margin-top:20%;'>" . $e->getMessage() . '</h1>';
        }
    }

    public function ajax()
    {
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        set_error_handler('myCustomErrorHandler');
        try {
        $ViewItem = $this->getModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
         
            $Model=$_POST['Model']."Model";
            // echo($Model);
            require_once APPROOT . "/models/viewItemModel.php";
            $ViewItem = new viewItemModel();
            
            if($_POST['area']!="Salah"){
                $ViewItem->setArea($_POST['area']);
            }
            if($_POST['pricerange1']!="Salah"){
                $Price1Validate=filter_var($_POST['pricerange1'], FILTER_SANITIZE_NUMBER_INT);
                $ViewItem->setprice1($Price1Validate);
            }
            if($_POST['pricerange2']!="Salah"){
                $Price2Validate=filter_var($_POST['pricerange2'], FILTER_SANITIZE_NUMBER_INT);
                $ViewItem->setprice2($Price2Validate);
            }
            if($_POST['Payment']!="Salah"){
                $ViewItem->setPayment($_POST['Payment']);
            }
            if($_POST['contarctType']!="Salah"){
                $ViewItem->setcontarctType($_POST['contarctType']);
            }
            if($_POST['Bathroom']!="Salah"){
                $BathroomsValidate=filter_var($_POST['Bathroom'], FILTER_SANITIZE_NUMBER_INT);
                $ViewItem->setBathroom($BathroomsValidate);
            }
            if($_POST['Rooms']!="Salah"){
                $RoomsValidate=filter_var($_POST['Rooms'], FILTER_SANITIZE_NUMBER_INT);
                $ViewItem->setRooms($RoomsValidate);
            }
            if($_POST['Finishing']!="Salah"){
                $ViewItem->setFinishing($_POST['Finishing']);
            }
            if($_POST['HighLow']!="Salah"){
                $ViewItem->setHighLow($_POST['HighLow']);
                // echo $_POST['HighLow'];
            }
            if($_POST['search']!="Salah"){
                // $SearchValidate=filter_var($_POST['search'], FILTER_SANITIZE_STRING);
                $SearchValidate=test_input($_POST['search']);
                $ViewItem->setSearch($SearchValidate);
            }
            if($_POST['Show']!="Salah"){
                $ViewItem->setShow($_POST['Show']);
            }
            if($_POST['Furnished']!="Salah"){
                $ViewItem->setFurnished($_POST['Furnished']);
            }
            if($_POST['Floor']!="Salah"){
                $FloorValidate=filter_var($_POST['Floor'], FILTER_SANITIZE_NUMBER_INT);
                $ViewItem->setFloor($FloorValidate);
            }
            if($_POST['TypeID']!="Salah"){
                $ViewItem->setTypeID($_POST['TypeID']);
            }
            if($_POST['NUMOFFloors']!="Salah"){
                $NUMOFFloorsValidate=filter_var($_POST['NUMOFFloors'], FILTER_SANITIZE_NUMBER_INT);
                $ViewItem->setNUMOFFloors($NUMOFFloorsValidate);
            }
            if($_POST['Doublex']!="Salah"){
                $ViewItem->setDoublex($_POST['Doublex']);
            }
            if($_POST['nUMOFAB']!="Salah"){
                $NUMOFABValidate=filter_var($_POST['nUMOFAB'], FILTER_SANITIZE_NUMBER_INT);
                $ViewItem->setnUMOFAB($NUMOFABValidate);
            }
            if($_POST['TypeOFActivity']!="Salah"){
                // $TypeOFActivityValidate=filter_var($_POST['TypeOFActivity'], FILTER_SANITIZE_STRING);
                $TypeOFActivityValidate=test_input($_POST['TypeOFActivity']);
                $ViewItem->setTypeOFActivity($TypeOFActivityValidate);
            }
            if($_POST['NUMOFFlats']!="Salah"){
                $NUMOFFlatsValidate=filter_var($_POST['NUMOFFlats'], FILTER_SANITIZE_NUMBER_INT);
                $ViewItem->setNUMOFFlats($NUMOFFlatsValidate);
            }
            if($_POST['Importance']!="Salah"){
                $ViewItem->setImportance($_POST['Importance']);
            }
            echo ($ViewItem->Sort($_POST['offset'], $_POST['no_of_records_per_page']));
        }
    } catch (Exception  $e) {
            echo "<h1 style='display:flex; justify-content:center; margin-top:20%;'>" . $e->getMessage() . '</h1>';
    }
      
    }

    public function viewRent()
    {
        set_error_handler('myCustomErrorHandler');
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // require_once APPROOT . "/models/viewRentModel.php";

                $viewRentAdmin = new AdminModel();
                // $ViewRent = new viewRentModel();
          

                echo ($viewRentAdmin->ViewRent());
            } else {
                $viewPath = VIEWS_PATH . 'pages/viewRent.php';
                require_once $viewPath;
                $indexView = new viewRent($this->getModel(), $this);
                $indexView->output();
            }
        } catch (Exception  $e) {
            echo "<h1 style='display:flex; justify-content:center; margin-top:20%;'>" . $e->getMessage() . '</h1>';
        }
    }
    public function viewDescription()
    {
        set_error_handler('myCustomErrorHandler');
        try {
             $viewDescription = $this->getModel();
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                if (isset($_GET['ID'])) {
                    $viewDescription->setSalahID($_GET['ID']);
                }
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['joex'])) {
                    $viewDescription->Delete($_POST['joex']);
                }else if(isset($_POST['WishListValue'])){
                    $viewDescription->setID($_POST['CardID']);
                    echo($viewDescription->AddToWishlist($_POST['WishListValue']));
                   
                }
                
            }
            $viewPath = VIEWS_PATH . 'pages/viewDescription.php';
            require_once $viewPath;
            $viewDescription = new viewDescription($this->getModel(), $this);
            $viewDescription->output();
        } catch (Exception  $e) {
            echo "<h1 style='display:flex; justify-content:center; margin-top:20%;'>" . $e->getMessage() . '</h1>';
        }
    }


    //////////////////////////////////////////
    public function ViewADDRent()
    {
        set_error_handler('myCustomErrorHandler');
        try {
            $AddRent = $this->getModel();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if (isset($_POST['Code'])) {

                    if ($_POST['Code'] != "Salah") {
                        $AddRent->setCode($_POST['Code']);
                    }
                    if ($_POST['Price'] != "Salah") {
                        $AddRent->setPrice($_POST['Price']);
                    }
                    if ($_POST['Show'] != "Salah") {
                        $AddRent->setShow($_POST['Show']);
                    }
                    if ($_POST['Area'] != "Salah") {
                        $AddRent->setArea($_POST['Area']);
                    }
                    if ($_POST['NUMOFFloors'] != "Salah") {
                        $AddRent->setNUMOFFloors($_POST['NUMOFFloors']);
                    }
                    if ($_POST['LessorName'] != "Salah") {
                        $AddRent->setLessorName($_POST['LessorName']);
                    }
                    if ($_POST['LessorNum'] != "Salah") {
                        $AddRent->setLessorNum($_POST['LessorNum']);
                    }
                    if ($_POST['TenantName'] != "Salah") {
                        $AddRent->setTenantName($_POST['TenantName']);
                    }
                    if ($_POST['TenantNum'] != "Salah") {
                        $AddRent->setTenantNum($_POST['TenantNum']);
                    }
                    if ($_POST['Description'] != "Salah") {
                        $AddRent->setDescription($_POST['Description']);
                    }
                    if ($_POST['furnished'] != "Salah") {
                        $AddRent->setfurnished($_POST['furnished']);
                    }
                    if ($_POST['Finishing'] != "Salah") {
                        $AddRent->setFinishing($_POST['Finishing']);
                    }
                    if ($_POST['StartOFRent'] != "Salah") {
                        $AddRent->setStartOFRent($_POST['StartOFRent']);
                    }
                    if ($_POST['ENDOFRent'] != "Salah") {
                        $AddRent->setENDOFRent($_POST['ENDOFRent']);
                    }
                    if ($_POST['TOR'] != "Salah") {
                        $AddRent->setTOR($_POST['TOR']);
                    }
                    if ($_POST['TOREND'] != "Salah") {
                        $AddRent->setTOREND($_POST['TOREND']);
                    }
                    if (isset($_POST['EditIDRent'])) {
                        if ($_POST['EditIDRent'] != "Salah") {
                            $AddRent->setEditIDRent($_POST['EditIDRent']);
                        }
                    }
                    echo ($AddRent->AddRent());
                }
                if (!empty($_FILES['files']['name'])) {
                    $countfiles = count($_FILES['files']['name']);

                    // Upload Location
                    $upload_location = IMAGEROOT;

                    // To store uploaded files path
                    $files_arr = array();

                    // Loop all files
                    // for($index = 0;$index < $countfiles;$index++){
                    $counter = "0";
                    for ($index = 0; $index < 20; $index++) {

                        if (isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != '') {
                            // File name
                            $filename = $_FILES['files']['name'][$index];
                            $file_size = $_FILES['files']['size'][$index];

                            // Get extension
                            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                            // Valid image extension
                            $valid_ext = array("png", "jpeg", "jpg");

                            // Check extension
                            if (in_array($ext, $valid_ext)) {
                                if ($file_size < 4194304) {
                                    // File path
                                    $path = $upload_location . $filename;

                                    // Upload file
                                    if (move_uploaded_file($_FILES['files']['tmp_name'][$index], $path)) {
                                        $AddRent->UploadImages($filename);
                                    }
                                }
                            } else {
                                echo "<div class='text-center fixed-top' style='margin-top:30px;'><button class='btn btn-danger' id='Db' style='width:50%'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> واحدة من الصور ليست بصورة لذا تم رفضها</button></div>";
                            }
                        }
                    }
                }
                if (isset($_POST['codeInput'])) {
                    $AddRent->setCode($_POST['codeInput']);
                    echo ($AddRent->CheckCode());
                }
                if (isset($_POST['IDForImages'])) {
                    $AddRent->DeleteImages($_POST['IDForImages']);
                    echo "Da5l Controller";
                }
            } else {
                $viewPath = VIEWS_PATH . 'pages/ViewADDRent.php';
                require_once $viewPath;
                $ViewADDRent = new ViewADDRent($this->getModel(), $this);
                $ViewADDRent->output();
            }
        } catch (Exception  $e) {
            echo "<h1 style='display:flex; justify-content:center; margin-top:20%;'>" . $e->getMessage() . '</h1>';
        }
    }
    public function viewEditRent()
    {
        set_error_handler('myCustomErrorHandler');
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $ViewEditRent = $this->getModel();
                if (isset($_POST['FireAJAXRent'])) {
                    $ViewEditRent->setID($_POST['FireAJAXRent']);
                    echo ($ViewEditRent->ShowEditRent());
                }
                if (isset($_POST['codeInput'])) {
                    echo ($ViewEditRent->CheckCodeEdit($_POST['OldCode'], $_POST['codeInput']));
                }
                if (!empty($_FILES['files']['name'])) {
                    $countfiles = count($_FILES['files']['name']);
                    $counter = "0";
                    // Upload Location
                    $upload_location = IMAGEROOT;

                    // To store uploaded files path
                    $files_arr = array();

                    // Loop all files
                    // for($index = 0;$index < $countfiles;$index++){
                    for ($index = 0; $index <= 20; $index++) {

                        if (isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != '') {
                            // File name
                            $filename = $_FILES['files']['name'][$index];
                            $file_size = $_FILES['files']['size'][$index];

                            // Get extension
                            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                            // Valid image extension
                            $valid_ext = array("png", "jpeg", "jpg");

                            // Check extension
                            if (in_array($ext, $valid_ext)) {
                                if ($file_size < 4194304) {
                                    // File path
                                    $path = $upload_location . $filename;

                                    // Upload file
                                    if (move_uploaded_file($_FILES['files']['tmp_name'][$index], $path)) {
                                        $ViewEditRent->UploadImagesEdit($filename, $_POST['YASSER']);
                                    }
                                }
                            } else {
                                echo "<div class='text-center fixed-top' style='margin-top:30px;'><button class='btn btn-danger' id='Db' style='width:50%'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> واحدة من الصور ليست بصورة لذا تم رفضها</button></div>";
                            }
                        }
                    }
                }
            } else {
                $viewPath = VIEWS_PATH . 'pages/viewEditRent.php';
                require_once $viewPath;
                $viewEditRent = new viewEditRent($this->getModel(), $this);
                $viewEditRent->output();
            }
        } catch (Exception  $e) {
            echo "<h1 style='display:flex; justify-content:center; margin-top:20%;'>" . $e->getMessage() . '</h1>';
        }
    }
    /////////////////////////////////////
    public function ViewADD()
    {
        set_error_handler('myCustomErrorHandler');
        try {
            $Add = new AdminModel();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            
                echo $Add->ViewAdd();
            } else {
                $viewPath = VIEWS_PATH . 'pages/ViewADD.php';
                require_once $viewPath;
                $ViewADD = new ViewADD($this->getModel(), $this);
                $ViewADD->output();
            }
        } catch (Exception  $e) {
            echo "<h1 style='display:flex; justify-content:center; margin-top:20%;'>" . $e->getMessage() . '</h1>';
        }
    }

    public function viewRentDescription()
    {
        set_error_handler('myCustomErrorHandler');
        try {
            $viewRentDescription = $this->getModel();

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                if (isset($_GET['ID']) && isset($_GET['color'])) {
                    $viewRentDescription->setID($_GET['ID']);
                    $viewRentDescription->setDotColor($_GET['color']);
                }
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['RentDelete'])) {
                    $viewRentDescription->Delete($_POST['RentDelete']);
                }
            }


            $viewPath = VIEWS_PATH . 'pages/viewRentDescription.php';
            require_once $viewPath;
            $viewRentDescription = new viewRentDescription($this->getModel(), $this);
            $viewRentDescription->output();
        } catch (Exception  $e) {
            echo "<h1 style='display:flex; justify-content:center; margin-top:20%;'>" . $e->getMessage() . '</h1>';
        }
    }

    public function viewEdit()
    {
        try {
            $editAdmin = new AdminModel();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $ViewEdit = $this->getModel();
               

                echo $editAdmin->Edit();
            } else {
                $viewPath = VIEWS_PATH . 'pages/viewEdit.php';
                require_once $viewPath;
                $viewEdit = new viewEdit($this->getModel(), $this);
                $viewEdit->output();
            }
        } catch (Exception  $e) {
            echo "<h1 style='display:flex; justify-content:center; margin-top:20%;'>" . $e->getMessage() . '</h1>';
        }
    }

    public function WishList()
    {
        set_error_handler('myCustomErrorHandler');
        try {
            $WishListView = $this->getModel();
            $WishListClient = new Client();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             

                echo $WishListClient->WishList();
            } else {
                $viewPath = VIEWS_PATH . 'pages/wishlist.php';
                require_once $viewPath;
                $WishListView = new WishList($this->getModel(), $this);
                $WishListView->output();
            }
        } catch (Exception  $e) {
            echo "<h1 style='display:flex; justify-content:center; margin-top:20%;'>" . $e->getMessage() . '</h1>';
        }
    }

    public function about()
    {
        set_error_handler('myCustomErrorHandler');
        try {
            $viewPath = VIEWS_PATH . 'pages/about.php';
            require_once $viewPath;
            $WishListView = new About($this->getModel(), $this);
            $WishListView->output();
        } catch (Exception  $e) {
            echo "<h1 style='display:flex; justify-content:center; margin-top:20%;'>" . $e->getMessage() . '</h1>';
        }
    }
    public function DashBoard()
    {
        // set_error_handler('myCustomErrorHandler');
        try {

          

            $AdminDashbaord = new AdminModel;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                echo $AdminDashbaord->Dashboard();
            }
            //
            else {

                $viewPath = VIEWS_PATH . 'pages/DashBoard.php';
                require_once $viewPath;
                $DashBoardView = new DashBoard($this->getModel(), $this);
                $DashBoard = new DashBoardModel();
                $DashBoardView->output();
            }
        } catch (Exception  $e) {
            echo "<h1 style='display:flex; justify-content:center; margin-top:20%;'>" . $e->getMessage() . '</h1>';
        }
    }

    public function Profile()
    {
        // set_error_handler('myCustomErrorHandler');
        // try {
            $ProfileModel = $this->getModel();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                if (!empty($_POST['name'])) {
                    $ProfileModel->setName(trim($_POST['name']));
                }
                if (!empty($_POST['email'])) {
                    $ProfileModel->setEmail(trim($_POST['email']));
                }
                if (!empty($_POST['currentPassword'])) {
                    $ProfileModel->setCurrentPassword(trim($_POST['currentPassword']));
                }
                if (!empty($_POST['newPassword'])) {
                    $ProfileModel->setNewPassword(trim($_POST['newPassword']));
                }
                if (!empty($_POST['confirmPassword'])) {
                    $ProfileModel->setConfirmPassword(trim($_POST['confirmPassword']));
                }



                // $ProfileModel->EditPassword();
                //validation
                if (empty($ProfileModel->getName())) {
                    $ProfileModel->setNameErr('Please enter a name');
                } else if ($ProfileModel->getName() == $_SESSION['user_name']) {
                    $ProfileModel->setNameErr('');
                }
                if (empty($ProfileModel->getEmail())) {
                    $ProfileModel->setEmailErr('Please enter an email');
                } elseif ($ProfileModel->getEmail() == $_SESSION['email']) {
                    $ProfileModel->setEmailErr('');
                }

                if (!$ProfileModel->checkCurrentPassword()) {
                    $ProfileModel->setCurrentPasswordErr('Please Enter a valid password');
                    echo "<script>console.log('invalid')</script>";
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
                if (empty($ProfileModel->getNewPasswordErr()) && empty($ProfileModel->getConfirmPasswordErr()) && empty($ProfileModel->getCurrentPasswordErr())) {


                    if ($ProfileModel->EditPassword()) {

                        echo "alert('You have Updated your Profile successfully')";
                        redirect('users/Profile');
                    }
                    flash('register_success', 'You have Updated your Profile successfully');
                    // flash('register_success', 'You have Updated your password successfully');

                }

                //////////////////////////////////////////////////////////////////////////////////////
                if (empty($ProfileModel->getNameErr()) || empty($ProfileModel->getEmailErr())) {
                    //Hash Password

                    if ($ProfileModel->EditProfile()) {
                        $ProfileModel->setCurrentPasswordErr('');
                        $ProfileModel->setNewPasswordErr('');
                        $ProfileModel->setConfirmPasswordErr('');
                        //header('location: ' . URLROOT . 'users/login');
                        flash('register_success', 'You have Updated your Profile successfully');
                        echo "<script>console.log('editprofile')</script>";
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
        // } catch (Exception  $e) {
        //     echo "<h1 style='display:flex; justify-content:center; margin-top:20%;'>" . $e->getMessage() . '</h1>';
        // }
    }
    public function updateUserSession($user)
    {
        set_error_handler('myCustomErrorHandler');
        try {

            $_SESSION['user_name'] = $user->getName();
            $_SESSION['email'] = $user->getEmail();
            //header('location: ' . URLROOT . 'pages');
        } catch (Exception  $e) {
            echo "<h1 style='display:flex; justify-content:center; margin-top:20%;'>" . $e->getMessage() . '</h1>';
        }
    }



    public function ImageAjax()
    {
        // set_error_handler('myCustomErrorHandler');
        // try {
            if (!empty($_FILES['fileToUpload']['name'])) {
                $errors = array();
                $file_name = $_FILES['fileToUpload']['name'];
                $file_size = $_FILES['fileToUpload']['size'];
                $file_tmp = $_FILES['fileToUpload']['tmp_name'];
                $file_type = $_FILES['fileToUpload']['type'];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

                $expensions = array("jpeg", "jpg", "png");

                if (in_array($file_ext, $expensions) === false) {
?>
                    <div class="text-center fixed-top" style="margin-top:30px;" onclick="RemoveError()">
                        <button class="btn btn-danger" id="Db" style="width:50%" onclick="RemoveError()"><i class="fa fa-exclamation-triangle" aria-hidden="true" onclick="RemoveError()"></i> extension not allowed,please choose a JPEG or PNG file </button>
                    </div>
                <?php
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }

                if ($file_size > 4194304) {
                ?>
                    <div class="text-center fixed-top" style="margin-top:30px;" onclick="RemoveError()">
                        <button class="btn btn-info" id="Db" style="width:50%" onclick="RemoveError()"><i class="fa fa-exclamation-triangle" aria-hidden="true" onclick="RemoveError()"></i> File size must be excately 4 MB or less</button>
                    </div>
<?php
                    $errors[] = 'File size must be excately 4 MB';
                }

                if (empty($errors) == true) {
                    $target_dir = IMAGEROOT;

                    $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
                    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
                    $name = basename($_FILES['fileToUpload']['name']);
                    move_uploaded_file($tmp_name, "$target_dir$name");

                    // $uploadfile = $_SERVER['DOCUMENT_ROOT'] . "$target_dir$name";
                    require_once APPROOT . "/models/ProfileModel.php";
                    $profileModel = new ProfileModel();

                    echo ($profileModel->insertImage($name, $target_dir));
                } else {
                    require_once APPROOT . "/models/ProfileModel.php";
                    $profileModel = new ProfileModel();
                    if (empty($profileModel->getImage()->image)) {
                        echo '';
                    } else {
                        if (substr($profileModel->getImage()->image, 0, 4) == 'http') {
                            $imageRoot = '';
                        } else {
                            $imageRoot = IMAGEROOT3;
                        }
                        echo ("Warning");
                    }
                }
            }
       
    }

}


class myCustomException extends Exception
{
}

