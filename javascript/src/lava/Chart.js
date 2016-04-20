/* jshint undef: true */
/* globals document, google, require, module */

module.exports = (function() {
    "use strict";

    /**
     * Chart Class
     *
     * @constructor
     */
    function Chart (type, label) {
        this.type      = type;
        this.label     = label;
        this.element   = null;
        this.chart     = null;
        this.package   = null;
        this.data      = {};
        this.options   = {};
        this.formats   = [];
        this.draw      = function(){};
        this.init      = function(){};
        this.configure = function(){};
        this.render    = function(){};
        this.pngOutput = false;
        this._errors   = require('./Errors.js');
    }

    Chart.prototype.setData = function (data) {
        this.data = new google.visualization.DataTable(data);
    };

    Chart.prototype.setOptions = function (options) {
        this.options = options;
    };

    Chart.prototype.setPngOutput = function (png) {
        this.pngOutput = Boolean(typeof png == 'undefined' ? false : png);
    };

    Chart.prototype.setElement = function (elemId) {
        this.element = document.getElementById(elemId);

        if (! this.element) {
            throw new this._errors.ElementIdNotFound(elemId);
        }
    };

    Chart.prototype.redraw = function() {
        this.chart.draw(this.data, this.options);
    };

    Chart.prototype.drawPng = function() {
        var img = document.createElement('img');
            img.src = this.chart.getImageURI();

        this.element.innerHTML = '';
        this.element.appendChild(img);
    };

    Chart.prototype.applyFormats = function (formatArr) {
        for(var a=0; a < formatArr.length; a++) {
            var formatJson = formatArr[a];
            var formatter = new google.visualization[formatJson.type](formatJson.config);

            formatter.format(this.data, formatJson.index);
        }
    };

    return Chart;
})();
