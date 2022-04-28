<?php
class DashBoard extends View
{
    public function output()
    {

        require APPROOT . '/views/inc/header.php';

?>
        <html>
        <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>css/DashBoardStyle.css"> -->
        <?php $action3 = 'ajax2'; ?>

        <body>
            <!-- =============== Navigation ================ -->
            <div class="containerDashBoard">
                <div class="navigationDashBoard">
                    <ul>
                        <li>
                            <a href="#">
                                <span class="icon">
                                    <ion-icon name="logo-apple"></ion-icon>
                                </span>
                                <span class="title">Brand Name</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="icon">
                                    <ion-icon name="home-outline"></ion-icon>
                                </span>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="icon">
                                    <ion-icon name="people-outline"></ion-icon>
                                </span>
                                <span class="title">Customers</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="icon">
                                    <ion-icon name="chatbubble-outline"></ion-icon>
                                </span>
                                <span class="title">Messages</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="icon">
                                    <ion-icon name="help-outline"></ion-icon>
                                </span>
                                <span class="title">Help</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="icon">
                                    <ion-icon name="settings-outline"></ion-icon>
                                </span>
                                <span class="title">Settings</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="icon">
                                    <ion-icon name="lock-closed-outline"></ion-icon>
                                </span>
                                <span class="title">Password</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="icon">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </span>
                                <span class="title">Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- ========================= Main ==================== -->
                <div class="mainDashBoard">
                    <div class="topbarDashBoard">
                        <div class="toggleDashBoard">
                            <ion-icon name="menu-outline"></ion-icon>
                        </div>

                        <!--  <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div> -->

                        <!-- <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div> -->
                    </div>

                    <!-- ======================= Cards ================== -->
                    <div class="cardBoxDashBoard" style="font-size:20px;">
                        <?php $DataArray = $this->model->getDashBoardData(); ?>
                        <div class="cardDashBoard">
                            <div>
                                <div class="numbers"><?php echo $DataArray[0]->count1; ?></div>
                                <div class="cardName">Total Number of Units</div>
                            </div>

                            <div class="iconBx">
                                <ion-icon name="home-outline"></ion-icon>
                            </div>
                        </div>

                        <div class="cardDashBoard">
                            <div>
                                <div class="numbers"><?php echo $DataArray[1]->count2; ?></div>
                                <div class="cardName">Total Number of Rents</div>
                            </div>

                            <div class="iconBx">
                                <ion-icon name="cart-outline"></ion-icon>
                            </div>
                        </div>

                        <div class="cardDashBoard">
                            <div>
                                <div class="numbers"><?php echo $DataArray[2]->count3; ?></div>
                                <div class="cardName">Total Number Of Customers</div>
                            </div>

                            <div class="iconBx">
                                <ion-icon name="people-outline"></ion-icon>
                            </div>
                        </div>

                        <div class="cardDashBoard">
                            <div>
                                <div class="numbers">$7,842</div>
                                <div class="cardName">Earning</div>
                            </div>

                            <div class="iconBx">
                                <ion-icon name="cash-outline"></ion-icon>
                            </div>
                        </div>
                    </div>

                    <!-- ================ Order Details List ================= -->
                    <div class="details">
                        <div class="recentOrders">
                            <div class="cardHeader">
                                <h2>Customers</h2>
                                <!--                         change b3deen
 -->
                                <div class="search">
                                    <label>
                                        <input type="text" placeholder="Search here">
                                        <ion-icon name="search-outline"></ion-icon>
                                    </label>
                                </div>
                                <a href="#" class="btn">View All</a>
                            </div>

                            <table>
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Number</td>
                                        <td>Role</td>
                                        <td>Edit</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 0;
                                    foreach ($DataArray[3] as $user) {
                                        $userDisplay = <<<EOT
                            <tr id="$count">
                                <td>$user->name</td>
                                <td>0111454768</td>
                                <td>$user->Rank</td>
                                <td><a  class="btn" onclick="Editing($count , '$user->name'  , '$user->ID' ,'$user->Rank');" style="background-color: #4b99ec; color: white; font-size:15px;">Edit</a></td>
                            </tr>
                            EOT;
                                        $count++;
                                        echo $userDisplay;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- ================= New Customers ================ -->
                        <div class="recentCustomers">
                            <div class="cardHeader">
                                <h2>Recent Customers</h2>
                            </div>

                            <table>
                                <tr>
                                    <td width="60px">
                                        <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg'; ?>" alt=""></div>
                                    </td>
                                    <td>
                                        <h4>David <br> <span>Italy</span></h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="60px">
                                        <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg'; ?>" alt=""></div>
                                    </td>
                                    <td>
                                        <h4>Amit <br> <span>India</span></h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="60px">
                                        <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg'; ?>" alt=""></div>
                                    </td>
                                    <td>
                                        <h4>David <br> <span>Italy</span></h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="60px">
                                        <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg'; ?>" alt=""></div>
                                    </td>
                                    <td>
                                        <h4>Amit <br> <span>India</span></h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="60px">
                                        <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg'; ?>" alt=""></div>
                                    </td>
                                    <td>
                                        <h4>David <br> <span>Italy</span></h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="60px">
                                        <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg'; ?>" alt=""></div>
                                    </td>
                                    <td>
                                        <h4>Amit <br> <span>India</span></h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="60px">
                                        <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg'; ?>" alt=""></div>
                                    </td>
                                    <td>
                                        <h4>David <br> <span>Italy</span></h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="60px">
                                        <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg'; ?>" alt=""></div>
                                    </td>
                                    <td>
                                        <h4>Amit <br> <span>India</span></h4>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <footer> <?php
                                require APPROOT . '/views/inc/footer2.php';
                                ?> </footer>
                </div>

            </div>
            <div id="applychange">

            </div>

            <!-- =========== Scripts =========  -->
            <!-- <script src="<?php echo URLROOT; ?>js/DashBoard.js"></script> -->
            <script>
                function Delete(ID, valuee) {
                    $.ajax({
                        url: "<?php echo $action3; ?>",
                        method: "POST",
                        // pricerange:pricerange,
                        //  Finishing:Finishing , HighLow:HighLow, Payment:Payment,contarctType:contarctType,area:area,Bathroom:Bathroom,Rooms:Rooms,search:search,Mode:Model,
                        data: {
                            ID: ID,
                            DEL: 1
                        },

                        success: function(data) {


                            customer = document.getElementById(valuee);

                            customer.remove();

                        }
                    })


                }

                function Confirm(ConfirmID, valuee) {

                    Rank = document.getElementById('Rank' + ConfirmID).value;

                    $.ajax({
                        url: "<?php echo $action3; ?>",
                        method: "POST",
                        // pricerange:pricerange,
                        //  Finishing:Finishing , HighLow:HighLow, Payment:Payment,contarctType:contarctType,area:area,Bathroom:Bathroom,Rooms:Rooms,search:search,Mode:Model,
                        data: {
                            ConfirmID: ConfirmID,
                            Rank: Rank,
                            valuee: valuee
                        },

                        success: function(data) {


                            customer = document.getElementById(valuee);
                            customer.innerHTML = data;


                        }
                    })



                }





                var list = document.querySelectorAll(".navigationDashBoard li");

                function activeLink() {
                    list.forEach((item) => {
                        item.classList.remove("hovered");
                    });
                    this.classList.add("hovered");
                }

                list.forEach((item) => item.addEventListener("mouseover", activeLink));

                // Menu Toggle
                let toggle = document.querySelector(".toggleDashBoard");
                let navigation = document.querySelector(".navigationDashBoard");
                let main = document.querySelector(".mainDashBoard");

                toggle.onclick = function() {
                    navigation.classList.toggle("active");
                    main.classList.toggle("active");
                };
            </script>
        </body>


        </html>
<?php


    }
}
