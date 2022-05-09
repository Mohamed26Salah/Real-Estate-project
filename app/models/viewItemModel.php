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
    function card($imgroot,$ImageArray,$PriceArray,$AreaArray,$PaymentArray,$NameArray,$DescriptionArray,$offeredArray,$BathroomArray,$RoomsArray,$FinishingArrayString,$CodeArray,$AddressArray,$VisibleArray,$Checked,$IDArray,$WishList,$WishListString){
        $output2='';
        $approot = URLROOT . 'pages/viewDescription';
        $output2=<<<EOT
        
            <div class="containerFilter">
            <a href="$approot?code=$CodeArray"><img src="$imgroot$ImageArray" width="350px" height="240px"> </a>
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
            <i class="fa-solid fa-sack-dollar" style="margin-left:10px; color:green;"></i> $PaymentArray </div><br>
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
    function ifCondition($UltimateJoinRoom,$UltimateJoinBathroom,$UltimateJoinFinishing,$RoomsArray,$BathroomArray,$FinishingArray,$UltimateIF,$ultimateIFCondition){
        if($UltimateJoinRoom!="empty"&&$UltimateJoinBathroom=="empty"&&$UltimateJoinFinishing=="empty"){
            $UltimateIF=$UltimateJoinRoom==$RoomsArray;
            $ultimateIFCondition="NotEmpty";
        }
        if($UltimateJoinRoom=="empty"&&$UltimateJoinBathroom!="empty"&&$UltimateJoinFinishing=="empty"){
            $UltimateIF=$UltimateJoinBathroom==$BathroomArray;
            $ultimateIFCondition="NotEmpty";
        }
        if($UltimateJoinRoom=="empty"&&$UltimateJoinBathroom=="empty"&&$UltimateJoinFinishing!="empty"){
            $UltimateIF=$UltimateJoinFinishing==$FinishingArray;
            $ultimateIFCondition="NotEmpty";
        }
        if($UltimateJoinRoom!="empty"&&$UltimateJoinBathroom!="empty"&&$UltimateJoinFinishing=="empty"){
            $UltimateIF=$UltimateJoinRoom==$RoomsArray&& $UltimateJoinBathroom==$BathroomArray;
            $ultimateIFCondition="NotEmpty";
        }
        if($UltimateJoinRoom=="empty"&&$UltimateJoinBathroom!="empty"&&$UltimateJoinFinishing!="empty"){
            $UltimateIF=$UltimateJoinFinishing==$FinishingArray&& $UltimateJoinBathroom==$BathroomArray;
            $ultimateIFCondition="NotEmpty";
        }
        if($UltimateJoinRoom!="empty"&&$UltimateJoinBathroom=="empty"&&$UltimateJoinFinishing!="empty"){
            $UltimateIF=$UltimateJoinRoom==$RoomsArray&& $UltimateJoinFinishing==$FinishingArray;
            $ultimateIFCondition="NotEmpty";
        }
        if($UltimateJoinRoom!="empty"&&$UltimateJoinBathroom!="empty"&&$UltimateJoinFinishing!="empty"){
            $UltimateIF=$UltimateJoinRoom==$RoomsArray&& $UltimateJoinBathroom==$BathroomArray && $UltimateJoinFinishing==$FinishingArray;
            $ultimateIFCondition="NotEmpty";
        }
        return array($UltimateIF,$ultimateIFCondition);
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
        $UltimateIF="";
        $ultimateIFCondition="";
        
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
                array_push($input,(array("$Item->ID","$Item->AddressUser","$Item->Area","$Item->Price","$Item->PaymentMethod","$Item->DescriptionUser","$Item->Name","$Item->Visible","$Item->Code","$Item->offered","$Item->image","$Item->AtrributeID","$Item->Value")));
                $oneTime+=1;
                continue;
            }
            
            if($input[$counter][0]==$Item->ID){
                // echo "ttabk ";
                array_push($input[$counter], "$Item->AtrributeID", "$Item->Value");
                // echo("Number OF records".count($ALLRECORDS));
                if($Counter2==count($ALLRECORDS)){
                    $imgroot = IMAGEROOT2;
                    $ImageArray=$input[$counter][10];
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
                    if($input[$counter][9]==1){
                        $offeredArray="Selling";
                    }else{
                        $offeredArray="Rent";
                    }
                    if(!empty($input[$counter][11])){
                        if($input[$counter][11]==4){
                            $BathroomArray=$input[$counter][12];
                        }
                        else if($input[$counter][11]==3){
                            $RoomsArray=$input[$counter][12];
                        }
                        else if($input[$counter][11]==2){
                            $FinishingArray=$input[$counter][12];
                        }
                    }
                    if(!empty($input[$counter][13])){
                        if($input[$counter][13]==4){
                            $BathroomArray=$input[$counter][14];
                        }
                        else if($input[$counter][13]==3){
                            $RoomsArray=$input[$counter][14];
                        }
                        else if($input[$counter][13]==2){
                            $FinishingArray=$input[$counter][14];
                        }
                 
                    }
                    if(!empty($input[$counter][15])){
                        if($input[$counter][15]==4){
                            $BathroomArray=$input[$counter][16];
                        }
                        else if($input[$counter][15]==3){
                            $RoomsArray=$input[$counter][16];
                        }
                        else if($input[$counter][15]==2){
                            $FinishingArray=$input[$counter][16];
                        }
                      
                    }
                    if($FinishingArray==1){
                        $FinishingArrayString="mtshtb";
                    }else{
                        $FinishingArrayString="Not mtshtb";
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
                    list($UltimateIF,$ultimateIFCondition)=$this->ifCondition($UltimateJoinRoom,$UltimateJoinBathroom,$UltimateJoinFinishing,$RoomsArray,$BathroomArray,$FinishingArray,$UltimateIF,$ultimateIFCondition);
                   //it was here
                    if($ultimateIFCondition!="NotEmpty"){  
                        $output.= $this->card($imgroot,$ImageArray,$PriceArray,$AreaArray,$PaymentArray,$NameArray,$DescriptionArray,$offeredArray,$BathroomArray,$RoomsArray,$FinishingArrayString,$CodeArray,$AddressArray,$VisibleArray,$Checked,$IDArray,$WishList,$WishListString);
          }
        if($ultimateIFCondition=="NotEmpty"){
            if($UltimateIF){
        
            
            $output.= $this->card($imgroot,$ImageArray,$PriceArray,$AreaArray,$PaymentArray,$NameArray,$DescriptionArray,$offeredArray,$BathroomArray,$RoomsArray,$FinishingArrayString,$CodeArray,$AddressArray,$VisibleArray,$Checked,$IDArray,$WishList,$WishListString);
            }
        }
                }
            }else{
                /////////////////////////////////////////////////////////////////////////////////////////////////////
                $imgroot = IMAGEROOT2;
                $ImageArray=$input[$counter][10];
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
                $WishList="";
                $WishListString="";
                if($input[$counter][9]==1){
                    $offeredArray="Selling";
                }else{
                    $offeredArray="Rent";
                }
                if(!empty($input[$counter][11])){
                    if($input[$counter][11]==4){
                        $BathroomArray=$input[$counter][12];
                    }
                    else if($input[$counter][11]==3){
                        $RoomsArray=$input[$counter][12];
                    }
                    else if($input[$counter][11]==2){
                        $FinishingArray=$input[$counter][12];
                        // echo $FinishingArray;
                    }
                }
                if(!empty($input[$counter][13])){
                    if($input[$counter][13]==4){
                        $BathroomArray=$input[$counter][14];
                    }
                    else if($input[$counter][13]==3){
                        $RoomsArray=$input[$counter][14];
                    }
                    else if($input[$counter][13]==2){
                        $FinishingArray=$input[$counter][14];
                        // echo $FinishingArray;
                    }
                }
                if(!empty($input[$counter][15])){
                    if($input[$counter][15]==4){
                        $BathroomArray=$input[$counter][16];
                    }
                    else if($input[$counter][15]==3){
                        $RoomsArray=$input[$counter][16];
                    }
                    else if($input[$counter][15]==2){
                        $FinishingArray=$input[$counter][16];
                        // echo $FinishingArray;
                    }
                }
                if($FinishingArray==1){
                    $FinishingArrayString="mtshtb";
                }else{
                    $FinishingArrayString="Not mtshtb";
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
                list($UltimateIF,$ultimateIFCondition)=$this->ifCondition($UltimateJoinRoom,$UltimateJoinBathroom,$UltimateJoinFinishing,$RoomsArray,$BathroomArray,$FinishingArray,$UltimateIF,$ultimateIFCondition);
                //it also was here

                
                
                if($ultimateIFCondition!="NotEmpty"){  
                    $output.= $this->card($imgroot,$ImageArray,$PriceArray,$AreaArray,$PaymentArray,$NameArray,$DescriptionArray,$offeredArray,$BathroomArray,$RoomsArray,$FinishingArrayString,$CodeArray,$AddressArray,$VisibleArray,$Checked,$IDArray,$WishList,$WishListString);
                }
                if($ultimateIFCondition=="NotEmpty"){
                    if($UltimateIF){

                    $output.= $this->card($imgroot,$ImageArray,$PriceArray,$AreaArray,$PaymentArray,$NameArray,$DescriptionArray,$offeredArray,$BathroomArray,$RoomsArray,$FinishingArrayString,$CodeArray,$AddressArray,$VisibleArray,$Checked,$IDArray,$WishList,$WishListString);
                    }
                }
            
                
                array_push($input,(array("$Item->ID","$Item->AddressUser","$Item->Area","$Item->Price","$Item->PaymentMethod","$Item->DescriptionUser","$Item->Name","$Item->Visible","$Item->Code","$Item->offered","$Item->image","$Item->AtrributeID","$Item->Value")));
                unset($input[$counter]);
              
                $counter+=1;
              
               
            }
          
           
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

