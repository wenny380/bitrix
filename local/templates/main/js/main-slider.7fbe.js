(window.webpackJsonp=window.webpackJsonp||[]).push([[25],{444:function(t,r,e){"use strict";e.r(r),e.d(r,"default",(function(){return C}));var i=e(136),n=e.n(i),s=e(96),a=e.n(s),o=e(97),c=e.n(o),u=e(98),l=e.n(u),d=e(7),h=e.n(d),p=e(134),f=e.n(p),k=e(52),v=e.n(k),w=e(53),y=e.n(w),_=e(135),b=e.n(_),S=e(17),T=e.n(S);e(466);function m(t,r){var e=n()(t);if(a.a){var i=a()(t);r&&(i=b()(i).call(i,(function(r){return c()(t,r).enumerable}))),e.push.apply(e,i)}return e}function O(t){for(var r=1;r<arguments.length;r++){var e=null!=arguments[r]?arguments[r]:{};r%2?m(Object(e),!0).forEach((function(r){f()(t,r,e[r])})):l.a?Object.defineProperties(t,l()(e)):m(Object(e)).forEach((function(r){Object.defineProperty(t,r,c()(e,r))}))}return t}var C=function(){function t(r,e,i){if(v()(this,t),!r)return!1;this.root=r,this.selector=e;this.params=O(O({},{}),i),this._init()}return y()(t,[{key:"_init",value:function(){this._matchHTML(),this._initSlick()}},{key:"_matchHTML",value:function(){this.sliderTrack=this.root.querySelector("[".concat(this.selector,"-track]")),this.arrowsContainer=this.root.querySelector("[data-arrows]"),this.arrows=h()(this.arrowsContainer.querySelectorAll("[data-direction]")),this.pauseButton=this.root.querySelector("[data-pause-button]")}},{key:"_initSlick",value:function(){var t,r,e=this;if(!this.sliderTrack)return!1;T()(this.sliderTrack).slick({prevArrow:b()(t=this.arrows).call(t,(function(t){return"prev"===t.dataset.direction})),nextArrow:b()(r=this.arrows).call(r,(function(t){return"next"===t.dataset.direction})),autoplay:!0,autoplaySpeed:5e3,pauseOnHover:!0,dots:!0,appendDots:".main-slider__controls",dotsClass:"main-slider__dots slider-dots"}),T()(this.pauseButton).on("click",(function(){T()(e.pauseButton).hasClass("active")?(T()(e.pauseButton).removeClass("active"),T()(e.sliderTrack).slick("slickPlay")):(T()(e.pauseButton).addClass("active"),T()(e.sliderTrack).slick("slickPause"),T()(e.sliderTrack).slick("slickSetOption","pauseOnHover",!1))}))}}]),t}()}}]);