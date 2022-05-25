<?php
require_once 'WishListModel.php';

class Client 
{
    public $WishList;
    

    public function WishList() {
        $this->WishList = new WishListModel;
        if(isset($_POST['work'])){
            return ($this->WishList->WishListCard());
        }else if(isset($_POST['WishListValue'])){
            $this->WishList->setID($_POST['CardID']);
            return ($this->WishList->AddToWishlist($_POST['WishListValue']));
        }

    }

   

}