<?php
require_once 'UserModel.php';
class viewItemModel extends model
{
    protected $area;
    protected $price1;
    protected $price2;
    protected $Payment;
    protected $contarctType;
    protected $Finishing;
    protected $Bathroom;
    protected $Rooms;
    protected $HighLow;
    protected $Search;
    protected $checkBox;
    protected $Show;
    protected $ButtonShow;
    protected $ID;
    protected $visibleAll;
    protected $WishListValue;
    protected $Floor;

    public function getFloor()
    {
        return $this->Floor;
    }
    public function setFloor($Floor)
    {
        $this->Floor = $Floor;
    }

    public function getArea()
    {
        return $this->area;
    }
  
    public function setArea($area)
    {
        $this->area = $area;
    }
    public function getprice1()
    {
        return $this->price1;
    }
  
    public function setprice1($price1)
    {
        $this->price1 = $price1;
    }
    public function getprice2()
    {
        return $this->price2;
    }
    public function setprice2($price2)
    {
        $this->price2 = $price2;
    }
    public function getPayment()
    {
        return $this->Payment;
    }
  
    public function setPayment($Payment)
    {
        $this->Payment = $Payment;
    }
    public function getcontarctType()
    {
        return $this->contarctType;
    }
  
    public function setcontarctType($contarctType)
    {
        $this->contarctType = $contarctType;
    }
    public function getBathroom()
    {
        return $this->Bathroom;
    }
  
    public function setBathroom($Bathroom)
    {
        $this->Bathroom = $Bathroom;
    }
    public function getRooms()
    {
        return $this->Rooms;
    }
  
    public function setRooms($Rooms)
    {
        $this->Rooms = $Rooms;
    }
    public function getFinishing()
    {
        return $this->Finishing;
    }
  
    public function setFinishing($Finishing)
    {
        $this->Finishing = $Finishing;
    }
    public function getHighLow()
    {
        return $this->HighLow;
    }
  
    public function setHighLow($HighLow)
    {
        $this->HighLow = $HighLow;
    }
    public function getSearch()
    {
        return $this->Search;
    }
  
    public function setSearch($Search)
    {
        $this->Search = $Search;
    }
    public function getcheckBox()
    {
        return $this->checkBox;
    }
  
    public function setcheckBox($checkBox)
    {
        $this->checkBox = $checkBox;
    }
    public function getShow()
    {
        return $this->Show;
    }
    public function setShow($Show)
    {
        $this->Show = $Show;
    }

    public function getFurnished()
    {
        return $this->Furnished;
    }
    public function setFurnished($Furnished)
    {
        $this->Furnished = $Furnished;
    }

