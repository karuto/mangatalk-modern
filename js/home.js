(function() {
  // init swiper
  new Swiper('.swiper-container', {
    // 启用 virtualTranslate 并自己设置 left：因为 swiper 默认使用 translate3d 有时会导致文字模糊
    virtualTranslate: true,
    roundLengths: true,
    loop: true,
    speed: 700,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    on: {
      setTranslate: function(translate) {
        this.wrapperEl.style.left = translate + "px";
      },
    },
  });
})();
