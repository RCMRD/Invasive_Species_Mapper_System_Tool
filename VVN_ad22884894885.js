var mkax = [];
var mkay = [];
var infoname = [];
var infocnt = [];
var infoiar = [];
var infogar = [];
var infocc = [];
var infohab = [];
var infoabd = [];
var infown = [];
var infoara = [];
var infosettle = [];
var infocom = [];
var infopic = [];
var infoorg = [];
var infocon = [];
function jow(nm, ct, ir, gr, cc, hb, ad, ow, ar, st, cm, pc, og, cn, sx, sy) {
	mkay.push(sy);
	mkax.push(sx);
	infoname.push(nm);
	infocnt.push(ct);
	infoiar.push(ir);
	infogar.push(gr);
	infocc.push(cc);
	infohab.push(hb);
	infoabd.push(ad);
	infown.push(ow);
	infoara.push(ar);
	infosettle.push(st);
	infocom.push(cm);
	infopic.push(pc);
	infoorg.push(og);
	infocon.push(cn);
}


var map;
function initialise() {

	var myLatlng = new google.maps.LatLng(2.25952486111111, 37.8893707777778); // Add the coordinates

	var mapOptions = {

		zoom: 8,
		minZoom: 3,
		maxZoom: 20,
		styles: [{ featureType: "landscape", stylers: [{ saturation: -100 }, { lightness: 65 }, { visibility: "on" }] }, { featureType: "poi", stylers: [{ saturation: -100 }, { lightness: 51 }, { visibility: "simplified" }] }, { featureType: "road.highway", stylers: [{ saturation: -100 }, { visibility: "simplified" }] }, { featureType: "road.arterial", stylers: [{ saturation: -100 }, { lightness: 30 }, { visibility: "on" }] }, { featureType: "road.local", stylers: [{ saturation: -100 }, { lightness: 40 }, { visibility: "on" }] }, { featureType: "transit", stylers: [{ saturation: -100 }, { visibility: "simplified" }] }, { featureType: "administrative.province", stylers: [{ visibility: "on" }]/**/ }, { featureType: "administrative.locality", stylers: [{ visibility: "on" }] }, { featureType: "administrative.neighborhood", stylers: [{ visibility: "on" }]/**/ }, { featureType: "water", elementType: "labels", stylers: [{ visibility: "on" }, { lightness: -25 }, { saturation: -100 }] }, { featureType: "water", elementType: "geometry", stylers: [{ hue: "#ffff00" }, { lightness: -25 }, { saturation: -97 }] }],
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.LARGE,
			position: google.maps.ControlPosition.CENTER_RIGHT
		},
		center: myLatlng, // Centre the Map to our coordinates variable
		mapTypeId: google.maps.MapTypeId.HYBRID, // Set the type of Map

		scrollwheel: true, // Disable Mouse Scroll zooming (Essential for responsive sites!)
		// All of the below are set to true by default, so simply remove if set to true:
		panControl: false, // Set to false to disable
		mapTypeControl: true, // Disable Map/Satellite switch
		mapTypeControlOptions: {
			style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
			position: google.maps.ControlPosition.TOP_CENTER
		},
		scaleControl: false, // Set to false to hide scale
		streetViewControl: false, // Set to disable to hide street view
		overviewMapControl: false, // Set to false to remove overview control
		rotateControl: false // Set to false to disable rotate control
	};
	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions); // Render our map within the empty div

	var kmlUrl = "http://mobiledata.rcmrd.org/invspec/conservanciesAll.kml?ra=" + (new Date()).valueOf();

	var kmlOptions = {
		suppressInfoWindows: true,
		preserveViewPort: false,
		clickable: false,
		map: map
	};

	var kmlLayer = new google.maps.KmlLayer(kmlUrl);

	kmlLayer.setMap(map);

	var markers = [];

	for (i = 0; i < mkax.length; i++) {

		if (infoname[i] == "Acacia Reficiens") {
			var image = new google.maps.MarkerImage("uui.png", null, null, null, new google.maps.Size(42, 42)); // Create a variable for our marker image.
		} else if (infoname[i] == "Opuntia Species") {
			var image = new google.maps.MarkerImage("uui2.png", null, null, null, new google.maps.Size(42, 42)); // Create a variable for our marker image.	
		} else if (infoname[i] == "Lantana Camara") {
			var image = new google.maps.MarkerImage("uui3.png", null, null, null, new google.maps.Size(42, 42)); // Create a variable for our marker image.	
		} else if (infoname[i] == "Prosopis Species") {
			var image = new google.maps.MarkerImage("uui4.png", null, null, null, new google.maps.Size(42, 42)); // Create a variable for our marker image.	
		} else if (infoname[i] == "Water Hyacinth") {
			var image = new google.maps.MarkerImage("uui5.png", null, null, null, new google.maps.Size(42, 42)); // Create a variable for our marker image.		
		} else {
			var image = new google.maps.MarkerImage("uui6.png", null, null, null, new google.maps.Size(42, 42)); // Create a variable for our marker image.	
		}


		var wapi = new google.maps.LatLng(mkay[i], mkax[i]);
		if (infopic[i] != "") {
			var picarw = " <img src='http://mobiledata.rcmrd.org/invspec/ges/" + infopic[i].trim() + "'width='200' height='200' >";
		} else {
			var picarw = " <img src='http://mobiledata.rcmrd.org/invspec/ges/No_image.gif' width='200' height='200''> ";
		}
		var didade = "<p> Species       :" + infoname[i] + "</p> <p> County      :" + infocnt[i] + "</p> <p> Organisation      :" + infoorg[i] + "</p> <p> Conservancy      :" + infocon[i] + "</p> <p> Infected Area    :" + infoiar[i] + "</p> <p> Gross Area    :" + infogar[i] + "</p> <p> Canopy Closure    :" + infocc[i] + "</p> <p> Habitat    :" + infohab[i] + "</p> <p> Abundance    :" + infoabd[i] + "</p> <p> Area Accesibility    :" + infoara[i] + "</p> <p> Settlement    :" + infosettle[i] + "</p> <p> Comments    :" + infocom[i] + "</p> <p> Field Picture    : </p> <p>" + picarw + "</p>";
		var marker = new google.maps.Marker({
			position: wapi,
			icon: image,
			map: map,
			title: infoname[i]
		});

		markers.push(marker);

		var infowindow = new google.maps.InfoWindow();

		google.maps.event.addListener(marker, 'click', (function (marker, didade, infowindow) {
			return function () {
				infowindow.setContent(didade);
				infowindow.open(map, marker);
			};
		})(marker, didade, infowindow));

	}

	var markerCluster = new markerClusterer.MarkerClusterer({ map, markers });


	google.maps.event.addDomListener(window, 'resize', function () { map.setCenter(myLatlng); });
}

