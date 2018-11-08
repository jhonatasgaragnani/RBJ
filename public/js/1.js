webpackJsonp([1],{

/***/ 265:
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./rFooter/index": 278,
	"./rFooter/index.vue": 278,
	"./rPagination/index": 279,
	"./rPagination/index.vue": 279,
	"./rPlayer/index": 280,
	"./rPlayer/index.vue": 280
};
function webpackContext(req) {
	return __webpack_require__(webpackContextResolve(req));
};
function webpackContextResolve(req) {
	var id = map[req];
	if(!(id + 1)) // check for number or string
		throw new Error("Cannot find module '" + req + "'.");
	return id;
};
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = 265;

/***/ }),

/***/ 278:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_lib_selector_type_script_index_0_index_vue__ = __webpack_require__(298);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_lib_selector_type_script_index_0_index_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_lib_selector_type_script_index_0_index_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_3c5004be_hasScoped_false_node_modules_vue_loader_lib_selector_type_template_index_0_index_vue__ = __webpack_require__(347);
var disposed = false
var normalizeComponent = __webpack_require__(174)
/* script */

/* template */

/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_lib_selector_type_script_index_0_index_vue___default.a,
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_3c5004be_hasScoped_false_node_modules_vue_loader_lib_selector_type_template_index_0_index_vue__["a" /* default */],
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources\\assets\\js\\frontend\\components\\rFooter\\index.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] index.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-3c5004be", Component.options)
  } else {
    hotAPI.reload("data-v-3c5004be", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ 279:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_lib_selector_type_script_index_0_index_vue__ = __webpack_require__(299);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_lib_selector_type_script_index_0_index_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_lib_selector_type_script_index_0_index_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_b2a1a006_hasScoped_false_node_modules_vue_loader_lib_selector_type_template_index_0_index_vue__ = __webpack_require__(365);
var disposed = false
var normalizeComponent = __webpack_require__(174)
/* script */

/* template */

/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_lib_selector_type_script_index_0_index_vue___default.a,
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_b2a1a006_hasScoped_false_node_modules_vue_loader_lib_selector_type_template_index_0_index_vue__["a" /* default */],
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources\\assets\\js\\frontend\\components\\rPagination\\index.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] index.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-b2a1a006", Component.options)
  } else {
    hotAPI.reload("data-v-b2a1a006", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ 280:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_lib_selector_type_script_index_0_index_vue__ = __webpack_require__(300);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_lib_selector_type_script_index_0_index_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_lib_selector_type_script_index_0_index_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_4cde8a84_hasScoped_false_node_modules_vue_loader_lib_selector_type_template_index_0_index_vue__ = __webpack_require__(350);
var disposed = false
var normalizeComponent = __webpack_require__(174)
/* script */

/* template */

/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_cacheDirectory_node_modules_vue_loader_lib_selector_type_script_index_0_index_vue___default.a,
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_4cde8a84_hasScoped_false_node_modules_vue_loader_lib_selector_type_template_index_0_index_vue__["a" /* default */],
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources\\assets\\js\\frontend\\components\\rPlayer\\index.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] index.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-4cde8a84", Component.options)
  } else {
    hotAPI.reload("data-v-4cde8a84", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ 298:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.default = {
    computed: {
        string: function string() {
            return this.$store.getters['Config/key']['footer_text']['value'];
        }
    }
};

/***/ }),

/***/ 299:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.default = {
    name: 'Pagination',
    props: {
        getter: {
            type: String,
            required: true
        }
    },
    computed: {
        pagination: function pagination() {
            return this.$store.getters[this.getter];
        },
        length: function length() {
            if (!this.pagination) return;

            for (var length = 0, payload = 0; length < this.pagination.total; length += this.pagination.per_page, payload++) {}

            return payload;
        },

        page: {
            get: function get() {
                return this.$route.query.page;
            },
            set: function set(value) {
                this.$router.push({
                    query: {
                        page: value
                    }
                });
            }
        }
    },
    mounted: function mounted() {
        if (this.length) {
            if (this.page > this.length) {
                this.updatePage(1);
            }
        }

        if (!this.page) {
            this.updatePage(1);
        }
    },

    methods: {
        updatePage: function updatePage(value) {
            this.$router.push({
                query: {
                    page: value
                }
            });
        }
    }
};

/***/ }),

