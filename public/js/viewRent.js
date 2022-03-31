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
var obj = [
  { number: '<!-- single card start --><div class="product-card-Rent"><div class="priority"></div><!-- begin visible button --><div class="product-details"><h4><div class="arabic">اسم صاحب العقار : محمد </div><div class="arabic">اسم المستأجر : يوسف </div></h4><div class="product-bottom-details-Rent"><div class="product-price">$230.99</div><!-- timer start --><p id="demo">10 days</p><!-- timer end --></div></div><div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div><div class="codeblock">A50</div></div></div><!-- single card end --><!-- divider start --><div class="h-divider"><div class="shadow"></div><div class="text"><i>High</i></div></div><!-- divider end -->'},
  { number: '<!-- single card start --><div class="product-card-Rent"><div class="priority"></div><!-- begin visible button --><div class="product-details"><h4><a href="">Women leather bag</a></h4><div class="product-bottom-details"><div class="product-price">$230.99</div><!-- timer start --><p id="demo"></p><!-- timer end --></div></div><div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div><div class="codeblock">A50</div></div></div><!-- single card end -->'},
  { number: '<!-- single card start --><div class="product-card-Rent"><div class="priority"></div><!-- begin visible button --><div class="product-details"><h4><a href="">Women leather bag</a></h4><div class="product-bottom-details"><div class="product-price">$230.99</div><!-- timer start --><p id="demo"></p><!-- timer end --></div></div><div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div><div class="codeblock">A50</div></div></div><!-- single card end -->'},
  { number: '<!-- single card start --><div class="product-card-Rent"><div class="priority"></div><!-- begin visible button --><div class="product-details"><h4><a href="">Women leather bag</a></h4><div class="product-bottom-details"><div class="product-price">$230.99</div><!-- timer start --><p id="demo"></p><!-- timer end --></div></div><div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div><div class="codeblock">A50</div></div></div><!-- single card end -->'},
  { number: '<!-- single card start --><div class="product-card-Rent"><div class="priority"></div><!-- begin visible button --><div class="product-details"><h4><a href="">Women leather bag</a></h4><div class="product-bottom-details"><div class="product-price">$230.99</div><!-- timer start --><p id="demo"></p><!-- timer end --></div></div><div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div><div class="codeblock">A50</div></div></div><!-- single card end -->'},
  { number: '<!-- single card start --><div class="product-card-Rent"><div class="priority"></div><!-- begin visible button --><div class="product-details"><h4><a href="">Women leather bag</a></h4><div class="product-bottom-details"><div class="product-price">$230.99</div><!-- timer start --><p id="demo"></p><!-- timer end --></div></div><div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div><div class="codeblock">A50</div></div></div><!-- single card end -->'},
  { number: '<!-- single card start --><div class="product-card-Rent"><div class="priority"></div><!-- begin visible button --><div class="product-details"><h4><a href="">Women leather bag</a></h4><div class="product-bottom-details"><div class="product-price">$230.99</div><!-- timer start --><p id="demo"></p><!-- timer end --></div></div><div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div><div class="codeblock">A50</div></div></div><!-- single card end --><!-- divider start --><div class="h-divider"><div class="shadow"></div><div class="text"><i>High</i></div></div><!-- divider end -->'},
  { number: '<!-- single card start --><div class="product-card-Rent"><div class="priority"></div><!-- begin visible button --><div class="product-details"><h4><a href="">Women leather bag</a></h4><div class="product-bottom-details"><div class="product-price">$230.99</div><!-- timer start --><p id="demo"></p><!-- timer end --></div></div><div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div><div class="codeblock">A50</div></div></div><!-- single card end --><!-- divider start --><div class="h-divider"><div class="shadow"></div><div class="text"><i>High</i></div></div><!-- divider end -->'},
  { number: '<!-- single card start --><div class="product-card-Rent"><div class="priority"></div><!-- begin visible button --><div class="product-details"><h4><a href="">Women leather bag</a></h4><div class="product-bottom-details"><div class="product-price">$230.99</div><!-- timer start --><p id="demo"></p><!-- timer end --></div></div><div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div><div class="codeblock">A50</div></div></div><!-- single card end --><!-- divider start --><div class="h-divider"><div class="shadow"></div><div class="text"><i>High</i></div></div><!-- divider end -->'},
  { number: '<!-- single card start --><div class="product-card-Rent"><div class="priority"></div><!-- begin visible button --><div class="product-details"><h4><a href="">Women leather bag</a></h4><div class="product-bottom-details"><div class="product-price">$230.99</div><!-- timer start --><p id="demo"></p><!-- timer end --></div></div><div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div><div class="codeblock">A50</div></div></div><!-- single card end --><!-- divider start --><div class="h-divider"><div class="shadow"></div><div class="text"><i>High</i></div></div><!-- divider end -->'},
  { number: '<!-- single card start --><div class="product-card-Rent"><div class="priority"></div><!-- begin visible button --><div class="product-details"><h4><a href="">Women leather bag</a></h4><div class="product-bottom-details"><div class="product-price">$230.99</div><!-- timer start --><p id="demo"></p><!-- timer end --></div></div><div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div><div class="codeblock">A50</div></div></div><!-- single card end --><!-- divider start --><div class="h-divider"><div class="shadow"></div><div class="text"><i>High</i></div></div><!-- divider end -->'},
  { number: '<!-- single card start --><div class="product-card-Rent"><div class="priority"></div><!-- begin visible button --><div class="product-details"><h4><a href="">Women leather bag</a></h4><div class="product-bottom-details"><div class="product-price">$230.99</div><!-- timer start --><p id="demo"></p><!-- timer end --></div></div><div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div><div class="codeblock">A50</div></div></div><!-- single card end --><!-- divider start --><div class="h-divider"><div class="shadow"></div><div class="text"><i>High</i></div></div><!-- divider end -->'},
  { number: '<!-- single card start --><div class="product-card-Rent"><div class="priority"></div><!-- begin visible button --><div class="product-details"><h4><a href="">Women leather bag</a></h4><div class="product-bottom-details"><div class="product-price">$230.99</div><!-- timer start --><p id="demo"></p><!-- timer end --></div></div><div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div><div class="codeblock">A50</div></div></div><!-- single card end --><!-- divider start --><div class="h-divider"><div class="shadow"></div><div class="text"><i>High</i></div></div><!-- divider end -->'},
  { number: '<!-- single card start --><div class="product-card-Rent"><div class="priority"></div><!-- begin visible button --><div class="product-details"><h4><a href="">Women leather bag</a></h4><div class="product-bottom-details"><div class="product-price">$230.99</div><!-- timer start --><p id="demo"></p><!-- timer end --></div></div><div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div><div class="codeblock">A50</div></div></div><!-- single card end --><!-- divider start --><div class="h-divider"><div class="shadow"></div><div class="text"><i>High</i></div></div><!-- divider end -->'},
  { number: '<!-- single card start --><div class="product-card-Rent"><div class="priority"></div><!-- begin visible button --><div class="product-details"><h4><a href="">Women leather bag</a></h4><div class="product-bottom-details"><div class="product-price">$230.99</div><!-- timer start --><p id="demo"></p><!-- timer end --></div></div><div class="row" style="justify-content:center; margin-top:-15%"><div class="priority high">high</div><div class="codeblock">A50</div></div></div><!-- single card end --><!-- divider start --><div class="h-divider"><div class="shadow"></div><div class="text"><i>High</i></div></div><!-- divider end -->'},
  ];
  var current_page = 1;
  var obj_per_page = 6;
  function totNumPages()
  {
      return Math.ceil(obj.length / obj_per_page);
  }
  
  function prevPage()
  {
      if (current_page > 1) {
          current_page--;
          change(current_page);
      }
  }
  function nextPage()
  {
      if (current_page < totNumPages()) {
          current_page++;
          change(current_page);
      }
  }
  function change(page)
  {
      var btn_next = document.getElementById("btn_next");
      var btn_prev = document.getElementById("btn_prev");
      var listing_table = document.getElementById("TableList");
      var page_span = document.getElementById("page");
      if (page < 1) page = 1;
      if (page > totNumPages()) page = totNumPages();
      console.log("in")
      listing_table.innerHTML = "";
      for (var i = (page-1) * obj_per_page; i < (page * obj_per_page); i++) {
          listing_table.innerHTML +=  obj[i].number ;
      }
      
      if (page == 1) {
          btn_prev.style.visibility = "hidden";
      } else {
          btn_prev.style.visibility = "visible";
      }
      if (page == totNumPages()) {
          btn_next.style.visibility = "hidden";
      } else {
          btn_next.style.visibility = "visible";
      }
  }
  window.onload = function() {
      change(1);
  };

  function rangeSlide(value) {
    document.getElementById('rangeValue').value = value;
}
function rangeChange(value) {
    console.log("in")
    document.getElementById('priceslider').value = value;
}



}
