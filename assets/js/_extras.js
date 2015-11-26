// Add title manually after comicbits slideshow
var cbSlides = $('.comicbits');
if (cbSlides.length) {
  var title = $('.entry-title-holder').text();
  console.log(title);
  $('<h3 class="entry-title">' + title + '</h3>').insertAfter('.comicbits:last-of-type');
}