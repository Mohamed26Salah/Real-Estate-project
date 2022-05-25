<?php
class viewRentModel extends model
{
  
    protected $Rent;
    protected $Search;
    public function getRent()
    {
        return $this->Rent;
    }
    public function setRent($Rent)
    {
        $this->Rent = $Rent;
    }
    public function getSearch()
    {
        return $this->Search;
    }
    public function setSearch($Search)
    {
        $this->Search = $Search;
    }
    public function Paid($ID){
        $this->dbh->query("SELECT * FROM `rents` WHERE ID = :ID");
        $this->dbh->bind(':ID', $ID);
        $ALLRECORDS = $this->dbh->single();
            // echo($ALLRECORDS->TOR);
            $date1 = new DateTime($ALLRECORDS->TOR);
            $date2 = new DateTime($ALLRECORDS->TOREND);
            $interval = $date1->diff($date2);
            $TorEndOld = date('Y-m-d', strtotime($ALLRECORDS->TOREND));
            $AllSort=$interval->days." ";
            $dataJoex=date_create($ALLRECORDS->TOREND);
            date_add($dataJoex,date_interval_create_from_date_string( $AllSort." days"));
            $TorEndNew=date_format($dataJoex,"Y-m-d");
            $TorEndOldd=date('Y-m-d', strtotime($TorEndOld));
            $TorEndNeww=date('Y-m-d', strtotime($TorEndNew));
            $QUERY= "UPDATE `rents` SET`TOR`= '".$TorEndOldd."',`TOREND`= '".$TorEndNeww."',`status`= 1 WHERE ID=$ID";
            $this->dbh->query($QUERY);
            $this->dbh->execute();

            $date3 = date('Y-m-d');
            if (($date3 >= $TorEndOldd) && ($date3 <= $TorEndNeww)){
                return "$TorEndOldd/$TorEndNeww/1";
            }else {
                return "$TorEndOldd/$TorEndNeww/2";
            }

    }
    public function GetCount()
    {
        $this->dbh->query("SELECT COUNT(*) as TD FROM `rents`");

        $ALLRECORDS = $this->dbh->single();

        return $ALLRECORDS;
    }
    function card($YesNo,$ID,$Background_Color,$Font_Color,$typeName,$rentPrice,$TOR,$TOREND,$Start_OF_Rent,$END_OF_Rent,$LessorName,$TenantName,$LessorNum,$TenantNum,$code){
        $output2='';
        $className="btnRent-front".$ID;
        
        $colorWithOutHash = substr($Background_Color , 1 , 6);
        $approot = URLROOT . 'pages/viewRentDescription';
        $output2=<<<EOT

        
        
           
                <div class="col-lg-4 col-lg-6 content-card">
                    <div class="card-big-shadow">
                        <div class="card card-just-text" id="Background$ID" style="background-color:$Background_Color; color:$Font_Color;" data-radius="none">
                            <div class="content">
                                <h6 class="category">$code</h6>
                                <h4 class="title"><a href="#" style="color:#091BD3;">$rentPrice</a></h4>
                                <hr style="height:5px;">
                                
                                <div id="TOR$ID">$TOR / $TOREND</div>
                                <hr style="height:5px;">
                                <div>$Start_OF_Rent / $END_OF_Rent</div>
                                <hr style="height:5px;">
                                <div>المؤجر:$LessorName / $LessorNum</div>
                                <hr style="height:5px;">
                                <div>المستأجر:$TenantName / $TenantNum</div>
                                $YesNo
                                <a href="$approot?code=$code&color=$colorWithOutHash">Read More</a>

                            </div>
                        </div> <!-- end card -->
                    </div>
                </div>
                
        EOT;
        
        return $output2;
    }
  
