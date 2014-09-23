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


// TODO: mobile users won't be able to see this. Find a way to let user disable all hover effects.
// Hover / toggle effect on article blocks
$("section.mt-block").addClass("is-inactive");
$("section.mt-block").mouseenter(function () {
  
  // Title needs to make room for entry summary and meta, move up
  $(this).find(".entry-title").animate({marginTop:"20px"});
  
  // Roll in entry summary and meta
  $(this).find(".entry-summary").fadeIn(1000);
  $(this).find(".entry-meta").fadeIn(1000);
  
  // $(this).toggleClass("is-inactive");
});
$("section.mt-block").mouseleave(function () {
  
  // Roll out entry summary and meta first!
  $(this).find(".entry-summary").fadeOut(1000);
  $(this).find(".entry-meta").fadeOut(1000);

  // Now entry title can reset itself back to original margin
  $(this).find(".entry-title").animate({marginTop:"175px"});
  // $(this).toggleClass("is-inactive");
});



// Fade out article's cover image as scrolling
function fader() {
    var coverDiv = $('.cover-image');
    if (coverDiv) {
      var windowHeight = $(window).height(),
          currentPos = $(document).scrollTop(),
          coverDivView = windowHeight - (coverDiv.offset().top - currentPos),
          op;
      //alert(coverDiv.offset().top + " | " + currentPos + "|" + windowHeight);
      if (coverDivView > 0) {
          op = 1 - 1 / (windowHeight + coverDiv.height()) * coverDivView;
          op += op;
          // console.log(op);
          if (op > 0)
              coverDiv.css({opacity: op});
      }      
    } else {
      console.log("This page doesn't have a cover.");
    }
}
// Event on scroll
$(document).bind('scroll', fader);

