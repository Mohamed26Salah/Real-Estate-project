<?php
require_once 'UserModel.php';
class viewItemModel extends model
{
    /////////////////////////////////////////////////////////////////////////////////////////////
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
    public function yasser(){
       return "Yasser";
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
        //   echo"$this->price1";
        }
        if(!empty($this->price2)){
            $AllSort.="Price <= ".$this->price2;
            $AllSort.=" AND ";
            // echo"$this->price2";
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
            $UltimateJoin.=" AND ";
            $UltimateJoin.="eav.AtrributeID = 2 AND eav.Value=".$this->Finishing;
        }
        if(!empty($this->Rooms)){
            $UltimateJoin.=" AND ";
            $UltimateJoin.="eav.AtrributeID = 3 AND eav.Value=".$this->Rooms;
        }
        if(!empty($this->Bathroom)){
            $UltimateJoin.=" AND ";
            $UltimateJoin.="eav.AtrributeID = 4 AND eav.Value=".$this->Bathroom;
            
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
 
        // echo "Search";
        
        $AllSort=substr_replace($AllSort ,"", -4);
        // $UltimateJoin=substr_replace($UltimateJoin ,"", -4);
        if(empty($AllSort)){
            $AllSort="1";
        }
        // $QUERY= "SELECT * FROM `allestate`".$join."WHERE ".$AllSort.$AllJoin.$UltimateJoin.$Search.$SearchAll.$SuperUltimateJoin." LIMIT $offset, $no_of_records_per_page";

        $QUERY= "SELECT * FROM `allestate`".$join."WHERE ".$AllSort.$AllJoin.$UltimateJoin.$Search.$SuperUltimateJoin." LIMIT $offset, $no_of_records_per_page";
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
                    $PriceArray=$input[$counter][3];
                    $NameArray=$input[$counter][6];
                    $DescriptionArray=$input[$counter][5];
                    $CodeArray=$input[$counter][8];
                    $AreaArray=$input[$counter][2];
                    $PaymentArray=$input[$counter][4];
                    if($input[$counter][9]==1){
                        $offeredArray="Selling";
                    }else{
                        $offeredArray="egaar";
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
                        $FinishingArray="mtshtb";
                    }else{
                        $FinishingArray="Not mtshtb";
                    }
                    $output.= <<<EOT
                    <div class="containerFilter">
                    <img src="$imgroot$ImageArray" width="280px" height="240px">
                    <div class="title">
                    <div class="switchAll" style = "margin-left:60%; margin-bottom:-5%; margin:top:-5%;">
                    <div class="switch-button">
                    <input class="switch-button-checkbox" type="checkbox"></input>
                    <label class="switch-button-label" for=""><span class="switch-button-label-span">اظهار</span></label>
                  </div>
                    </div>
                    <strong style="font-size:20px;">$PriceArray</strong>
                    <hr style="border-top: 5px solid #8c8b8b;">
                    <strong style="font-size:20px;">$AreaArray</strong>
                    <strong style="font-size:20px;">$PaymentArray</strong>
                    <p>$NameArray</p>
                    <p>$DescriptionArray</p>
                    <p>$offeredArray</p>
                    <div class="iconss" style="padding-top:2%;">
                    <i class="fa fa-bath fa-lg" aria-hidden="true"></i>$BathroomArray <i class="fa fa-bed fa-lg" aria-hidden="true" style="margin-left:10px;">$RoomsArray</i>
                    </div>
                  <br>$FinishingArray
                  <p>$CodeArray</p>
            <div class = "purchase-info">
            <button type = "button" class = "btn">
            Add to WishList <i class="fa fa-heart" aria-hidden="true"></i>
            </button>
            </div>
            </div>
            </div>
            <br>
        EOT;
                }
            }else{
                /////////////////////////////////////////////////////////////////////////////////////////////////////
                $imgroot = IMAGEROOT2;
                $ImageArray=$input[$counter][10];
                $PriceArray=$input[$counter][3];
                $NameArray=$input[$counter][6];
                $DescriptionArray=$input[$counter][5];
                $CodeArray=$input[$counter][8];
                $AreaArray=$input[$counter][2];
                $PaymentArray=$input[$counter][4];
                if($input[$counter][9]==1){
                    $offeredArray="Selling";
                }else{
                    $offeredArray="egaar";
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
                    $FinishingArray="mtshtb";
                }else{
                    $FinishingArray="Not mtshtb";
                }
                $output.= <<<EOT
                <div class="containerFilter">
                <img src="$imgroot$ImageArray" width="280px" height="240px">
                <div class="title">
                <div class="switchAll" style = "margin-left:60%; margin-bottom:-5%; margin:top:-5%;">
                <div class="switch-button">
                <input class="switch-button-checkbox" type="checkbox"></input>
                <label class="switch-button-label" for=""><span class="switch-button-label-span">اظهار</span></label>
              </div>
                </div>
                <strong style="font-size:20px;">$PriceArray</strong>
                <hr style="border-top: 5px solid #8c8b8b;">
                <strong style="font-size:20px;">$AreaArray</strong>
                <strong style="font-size:20px;">$PaymentArray</strong>
                <p>$NameArray</p>
                <p>$DescriptionArray</p>
                <p>$offeredArray</p>
                <div class="iconss" style="padding-top:2%;">
                <i class="fa fa-bath fa-lg" aria-hidden="true"></i>$BathroomArray <i class="fa fa-bed fa-lg" aria-hidden="true" style="margin-left:10px;">$RoomsArray</i>
                </div>
              <br>$FinishingArray
              <p>$CodeArray</p>
        <div class = "purchase-info">
        <button type = "button" class = "btn">
        Add to WishList <i class="fa fa-heart" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        </div>
        <br>
    EOT;
                ////////////////////////////////////////////////////////////////////////////////////////////////////
               
                array_push($input,(array("$Item->ID","$Item->AddressUser","$Item->Area","$Item->Price","$Item->PaymentMethod","$Item->DescriptionUser","$Item->Name","$Item->Visible","$Item->Code","$Item->offered","$Item->image","$Item->AtrributeID","$Item->Value")));
                // array_shift($input);
                // echo " counter number is ". $counter;
                $counter+=1;
                // echo "<pre>";
                // print_r($input);
                // echo "<pre>";
               
            }
          
           
           

           
          }
         return $output;
     
    }



    ////////////////////////////////////////////////////////////////////////////////////////////
     public function GetCount()
     {
         $this->dbh->query("SELECT COUNT(*) as TD FROM `rents`");
 
         $ALLRECORDS = $this->dbh->single();
 
         return $ALLRECORDS;
     }
   
     
}

