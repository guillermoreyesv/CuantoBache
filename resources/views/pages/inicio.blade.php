@extends('layouts.default')
@section('content')
    <div class="align-middle text-center" id='map'>CARGANDO ...</div>
    <script>
    	$(document).ready(function () {

		    $('#sidebarCollapse').on('click', function () {
		        $('#sidebar').toggleClass('active');
		    });

		});

		function centrarPocision(myLatlng){
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 15,
				center: myLatlng
			});
			for(i=0;i<10;i++){
				
				myLatlng={lat: myLatlng.lat+(i/10000), lng: myLatlng.lng+(i/10000)}
				/* MOSTRANDO UN MARCADOR CON UNA LONGITUD Y LATITUD DEFINIDA*/
				var marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				title: 'Bache :('
				});	
			}
			
			map.addListener('click', function(position) {
				// 3 seconds after the center of the map has changed, pan back to the
				// marker.
				placeMarkerAndPanTo(position.latLng, map);
				/*window.setTimeout(function() {
				  map.panTo(marker.getPosition());
				}, 3000);*/
			});

			marker.addListener('click', function() {
				map.setZoom(8);
				map.setCenter(marker.getPosition());
			});
		}

		function initMap() {
			//Latitud predeterminada
			var myLatlng = {lat: 19.4167476, lng: -99.1681686};
			//Comprobamos que el navegador soporta geolocalizacion
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {
					//alert("Exito");
					//establecemeos nuevas coordenadas
					myLatlng={lat: position.coords.latitude, lng: position.coords.longitude};
					//Centramos el mapa
					centrarPocision(myLatlng);
				},function(error){
					//alert("Error");
					//Definimos variables
				    myLatlng = {lat: 19.4167476, lng: -99.1681686};
				    //Centramos el mapa
				    centrarPocision(myLatlng);
				},{
					maximumAge: 75000,
					timeout: 1000
				});
			} else {
			    //alert("Geolocation is not supported by this browser.");
			    //Definimos variables
			    myLatlng = {lat: 19.4167476, lng: -99.1681686};
			    //Centramos el mapa
			    centrarPocision(myLatlng);
			}
		}

		function placeMarkerAndPanTo(latLng, map) {
		  var marker = new google.maps.Marker({
		    position: latLng,
		    map: map
		  });
		  map.panTo(latLng);
		}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpBh0_9dcg7lCuMRb300FzgQc8w5u8KAk&callback=initMap">
    </script>
@stop