    public function getButtonShow()
    {
        return $this->ButtonShow;
    }
    public function setButtonShow($ButtonShow)
    {
        $this->ButtonShow = $ButtonShow;
    }
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
    public function button(){
        $Change=0;
       if($this->ButtonShow=="on"){
        $Change=2;
        // $this->visibleAll="off";
       }else if($this->ButtonShow=="off"){
        $Change=1;
        // $this->visibleAll="on";
       }
       $VarID=$this->ID;
      
       $QUERY= "UPDATE `allestate` SET `Visible`=$Change WHERE ID=$VarID";
       $this->dbh->query($QUERY);
       $this->dbh->execute();
       return $Change;
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
    function card($imgroot,$PriceArray,$AreaArray,$PaymentArray,$NameArray,$DescriptionArray,$offeredArray,$BathroomArray,$RoomsArray,$FinishingArrayString,$CodeArray,$AddressArray,$VisibleArray,$Checked,$IDArray,$WishList,$WishListString, $FurnishedArrayString,$FloorArray,$Image){
        $output2='';
        $approot = URLROOT . 'pages/viewDescription';
        $output2=<<<EOT
        
            <div class="containerFilter">
            <a href="$approot?ID=$IDArray"><img src="$imgroot$Image" width="350px" height="238px"> </a>
            <div class="title">
            <div class="switchAll" style = "margin-left:70%; margin-bottom:-5%; margin:top:-5%;">
            
            <input onclick="salah($IDArray)" id="buttonClick$IDArray" class="toggle" $Checked type="checkbox" value=$VisibleArray />
            
            </div>
            <strong style="font-size:20px;font-weight: bold; ">$PriceArray EGP</strong>
            <a href="$approot?code=$CodeArray"> <h2 style="font-family: Open Sans, sans-serif; color: #403b45; font-weight: bold;font-size:16px; margin-top: 1.5%; ">$NameArray</h2></a>
            <div style="font-family: Open Sans, sans-serif; color: #403b45;font-weight: bold; font-size:16px;margin-top: 1%;">FLATS <i class="fa fa-bed fa-lg" aria-hidden="true"style="margin-left:10px;font-weight: bold;"> $RoomsArray </i><i class="fa fa-bath fa-lg" aria-hidden="true" style="margin-left:10px;margin-right:10px;font-weight: bold;"> $BathroomArray </i> 
            $AreaArray sqm
            </div>
            <div style="font-family: Open Sans, sans-serif; color: #403b45; font-size:16px;margin-top: 1%;"><i class="fa-solid fa-paint-roller" style="color:green;"></i> $FinishingArrayString 
            <i class="fa-solid fa-sack-dollar" style="margin-left:10px; color:green;"></i> $PaymentArray </div>
            <div style="font-family: Open Sans, sans-serif; color: #403b45; font-size:16px;margin-top: 1%;"><i class="fa-solid fa-couch" style = "color:blue;"> $FurnishedArrayString </i>  <i class="fa-solid fa-arrow-right-to-city" style="margin-left:10px; color:purple;"> $FloorArray</i> </div>
            <div style="font-family: Open Sans, sans-serif; color: #403b45; font-size:18px;margin-top: 1%;">$offeredArray</div>
            <div class="solo" style="font-family: Open Sans, sans-serif; color: #403b45; font-size:18px;margin-top: 1%;margin-bottom: 1.5%; font-weight: 600;"><i class="fa fa-map-marker" aria-hidden="true" style="color:green;"></i> $AddressArray </div>
            <div class="switchAll" >
            <button onclick="WishList($IDArray)" class="buttonWishList" value = $WishList id="button$IDArray" style="background-color:$WishList" ><span id="Span$IDArray"> $WishListString </span></button>

            </div>

            
            <div style="font-size:25px;margin-left: 70%; margin-top:-7.2%;"> Code: <span style="color:red;">$CodeArray</span></div>
            
            
        </div>
        </div>
        <br>
       
        EOT;
        
        return $output2;
    }
    function ifCondition($UltimateJoinRoom,$UltimateJoinBathroom,$UltimateJoinFinishing,$UltimateJoinFurnished,$UltimateJoinFloor,$RoomsArray,$BathroomArray,$FinishingArray,$FurnishedArray,$FloorArray,$UltimateIF,$ultimateIFCondition){
        $UltimateIF=false;
    if($UltimateJoinRoom!="empty" || $UltimateJoinBathroom!="empty" || $UltimateJoinFurnished!="empty" || $UltimateJoinFinishing!="empty"|| $UltimateJoinFloor!="empty"){
        $UltimateIF=true;
        if ($UltimateJoinBathroom=="empty") {
            $UltimateJoinBathroom=$BathroomArray;
        }
        if ($UltimateJoinRoom=="empty") {
            $UltimateJoinRoom=$RoomsArray;
        }
        if ($UltimateJoinFurnished=="empty") {
            $UltimateJoinFurnished=$FurnishedArray;
        }
        if ($UltimateJoinFinishing=="empty") {
            $UltimateJoinFinishing=$FinishingArray;
        }
        if ($UltimateJoinFloor=="empty") {
            $UltimateJoinFloor=$FloorArray;
        }
        if($UltimateJoinBathroom==$BathroomArray&&$UltimateJoinRoom==$RoomsArray&&$UltimateJoinFurnished==$FurnishedArray&&$UltimateJoinFinishing==$FinishingArray&&$UltimateJoinFloor==$FloorArray){
        //  $UltimateIF=true;
         $ultimateIFCondition="NotEmpty";
        }

    }
  
        return array($UltimateIF,$ultimateIFCondition);
    }
    public function getFirstImage($ID){
        // echo($ID);
        $this->dbh->query("SELECT `Image` FROM `allestateimages` WHERE allestateID = ".$ID." Limit 1") ;
        $ALLRECORDS = $this->dbh->single();
        // echo($ALLRECORDS->Image);
        if(!empty($ALLRECORDS)){
            return $ALLRECORDS->Image;
        }else{
            return "no-image.png";
        }
        
    }
    public function Sort($offset, $no_of_records_per_page)
    {
        //SELECT * FROM `allestate` WHERE Area >= 300 AND Area < 400 
        
        $AllSort="TypeID=1 AND ";
        $join=" AS allestate, eav AS eav ";
        $AllJoin="AND eav.AllID = allestate.ID";
        $UltimateJoin="";
        $Search="";
        $SearchAll=" GROUP BY allestate.ID";
        $SuperUltimateJoin="";
        $UltimateJoinBathroom="";
        $UltimateJoinRoom="";
        $UltimateJoinFinishing="";
        $UltimateJoinFurnished="";
        $UltimateIF="";
        $ultimateIFCondition="";
        $UltimateJoinFloor="";
        if(!empty($this->area)){
            
          if($this->area==400){
            $AllSort.="Area >= ".$this->area;
            $AllSort.=" AND ";
          }
          else{
            $AllSort.="Area >= ".$this->area." AND Area <".$this->area+100;
            $AllSort.=" AND ";
          }
          
        }
        if(!empty($this->price1)){
          $AllSort.="Price >= ".$this->price1;
          $AllSort.=" AND ";
        }
        if(!empty($this->price2)){
            $AllSort.="Price <= ".$this->price2;
            $AllSort.=" AND ";
          }
        if(!empty($this->Payment)){
            $AllSort.="`PaymentMethod` = '".$this->Payment."'";
            $AllSort.=" AND ";
        }
        if(!empty($this->contarctType)){
            $AllSort.="offered = ".$this->contarctType;
            $AllSort.=" AND ";
        }
        if(!empty($this->Finishing)){
            // $UltimateJoin.=" AND ";
            // $UltimateJoin.="eav.AtrributeID = 2 AND eav.Value=".$this->Finishing;
            $UltimateJoinFinishing=$this->Finishing;
        }else{
            $UltimateJoinFinishing="empty";
        }
        ////////////////////////////////////////////////////////
        if(!empty($this->Furnished)){
            $UltimateJoinFurnished=$this->Furnished;
        }else{
            $UltimateJoinFurnished="empty";
        }
        ////////////////////////////////////////////////////////
        if(!empty($this->Rooms)){
            // $UltimateJoin.=" AND ";
            // $UltimateJoin.="eav.AtrributeID = 3 AND eav.Value=".$this->Rooms;
            $UltimateJoinRoom=$this->Rooms;
        }else{
            $UltimateJoinRoom="empty";
        }
        if(!empty($this->Bathroom)){
            // $UltimateJoin.=" AND ";
            // $UltimateJoin.="eav.AtrributeID = 4 AND eav.Value=".$this->Bathroom;
            $UltimateJoinBathroom=$this->Bathroom;
        }else{
            $UltimateJoinBathroom="empty";
        }
        if(!empty($this->Floor)){
            $UltimateJoinFloor=$this->Floor;
        }else{
            $UltimateJoinFloor="empty";
        }
        if(!empty($this->HighLow)){
            if($this->HighLow==1){
                $SuperUltimateJoin=" ORDER BY Price DESC ";
            }else{
                $SuperUltimateJoin=" ORDER BY Price ASC ";
            }
            
        }
        if(!empty($this->Show)){
            $AllSort.="Visible = ".$this->Show;
            $AllSort.=" AND ";
        }else{
            
        }
      
        if(!empty($this->Search)){
            $Search=" AND (allestate.AddressUser LIKE '%".$this->Search."%'
            OR allestate.Area LIKE '%".$this->Search."%'
            OR allestate.Price LIKE '%".$this->Search."%'
            OR allestate.PaymentMethod LIKE '%".$this->Search."%'
            OR allestate.DescriptionUser LIKE '%".$this->Search."%'
            OR allestate.Name LIKE '%".$this->Search."%'
            OR allestate.Code LIKE '%".$this->Search."%'
            )";
        }
 
        
        $AllSort=substr_replace($AllSort ,"", -4);
        // $UltimateJoin=substr_replace($UltimateJoin ,"", -4);
        if(empty($AllSort)){
            $AllSort="1";
        }
        // $QUERY= "SELECT * FROM `allestate`".$join."WHERE ".$AllSort.$AllJoin.$UltimateJoin.$Search.$SearchAll.$SuperUltimateJoin." LIMIT $offset, $no_of_records_per_page";

        $QUERY= "SELECT * FROM `allestate`".$join."WHERE ".$AllSort.$AllJoin.$Search.$SuperUltimateJoin." LIMIT $offset, $no_of_records_per_page";
        // echo $QUERY;
        $this->dbh->query($QUERY);
        $ALLRECORDS = $this->dbh->resultSet();
        if(empty($ALLRECORDS)){
            return "<h1No results found";
        }
        $output='';
        $input=array();
        $counter=0;
        $oneTime=0;
        $Counter2=0;
        $Checked="";
        foreach ($ALLRECORDS as $Item) {
            
            $Counter2+=1;
            if($oneTime==0){
                array_push($input,(array("$Item->ID","$Item->AddressUser","$Item->Area","$Item->Price","$Item->PaymentMethod","$Item->DescriptionUser","$Item->Name","$Item->Visible","$Item->Code","$Item->offered","$Item->AtrributeID","$Item->Value")));
                $oneTime+=1;
                continue;
            }
            
            if($input[$counter][0]==$Item->ID){
                // echo "ttabk ";
                array_push($input[$counter], "$Item->AtrributeID", "$Item->Value");
                // echo("Number OF records".count($ALLRECORDS));
                if($Counter2==count($ALLRECORDS)){
                    $imgroot = IMAGEROOT3;
                    // $ImageArray=$input[$counter][10];
                    // $PriceArray=$input[$counter][3];
                    $PriceArray=number_format($input[$counter][3]);
                    $AddressArray=$input[$counter][1];
                    $NameArray=$input[$counter][6];
                    $DescriptionArray=$input[$counter][5];
                    $VisibleArray=$input[$counter][7];
                    $IDArray=$input[$counter][0];
                    $CodeArray=$input[$counter][8];
                    $AreaArray=$input[$counter][2];
                    $PaymentArray=$input[$counter][4];
                    $FinishingArray="";
                    $FurnishedArray="";
                    $Image=$this->getFirstImage($IDArray);
                    if($input[$counter][9]==1){
                        $offeredArray="Selling";
                    }else{
                        $offeredArray="Rent";
                    }
                    if(!empty($input[$counter][10])){
                        if($input[$counter][10]==4){
                            $BathroomArray=$input[$counter][11];
                        }
                        else if($input[$counter][10]==3){
                            $RoomsArray=$input[$counter][11];
                        }
                        else if($input[$counter][10]==2){
                            $FinishingArray=$input[$counter][11];
                        }
                        else if($input[$counter][10]==9){
                            $FurnishedArray=$input[$counter][11];
                        }else if($input[$counter][10]==1){
                            $FloorArray=$input[$counter][11];
                        }
                    }
                    if(!empty($input[$counter][12])){
                        if($input[$counter][12]==4){
                            $BathroomArray=$input[$counter][13];
                        }
                        else if($input[$counter][12]==3){
                            $RoomsArray=$input[$counter][13];
                        }
                        else if($input[$counter][12]==2){
                            $FinishingArray=$input[$counter][13];
                        }
                        else if($input[$counter][12]==9){
                            $FurnishedArray=$input[$counter][13];
                        }
                        else if($input[$counter][12]==1){
                            $FloorArray=$input[$counter][13];
                        }
                 
                    }
                    if(!empty($input[$counter][14])){
                        if($input[$counter][14]==4){
                            $BathroomArray=$input[$counter][15];
                        }
                        else if($input[$counter][14]==3){
                            $RoomsArray=$input[$counter][15];
                        }
                        else if($input[$counter][14]==2){
                            $FinishingArray=$input[$counter][15];
                        }
                        else if($input[$counter][14]==9){
                            $FurnishedArray=$input[$counter][15];
                        }
                        else if($input[$counter][14]==1){
                            $FloorArray=$input[$counter][15];
                        }
                      
                    }
                    if(!empty($input[$counter][16])){
                        if($input[$counter][16]==4){
                            $BathroomArray=$input[$counter][17];
                        }
                        else if($input[$counter][16]==3){
                            $RoomsArray=$input[$counter][17];
                        }
                        else if($input[$counter][16]==2){
                            $FinishingArray=$input[$counter][17];
                            // echo $FinishingArray;
                        }
                        else if($input[$counter][16]==9){
                            $FurnishedArray=$input[$counter][17];
                        }
                        else if($input[$counter][16]==1){
                            $FloorArray=$input[$counter][17];
                        }
                    }
                    if(!empty($input[$counter][18])){
                        if($input[$counter][18]==4){
                            $BathroomArray=$input[$counter][19];
                        }
                        else if($input[$counter][18]==3){
                            $RoomsArray=$input[$counter][19];
                        }
                        else if($input[$counter][18]==2){
                            $FinishingArray=$input[$counter][19];
                            // echo $FinishingArray;
                        }
                        else if($input[$counter][18]==9){
                            $FurnishedArray=$input[$counter][19];
                        }
                        else if($input[$counter][18]==1){
                            $FloorArray=$input[$counter][19];
                        }
                    }
                    if($FurnishedArray==1){
                        $FurnishedArrayString="مفروشة";
                    }else{
                        $FurnishedArrayString="ليست مفروشة";
                    }
                    if($FinishingArray==1){
                        $FinishingArrayString="متشطب";
                    }else if($FinishingArray==2){
                        $FinishingArrayString="نص نشطيب";
                    }else if($FinishingArray==3){
                        $FinishingArrayString="مش مشتطبة ";
                    }
                    if($VisibleArray==1){
                        $VisibleArray="on";
                        $Checked="checked";
                        // $this->visibleAll="on";
                        
                    }else{
                        $VisibleArray="off";
                        $Checked="";
                        // $this->visibleAll="off";
                    }
                    if($this->wishlist($IDArray)==true){
                        $WishList="green";
                        $WishListString="Saved";
                    }else{
                        $WishList="red";
                        $WishListString="Add to WishList";
                    }
                    list($UltimateIF,$ultimateIFCondition)=$this->ifCondition($UltimateJoinRoom,$UltimateJoinBathroom,$UltimateJoinFinishing,$UltimateJoinFurnished,$UltimateJoinFloor,$RoomsArray,$BathroomArray,$FinishingArray,$FurnishedArray,$FloorArray,$UltimateIF,$ultimateIFCondition);
                   //it was here
                // echo($ultimateIFCondition);
                
         if($UltimateIF!=true){  
                        $output.= $this->card($imgroot,$PriceArray,$AreaArray,$PaymentArray,$NameArray,$DescriptionArray,$offeredArray,$BathroomArray,$RoomsArray,$FinishingArrayString,$CodeArray,$AddressArray,$VisibleArray,$Checked,$IDArray,$WishList,$WishListString, $FurnishedArrayString,$FloorArray,$Image);
          }else{
            if($ultimateIFCondition=="NotEmpty"){
                // if($UltimateIF){
                $output.= $this->card($imgroot,$PriceArray,$AreaArray,$PaymentArray,$NameArray,$DescriptionArray,$offeredArray,$BathroomArray,$RoomsArray,$FinishingArrayString,$CodeArray,$AddressArray,$VisibleArray,$Checked,$IDArray,$WishList,$WishListString, $FurnishedArrayString,$FloorArray,$Image);
                // }
                
            }
          }
      
                }
                
                
                $ultimateIFCondition="Speed";
            }else{
                /////////////////////////////////////////////////////////////////////////////////////////////////////
                $imgroot = IMAGEROOT3;
                // $ImageArray=$input[$counter][10];
                $PriceArray=number_format($input[$counter][3]);
                $AddressArray=$input[$counter][1];
                $NameArray=$input[$counter][6];
                $DescriptionArray=$input[$counter][5];
                $VisibleArray=$input[$counter][7];
                $IDArray=$input[$counter][0];
                $CodeArray=$input[$counter][8];
                $AreaArray=$input[$counter][2];
                $PaymentArray=$input[$counter][4];
                $FinishingArray="";
                $FurnishedArray="";
                $WishList="";
                $WishListString="";
                $Image=$this->getFirstImage($IDArray);
                if($input[$counter][9]==1){
                    $offeredArray="Selling";
                }else{
                    $offeredArray="Rent";
                }
                if(!empty($input[$counter][10])){
                    if($input[$counter][10]==4){
                        $BathroomArray=$input[$counter][11];
                    }
                    else if($input[$counter][10]==3){
                        $RoomsArray=$input[$counter][11];
                    }
                    else if($input[$counter][10]==2){
                        $FinishingArray=$input[$counter][11];
                    }
                    else if($input[$counter][10]==9){
                        $FurnishedArray=$input[$counter][11];
                    }else if($input[$counter][10]==1){
                        $FloorArray=$input[$counter][11];
                    }
                }
                if(!empty($input[$counter][12])){
                    if($input[$counter][12]==4){
                        $BathroomArray=$input[$counter][13];
                    }
                    else if($input[$counter][12]==3){
                        $RoomsArray=$input[$counter][13];
                    }
                    else if($input[$counter][12]==2){
                        $FinishingArray=$input[$counter][13];
                    }
                    else if($input[$counter][12]==9){
                        $FurnishedArray=$input[$counter][13];
                    }
                    else if($input[$counter][12]==1){
                        $FloorArray=$input[$counter][13];
                    }
             
                }
                if(!empty($input[$counter][14])){
                    if($input[$counter][14]==4){
                        $BathroomArray=$input[$counter][15];
                    }
                    else if($input[$counter][14]==3){
                        $RoomsArray=$input[$counter][15];
                    }
                    else if($input[$counter][14]==2){
                        $FinishingArray=$input[$counter][15];
                    }
                    else if($input[$counter][14]==9){
                        $FurnishedArray=$input[$counter][15];
                    }
                    else if($input[$counter][14]==1){
                        $FloorArray=$input[$counter][15];
                    }
                  
                }
                if(!empty($input[$counter][16])){
                    if($input[$counter][16]==4){
                        $BathroomArray=$input[$counter][17];
                    }
                    else if($input[$counter][16]==3){
                        $RoomsArray=$input[$counter][17];
                    }
                    else if($input[$counter][16]==2){
                        $FinishingArray=$input[$counter][17];
                        // echo $FinishingArray;
                    }
                    else if($input[$counter][16]==9){
                        $FurnishedArray=$input[$counter][17];
                    }
                    else if($input[$counter][16]==1){
                        $FloorArray=$input[$counter][17];
                    }
                }
                if(!empty($input[$counter][18])){
                    if($input[$counter][18]==4){
                        $BathroomArray=$input[$counter][19];
                    }
                    else if($input[$counter][18]==3){
                        $RoomsArray=$input[$counter][19];
                    }
                    else if($input[$counter][18]==2){
                        $FinishingArray=$input[$counter][19];
                        // echo $FinishingArray;
                    }
                    else if($input[$counter][18]==9){
                        $FurnishedArray=$input[$counter][19];
                    }
                    else if($input[$counter][18]==1){
                        $FloorArray=$input[$counter][19];
                    }
                }
                if($FurnishedArray==1){
                    $FurnishedArrayString="مفروشة";
                }else{
                    $FurnishedArrayString="ليست مفروشة";
                }
                if($FinishingArray==1){
                    $FinishingArrayString="متشطب";
                }else if($FinishingArray==2){
                    $FinishingArrayString="نص تشطيب";
                }else if($FinishingArray==3){
                    $FinishingArrayString="مش متشطبة ";
                }
                if($VisibleArray==1){
                    $VisibleArray="on";
                    $Checked="checked";
                    // $this->visibleAll="on";
                }else{
                    $VisibleArray="off";
                    $Checked="";
                    // $this->visibleAll="off";
                }
                if($this->wishlist($IDArray)==true){
                    $WishList="green";
                    $WishListString="Saved";
                }else{
                    $WishList="red";
                    $WishListString="Add to WishList <i class='fa fa-heart' aria-hidden='true'></i>";
                }
               
                //Bl3b fe IF 
                list($UltimateIF,$ultimateIFCondition)=$this->ifCondition($UltimateJoinRoom,$UltimateJoinBathroom,$UltimateJoinFinishing,$UltimateJoinFurnished,$UltimateJoinFloor,$RoomsArray,$BathroomArray,$FinishingArray,$FurnishedArray,$FloorArray,$UltimateIF,$ultimateIFCondition);
                //it also was here

               
                if($UltimateIF!=true){  
                    $output.= $this->card($imgroot,$PriceArray,$AreaArray,$PaymentArray,$NameArray,$DescriptionArray,$offeredArray,$BathroomArray,$RoomsArray,$FinishingArrayString,$CodeArray,$AddressArray,$VisibleArray,$Checked,$IDArray,$WishList,$WishListString, $FurnishedArrayString,$FloorArray,$Image);
                }else{
                    if($ultimateIFCondition=="NotEmpty"){
                        // if($UltimateIF){
                        $output.= $this->card($imgroot,$PriceArray,$AreaArray,$PaymentArray,$NameArray,$DescriptionArray,$offeredArray,$BathroomArray,$RoomsArray,$FinishingArrayString,$CodeArray,$AddressArray,$VisibleArray,$Checked,$IDArray,$WishList,$WishListString, $FurnishedArrayString,$FloorArray,$Image);
                        // }
                        
                    }
                }
            
                
                array_push($input,(array("$Item->ID","$Item->AddressUser","$Item->Area","$Item->Price","$Item->PaymentMethod","$Item->DescriptionUser","$Item->Name","$Item->Visible","$Item->Code","$Item->offered","$Item->AtrributeID","$Item->Value")));
                unset($input[$counter]);
              
                $counter+=1;
              
               
            }
          
            $ultimateIFCondition="Speed";
          }
         return $output;
     
    }

     public function GetCount()
     {
         $this->dbh->query("SELECT COUNT(*) as TD FROM `rents`");
 
         $ALLRECORDS = $this->dbh->single();
 
         return $ALLRECORDS;
     }
   
     
}

