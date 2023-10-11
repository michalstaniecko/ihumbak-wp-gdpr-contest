class Offcanvas {
  element;

  config;

  _shown = false;

  showClass = "ih-gdpr-offcanvas-show";
  transitionClass = "ih-gdpr-offcanvas-transition";

  events = {
    shown: new Event("offcanvas.shown"),
    hidden: new Event("offcanvas.hidden"),
  };

  constructor(element, config = null) {
    this.element = element;
    this.config = config;

    this.customEventListeners();
    this.transitionEvents();
  }

  on(eventName, callback) {
    console.log(eventName, callback);
  }

  customEventListeners() {
    const shownEvent = new Event("offcanvas.shown");
  }

  transitionEvents() {
    this.element.addEventListener(
      "transitionend",
      this.transitionendHandler.bind(this)
    );
  }

  transitionendHandler(e) {
    if (e.target !== this.element) return;

    if (e.target.classList.contains(this.showClass)) {
      this.element.dispatchEvent(this.events.shown);
    } else {
      this.element.dispatchEvent(this.events.hidden);
      this.bodyOverflow("auto");
    }

    this.element.classList.remove(this.transitionClass);
  }

  overlay() {}

  show() {
    this.element.classList.add(this.transitionClass);
    this.element.classList.add(this.showClass);
    this.bodyOverflow("hidden");
  }

  hide() {
    this.element.classList.add(this.transitionClass);
    this.element.classList.remove(this.showClass);
  }

  bodyOverflow(overflow) {
    document.body.style.overflow = overflow;
  }
}

export default Offcanvas;
