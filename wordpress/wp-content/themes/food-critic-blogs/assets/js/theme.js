// Menu Functions
function food_critic_blogs_openNav() {
  jQuery(".sidenav").addClass('show');
}

function food_critic_blogs_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

/////////////////////// Focus handling ///////////////////////
(function(window, document) {
  function food_critic_blogs_handleMobileMenuNavigation() {
    document.addEventListener('keydown', function(e) {
      if (window.innerWidth > 991) return;
      const nav = document.querySelector('.sidenav.show');
      if (!nav) return;
      const focusableElements = Array.from(nav.querySelectorAll(
        'a, button, [tabindex="0"], input, [tabindex]:not([tabindex="-1"])'
      )).filter(el => el.offsetParent !== null);

      if (focusableElements.length === 0) return;

      const firstElement = focusableElements[0];
      const lastElement = focusableElements[focusableElements.length - 1];
      const activeElement = document.activeElement;

      if (e.key === 'Tab') {
        if (!e.shiftKey && activeElement === lastElement) {
          e.preventDefault();
          firstElement.focus();
        } 
        else if (e.shiftKey && activeElement === firstElement) {
          e.preventDefault();
          lastElement.focus();
        }
        else if (!nav.contains(activeElement)) {
          e.preventDefault();
          firstElement.focus();
        }
        return;
      }

      if (e.key === 'Tab' && e.shiftKey) {
        const activeElement = document.activeElement;

        if (activeElement.closest('.dropdown-menu')) {
          e.preventDefault();
          
          //current submenu
          const currentSubmenu = activeElement.closest('.dropdown-menu');
          const submenuItems = Array.from(currentSubmenu.querySelectorAll('a, button, [tabindex="0"]'))
            .filter(el => el.offsetParent !== null);
          const currentIndex = submenuItems.indexOf(activeElement);
          if (currentIndex > 0) {
            submenuItems[currentIndex - 1].focus();
          } else {
            const parentDropdown = currentSubmenu.closest('.dropdown, .page_item_has_children');
            if (parentDropdown) {
              // Find all focusable elements in parent
              const allFocusable = Array.from(parentDropdown.querySelectorAll('a, button, [tabindex="0"]'))
                .filter(el => el.offsetParent !== null);
              
              // Filter to only direct children of parentDropdown
              const parentItems = allFocusable.filter(el => el.parentElement === parentDropdown);
              
              if (parentItems.length > 0) {
                parentItems[0].focus();
              }
            }
          }
        }
      }
    });
  }

  document.addEventListener('DOMContentLoaded', function() {
    food_critic_blogs_handleMobileMenuNavigation();

    document.addEventListener('focusin', function(e) {
      if (window.innerWidth > 991) return;
      
      const focusedItem = e.target;
      const submenu = focusedItem.closest('.dropdown-menu');
      if (submenu) {
        submenu.style.display = 'block';
        submenu.classList.add('show');
      }
    });
  });
})(window, document);

/////////////////////// end ///////////////////////

jQuery(function($) {
  "use strict";

  // Scroll to top button
  let scrollTopButton = $('#scrolltop');
  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      scrollTopButton.addClass('scroll');
    } else {
      scrollTopButton.removeClass('scroll');
    }
  });
  scrollTopButton.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '300');
  });

  // Loading screen (preloader)
  window.addEventListener('load', function() {
    $(".loading").delay(2000).fadeOut("slow");
  });

  /////////////////////// Menu events binding ///////////////////////

  $(document).ready(function () {
    /*--- adding dropdown class to menu -----*/
    $("ul.sub-menu,ul.children").parent().addClass("dropdown");
    $("ul.sub-menu,ul.children").addClass("dropdown-menu");
    $("ul#menuid li.dropdown a,ul.children li.dropdown a").addClass("dropdown-toggle");
    $("ul.sub-menu li a,ul.children li a").removeClass("dropdown-toggle");
    $('nav li.dropdown > a, .page_item_has_children a').append('<span class="caret"></span>');
    $('a.dropdown-toggle').attr('data-toggle', 'dropdown');

    /*-- Mobile menu --*/
    if ($('#site-navigation').length) {
        $('#site-navigation .menu li.dropdown,li.page_item_has_children').append(function () {
            return '<i class="fas fa-caret-down abc" aria-hd="true"></i>';
        });
        $('#site-navigation .menu li.dropdown .fas,li.page_item_has_children .fas').on('click', function () {
            $(this).parent('li').children('ul').slideToggle().toggleClass('show');
        });
    }

    /*-- tooltip --*/
    $('[data-toggle="tooltip"]').tooltip();

    /*-- Button Up --*/
    var btnUp = $('<div/>', { 'class': 'btntoTop' });
    btnUp.appendTo('body');
    $(document).on('click', '.btntoTop', function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 700);
    });

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 200)
            $('.btntoTop').addClass('active');
        else
            $('.btntoTop').removeClass('active');
    });

    /*-- Reload page when width is between 320 and 768px and only from desktop */
    var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? true : false;
    $(window).on('resize', function () {
        var win = $(this); //this = window
        if (win.width() > 320 && win.width() < 991 && isMobile == false && !$("body").hasClass("elementor-editor-active")) {
            location.reload();
        }
    });
    });

  /////////////////////// end ///////////////////////

});

// Owl Carousel initialization
jQuery(document).ready(function() {
    var sync1 = jQuery("#sync1");
    var sync2 = jQuery("#sync2");
    var slidesPerPage = 5; //globaly define number of elements per page
    var syncedSecondary = true;

    sync1.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: false,
        autoplay: false, 
        dots: false,
        mouseDrag: false,
        loop: true,
        responsiveRefreshRate: 200,
        navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
    }).on('changed.owl.carousel', food_critic_blogs_syncPosition);

    sync2
        .on('initialized.owl.carousel', function() {
            sync2.find(".owl-item").eq(0).addClass("current");
        })
        .owlCarousel({
            items: slidesPerPage,
            margin: 20,
            dots: false,
            nav: false,
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
            responsiveRefreshRate: 100,
            responsive: {
            0: {
              items: 1
            },
            576: {
              items: 2
            },
            768: {
              items: 3
            },
            900: {
              items: 3
            },
            1024: {
              items: 3 
            },
            1199: {
              items: 3 
            }
          },
        }).on('changed.owl.carousel', food_critic_blogs_syncPosition2);

    function food_critic_blogs_syncPosition(el) {
        //if you set loop to false, you have to restore this next line
        //var current = el.item.index;

        //if you disable loop you have to comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }
        //end block
        sync2
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = sync2.find('.owl-item.active').length - 1;
        var start = sync2.find('.owl-item.active').first().index();
        var end = sync2.find('.owl-item.active').last().index();

        if (current > end) {
            sync2.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
            sync2.data('owl.carousel').to(current - onscreen, 100, true);
        }
    }
    function food_critic_blogs_syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            sync1.data('owl.carousel').to(number, 100, true);
        }
    }

    sync2.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = jQuery(this).index();
        sync1.data('owl.carousel').to(number, 300, true);
    });
});

jQuery(window).scroll(function () {
  var sticky = jQuery('.sticky-header'),
  scroll = jQuery(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed-header');
  else sticky.removeClass('fixed-header');
});