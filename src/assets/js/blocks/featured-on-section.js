import Splide from "@splidejs/splide";

class FeaturedOnSection {
  constructor() {
    this.slider = document.querySelectorAll('[data-reviews-slider]');

    this.initSlider(this.slider);
  }

  initSlider(elements) {
    elements.forEach(element => {
      new Splide(element, {
        type: 'slide',
        perPage: 3,
        speed: 1000,
        perMove: 1,
        drag: false,
        gap: 50,
        autoplay: false,
        pauseOnHover: false,
        pauseOnFocus: false,
        arrows: false,
        pagination: false,
        breakpoints: {
          992: {
            perPage: 1,
            drag: true,
            autoplay: true,
            interval: 3000,
            pauseOnHover: true,
            rewind: true,
            perMove: 1,
          },
          640: {
            arrows: true,
            autoplay: false,
            rewind: false,
            drag: true,
            perPage: 1,
          },
        }
      }).mount();
    });
  }
}

document.addEventListener('DOMContentLoaded', function () {
  new FeaturedOnSection();
});

