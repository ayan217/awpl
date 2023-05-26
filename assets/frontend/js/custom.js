//Nav bar scroll
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >= 70) {  
        $(".nav-top").removeClass("unset-scroll");
    } else {
       $(".nav-top").addClass("unset-scroll");
    }
});

//Nav bar page navigation active class
jQuery(function($) { 
    var path = window.location.href; 
    $('.navbar-nav li a').each(function() { 
     if (this.href === path) { 
      $(this).addClass('active-nav-color'); 
     } 
    }); 
});



//DropDown name change
$('.table-filter-items').click(function(){
    $('#drop-manu-item').text($(this).text());
});


//Add Quentity 
var buttonPlus  = $(".qty-btn-plus");
var buttonMinus = $(".qty-btn-minus");

var incrementPlus = buttonPlus.click(function() {
  var $n = $(this)
  .parent(".qty-container")
  .find(".input-qty");
  $n.val(Number($n.val())+1 );
});

var incrementMinus = buttonMinus.click(function() {
  var $n = $(this)
  .parent(".qty-container")
  .find(".input-qty");
  var amount = Number($n.val());
  if (amount > 1) {
    $n.val(amount-1);
  }
});







$('.slider-for').slick({
  slidesToShow: 1,
  // slidesToScroll: false,
  swipe: false,
  arrows: true,
  fade: true,
  nav: false,
  asNavFor: '.slider-nav',
  dots: false,
  prevArrow: false,
  nextArrow: false
});
$('.slider-nav').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  vertical:true,
  asNavFor: '.slider-for',
  dots: false,
  focusOnSelect: true,
  verticalSwiping:false,
  nav: true,
  responsive: [
  {
      breakpoint: 992,
      settings: {
        vertical: false,
      }
  },
  {
    breakpoint: 768,
    settings: {
      vertical: false,
    }
  },
  {
    breakpoint: 580,
    settings: {
      vertical: false,
      slidesToShow: 3,
    }
  },
  {
    breakpoint: 380,
    settings: {
      vertical: false,
      slidesToShow: 2,
    }
  }
  ]
});


