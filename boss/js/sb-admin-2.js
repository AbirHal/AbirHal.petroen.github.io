(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  //تحريك السايد بار
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // أغلق أي  قائمة مفتوحة عندها الايدي اوكردينايت  عندما يتم تغيير حجم النافذة إلى ما دون 768 بكسل
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
    
    //تبديل الناف عند تغيير حجم النافذة إلى أقل من 480 بكسل
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
    //قم بالرجوع إلى ما إذا كان المستخدم يقوم بالتمرير لأعلى أو لأسفلwheelDelta:
    //preventDefaultالغاء الحدث او منعه 
    //يكتشف عدد المرات التي تم فيها النقر بالفأرة في نفس المنطقةdetail
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
    // حسب الاوباستي الشفافسة تختفي ولا تطهر مش مباشرة كما الهيد و الشاو 
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

})(jQuery); // End of use strict
