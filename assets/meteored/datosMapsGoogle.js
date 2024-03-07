let map;

let markers = [];

$( document ).ready(function() {
    $('#slide-out').sidenav({menuWidth: 300, edge: 'right',draggable: true});
    $('#slide-out-2').sidenav({menuWidth: 300, edge: 'right',draggable: true});
    $('#slide-out-estacion').sidenav({menuWidth: 500,draggable: true});

    $('#aire').on('click', function () {
      $('#slide-out').sidenav('open');  
    });

    $('#radar').on('click', function () {
      $('#slide-out-2').sidenav('open');  
    })

    $('#leyenda').hide();

    initMap();
});

function initMap() {
  map = new google.maps.Map(document.getElementById("map-container"), {
    center: { lat: 19.180668532744217, lng: -103.798197674834 },
    zoom: 10,
    mapTypeControl: true,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
      position: google.maps.ControlPosition.TOP_LEFT,
    },
    zoomControl: true,
    zoomControlOptions: {
      position: google.maps.ControlPosition.TOP_LEFT,
    },
    scaleControl: true,
    streetViewControl: false
  });

  /*const simbologia = document.getElementById("simbologia");
  const div = document.createElement("div");

    div.innerHTML = '<div class="bar_text black-text">Valores particulas</div>' +
                        '<div class="bar_colors" style="background: linear-gradient(to right, green 0%, yellow 50%, red 100%);">' +
                          '<span style="width: 30%;">2</span>' +
                          '<span style="width: 30%;">0</span>' +
                          '<span style="width: 30%;">1</span>' +
                        '</div>'+
                    '</div>';
    simbologia.appendChild(div);

    map.controls[google.maps.ControlPosition.LEFT_CENTER].push(document.getElementById('simbologia'));*/

        //datos reales provisionales
        $.ajax({
            url: '/CampoColima/index.php/C_configuracion/getEstacionesActivas/',
            type: 'GET',
            dataType: 'json',
            async: true,
            success: function(data) {
                $.each(data, function(index, item) {
                    const markerEstaciones1 = new google.maps.Marker({
                        position: new google.maps.LatLng(item["Latitud"], item["Longitud"]),
                        title: item["Descripcion"],
                        icon:'/CampoColima/assets/img/icons/station.png',
                        map: map
                    });
                    // Evento click sobre el marker creado
                    markerEstaciones1.addListener('click', function() {
                        //$('#staticBackdrop').show();
                        obtenerDatosEstacion(item["No_Estacion"]);
                    });
                    markers.push(markerEstaciones1);

                });
            },
            error: function(xhr, status, error) {
              console.log('Error en la solicitud AJAX:', error);
            }
          });


      // capa de estaciones
      $("#radar").click(function(){
        deleteMarkers();
        const markerRadar1 = new google.maps.Marker({
                    position: new google.maps.LatLng(19.19306, -103.750288),
                    title: 'Casa Pruebas',
                    icon:'/CampoColima/assets/img/icons/station.png',
                    map: map
                });
        // Evento click sobre el marker creado
        markerRadar1.addListener('click', function() {
          $('#slide-out-estacion').sidenav('open');
        });
        markers.push(markerRadar1);


            });
      
      // capa de estaciones
            $("#estaciones").click(function(){
             deleteMarkers();
        const markerEstaciones1 = new google.maps.Marker({
                    position: new google.maps.LatLng(19.19306, -103.750288),
                    title: 'Casa Pruebas',
                    icon:'/CampoColima/assets/img/icons/station.png',
                    map: map
                });
        // Evento click sobre el marker creado
        markerEstaciones1.addListener('click', function() {
          $('#slide-out-estacion').sidenav('open');
        });
        markers.push(markerEstaciones1);

            });

        
        // capa O3
            $("#O3").click(function(){
              deleteMarkers();
              //map.removeOverlays();
        const O3_1 = new google.maps.Circle({
                    center: {lat: 19.2381902, lng: -103.7869256},
                    map,
                    strokeColor: "#FF0000",
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: "#FF0000",
                    fillOpacity: 0.35,
                    radius: 1000,
                    title: 'IMSS 3',
                    layer: 'overlayLayer',
                    content: '<div class="circle-gradient-red" height="1000px" onclick="overlay(200,19.2381902,-103.7869256)"></div>'
                });

            });

}

