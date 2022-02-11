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

    // var bannerPreview = $('#banner-preview-image');
    var blogFeatureImage = $("#account-upload-img");
    var blogImageInput = $("#account-upload");

    // Change featured image
    if (blogImageInput.length) {
        $(blogImageInput).on("change", function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (blogFeatureImage.length) {
                    blogFeatureImage.attr("src", reader.result);
                    // bannerPreview.attr('data-src', reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
        });
    }
})(window, document, jQuery);
