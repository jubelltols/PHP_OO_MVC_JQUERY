$(document).ready(function () {
    $('#table_crud').DataTable();

    $('#table_crud').on("click",".modaal", function () {
        var id = this.getAttribute('id');
        console.log(id);

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "module/crud/controller/controller_crud.php?op=read_modal&modal=" + id,
            })
            .done(function( data ) {
                console.log(data);
                    $('#modalcontent').empty();
                    $('name').html(data.nombre);
                    $('<div></div>').attr('id','details_modal').appendTo('#modalcontent');
                    $("#details_modal").html(
                        '<br><span><strong>Codigo producto:</strong><span id="codigo_producto">'+data.codigo_producto+'</span></span></br>'+
                        '<span><strong>Nombre:</strong>         <span id="nombre">'+data.nombre+'</span></span></br>'+
                        '<span><strong>Precio:</strong>         <span id="precio">'+data.precio+'</span></span></br>'+
                        '<span><strong>Talla:</strong>          <span id="talla">'+data.talla+'</span></span></br>'+
                        '<span><strong>Color:</strong>          <span id="color">'+data.color+'</span></span></br>'+
                        '<span><strong>Imagen:</strong>    <span id="descripcion">'+data.images+'</span></span></br>' +
                        '<span><strong>Sexo:</strong>    <span id="descripcion">'+data.sexo+'</span></span></br>' +
                        '<span><strong>Categoria:</strong>    <span id="descripcion">'+data.categoria+'</span></span></br>' +
                        '<span><strong>Descripcion:</strong>    <span id="descripcion">'+data.descripcion+'</span></span></br>' 
                    )
                    modal(data.nombre);
            }) 
            .fail(function( jqXHR, textStatus, errorThrown ) {
                if ( console && console.log ) {
                    console.log( "La solicitud ha fallado: " +  textStatus);
                }
            });
    });
 });

function modal(data){
    $("#details_modal").show();
    $("#details_modal").dialog({
        title:data,
        width: 450, 
        height: 450, 
        resizable: "false",
        modal: "true", 
        buttons: {
            Ok: function () {
                $(this).dialog("close");
            }
        },
        show: {
            effect: "fade",
            duration: 1000
        },
        hide: {
            effect: "fade",
            duration: 1000
        }
    });
}