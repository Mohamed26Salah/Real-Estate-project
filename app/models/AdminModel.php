<?php
require_once 'DashBoardModel.php';
require_once 'viewItemModel.php';
require_once 'viewRentModel.php';

require_once 'viewAddModel.php';
require_once 'viewRentDescriptionModel.php';
require_once 'ViewEditModel.php';
class AdminModel 
{
    public $DashBoard;
    public $ViewItem;
    public $ViewRent;
    public $ViewAdd;

    public $ViewEdit;

    // public function __construct(){
    //     $this->DashBoard = new DashboardModel;
     
       
    // }
    
  public function DashBoard() {
      $this->DashBoard = new DashboardModel;
      if (isset($_POST['DEL'])) {
        return($this->DashBoard->DeleteUser($_POST['ID']));
    }else if(isset($_POST['DeleteAbout'])){
        return($this->DashBoard->DeleteUserAbout($_POST['ID']));
    }else if(isset($_POST['EditAbout'])){
        
        return($this->DashBoard->DashBoard());
    }else if(isset($_POST['state'])){
        return($this->DashBoard->SearchMain($_POST['state'],$_POST['search'],$_POST['offsettt'],$_POST['norpptt']));
    }else if(isset($_POST['ConfirmAboutAdd'])){
        return($this->DashBoard->ConfirmUserAdd($_POST['newEmail'],$_POST['name1'],$_POST['title1'],$_POST['disc1']));
    }else if(isset($_POST['ConfirmAbout'])){
        return($this->DashBoard->ConfirmUser($_POST['email'],$_POST['newEmail'],$_POST['ID'],$_POST['name1'],$_POST['title1'],$_POST['disc1']));
    }
    else if(isset($_POST['page'])){
        return($this->DashBoard->switchMainDashBoard($_POST['page']));
    }
    else{
        return($this->DashBoard->EditConfirm($_POST['ConfirmID'],$_POST['Rank'],$_POST['valuee']));

    }

      
     
  }
  public function viewItem() {
    $this->ViewItem = new viewItemModel;
   
    if(isset($_POST['ShowButton'])){
        $this->ViewItem->setButtonShow($_POST['ShowButton']);
        $this->ViewItem->setID($_POST['CardID']);
        return ($this->ViewItem->button());

        
    }else if(isset($_POST['WishListValue'])){
        $this->ViewItem->setID($_POST['CardID']);
        return ($this->ViewItem->AddToWishlist($_POST['WishListValue']));
       
        
    }else if(isset($_POST['SearchBar'])){
        return '<script>console.log("'.$_POST['SearchBar'] .'"); </script>';
    }
   
}

// public function viewItemButton() {
//     $this->ViewItem = new viewItemModel;
   
//     $this->ViewItem->setButtonShow($_POST['ShowButton']);
//     $this->ViewItem->setID($_POST['CardID']);
//     return ($this->ViewItem->button());
  
   
// }


public function viewRent() {
    $this->ViewRent = new viewRentModel;


        if(isset($_POST['CardID'])){
            return ($this->ViewRent->Paid($_POST['CardID']));
        }
        if(isset($_POST['joex'])){
            if($_POST['search']!="Salah"){
                $this->ViewRent->setSearch($_POST['search']);
            }
            if($_POST['Rent']!="Salah"){
                $this->ViewRent->setRent($_POST['Rent']);
            }
            return ($this->ViewRent->CheckIfRentIsStillValid($_POST['offset'],$_POST['no_of_records_per_page']));
         }
    
  
   
}


public function ViewAdd() {
    $this->ViewAdd = new viewAddModel;
    

        if(isset($_POST['name'])){
        if($_POST['name']!="Salah"){
            $this->ViewAdd->setname($_POST['name']);
        }
        if($_POST['Price']!="Salah"){
            $this->ViewAdd->setPrice($_POST['Price']);
        }
        if($_POST['Area']!="Salah"){
            $this->ViewAdd->setArea($_POST['Area']);
        }
        if($_POST['AddressUser']!="Salah"){
            $this->ViewAdd->setAddressUser($_POST['AddressUser']);
        }
        if($_POST['AddressAdmin']!="Salah"){
            $this->ViewAdd->setAddressAdmin($_POST['AddressAdmin']);
        }
        if($_POST['Owner']!="Salah"){
            $this->ViewAdd->setOwner($_POST['Owner']);
        }
        if($_POST['OwnerNum']!="Salah"){
            $this->ViewAdd->setOwnerNum($_POST['OwnerNum']);
        }
        if($_POST['Code']!="Salah"){
            $this->ViewAdd->setCode($_POST['Code']);
        }
        if($_POST['DescriptionUser']!="Salah"){
            $this->ViewAdd->setDescriptionUser($_POST['DescriptionUser']);
        }
        if($_POST['DescriptionAdmin']!="Salah"){
            $this->ViewAdd->setDescriptionAdmin($_POST['DescriptionAdmin']);
        }
        if($_POST['contarctType']!="Salah"){
            $this->ViewAdd->setcontarctType($_POST['contarctType']);
        }
        if($_POST['Show']!="Salah"){
            $this->ViewAdd->setShow($_POST['Show']);
        }
        if($_POST['Payment']!="Salah"){
            $this->ViewAdd->setPayment($_POST['Payment']);
        }
        if($_POST['Importance']!="Salah"){
            $this->ViewAdd->setImportance($_POST['Importance']);
        }
        if($_POST['TypeID']!="Salah"){
            $this->ViewAdd->setTypeID($_POST['TypeID']);
        }
        if(isset($_POST['Floor'])){
            if($_POST['Floor']!="Salah"){
                $this->ViewAdd->setFloor($_POST['Floor']);
            }
        }
        if(isset($_POST['NUMOFRooms'])){
            if($_POST['NUMOFRooms']!="Salah"){
                $this->ViewAdd->setNUMOFRooms($_POST['NUMOFRooms']);
            }
        }
        if(isset($_POST['NUMOFBathrooms'])){
            if($_POST['NUMOFBathrooms']!="Salah"){
                $this->ViewAdd->setNUMOFBathrooms($_POST['NUMOFBathrooms']);
            }
        }
        if(isset($_POST['NUMOFFloors'])){
            if($_POST['NUMOFFloors']!="Salah"){
                $this->ViewAdd->setNUMOFFloors($_POST['NUMOFFloors']);
            }
        }
        if(isset($_POST['Furnished'])){
            if($_POST['Furnished']!="Salah"){
                $this->ViewAdd->setFurnished($_POST['Furnished']);
            }
        }
        if(isset($_POST['Finishing'])){
            if($_POST['Finishing']!="Salah"){
                $this->ViewAdd->setFinishing($_POST['Finishing']);
            }
        }
        if(isset($_POST['Doublex'])){
            if($_POST['Doublex']!="Salah"){
                $this->ViewAdd->setDoublex($_POST['Doublex']);
            }
        }
        if(isset($_POST['TypeOFActivity'])){
            if($_POST['TypeOFActivity']!="Salah"){
                $this->ViewAdd->setTypeOFActivity($_POST['TypeOFActivity']);
            }
        }
        if(isset($_POST['nUMOFAB'])){
            if($_POST['nUMOFAB']!="Salah"){
                $this->ViewAdd->setnUMOFAB($_POST['nUMOFAB']);
            }
        }
        //////////////////////////////////////////////////
        if(isset($_POST['NUMOFFlats'])){
            if($_POST['NUMOFFlats']!="Salah"){
                $this->ViewAdd->setNUMOFFlats($_POST['NUMOFFlats']);
            }
        }
        if(isset($_POST['Fix'])){
            if($_POST['Fix']!="Salah"){
                $this->ViewAdd->setFix($_POST['Fix']);
            }
        }
        ////////////////////////////////////////////////
        if(isset($_POST['EditID'])){
            if($_POST['EditID']!="Salah"){
                $this->ViewAdd->setEditID($_POST['EditID']);
            }
        }
        
        return ($this->ViewAdd->Add());
        }
        if(!empty($_FILES['files']['name'])){
            $countfiles = count($_FILES['files']['name']);

            // Upload Location
            $upload_location = IMAGEROOT;
            
            // To store uploaded files path
            $files_arr = array();
            
            // Loop all files
            // for($index = 0;$index < $countfiles;$index++){
                $counter="0";
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
                         if($counter=="0"){
                            $this->ViewAdd->OneImages($filename);
                            $counter="1";
                         }
                         $this->ViewAdd->UploadImages($filename);
                     }
                    }
                  }else{
                      echo "<div class='text-center fixed-top' style='margin-top:30px;'><button class='btn btn-danger' id='Db' style='width:50%'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> واحدة من الصور ليست بصورة لذا تم رفضها</button></div>";
                  }
               }
            }
            
        }
        if(isset($_POST['codeInput'])){
            $this->ViewAdd->setcodeInput($_POST['codeInput']);
            return ($this->ViewAdd->CheckCode()); 
        }
        if(isset($_POST['IDForImages'])){
            $this->ViewAdd->DeleteImages($_POST['IDForImages']);
            return "Da5l Controller";
        }
       


    
}



