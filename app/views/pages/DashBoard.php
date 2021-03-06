<?php
class DashBoard extends View
{
    public function output()
    {
        try {
            if (empty($_SESSION['user_id']) || $_SESSION['Rank'] == "User") {
                throw new Exception('not Admin');
            }
        } catch (Exception $e) {
            redirect('index');
        }

        require APPROOT . '/views/inc/header.php';

?>
        <html>

        <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>css/DashBoardStyle.css"> -->
        <?php $action3 = 'DashBoard'; ?>
        <?php
        $no_of_records_per_page = 5;
        $offset = 0;
        ?>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>css/DashBoardStyle.css">

        <body>
            <!-- =============== Navigation ================ -->
            <div class="containerDashBoard">

                <div class="navigationDashBoard" id="navigationDS">

                    <ul>
                        <span class="icon">
                            <div class="toggleDashBoard2">
                                <ion-icon name="menu-outline"></ion-icon>
                            </div>
                        </span>
                        <li>


                        </li>
                        <li>
                            <a href="javascript:window.top.location.reload(true)">
                                <span class="icon">
                                    <ion-icon name="people-outline" class="icon-dashboard"></ion-icon>
                                </span>
                                <span class="title">Main</span>
                            </a>
                        </li>
                        <li>
                            <a onclick='switchMainDashBoard(2 ,<?php echo $offset; ?> ,<?php echo $no_of_records_per_page; ?>);' href="#">
                                <span class="icon">
                                    <ion-icon name="people-outline"></ion-icon>
                                </span>
                                <span class="title">About Us Edit</span>
                            </a>
                        </li>

                        <li>
                            <a onclick='switchMainDashBoard(1 , <?php echo $offset; ?> ,<?php echo $no_of_records_per_page; ?>);' href="#">
                                <span class="icon">
                                    <ion-icon name="people-outline"></ion-icon>
                                </span>
                                <span class="title">latest Rent change</span>
                            </a>
                        </li>



                        <li>
                            <a onclick='switchMainDashBoard(3,<?php echo $offset; ?> ,<?php echo $no_of_records_per_page; ?>);' href="#">
                                <span class="icon">
                                    <ion-icon name="people-outline"></ion-icon>
                                </span>
                                <span class="title">latest Property change</span>
                            </a>
                        </li>


                    </ul>
                </div>

                <!-- ========================= Main ==================== -->
                <div class="mainDashBoard" id="mainDashBoard">
                    <div class="topbarDashBoard">
                        <div class="toggleDashBoard">
                            <ion-icon name="menu-outline"></ion-icon>
                        </div>



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
                                <div class="numbers"><?php echo $DataArray[5]->count4; ?></div>
                                <div class="cardName">Due Rents</div>
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
                                        <input type="text" id='Search here' placeholder="Search here" maxlength="50" onkeyup='searching(1 ,<?php echo $offset; ?> ,<?php echo $no_of_records_per_page; ?>),lettersandnumbers(this)'>
                                        <ion-icon name="search-outline"></ion-icon>
                                    </label>
                                </div>

                            </div>

                            <table>
                                <thead>
                                    <tr>
                                        <td>Name</td>

                                        <td>Role</td>
                                        <td>Edit</td>
                                    </tr>
                                </thead>
                                <tbody id="mainSearchContainer">
                                    <?php $count = 0;
                                    foreach ($DataArray[3] as $user) {
                                        $userDisplay = <<<EOT
                            <tr id="$count">
                                <td>$user->name</td>
                                
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
                                <?php

                                foreach ($DataArray[4] as $user) {
                                    if (substr($user->image, 0, 4) == 'http') {
                                        $imageRoot = '';
                                    } else {
                                        $imageRoot = IMAGEROOT2;
                                    }
                                    $output50 = <<<EOT
                                    
                                    
                                    
                                    
                                    
                                    
                                    <tr>
                                    <td width="60px">
                                        <div class="imgBx"><img src=" $imageRoot$user->image" alt=""></div>
                                    </td>
                                    <td>
                                        <h4>$user->name <br> <span>$user->email</span></h4>
                                    </td>
                                    </tr>
                                    EOT;
                                    echo  $output50;
                                }
                                ?>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
            <div id="applychange">

            </div>



            <!-- =========== Scripts =========  -->
            <!-- <script src="<?php echo URLROOT; ?>js/DashBoard.js"></script> -->
            <script>
                offset = <?php echo $offset; ?>;
                no_of_records_per_page = <?php echo $no_of_records_per_page; ?>;

                function aboutUserConfirmAdd() {
                    name1 = document.getElementById("NV").value;
                    title1 = document.getElementById("TV").value;
                    disc1 = document.getElementById("DV").value;
                    newEmail = document.getElementById("newaboutemail").value
                    if (newEmail == "") {
                        User = document.getElementById("AddAbout");
                        User.innerHTML = `<button class="AddbuttonViewPage" onclick ="aboutUserAdd();">Add</button>`;
                    } else {
                        $.ajax({
                            url: "<?php echo $action3; ?>",
                            method: "POST",
                            // pricerange:pricerange,
                            //  Finishing:Finishing , HighLow:HighLow, Payment:Payment,contarctType:contarctType,area:area,Bathroom:Bathroom,Rooms:Rooms,search:search,Mode:Model,
                            data: {
                                ConfirmAboutAdd: 1,
                                newEmail: newEmail,
                                name1: name1,
                                title1: title1,
                                disc1: disc1

                            },

                            success: function(data) {


                                newcard = document.getElementById("usersAU");
                                User = document.getElementById("AddAbout");
                                User.innerHTML = `<button class="AddbuttonViewPage" onclick ="aboutUserAdd();">Add</button>`;
                                newcard.innerHTML += data;
                            }
                        })
                    }
                }

                function aboutUserConfirm(email, ID) {
                    name1 = document.getElementById("N" + ID + "V").value;
                    title1 = document.getElementById("T" + ID + "V").value;
                    disc1 = document.getElementById("D" + ID + "V").value;
                    newEmail = document.getElementById("about" + ID).value
                    if (newEmail == "") {
                        newEmail = email;
                    }
                    $.ajax({
                        url: "<?php echo $action3; ?>",
                        method: "POST",
                        // pricerange:pricerange,
                        //  Finishing:Finishing , HighLow:HighLow, Payment:Payment,contarctType:contarctType,area:area,Bathroom:Bathroom,Rooms:Rooms,search:search,Mode:Model,
                        data: {
                            ConfirmAbout: 1,
                            email: email,
                            newEmail: newEmail,
                            ID: ID,
                            name1: name1,
                            title1: title1,
                            disc1: disc1

                        },

                        success: function(data) {



                            User = document.getElementById(ID);
                            User.innerHTML = data;

                        }
                    })

                }

                function aboutUserAdd() {
                    newUserForm = document.getElementById("AddAbout");
                    newUserForm.innerHTML = ` 
            <div class="card-about">
                
                 <div class="container-about">
                   <h2><input type="text" id='NV' placeholder="Enter Name" onkeyup="lettersandnumbers(this)" maxlength="50"></h2>
                   <p class="title-about"><input type="text" id='TV' placeholder="Enter Title" onkeyup="lettersandnumbers(this)" maxlength="50"></p>
                   <p><input type="textArea" id='DV' placeholder="Enter Description" onkeyup="lettersandnumbers(this)" maxlength="200"></p>
                   
                   Email : <select id="newaboutemail" name="about" >
                    </select>
                   <p><button class="button-about" onclick ="aboutUserConfirmAdd()" >Confirm</button></p>
                 </div>
               </div>`;
                    $.ajax({
                        url: "<?php echo $action3; ?>",
                        method: "POST",

                        data: {
                            EditAbout: 1
                        },

                        success: function(data) {


                            listuser = document.getElementById("newaboutemail");

                            listuser.innerHTML = data;

                        }
                    })
                }

                function aboutUserDelete(ID, image, name, title, disc, email) {
                    $.ajax({
                        url: "<?php echo $action3; ?>",
                        method: "POST",

                        data: {
                            DeleteAbout: 1,
                            ID: ID
                        },

                        success: function(data) {


                            User = document.getElementById(ID);
                            User.remove();

                        }
                    })

                }

                function aboutUserEdit(ID, image, name, title, disc, email) {
                    User = document.getElementById(ID);
                    console.log(User);
                    User.innerHTML = ` 
            <div class="card-about">
            <div class="imagecontainer">
                 <img src=` + image + `  >
                 </div>
                 <div class="container-about">
                   <h2><input type="text" id='N` + ID + `V' value="` + name + `" onkeyup="lettersandnumbers(this)" maxlength="50"></h2>
                   <p class="title-about"><input type="text" id='T` + ID + `V' value="` + title + `" onkeyup="lettersandnumbers(this)" maxlength="50"></p>
                   <p><input type="textArea" id='D` + ID + `V' value="` + disc + `" onkeyup="lettersandnumbers(this)" maxlength="200"></p>
                   <p>` + email + `</p>
                   <select id="about` + ID + `" name="about">
                    </select>
                   <p><button class="button-about" onclick ="aboutUserConfirm('` + email + `',` + ID + `);" >Confirm</button></p>
                 </div>
               </div>`;
                    $.ajax({
                        url: "<?php echo $action3; ?>",
                        method: "POST",

                        data: {
                            EditAbout: 1
                        },

                        success: function(data) {


                            listuser = document.getElementById("about" + ID);

                            listuser.innerHTML = data;

                        }
                    })

                }

                oldpage = '';

                function switchMainDashBoard(page, offsett, norppt) {
                    
                    $.ajax({
                        url: "<?php echo $action3; ?>",
                        method: "POST",
                        data: {
                            page: page,
                            offset: offsett,
                            norpp: norppt
                        },

                        success: function(data) {

                            if (oldpage != page) {
                                no_of_records_per_page = <?php echo $no_of_records_per_page; ?>;
                            }
                            
                            // ???
                            if (oldpage == page) {
                                no_of_records_per_page = norppt;
                            }
                            customer = document.getElementById('mainDashBoard');
                            customer.style.padding = "10px";
                            customer.innerHTML = data;
                            oldpage = page;

                        }
                    })


                }

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
                var toggle = document.querySelector(".toggleDashBoard");
                let navigation = document.querySelector(".navigationDashBoard");
                let main = document.querySelector(".mainDashBoard");

                toggle.onclick = function() {
                    console.log("in");
                    navigation.classList.toggle("active");
                    main.classList.toggle("active");
                };

                let toggle2 = document.querySelector(".toggleDashBoard2");
                toggle2.onclick = function() {
                    navigation.classList.toggle("active");
                    main.classList.toggle("active");
                };


                function itemsAjax2() {
                    no_of_records_per_page += <?php echo $no_of_records_per_page; ?>;

                    switchMainDashBoard(oldpage, offset, no_of_records_per_page);


                }

                function searching(state, offsett, norppt) {
                    search = document.getElementById('Search here').value;
                    $.ajax({
                        url: "<?php echo $action3; ?>",
                        method: "POST",
                        // pricerange:pricerange,
                        //  Finishing:Finishing , HighLow:HighLow, Payment:Payment,contarctType:contarctType,area:area,Bathroom:Bathroom,Rooms:Rooms,search:search,Mode:Model,
                        data: {
                            state: state,
                            search: search,
                            offsettt: offsett,
                            norpptt: norppt

                        },

                        success: function(data) {
                            console.log(data);

                            if (state == 1) {
                                customer = document.getElementById('mainSearchContainer');
                                customer.innerHTML = data;
                            } else if (state == 3) {
                                if (search) {
                                    customer = document.getElementById('SearchThirdContainer');

                                    customer.innerHTML = data;

                                } else {
                                    switchMainDashBoard(oldpage, offset, no_of_records_per_page);
                                }

                            } else if (state == 2) {
                                console.log("right state")
                                if (search) {
                                    console.log("Searched")
                                    customer = document.getElementById('SearchSecondContainer');

                                    customer.innerHTML = data;

                                } else {
                                    switchMainDashBoard(oldpage, offset, no_of_records_per_page);
                                }
                            }



                        }
                    })
                }
            </script>

        </body>


        </html>
<?php


    }
}
