/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var date = "2016/05/05";
function sortTulemused(str){
    
}
// http://hilios.github.io/jQuery.countdown/examples/legacy-style.html
$(document).ready(function () {
    $("#countdown").countdown(date, function (event) {
        $(this).html(event.strftime(''
            + '<span class="cd-number">%D</span> päeva '
            + '<span class="cd-number">%H</span> tundi '
            + '<span class="cd-number">%M</span> minutit '
            + '<span class="cd-number">%S</span> sekundit'
        ));
    });
    $('#tabel').tablesorter();

    (function ($) {
        $('#otsing').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        });

    }(jQuery));
    (function () {
        $('ul').on('click','li',function () {

            var rex = new RegExp($(this).text(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        });

    }(jQuery));
    (function () {
        $('#koik').click(function () {

            var rex = new RegExp($, 'i');
            $('.searchable tr').show();

        });

    }(jQuery));

});