<?php
require_once 'UserModel.php';
class viewRentModel extends model
{
    public $title = 'MIU SE305 Blog ' . APP_VERSION;
    public $subtitle = 'Example of MVC PHP framework for SE305';
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
    public function PR($date11)
    {
        $date1 = new DateTime($date11);
        $date2 = new DateTime(date("Y-m-d"));
        $interval = $date1->diff($date2);
        // echo "difference " . $interval->y . " years, " . $interval->m . " months, " . $interval->d . " days ";

        // shows the total amount of days (not divided into years, months and days like above)
        return $interval->days;
    }
}
