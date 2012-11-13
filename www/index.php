<?php
$iniData = parse_ini_file(dirname(__FILE__)."/../config/config.ini",true);
$apiKey = $iniData["google"]["mapApiKey"];
?>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="/js/com.mustaphafodil.mytracker.api.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript"
		src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apiKey;?>&sensor=false"></script>

		<script type="text/javascript">
			function initialize() {
				var mapOptions = {
					center : new google.maps.LatLng(-34.397, 150.644),
					zoom : 8,
					mapTypeId : google.maps.MapTypeId.ROADMAP
				};
				var map = new google.maps.Map(document.getElementById("map"), mapOptions);

			}

			var marker = null;
			function newPosition(data) {

				var lat = data.lat;
				var lng = data.lng;
				var myLatlng = new google.maps.LatLng(lat, lng);

				if (marker == null) {
					var mapOptions = {
						zoom : 17,
						center : myLatlng,
						mapTypeId : google.maps.MapTypeId.ROADMAP,
					}
					var map = new google.maps.Map(document.getElementById("map"), mapOptions);

					marker = new google.maps.Marker({
						position : myLatlng,
						title : data.deviceName + ' ' + data.lastDate
					});
					// To add the marker to the map, call setMap();
					marker.setMap(map);

				} else {
					marker.setPosition(myLatlng);
					marker.setAnimation(google.maps.Animation.BOUNCE);
					marker.setTitle(data.deviceName + ' ' + data.lastDate)
					console.log(myLatlng);
					setTimeout(function() {marker.setAnimation(null);},2000);
					
				}

			}


			$(document).ready(function() {
				initialize();

				setInterval('getLastPosition(newPosition)', 12000);
				
				getLastPosition(newPosition);
			});
		</script>
		<style>
			#map {
				margin:auto;
				width: 800px;
				height: 600px;
			}
		</style>

	</head>
	<body>

		<div id="map"></div>
	</body>
</html>