    public function ViewRentOn($offset, $no_of_records_per_page)
    {
        $this->dbh->query("SELECT * FROM `rents`  LIMIT $offset, $no_of_records_per_page");

        $ALLRECORDS = $this->dbh->resultSet();

        return $ALLRECORDS;
    }
    // public function TimeLeftForRent($date11)
    // {
    //     $date1 = new DateTime($date11);
    //     $date2 = new DateTime(date("Y-m-d"));
    //     $interval = $date1->diff($date2);
    //     // echo "difference " . $interval->y . " years, " . $interval->m . " months, " . $interval->d . " days ";
    //     // shows the total amount of days (not divided into years, months and days like above)
    //     return $interval->days;
    // }
    public function UpdateRents(){
        $this->dbh->query("SELECT * FROM `rents`");
        $ALLRECORDS = $this->dbh->resultSet();
        foreach ($ALLRECORDS as $Item) {
            $date3 = date('Y-m-d');
            $date3 = date('Y-m-d', strtotime($date3));
            $date1 = date('Y-m-d', strtotime($Item->TOR));
            $date2 = date('Y-m-d', strtotime($Item->TOREND));
            $date4 = date('Y-m-d', strtotime($Item->Start_OF_Rent));
            $date5 = date('Y-m-d', strtotime($Item->END_OF_Rent));
            $CardID=$Item->ID;
            $TOR=$Item->TOR;
            $TOREND=$Item->TOREND;
            $Start_OF_Rent=$Item->Start_OF_Rent;
            $END_OF_Rent=$Item->END_OF_Rent;
           

            if(($date4>$date3)){
                $QUERY= "UPDATE `rents` SET `status`= 4 WHERE ID=$Item->ID";
                $this->dbh->query($QUERY);
                $this->dbh->execute();
            }
            else if(($date3 > $date5)){
                $QUERY= "UPDATE `rents` SET `status`= 3 WHERE ID=$Item->ID";
                $this->dbh->query($QUERY);
                $this->dbh->execute();
             
            }else if (($date3 >= $date1) && ($date3 <= $date2)){
                $QUERY= "UPDATE `rents` SET `status`= 1 WHERE ID=$Item->ID";
                $this->dbh->query($QUERY);
                $this->dbh->execute();
            }
            else if((($date3 < $date1)&&($date3 > $date4)) || (($date3 > $date2)&&($date3 < $date5))){
                $QUERY= "UPDATE `rents` SET `status`= 2 WHERE ID=$Item->ID";
                $this->dbh->query($QUERY);
                $this->dbh->execute();
            }
        }
    }
    public function CheckIfRentIsStillValid($offset,$no_of_records_per_page){
        $Search="";
        $Status="`status` = 1";

        if(!empty($this->Rent)){
            $Status="`status` = '".$this->Rent."'";
            $Status.=" AND ";
        }
        if(!empty($this->Search)){
            $Search=" AND (code LIKE '%".$this->Search."%'
            OR typeName LIKE '%".$this->Search."%'
            OR rentPrice LIKE '%".$this->Search."%'
            OR TOR LIKE '%".$this->Search."%'
            OR TOREND LIKE '%".$this->Search."%'
            OR Start_OF_Rent LIKE '%".$this->Search."%'
            OR END_OF_Rent LIKE '%".$this->Search."%'
            OR LessorName LIKE '%".$this->Search."%'
            OR TenantName LIKE '%".$this->Search."%'
            OR LessorNUM LIKE '%".$this->Search."%'
            OR TenantNUM LIKE '%".$this->Search."%'
            OR area LIKE '%".$this->Search."%'
            OR description LIKE '%".$this->Search."%'
            OR floor LIKE '%".$this->Search."%'
            )";
        }
        $Status=substr_replace($Status ,"", -4);
        // echo($Status);
        // echo($Search);
        $this->dbh->query("SELECT * FROM `rents` WHERE" .$Status.$Search. "LIMIT $offset, $no_of_records_per_page");
        $output='';
        $Background_Color="";
        $Font_Color="";
        $ALLRECORDS = $this->dbh->resultSet();
       
