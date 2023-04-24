
$(document).ready(function() {
    $('.slider').slick({
      dots: false,
      arrows: false,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      centerMode: true,
      variableWidth: true
    });
  
    $('.slider-prev').click(function() {
      $('.slider').slick('slickPrev');
    });
  
    $('.slider-next').click(function() {
      $('.slider').slick('slickNext');
    });
  });
  