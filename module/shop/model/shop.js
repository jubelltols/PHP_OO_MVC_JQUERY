function load_filters() {

    var expanded = true;

    $(document).on('click','.selectBox',function () {
      
        var checkboxes = document.getElementById("checkboxes");
          if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
          } else {
            checkboxes.style.display = "none";
            expanded = false;
          }

    });  

    $.ajax({
        type: "GET",
        dataType: "json",
        url: "module/shop/controller/controller_shop.php?op=filters"
    })
    .done(function( data ) {
        if(data.length==0){
            $(".shop__details").empty();
            $(".filters__container").append('<div><h3>Su búsqueda no dió resultados.</h3></div>');
        }else{
            $(".shop__details").empty();
            /*for (row in data) {
                $('<label></label>').attr({'class': 'selectBox', 'id':row}).appendTo('.filters__content')
                .html(row.toUpperCase());
                $('<label></label>').attr({'class': row, 'id':'checkboxes'}).appendTo('.filters__content')
                .html();
                for (row_inner in data[row]) {
                    $('<div></div>').attr({'class': 'filters__input'}).appendTo('#checkboxes')
                    .html("<label for='talla' value='"+ data[row][row_inner][row] +"'>"+
                          "<input class='check' type='checkbox' id="+ row +" name="+ data[row][row_inner][row] +
                          " value='"+ data[row][row_inner][row] +"'/>"+ data[row][row_inner][row] +"</label>");                  
                }
            } */
            for (row in data) {
                $('<label></label>').attr({'class': 'filters__title'}).appendTo('.filters__content')
                .html(row.toUpperCase());
                for (row_inner in data[row]) {
                    $('<div></div>').attr({'class': 'filters__input'}).appendTo('.filters__content')
                    .html("<input class='check' type='checkbox' id="+ row +" name="+ data[row][row_inner][row] +" value='"+ data[row][row_inner][row] +"'/>" +
                    "<label for='talla' value='"+ data[row][row_inner][row] +"'>"+ data[row][row_inner][row] +"</label>");                  
                }
            }
            $(".filters__container").append(
                "<div class='filters__input'><input class='but  ton' name='Submit' type='button' id='filter' value='Filtrar' onclick='filters()'/></div>"+
                "</div></form>"
            ) 
        }
        load_list_products();
    })
    .fail(function( textStatus ) {
    if ( console && console.log ) {
        console.log( "La solicitud ha fallado: " +  textStatus);
    }
    });    
}

function filters(){

    var talla = [];
    var color = [];
    var categoria = [];
    var filters = [];
    
    localStorage.removeItem('filters');
    
    $.each($("input[id='talla']:checked"), function(){            
        talla.push($(this).val());
    });
    if(talla.length != 0){
        filters.push({"talla":talla});
    }

    $.each($("input[id='color']:checked"), function(){            
        color.push($(this).val());
    });
    if(color.length != 0){
        filters.push({"color":color});
    }

    $.each($("input[id='categoria']:checked"), function(){            
        categoria.push($(this).val());
    });
    
    if(categoria.length != 0){
        filters.push({"categoria":categoria});
    }

    if(filters.length != 0){
        localStorage.setItem('filters', JSON.stringify(filters));
    }

    document.filter.submit();
    document.filter.action="index.php?page=controller_shop.php?op=view";
}

function load_list_products(items_page = 12, total_prod = 0) {

    console.log("items_page: " + items_page);
    console.log("total_prod: " + total_prod);
    
    var filters = localStorage.getItem('filters') || false;
   
    if (filters != false) {
        var url = "module/shop/controller/controller_shop.php?op=filters_search&filters=" + filters;
        if ($('#remove__filters').length == 0) {
            $('<button></button>').attr({'class':'button', 'id': 'remove__filters'}).appendTo('.filters__container').html('Remove filters');
        }
    }else {
        $('#remove__filters').remove();
        var url = "module/shop/controller/controller_shop.php?op=list";
    }

    $.ajax({
        type: "POST",
        dataType: "json",
        url:url,
        data: {items_page: items_page, total_prod: total_prod}
    })
    .done(function( data ) {
        console.log(data);
        if(data.length==0){
            $('#list_product').empty();
            $(".shop__details").empty();
            $("#list_product").append('<div><h3>Su búsqueda no dió resultados.</h3></div>');
        }else{
            $('#list_product').empty();
            $(".shop__details").empty();
            for (row in data) {
                $("#list_product").append(
                    "<div class='list__product' id='"+ data[row].codigo_producto +"'> <div class='list__heart'> <i class='bx bx-heart'> </i> </div>"+
                    "<div class='list__imges'> <img class='list__img' src='"+ data[row].images +"'> </div>" +
                    "<div class='list__data' id='#'> <div class='list__brand'> <div>"+ data[row].nombre +"</div>" +
                    "<div class='list__price'>"+ data[row].precio +"</div> </div>" +
                    "<div class='list__descriptionc'> <div>"+ data[row].codigo_producto +"</div> </div> </div> </div>"
                )   
            }
        }  
    })
    .fail(function( textStatus ) {
        if ( console && console.log ) {
            console.log( "La solicitud ha fallado: " +  textStatus);
        }
    });    
}

