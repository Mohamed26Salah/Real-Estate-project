<?php
class DashBoardModel extends model
{
     public function getDashBoardData()
     {
          $ALLRECORDS = [];
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
     public function EditConfirm($ID, $Rank, $count)
     {


          $this->dbh->query("UPDATE `user` SET `Rank`='$Rank' WHERE `ID`= $ID");

          $ALLRECORDS = $this->dbh->single();

          $this->dbh->query("SELECT *from `user` WHERE  `ID`= $ID");

          $ALLRECORDS2 = $this->dbh->single();
          $customer = <<<EOT
              <td>$ALLRECORDS2->name</td>
              <td>0111454768</td>
              <td>$ALLRECORDS2->Rank</td>
              <td><a  class="btn" onclick="Editing($count , '$ALLRECORDS2->name'  , '$ALLRECORDS2->ID' );" style="background-color: #4b99ec; color: white; font-size:15px;">Edit</a></td>
              EOT;

          return $customer;
     }
     public function DeleteUser($ID)
     {


          $this->dbh->query("DELETE FROM `user` WHERE  `ID`= $ID");

          $ALLRECORDS = $this->dbh->single();



          return 1;
     }
}
