/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/Accordion.js":
/*!*****************************!*\
  !*** ./src/js/Accordion.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
var Accordion = /*#__PURE__*/function () {
  function Accordion(element) {
    _classCallCheck(this, Accordion);
    _defineProperty(this, "element", void 0);
    _defineProperty(this, "showClass", "ih-gdpr-accordion-show");
    this.element = element;
  }
  _createClass(Accordion, [{
    key: "show",
    value: function show() {
      this.element.classList.add(this.showClass);
    }
  }, {
    key: "hide",
    value: function hide() {
      this.element.classList.remove(this.showClass);
    }
  }]);
  return Accordion;
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Accordion);

/***/ }),

/***/ "./src/js/Offcanvas.js":
/*!*****************************!*\
  !*** ./src/js/Offcanvas.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
var Offcanvas = /*#__PURE__*/function () {
  function Offcanvas(element) {
    var config = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
    _classCallCheck(this, Offcanvas);
    _defineProperty(this, "element", void 0);
    _defineProperty(this, "config", void 0);
    _defineProperty(this, "_shown", false);
    _defineProperty(this, "showClass", "ih-gdpr-offcanvas-show");
    _defineProperty(this, "transitionClass", "ih-gdpr-offcanvas-transition");
    _defineProperty(this, "events", {
      shown: new Event("offcanvas.shown"),
      hidden: new Event("offcanvas.hidden")
    });
    this.element = element;
    this.config = config;
    this.customEventListeners();
    this.transitionEvents();
  }
  _createClass(Offcanvas, [{
    key: "on",
    value: function on(eventName, callback) {
      console.log(eventName, callback);
    }
  }, {
    key: "customEventListeners",
    value: function customEventListeners() {
      var shownEvent = new Event("offcanvas.shown");
    }
  }, {
    key: "transitionEvents",
    value: function transitionEvents() {
      this.element.addEventListener("transitionend", this.transitionendHandler.bind(this));
    }
  }, {
    key: "transitionendHandler",
    value: function transitionendHandler(e) {
      if (e.target !== this.element) return;
      if (e.target.classList.contains(this.showClass)) {
        this.element.dispatchEvent(this.events.shown);
      } else {
        this.element.dispatchEvent(this.events.hidden);
        this.bodyOverflow("auto");
      }
      this.element.classList.remove(this.transitionClass);
    }
  }, {
    key: "overlay",
    value: function overlay() {}
  }, {
    key: "show",
    value: function show() {
      this.element.classList.add(this.transitionClass);
      this.element.classList.add(this.showClass);
      this.bodyOverflow("hidden");
    }
  }, {
    key: "hide",
    value: function hide() {
      this.element.classList.add(this.transitionClass);
      this.element.classList.remove(this.showClass);
    }
  }, {
    key: "bodyOverflow",
    value: function bodyOverflow(overflow) {
      document.body.style.overflow = overflow;
    }
  }]);
  return Offcanvas;
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Offcanvas);

/***/ }),

/***/ "./src/js/TrackingCodes.js":
/*!*********************************!*\
  !*** ./src/js/TrackingCodes.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
var TrackingCodes = /*#__PURE__*/function () {
  function TrackingCodes(category, script) {
    _classCallCheck(this, TrackingCodes);
    _defineProperty(this, "category", void 0);
    _defineProperty(this, "run", void 0);
    this.category = category;
    this.script = script;
    this._executed = false;
  }
  _createClass(TrackingCodes, [{
    key: "execute",
    value: function execute() {
      if (this._executed) return;
      var script = new Function(this.script);
      script();
      this._executed = true;
    }
  }]);
  return TrackingCodes;
}();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (TrackingCodes);

/***/ }),

/***/ "./src/js/app.js":
/*!***********************!*\
  !*** ./src/js/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ GDPR)
/* harmony export */ });
/* harmony import */ var _cookie_class__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./cookie.class */ "./src/js/cookie.class.js");
/* harmony import */ var _Offcanvas__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Offcanvas */ "./src/js/Offcanvas.js");
/* harmony import */ var _Accordion__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Accordion */ "./src/js/Accordion.js");
/* harmony import */ var _TrackingCodes__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./TrackingCodes */ "./src/js/TrackingCodes.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }

//import AdsConversions from "./ads-conversions";



