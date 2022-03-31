<?php
class DashBoard extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;

    require APPROOT . '/views/inc/header.php';
    
?>
<html>
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/DashBoard.css">
  <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

  <body style = " background: #003356;">
    <!-- =============== Navigation ================ -->
    <div class="containerr" style="margin-top:2%;">
           
       <!--  <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon><i class="fa fa-home" aria-hidden="true"></i>
</ion-icon>
                        </span>
                        <span class="title">Aman Real Estate</span>
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
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul> -->
        <!-- </div> -->

        <!-- ========================= Main ==================== -->
       <!--  <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>


                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>
 -->
            <!-- ======================= Cards ================== -->
    
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Total Number of Units</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="home-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Total Number of Rents</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Total Number Of Customers</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
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
                            <div class="topnav">
                              <input type="text" placeholder="Search..">
                            </div>
                    <!--     <a href="#" class="btn" id="hidden " style="background-color: white;">View All</a> -->

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
                                <td><a href="#" class="btn" style="background-color: #001A2C; color: white ;">Edit</a></td>
                            </tr>
                             <tr>
                                <td>Mohamed Salah</td>
                                <td>0111454768</td>
                                <td>Moderator</td>
                                <td><a href="#" class="btn" style="background-color: #001A2C; color: white ;">Edit</a></td>
                            </tr>
                             <tr>
                                <td>Youssef Alaa</td>
                                <td>0111454768</td>
                                <td>Moderator</td>
                                <td><a href="#" class="btn" style="background-color: #001A2C; color: white ;">Edit</a></td>
                            </tr>
                             <tr>
                                <td>Yonos Tarek</td>
                                <td>0111454768</td>
                                <td>Moderator</td>
                                <td><a href="#" class="btn" style="background-color: #001A2C; color: white ;">Edit</a></td>
                            </tr>
                             <tr>
                                <td>Youssef Hussein</td>
                                <td>0111454768</td>
                                <td>Moderator</td>
                                <td><a href="#" class="btn" style="background-color: #001A2C; color: white ;">Edit</a></td>
                            </tr>
                             <tr>
                                <td>Any one</td>
                                <td>0111454768</td>
                                <td>User</td>
                                <td><a href="#" class="btn" style="background-color: #001A2C; color: white ;">Edit</a></td>
                            </tr>

                           
                        </tbody>
                    </table>
                </div>
               </div>
               </div>
               <!-- ///////////////////// -->
              <!--  Recent Customers was here  -->
             <!--   //////////////////// -->
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->

</body>
  <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////// -->

  <footer> <?php
  require APPROOT . '/views/inc/footer2.php';
  ?> </footer>
</html>
<?php
    

  }
}
