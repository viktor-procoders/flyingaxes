import Splide from "@splidejs/splide";

class IntroSection {
  constructor() {
    this.slider = document.querySelectorAll('[data-intro-slider]');

    this.initSlider(this.slider);
  }

  initSlider(elements) {
    elements.forEach(element => {
      new Splide(element, {
        type: 'loop',
        perPage: 1,
        speed: 1500,
        autoHeight: true,
        perMove: 1,
        autoplay: true,
        pauseOnHover: false,
        pauseOnFocus: false,
        interval: 5000,
        arrows: true,
        pagination: false,
        breakpoints: {}
      }).mount();
    });
  }
}

document.addEventListener('DOMContentLoaded', function () {
  new IntroSection();
});