/***/ 300:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.default = {
    computed: {
        link: function link() {
            return this.$store.getters['Config/key']['player_url']['value'];
        },
        volumeIcon: function volumeIcon() {
            var volume = this.volume;

            if (volume > 50) return 'volume_up';else if (volume <= 50 && volume > 25) return 'volume_down';else if (volume <= 25 && volume > 0) return 'volume_mute';else if (volume <= 0) return 'volume_off';
        },
        volumeMedia: function volumeMedia() {
            return this.volume / 100;
        },
        isMuted: function isMuted() {
            return this.volume <= 0;
        }
    },
    data: function data() {
        return {
            loaded: false,
            playing: false,
            volume: 100,
            message: ''
        };
    },
    mounted: function mounted() {
        setTimeout(this.updateSchedule, 10);
        setInterval(this.updateSchedule, 5000);
    },

    methods: {
        _handlePlayingUi: function _handlePlayingUi(ev) {},
        _handleLoaded: function _handleLoaded(ev) {
            this.togglePlaying();
        },
        _handlePause: function _handlePause(ev) {},
        _handlePlay: function _handlePlay(ev) {},
        togglePlaying: function togglePlaying() {
            this.playing = !this.playing;

            this.playing ? this.$refs.audio.play() : this.$refs.audio.pause();
        },
        toggleVolume: function toggleVolume() {
            if (this.volume !== 0) this.volume = 0;else this.volume = 100;
        },
        updateSchedule: function updateSchedule() {
            var schedule = this.$store.getters['Schedules/current'].schedules.filter(function (schedule) {

                var getTime = function getTime(date, string) {
                    var arr = string.split(':');
                    date.setHours(parseInt(arr[0], 10));
                    date.setMinutes(parseInt(arr[1], 10));
                    return date.getTime();
                };

                var now = new Date().getTime();

                return now >= getTime(new Date(), schedule.pivot.starts_at) && now <= getTime(new Date(), schedule.pivot.ends_at);
            })[0];

            if (schedule) {
                var name = schedule.name.length > 60 ? schedule.name.slice(0, 57) + '...' : schedule.name;
                var speaker = schedule.speaker.length > 30 ? schedule.speaker.slice(0, 27) + '...' : schedule.speaker;
                this.message = 'No ar: ' + name + ' com ' + speaker;
            } else {
                this.message = 'Programação inativa';
            }
        }
    },
    watch: {
        volumeMedia: function volumeMedia(value) {
            this.$refs.audio.volume = value;
        }
    }
};

/***/ }),

/***/ 347:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('v-footer', [_c('span', {
    staticClass: "ml-2"
  }, [_vm._v(_vm._s(_vm.string))]), _vm._v(" "), _c('v-spacer'), _vm._v(" "), _c('span', {
    staticClass: "mr-2"
  }, [_vm._v("Criado por "), _c('a', {
    staticStyle: {
      "text-decoration": "none"
    },
    attrs: {
      "href": "//sites.xfind.com.br/",
      "closs": "black-text"
    }
  }, [_c('b', [_vm._v("XFind")])])])], 1)
}
var staticRenderFns = []
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-3c5004be", esExports)
  }
}

/***/ }),

/***/ 350:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', [_c('span', {
    staticClass: "hidden-sm-and-down",
    staticStyle: {
      "margin-right": "80px"
    }
  }, [_vm._v(_vm._s(_vm.message))]), _vm._v(" "), _c('v-chip', {
    staticClass: "elevation-2",
    staticStyle: {
      "margin-right": "80px",
      "position": "absolute",
      "bottom": "-25px",
      "right": "0"
    },
    attrs: {
      "id": "volume_control"
    }
  }, [_c('v-avatar', {
    staticStyle: {
      "cursor": "pointer"
    },
    on: {
      "click": _vm.toggleVolume
    }
  }, [_c('v-icon', {
    attrs: {
      "light": ""
    }
  }, [_vm._v(_vm._s(_vm.volumeIcon))])], 1), _vm._v(" "), _c('v-slider', {
    staticStyle: {
      "position": "relative",
      "top": "10px"
    },
    attrs: {
      "light": "",
      "thumb-label": "",
      "snap": "",
      "step": "10"
    },
    model: {
      value: (_vm.volume),
      callback: function($$v) {
        _vm.volume = $$v
      },
      expression: "volume"
    }
  })], 1), _vm._v(" "), _c('v-btn', {
    staticClass: "blue",
    attrs: {
      "dark": "",
      "fab": "",
      "absolute": "",
      "bottom": "",
      "right": ""
    },
    nativeOn: {
      "click": function($event) {
        $event.stopPropagation();
        _vm.togglePlaying($event)
      }
    }
  }, [_c('v-icon', [_vm._v(_vm._s(_vm.playing ? 'pause' : 'play_arrow'))])], 1), _vm._v(" "), _c('audio', {
    ref: "audio",
    staticStyle: {
      "display": "none"
    },
    attrs: {
      "src": _vm.link,
      "preload": "auto"
    },
    on: {
      "timeupdate": _vm._handlePlayingUi,
      "loadeddata": _vm._handleLoaded,
      "pause": _vm._handlePause,
      "play": _vm._handlePlay
    }
  })], 1)
}
var staticRenderFns = []
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-4cde8a84", esExports)
  }
}

/***/ }),

/***/ 365:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('v-layout', {
    attrs: {
      "row": "",
      "justify-space-around": ""
    }
  }, [_c('v-card', {
    attrs: {
      "light": ""
    }
  }, [_c('v-pagination', {
    attrs: {
      "length": _vm.length,
      "value": parseInt(_vm.page)
    },
    on: {
      "input": _vm.updatePage
    }
  })], 1)], 1)
}
var staticRenderFns = []
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-b2a1a006", esExports)
  }
}

/***/ })

});