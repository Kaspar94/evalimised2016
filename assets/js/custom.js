/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var date = "2016/05/05";
// http://hilios.github.io/jQuery.countdown/examples/legacy-style.html
var headers = Array();
var rows = Array();
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
    
    $(function () {
        headers = $("th", $("#tabel")).map(function () {
            var $s = this.innerHTML.replace(/<span(.*)>(.*)<\/span>/g, "");
            return $s;
        }).get();

        rows = $("tbody tr", $("#tabel")).map(function () {
            return [$("td", this).map(function () {
                    return this.innerHTML;
                }).get()];
        }).get();


    });
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
        $('#piirkonnad').on('click','li',function () {
            var rex = new RegExp($(this).text(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();
            createErakondChart($(this).text());

        });
    }(jQuery));
        (function () {
        $('#erakonnad').on('click','li',function () {
            var rex = new RegExp($(this).text(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();
            createLiigeChart($(this).text());
            
        });
    }(jQuery));
    (function () {
        $('#koik').click(function () {

            var rex = new RegExp($, 'i');
            $('.searchable tr').show();
            createErakondChart("");
        });
    }(jQuery));   

});
function createErakondChart($name){
    var newHeaders = Array();
    newHeaders[0] = headers[2];
    newHeaders[1] = headers[4];
    var newRows = Array();
    var j = 0;
    var arrayLength = rows.length;
    var total_votes = 0;
    var votes = {};
    for (var i = 0; i < arrayLength; i++) {
        if(rows[i][3] === $name || $name === ""){
            newRows[j++] = rows[i];
            total_votes += rows[i][4];
            if (rows[i][2] in votes) {
                votes[rows[i][2]] += rows[i][4];
            } else {
                votes[rows[i][2]] = rows[i][4];
            }
        }
    }
    //total_votes = 70;
    var v = 30;
    if($name === "")
        $name = "kogu riik";
    document.getElementById("chart").innerHTML = "<h3>Tulemused</h3>"+
            "<p>Valitud piirkond: "+$name+"<p>Kokku hääli: "+total_votes+"</p>";
    for (var key in votes) {
        if (votes.hasOwnProperty(key)) {
            //votes[key] = v;
            //v+=10;
            $("#chart").append('<div class="progress" style="width:500px;margin-bottom:0px;margin-top:20px;">' +
                    '<div class="progress-bar" id='+key+' role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;transition-duration: 3s;">' +
                    '<div class="text-left">'+key+': '+votes[key].toString()+' häält</div>' +
                    '</div></div>');

            $('#'+key).css("width", votes[key]*100/total_votes+"%");
            
            console.log(votes[key]+key);
            //alert(key + " -> " + votes[key]);
        }
    }  
}

function createLiigeChart($name){
    var newHeaders = Array();
    newHeaders[0] = headers[1];
    newHeaders[1] = headers[4];
    var newRows = Array();
    var j = 0;
    var arrayLength = rows.length;
    var total_votes = 0;
    var votes = {};
    for (var i = 0; i < arrayLength; i++) {
        if(rows[i][2] === $name || $name === ""){
            newRows[j++] = rows[i];
            total_votes += rows[i][4];
            if (rows[i][1] in votes) {
                votes[rows[i][1]] += rows[i][4];
            } else {
                votes[rows[i][1]] = rows[i][4];
            }
        }
    }
    //total_votes = 70;
    var v = 30;
    if($name === "")
        $name = "kogu riik";
    document.getElementById("chart").innerHTML = "<h3>Tulemused</h3>"+
            "<p>Valitud erakond: "+$name+"<p>Kokku hääli: "+total_votes+"</p>";
    for (var key in votes) {
        if (votes.hasOwnProperty(key)) {
            //votes[key] = v;
            //v+=10;
            var id = key.toString().replace(" ", "_");
            
            $("#chart").append('<div class="progress" style="width:500px;margin-bottom:0px;margin-top:20px;">' +
                    '<div class="progress-bar" id='+id+' role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;transition-duration: 3s;">' +
                    '<div class="text-left">'+key+': '+votes[key]+' häält</div>' +
                    '</div></div>');

            $('#'+id).css("width", votes[key]*100/total_votes+"%");
            
            console.log(votes[key]+" "+key);
            //alert(key + " -> " + votes[key]);
        }
    }  
}