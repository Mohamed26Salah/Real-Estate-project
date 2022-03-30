<?php
class About extends view
{
    public function output()
  {
    $title = $this->model->title;

    require APPROOT . '/views/inc/header.php';
    ?>

<div class="about-section">
        <div class="inner-container">
            <h1>عن أمان </h1>
            <p class="text">
            الشركة تهتم بالبناء و التشييد و المقاولات العامة و الخاصة و البيع و التسويق و الإيجار و التطوير العقاري و خدمة ما بعد البيع او الإيجار 
            </p>
            <h1>تواصل معنا  </h1>
            
            <div class="skills">
                <span>01144413610</span>
                <span>01094973229</span>
                <span>01280860303</span>
                <span>01018187025</span>
                <span>01147004061</span>
                <span>01119290295</span>
            </div>
           
        </div>
</div>

<?php



    require APPROOT . '/views/inc/footer.php';
  }
}
