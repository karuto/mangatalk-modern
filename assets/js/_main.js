/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages
    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

// Load all your jQuery scripts from this point onward.






// // Check which element is being clicked; helper function
// $('body').click(function(event) {
//     console.log(event.target);
// });




// Enable smooth scrolling to an anchor on the same page
$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        || location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
           if (target.length) {
             $('html,body').animate({
                 scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    }
});




// Hover / toggle visual effect on top banner
var mtBanner = $('#mt-banner');
if (mtBanner) {
  var isNativeNormal;
  
  mtBanner.mouseenter(function () {
    if ($(this).hasClass("is-normal")) {
      isNativeNormal = true;
    } else {
      isNativeNormal = false;
      $(this).removeClass("is-immersive");
      $(this).addClass("is-normal");
    }
  });
  
  mtBanner.mouseleave(function () {
    if (!isNativeNormal) { // immersive by default
      $(this).addClass("is-immersive");
      $(this).removeClass("is-normal");
    }
  });
  
  // Change banner display mode based on if the cover image exists
  if ($('.cover-image').length == 0) { // no cover, normal mode
      mtBanner.removeClass("is-immersive");
      mtBanner.addClass("is-normal");
  } else { // cover exists, immersive mode
      mtBanner.addClass("is-immersive");
      mtBanner.removeClass("is-normal");
  }
  
  // Toggle fixed top banner via button switch
  $("#nav-menu-switch").click(function () {
    if ($(this).hasClass("glyphicon-chevron-down")) {
      // Currently it's absolute, make it fixed!
      $(this).removeClass("glyphicon-chevron-down");
      $(this).addClass("glyphicon-chevron-up");
      $("#mt-banner").css("position", "fixed");
    } else {
      // Currently it's fixed already, so change it back!
      $(this).removeClass("glyphicon-chevron-up");
      $(this).addClass("glyphicon-chevron-down");
      $("#mt-banner").css("position", "absolute");
    }
  });
  
} else {
  console.log("Banner did not exist on this page");
}




// Hover / toggle effect on frontpage cover
var mtFrontcover = $('#mt-front');
if (mtFrontcover) {
  
  $("#cover-story").click(function () {
    window.location = $("#cover-story-link").find("a").attr("href");
  });
  
  // mtFrontcover.mouseenter(function () {
  //   $(this).addClass("coverActive");
  //   $(this).removeClass("coverInactive");
  // });
  // mtFrontcover.mouseleave(function () {
  //   $(this).addClass("coverInactive");
  //   $(this).removeClass("coverActive");
  // });
} else {
  console.log("Front cover did not exist on this page");
}




// TODO: mobile users won't be able to see this. Find a way to let user disable all hover effects.
// Hover / toggle effect on article blocks
$(".mt-block").addClass("is-inactive");

var blockheight = $(".mt-block").height();
var marginTopVar = (blockheight * 0.2) + "px";
// console.log(marginTopVar);

$(".mt-block").mouseenter(function () {
  
  // Tone down the block so that we can see clearly
  $(this).animate({opacity:"1"}, "slow");
  
  // Only do the following effect if we don't have a related article list (not on post page)
  if ($('#related-article-list').length == 0) {
    // Title needs to make room for entry summary and meta, move up
    // $(this).find(".entry-title").animate({marginTop: '0px'}, "slow");

    // Roll in entry summary and meta
    // if (  $( window ).width() > 768 ) {
    //   $(this).find(".entry-summary").fadeIn(1000);
    //   $(this).find(".entry-meta").fadeIn(1000);
    // }
    
    $(this).toggleClass("is-inactive");
  }
  
});
$(".mt-block").mouseleave(function () {
  
  // Restore its opacity
  $(this).animate({opacity:"0.8"}, "slow");
  
  // Only do the following effect if we don't have a related article list (not on post page)
  if ($('#related-article-list').length == 0) {
    // Roll out entry summary and meta first
    // if ( $( window ).width() > 768 ) {
    //   $(this).find(".entry-summary").fadeOut(1000);
    //   $(this).find(".entry-meta").fadeOut(1000);
    // }

    // Now entry title can reset itself back to original margin
    // $(this).find(".entry-title").animate({marginTop: marginTopVar}, "slow");
    
    $(this).toggleClass("is-inactive");
  }
  
});



// Fade out article's cover image as scrolling
function fader() {
    var coverDiv = $('.article-front .cover-image');
    if (coverDiv) {
      var windowHeight = $(window).height(),
          currentPos = $(document).scrollTop(),
          coverDivView = windowHeight - (coverDiv.offset().top - currentPos),
          op; // opacity
      //alert(coverDiv.offset().top + " | " + currentPos + "|" + windowHeight);
      if (coverDivView > 0) {
          op = 1 - 1 / (windowHeight + coverDiv.height()) * coverDivView;
          op += op;
          // console.log(op);
          if (op > 0) {
            coverDiv.css({opacity: op});            
            // since we are in the cover, make banner immersive
            if (mtBanner) {
              mtBanner.removeClass("is-normal");
              mtBanner.addClass("is-immersive");
            }
          } else {
            // since we already scroll passed the cover, make banner normal
            if (mtBanner) {
              mtBanner.removeClass("is-immersive");
              mtBanner.addClass("is-normal");
            }
            
          }
      }      
    } else {
      console.log("This page doesn't have a cover.");
    }
}
// Event on scroll
$(document).bind('scroll', fader);