function dee(sx, sy) {
	var prev = map.getCenter();
	var myLatlng2 = new google.maps.LatLng(sy, sx);
	var bndz = map.getBounds();
	var bup = bndz.getNorthEast();
	var bdo = bndz.getSouthWest();
	var dist = (bup.lat() - bdo.lat()) / 2;
	var m = (prev.lat() - sy) / (prev.lng() - sx);
	var aa = Math.sqrt(Math.pow(dist, 2) / (1 + (1 / (Math.pow(m, 2)))));
	var bb = Math.sqrt(Math.pow(dist, 2) / ((Math.pow(m, 2)) + 1));
	var ldst = Math.sqrt(Math.pow((prev.lat() - sy), 2) + Math.pow((prev.lng() - sx), 2));
	var mngp = Math.floor(ldst / dist);
	var yi;
	var xi;
	var yp = prev.lat();
	var xp = prev.lng();
	var beba = [];
	var myLL;
	var chekav = "";
	var chekah = "";

	if (prev.lat() > sy) {
		chekav = "below";
	} else {
		chekav = "above";
	}

	if (prev.lng() > sx) {
		chekah = "left";
	} else {
		chekah = "right";
	}

	for (i = 0; i != mngp; i++) {

		if (chekav == "above" && chekah == "right") {
			yi = yp + aa;
			xi = xp + bb;
		}

		if (chekav == "above" && chekah == "left") {
			yi = yp + aa;
			xi = xp - bb;
		}

		if (chekav == "below" && chekah == "left") {
			yi = yp - aa;
			xi = xp - bb;
		}

		if (chekav == "below" && chekah == "right") {
			yi = yp - aa;
			xi = xp + bb;
		}
		myLL = new google.maps.LatLng(yi, xi);
		beba.push(myLL);
		yp = yi;
		xp = xi;
	}
	beba.push(myLatlng2);
	function pan() {
		var wp;
		if (beba.length === 0) return;
		wp = beba.shift();
		map.panTo(wp);
		window.setTimeout(pan, 20);
	}
	pan();
}
google.maps.event.addDomListener(window, 'load', initialise);  
