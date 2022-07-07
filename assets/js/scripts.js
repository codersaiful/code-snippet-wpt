jQuery(function ($) {
    'use strict';
    $(document).ready(function () {
        //Write your Script Here
        //Only for Frontend
        $(document.body).on('change','.wpt-table-template-changer-live',function(){
            $(this).closest('form').submit();
        });
    });
});