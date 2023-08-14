<html>
	<head>
		<title>A Leaflet map!</title>
		<link
			rel="stylesheet"
			href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
		<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
		<style>
			.map-wrapper {
				display: flex;
				justify-content: center;
				align-items: center;
				height: 100vh;
			}
			#map {
				width: 90vw;
				height: 90vh;
			}
		</style>
	</head>
	<body>
		<div class="map-wrapper">
			<div id="map"></div>
		</div>

		<script>
			// initialize the map
			var map = L.map("map").setView(
				[-7.681107274810605, 112.4458139235079],
				9
			);

			// load a tile layer
			L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
				attribution: "Data Eselon Kejati Jawa Timur",
				maxZoom: 17,
				minZoom: 8,
			}).addTo(map);

			// add marker to some places in map and give details
			L.marker([-7.314065983225793, 112.73336023051054])
				.addTo(map)
				.bindPopup("Kejati JATIM.")
				.openPopup();
			L.marker([-7.269302485173192, 112.6952329510823])
				.addTo(map)
				.bindPopup("Kejari Surabaya.")
				.openPopup();
		</script>
	</body>
</html>
