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
    this.preloader();
    this.lightBoxInit();
    this.thankYouMessage();
    this.emptyLinkScrollPrevent();
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
    window.addEventListener('scroll', () => {
      if (window.scrollY > 200) {
        this.header.classList.add('fixed');
      } else {
        this.header.classList.remove('fixed');
      }
    });
  }

  preloader() {
    window.addEventListener('DOMContentLoaded', () => {
      document.querySelector('[data-preloader]').classList.add('loaded');
      this.body.classList.remove('overflow-hidden');
    });
  }

  lightBoxInit() {
    const lightBoxButtons = document.querySelectorAll('[data-lightbox-btn]');
    const lightBoxContent = document.querySelectorAll('[data-lightbox-content]');
    const closeLightBox = document.querySelectorAll('[data-close-lightbox]');

    function showContent(content) {
      content.classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function hideContent(content) {
      content.classList.remove('active');
      document.body.style.overflow = 'auto';
    }

    lightBoxButtons.forEach((btn) => {
      btn.addEventListener('click', () => {
        const btnDataAttr = btn.getAttribute('data-lightbox-btn');

        lightBoxContent.forEach((content) => {
          const contentDataAttr = content.getAttribute('data-lightbox-content');

          if (!contentDataAttr) return;

          if (btnDataAttr === contentDataAttr) {
            showContent(content);
          } else {
            hideContent(content);
          }
        });
      });
    });

    closeLightBox.forEach((closeBtn) => {
      closeBtn.addEventListener('click', () => {
        document.body.style.overflow = 'auto';
        const contentBlock = closeBtn.closest('[data-lightbox-content]');
        if (contentBlock) {
          hideContent(contentBlock);
        }
      });
    });

    document.addEventListener('click', (e) => {
      if (e.target.matches('.pc-lightbox')) {
        lightBoxContent.forEach((content) => {
          hideContent(content);
        });
      }
    });
  }

  thankYouMessage() {
    const showThankYou = (event) => {
      let formId = event.detail.unitTag;
      if (!formId) return;

      let message = document.querySelector('[data-message]');
      message.classList.add('form-sent');
    }
    document.addEventListener('wpcf7mailsent', showThankYou);
  }

  emptyLinkScrollPrevent() {
    const links = [...document.querySelectorAll('a[href="#"]')];
    links.map(link => link.addEventListener('click', (e) => e.preventDefault()));
  }
}
