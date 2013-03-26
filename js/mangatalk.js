// Including jQuery in WordPress (The Right Way)
// http://digwp.com/2009/06/including-jquery-in-wordpress-the-right-way/
var $j = jQuery.noConflict();

$j(function(){

  // Making the entire div clickable, by searching the inner hidden link.
  $j(".entry-masthead").click(function(){
    // var v = $(this).find("a").attr("href");
    // alert(v);
    window.location = $j(this).find("a").attr("href"); 
    // window.location = "http://g.cn"; 
    return false;
  });
});

$j(document).ready(function() {
	var stickyWidget = $j(".RandomPostWidget");
	var sidebar = $j("#secondary");
	var pos = sidebar.position().top + sidebar.height();
	alert(pos);                    
	$j(window).scroll(function() {
    var windowpos = $j(window).scrollTop();
    // s.html("Distance from top:" + pos.top + "<br />Scroll position: " + windowpos);
    if (windowpos >= pos) {
      stickyWidget.addClass("stick");
    } else {
      stickyWidget.removeClass("stick"); 
    }
	});
});