class Tabs {
  constructor() {
    this.tabs = document.querySelectorAll('[data-tab-title]');
    this.tabsContent = document.querySelectorAll('[data-tab-content]');

    this.init();
  }

  init() {
    this.tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        this.reset();
        const tabId = tab.dataset.tabTitle;
        tab.classList.add('active');
        this.showTab(tabId);
      });
    });
  }

  showTab(tabId) {
    this.tabsContent.forEach((content) => {
      if (content.dataset.tabContent === tabId) {
        content.classList.add('active');
      }
    });
  }

  reset() {
    this.tabs.forEach(tab => {
      tab.classList.remove('active');
    });
    this.tabsContent.forEach(content => {
      content.classList.remove('active');
    });
  }
}

document.addEventListener('DOMContentLoaded', () => {
  new Tabs();
});
