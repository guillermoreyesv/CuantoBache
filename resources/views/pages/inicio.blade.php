@extends('layouts.default')
@section('content')
    <div class="" id='map'></div>
    <script>
    	$(document).ready(function () {

		    $('#sidebarCollapse').on('click', function () {
		        $('#sidebar').toggleClass('active');
		    });

		});
		function initMap() {
	      	var coords = {}; 
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(
				function (position){
					coords =  {
						lng: position.coords.longitude,
						lat: position.coords.latitude
					};
					setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
				},
				function(error){
					coords =  {
						lng: -99.0737071,
						lat: 19.4541067
					};
					setMapa(coords);
				});
			}
			else {
			  alert('Geolocation is not supported for this Browser/OS.');
			}
		}
		function setMapa(coords){
	        var map = new google.maps.Map(document.getElementById('map'),{
		        zoom: 15,
		        center:new google.maps.LatLng(coords.lat,coords.lng),
			});
	        var marker = new google.maps.Marker({
	          position: coords,
	          map: map
	        });
		}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpBh0_9dcg7lCuMRb300FzgQc8w5u8KAk&callback=initMap">
    </script>
@stop