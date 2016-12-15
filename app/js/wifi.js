/**
 * Created by root on 12/12/16.
 */
$( document ).ready(function() {

   $(".sumbit").click(function () {
        $.post("../../index.php", {wf: true}, function(data){
            $("#refresh").empty();
            for(var i=0; i < data.length; i++){
                $("#refresh").append("<tr><td>"+data[i]["id"]+"</td>" +
                    "<td>"+data[i]["name"]+"</td>"+
                    "<td>"+data[i]["station_mac"]+"</td>"+
                    "<td>"+data[i]["first_time_seen"]+"</td>"+
                    "<td>"+data[i]["last_time_seen"]+"</td>"+
                    "<td><div class='btn-group'><button data-toggle='modal' data-target='.bd-example-modal-lg' id='details' class='btn btn-default' value="+data[i]["id"]+">Detalles</button></td></tr>");
            }
        });
    });

    $(document).on('click', '#details', function() {
        var id = $("#details").val();
        $.ajax({
            dataType: "json",
            method: "GET",
            data: {get_wf: true ,id: id},
            url: "../../index.php",
            success: function(datos, textStatus, jqXHR) {
                console.log(datos);
                $('#nameStation').val(datos['name']);
                $('#mac').val(datos['station_mac']);
                $('#first_see').val(datos['first_time_seen']);
                $('#last_see').val(datos['last_time_seen']);
                $('#rssi').val(datos['rssi']);
                $('#package').val(datos['number_of_packets']);
                $('#lat').val(datos['geo_lat']);
                $('#lon').val(datos['geo_lon']);
                $('#bssid').val(datos['bssid']);

            }

        });
    });




    $(".close").click(function(){
        $("#myAlert").alert("close");
        $("#AlertDanger").alert("close");
    });

    $(".bluetooth").click(function(){
        $(location).attr('href', 'bluetooth.html');
    });

    $('#myAlert').hide();
    $('#AlertDanger').hide();
    $(".delete").click(function () {
        if (confirm('¿Estas seguro de querer borrar la BD?')) {
            $.post("../../index.php", {drop_wf: true},function(data){
                $('#myAlert').show();
            });
        } else {
            $('#AlertDanger').show();
        }

    });
});