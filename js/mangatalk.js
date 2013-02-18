// Including jQuery in WordPress (The Right Way)
// http://digwp.com/2009/06/including-jquery-in-wordpress-the-right-way/
var $j = jQuery.noConflict();

$j(function(){

  
  $j(".entry-masthead").click(function(){
    var v = $(this).find("a").attr("href");
    alert(v);
    // window.location = $(this).find("a").attr("href"); 
    // window.location = "http://g.cn"; 
    return false;
  });


});