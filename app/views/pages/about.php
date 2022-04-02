<?php
class About extends view
{
    public function output()
  {
    $title = $this->model->title;

    require APPROOT . '/views/inc/header.php';
    ?>
<body style = "background:#003356;">


<div class="about-section">
  <h1>About Us Page</h1>
  <p>Some text about who we are and what we do.</p>
  <p>Resize the browser window to see that this page is responsive by the way.</p>
</div>

<div class = "head" >
  <h2 style="text-align:center">Our Team</h2>
</div>

<div class="row">
  <div class="column">
    <div class="card-about">
      <img src="https://images.unsplash.com/photo-1548449112-96a38a643324?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="Jane" style="width:100%">
      <div class="container-about">
        <h2>Salah Omran</h2>
        <p class="title-about">CEO & Founder</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>jane@example.com</p>
        <p><button class="button-about">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card-about">
      <img src="https://images.unsplash.com/photo-1480429370139-e0132c086e2a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80" alt="Mike" style="width:100%">
      <div class="container-about">
        <h2>Saeed Metwally</h2>
        <p class="title-about">Art Director</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>mike@example.com</p>
        <p><button class="button-about">Contact</button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card-about">
      <img src="https://images.unsplash.com/photo-1615109398623-88346a601842?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="John" style="width:100%">
      <div class="container-about">
        <h2>Ehab</h2>
        <p class="title-about">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>john@example.com</p>
        <p><button class="button-about">Contact</button></p>
      </div>
    </div>
  </div>
</div>
</body>
<?php



    require APPROOT . '/views/inc/footer2.php';
  }
}
