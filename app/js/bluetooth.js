/**
 * Created by root on 6/12/16.
 */
$( document ).ready(function() {


    $(".sumbit").click(function () {

        $.post("../../index.php", {bt: true} , function(data){
            $("#refresh").empty();
            for(var i=0; i < data.length; i++){
                $("#refresh").append("<tr><td>"+data[i]["id"]+"</td>" +
                    "<td>"+data[i]["client_name"]+"</td>"+
                    "<td>"+data[i]["client_mac"]+"</td>"+
                    "<td>"+data[i]["detection_time"]+"</td>"+
                    "<td><div class='btn-group hidden-xs'><button data-toggle='modal' " +
                    "data-target='.bd-example-modal-lg' id='details' name='details' class='btn btn-default detail' " +
                    "value="+data[i]["id"]+">Detalles</button></div></td></tr>");
            }
        });
    });


    $(document).on('click', '#details', function() {
        console.log($('#details').val());

        var id = $("#details").val();

        $('#numero').text($('#details').val());

        $.ajax({
            dataType: "json",
            method: "GET",
            data: {get_bt: true ,id: id},
            url: "../../index.php",
            success: function(datos, textStatus, jqXHR) {
                $('#nameStation').val(datos['client_name']);
                $('#mac').val(datos['client_mac']);
                $('#first_see').val(datos['detection_time']);
                $('#rssi').val(datos['rssi']);
                $('#lat').val(datos['geo_lat']);
                $('#lon').val(datos['geo_lon']);
            }

        });
    });


    $(".close").click(function(){
        $("#myAlert").alert("close");
        $("#AlertDanger").alert("close");
    });

    $(".wifi").click(function(){
        $(location).attr('href', 'wifi.html');
    });

    $('#myAlert').hide();
    $('#AlertDanger').hide();
    $(".delete").click(function () {
        if (confirm('¿Estas seguro de querer borrar la BD?')) {
            $.post("../../index.php", {drop_bt: true},function(data){
                $('#myAlert').show();
            });
        } else {
            $('#AlertDanger').show();
        }

    });
});
