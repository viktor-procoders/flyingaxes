export class Main {
  constructor() {
    this.body = document.querySelector('body');
    this.header = document.querySelector('[data-header]');
    this.menuButtonOpen = document.querySelector('[data-open]');
    this.menuButtonClose = document.querySelector('[data-close]');
    this.offCanvas = document.querySelector('[data-offcanvas]');
    this.dropdownMenuToggle = document.querySelectorAll('[data-dropdown-menu-toggle]');

    this.mobileMenu();
    this.stickyHeader();
  }

  mobileMenu() {
    this.menuButtonOpen.addEventListener('click', (e) => {
      e.preventDefault();
      this.body.classList.add('overflow-hidden');
      this.offCanvas.classList.add('is-open');
    });

    this.menuButtonClose.addEventListener('click', (e) => {
      e.preventDefault();
      this.body.classList.remove('overflow-hidden');
      this.offCanvas.classList.remove('is-open');
    });

    this.dropdownMenuToggle.forEach((item) => {
      item.addEventListener('click', (e) => {
        e.preventDefault();
        item.classList.toggle('rotate');
        item.nextSibling.nextSibling.classList.toggle('is-open');

        if (item.nextSibling.nextSibling.style.height) {
          item.nextSibling.nextSibling.style.height = null;
        } else {
          item.nextSibling.nextSibling.style.height = `${item.nextSibling.nextSibling.scrollHeight}px`;
        }
      });
    });
  }

  stickyHeader() {
    let prevScrollpos = window.pageYOffset
    window.onscroll = function () {
      let currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        document.querySelector('[data-header]').classList.remove('fixed');
      } else {
        document.querySelector('[data-header]').classList.add('fixed');
      }
      prevScrollpos = currentScrollPos;
    }
  }
}