public function Edit() {
    $this->ViewEdit = new ViewEditModel;

    if(isset($_POST['FireAJAX'])){
        $this->ViewEdit->setID($_POST['FireAJAX']);
        return ($this->ViewEdit->ShowEdit());
    }
    if(isset($_POST['codeInput'])){
        return ($this->ViewEdit->CheckCodeEdit($_POST['OldCode'],$_POST['codeInput']));
    }
    if(!empty($_FILES['files']['name'])){
        $countfiles = count($_FILES['files']['name']);
        $counter="0";
        // Upload Location
        $upload_location = IMAGEROOT;
        
        // To store uploaded files path
        $files_arr = array();
        
        // Loop all files
        // for($index = 0;$index < $countfiles;$index++){
        for($index = 0;$index <= 20 ;$index++){
        
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

                    if($counter=="0"){
                        $this->ViewEdit->OneImages($filename, $_POST['YASSER']);
                        $counter="1";
                     }
                     $this->ViewEdit->UploadImagesEdit($filename, $_POST['YASSER']);
                 }
                }
              }else{
                  return "<div class='text-center fixed-top' style='margin-top:30px;'><button class='btn btn-danger' id='Db' style='width:50%'><i class='fa fa-exclamation-triangle' aria-hidden='true'></i> واحدة من الصور ليست بصورة لذا تم رفضها</button></div>";
              }
           }
        }
        
    }
        
        
    
}


}


