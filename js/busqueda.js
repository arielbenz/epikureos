var popup;

function setLugares(nombres, latitudes, longitudes) {
	var ciudad = "<?php echo $city ?>";
	var latlon = null;
	if(ciudad == "santafe") {
		latlon = new google.maps.LatLng(-31.632389, -60.699459);
	} else if(ciudad = "parana") {
		latlon = new google.maps.LatLng(-31.741834, -60.511946);
	}
	
    var myOptions = {
        zoom: 14,
        center: latlon,
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map($("#mapa").get(0), myOptions);
    var bounds = new google.maps.LatLngBounds();

	for(i = 0; i < nombres.length; i++) {
		var marker = new google.maps.LatLng(latitudes[i], longitudes[i]);
		addMark(map, marker, nombres[i], bounds);
	}

	if(nombres.length > 1) {
		map.fitBounds(bounds);
		map.setCenter(bounds.getCenter());
	}
}

function addMark(map, location, title, bounds) {
    var marcador = new google.maps.Marker({
        position: location,
        map: map,
        title: title
    });

    bounds.extend(marcador.position);

	google.maps.event.addListener(marcador, "mouseover", function() {
		if(!popup){
            popup = new google.maps.InfoWindow();
        }
        var note = "<div class='info-window'><p>"+ title +"</p></div>";
        popup.setContent(note);
        popup.open(map, this);
	});
}