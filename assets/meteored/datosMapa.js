            var map;
            $(document).ready(function(){
                prettyPrint();
                map = new GMaps({
                    div: '#map-container',
                    lat: 19.180668532744217,
                    lng: -103.798197674834,
                    zoom: 10,
                    mapTypeId: 'satellite',
                    height: '90vh',
                });

                map.addMapType("osm", {
                    getTileUrl: function(coord, zoom) {
                        return "https://a.tile.openstreetmap.org/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
                        //return "https://maps.google.com/maps?width=100%25&amp;hl=es&amp;q=" + 19.180668532744217 + ",%20" + -103.798197674834 + "+(EWIN)&amp;t=k&amp;z=" + zoom + "&amp;ie=UTF8&amp;iwloc=B&amp;output=embed";
                        //https://maps.google.com/maps?width=100%25&amp;hl=es&amp;q=19.180668532744217,%20-103.798197674834+(EWIN)&amp;t=k&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed
                    },
                    tileSize: new google.maps.Size(256, 256),
                    name: "OpenStreetMap",
                    maxZoom: 18
                });

                map.setMapTypeId("osm");

            });

			$(document).ready(function(){
				$('#slide-out').sidenav({menuWidth: 300, edge: 'right',draggable: true,});
				$('#slide-out-2').sidenav({menuWidth: 300, edge: 'right',draggable: true,});

				$('#aire').on('click', function () {
					$('#slide-out').sidenav('open');	
				});

				$('#radar').on('click', function () {
					$('#slide-out-2').sidenav('open');	
				})

				$('#leyenda').hide();
			});

			// capa de estaciones
            $("#radar").click(function(){
            	map.removeOverlays();
				map.addMarker({
                    lat: 19.2381902,
                    lng: -103.7869256,
                    title: 'IMSS 3',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    title: 'Campus el Naranjo UDC',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });

            });

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
            	map.removeOverlays();
				map.addMarker({
                    lat: 19.2381902,
                    lng: -103.7869256,
                    title: 'IMSS 3',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    title: 'Campus el Naranjo UDC',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });
				map.addMarker({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    /*click: function(e) {
                        alert('ES00045');
                    }*/
                });

            });

            // capa O3
            $("#O3").click(function(){
            	map.removeMarkers();
            	map.removeOverlays();
				map.drawOverlay({
                    lat: 19.2381902,
                    lng: -103.7869256,
                    title: 'IMSS 3',
                    layer: 'overlayLayer',
                    content: '<div class="circle-gradient-red" height="50px" onclick="overlay(200,19.2381902,-103.7869256)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    layer: 'overlayLayer',
                    title: 'Campus el Naranjo UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.1230279,-104.4003982)"></div>'
                });
				map.drawOverlay({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150, 18.949891,-103.9000674)"></div>'
                });
				map.drawOverlay({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150, 19.386539,-103.6373209)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150,19.2636512,-103.7454782)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.1397537,-104.3188143)"></div>'
                });
				map.drawOverlay({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(160, 19.211456,-103.8061198)"></div>'
                });
				map.drawOverlay({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    content: '<div class="circle-gradient-red" height="50px" onclick="overlay(200,19.0904002,-104.3022294)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.2409303,-103.7534398)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150,19.2484924,-103.7012817)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    content: '<div class="circle-gradient-red" height="50px" onclick="overlay(250,19.2611457,-103.6891561)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150,19.1059995,-104.3415871)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.2698429,-103.7621104)"></div>'
                });

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
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(200,19.2381902,-103.7869256)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    layer: 'overlayLayer',
                    title: 'Campus el Naranjo UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.1230279,-104.4003982)"></div>'
                });
				map.drawOverlay({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(150, 18.949891,-103.9000674)"></div>'
                });
				map.drawOverlay({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150, 19.386539,-103.6373209)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150,19.2636512,-103.7454782)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.1397537,-104.3188143)"></div>'
                });
				map.drawOverlay({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(160, 19.211456,-103.8061198)"></div>'
                });
				map.drawOverlay({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(200,19.0904002,-104.3022294)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.2409303,-103.7534398)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150,19.2484924,-103.7012817)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(250,19.2611457,-103.6891561)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150,19.1059995,-104.3415871)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.2698429,-103.7621104)"></div>'
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
                    content: '<div class="circle-gradient-red" height="50px" onclick="overlay(200,19.2381902,-103.7869256)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    layer: 'overlayLayer',
                    title: 'Campus el Naranjo UDC',
                    content: '<div class="circle-gradient-red" height="50px" onclick="overlay(100,19.1230279,-104.4003982)"></div>'
                });
				map.drawOverlay({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150, 18.949891,-103.9000674)"></div>'
                });
				map.drawOverlay({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150, 19.386539,-103.6373209)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150,19.2636512,-103.7454782)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    content: '<div class="circle-gradient-red" height="50px" onclick="overlay(100,19.1397537,-104.3188143)"></div>'
                });
				map.drawOverlay({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(160, 19.211456,-103.8061198)"></div>'
                });
				map.drawOverlay({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    content: '<div class="circle-gradient-red" height="50px" onclick="overlay(200,19.0904002,-104.3022294)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    content: '<div class="circle-gradient-red" height="50px" onclick="overlay(100,19.2409303,-103.7534398)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150,19.2484924,-103.7012817)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    content: '<div class="circle-gradient-red" height="50px" onclick="overlay(250,19.2611457,-103.6891561)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150,19.1059995,-104.3415871)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    content: '<div class="circle-gradient-red" height="50px" onclick="overlay(100,19.2698429,-103.7621104)"></div>'
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
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(200,19.2381902,-103.7869256)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    layer: 'overlayLayer',
                    title: 'Campus el Naranjo UDC',
                    content: '<div class="circle-gradient-red" height="50px" onclick="overlay(100,19.1230279,-104.4003982)"></div>'
                });
				map.drawOverlay({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150, 18.949891,-103.9000674)"></div>'
                });
				map.drawOverlay({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150, 19.386539,-103.6373209)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150,19.2636512,-103.7454782)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    content: '<div class="circle-gradient-red" height="50px" onclick="overlay(100,19.1397537,-104.3188143)"></div>'
                });
				map.drawOverlay({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(160, 19.211456,-103.8061198)"></div>'
                });
				map.drawOverlay({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(200,19.0904002,-104.3022294)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    content: '<div class="circle-gradient-red" height="50px" onclick="overlay(100,19.2409303,-103.7534398)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150,19.2484924,-103.7012817)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(250,19.2611457,-103.6891561)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150,19.1059995,-104.3415871)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    content: '<div class="circle-gradient-red" height="50px" onclick="overlay(100,19.2698429,-103.7621104)"></div>'
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
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(200,19.2381902,-103.7869256)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    layer: 'overlayLayer',
                    title: 'Campus el Naranjo UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.1230279,-104.4003982)"></div>'
                });
				map.drawOverlay({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(150, 18.949891,-103.9000674)"></div>'
                });
				map.drawOverlay({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(150, 19.386539,-103.6373209)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(150,19.2636512,-103.7454782)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.1397537,-104.3188143)"></div>'
                });
				map.drawOverlay({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(160, 19.211456,-103.8061198)"></div>'
                });
				map.drawOverlay({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(200,19.0904002,-104.3022294)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.2409303,-103.7534398)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(150,19.2484924,-103.7012817)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(250,19.2611457,-103.6891561)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(150,19.1059995,-104.3415871)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.2698429,-103.7621104)"></div>'
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
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(200,19.2381902,-103.7869256)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    layer: 'overlayLayer',
                    title: 'Campus el Naranjo UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.1230279,-104.4003982)"></div>'
                });
				map.drawOverlay({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(150, 18.949891,-103.9000674)"></div>'
                });
				map.drawOverlay({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(150, 19.386539,-103.6373209)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(150,19.2636512,-103.7454782)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.1397537,-104.3188143)"></div>'
                });
				map.drawOverlay({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(160, 19.211456,-103.8061198)"></div>'
                });
				map.drawOverlay({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(200,19.0904002,-104.3022294)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.2409303,-103.7534398)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(150,19.2484924,-103.7012817)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    content: '<div class="circle-gradient-yellow" height="50px" onclick="overlay(250,19.2611457,-103.6891561)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(150,19.1059995,-104.3415871)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(100,19.2698429,-103.7621104)"></div>'
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
                    content: '<div class="circle-gradient-gray" height="50px" onclick="overlay(200,19.2381902,-103.7869256)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1230279,
                    lng: -104.4003982,
                    layer: 'overlayLayer',
                    title: 'Campus el Naranjo UDC',
                    content: '<div class="circle-gradient-gray" height="50px" onclick="overlay(100,19.1230279,-104.4003982)"></div>'
                });
				map.drawOverlay({
                    lat: 18.949891,
                    lng: -103.9000674,
                    title: 'Campus Tecomán UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(150, 18.949891,-103.9000674)"></div>'
                });
				map.drawOverlay({
                    lat: 19.386539,
                    lng: -103.6373209,
                    title: 'IMSS 6',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(150, 19.386539,-103.6373209)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2636512,
                    lng: -103.7454782,
                    title: 'Campus Villa de Álvarez UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(150,19.2636512,-103.7454782)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1397537,
                    lng: -104.3188143,
                    title: 'UTEM',
                    content: '<div class="circle-gradient-gray" height="50px" onclick="overlay(100,19.1397537,-104.3188143)"></div>'
                });
				map.drawOverlay({
                    lat: 19.211456,
                    lng: -103.8061198,
                    title: 'Campus Coquimatlán UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(160, 19.211456,-103.8061198)"></div>'
                });
				map.drawOverlay({
                    lat: 19.0904002,
                    lng: -104.3022294,
                    title: 'IMSS 17',
                    content: '<div class="circle-gradient-gray" height="50px" onclick="overlay(200,19.0904002,-104.3022294)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2409303,
                    lng: -103.7534398,
                    title: 'IMSS 19',
                    content: '<div class="circle-gradient-gray" height="50px" onclick="overlay(100,19.2409303,-103.7534398)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2484924,
                    lng: -103.7012817,
                    title: 'Campus Central UDC',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(150,19.2484924,-103.7012817)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2611457,
                    lng: -103.6891561,
                    title: 'Campus Norte UDC',
                    content: '<div class="circle-gradient-gray" height="50px" onclick="overlay(250,19.2611457,-103.6891561)"></div>'
                });
				map.drawOverlay({
                    lat: 19.1059995,
                    lng: -104.3415871,
                    title: 'IMSS 10',
                    content: '<div class="circle-gradient-green" height="50px" onclick="overlay(150,19.1059995,-104.3415871)"></div>'
                });
				map.drawOverlay({
                    lat: 19.2698429,
                    lng: -103.7621104,
                    title: 'IMSS 1',
                    content: '<div class="circle-gradient-gray" height="50px" onclick="overlay(100,19.2698429,-103.7621104)"></div>'
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