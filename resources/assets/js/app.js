
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
require('vue-events');
Vue.prototype.$http = axios;

import Layzr from 'layzr.js';
import picturefill from 'picturefill';
require("cssrelpreload");
require('loadCSS');
window.onloadCSS = require("exports-loader?onloadCSS!onloadCSS");
window.loadCSS = loadCSS;
require('./scripts-after');

// picturefill
document.createElement("picture");
picturefill();
// And picturefill

function findAncestor(el, cls, count) {
    var c = count || 1000;
    while ((el = el.parentElement) && !el.classList.contains(cls)){
        if (!c) {
            return false;
        }
        c--;
    };
    return el;
}

window.instanceLayzr = Layzr({
    normal: 'data-normal',
    retina: 'data-retina',
    srcset: 'data-srcset',
    threshold: 0
});

instanceLayzr
    .on('src:before', image => {
        let hide = image.classList.contains('hide');
        let parents = hide ? 4 : 1;
        let el = findAncestor(image, 'progressive', parents);
        if (el) {
            if (hide) {
                image.addEventListener('load', event => {
                    let src = typeof image.currentSrc !== 'undefined' ? image.currentSrc : image.src;
                    el.style.backgroundImage = `url("${src}")`;
                })
            }
            el.classList.remove('progressive');
        }
    })
    .on('src:after', image => {
        if (image.tagName != "IMG") {
            image.style.backgroundImage = `url("${image.getAttribute('src')}")`;
            image.removeAttribute('src');
        }
        image.classList.remove('progressive');
    });

document.addEventListener('DOMContentLoaded', event => {
    instanceLayzr
        .update()           // track initial elements
        .check()            // check initial elements
        .handlers(true);     // bind scroll and resize handlers

    require.ensure(['./scripts'], function (scripts) {
        require('./scripts');
    });
});

$.fn.serializeObject = function () {
    var o = {};
    var a = this.serializeArray();

    $.each(a, function () {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};