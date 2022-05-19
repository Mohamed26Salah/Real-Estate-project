<?php
require_once 'DashBoardModel.php';
require_once 'viewItemModel.php';
class AdminModel 
{
    public $DashBoard;
    public $ViewItem;
    public function __construct(){
        $this->DashBoard = new DashboardModel;
        //By team Salah...   WAAAAAH and yonos and joex and speed and yasser fe el2a5r
       
    }
    
  public function DashBoard() {
      return($this->DashBoard->Listusers());
      //By team Salah...   WAAAAAH and yonos and joex and speed and yasser fe el2a5r
  }
  public function viewItem() {
    $this->ViewItem = new viewItemModel;
    //By team Salah...   WAAAAAH and yonos and joex and speed and yasser fe el2a5r
    $this->ViewItem->setID($_POST['CardID']);
    //By team Salah...   WAAAAAH and yonos and joex and speed and yasser fe el2a5r
    return($this->ViewItem->AddToWishlist($_POST['WishListValue']));
    //By team Salah...   WAAAAAH and yonos and joex and speed and yasser fe el2a5r
   
}
}


