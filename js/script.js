$(document).ready(function () {

$('.b-card-slider__big').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  fade: false,
  arrows: false,
  asNavFor: '.b-card-slider__pager',
  responsive: [
  {
    breakpoint: 1200,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  },
  {
    breakpoint: 992,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  },
  {
    breakpoint: 768,
    settings: {
      slidesToShow: 1,
      arrows: true,
      slidesToScroll: 1
    }
  }
  // You can unslick at a given breakpoint now by adding:
  // settings: "unslick"
  // instead of a settings object
]
});
$('.b-card-slider__pager').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows: false,
  dots: false,
  asNavFor: '.b-card-slider__big',
  focusOnSelect: true,
  variableWidth: true,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        variableWidth: false,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});



 $('.b-quantity .minus').click(function() {
    var $input = $(this).parent().find('input');
    var count = parseInt($input.val()) - 1;
    count = count < 1 ? 1 : count;
    $input.val(count);
    $input.change();
    return false;
});
$('.b-quantity .plus').click(function() {
    var $input = $(this).parent().find('input');
    $input.val(parseInt($input.val()) + 1);
    $input.change();
    return false;
}); 


$('.b-main-popular-slider').slick({
  dots: false,
  arrows: true,
  infinite: true,
  speed: 300,
  variableWidth: true,
  rows: 1,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        variableWidth: true
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        variableWidth: true
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: false
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});


$('.b-main-news__slider').slick({
  dots: false,
  arrows: true,
  infinite: true,
  speed: 300,
  variableWidth: true,
  rows: 1,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        variableWidth: true
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        variableWidth: true
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        variableWidth: false
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});



$('.b-card-popular').slick({
  dots: false,
  arrows: true,
  infinite: false,
  variableWidth: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        variableWidth: false,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});





$('.menu-icon').click(function(){
  $('.b-header-menu').toggleClass('active');
  $(this).toggleClass('active');
});

$('.b-menu__title').click(function(){
  $('.b-menu ul').slideToggle('active');
  $(this).toggleClass('active');
});

$('.b-aside-menu > ul > li.b-dropdown > a').click(function(e){
  $(this).next().slideToggle('active');
  $(this).toggleClass('active');
  event.preventDefault();
});

$('.b-user .b-private-content').click(function(){
  $('.b-user-menu').slideToggle('active');
  $(this).toggleClass('active');
});

function moveMenu(){
  if ($(window).width() < 768) {
         $(function(){ 
      $('.b-header-contacts').appendTo('.b-header-menu')

                                    

     })            
  } else{
         $(function(){ 
      $('.b-header-contacts').appendTo('.b-header-contacts__wrapper') 


     })        
  }
}
moveMenu();

$(window).resize(function(){
    moveMenu();
});

























// google maps

// When the window has finished loading create our google map below
google.maps.event.addDomListener(window, 'load', init);

function init() {
    // Basic options for a simple Google Map
    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    var mapOptions = {
        // How zoomed in you want the map to start at (always required)
        zoom: 17,
        disableDefaultUI: true,

        // The latitude and longitude to center the map (always required)

        center: new google.maps.LatLng(50.445185, 30.537673), // ZP

        // How you would like to style the map. 
        // This is where you would paste any style found on Snazzy Maps.
    };

    // Get the HTML DOM element that will contain your map 
    // We are using a div with id="map" seen below in the <body>
    var mapElement = document.getElementById('map');

    // Create the Google Map using our element and options defined above
    var map = new google.maps.Map(mapElement, mapOptions);

    // Let's also add a marker while we're at it
    var marker = new google.maps.Marker({ 
        position: new google.maps.LatLng(50.445185, 30.537673),
        map: map,
        title: 'Snazzy!'
    });



}

});


 


