/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./js/plugin.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./js/plugin.js":
/*!**********************!*\
  !*** ./js/plugin.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

var registerPlugin = wp.plugins.registerPlugin;
var PluginSidebar = wp.editPost.PluginSidebar;
var __ = wp.i18n.__;
var el = wp.element.createElement;
var Text = wp.components.TextControl;
var FormFileUpload = wp.components.FormFileUpload;
var withSelect = wp.data.withSelect;
var withDispatch = wp.data.withDispatch;

var MyFormFileUpload = function MyFormFileUpload() {
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(FormFileUpload, {
    accept: "image/*",
    onChange: function onChange() {
      return console.log('new image');
    }
  }, "Upload");
};

var mapSelectToProps = function mapSelectToProps(select) {
  return {
    metaFieldValue: select('core/editor').getEditedPostAttribute('meta')['sidebar_plugin_meta_block_field']
  };
};

var mapDispatchToProps = function mapDispatchToProps(dispatch) {
  return {
    setMetaFieldValue: function setMetaFieldValue(value) {
      dispatch('core/editor').editPost({
        meta: {
          sidebar_plugin_meta_block_field: value
        }
      });
    }
  };
};

var MetaBlockField = function MetaBlockField(props) {
  return el(FormFileUpload, {
    label: 'Meta Block Field',
    value: props.metaFieldValue,
    accept: 'image/*',
    multiple: true,
    onChange: function onChange(content) {
      console.log('New image => ', content); // props.setMetaFieldValue(content);
    }
  });
};

var MetaBlockFieldWithData = withSelect(mapSelectToProps)(MetaBlockField);
var MetaBlockFieldWithDataAndActions = withDispatch(mapDispatchToProps)(MetaBlockFieldWithData);
registerPlugin('my-plugin-sidebar', {
  render: function render() {
    return el(PluginSidebar, {
      name: 'my-plugin-sidebar',
      icon: 'buddicons-topics',
      title: 'My plugin sidebar'
    }, el('div', {
      className: 'plugin-sidebar-content'
    }, el(MetaBlockFieldWithDataAndActions)));
  }
});

/***/ }),

/***/ "@wordpress/element":
/*!******************************************!*\
  !*** external {"this":["wp","element"]} ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["element"]; }());

/***/ })

/******/ });
//# sourceMappingURL=plugin.js.map