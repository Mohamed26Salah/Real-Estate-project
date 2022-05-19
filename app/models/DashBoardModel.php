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

          $this->dbh->query("SELECT * FROM `user`  WHERE NOT `Rank`  ='Admin'");

          $ALLRECORDS[3] = $this->dbh->resultSet();

          $this->dbh->query("SELECT * FROM `user`  Order by ID desc");

          $ALLRECORDS[4] = $this->dbh->resultSet();

          $this->dbh->query("SELECT COUNT(*) AS count4 FROM `rents`  where `status` = 2");

          $ALLRECORDS[5] = $this->dbh->single();

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
     public function DeleteUserAbout($ID)
     {


          $this->dbh->query("DELETE FROM `aboutus` WHERE  `ID`= $ID");

          $ALLRECORDS = $this->dbh->single();



          return 1;
     }
     public function ConfirmUserAdd( $newEmail, $name, $title, $disc){
          $IMAGEROOT2 = IMAGEROOT2;

         
          $output2 = "";
         
          $this->dbh->query("SELECT * FROM `user` WHERE  `email`='" . $newEmail . "'");

          $result2 = $this->dbh->single();

          $this->dbh->query("INSERT INTO `aboutus`( `UserID`, `name`, `Title`, `email`, `Description`) VALUES ('$result2->ID','$name','$title','$newEmail','$disc')");

          $this->dbh->single();

          $this->dbh->query("SELECT *   FROM `aboutus` WHERE   `UserID`=" . $result2->ID);
          $result4 = $this->dbh->single();

          $output2 .= <<<EOT
          <div class="column" id="$result4->ID">
           <div class="card-about">
           <div class="imagecontainer">
         <img src=$IMAGEROOT2$result2->image>
         </div>
         <div class="container-about">
           <h2>$name</h2>
           <p class="title-about">$title</p>
           <p>$disc</p>
           <p>$newEmail</p>
           
           <p><button class="button-about" onclick ="aboutUserEdit($result4->ID ,'$IMAGEROOT2$result2->image' ,'$name' , '$title','$disc ','$newEmail');" >Edit</button></p>
         </div>
       </div>
       </div>
       EOT;


          return $output2;
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
           <div class="imagecontainer">
         <img src=$IMAGEROOT2$result2->image>
         </div>
         <div class="container-about">
           <h2>$name</h2>
           <p class="title-about">$title</p>
           <p>$disc</p>
           <p>$newEmail</p>
           
           <p><button class="button-about" onclick ="aboutUserEdit($result4->ID ,'$IMAGEROOT2$result2->image' ,'$name' , '$title','$disc ','$newEmail');" >Edit</button></p>
           <p><button class="button-about" onclick ="aboutUserDelete($result4->ID ,'$IMAGEROOT2$result2->image' ,'$result4->name' , '$result4->Title ','$result4->Description ','$result4->email');" >Delete</button></p>

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
               <button class="toggleDashBoard" onclick=" 
                    navigation.classList.toggle('active');
                    main.classList.toggle('active');
                ">
               <ion-icon name="menu-outline"></ion-icon>
                </button>
               <div class="row" id="AddAbout"><button class="AddbuttonViewPage" onclick ="aboutUserAdd();">Add</button></div>
               <div class="row" id="usersAU">
                  
               EOT;
               foreach ($result as $user) {
                    foreach ($result2 as $user2) {
                         if ($user2->ID == $user->UserID) {
                              if(substr($user2->image,0,4) == 'http') {
                                   $IMAGEROOT2 = '';
                               }
                               else {
                                   $IMAGEROOT2 = IMAGEROOT2;
                               }
                              $output2 .= <<<EOT
               <div class="column" id="$user->ID">
               <div class="card-about">
               <div class="imagecontainer">
                 <img src=$IMAGEROOT2$user2->image>
                 </div>
                 <div class="container-about">
                   <h2>$user->name</h2>
                   <p class="title-about">$user->Title</p>
                   <p>$user->Description</p>
                   <p>$user->email</p>
                   <p><button class="button-about" onclick ="aboutUserEdit($user->ID ,'$IMAGEROOT2$user2->image' ,'$user2->name' , '$user->Title ','$user->Description ','$user->email');" >Edit</button></p>
                   <p><button class="button-about" onclick ="aboutUserDelete($user->ID ,'$IMAGEROOT2$user2->image' ,'$user2->name' , '$user->Title ','$user->Description ','$user->email');" >Delete</button></p>
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
                $output .= <<<EOT
                         <div class="details" style="display:inline;">
                        <div class="recentOrders" style="box-shadow: 0 10px 29px rgba(0, 0, 0, 0.5);">
                            <div class="cardHeader">
                    <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Code</td>
                            <td>Type</td>
                            <td>Last editing User</td>
                        </tr>
                    </thead>
                    <tbody>
                    EOT;
               $imgroot = IMAGEROOT2;
               $this->dbh->query("SELECT *  FROM `rents` WHERE  1");

               $ALLRECORDS[0] = $this->dbh->resultSet();

               $this->dbh->query("SELECT *  FROM `allestate` WHERE  1");

               $ALLRECORDS[1] = $this->dbh->resultSet();
               
               foreach ($ALLRECORDS[0] as $record) {
                    $this->dbh->query("SELECT *  FROM `user` WHERE  ID=".$record->AMID);
                    $user = $this->dbh->single();
                   
                         
                       
                    $output .= <<<EOT
                <tr >
                
                <td>$record->typeName</td>
                    <td>$record->code</td>
                   <td>Rent</td>
                    <td>$user->name</td>
                </tr>
                EOT;
                            
                            
                        }

                        foreach ($ALLRECORDS[1] as $record) {
                         $this->dbh->query("SELECT *  FROM `user` WHERE  ID=".$record->AMID);
                         $user = $this->dbh->single();
                        
                              
                            
                         $output .= <<<EOT
                     <tr >
                     
                     <td>$record->Name</td>
                         <td>$record->Code</td>
                        <td>Item</td>
                         <td>$user->name</td>
                     </tr>
                     EOT;
                                 
                                 
                             }
                        
                    $output .= '</tbody></table></div></div></div>';
     
               


               return $output;
          }
     }
}
