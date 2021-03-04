  function carousel(){
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "module/home/controller/controller_home.php?op=carousel"
      })
      .done(function( data ) {
        for (row in data) {
          $('<div></div>').attr('class',"carousel__elements").attr('id', data[row].categoria).appendTo(".carousel__list").html( 
            "<img class='carousel__img' id='' src='"+ data[row].list +"' alt=''>"
          )
        }

        window.addEventListener('load', function(){
          new Glider(document.querySelector('.carousel__list'),{ 
            slidesToShow: 1,
            dots: '.carousel__indicator',
            draggable: true,
            arrows: {
                prev: '.carousel__prev',
                next: '.carousel__next'
            }
          });
        });

      })
      .fail(function( textStatus ) {
        if ( console && console.log ) {
            console.log( "La solicitud ha fallado: " +  textStatus);
        }
      });    
  }

  function categoria(){
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "module/home/controller/controller_home.php?op=categorias"
      })

      .done(function( data ) {
          for (row in data) {
              $('<div></div>').attr('class',"services__content").appendTo(".cat").html( 
                  "<img src='"+ data[row].link +"' alt='' class='services__img' id='"+ data[row].categoria +"'>"+        
                  "<h3 class='services__title'>"+ data[row].categoria +"</h3>"
              )
          }
      })
      .fail(function( jqXHR, textStatus, errorThrown ) {
        if ( console && console.log ) {
            console.log( "La solicitud ha fallado: " +  textStatus);
        }
      });    
  }

  function clicks(){
  
    $(document).on("click",'div.carousel__elements', function (){
      var filters = [];
      filters.push({"categoria":[this.getAttribute('id')]});
      localStorage.removeItem('filters')
      localStorage.setItem('filters', JSON.stringify(filters)); 
        setTimeout(function(){ 
          window.location.href = 'index.php?page=controller_shop&op=view';
        }, 1000);  
    }); 

    $(document).on("click",'img.services__img', function (){
      var filters = [];
      filters.push({"categoria":[this.getAttribute('id')]});
      localStorage.removeItem('filters')
      localStorage.setItem('filters', JSON.stringify(filters)); 
        setTimeout(function(){ 
          window.location.href = 'index.php?page=controller_shop&op=view';
        }, 1000);  
    });

    $(document).on("click",'img.brand__img', function (){
      var filters = [];
      filters.push({"marca":[this.getAttribute('id')]});
      localStorage.removeItem('filters')
      localStorage.setItem('filters', JSON.stringify(filters)); 
        setTimeout(function(){ 
          window.location.href = 'index.php?page=controller_shop&op=view';
        }, 1000);  
    });

  } 

  function brands(loadeds = 0){
    let items = 3;
    let loaded = loadeds;
    
      ajaxPromise("module/home/controller/controller_home.php?op=brands", 'POST', 'JSON', {items: items, loaded: loaded})
      .then(function(data) {
        for (row in data) {
          let brands = data[row].brand.replace(/ /g, "_"); 
          $('<div></div>').attr({'id': brands, 'class':'brand__content'}).html(
            "<img src='"+ data[row].img +"' alt='' class='brand__img' id='"+ data[row].brand +"'>").appendTo('.results');
        }
      }).catch(function() {
          //window.location.href = 'index.php?page=error503';
      }); 

  }

  function load_more() {
      ajaxPromise("module/home/controller/controller_home.php?op=count_brands", 'POST', 'JSON')
      .then(function(data) {
        total_items = data[0].count;
        brands();
        $(document).on("click",'button.load_more', function (){
          var items = $('.brand__content').length + 3;
          if (total_items <= items) {
            $('.brand__button').empty();
          }
          brands($('div.brand__content').length);
        });
      }).catch(function() {
        console.log('error total_items');
      }); 
  }

  $(document).ready(function(){

    categoria();
    carousel();
    clicks();
    load_more();
    //api();

  });