function obtenerDatosEstacion(estacion){
  //datos reales provisionales
  $.ajax({
      url: '/CampoColima/index.php/welcome/getLastDataAWS/'+ estacion,
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        getLayersActivos(data, estacion);
      },
      error: function(xhr, status, error) {
        console.log('Error en la solicitud AJAX:', error);
      }
    });
}

function getLayersActivos(data, estacion){
  var layersActivos;
  $.ajax({
      url: '/CampoColima/index.php/C_layers/getLayersActivos/',
      type: 'GET',
      dataType: 'json',
      async:true,
      success: function(layers) {
        //var measureListElement = $('#measureList');
        var tablaDatosElement = $('#tablaValores');
        var actualizarTablaElement = $('#actualizarTabla');
        var fechaRegistroElement = $('#fechaRegistro');
        var html = '<div class="table-responsive"><table class="table table-hover mb-0"><thead class="table-light"><tr><th>Variable</th><th>Lectura</th><th class="text-center">Medida</th></tr></thead><tbody>';
        var html_registro;
        // Recorrer los datos obtenidos y generar el contenido HTML
        $.each(data, function(index, item) {
            $.each(layers, function(index2, layer){
                if(item.n == layer.tag_AWS){
                  if (layer.tag_AWS == "no2" || layer.tag_AWS == "no" && item.v < 0) {
                    html += '<tr><td>' + layer.tag_etiqueta + '</td><th>0</th><td class="text-center">' + layer.tag_medida + '</td></tr>';
                  }else{
                    html += '<tr><td>' + layer.tag_etiqueta + '</td><th>' + item.v + '</th><td class="text-center">' + layer.tag_medida + '</td></tr>';
                  }
                    html_registro = item.timestamp;
                    }
                //html += '<tr><td>' + item.n + '</td><th>' + item.v + '</th><td>' + item.u + '</td></tr>';
                //html_registro = item.timestamp;
            });
        });
        html += '</tbody></table></div>'
        // Agregar el contenido HTML al elemento <div>
        //measureListElement.html(html);
        tablaDatosElement.html(html);
        var html_button = '<button type="button" class="btn btn-primary waves-effect btn-label waves-light w-lg" onclick="obtenerDatosEstacion(`'+estacion+'`)"><i class="bx bx-repeat label-icon"></i> Actualizar datos</button>'
        actualizarTablaElement.html(html_button);
        //console.log(html_registro);
        //var register = new Date(html_registro - (8 * 60 * 60));
        console.log(subtractTimeFromDate(html_registro,6));
        fechaRegistroElement.html(subtractTimeFromDate(html_registro,6));
        $('#slide-out-estacion').sidenav('open');
        //test
      },
      error: function(xhr, status, error) {
        console.log('Error en la solicitud AJAX:', error);
      }
    });
  return layersActivos;
}

function subtractTimeFromDate(objDate, intHours) {
    var numberOfMlSeconds = new Date(objDate).getTime();
    var addMlSeconds = (intHours * 60) * 60000;
    var newDateObj = new Date(numberOfMlSeconds - addMlSeconds);
    return newDateObj.toLocaleString();
}

