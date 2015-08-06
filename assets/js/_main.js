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
      $('[data-toggle="tooltip"]').tooltip();

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
              mtBanner.css("top", "0");
              $("#cover-story").css("top", "0");
              mtSearch.hide();
            }
            
            icon.removeClass("glyphicon-zoom-out");
            icon.addClass("glyphicon-search");
          } else {
            // Currently it's not showing search, make it show!
            if (mtSearch.length != 0) { // if search exists
              mtBanner.css("top", "50px");
              $("#cover-story").css("top", "50px");
              mtSearch.show();
            }
            
            icon.removeClass("glyphicon-search");
            icon.addClass("glyphicon-zoom-out");
          }
        });
        
      } else {
        console.log("Banner did not exist on this page");
      }
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











// Story link remove
var storyRemove = $('#story-remove');
if (storyRemove.length != 0) {
  storyRemove.click(function () {
    $('.mt-story-banner').fadeOut();
  });
}




// Retrieve inner link and apply to title of frontpage cover
var mtFrontcover = $('.home #mt-front');
if (mtFrontcover.length != 0) {
  $("#cover-story").click(function () {
    window.location = $("#cover-story-link").attr("href");
  });
} else {
  // console.log("Front cover did not exist on this page");
}




var width = $(window).width(); 
var screenLargeEnough = ($(window).width() > 1200) ? true : false;
// TODO: mobile users won't be able to see this. Find a way to let user disable all hover effects.

// Hover / toggle effect on article blocks
var blocks = $(".mt-block");
if (blocks.length != 0) { // if blocks exist

  blocks.mouseenter(function () {
    // If you hovered over block, darken its background
    var bg = $(this).find(".cover-shade");
    bg.css({ opacity: 1 });

    // If you hovered over block, show its summary
    var summary = $(this).find(".excerpt");
    summary.removeClass("hidden");
    summary.addClass("entry-summary");
  });
  blocks.mouseleave(function () {
    // If you lefted block, lighten its background
    var bg = $(this).find(".cover-shade");
    bg.css({ opacity: 0.8 });

    // If you lefted block, hide its summary
    var summary = $(this).find(".excerpt");
    summary.removeClass("entry-summary");
    summary.addClass("hidden");
  });

} else {
  // console.log("No blocks exist on this page");
}




var related = $("#related-article-list");
if (related.length > 0) {
  
} else {
  // console.log("No related articles exist on this page");
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
// Fading event for the article cover, on scroll
// $(document).bind('scroll', fader); // Disable fader for now!





// Add title manually after comicbits slideshow
var cbSlides = $('.comicbits');
if (cbSlides.length != 0) {
  var title = $('.entry-title-holder').text();
  console.log(title);
  $('<h3 class="entry-title">' + title + '</h3>').insertAfter('.comicbits:last-of-type');
}




// Contact form validation
var contactForm = $('form#contactForm');
if (contactForm.length > 0) {
	contactForm.submit(function() {
		$('form#contactForm .error').remove();
		var hasError = false;
		$('.requiredField').each(function() {
			if(jQuery.trim($(this).val()) == '') {
				var labelText = $(this).prev('label').text();
				$(this).parent().append('<label class="error">请输入您的'+labelText+'。</label>');
				hasError = true;
			} else if($(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim($(this).val()))) {
					var labelText = $(this).prev('label').text();
					$(this).parent().append('<label class="error">您输入的'+labelText+'格式不正确。</label>');
					hasError = true;
				}
			}
		});
		if(!hasError) {
			$('form#contactForm button').fadeOut('normal', function() {
				$(this).parent().append('<img src="/wp-content/themes/td-v3/images/template/loading.gif" alt="Loading&hellip;" height="31" width="31" />');
			});
			var formInput = $(this).serialize();
			$.post($(this).attr('action'),formInput, function(data){
				contactForm.slideUp("fast", function() {				   
					$(this).before('<div class="thanks"><h3>感谢您对漫言的支持。</h3><p>您的来件已顺利提交，我们会抽空仔细阅读，谢谢！</p></div>');
				});
			});
		}
		
		return false;
		
	});
} else {
  // Contact form does not exist.
}