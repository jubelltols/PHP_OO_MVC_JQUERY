
function google_maps(){
    $.ajax({
        url: "website/module/contact_us/controller/controller_contact.php?op=google_maps",
        type: 'POST',
        dataType: 'JSON'
    }).done(function(data) {

      var center = {lat: 38.47873974803766, lng: -1.3236673548167874};
      var map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 9,
                  center: center
                });  
      for (row in data) {
        console.log(data[row].longitud);
        let location = {lat: parseFloat(data[row].longitud), lng: parseFloat(data[row].latitud)}
        var contentString = '<div class="mpas__container">'+
                            '<div class="maps__title"><h3>'+data[row].lugar+'</h3></div>'+
                            '<div class="maps__content">'+
                            '<p>'+data[row].ciudad+'</p>'+
                            '<p>'+data[row].telefono+'</p>'+
                            '<p>'+data[row].horario+'</p>'+
                            '<p>'+data[row].direccion+'</p>'+
                            '</div>'+
                            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        var marker = new google.maps.Marker({
          position: location,
          map: map,
        });
        marker.addListener('click', function() {
          infowindow.open(marker.get('map'), marker);
        });
      }
    }).fail(function() {
        window.location.href = 'index.php?page=error503';
    });
}