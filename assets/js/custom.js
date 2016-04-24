/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// http://hilios.github.io/jQuery.countdown/examples/legacy-style.html
//var date = 2016/07/07;
var headers = Array();
var rows = Array();
$(document).ready(
    function () { 
    var date = document.getElementById("date").innerHTML;
    $("#countdown").countdown(date, function (event) {
        $(this).html(event.strftime(''
            + '<span class="cd-number">%D</span> päeva '
            + '<span class="cd-number">%H</span> tundi '
            + '<span class="cd-number">%M</span> minutit '
            + '<span class="cd-number">%S</span> sekundit'
        ));
    });
    $('#tabel').tablesorter({sortList: [[4,1], [3,1]]});
    
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
            $('.searchable tr').show();
            createErakondChart("");
        });
    }(jQuery));
    
    setTimeout(function(){$("#koik").click(); }, 0);
        

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
            total_votes += parseInt(rows[i][4],10);
            if (rows[i][2] in votes) {
                votes[rows[i][2]] += parseInt(rows[i][4],10);
            } else {
                votes[rows[i][2]] = parseInt(rows[i][4],10);
            }
        }
    }
    //total_votes = 70;
    var v = 30;
    if($name === "")
        $name = "kogu riik";
    document.getElementById("chart").innerHTML = "<p>Valitud piirkond: "+$name+"<p>Kokku piirkonnas hääli: "+total_votes+"</p>";
    var sortedVotes = [];
    for (var vote in votes)
        sortedVotes.push([vote, votes[vote]]);
    sortedVotes.sort(function(a, b) {return b[1] - a[1];});
    for (var i = 0; i < sortedVotes.length; i++) {
            var id = sortedVotes[i][0].toString().replace(" ", "_");
            var h = 'häält';
            if(sortedVotes[i][1] === 1)
                h = 'hääl';
            $("#chart").append('<span>'+sortedVotes[i][0]+'</span><div class="progress" style="width:500px;margin-bottom:10px;margin-top:0px;">' +
                    '<div class="progress-bar" id='+id+' role="progressbar" aria-valuenow="'+sortedVotes[i][1]*100/total_votes+'" aria-valuemin="0" aria-valuemax="100" style="min-width: 0%;transition-duration: 3s;text-overflow: auto">' +
                    '<div class="text-left">'+sortedVotes[i][1]+' '+h+'</div>' +
                    '</div></div>');

            $('#'+sortedVotes[i][0]).css("width", sortedVotes[i][1]*100/total_votes+"%");
            
            console.log(sortedVotes[i][1]+sortedVotes[i][0]);
            //alert(key + " -> " + votes[key]);
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
            total_votes += parseInt(rows[i][4],10);
            if (rows[i][1] in votes) {
                votes[rows[i][1]] += parseInt(rows[i][4],10);
            } else {
                votes[rows[i][1]] = parseInt(rows[i][4],10);
            }
        }
    }
    //total_votes = 70;
    var v = 30;
    if($name === "")
        $name = "kogu riik";
    document.getElementById("chart").innerHTML ="<p>Valitud erakond: "+$name+"<p>Kokku erakonnal hääli: "+total_votes+"</p>";
    var sortedVotes = [];
    for (var vote in votes)
        sortedVotes.push([vote, votes[vote]]);
    sortedVotes.sort(function(a, b) {return b[1] - a[1];});  
    for (var i = 0; i < sortedVotes.length; i++) {
            var id = sortedVotes[i][0].toString().replace(" ", "_");
            var h = 'häält';
            if(sortedVotes[i][1] === 1)
                h = 'hääl';
            $("#chart").append('<span>'+sortedVotes[i][0]+'</span><div class="progress" style="width:500px;margin-bottom:10px;margin-top:0px;">' +
                    '<div class="progress-bar" id='+id+' role="progressbar" aria-valuenow="'+sortedVotes[i][1]*100/total_votes+'" aria-valuemin="0" aria-valuemax="100" style="min-width: 0%;transition-duration: 3s;text-overflow: auto">' +
                    '<div class="text-left">'+sortedVotes[i][1]+' '+h+'</div>' +
                    '</div></div>');

            $('#'+id).css("width", sortedVotes[i][1]*100/total_votes+"%");
            
            console.log(sortedVotes[i][1]+" "+sortedVotes[i][0]);
            //alert(key + " -> " + votes[key]);
    }  
}