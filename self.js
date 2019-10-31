function admins(param) {
 var param = param;

 $.ajax({
            url: eco_service['webservices'] + 'admins.php?param=all',
        }).done(function (data) {
            // alert(data);
            var data_array = data.split('\n');
            var len = data_array.length;

            var html = '';
            for (var i = 0; i < len - 1; ++i) {
                var inter = data_array[i].split('|');
                //alert(inter);
                html += '<tr><td class="action-checkbox"><input class="action-select" name="_selected_action" type="checkbox" value=' + inter[0] + ' /></td>';
                html += '<td><a href="" onClick = "editAdmin(' + inter[0] + ');return false;">' + inter[1] + '</a></td>';
                html += '<td>' + inter[2] + '</td><td>' + inter[3] + '</td><td>' + inter[4] + '</td><td>' + inter[5] + '</td><td>' + inter[6] + '</td>';//+inter[7]+'</td><td>'+inter[8]+'</td><td>'+inter[9]+'</td>';

                html += '<td>'+inter[7]+'</td>';
                if (inter[8] == true)
                    html += '<td><img src="img/icon-yes.gif" alt="True" /></td>';
                else
                    html += '<td><img src="img/icon-no.gif" alt="True" /></td>';
                if (inter[9] == true)
                    html += '<td><img src="img/icon-yes.gif" alt="True" /></td>';
                else
                    html += '<td><img src="img/icon-no.gif" alt="True" /></td>';
            }
            //alert(html);
            $('.tablee').html(html);
        });
}