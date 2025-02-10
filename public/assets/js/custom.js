$(document).ready(function() {
  $("li:first-child").addClass("first");
  $("li:last-child").addClass("last");
  $('[href="#"]').attr("href", "javascript:;");
  $('.menu-Bar').click(function() {
      $(this).toggleClass('open');
      $('.menuWrap').toggleClass('open');
  });


  $('.patientAllTest').find('.testsCater > .testlist').hide();
  $('.patientAllTest .testsCater > a').click(function(){
    $(this).parent('.testsCater').find('.testlist').slideDown();
    $(this).text("Next");
    $(this).addClass("next");
    $('body').find('#book-appointment').addClass('next');
  });


  $('.accordion-list > li > .answer').hide();
  $('.accordion-list > li').click(function() {
    if($(this).hasClass("active")) {
      $(this).removeClass("active").find(".answer").slideUp();
    } else {
      $(".accordion-list > li.active .answer").slideUp();
      $(".accordion-list > li.active").removeClass("active");
      $(this).addClass("active").find(".answer").slideDown();
    }
    return false;
  });

  $('#calendar').datepicker({
    inline:true,
    firstDay: 1,
    showOtherMonths:true,
    dayNamesMin:['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
  });

//   $('.show-bill').click(function(){
//     $('.patientAppointWrapper').fadeOut();
//     $('.patientAppointDetails').fadeIn();
//   })




  $('.sidebarshow span').click(function(){
      $('.notibar').toggleClass('right-hide');
      $(this).toggleClass('bgcolor');
  });

  $('.addnewCate > a').click(function(){
    $('.add_test_CatePop').fadeIn();
    $('.overlay').fadeIn();
  })

 
  $('.editeHospital').click(function(){
    $('.edit_hospital').fadeIn();
    $('.overlay').fadeIn();
  })


  $('.overlay').click(function(){
    $('.popupMain').fadeOut();
    $('.overlay').fadeOut();
  })


});


const accordionBtns = document.querySelectorAll(".accordion");

accordionBtns.forEach((accordion) => {
accordion.onclick = function () {
  this.classList.toggle("is-open");

  let content = this.nextElementSibling;
  console.log(content);

  if (content.style.maxHeight) {
    //this is if the accordion is open
    content.style.maxHeight = null;
  } else {
    //if the accordion is currently closed
    content.style.maxHeight = content.scrollHeight + "px";
    console.log(content.style.maxHeight);
  }
};
});



$(window).on('load', function() {

var currentUrl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
  $('ul.menu li a').each(function() {
      var hrefVal = $(this).attr('href');
      if (hrefVal == currentUrl) {
          $(this).removeClass('active');
          $(this).closest('li').addClass('active')
          $('ul.menu li.first').removeClass('active');
      }
  });
});




$(window).scroll(function() {

});


/* RESPONSIVE JS */
if ($(window).width() < 825) {

    $('').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      autoplay: true,
      autoplaySpeed: 4000,
    });
}

