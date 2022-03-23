<?php
class viewItem extends View
{
  public function output()
  {
    $title = $this->model->title;
    $subtitle = $this->model->subtitle;
    // $user_id = $_SESSION['user_id'];
    // $user_name = $_SESSION['user_name'];
    

    require APPROOT . '/views/inc/header.php';
$text = <<<EOT
    <section class="app">
  <aside class="sidebar">
         <header>
        Menu
      </header>
    <nav class="sidebar-nav">
 
      <ul>
        <li>
          <a href="#"><i class="ion-bag"></i> <span>Shop</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="ion-ios-color-filter-outline"></i>Derps</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-clock-outline"></i>Times</a>
            </li>
            <li>
              <a href="#"><i class="ion-android-star-outline"></i>Hates</a>
            </li>
            <li>
              <a href="#"><i class="ion-heart-broken"></i>Beat</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="ion-ios-settings"></i> <span class="">Controls</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="ion-ios-alarm-outline"></i>Watch</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-camera-outline"></i>Creeper</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-chatboxes-outline"></i>Hate</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-cog-outline"></i>Grinder</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="ion-ios-briefcase-outline"></i> <span class="">Folio</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="ion-ios-flame-outline"></i>Burn</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-lightbulb-outline"></i>Bulbs</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-location-outline"></i>Where You</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-locked-outline"></i>On Lock</a>
            </li>
             <li>
              <a href="#"><i class="ion-ios-navigate-outline"></i>Ghostface</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="ion-ios-analytics-outline"></i> <span class="">Graphicals</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="ion-ios-timer-outline"></i>Timers</a>
            </li>
            <li>
              <a href="#"><i class="ion-arrow-graph-down-left"></i>You Lose</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-partlysunny-outline"></i>Stormy</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-timer-outline"></i>Lookie Look</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-game-controller-a-outline"></i>Dork Mfer</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="ion-ios-paper-outline"></i> <span class="">Papers</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="ion-ios-filing-outline"></i>File Cab</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-information-outline"></i>Infos</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-paperplane-outline"></i>Planes</a>
            </li>
            <li>
              <a href="#"><i class="ion-android-star-outline"></i>Shop</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="ion-ios-navigate-outline"></i> <span class="">Ass Finder</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="ion-ios-flame-outline"></i>Burn</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-lightbulb-outline"></i>Bulbs</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-location-outline"></i>Where You</a>
            </li>
            <li>
              <a href="#"><i class="ion-ios-locked-outline"></i>On Lock</a>
            </li>
             <li>
              <a href="#"><i class="ion-ios-navigate-outline"></i>Ghostface</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="ion-ios-medical-outline"></i> <span class="">Cocaine</span></a>
        </li>
      </ul>
    </nav>
  </aside>
</section>
EOT;
    echo $text;



  }
}