var GDPR = /*#__PURE__*/function () {
  function GDPR(scripts, types) {
    var _this = this;
    _classCallCheck(this, GDPR);
    _defineProperty(this, "scripts", void 0);
    _defineProperty(this, "categories", {});
    _defineProperty(this, "config", {
      cookieName: "gdpr_selected",
      cookieExpires: 30
    });
    _defineProperty(this, "trackingCodes", []);
    _defineProperty(this, "settingsExtended", false);
    _defineProperty(this, "gdprCheckboxContainer", document.querySelector(".gdpr__checkbox-container"));
    _defineProperty(this, "gdprSubmitAll", document.querySelector(".gdpr__submit-all"));
    _defineProperty(this, "gdprSubmitSelected", document.querySelector(".gdpr__submit-selected"));
    _defineProperty(this, "gdprCheckboxes", document.querySelectorAll(".gdpr__checkbox"));
    _defineProperty(this, "gdprOffcanvas", document.querySelector("#offcanvasGdpr"));
    _defineProperty(this, "gdprToggleSettings", document.querySelector(".ih-gdpr__settings-toggler"));
    _defineProperty(this, "gdprAccordion", document.querySelector(".ih-gdpr-accordion"));
    _defineProperty(this, "gdprDisplayNoneClass", "ih-gdpr--d-none");
    this.scripts = scripts;
    types.forEach(function (type) {
      _this.categories[type.id] = Number(type.enable) === 1;
    });
    this.generateTrackingCodes();
    this.setTrackingCodesFromStorage();
    this.gdprCheckboxContainer.addEventListener("change", this.change.bind(this));
    this.gdprSubmitAll.addEventListener("click", this.submitAll.bind(this));
    this.gdprSubmitSelected.addEventListener("click", this.submit.bind(this));
    this.gdprToggleSettings.addEventListener("click", this.toggleGDPRsettings.bind(this));
  }
  _createClass(GDPR, [{
    key: "generateTrackingCodes",
    value: function generateTrackingCodes() {
      if (!this.scripts) return;
      this.trackingCodes = this.scripts.map(function (item) {
        return new _TrackingCodes__WEBPACK_IMPORTED_MODULE_3__["default"](item.type_id, item.script);
      });
    }
  }, {
    key: "setTrackingCodesFromStorage",
    value: function setTrackingCodesFromStorage() {
      var selectedGdpr = this.getGdprFromStorage();
      if (!selectedGdpr) {
        this.displayGDPR();
        return;
      }
      this.setCheckboxes(selectedGdpr).executeTrackingCodes();
    }
  }, {
    key: "setCheckboxes",
    value: function setCheckboxes(selectedGdpr) {
      var _this2 = this;
      this.categories = selectedGdpr;
      this.gdprCheckboxes.forEach(function (elem) {
        return elem.checked = _this2.categories[elem.value];
      });
      return this;
    }
  }, {
    key: "getGdprFromStorage",
    value: function getGdprFromStorage() {
      return !_cookie_class__WEBPACK_IMPORTED_MODULE_0__.cookies.get(this.config.cookieName) ? false : JSON.parse(_cookie_class__WEBPACK_IMPORTED_MODULE_0__.cookies.get(this.config.cookieName));
    }
  }, {
    key: "displayGDPR",
    value: function displayGDPR() {
      this.offcanvas = new _Offcanvas__WEBPACK_IMPORTED_MODULE_1__["default"](this.gdprOffcanvas);
      this.offcanvas.show();
    }
  }, {
    key: "hideGDPR",
    value: function hideGDPR() {
      this.offcanvas.hide();
    }
  }, {
    key: "toggleGDPRsettings",
    value: function toggleGDPRsettings(e) {
      e.preventDefault();
      this.accordion = new _Accordion__WEBPACK_IMPORTED_MODULE_2__["default"](this.gdprAccordion);
      if (this.settingsExtended) this.collapseGDPR();
      if (!this.settingsExtended) this.extendGDPR();
      this.settingsExtended = !this.settingsExtended;
    }
  }, {
    key: "extendGDPR",
    value: function extendGDPR() {
      this.gdprSubmitSelected.classList.remove(this.gdprDisplayNoneClass);
      this.accordion.show();
    }
  }, {
    key: "collapseGDPR",
    value: function collapseGDPR() {
      this.gdprSubmitSelected.classList.add(this.gdprDisplayNoneClass);
      this.accordion.hide();
    }
  }, {
    key: "change",
    value: function change(e) {
      if (!e.target.closest(".gdpr__checkbox")) return;
      var value = e.target.value;
      this.categories[value] = !this.categories[value];
      return this;
    }
  }, {
    key: "submitAll",
    value: function submitAll() {
      for (var _i = 0, _Object$keys = Object.keys(this.categories); _i < _Object$keys.length; _i++) {
        var key = _Object$keys[_i];
        this.categories[key] = true;
      }
      this.submit();
    }
  }, {
    key: "submit",
    value: function submit() {
      _cookie_class__WEBPACK_IMPORTED_MODULE_0__.cookies.set(this.config.cookieName, JSON.stringify(this.categories), this.config.cookieExpires);
      this.executeTrackingCodes().setCheckboxes(this.categories).hideGDPR();
    }
  }, {
    key: "executeTrackingCodes",
    value: function executeTrackingCodes() {
      var _this3 = this;
      this.trackingCodes.forEach(function (trackingCode) {
        if (!_this3.categories[trackingCode.category]) return;
        trackingCode.execute();
      });
      return this;
    }
  }]);
  return GDPR;
}();

window.addEventListener("load", function () {
  new GDPR(ih_gdpr_scripts, ih_gdpr_types);
});

/***/ }),

/***/ "./src/js/cookie.class.js":
/*!********************************!*\
  !*** ./src/js/cookie.class.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "cookies": () => (/* binding */ cookies)
/* harmony export */ });
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
var Cookies = /*#__PURE__*/function () {
  function Cookies() {
    _classCallCheck(this, Cookies);
  }
  _createClass(Cookies, [{
    key: "get",
    value: function get(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }
  }, {
    key: "set",
    value: function set(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
      var expires = "expires=" + d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
  }, {
    key: "remove",
    value: function remove(cname) {
      document.cookie = cname + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
  }]);
  return Cookies;
}();
var cookies = new Cookies();

/***/ }),

/***/ "./src/scss/main.scss":
/*!****************************!*\
  !*** ./src/scss/main.scss ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/public/js/ih-gdpr-public": 0,
/******/ 			"public/css/ih-gdpr-public": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkih_gdpr"] = self["webpackChunkih_gdpr"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["public/css/ih-gdpr-public"], () => (__webpack_require__("./src/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["public/css/ih-gdpr-public"], () => (__webpack_require__("./src/scss/main.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;