/*
Template Name: Minia - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: gmaps init Js File
*/

let map;

let markers = [];
function initMap() {
  map = new google.maps.Map(document.getElementById("gmaps-overlay"), {
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

  const markerEstaciones1 = new google.maps.Marker({
                position: new google.maps.LatLng(19.19306, -103.750288),
                title: 'Casa Pruebas',
                icon:'../../assets/img/icons/station.png',
                map: map
            });
    // Evento click sobre el marker creado
    markerEstaciones1.addListener('click', function() {
        //$('#staticBackdrop').show();
        obtenerDatosEstacion('94d14437-a442-4202-9e1d-0215843ba41e');
    });
    markers.push(markerEstaciones1);
}

$(document).ready(function(){
  //$('#slide-out-estacion').sidenav({menuWidth: 300, edge: 'right',draggable: true});
});

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
                    html += '<tr><td>' + layer.tag_etiqueta + '</td><th>' + item.v + '</th><td class="text-center">' + layer.tag_medida + '</td></tr>';
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
        //console.log(register);
        fechaRegistroElement.html(html_registro);
        $('#slide-out-estacion').sidenav('open');

      },
      error: function(xhr, status, error) {
        console.log('Error en la solicitud AJAX:', error);
      }
    });
  return layersActivos;
}
