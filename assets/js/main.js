( function( $ ){
    "use strict";

    var window_width = $(window).width(),
      window_height = window.innerHeight,
      header_height = $(".default-header").height(),
      header_height_static = $(".site-header.static").outerHeight(),
      fitscreen = window_height - header_height;

      $(".fullscreen").css("height", window_height)
      $(".fitscreen").css("height", fitscreen);
    
      
    var nav_offset_top = $('header').height() + 50; 
  /*-------------------------------------------------------------------------------
    Navbar 
  -------------------------------------------------------------------------------*/
  
  //* Navbar Fixed  
  function navbarFixed(){
      if ( $('.header_area').length ){ 
          $(window).scroll(function() {
              var scroll = $(window).scrollTop();   
              if (scroll >= nav_offset_top ) {
                  $(".header_area").addClass("navbar_fixed");
              } else {
                  $(".header_area").removeClass("navbar_fixed");
              }
          });
      };
  };
  navbarFixed();


//------- mailchimp --------//  
  function mailChimp() {
      $('#mc_embed_signup').find('form').ajaxChimp();
  }
mailChimp();


$('.img-gal').magnificPopup({
  type: 'image',
  gallery: {
      enabled: true
  }
});



if ($('.blogCarousel').length) {
  $('.blogCarousel').owlCarousel({
      loop: false,
      margin: 30,
      items: 1,
      nav: true,
      autoplay: 2500,
      smartSpeed: 1500,
      dots: false,
      responsiveClass: true,
      navText : ["<div class='left-arrow'><i class='ti-angle-left'></i></div>","<div class='right-arrow'><i class='ti-angle-right'></i></div>"],
      responsive:{
        0:{
            items:1
        },
        1000:{
            items:2
        }
    }
  })
}

// Count Down function
var deadline = $('.clockdiv-content .datetime').text()+' '+'UTC+06';
function getTimeRemaining(endtime){
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor( (t/1000) % 60 );
  var minutes = Math.floor( (t/1000/60) % 60 );
  var hours = Math.floor( (t/(1000*60*60)) % 24 );
  var days = Math.floor( t/(1000*60*60*24) );
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime){
  var clock = document.getElementById(id);
  if( clock ){
    var daysSpan = clock.querySelector('.days');
    var hoursSpan = clock.querySelector('.hours');
    var minutesSpan = clock.querySelector('.minutes');
    var secondsSpan = clock.querySelector('.seconds');
    
    function updateClock(){
      var t = getTimeRemaining(endtime);

      daysSpan.innerHTML = t.days;
      hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
      minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);

      if(t.total<=0){
        clearInterval(timeinterval);
      }
    }

    updateClock();
    var timeinterval = setInterval(updateClock,1000);
  }
}
initializeClock('clockdiv', deadline);





})(jQuery);