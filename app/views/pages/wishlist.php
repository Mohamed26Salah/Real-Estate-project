<?php
class WishList extends view
{
    public function output()
    {

        $title = $this->model->title;

        require APPROOT . '/views/inc/header.php';
        


        ?>

<body style = " background: rgb(255,255,255);
background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 0%, rgba(150,48,48,0.6895133053221288) 73%, rgba(255,0,0,0.7035189075630253) 100%); background-attachment: fixed;">


    <section class="h-50">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">

            <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-white">Wish List</h3>
           
            </div>

            <div class="card rounded-3 mb-4">
            <div class="card-body p-4" style = "background: rgb(255,255,255);
background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 0%, rgba(150,48,48,0.6895133053221288) 73%, rgba(255,0,0,0.7035189075630253) 100%); background-attachment: fixed; box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);">
                <div class="row d-flex justify-content-between align-items-center" >
                <div class="col-md-2 col-lg-2 col-xl-2">
                    <img src="<?php echo IMAGEROOT2 . 'shoe_1.jpg' ; ?>"
                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2 text-white">Basic T-shirt</p>
                   
                </div>
                
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0">$499.00</h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                </div>
                </div>
            </div>
            </div>

            <div class="card rounded-3 mb-4">
            <div class="card-body p-4" style = "background: rgb(255,255,255);
background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 0%, rgba(150,48,48,0.6895133053221288) 73%, rgba(255,0,0,0.7035189075630253) 100%); background-attachment: fixed; box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);">
                <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                    <img src="<?php echo IMAGEROOT2 . 'shoe_2.jpg' ; ?>"
                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2 text-white">Basic T-shirt</p>
                    
                </div>
                
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0">$499.00</h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                </div>
                </div>
            </div>
            </div>

            <div class="card rounded-3 mb-4">
            <div class="card-body p-4" style = "background: rgb(255,255,255);+background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 0%, rgba(150,48,48,0.6895133053221288) 73%, rgba(255,0,0,0.7035189075630253) 100%); background-attachment: fixed; box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);">
                <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                    <img src="<?php echo IMAGEROOT2 . 'shoe_3.jpg' ; ?>"
                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2 text-white">Basic T-shirt</p>
                   
                </div>
                
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0">$499.00</h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                </div>
                </div>
            </div>
            </div>

            <div class="card rounded-3 mb-4" >
            <div class="card-body p-4" style = "background: rgb(255,255,255);background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 0%, rgba(150,48,48,0.6895133053221288) 73%, rgba(255,0,0,0.7035189075630253) 100%); background-attachment: fixed; box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);">
                <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                    <img src="<?php echo IMAGEROOT2 . 'shoe_4.jpg' ; ?>"
                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2 text-white">Basic T-shirt</p>
                   
                </div>
                
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0">$499.00</h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                </div>
                </div>
            </div>
            </div>

            <div class="card mb-4">
            <div class="card-body p-4 d-flex flex-row" style = "background: rgb(255,255,255);
background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 0%, rgba(150,48,48,0.6895133053221288) 73%, rgba(255,0,0,0.7035189075630253) 100%); background-attachment: fixed; box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);">
                <div class="form-outline flex-fill">
                <div style = "margin-left:50%;">
                    <i style="font-size:30px; color:red; " class="fa fa-exclamation-triangle" aria-hidden="true"></i><label class="form-label text-danger h1" for="form1">تحذير</label><br>
                    
                </div>
                <label style = "margin-left:10%; width:100%;" class="form-label h1" for="form1">اذا تم حذف العقار من الموقع فلن تجده هنا.</label>
                
                </div>
                
            </div>
            </div>

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

        <?php
        require APPROOT . '/views/inc/footer.php';

    }
}
