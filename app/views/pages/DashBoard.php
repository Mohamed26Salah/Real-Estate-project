<?php
class DashBoard extends View
{
  public function output()
  {
  
    require APPROOT . '/views/inc/header.php';
    
?>
<html>
<!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>css/DashBoardStyle.css"> -->

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
                <div class="cardDashBoard">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Total Number of Units</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="home-outline"></ion-icon>
                    </div>
                </div>

                <div class="cardDashBoard">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Total Number of Rents</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="cardDashBoard">
                    <div>
                        <div class="numbers">284</div>
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
 -->               <div class="search">
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
                            <tr>
                                <td>Salah Omran</td>
                                <td>0111454768</td>
                                <td>Admin</td>
                                <td><a href="#" class="btn" style="background-color: #4b99ec; color: white; font-size:15px;">Edit</a></td>
                            </tr>

                             <tr>
                                <td>Mohamed Salah</td>
                                <td>0111454768</td>
                                <td>Moderator</td>
                                <td><a href="#" class="btn" style="background-color: #4b99ec; color: white; font-size:15px;">Edit</a></td>
                            </tr>

                             <tr>
                                <td>Youssef Alaa</td>
                                <td>0111454768</td>
                                <td>Moderator</td>
                                <td><a href="#" class="btn" style="background-color: #4b99ec; color: white; font-size:15px;">Edit</a></td>
                            </tr>

                            <tr>
                                <td>Yonos Tarek</td>
                                <td>0111454768</td>
                                <td>Moderator</td>
                                <td><a href="#" class="btn" style="background-color: #4b99ec; color: white; font-size:15px;">Edit</a></td>
                            </tr>

                             <tr>
                                <td>Youssef Hussein</td>
                                <td>0111454768</td>
                                <td>Moderator</td>
                                <td><a href="#" class="btn" style="background-color: #4b99ec; color: white; font-size:15px;">Edit</a></td>
                            </tr>

                             <tr>
                                <td>Any one</td>
                                <td>0111454768</td>
                                <td>User</td>
                                <td><a href="#" class="btn" style="background-color: #4b99ec; color: white; font-size:15px;">Edit</a></td>
                            </tr>
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
                                <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg' ; ?>" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg' ; ?>" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg' ; ?>" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg' ; ?>" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg' ; ?>" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg' ; ?>" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg' ; ?>" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="<?php echo IMAGEROOT2 . 'salah.jpg' ; ?>" alt=""></div>
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

    <!-- =========== Scripts =========  -->
    <!-- <script src="<?php echo URLROOT; ?>js/DashBoard.js"></script> -->
  <script>
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

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};
  </script>
</body>

  
</html>
<?php
    

  }
}