function load_pagination(){

    if (localStorage.getItem('filters')) {
        var url = "module/shop/controller/controller_shop.php?op=count_filters&filters=" + localStorage.getItem('filters');
    }else {
        var url = "module/shop/controller/controller_shop.php?op=count";
    }

    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
    }).done(function(data) {
        var total_pages = 0;
        var total_prod = data[0].n_prod;

        if(total_prod >= 12){
            total_pages = total_prod % 12;
        }else{
            total_pages = 1;
        }
    
        console.log("total_prod: " + total_prod);
        console.log("total_pages: " + total_pages);

        $('#pagination').bootpag({
            total: total_pages,
            page: 1,
            maxVisible: total_pages
        }).on('page', function(event, num){
            total_prod = 12 * (num - 1);
            load_list_products(12, total_prod);
            $('html, body').animate({scrollTop: $(".list__content")});
        });

    }).fail(function() {
        console.log('Fail count');
    }); 

}

function click_details() {
    $(document).on('click','.list__product',function () {
        console.log(this.getAttribute('id'));
        localStorage.setItem('details', true);
        localStorage.setItem('codigo_producto',  $(this).attr('id'))
        location.reload();
    });
}

function load_details() {

    ajaxPromise("module/shop/controller/controller_shop.php?op=details&id=" + localStorage.getItem('codigo_producto'), 'GET', 'JSON')
    .then(function(data) { 
        console.log(data[0].codigo_producto);
        $.ajax({
            type: "POST",
            data: {id: data[0].codigo_producto},
            url: "module/shop/controller/controller_shop.php?op=most_visit"
        })
        .done(function( ) {
            console.log("Views updated");
        })
        .fail(function( ) {
            console.log('Error views updated');
        });    

        $('.list__content').empty();
        $('.filters__container').empty();
        $(".shop__details").append(
            "<div class='container py-xl-5 py-lg-3'> <div class='row'> <div class='col-lg-6 left-wthree-img text-right'> <img src='" + data[0].images +
            "' alt='' class='img-fluid mt-5'/> </div> <div class='col-lg-6 about-right-faq'> </br> </br> </br> </br> <h3 class='text-da'>" + data[0].nombre +
            "</h3> <ul class='w3l-right-book mt-4'> <li>Codigo producto: " + data[0].codigo_producto + " </li> <li>Nombre: " + data[0].nombre + " </li> <li>Precio: " + data[0].precio +
            " </li> <li>Talla: " + data[0].talla + " </li> <li>Color: " + data[0].color + " </li> <li>Descripcion: " + data[0].descripcion +
            " </li> </ul> <a href='index.php?page=controller_shop&op=view' class='btn button-style button-style-2 mt-sm-5 mt-4'>Volver</a> </div> </div> </div>"
        );
        load_api();
    }).catch(function() {
        window.location.href = 'index.php?page=error503'
    });  

}

function load_api() {
    var cont = 0;
    var url = "https://www.googleapis.com/books/v1/volumes?q=subject:sneakers";
    
        ajaxPromise(url, 'GET', 'JSON')
        .then(function(result){
            $('<div></div>').attr('class',"book__title").appendTo(".shop__details").html("<h3>Libros remondados: </h3>");
            $('<div></div>').attr('class',"cat").appendTo(".shop__details");
                for (row in result.items) {
                    if(cont < 5){
                        $('<div></div>').attr('class',"services__content").appendTo(".cat").html( 
                            "<img src='"+ result.items[row].volumeInfo.imageLinks.smallThumbnail +"' alt='' class='services__img' id='"+ result.items[row].volumeInfo.title +"'>"+        
                            "<h3 class='services__title'>"+ result.items[row].volumeInfo.title +"</h3>"
                        )
                    }
                    cont++;
                }
        })
        .catch(function(result){
            console.log("error api");
        });   
}

function remove_filters() {
    $(document).on('click', '#remove__filters', function() {
        localStorage.removeItem('filters');
        load_content();
    });
}

function load_content(){ 

    if (localStorage.getItem('details') == "true") {
        localStorage.setItem('details', "false");
        load_details();
    }else {
        load_filters();
        load_pagination();
        click_details();
    }
}

$(document).ready(function() {
    load_content();
});
