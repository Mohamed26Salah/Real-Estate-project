<?php
class WishList extends view
{
    public function output()
    {

        $title = $this->model->title;

        require APPROOT . '/views/inc/header.php';
        


        ?>

<body style = "background-color: #003356;">


    <section >
    <div class="container h-100 mt-5" >
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">

            <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-white" style = "font-weight: 600;">Wish List</h3>
           
            </div>

            <div class="card rounded-3 mb-4" style = "background-color: #C9E0FF;">
            <div class="card-body p-4">
                <div class="row d-flex justify-content-between align-items-center" >
                <div class="col-md-2 col-lg-2 col-xl-2">
                    <img width="125px" height="125px" src="<?php echo IMAGEROOT2 . 'sala11.jpeg' ; ?>"
                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2 " style = "color: #00111C;">Villa</p>
                   
                </div>
                
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0" style = "color: #00111C;">$499.00</h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="#!" style = "color: #00111C;" ><i class="fas fa-trash fa-lg"></i></a>
                </div>
                </div>
            </div>
            </div>

            <div class="card rounded-3 mb-4" style = "background-color: #C9E0FF;">
            <div class="card-body p-4" >
                <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                    <img width="125px" height="125px" src="<?php echo IMAGEROOT2 . 'sala13.jpeg' ; ?>"
                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2 " style = "color: #00111C;">Villa</p>
                    
                </div>
                
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0" style = "color: #00111C;">$499.00</h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="#!" style = "color: #00111C;"><i class="fas fa-trash fa-lg"></i></a>
                </div>
                </div>
            </div>
            </div>

            <div class="card rounded-3 mb-4" style = "background-color: #C9E0FF;">
            <div class="card-body p-4" >
                <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                    <img width="125px" height="125px" src="<?php echo IMAGEROOT2 . 'sala14.jpeg' ; ?>"
                    class="img-fluid rounded-4" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2" style = "color: #00111C;">Villa</p>
                   
                </div>
                
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0" style = "color: #00111C;">$499.00</h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="#!" style = "color: #00111C;"><i class="fas fa-trash fa-lg"></i></a>
                </div>
                </div>
            </div>
            </div>

            <div class="card rounded-3 mb-4" style = "background-color: #C9E0FF;">
            <div class="card-body p-4" >
                <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                    <img width="125px" height="125px" src="<?php echo IMAGEROOT2 . 'sala15.jpeg' ; ?>"
                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2" style = "color: #00111C;">Villa</p>
                   
                </div>
                
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0" style = "color: #00111C;">$499.00</h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="#!" style = "color: #00111C;"><i class="fas fa-trash fa-lg"></i></a>
                </div>
                </div>
            </div>
            </div>


                                                        <!-- Ta7zer -->

            <!-- <div class="card mb-4">
            <div class="card-body p-4 d-flex flex-row" >
                <div class="form-outline flex-fill">
                
                    <i style="align-text: right; font-size:30px; color:red; " class="fa fa-exclamation-triangle" aria-hidden="true"></i><label class="form-label text-danger h1" for="form1">تحذير</label><br>
                    
                </div>
                <label style = "width:100%; align-text: right;" class="form-label h1" for="form1">اذا تم حذف العقار من الموقع فلن تجده هنا.</label>
                
               
                
            </div>
            </div> -->



            <!-- <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
            </div>
            </div> -->

        </div>
        </div>
    </div>
    </section>
</body>

<footer> <?php
  require APPROOT . '/views/inc/footer2.php';
  ?> </footer>
  <?php

    }
}
