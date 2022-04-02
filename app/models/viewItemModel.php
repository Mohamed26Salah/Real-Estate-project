<?php
require_once 'UserModel.php';
class viewItemModel extends model
{
     public $title = 'MIU SE305 Blog ' . APP_VERSION;
     public $subtitle = 'Example of MVC PHP framework for SE305';
     public function GetCount()
     {
         $this->dbh->query("SELECT COUNT(*) as TD FROM `rents`");
 
         $ALLRECORDS = $this->dbh->single();
 
         return $ALLRECORDS;
     }
     public function ViewItemOn($offset, $no_of_records_per_page)
     {
         $this->dbh->query("SELECT * FROM `allestate`  LIMIT $offset, $no_of_records_per_page");
 
         $ALLRECORDS = $this->dbh->resultSet();
 
         return $ALLRECORDS;
     }
     
}
