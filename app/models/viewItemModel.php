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
    
    function card($imgroot,$ImageArray,$PriceArray,$AreaArray,$PaymentArray,$NameArray,$DescriptionArray,$offeredArray,$BathroomArray,$RoomsArray,$FinishingArrayString,$CodeArray,$AddressArray,$VisibleArray,$Checked){
        $output2='';
        $output2=<<<EOT
            <div class="containerFilter">
            <img src="$imgroot$ImageArray" width="350px" height="240px">
            <div class="title">
            <div class="switchAll" style = "margin-left:80%; margin-bottom:-5%; margin:top:-5%;">
            <form class="form2">
            echo $VisibleArray
            <input onchange = 'salah()' class="toggle" name="autoDiscovery" type="checkbox" id="toggle" $Checked  value="$VisibleArray" />
            
            </form>
            </div>
            <strong style="font-size:20px; ">$PriceArray EGP</strong>
            <h2 style="font-family: Open Sans, sans-serif; color: #403b45; font-size:14px; margin-top: 1.5%; ">$NameArray</h2>
            <div style="font-family: Open Sans, sans-serif; color: #403b45; font-size:14px;margin-top: 1%;">FLATS <i class="fa fa-bed fa-lg" aria-hidden="true"style="margin-left:10px;"> $RoomsArray </i><i class="fa fa-bath fa-lg" aria-hidden="true" style="margin-left:10px;margin-right:10px;"> $BathroomArray </i> 
            $AreaArray sqm
            </div>
            <div style="font-family: Open Sans, sans-serif; color: #403b45; font-size:14px;margin-top: 1%;"><i class="fa-solid fa-paint-roller" style="color:green;"></i> $FinishingArrayString 
            <i class="fa-solid fa-sack-dollar" style="margin-left:10px; color:green;"></i> $PaymentArray </div><br>
            <div style="font-family: Open Sans, sans-serif; color: #403b45; font-size:16px;margin-top: 1%;">$offeredArray</div>
            <div style="font-family: Open Sans, sans-serif; color: #403b45; font-size:16px;margin-top: 1%; font-weight: 600;"><i class="fa fa-map-marker" aria-hidden="true" style="color:green;"></i> $AddressArray </div>
          
            <div class = "purchase-info" style="margin-top:-0.5%;">
            <button type = "button" class = "btn">
            Add to WishList <i class="fa fa-heart" aria-hidden="true"></i>
            </button>
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
                        
                    }else{
                        $VisibleArray="off";
                        $Checked="";
                    }
                    list($UltimateIF,$ultimateIFCondition)=$this->ifCondition($UltimateJoinRoom,$UltimateJoinBathroom,$UltimateJoinFinishing,$RoomsArray,$BathroomArray,$FinishingArray,$UltimateIF,$ultimateIFCondition);
                   //it was here
                    if($ultimateIFCondition!="NotEmpty"){  
                        $output.= $this->card($imgroot,$ImageArray,$PriceArray,$AreaArray,$PaymentArray,$NameArray,$DescriptionArray,$offeredArray,$BathroomArray,$RoomsArray,$FinishingArrayString,$CodeArray,$AddressArray,$VisibleArray,$Checked);
          }
        if($ultimateIFCondition=="NotEmpty"){
            if($UltimateIF){
        
            
            $output.= $this->card($imgroot,$ImageArray,$PriceArray,$AreaArray,$PaymentArray,$NameArray,$DescriptionArray,$offeredArray,$BathroomArray,$RoomsArray,$FinishingArrayString,$CodeArray,$AddressArray,$VisibleArray,$Checked);
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
                $CodeArray=$input[$counter][8];
                $AreaArray=$input[$counter][2];
                $PaymentArray=$input[$counter][4];
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
                }else{
                    $VisibleArray="off";
                    $Checked="";
                }
                //Bl3b fe IF 
                list($UltimateIF,$ultimateIFCondition)=$this->ifCondition($UltimateJoinRoom,$UltimateJoinBathroom,$UltimateJoinFinishing,$RoomsArray,$BathroomArray,$FinishingArray,$UltimateIF,$ultimateIFCondition);
                //it also was here

                
                
                if($ultimateIFCondition!="NotEmpty"){  
                    $output.= $this->card($imgroot,$ImageArray,$PriceArray,$AreaArray,$PaymentArray,$NameArray,$DescriptionArray,$offeredArray,$BathroomArray,$RoomsArray,$FinishingArrayString,$CodeArray,$AddressArray,$VisibleArray,$Checked);
                }
                if($ultimateIFCondition=="NotEmpty"){
                    if($UltimateIF){

                    $output.= $this->card($imgroot,$ImageArray,$PriceArray,$AreaArray,$PaymentArray,$NameArray,$DescriptionArray,$offeredArray,$BathroomArray,$RoomsArray,$FinishingArrayString,$CodeArray,$AddressArray,$VisibleArray,$Checked);
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

