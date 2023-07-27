import Splide from "@splidejs/splide";

class IntroSection {
  constructor() {
    this.slider = document.querySelectorAll('[data-intro-slider]');

    this.initSlider(this.slider);
  }

  initSlider(elements) {
    elements.forEach(element => {
      new Splide(element, {
        type: 'slide',
        perPage: 1,
        speed: 1500,
        rewind:true,
        autoHeight: true,
        perMove: 1,
        autoplay: true,
        pauseOnHover: false,
        pauseOnFocus: false,
        interval: 4000,
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

