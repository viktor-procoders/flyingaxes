import Splide from "@splidejs/splide";

class QuoteSection {
  constructor() {
    this.slider = document.querySelectorAll('.quotes-slider');

    this.initSlider(this.slider);
  }

  initSlider(elements) {
    elements.forEach(element => {
      new Splide(element, {
        type      : 'fade',
        speed     : 1500,
        autoplay  : true,
        rewind    : true,
        pagination: false,
        arrows    : false,
      }).mount();
    });
  }
}

document.addEventListener('DOMContentLoaded', function () {
});
  new QuoteSection();

