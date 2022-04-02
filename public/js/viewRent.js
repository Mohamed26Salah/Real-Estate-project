if( window.location.href.search("viewRent")!=-1){
   
$(document).ready(function(){



  $(".sidebar-menu > li.have-children a").on("click", function(i){
      i.preventDefault();
    if( ! $(this).parent().hasClass("active") ){
      $(".sidebar-menu li ul").slideUp();
      $(this).next().slideToggle();
    //   $(".sidebar-menu li").removeClass("active");
      $(this).parent().addClass("active");
    }
    else{
      $(this).next().slideToggle();
    //   $(".sidebar-menu li").removeClass("active");
        }
    });
});

 

  
  function rangeSlide(value) {
    document.getElementById('rangeValue').value = value;
}
function rangeChange(value) {
    console.log("in")
    document.getElementById('priceslider').value = value;
}



}
