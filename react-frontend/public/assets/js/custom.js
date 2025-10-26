// for sticky header--------------------------------------
jQuery(window).scroll(function () {
  if (jQuery(window).scrollTop() >= 150) {
    jQuery('body').addClass('header-sticky');
  }
  else {
    jQuery('body').removeClass('header-sticky');
  }
});
// calculate the height of the header for header sticky adjustments
jQuery(window).resize(function () {
  let headerHeight = jQuery('.header-inner__wrapper').outerHeight();
  jQuery('.header__main').css('height', headerHeight);
});


jQuery(document).ready(function () {
  
  
  // calculate the height of the header for header sticky adjustments
  jQuery(window).ready(function () {
    let headerHeight = jQuery('.header-inner__wrapper').outerHeight();
    jQuery('.header__main').css('height', headerHeight);
  });

  // for toggle menu-----------------------------------
  jQuery('.hamburger-nav').click(function () {
    jQuery('body').toggleClass('menu-open');
  });
  jQuery('.hamburger-nav-close').click(function () {
    jQuery(' body').removeClass('menu-open');
  });

  // nav arrow set in moblie view---------------------------------
  jQuery(".mobile-menubar ul li.menu-item-has-children ").each(function () {
    jQuery(this).children("a").after("<span class='arrow'><i class='fas fa-plus'></i></span>");
  });
  jQuery(".mobile-menubar ul li.menu-item-has-children  .arrow").click(function () {
    if (jQuery(this).next().is(":visible")) {
      jQuery(this).children("svg").removeClass("fa-minus");
      jQuery(this).children("svg").addClass("fa-plus");
      jQuery(this).next().slideUp();
    } else {
      jQuery(".mobile-menubar ul li.menu-item-has-children  .arrow svg").removeClass("fa-minus");
      jQuery(".mobile-menubar ul li.menu-item-has-children  .arrow svg").addClass("fa-plus");
      jQuery(".mobile-menubar ul li.menu-item-has-children  .arrow").next().slideUp();
      jQuery(this).children("svg").removeClass("fa-plus");
      jQuery(this).children("svg").addClass("fa-minus");
      jQuery(this).next().slideDown();
    }
  });

  // slider-------------------------------------------
  // jQuery('.marquee-slider').slick({
  //   slidesToShow: 1,
  //   slidesToScroll: 1,
  //   arrows: false,
  //   centerMode: true,
  //   centerPadding: '0px',
  //   infinite: true,
  //   autoplay: true,
  //   autoplaySpeed: 0,
  //   speed: 8000,
  //   cssEase: 'linear',
  // });
  // jQuery('.testimonial-slider').slick({
  //   slidesToShow: 1,
  //   slidesToScroll: 1,
  //   infinite: false,
  //   prevArrow: '.slider-prev-button',
  //   nextArrow: '.slider-next-button',
  //   responsive: [
  //     {
  //       breakpoint: 420,
  //       settings: {
  //         centerMode: false,
  //       }
  //     }
  //   ]
  // });

  jQuery(window).on('scroll', function () {
    var section2 = jQuery('#border-hit');
    if (section2.length) { // Ensure #border-hit exists
      var sectionTop = section2.offset().top;
      var scrollTop = jQuery(window).scrollTop(); // Get actual scroll position
      var body = jQuery('body');

      if (scrollTop >= sectionTop - 150) { // Adjust threshold as needed
        body.addClass('border-show');
      } else {
        body.removeClass('border-show');
      }
    }
  });



  // case-studies-slider 
  // Initialize Slick sliders
  // jQuery('.team-tab-slider').slick({
  //   slidesToShow: 3,
  //   slidesToScroll: 1,
  //   infinite: false,
  //   dots: false,
  //   arrows: true,
  //   responsive: [
  //     {
  //       breakpoint: 992,
  //       settings: {
  //         slidesToShow: 2,
  //       }
  //     },
  //     {
  //       breakpoint: 768,
  //       settings: {
  //         slidesToShow: 1,
  //         //  dots: true,
  //         //  arrows: false,
  //       }
  //     }
  //   ]
  // });

  // Reinitialize Slick on tab show
  jQuery('button[data-bs-toggle="tab"]').on('shown.bs.tab', function () {
    jQuery('.team-tab-slider').slick('setPosition');
  });

  // case-studies-slider 
});


