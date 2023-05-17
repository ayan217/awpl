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
  if (amount > 0) {
    $n.val(amount-1);
  }
});


//=====Carousel owl===========//
jQuery("#carousel").owlCarousel({
    navigation : true,
    autoplay: true,
    lazyLoad: true,
    loop: true,
    margin: 30,
    nav:true,
    navText : [
        '<img src="images/left-a.png" alt="img">',
        '<img src="images/left-a.png" alt="img">'
    ],
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 3000,
    dots: false,
    smartSpeed: 2000,
    responsive: {
      0: {
        items: 2
      },
  
      600: {
        items: 3
      },
  
      1024: {
        items: 4
      },
  
      1366: {
        items: 4
      }
    }
});




$('.slider-for').slick({
  slidesToShow: 1,
  // slidesToScroll: false,
  swipe: false,
  arrows: true,
  fade: true,
  asNavFor: '.slider-nav'
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

//input file name upload js cstm
var fileSelector = document.getElementById('customFile');
fileSelector.addEventListener('change', (event) => {
    var imageFiles = event.target.files;
    if (imageFiles.length > 0) {
        for (const imageFile of imageFiles) {
            const reader = new FileReader();
            reader.readAsDataURL(imageFile);
            reader.addEventListener('load', () => {
                var arr = new Array();
                arr['type'] = imageFile.name;
                $('#file-nm').text(arr['type']);
            });
        }
    }
});