function setMapOnAll(map) {
  for (let i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

function deleteMarkers() {
  hideMarkers();
  markers = [];
}

function hideMarkers() {
  setMapOnAll(null);
}


window.initMap = initMap;


            function overlay(valor,lat,lng){
              map.drawOverlay({
                    lat: lat,
                    lng: lng,
                    title: 'Valores',
                    content: '<div class="overlay">'+valor+'</div>'
                });
            }

            // capa de estaciones
            $("#estaciones").click(function(){
             

            });

            

      // capa PM 1
            $("#PM1").click(function(){
              map.removeMarkers();
              map.removeOverlays();
        map.drawOverlay({
                    lat: 19.2381902,
                    lng: -103.7869256,
                    title: 'IMSS 3',
                    layer: 'overlayLayer',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(200,19.2381902,-103.7869256)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    layer: 'overlayLayer',
                    title: 'Campus el Naranjo UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(100,19.1230279,-104.4003982)"></div>'
                });
        map.drawOverlay({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(150, 18.949891,-103.9000674)"></div>'
                });
        map.drawOverlay({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(150, 19.386539,-103.6373209)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(150,19.2636512,-103.7454782)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(100,19.1397537,-104.3188143)"></div>'
                });
        map.drawOverlay({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(160, 19.211456,-103.8061198)"></div>'
                });
        map.drawOverlay({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(200,19.0904002,-104.3022294)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(100,19.2409303,-103.7534398)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(150,19.2484924,-103.7012817)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(250,19.2611457,-103.6891561)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(150,19.1059995,-104.3415871)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(100,19.2698429,-103.7621104)"></div>'
                });

            });

      // capa PM 2.5
            $("#PM2_5").click(function(){
              map.removeMarkers();
              map.removeOverlays();
        map.drawOverlay({
                    lat: 19.2381902,
                    lng: -103.7869256,
                    title: 'IMSS 3',
                    layer: 'overlayLayer',
                    content: '<div class="circle-gradient-red" height="1000px" onclick="overlay(200,19.2381902,-103.7869256)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    layer: 'overlayLayer',
                    title: 'Campus el Naranjo UDC',
                    content: '<div class="circle-gradient-red" height="1000px" onclick="overlay(100,19.1230279,-104.4003982)"></div>'
                });
        map.drawOverlay({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(150, 18.949891,-103.9000674)"></div>'
                });
        map.drawOverlay({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(150, 19.386539,-103.6373209)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(150,19.2636512,-103.7454782)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    content: '<div class="circle-gradient-red" height="1000px" onclick="overlay(100,19.1397537,-104.3188143)"></div>'
                });
        map.drawOverlay({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(160, 19.211456,-103.8061198)"></div>'
                });
        map.drawOverlay({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    content: '<div class="circle-gradient-red" height="1000px" onclick="overlay(200,19.0904002,-104.3022294)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    content: '<div class="circle-gradient-red" height="1000px" onclick="overlay(100,19.2409303,-103.7534398)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(150,19.2484924,-103.7012817)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    content: '<div class="circle-gradient-red" height="1000px" onclick="overlay(250,19.2611457,-103.6891561)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(150,19.1059995,-104.3415871)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    content: '<div class="circle-gradient-red" height="1000px" onclick="overlay(100,19.2698429,-103.7621104)"></div>'
                });

            });

      // capa PM 10
            $("#PM10").click(function(){
              map.removeMarkers();
              map.removeOverlays();
        map.drawOverlay({
                    lat: 19.2381902,
                    lng: -103.7869256,
                    title: 'IMSS 3',
                    layer: 'overlayLayer',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(200,19.2381902,-103.7869256)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    layer: 'overlayLayer',
                    title: 'Campus el Naranjo UDC',
                    content: '<div class="circle-gradient-red" height="1000px" onclick="overlay(100,19.1230279,-104.4003982)"></div>'
                });
        map.drawOverlay({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(150, 18.949891,-103.9000674)"></div>'
                });
        map.drawOverlay({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(150, 19.386539,-103.6373209)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(150,19.2636512,-103.7454782)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    content: '<div class="circle-gradient-red" height="1000px" onclick="overlay(100,19.1397537,-104.3188143)"></div>'
                });
        map.drawOverlay({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(160, 19.211456,-103.8061198)"></div>'
                });
        map.drawOverlay({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(200,19.0904002,-104.3022294)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    content: '<div class="circle-gradient-red" height="1000px" onclick="overlay(100,19.2409303,-103.7534398)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(150,19.2484924,-103.7012817)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(250,19.2611457,-103.6891561)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(150,19.1059995,-104.3415871)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    content: '<div class="circle-gradient-red" height="1000px" onclick="overlay(100,19.2698429,-103.7621104)"></div>'
                });

            });

      // capa CO
            $("#CO").click(function(){
              map.removeMarkers();
              map.removeOverlays();
        map.drawOverlay({
                    lat: 19.2381902,
                    lng: -103.7869256,
                    title: 'IMSS 3',
                    layer: 'overlayLayer',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(200,19.2381902,-103.7869256)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    layer: 'overlayLayer',
                    title: 'Campus el Naranjo UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(100,19.1230279,-104.4003982)"></div>'
                });
        map.drawOverlay({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(150, 18.949891,-103.9000674)"></div>'
                });
        map.drawOverlay({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(150, 19.386539,-103.6373209)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(150,19.2636512,-103.7454782)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(100,19.1397537,-104.3188143)"></div>'
                });
        map.drawOverlay({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(160, 19.211456,-103.8061198)"></div>'
                });
        map.drawOverlay({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(200,19.0904002,-104.3022294)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(100,19.2409303,-103.7534398)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(150,19.2484924,-103.7012817)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(250,19.2611457,-103.6891561)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(150,19.1059995,-104.3415871)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(100,19.2698429,-103.7621104)"></div>'
                });

            });

      // capa NO2
            $("#NO2").click(function(){
              map.removeMarkers();
              map.removeOverlays();
        map.drawOverlay({
                    lat: 19.2381902,
                    lng: -103.7869256,
                    title: 'IMSS 3',
                    layer: 'overlayLayer',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(200,19.2381902,-103.7869256)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    layer: 'overlayLayer',
                    title: 'Campus el Naranjo UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(100,19.1230279,-104.4003982)"></div>'
                });
        map.drawOverlay({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(150, 18.949891,-103.9000674)"></div>'
                });
        map.drawOverlay({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(150, 19.386539,-103.6373209)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(150,19.2636512,-103.7454782)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(100,19.1397537,-104.3188143)"></div>'
                });
        map.drawOverlay({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(160, 19.211456,-103.8061198)"></div>'
                });
        map.drawOverlay({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(200,19.0904002,-104.3022294)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(100,19.2409303,-103.7534398)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(150,19.2484924,-103.7012817)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    content: '<div class="circle-gradient-yellow" height="1000px" onclick="overlay(250,19.2611457,-103.6891561)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(150,19.1059995,-104.3415871)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(100,19.2698429,-103.7621104)"></div>'
                });

            });

      // capa NO
            $("#NO").click(function(){
              map.removeMarkers();
              map.removeOverlays();
        map.drawOverlay({
                    lat: 19.2381902,
                    lng: -103.7869256,
                    title: 'IMSS 3',
                    layer: 'overlayLayer',
                    content: '<div class="circle-gradient-gray" height="1000px" onclick="overlay(200,19.2381902,-103.7869256)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    layer: 'overlayLayer',
                    title: 'Campus el Naranjo UDC',
                    content: '<div class="circle-gradient-gray" height="1000px" onclick="overlay(100,19.1230279,-104.4003982)"></div>'
                });
        map.drawOverlay({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(150, 18.949891,-103.9000674)"></div>'
                });
        map.drawOverlay({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(150, 19.386539,-103.6373209)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(150,19.2636512,-103.7454782)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    content: '<div class="circle-gradient-gray" height="1000px" onclick="overlay(100,19.1397537,-104.3188143)"></div>'
                });
        map.drawOverlay({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(160, 19.211456,-103.8061198)"></div>'
                });
        map.drawOverlay({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    content: '<div class="circle-gradient-gray" height="1000px" onclick="overlay(200,19.0904002,-104.3022294)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    content: '<div class="circle-gradient-gray" height="1000px" onclick="overlay(100,19.2409303,-103.7534398)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(150,19.2484924,-103.7012817)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    content: '<div class="circle-gradient-gray" height="1000px" onclick="overlay(250,19.2611457,-103.6891561)"></div>'
                });
        map.drawOverlay({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    content: '<div class="circle-gradient-green" height="1000px" onclick="overlay(150,19.1059995,-104.3415871)"></div>'
                });
        map.drawOverlay({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    content: '<div class="circle-gradient-gray" height="1000px" onclick="overlay(100,19.2698429,-103.7621104)"></div>'
                });

            });

      // capa NO
            $("#Pluviometria").click(function(){
              map.removeMarkers();
              map.removeOverlays();
        map.drawOverlay({
                    lat: 19.2381902,
                    lng: -103.7869256,
                    title: 'IMSS 3',
                    layer: 'overlayLayer',
                    content: '<div class="overlay indigo"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/rain.png"><span class="ms-1 font-weight-bold text-white">1<small>mm</small></span></div>'
                });
        map.drawOverlay({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    layer: 'overlayLayer',
                    title: 'Campus el Naranjo UDC',
                    content: '<div class="overlay indigo"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/rain.png"><span class="ms-1 font-weight-bold text-white">1<small>mm</small></span></div>'
                });
        map.drawOverlay({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    content: '<div class="overlay indigo"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/rain.png"><span class="ms-1 font-weight-bold text-white">1<small>mm</small></span></div>'
                });
        map.drawOverlay({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    content: '<div class="overlay indigo"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/rain.png"><span class="ms-1 font-weight-bold text-white">1<small>mm</small></span></div>'
                });
        map.drawOverlay({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    content: '<div class="overlay indigo"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/rain.png"><span class="ms-1 font-weight-bold text-white">1<small>mm</small></span></div>'
                });
        map.drawOverlay({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    content: '<div class="overlay indigo"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/rain.png"><span class="ms-1 font-weight-bold text-white">1<small>mm</small></span></div>'
                });
        map.drawOverlay({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    content: '<div class="overlay indigo"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/rain.png"><span class="ms-1 font-weight-bold text-white">1<small>mm</small></span></div>'
                });
        map.drawOverlay({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    content: '<div class="overlay indigo"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/rain.png"><span class="ms-1 font-weight-bold text-white">1<small>mm</small></span></div>'
                });
        map.drawOverlay({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    content: '<div class="overlay indigo"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/rain.png"><span class="ms-1 font-weight-bold text-white">1<small>mm</small></span></div>'
                });
        map.drawOverlay({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    content: '<div class="overlay indigo"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/rain.png"><span class="ms-1 font-weight-bold text-white">1<small>mm</small></span></div>'
                });
        map.drawOverlay({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    content: '<div class="overlay indigo"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/rain.png"><span class="ms-1 font-weight-bold text-white">1<small>mm</small></span></div>'
                });
        map.drawOverlay({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    content: '<div class="overlay indigo"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/rain.png"><span class="ms-1 font-weight-bold text-white">1<small>mm</small></span></div>'
                });
        map.drawOverlay({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    content: '<div class="overlay indigo"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/rain.png"><span class="ms-1 font-weight-bold text-white">1<small>mm</small></span></div>'
                });

            });

      //capa de temperatura
            $("#temperatura").click(function(){
              map.removeMarkers();
              map.removeOverlays();
                map.drawOverlay({
                    lat: 19.223638,
                    lng: -103.738265,
                    content: '<div class="overlay blue"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/partly_cloudy.png"><span class="ms-1 font-weight-bold text-white">28<small>&#8451</small></span></div>'
                });
                map.drawOverlay({
                    lat: 19.286922,
                    lng: -103.691316,
                    content: '<div class="overlay blue"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/partly_cloudy.png"><span class="ms-1 font-weight-bold text-white">28<small>&#8451</small></span></div>'
                });
                map.drawOverlay({
                    lat: 19.443689,
                    lng: -103.687711,
                    content: '<div class="overlay blue"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/partly_cloudy.png"><span class="ms-1 font-weight-bold text-white">22<small>&#8451</small></span></div>'
                });
                map.drawOverlay({
                    lat: 19.072691,
                    lng: -104.300783,
                    content: '<div class="overlay blue"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/partly_cloudy.png"><span class="ms-1 font-weight-bold text-white">31<small>&#8451</small></span></div>'
                });
                map.drawOverlay({
                    lat: 19.243926,
                    lng: -104.241045,
                    content: '<div class="overlay blue"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/partly_cloudy.png"><span class="ms-1 font-weight-bold text-white">28<small>&#8451</small></span></div>'
                });
                map.drawOverlay({
                    lat: 19.146331,
                    lng: -104.565828,
                    content: '<div class="overlay blue"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/partly_cloudy.png"><span class="ms-1 font-weight-bold text-white">31<small>&#8451</small></span></div>'
                });
                map.drawOverlay({
                    lat: 18.904159,
                    lng: -103.857805,
                    content: '<div class="overlay blue"><img class="wob_tci" alt="Parcialmente nublado" src="//ssl.gstatic.com/onebox/weather/64/partly_cloudy.png"><span class="ms-1 font-weight-bold text-white">33<small>&#8451</small></span></div>'
                });

            });