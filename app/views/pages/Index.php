<?php
class Index extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;
 

    require APPROOT . '/views/inc/header.php';
    ?>
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/style.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>css/searchstyle.css">
    <?php
    
      //  echo $_SESSION['user_id'];
      //  echo $_SESSION['user_name'];
      //  echo $_SESSION['email'];
      //  echo $_SESSION['Rank'];

?>

  <!-- <body background = "<?php //echo IMAGEROOT . 'img2.png' ; ?>" style = " background-attachment: fixed;"> -->
  <!-- background = "<?php echo IMAGEROOT . 'mike-enerio-w7Z0fiZw4Mw-unsplash.jpg' ; ?>" -->
  <body >
<div class = "homepage" style = "background-image: url(<?php echo IMAGEROOT3 . 'main.jpg' ; ?>);">
  
  <div class = "header"> 
        <span class = "word"> Find your future home</span>
  </div>

  <div class="homepage-search" >
    
    <div class="centerbox">
 
 <div class="main-form-container">
            <form id="" class="" method="post">
              <input type="text" class="main-input main-name" name="NAME" value="Looking for something?" onfocus="clearText(this);" onblur="replaceText(this);" />
                <button type="button" class="main-btn" id="mainbtn">
                  <p class="search-small">SEARCH BY</p>
                  <p class="search-large">Houses</p>
                </button>
              <ul class="search-description">
                
                <li value="houses">in Houses</li>
          <li value="buildings">in Buildings</li>
          <li value="villas">in Villas</li>
          <li value="stores">in Stores</li>
          <li value="clinics">in Clinics</li>
          <li value="schools">in Schools</li>
          <li value="factories">in Factories</li>
          <li value="farms">in Farms</li>
          <li value="lands">in Lands</li>
              </ul>
              <input id="main-submit" class="" type="submit" value="Search" style="border: 0px; padding-top:0px;"/>
            </form>
          </div>
          </div>
          <!-- mobile submit -->
          <button type="button" id="main-submit-mobile">Search</button>

   
  </div>
</div>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->
   <main class = "page-content">

   
   
   <div class="card-index">
            <div class="content">
              <h2 class="title">Houses</h2>
              <p class="copy">Seriously, straight up, just blast off into outer space today</p>
              <a href="<?php echo URLROOT . 'pages/viewItem'; ?>"><button class="btn">View Houses</button></a>
            </div>
    </div>

    <div class="card-index">
            <div class="content">
              <h2 class="title">Buildings</h2>
              <p class="copy">Seriously, straight up, just blast off into outer space today</p>
              <a href="#"><button class="btn">View Buildings</button></a>
            </div>
    </div>

    <div class="card-index">
            <div class="content">
              <h2 class="title">Villas</h2>
              <p class="copy">Seriously, straight up, just blast off into outer space today</p>
              <a href="#"><button class="btn">View Villas</button></a>
            </div>
    </div>

    <div class="card-index">
            <div class="content">
              <h2 class="title">Stores</h2>
              <p class="copy">Seriously, straight up, just blast off into outer space today</p>
              <a href="#"><button class="btn">View Stores</button></a>
            </div>
    </div>


    <div class="card-index">
            <div class="content">
              <h2 class="title">Clinics</h2>
              <p class="copy">Plan your next beach trip with these fabulous destinations</p>
              <a href="#"><button class="btn">View Clinics</button></a>
            </div>
      </div>

      <div class="card-index">
            <div class="content">
              
                <h2 class="title">Schools</h2>
                <p class="copy">Check out all of these gorgeous schools with beautiful views</p>
                <a href="#"><button class="btn">View Schools</button></a>
              
            </div>
      </div>

        
          <div class="card-index">
            <div class="content">
              <h2 class="title">Factories</h2>
              <p class="copy">It's the desert you've always dreamed of</p>
              <a href="#"><button class="btn">View Factories</button></a>
            </div>
      </div>


        


        <div class="card-index">
            <div class="content">
              <h2 class="title">Farms</h2>
              <p class="copy">Seriously, straight up, just blast off into outer space today</p>
              <a href="#"><button class="btn">View Farms</button></a>
            </div>
        </div>


        

        <div class="card-index">
            <div class="content">
              <h2 class="title">Lands</h2>
              <p class="copy">Seriously, straight up, just blast off into outer space today</p>
              <a href="#"><button class="btn">View Lands</button></a>
            </div>
        </div>

        
        

        <div class="card-index">
            <div class="content">
              <h2 class="title">Other</h2>
              <p class="copy">Seriously, straight up, just blast off into outer space today</p>
              <a href="#"><button class="btn">View Other</button></a>
            </div>
        </div>


     
        
      <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->

   </main>
   <div class="mapbox" style="width:100%; height:50%; display:flex; justify-content:center;">
   <div class="center-map">
    <div id="map" style="width:100%; height:100%; ">

      </div>
    </div>
    </div>
  </body>
  
  <script>
    function initMap(){
      var Location={lat:30.0589695 , lng:31.4576108}
      var map= new google.maps.Map(document.getElementById("map"),{
        zoom:20,
        center:Location
      });
      var marker= new google.maps.Marker({
        position: Location,
        map:map
      })
    }
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6pjCjwq8C7LO1eiVkI7cPToeGE5s1NXs&callback=initMap"></script>
  <footer> <?php
  require APPROOT . '/views/inc/footer2.php';
  ?> </footer>
<?php
    

  }
}