        foreach ($ALLRECORDS as $Item) {
            $date3 = date('Y-m-d');
            $date3 = date('Y-m-d', strtotime($date3));
            $date1 = date('Y-m-d', strtotime($Item->TOR));
            $date2 = date('Y-m-d', strtotime($Item->TOREND));
            $date4 = date('Y-m-d', strtotime($Item->Start_OF_Rent));
            $date5 = date('Y-m-d', strtotime($Item->END_OF_Rent));
            $CardID=$Item->ID;
            $typeName=$Item->typeName;
            $rentPrice=$Item->rentPrice;
            $TOR=$Item->TOR;
            $TOREND=$Item->TOREND;
            $Start_OF_Rent=$Item->Start_OF_Rent;
            $END_OF_Rent=$Item->END_OF_Rent;
            $LessorName=$Item->LessorName;
            $TenantName=$Item->TenantName;
            $LessorNum=$Item->LessorNum;
            $TenantNum=$Item->TenantNum;
            $code=$Item->code;

            if(($date4>$date3)){
                // echo"Msh ha3ml haaga";
                // $QUERY= "UPDATE `rents` SET `status`= 4 WHERE ID=$Item->ID";
                // $this->dbh->query($QUERY);
                // $this->dbh->execute();
                $Background_Color="#D3D337";
                $Font_Color="white";
                $YesNo="";
                $output.= $this->card($YesNo,$CardID,$Background_Color,$Font_Color,$typeName,$rentPrice,$TOR,$TOREND,$Start_OF_Rent,$END_OF_Rent,$LessorName,$TenantName,$LessorNum,$TenantNum,$code);
            }
            else if(($date3 > $date5)){
                // $QUERY= "UPDATE `rents` SET `status`= 3 WHERE ID=$Item->ID";
                // $this->dbh->query($QUERY);
                // $this->dbh->execute();
                $Background_Color="#4A4A45";
                $Font_Color="white";
                $YesNo="";
                $output.= $this->card($YesNo,$CardID,$Background_Color,$Font_Color,$typeName,$rentPrice,$TOR,$TOREND,$Start_OF_Rent,$END_OF_Rent,$LessorName,$TenantName,$LessorNum,$TenantNum,$code);
            }else if (($date3 >= $date1) && ($date3 <= $date2)){
                // echo "is between";
                // $QUERY= "UPDATE `rents` SET `status`= 1 WHERE ID=$Item->ID";
                // $this->dbh->query($QUERY);
                // $this->dbh->execute();
                $Background_Color="#20AF1C";
                $Font_Color="white";
                $YesNo="";
                $output.= $this->card($YesNo,$CardID,$Background_Color,$Font_Color,$typeName,$rentPrice,$TOR,$TOREND,$Start_OF_Rent,$END_OF_Rent,$LessorName,$TenantName,$LessorNum,$TenantNum,$code);
            }
            else if((($date3 < $date1)&&($date3 > $date4)) || (($date3 > $date2)&&($date3 < $date5))){
                // echo "NO GO!";  
                // $QUERY= "UPDATE `rents` SET `status`= 2 WHERE ID=$Item->ID";
                // $this->dbh->query($QUERY);
                // $this->dbh->execute();
                $Background_Color="#F74343";
                $Font_Color="white";
                $YesNo=<<<EOT
                    <div class="btnRent" id="btnRent$CardID">
                    <div class="btnRent-back" id="btnRent-back$CardID">
                    <p>Are you sure you want to do that?</p>
                    <button class="yes" id="yes$CardID" >Yes</button>
                    <button class="no" id="no$CardID">No</button>
                    </div>
                    <div class="btnRent-front" ID="btnRent-front$CardID" onclick="button($CardID)">هل دفع ؟</div>
                   
                    </div>
                EOT;
                $output.= $this->card($YesNo,$CardID,$Background_Color,$Font_Color,$typeName,$rentPrice,$TOR,$TOREND,$Start_OF_Rent,$END_OF_Rent,$LessorName,$TenantName,$LessorNum,$TenantNum,$code);
            }
        }
      
       
      
      

        return $output;
    }
}
