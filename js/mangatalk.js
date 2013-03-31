// Including jQuery in WordPress (The Right Way)
// http://digwp.com/2009/06/including-jquery-in-wordpress-the-right-way/
var $j = jQuery.noConflict();

$j(function(){

  /* Make the sidebar sticky once user scrolls past the bottom of sidebar */

  // Retrieve divs with css selectors
  var stickyWidget = $j(".RandomPostWidget");
  var sidebar = $j("#secondary");
  // Get the bottom coordination of sidebar
  var pos = sidebar.position().top + sidebar.height();
  // alert(pos);                    

  $j(window).scroll(function() {
    // Get the current scrolling coordination
    var windowpos = $j(window).scrollTop();
    // s.html("Distance from top:" + pos.top + "<br />Scroll position: " + windowpos);
    if (windowpos >= pos) {
      // TODO: Currently there's a bug that the width went out of control once
      // it breaks out of the parent sidebar container (which defines width).
      // I put a temporary hack fix to enforce width but this is not ideal.
      stickyWidget.addClass("stick");
    } else {
      stickyWidget.removeClass("stick"); 
    }
  });



});

// Make the sidebar sticky once user scrolls past the bottom of sidebar
$j(document).ready(function() {

});