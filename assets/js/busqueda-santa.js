var popup;

function setLugares(url, nombres, latitudes, longitudes, niveles, slugs) {
	var latlon = null;
	if(city == "santafe") {
		latlon = new google.maps.LatLng(-31.632389, -60.699459);
	} else if(city = "parana") {
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

    var imageBase = "/img/map-icons/";
    var icons = {
        alta: {
            icon: imageBase + "pinmap-alta.png"
        },
        regional: {
            icon: imageBase + "pinmap-regional.png"
        },
        tabla: {
            icon: imageBase + "pinmap-tabla.png"
        }
    };

	for(i = 0; i < nombres.length; i++) {
		var marker = new google.maps.LatLng(latitudes[i], longitudes[i]);
		addMark(url, map, marker, nombres[i], bounds, niveles[i], icons, slugs[i]);
	}

	if(nombres.length > 1) {
		map.fitBounds(bounds);
		map.setCenter(bounds.getCenter());
	}
}

function addMark(url, map, location, title, bounds, nivelLugar, icons, slug) {
    var marcador = new google.maps.Marker({
        position: location,
        map: map,
        title: title,
        icon: icons[nivelLugar].icon
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

    google.maps.event.addListener(marcador, "click", function() {
        window.location = url + "/lugares/" + slug;
    });
}