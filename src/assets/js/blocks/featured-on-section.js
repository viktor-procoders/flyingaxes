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
        speed: 1500,
        perMove: 1,
        drag: false,
        gap: 50,
        autoplay: false,
        pauseOnHover: false,
        pauseOnFocus: false,
        arrows: false,
        pagination: false,
        breakpoints: {
          768: {
            perPage: 1,
            drag: true,
            perMove: 1,
          },
          640: {
            arrows: true,
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

