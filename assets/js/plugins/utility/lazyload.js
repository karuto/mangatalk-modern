(function($) {
  'use strict';

  var images;

  var reset = function() {
    images = [];
  };

  var findImages = function() {
    var i = 0;
    var query = $('img[data-src]').not('[src]');
    var len = query.length;
    for (i; i < len; i++) {
      images.push(query[i]);
    }
  };

  var loadImage = function(img) {
    if (img) {
      img = img instanceof jQuery ? img : $(img);
    } else {
      return false;
    }
    var actualImg = img.attr('data-src'); console.log(actualImg);
    var currentImg = img.attr('src');
    if(actualImg !== currentImg && actualImg !== undefined) {
      img.attr('src', actualImg).toggleClass('loaded', true);
    }
    return this;
  };

  /* jshint loopfunc: true */
  var processScroll = function() {
    var len = images.length;
    for (var i = 0; i < len; i++) {
      loadImage(images[i]);
    }
    while (len--) {
      if ($(images[len]).hasClass('loaded')) {
        images.splice(len, 1);
      }
    }
  };

  var lazyLoad = function() {
    reset();
    findImages();
    processScroll();
  };

  var loadImageDirect = function() {
    this.find('img[data-src]').each(function() {
      var img = $(this);
      var actualImg = img.attr('data-src');
      var currentImg = img.attr('src');
      if(actualImg !== currentImg && actualImg !== undefined) {
        img.attr('src', actualImg).toggleClass('loaded', true);
      }      
    });
    return this;
  };

  $.fn.lazyLoadImage = loadImageDirect;
  $.fn.lazyLoadAllImages = lazyLoad;
 
})(jQuery);