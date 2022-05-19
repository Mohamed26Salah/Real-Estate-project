<?php
class WishListModel extends model
{
    protected $ID;
    protected $visibleAll;
    protected $WishListValue;
    
    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
    }
    public function getvisibleAll()
    {
        return $this->visibleAll;
    }
    public function setvisibleAll($visibleAll)
    {
        $this->visibleAll = $visibleAll;
    }
    public function getWishListValue()
    {
        return $this->WishListValue;
    }
    public function setWishListValue($WishListValue)
    {
        $this->WishListValue = $WishListValue;
    }
 
 //Check wishlist for each card
 function wishlist($IDArray){
     if(!empty($_SESSION['user_id'])){
         $QUERY= "SELECT * FROM `wishlist` WHERE AllID = $IDArray AND UserID='".$_SESSION['user_id']."' ";
         $this->dbh->query($QUERY);
         if(empty($this->dbh->single())){
            return false;
         }else{
             return true;
         }
     }else{
         return false;
     }
    
 }
 public function AddToWishlist($WishListValue){
 if(!empty($_SESSION['user_id'])){
     if($WishListValue=="green"){
         $IDSalah=$this->ID;
         $this->dbh->query("DELETE FROM `wishlist` WHERE AllID = $IDSalah AND `UserID`='".$_SESSION['user_id']."'");
         return $this->dbh->execute();
     }else if($WishListValue=="red"){
         $this->dbh->query("INSERT INTO `wishlist`(`UserID`, `AllID`) VALUES (:UIDD, :UALLID)");
         $this->dbh->bind(':UIDD', $_SESSION['user_id']);
         $this->dbh->bind(':UALLID', $this->ID);
         return $this->dbh->execute();
     }
 }else{
   return "denied";
 }
 }

 function card($imgroot,$Price,$Area,$PaymentMethod,$Name,$DescriptionUser,$offered,$Code,$AdressUser,$ID,$WishList,$WishListString,$image){
     $output2='';
     $output2=<<<EOT
         <div class="containerFilter" style="margin-left:25%;margin-right:25%;margin-top:1%;">
         <img src="$imgroot$image" width="350px" height="240px">
         <div class="title" style="margin-top:2%;">
         
         <strong style="font-size:20px;font-weight: bold; ">$Price EGP</strong>
         <h2 style="font-family: Open Sans, sans-serif; color: #403b45;font-weight: bold; font-size:16px; margin-top: 1.5%; ">$Name</h2>
         <div style="font-family: Open Sans, sans-serif; color: #403b45;font-weight: bold; font-size:16px;margin-top: 1%;">FLATS <i class="fa fa-bed fa-lg" aria-hidden="true"style="margin-left:10px;font-weight: bold;"> </i><i class="fa fa-bath fa-lg" aria-hidden="true" style="margin-left:10px;margin-right:10px;font-weight: bold;"></i> 
            $Area sqm
            </div>
         <div style="font-family: Open Sans, sans-serif; color: #403b45; font-size:16px;margin-top: 1%;"><i class="fa-solid fa-paint-roller" style="color:green;"></i>
         <i class="fa-solid fa-sack-dollar" style="margin-left:10px; color:green;"></i> $PaymentMethod </div><br>
         <div style="font-family: Open Sans, sans-serif; color: #403b45; font-size:18px;margin-top: 1%;">$offered</div>
         <div class="solo" style="font-family: Open Sans, sans-serif; color: #403b45; font-size:18px;margin-top: 1%;margin-bottom: 1.5%; font-weight: 600;"><i class="fa fa-map-marker" aria-hidden="true" style="color:green;">$AdressUser</i></div>
         <div class="switchAll" >
         
         <button onclick="WishList($ID)" class="buttonWishList" value = $WishList id="button$ID" style="background-color:$WishList" ><span id="Span$ID"> $WishListString </span></button>

         </div>

         
         <div style="font-size:25px;margin-left: 70%; margin-top:-7.2%;"> Code: <span style="color:red;">$Code</span></div>
         
         
     </div>
     </div>
     <br>
     EOT;
     
     return $output2;
 }
 
 public function WishListCard()
 {
    $output="";
    $this->dbh->query("SELECT * FROM `allestate`");
    $records = $this->dbh->resultSet();
    foreach($records as $Card) {
      if($this->wishlist($Card->ID)){
        $imgroot = IMAGEROOT3;
            $WishList="green";
            $WishListString="Saved";
        $output.= $this->card($imgroot,$Card->Price,$Card->Area,$Card->PaymentMethod,$Card->Name,$Card->DescriptionUser,$Card->offered,$Card->Code,$Card->AddressUser,$Card->ID,$WishList,$WishListString,$Card->image);
      }
    }
  
      return $output;
  
 }



  
}


