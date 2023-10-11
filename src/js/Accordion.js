class Accordion {
  element;

  showClass = "ih-gdpr-accordion-show";

  constructor(element) {
    this.element = element;
  }

  show() {
    this.element.classList.add(this.showClass);
  }

  hide() {
    this.element.classList.remove(this.showClass);
  }
}

export default Accordion;
