<?php
class Profile extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;

    require APPROOT . '/views/inc/header.php';  
?>

<head>
    <meta charset="utf-8">

    <title>View Profile</title>
	<!-- <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body  style="background-color:#003356;">
<div class="container-xl px-4 mt-5">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4" >
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header" style="background-color:#C9E0FF ;">Profile Picture</div>
                <div class="card-body text-center" style="background-color:#C9E0FF ;">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="https://images.unsplash.com/photo-1604004215402-e0be233f39be?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary  text-white " type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header" style="background-color:#C9E0FF ;">Account Details</div>
                <div class="card-body" style="background-color:#C9E0FF ;">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                            <input class="form-control " id="inputUsername" type="text" placeholder="Enter your username" value="username">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName" >First name</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="Valerie">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="Luna">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <!-- <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Organization name</label>
                                <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Start Bootstrap">
                            </div> -->
                            <!-- Form Group (location)-->
                            <!-- <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Location</label>
                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA">
                            </div> -->
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="06/10/1988">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary text-white " id="button" type="button">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- f64749 -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 -->
 <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xs-6">
                <!-- Change password card-->
                <div class="card mb-4">
                    <div class="card-header" style="background-color:#C9E0FF ;">Change Password</div>
                    <div class="card-body" style="background-color:#C9E0FF ;">
                        <form>
                            <!-- Form Group (current password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="currentPassword">Current Password</label>
                                <input class="form-control" id="currentPassword" type="password" placeholder="Enter current password">
                            </div>
                            <!-- Form Group (new password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="newPassword">New Password</label>
                                <input class="form-control" id="newPassword" type="password" placeholder="Enter new password">
                            </div>
                            <!-- Form Group (confirm password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password">
                            </div>
                            <button class="btn btn-primary text-white " type="button">Save</button>
                        </form>
                    </div>
                </div>
               
           
                <!-- Delete account card-->
                <div class="card mb-4">
                    <div class="card-header" style="background-color:#C9E0FF ;">Delete Account</div>
                    <div class="card-body" style="background-color:#C9E0FF ;">
                        <p>Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.</p>
                        <button class="btn btn-danger-soft text-danger" type="button" >I understand, delete my account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

  <footer> <?php
  require APPROOT . '/views/inc/footer2.php';
  ?> </footer>
</html>
<?php
    

  }
}
