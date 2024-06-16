
// var $grid = $('.grid').imagesLoaded( function() {
// $('.grid').masonry({
//     // options
//     itemSelector: '.grid-item',
//     columnWidth: '.grid-sizer',
//     percentPosition: true

//   });
// });

var $grid = $('.grid').masonry({
    itemSelector: '.grid-item',
    percentPosition: true,
    columnWidth: '.grid-sizer'
  });
  // layout Masonry after each image loads
  $grid.imagesLoaded().progress( function() {
    $grid.masonry();
  });  

  const swiper = new Swiper('.swiper-container', {
    // Optional parameters
    init:true,
    slidesPerView:1,
    enabled:true,
    centeredSlides:true,
    direction: 'horizontal',
    loop: true,
    effect:'fade',
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar

  });