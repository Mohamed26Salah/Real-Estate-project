<?php
require_once 'UserModel.php';
class viewRentModel extends model
{
  
    public function GetCount()
    {
        $this->dbh->query("SELECT COUNT(*) as TD FROM `rents`");

        $ALLRECORDS = $this->dbh->single();

        return $ALLRECORDS;
    }
    public function ViewRentOn($offset, $no_of_records_per_page)
    {
        $this->dbh->query("SELECT * FROM `rents`  LIMIT $offset, $no_of_records_per_page");

        $ALLRECORDS = $this->dbh->resultSet();

        return $ALLRECORDS;
    }
    public function TimeLeftForRent($date11)
    {
        $date1 = new DateTime($date11);
        $date2 = new DateTime(date("Y-m-d"));
        $interval = $date1->diff($date2);
        // echo "difference " . $interval->y . " years, " . $interval->m . " months, " . $interval->d . " days ";
        // shows the total amount of days (not divided into years, months and days like above)
        return $interval->days;
    }
    public function CheckIfRentIsStillValid($date11,$date22){
        $date1 = new DateTime($date11);
        $date2 = new DateTime($date22);
        // $date3 = new DateTime(date("Y-m-d"));

        $date3 = date('Y-m-d');
        $date3 = date('Y-m-d', strtotime($date3));
        //echo $paymentDate; // echos today! 
        $date1 = date('Y-m-d', strtotime($date11));
        $date2 = date('Y-m-d', strtotime($date22));
            
        if (($date3 >= $date1) && ($date3 <= $date2)){
            echo "is between";
        }else{
            echo "NO GO!";  
        }

    }
}
