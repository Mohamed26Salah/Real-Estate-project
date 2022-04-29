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
     public function ConfirmUser($email, $newEmail, $ID, $name, $title, $disc)
     {
          $IMAGEROOT2 = IMAGEROOT2;

          $ALL = "DELETE   FROM `aboutus` WHERE   `ID`=" . $ID;
          $this->dbh->query($ALL);
          $output2 = "";
          $result = $this->dbh->single();
          $this->dbh->query("SELECT * FROM `user` WHERE  `email`='" . $newEmail . "'");

          $result2 = $this->dbh->single();

          $this->dbh->query("INSERT INTO `aboutus`( `ID`,`UserID`, `name`, `Title`, `email`, `Description`) VALUES ('$ID','$result2->ID','$name','$title','$newEmail','$disc')");

          $result3 = $this->dbh->single();

          $this->dbh->query("SELECT *   FROM `aboutus` WHERE   `UserID`=" . $result2->ID);
          $result4 = $this->dbh->single();

          $output2 .= <<<EOT
         
           <div class="card-about">
         <img src=$IMAGEROOT2$result2->image>
         <div class="container-about">
           <h2>$name</h2>
           <p class="title-about">$title</p>
           <p>$disc</p>
           <p>$newEmail</p>
           
           <p><button class="button-about" onclick ="aboutUserEdit($result4->ID ,'$IMAGEROOT2$result2->image' ,'$name' , '$title','$disc ','$newEmail');" >Edit</button></p>
         </div>
       </div>
       EOT;


          return $output2;
     }
     public function ListUsers()
     {
          $this->dbh->query("SELECT *  FROM `aboutUs` WHERE  1");

          $result = $this->dbh->resultSet();
          $ORS = '';

          foreach ($result as $row) {
               $ORS .= '`ID`!= ' . $row->UserID . " AND ";
          }
          $ORS .= "`ID`!=  0 ";
          $ALL = "SELECT *  FROM `user` WHERE   " . $ORS;
          $this->dbh->query($ALL);
          $output2 = "";


          $result2 = $this->dbh->resultSet();
          $output2 = '<option value="" >No Change</option>';
          foreach ($result2 as $user) {
               $output2 .= <<<EOT
               <option value="$user->email">$user->email</option>`
               EOT;
          }
          return $output2;
     }
     public function switchMainDashBoard($page)
     {
          if ($page == 2) {
               $IMAGEROOT2 = IMAGEROOT2;
               $this->dbh->query("SELECT *  FROM `aboutUs` WHERE  1");

               $result = $this->dbh->resultSet();
               $ORS = '';

               foreach ($result as $row) {
                    $ORS .= '`ID`= ' . $row->UserID . " OR ";
               }
               $ORS .= "`ID`=  0 ";
               $ALL = "SELECT *  FROM `user` WHERE   " . $ORS;
               $this->dbh->query($ALL);



               $result2 = $this->dbh->resultSet();
               $output2 = <<<EOT
               <div class="row">
                  
               EOT;
               foreach ($result as $user) {
                    foreach ($result2 as $user2) {
                         if ($user2->ID == $user->UserID) {

                              $output2 .= <<<EOT
               <div class="column" id="$user->ID">
               <div class="card-about">
                 <img src=$IMAGEROOT2$user2->image>
                 <div class="container-about">
                   <h2>$user->name</h2>
                   <p class="title-about">$user->Title</p>
                   <p>$user->Description</p>
                   <p>$user->email</p>
                   <p><button class="button-about" onclick ="aboutUserEdit($user->ID ,'$IMAGEROOT2$user2->image' ,'$user2->name' , '$user->Title ','$user->Description ','$user->email');" >Edit</button></p>
                 </div>
               </div>
             </div>
             
             
             
             
             
             EOT;
                         }
                    }
               }
               $output2 .= '</div>';
               return $output2;
          }
          if ($page == 1) {
               $output = "";
               $imgroot = IMAGEROOT2;
               $this->dbh->query("SELECT *  FROM `allestate` WHERE  `Priroty`= 'HIGH'");

               $ALLRECORDS = $this->dbh->resultSet();
               foreach ($ALLRECORDS as $record) {
                    $output .= <<<EOT
               <div class="containerFilter">
               <img src="$imgroot$record->image" width="280px" height="240px">
               <div class="title">
               <div class="switchAll" style = "margin-left:60%; margin-bottom:-5%; margin:top:-5%;">
               <div class="switch-button">
               <input class="switch-button-checkbox" type="checkbox"></input>
               <label class="switch-button-label" for=""><span class="switch-button-label-span">اظهار</span></label>
             </div>
               </div>
               <strong style="font-size:20px;">$record->Price</strong>
               <hr style="border-top: 5px solid #8c8b8b;">
               <strong style="font-size:20px;">$record->Area</strong>
               <strong style="font-size:20px;">$record->PaymentMethod</strong>
               <p>$record->Name</p>
               <p>$record->DescriptionUser</p>
               <p>$record->offered</p>
               <div class="iconss" style="padding-top:2%;">
               <i class="fa fa-bath fa-lg" aria-hidden="true"></i>1 <i class="fa fa-bed fa-lg" aria-hidden="true" style="margin-left:10px;">1</i>
               </div>
             <br>
             <p>$record->Code</p>
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
     }
}
