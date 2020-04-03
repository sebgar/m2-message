define([
    'jquery',
    'Sga_Message/js/owl.carousel.min'
], function ($) {
    'use strict';

    $.widget('mage.message', {
        options: {},

        _create: function () {
            $(this.options.elements.container).owlCarousel(this.options.config);
        }
    });

    return $.mage.message;
});
