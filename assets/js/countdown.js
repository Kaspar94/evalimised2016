/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(
    function () {
    $("#countdown").countdown($('#date').text().toString(), function (event) {
        $(this).html(event.strftime(''
            + '<span class="cd-number">%D</span> päeva '
            + '<span class="cd-number">%H</span> tundi '
            + '<span class="cd-number">%M</span> minutit '
            + '<span class="cd-number">%S</span> sekundit'
        ));
    });
});
