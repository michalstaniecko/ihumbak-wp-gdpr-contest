import { cookies } from "./cookie.class";
//import AdsConversions from "./ads-conversions";
import Offcanvas from "./Offcanvas";
import Accordion from "./Accordion";
import TrackingCodes from "./TrackingCodes";

export default class GDPR {
  scripts;

  categories = {};

  config = {
    cookieName: "gdpr_selected",
    cookieExpires: 30,
  };

  trackingCodes = [];

  settingsExtended = false;

  gdprCheckboxContainer = document.querySelector(".gdpr__checkbox-container");
  gdprSubmitAll = document.querySelector(".gdpr__submit-all");
  gdprSubmitSelected = document.querySelector(".gdpr__submit-selected");
  gdprCheckboxes = document.querySelectorAll(".gdpr__checkbox");
  gdprOffcanvas = document.querySelector("#offcanvasGdpr");
  gdprToggleSettings = document.querySelector(".ih-gdpr__settings-toggler");
  gdprAccordion = document.querySelector(".ih-gdpr-accordion");
  gdprDisplayNoneClass = "ih-gdpr--d-none";

  constructor(scripts, types) {
    this.scripts = scripts;
    types.forEach((type) => {
      this.categories[type.id] = Number(type.enable) === 1;
    });

    this.generateTrackingCodes();

    this.setTrackingCodesFromStorage();

    this.gdprCheckboxContainer.addEventListener(
      "change",
      this.change.bind(this)
    );
    this.gdprSubmitAll.addEventListener("click", this.submitAll.bind(this));
    this.gdprSubmitSelected.addEventListener("click", this.submit.bind(this));
    this.gdprToggleSettings.addEventListener(
      "click",
      this.toggleGDPRsettings.bind(this)
    );
  }

  generateTrackingCodes() {
    if (!this.scripts) return;

    this.trackingCodes = this.scripts.map((item) => {
      return new TrackingCodes(item.type_id, item.script);
    });
  }

  setTrackingCodesFromStorage() {
    const selectedGdpr = this.getGdprFromStorage();
    if (!selectedGdpr) {
      this.displayGDPR();
      return;
    }

    this.setCheckboxes(selectedGdpr).executeTrackingCodes();
  }

  setCheckboxes(selectedGdpr) {
    this.categories = selectedGdpr;
    this.gdprCheckboxes.forEach(
      (elem) => (elem.checked = this.categories[elem.value])
    );
    return this;
  }

  getGdprFromStorage() {
    return !cookies.get(this.config.cookieName)
      ? false
      : JSON.parse(cookies.get(this.config.cookieName));
  }

  displayGDPR() {
    this.offcanvas = new Offcanvas(this.gdprOffcanvas);
    this.offcanvas.show();
  }

  hideGDPR() {
    this.offcanvas.hide();
  }

  toggleGDPRsettings(e) {
    e.preventDefault();
    this.accordion = new Accordion(this.gdprAccordion);
    if (this.settingsExtended) this.collapseGDPR();
    if (!this.settingsExtended) this.extendGDPR();
    this.settingsExtended = !this.settingsExtended;
  }

  extendGDPR() {
    this.gdprSubmitSelected.classList.remove(this.gdprDisplayNoneClass);
    this.accordion.show();
  }

  collapseGDPR() {
    this.gdprSubmitSelected.classList.add(this.gdprDisplayNoneClass);
    this.accordion.hide();
  }

  change(e) {
    if (!e.target.closest(".gdpr__checkbox")) return;

    const value = e.target.value;

    this.categories[value] = !this.categories[value];
    return this;
  }

  submitAll() {
    for (const key of Object.keys(this.categories)) this.categories[key] = true;
    this.submit();
  }

  submit() {
    cookies.set(
      this.config.cookieName,
      JSON.stringify(this.categories),
      this.config.cookieExpires
    );
    this.executeTrackingCodes().setCheckboxes(this.categories).hideGDPR();
  }

  executeTrackingCodes() {
    this.trackingCodes.forEach((trackingCode) => {
      if (!this.categories[trackingCode.category]) return;
      trackingCode.execute();
    });
    return this;
  }
}

window.addEventListener("load", function () {
  new GDPR(ih_gdpr_scripts, ih_gdpr_types);
});
