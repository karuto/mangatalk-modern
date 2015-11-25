(function($) {
  'use strict';

  OT.createNS('OT.lazyLoad');

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
    img = img instanceof jQuery ? img : $(img);
    var actualImg = img.attr('data-src');
    var currentImg = img.attr('src');
    if(actualImg !== currentImg && actualImg !== undefined) {
      img.attr('src', actualImg).toggleClass('loaded', true);
    }
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

  OT.lazyLoad.init = _.once(lazyLoad);
  OT.lazyLoad.loadImage = loadImage;

})(jQuery);