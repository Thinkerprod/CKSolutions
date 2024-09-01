$('#mobile').click(function(){
    $('#top').toggleClass('top-clicked')
    $('#middle').toggleClass('middle-clicked')
    $('#bottom').toggleClass('bottom-clicked')
    $('#x-spot').toggleClass('x-clicked')
    $('#nav-menu').toggleClass('nav-visible')
    $('#menu-links').toggleClass('visible')
})

const myCarouselElement = document.querySelector('#artCarousel')

const carousel = new bootstrap.Carousel(myCarouselElement, {
  interval: 2000
 
})