<?php
class DashBoardModel extends model
{
     public function getDashBoardData()
     {
              $ALLRECORDS =[];
              $this->dbh->query("SELECT COUNT(*) AS count1 FROM `allestate` ");
      
              $ALLRECORDS[0] = $this->dbh->single();

              $this->dbh->query("SELECT COUNT(*) AS count2  FROM `rents` ");
      
              $ALLRECORDS[1] = $this->dbh->single();

              $this->dbh->query("SELECT COUNT(*) AS count3  FROM `user` ");
      
              $ALLRECORDS[2] = $this->dbh->single();

              $this->dbh->query("SELECT * FROM `user`  LIMIT 0, 6");
      
              $ALLRECORDS[3] = $this->dbh->resultSet();

              return $ALLRECORDS;
          
     }
     public function EditConfirm($ID ,$Rank)
     {
             
              $this->dbh->query("UPDATE `user` SET `Rank`='$Rank' WHERE `ID`= $ID");
      
              $ALLRECORDS = $this->dbh->single();

              return "done";
          
     }
}