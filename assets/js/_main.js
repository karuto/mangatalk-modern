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
      $('.entry-content').tooltip();
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




// Top banner related functions
var mtBanner = $('#mt-banner');
var mtSearch = $("#mt-search");
mtSearch.hide();
if (mtBanner != 0) {
  var isNativeNormal;
  
  // Hover / toggle visual effect on top banner
  mtBanner.mouseenter(function () {
    if ($(this).hasClass("is-normal")) {
      isNativeNormal = true;
    } else {
      isNativeNormal = false;
      $(this).removeClass("is-immersive");
      $(this).addClass("is-normal");
    }
  });
  
  // Hover / toggle visual effect on top banner
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
    var icon = $(this).find("#nav-menu-switch-icon");
    if (icon.hasClass("glyphicon-chevron-down")) {
      // Currently it's absolute, make it fixed!
      icon.removeClass("glyphicon-chevron-down");
      icon.addClass("glyphicon-chevron-up");
      mtBanner.css("position", "fixed");
    } else {
      // Currently it's fixed already, so change it back!
      icon.removeClass("glyphicon-chevron-up");
      icon.addClass("glyphicon-chevron-down");
      mtBanner.css("position", "absolute");
    }
  });
  
  // Toggle global search bar via button switch
  $("#nav-search").click(function () {
    var icon = $(this).find("#nav-search-icon");
    if (icon.hasClass("glyphicon-zoom-out")) {
      // Currently it's showing search, make it hidden!
      if (mtSearch.length != 0) { // if search exists
        mtSearch.hide();
        mtBanner.css("top", "0");
      }
      
      icon.removeClass("glyphicon-zoom-out");
      icon.addClass("glyphicon-search");
    } else {
      // Currently it's not showing search, make it show!
      if (mtSearch.length != 0) { // if search exists
        mtSearch.show();
        mtBanner.css("top", "50px");
      }
      
      icon.removeClass("glyphicon-search");
      icon.addClass("glyphicon-zoom-out");
    }
  });
  
} else {
  console.log("Banner did not exist on this page");
}




// Retrieve inner link and apply to title of frontpage cover
var mtFrontcover = $('.home #mt-front');
if (mtFrontcover.length != 0) {
  $("#cover-story").click(function () {
    window.location = $("#cover-story-link").attr("href");
  });
} else {
  console.log("Front cover did not exist on this page");
}




// TODO: mobile users won't be able to see this. Find a way to let user disable all hover effects.
// Hover / toggle effect on article blocks
var blocks = $(".mt-block");
if (blocks.length != 0) { // if blocks exist
  blocks.addClass("is-inactive");
  var blockheight = blocks.height();
  var marginTopVar = (blockheight * 0.2) + "px";  
  
  blocks.mouseenter(function () {
  
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
  blocks.mouseleave(function () {
  
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
  
} else {
  console.log("No blocks exist on this page");
}




// Fade out article's cover image as scrolling
function fader() {
    var coverDiv = $('.article-front .cover-image');
    if (coverDiv.length != 0) {
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
            if (mtBanner != 0) {
              mtBanner.removeClass("is-normal");
              mtBanner.addClass("is-immersive");
            }
          } else {
            // since we already scroll passed the cover, make banner normal
            if (mtBanner != 0) {
              mtBanner.removeClass("is-immersive");
              mtBanner.addClass("is-normal");
            }
            
          }
      }      
    } else {
      // console.log("This page doesn't have a cover.");
    }
}
// Event on scroll
$(document).bind('scroll', fader);





// Add title manually after comicbits slideshow
var cbSlides = $('.comicbits');
if (cbSlides.length != 0) {
  var title = $('.entry-title-holder').text();
  console.log(title);
  $('<h3 class="entry-title">' + title + '</h3>').insertAfter('.comicbits:last-of-type');
}
