import Splide from "@splidejs/splide";

class IntroSection {
  constructor() {
    this.slider = document.querySelector('[data-intro-slider]');

    this.initSlider(this.slider);
  }

  initSlider(element) {
    new Splide(element, {
      type: 'loop',
      perPage: 1,
      speed: 1500,
      perMove: 1,
      autoplay: true,
      pauseOnHover: false,
      pauseOnFocus: false,
      interval: 5000,
      arrows: true,
      pagination: false,
      breakpoints: {}
    }).mount();
  }
}

document.addEventListener('DOMContentLoaded', function () {
  new IntroSection();
});

