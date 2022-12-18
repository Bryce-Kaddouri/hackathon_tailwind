setInterval(function () {
    $.ajax({
        type: "GET",
        url: "ajax/ajax.php",
        data: "action=tabScore",
        dataType: "json",
        success: function (response) {
            $('.tabScore').empty();
            var body = '';
            for (var i = 0; i < response.partie.length; i++) {
                var color = 'grey';
                var image = '';
                if (i == 0) {
                    var image = '<img  class="w-20 h-20 mx-auto" id="premier" src="images/rewards.png" alt="">';
                    var color = '#70c17b';
                } else if (i == 1) {
                    image = '<img class="w-20 h-20 mx-auto" id="deuxieme" src="images/silver-medal.png" alt="">';
                    color = '#f2e783';
                } else if (i == 2) {
                    image = '<img class="w-20 h-20 mx-auto" id="troisieme" src="images/medal.png" alt="">';
                    var color = '#fecb7e';
                }
                body += '<tr  class="h-20" style="background-color:' + color + ';font-size:25px" >';
                body += '<td class="text-center"> #' + (i + 1) + '</td>';
                body += '<td class="text-center">' + response.partie[i].equipe + '</td>';
                body += '<td class="text-center">' + image + '</td>';
                body += '<td class="text-center">' + response.partie[i].score + '</td>';
                body += '</tr>';
            }
            $('.tabScore').append(body);
            $('.tabScore tr').css('border', '2px solid black');
            $('.tabScore tr').css('border', '2px solid black');
        }
    });
}, 1000);