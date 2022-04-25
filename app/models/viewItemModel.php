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
          echo"$this->price1";
        }
        if(!empty($this->price2)){
            $AllSort.="Price <= ".$this->price2;
            $AllSort.=" AND ";
            echo"$this->price2";
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

        $QUERY= "SELECT * FROM `allestate`".$join."WHERE ".$AllSort.$AllJoin.$UltimateJoin.$Search.$SearchAll.$SuperUltimateJoin." LIMIT $offset, $no_of_records_per_page";
        // echo $QUERY;
        $this->dbh->query($QUERY);
        $ALLRECORDS = $this->dbh->resultSet();
        if(empty($ALLRECORDS)){
            return 1;
        }
        $output='';
        
        foreach ($ALLRECORDS as $Item) {
            $imgroot = IMAGEROOT2;
            $output.= <<<EOT
            <div class="containerFilter">
            <img src="$imgroot$Item->image" width="280px" height="240px">
            <div class="title">
            <div class="switchAll" style = "margin-left:60%; margin-bottom:-5%; margin:top:-5%;">
            <div class="switch-button">
            <input class="switch-button-checkbox" type="checkbox"></input>
            <label class="switch-button-label" for=""><span class="switch-button-label-span">اظهار</span></label>
          </div>
            </div>
            <strong style="font-size:20px;">$Item->Price</strong>
            <hr style="border-top: 5px solid #8c8b8b;">
            <p>$Item->Name</p>
            <p>$Item->DescriptionUser</p>
            <div class="iconss" style="padding-top:2%;">
            <i class="fa fa-bath fa-lg" aria-hidden="true"></i>  <i class="fa fa-bed fa-lg" aria-hidden="true" style="margin-left:10px;"></i>
            </div>
          <br>
          <p>$Item->Code</p>
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

