<?php
class Index extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;



?>
    <?php
    if (isset($_GET['ERROR']) && $_GET['ERROR'] == 1) {
    ?>
      <div class="text-center fixed-top" style="margin-top:30px;" onclick="RemoveError()">
        <button class="btn btn-danger" id="Db" style="width:50%" onclick="RemoveError()"><i class="fa fa-exclamation-triangle" aria-hidden="true" onclick="RemoveError()"></i> An error occurred, Please try again later</button>
      </div>
    <?php

    }
    require APPROOT . '/views/inc/header.php';
    //  echo $_SESSION['user_id'];
    //  echo $_SESSION['user_name'];
    //  echo $_SESSION['email'];
    //  echo $_SESSION['Rank'];

    ?>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/searchstyle.css">

    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/css/ol.css">



    <!-- <body background = "<?php //echo IMAGEROOT . 'img2.png' ; 
                              ?>" style = " background-attachment: fixed;"> -->
    <!-- background = "<?php echo IMAGEROOT . 'mike-enerio-w7Z0fiZw4Mw-unsplash.jpg'; ?>" -->

    <body>
      <div class="homepage" style="background-image: url(<?php echo IMAGEROOT3 . 'main.jpg'; ?>) ;background-repeat: no-repeat; ">

        <div class="header">
          <span class="word"> Find your future home</span>
        </div>

        <div class="homepage-search">

          <div class="centerbox">

            <div class="main-form-container">
              <!-- <form id="MainSearchForm" class="" method="post" action="<?php echo URLROOT . "pages/viewItem?TypeID=1"; ?>">
              <input type="text" class="main-input main-name" id="SearchBar" name="SearchBar" value="Looking for something?" onfocus="clearText(this);" onblur="replaceText(this);" disabled="disabled" />
                <button type="button" class="main-btn" id="mainbtn">
                  <p class="search-small">SEARCH BY</p>
                  <p class="search-large">Houses</p>
                </button>
              <ul class="search-description">
                
                <li id="1">in Houses</li>
          <li id="2">in Buildings</li>
          <li id="3">in Villas</li>
          <li id="4">in Stores</li>
          <li id="5">in Clinics</li>
          <li id="6">in Schools</li>
          <li id="7">in Factories</li>
          <li id="8">in Farms</li>
          <li id="9">in Lands</li>
              </ul>
              <input id="main-submit" class="" type="submit" value="Search" style="border: 0px; padding-top:0px;"/>
            </form> -->
            </div>
          </div>
          <!-- mobile submit
          <button type="button" id="main-submit-mobile">Search</button> -->


        </div>
      </div>

      <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->
      <main class="page-content">



        <div class="card-index">
          <div class="content">
            <h2 class="title">شقق</h2>
           
            <a href="<?php echo URLROOT . 'pages/viewItem?TypeID=1'; ?>"><button class="btn">عرض شقق</button></a>
          </div>
        </div>

        <div class="card-index">
          <div class="content">
            <h2 class="title">عمارات</h2>
            
            <a href="<?php echo URLROOT . 'pages/viewItem?TypeID=2'; ?>"><button class="btn">عرض عمارات</button></a>
          </div>
        </div>

        <div class="card-index">
          <div class="content">
            <h2 class="title">فيلا</h2>
            <a href="<?php echo URLROOT . 'pages/viewItem?TypeID=3'; ?>"><button class="btn">عرض فيلا</button></a>
          </div>
        </div>

        <div class="card-index">
          <div class="content">
            <h2 class="title">محلات</h2>
            <a href="<?php echo URLROOT . 'pages/viewItem?TypeID=4'; ?>"><button class="btn">عرض محلات</button></a>
          </div>
        </div>


        <div class="card-index">
          <div class="content">
            <h2 class="title">عيادات</h2>
            <a href="<?php echo URLROOT . 'pages/viewItem?TypeID=5'; ?>"><button class="btn">عرض عيادات</button></a>
          </div>
        </div>

        <div class="card-index">
          <div class="content">
            <h2 class="title">مزارع</h2>
            <a href="<?php echo URLROOT . 'pages/viewItem?TypeID=6'; ?>"><button class="btn">عرض مزارع</button></a>
          </div>
        </div>


        <div class="card-index">
          <div class="content">
            <h2 class="title">مصانع</h2>
            <a href="<?php echo URLROOT . 'pages/viewItem?TypeID=7'; ?>"><button class="btn"> عرض مصانع</button></a>
          </div>
        </div>









        <div class="card-index">
          <div class="content">
            <h2 class="title">اراضي</h2>
            <a href="<?php echo URLROOT . 'pages/viewItem?TypeID=8'; ?>"><button class="btn">عرض اراضي</button></a>
          </div>
        </div>




        <div class="card-index">
          <div class="content">
            <h2 class="title">اخري</h2>
            <a href="<?php echo URLROOT . 'pages/viewItem?TypeID=9'; ?>"><button class="btn">عرض اخري</button></a>
          </div>
        </div>




        <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->

      </main>
      <h1 style="margin-left:47%;">الموقع</h1>
      <div class="mapbox " style="width:100%; height:50%; display:flex; justify-content:center;">


        <div class="center-map">
          <div id="map" style="width:100%; height:100%; ">


          </div>
        </div>
      </div>
    </body>
    <script>
      function RemoveError() {
        var myTimeout = setTimeout(timeout, 0);

        function timeout() {
          $("#Db").fadeOut("slow");
        };
        $(document).ready(function() {
          $("button").click(function() {
            // $("#Db").fadeOut();
            $("#Db").fadeOut("slow");
            // $("#Db").fadeOut(3000);
          });
        });
      }
    </script>
    <script type="module">
      ol.proj.useGeographic();

      function init() {

        const map = new ol.Map({
          view: new ol.View({
            center: [31.4577232, 30.0590846],
            zoom: 19
          }),
          layers: [
            new ol.layer.Tile({
              source: new ol.source.OSM()
            })
          ],
          target: 'map'
        });

        var layer = new ol.layer.Vector({
          source: new ol.source.Vector({
            features: [
              new ol.Feature({
                geometry: new ol.geom.Point([31.4577232, 30.0590846])
              })
            ]
          }),
          style: new ol.style.Style({
            image: new ol.style.Icon({
              anchor: [0.5, 1],
              anchorXUnits: 'fraction',
              anchorYUnits: 'fraction',
              src: '<?php echo IMAGEROOT3 ?>marker.png',
            }),
          })
        });
        map.addLayer(layer);
      }

      $(document).ready(function() {
        init();
      });
    </script>

    <footer> <?php
              require APPROOT . '/views/inc/footer2.php';
              ?> </footer>
<?php


  }
}
