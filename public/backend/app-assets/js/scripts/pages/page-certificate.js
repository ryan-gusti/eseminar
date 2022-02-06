/*=========================================================================================
	File Name: blog-edit.js
	Description: Blog edit field select2 and quill editor JS
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function (window, document, $) {
    "use strict";

    var pelaksanaPreview = $("#pelaksana-preview-image");
    var pelaksanaFeatureImage = $("#pelaksana-feature-image");
    var pelaksanaImageInput = $("#pelaksanaCustomFile");

    var pemateriPreview = $("#pemateri-preview-image");
    var pemateriFeatureImage = $("#pemateri-feature-image");
    var pemateriImageInput = $("#pemateriCustomFile");

    var logoPreview = $("#logo-preview-image");
    var logoFeatureImage = $("#logo-feature-image");
    var logoImageInput = $("#logoCustomFile");

    // Change featured logolaksana
    if (pelaksanaImageInput.length) {
        $(pelaksanaImageInput).on("change", function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (pelaksanaFeatureImage.length) {
                    pelaksanaFeatureImage.attr("src", reader.result);
                    pelaksanaPreview.attr("data-src", reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
        });
    }

    // Change featured image pelaksana
    if (pemateriImageInput.length) {
        $(pemateriImageInput).on("change", function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (pemateriFeatureImage.length) {
                    pemateriFeatureImage.attr("src", reader.result);
                    pemateriPreview.attr("data-src", reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
        });
    }

    if (logoImageInput.length) {
        $(logoImageInput).on("change", function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (logoFeatureImage.length) {
                    logoFeatureImage.attr("src", reader.result);
                    logoPreview.attr("data-src", reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
        });
    }
})(window, document, jQuery);
