$('.gallery-slick').slick({
  slidesToShow: 9,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 4000,
  prevArrow: false,
  nextArrow: false,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 8,
        slidesToScroll: 3,
      }
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 7,
        slidesToScroll: 3,
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 6,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 530,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});


$(function() {
  function ScrolClass() {
    if($(this).scrollTop() != 0) {
            $('.topPanel').addClass('topPanel-fixed');
          } else {
            $('.topPanel').removeClass('topPanel-fixed');
          }
    }
    $(window).scroll(function() {
      ScrolClass();
    });
    $(document).ready(function() {
      ScrolClass();
    });
});

$(function() {
  $(window).scroll(function() {
    if($(this).scrollTop() != 0) {
      $('.toTop').fadeIn();
    } else {
      $('.toTop').fadeOut();
    }
  });
  $('.toTop').click(function() {
    $('body,html').animate({scrollTop:0},800);
  });
});


$(".drop-button").click(function(){
  $(this).toggleClass("active");
  $('.'+$(this).attr('data-tab')).slideToggle();
});

$(document).on('click', function(e) {
  if (!$(e.target).closest(".hide-block").length) {
    $('.drop-block').css({"display": "none"});
  }
  e.stopPropagation();
});

$(".buttonDrop").click(function(){
  $("."+$(this).attr("data-class")).toggleClass("active");
  $(this).toggleClass("active");
});

// Hover and Click Block
/*if (window.matchMedia("(min-width: 993px)").matches) {
  $('.sub-menu ul').hide();
} else {
  $('.sub-menu ul').hide();
}*/

$(".sub-menu").mouseenter(function(){
  if (window.matchMedia("(min-width: 993px)").matches) {
      $(this).children("ul").show();
      //$(this).children("ul").slideToggle("200");
  }
    });

$(".sub-menu").mouseleave(function(){
    if (window.matchMedia("(min-width: 993px)").matches) {
        $(this).children("ul").hide();
        //$(this).children("ul").slideToggle("200");
    }
});

$(".sub-menu").click(function(){
  if (!window.matchMedia("(min-width: 993px)").matches) {
      $(this).toggleClass("active");
      $(this).children("ul").slideToggle();
  }
});

$(document).ready(function() { 
  var overlay = $('#overlay'); 
  var open_modal = $('.open_modal'); 
  var close = $('.modal_close, #overlay'); 
  var modal = $('.modal_div'); 
   open_modal.click( function(event){ 
       event.preventDefault(); 
       var div = $(this).attr('href'); 
       overlay.fadeIn(400, 
           function(){ 
               $(div) 
                   .css('display', 'block') 
                   .animate({opacity: 1, top: '20%'}, 200); 
       });
   });

   close.click( function(){ 
          modal 
           .animate({opacity: 0, top: '15%'}, 200, 
               function(){ 
                   $(this).css('display', 'none');
                   overlay.fadeOut(400); 
               }
           );
   });
});


