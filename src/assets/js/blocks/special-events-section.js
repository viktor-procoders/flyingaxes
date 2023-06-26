import Splide from "@splidejs/splide";
import {AutoScroll} from '@splidejs/splide-extension-auto-scroll';

class SpecialEventsSection {
  constructor() {
    this.sliderTop = document.querySelectorAll('[data-links-ticker-1]');
    this.sliderBottom = document.querySelectorAll('[data-links-ticker-2]');

    this.initSlider(this.sliderTop, this.sliderBottom);
  }

  initSlider(sliderTop, sliderBottom) {
    sliderTop.forEach(element => {
      let slider = new Splide(element, {
        type: 'loop',
        autoWidth: true,
        rewind: true,
        perPage: 3,
        drag: 'free',
        arrows: false,
        pagination: false,
        direction: 'rtl',
        autoScroll: {
          speed: 0.5,
        },

        breakpoints: {
          767: {
            perPage: 2,
          },
          1023: {
            perPage: 3,
          },
        },
      });
      slider.mount({AutoScroll});
    });

    sliderBottom.forEach(element => {
      let slider = new Splide(element, {
        type: 'loop',
        autoWidth: true,
        rewind: true,
        perPage: 3,
        drag: 'free',
        arrows: false,
        pagination: false,
        autoScroll: {
          speed: 0.5,
        },
        breakpoints: {
          767: {
            perPage: 2,
          },
          1023: {
            perPage: 3,
          },
        },
      });
      slider.mount({AutoScroll});
    });
  }
}

document.addEventListener('DOMContentLoaded', function () {
  new SpecialEventsSection();
});

