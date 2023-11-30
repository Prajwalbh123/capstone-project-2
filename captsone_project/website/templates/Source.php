<!DOCTYPE html>
<html>
<head>
 <!DOCTYPE html>
 	<html xmlns="http://www.w3.org/1999/xhtml">
 	<head>
	 <meta http-equiv="content-type" content="text/html; charset=ANSI" />
	 <meta name="viewport" content="initial-scale=1.0">
	 
	 <link href="https://fonts.googleapis.com/css? family=Roboto:100,200,300,400" rel='stylesheet'>
	 <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	 
	 <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	 <script src= "https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
	 <link rel="stylesheet" href="@sweetalert2/theme-minimal/minimal.css">
	 	
	 <link rel="stylesheet" href="https://www.veuzz.com/css/veuzz.css">
	 <link rel="stylesheet" href="https://www.veuzz.com/css/no_x.css">
	 <link rel="stylesheet" href="https://www.veuzz.com/css/style.css">
	
	 <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	
	 <script type="text/javascript" src="https://www.veuzz.com/css/fresco.js"></script>
	 <link rel="stylesheet" type="text/css" href="https://www.veuzz.com/css/fresco.css" />
    
	 <link rel="stylesheet" href="https://www.veuzz.com/css/flickity.css">
	 <script src="https://www.veuzz.com/css/flickity.pkgd.min.js"></script>
	
	 <script src="https://www.veuzz.com/css/1-lock.js"></script>
	 <script type="text/javascript" src="https://www.veuzz.com/css/generateDataJSON.js"></script>

	
	 <script src="jquery.fancybox.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="jquery.fancybox.min.css">
	
	 <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
	 
	 <!-- The first link is that of the core React library API itself". -->
	 <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>

	 <!-- The second link is that of the React DOM needed to render to the DOM". -->
	 <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>

	 <!-- The 3rd link is that of Babel, which is needed to compile our React code so it is understood by all browsers". -->
	 <script src='https://unpkg.com/babel-standalone@6.26.0/babel.js'></script>

	 <!-- Load the React component file. -->
	 <script type="text/babel" src="like_widget.js"></script>
	
	<!-- Load our React component. -->
	<script src="like_button.js"></script>
	
	<script src="https://voicerss-text-to-speech.p.rapidapi.com/js/voice.js"></script>


	 <title>Veuzz Experiences</title>
 
<style>

</style>

</head>

<body onload = "getTxtData()">

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<div id="wrapper" position="fixed">
	
	<div id="map"></div>
</div> 

<div id="map" class="map_canvas" ></div>

<div id="floating-panel"></div>

<div id="downbutton" style= "bottom: 0px; top: 40%; height: 0; transform: translate(-0, -5%)">
	<img id = "db" src="https://www.veuzz.com/images/arrow_down.png" width = "60px" height = "40px" onclick = "resetdiv()" ;/>
</div>

<div id="icons" style= "bottom: 0px; top: 5px; height: 50px;">

<!keep better organized in table >
<table padding: 5px;>
    <tr>
        <! Dont do anything, just a logo	-->		
        <! <a href="https://www.veuzz.com/veuzzmap.html"> 	
        <td width="50px"><img src="https://www.veuzz.com/images/veuzzLogo.png" width = "40px" height = "40px" alt="Veuzz" title="Veuzz" style="position:fixed; vertical-align:middle;border:none; z-index:7; cursor:pointer"></td>
        <! Help and legal stuff	-->	
        <td width="50px"><img src="https://www.veuzz.com/images/veuzz_docs.png" width = "40px" height = "40px" alt="Docs" title="Docs" onclick = "readText()" style="position:fixed; vertical-align:middle;border:none; z-index:10; cursor:pointer"></td>
        <! Shows list of all experiences. Alphabetize according to State and/or activity	-->	
        <td width="50px"><img src="https://www.veuzz.com/images/veuzz_list.png"  width = "40px" height = "40px" alt="Experiences" title="Experiences"  onclick = "showExpList()" style="position:fixed; vertical-align:middle; border:none; z-index:10; cursor:pointer"></td>
        <! direction logo --> 	
        <td width="50px"><img src="https://www.veuzz.com/images/arrow_up.png" width = "40px" height = "40px" alt="Map" title="Map" onclick = "backtoExp()" style="position:fixed; vertical-align:middle; border:none; z-index:7; cursor:pointer"></td>
    </tr>
</table>

<! 
<img src="https://www.veuzz.com/images/veuzz_docs.png" width = "40px" height = "40px" alt="Docs" title="Docs" onclick = "readText()" style="position:fixed; vertical-align:middle; top:12px; left:70px; border:none; z-index:10; cursor:pointer"/>

<! 
<img src="https://www.veuzz.com/images/veuzzLogo.png" width = "40px" height = "40px" alt="Veuzz" title="Veuzz" style="position:fixed; vertical-align:middle; top:12px; left:20px; border:none; z-index:7; cursor:pointer"/>

<! 
<img src="https://www.veuzz.com/images/veuzz_list.png"  width = "40px" height = "40px" alt="Experiences" title="Experiences"  onclick = "showExpList()" style="position:fixed; vertical-align:middle; top:12px; left:120px; border:none; z-index:10; cursor:pointer"/> 

<! 
<img src="https://www.veuzz.com/images/arrow_up.png" width = "40px" height = "40px" alt="Map" title="Map" onclick = "backtoExp()" style="position:fixed; vertical-align:middle; top:12px; left:170px; border:none; z-index:7; cursor:pointer"/>

</div>
	
<footer id="footer" class="cover"></footer>

<script>


//set Fresco skin
Fresco.setDefaultSkin("fresco");

/*document.getElementById("downbutton ").addEventListener("mousedown", function(){
 	swipe();
 	});

*/

//This is where the site content is displayed
function append_to_div(data) {
	
//SET CONTENTS TO NULL
document.getElementById("floating-panel").innerHTML = "";

var para = document.createElement("div");                 // Create a <p> element
para.innerHTML = data; 

// Append image
	//var img = document.createElement('img');
	//img.src ='Down_icon40.png';
	//document.getElementById("floating-panel").appendChild(img); 

// Append text
document.getElementById("floating-panel").appendChild(para);
document.getElementById("floating-panel").style.height = "60%";
document.getElementById("floating-panel").style.width = "100%";

document.getElementById("downbutton").style.height="40%";
document.getElementById("downbutton").style.top="40%";

document.getElementById("icons").style.display = "none";

};

//iframe
function iframe_to_div(data) {
	
document.getElementById("footer").innerHTML = "";
	
var link = data
var iframe = document.createElement('iframe');
iframe.frameBorder=0;

iframe.width="60%";
iframe.height="60%";
iframe.id="randomid";
iframe.setAttribute("src", link);
document.getElementById("footer").appendChild(iframe);
document.getElementById("footer").style.width = "70%";
document.getElementById("footer").style.height = "100%";

document.getElementById("icons").style.display = "none";
document.getElementById("downbutton").style.height="40px";

//document.getElementById("map").style.height = "0px";
//append_to_div(data);
//Append image
//var img = document.createElement('img');
//img.src ='Down_icon40.png';
//document.getElementById("floating-panel").appendChild(img); 
//document.getElementById("floating-panel").left = "20px";

};

//resets back to screen
function resetdiv() {
document.getElementById("floating-panel").style.height = "0px";

document.getElementById("icons").style.background = "rgba(255, 255, 255, 0)";
document.getElementById("icons").style.display = "block";

document.getElementById("footer").style.height = "0px";

document.getElementById("downbutton").style.height="0px";
//document.getElementById("downbutton").style.left ="20px";
document.getElementById("downbutton").style.bottom ="60%";

document.getElementById("map").style.height = "100%";

};

//Sends text data from JQuery to append_to_data rather than iframe
//Reads file from server side only
//No error catching in this code
//for Veuzz documents html 
function readText() {

jQuery.get('https://www.veuzz.com/maps/veuzzdocuments.html', function(data) {
//var myvar = data;
append_to_div(data);

});

}

//Knack db to json 
(async function parseJSON() {
	
	//get JSON from db
	const data = await generateDataJSON();
	
	//json code as string
	var s = JSON.stringify(data);
	
initMap(s);

/*

//parse json as object
obj = JSON.parse(s);

//JSON text
alert(s);

//document.getElementById("jsons").innerHTML=s;

//total experiences in db
var arrayCount = obj.length;
alert("total experiences "+arrayCount);

//developer name
//alert(obj[0].field_36);

//latitude and longitude for Google Map experience markers

for (i = 0; i < arrayCount; i++) {
	var obja = (obj[i].field_2_raw);
	lat[i] = obja.latitude;
	lng[i] = obja.longitude;
	alert(lat[i]+","+lng[i]);
	}
	
//type of experiences
//field_1
for (i = 0; i < arrayCount; i++) {
	alert(obj[i].field_1+"<br>"+obj[i].field_3);
//experience content|information
//alert(obj[0].field_3);
}

//from experiences
//img url source
alert(obj[0].field_21);
var img = "<div id=imgDiv>"+obj[0].field_21+"</div>";
 $('body').append(img);

//from sites

//latitude and longitude for Google Map site markers
for (i = 0; i < arrayCount; i++) {
	var objs = (obj[1].sites[i].field_17_raw);
	lat[i] = objs.latitude;
	lng[i] = objs.longitude;
	alert(lat[i]+","+lng[i]);
	}

var siteCount = obj[0].sites.length;
alert("total sites "+siteCount);

for (i=0; i < siteCount; i++) {
//site name
alert(obj[0].sites[i].field_16+"<br>"+obj[0].sites[i].field_18);
}

//from sites
//img url source
var imgs = "<div id=imgDivs>"+obj[0].sites[1].field_19+"</div>";
 $('body').append(imgs);

*/

})();

//Directory for images
var prefix = "https://www.veuzz.com/images/";

//content format for ContentString() function
//Import from database as var
//CONTENTSTRING = images, title, content, Google Map iframe code, url, GO button
   
var contentString = [
       
       //image title, content  
       ['<div id="content" style="font-size: 15px;">'+
       '<div class="section">'+
      '<img src="https://www.veuzz.com/images/assateague_photo.jpg" width="100%" alt="Assateague">'+
      '</div>'+
      '<p><div style="margin-bottom: 4px; font-size: 20px;">Assateague Island</div><font color = #009ACD>Assateague Island National Seashore, Maryland</><br><a href = "https://www.assateagueisland.com" style = "color: #f73c00" target="_blank">www.assateagueisland.com</a></><font color =  #370000><p></b> Assateague Island National Seashore is a protected area on a long barrier island off the coast of Maryland and Virginia. Its known for its Atlantic beaches and for trails that wind through marshland, dunes and pine forest. On the Life of the Marsh trail, an elevated boardwalk courses its way through a half mile of Assateague salt marshes. Many wetland bird species can be seen from this trail.</p>'+'<p><b>Life of the Marsh Trail.</b> An elevated boardwalk, which makes this trail fully accessible, courses its way through a half mile of Assateague salt marshes. Exhibits interpret the importance of this habitat to barrier island ecology. Many wetland bird species can be seen from this trail and an observation deck offers a panoramic view of Chincoteague Bay on Assateagues backside.</p>'+     
      
      //url, GO button
     '<p align="middle"><a href="https://www.veuzz.com/Assateague/assateaguemap.html" target="_parent"><img border="0" alt="Go" src="https://www.veuzz.com/images/gobutton.png"></a></p>'+
      '</div>'],
     
];

//catch swipe 
function swipe() {
  function dir() {
    a = x - x1, b = y - y1;
    if (!(parseInt(Math.sqrt(a * a + b * b), 10) < THRESHOLD)) {
      if (x1 - x > Math.abs(y - y1)) {
        //return "left";
      }
      if (x - x1 > Math.abs(y - y1)) {
        //return "right";
      }
      if (y1 - y > Math.abs(x - x1)) {
        //return "up";
      }
      if (y - y1 > Math.abs(x - x1)) {
        return "down";
      }
    } else {
      //return "none";
    }
  }
  THRESHOLD = 15;
  x = y = x1 = y1 = 0;
  recordedTime = (new Date).getTime();
  document.documentElement.addEventListener("touchstart", function(a) {
    50 < (new Date).getTime() - recordedTime && (x = parseInt(a.changedTouches[0].pageX, 10), y = parseInt(a.changedTouches[0].pageY, 10), recordedTime = (new Date).getTime());
  }, !1);
  document.documentElement.addEventListener("touchend", function(a) {
    x1 = x;
    y1 = y;
    x = parseInt(a.changedTouches[0].pageX, 10);
    y = parseInt(a.changedTouches[0].pageY, 10);
    //document.getElementById("floating-panel").innerHTML = dir();
    if (dir() == "down") {
    	alert(dir());
    	}
    recordedTime = (new Date).getTime();
  }, !1);
  document.documentElement.addEventListener("mousedown", function(a) {
    50 < (new Date).getTime() - recordedTime && (x = a.clientX, y = a.clientY, recordedTime = (new Date).getTime());
  }, !1);
  document.documentElement.addEventListener("mouseup", function(a) {
    x1 = x;
    y1 = y;
    x = a.clientX;
    y = a.clientY;
    //document.getElementById("floating-panel").innerHTML = dir();
    if (dir() == "down") {
    	alert(dir());
    	}
    recordedTime = (new Date).getTime();
  }, !1);
  document.documentElement.style.userSelect = "none";
};

</script>
  
<script>
  
//Google Maps code for Veuzz
//a whole bunch of globals
var map, infoWindow;
var myMarker = null;
var s;
var pos; //current location
var posselected = null;
var lat = new Array();
var lng = new Array();
var place = new Array();
var exp = new Array();
var econ = new Array();
var img = new Array();
var url = new Array();
var go = new Array();
var arrayCount;
var zoomin;
var sitetype;
var markers = new Array();
var waypoints;
var directionsService;
var directionsRenderer;
var directionsDisplay;

//infoWindow = new google.maps.InfoWindow;
function initMap(json) {
s=json;
var nocenter = 1;
sitetype = "exp";
    
   directionsService = new google.maps.DirectionsService();
   directionsRenderer = new google.maps.DirectionsRenderer();
  
	//zoom in
	if (sitetype != "site") {
		zoomin = 8;
	} 
	
	if (sitetype == "site") {
		zoomin = 18;
	} 
	
    //prime map
    pos = {lat: 38.205885, lng: -75.162079}; 
    
    infoWindow = new google.maps.InfoWindow;
    
	var mapOptions = {
		// 8 for Veuzz map
		//16 for all site maps
		zoom: 10,
		//disableDefaultUI: true,
		center: pos,
		mapTypeControl: true,
		mapTypeControlOptions: {
	    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
	    position: google.maps.ControlPosition.BOTTOM_LEFT
		},
		zoomControl: true,
		zoomControlOptions: {
	    position: google.maps.ControlPosition.RIGHT_BOTTOM
		},
		scaleControl: true,
		streetViewControl: false,
		maxWidth: 190,
		minWidth: 190,
		opacity: 0.00,
		buttons: { close: { visible: false } },
		streetViewControlOptions: {
	    position: google.maps.ControlPosition.RIGHT_BOTTOM
		},
		fullscreenControl: false
	};

	map = new google.maps.Map(document.getElementById('map'), mapOptions);

    directionsDisplay = new google.maps.DirectionsRenderer;
    
    //suppress A B markers at end of routes
    directionsRenderer.setMap(map); 
    directionsRenderer.setOptions( { suppressMarkers: true } );
	
	populateExp();
	addMarkers();
	
    // New function to track user's location.
    const trackLocation = ({ onSuccess, onError = () => { } }) => {
		if ('geolocation' in navigator === false) {
    		return onError(new Error('Geolocation is not supported by your browser.'));
    }
  		// Use watchPosition instead.
  		return navigator.geolocation.watchPosition(onSuccess, onError);
  	};

   // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.watchPosition(function(position) {
        pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        
        if (nocenter == 1) {
        	//centers map to current location
        	//center: pos;
        	map.setCenter(pos);
        	nocenter = 0;
        	}
        	
        //map.setCenter(new google.maps.LatLng(position.coords.latitude, position.coords.longitude), 16);
        if (myMarker) {
            myMarker.setPosition(pos);
            var latLng = myMarker.getPosition(); // returns LatLng object
            pos = myMarker.getPosition();
            if (posselected != null) {
	            showListRoute();
            }

		} else {
             myMarker = new google.maps.Marker({
			 map: map, 
			 //center: pos,
			 icon: {
			 path: google.maps.SymbolPath.CIRCLE,
			 strokeColor: "#0000FF",
			 scale: 8
			 
          	}
		  });
		  }
        //map.setCenter(pos);
      }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
      });
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
};

  // Use the new trackLocation function.
  trackLocation({
    onSuccess: ({ coords: { latitude: lat, longitude: lng } }) => {
      myMarker.setPosition({ lat, lng });
      pos = myMarker.getPosition();
      if (posselected != null) {
	            showListRoute();
            }
      //map.panTo({ lat, lng });
      options = {
	  enableHighAccuracy: true,
	  timeout: 500,
	  distanceFilter: 1,
	  maximumAge: 0,
		};
    },
    onError: err =>
      alert(`Error: ${getPositionErrorMessage(err.code) || err.message}`)
  });
  
  backtoExp();

  //Listeners
  function attachMessage(marker, Message) {
    var infowindow = new google.maps.InfoWindow({
      content: Message,
      minWidth: 180, 
    });
    
    marker.addListener('mouseover', function() {
      infowindow.open(marker.get('map'), marker);
      
    });
    
    marker.addListener('mousedown', function() {
      infowindow.open(marker.get('map'), marker);
    });
    
     marker.addListener('mouseup', function() {
      infowindow.close(marker.get('map'), marker);
    });
    
    marker.addListener('mouseout', function() {
      infowindow.close(marker.get('map'), marker);
    });
   
   
   //Sends var contentString to append_to_div
   marker.addListener('click', function() {
      //returnContentString (mycontent) 
      //append_to_div(econ[marker.index]+'<p>'+img[marker.index]);
      //function expContentString (exp, img, url, econ)
      //append_to_div(expContentString(exp[marker.index],img[marker.index],url[marker.index],econ[marker.index]);
      
      var data = ContentString(exp[marker.index],img[marker.index],url[marker.index],econ[marker.index],go[marker.index],place[marker.index]);
      
      //selected location
      posselected = {lat: lat[marker.index], lng: lng[marker.index]}; 
      append_to_div(data);
      //contentString[0,marker.index]);
      showListRoute();

    });

	function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                          'Error: The Geolocation service failed.' :
                          'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
  	}
 
}

//using showListRoute for both listing go and marker go
//can call showListRoute to continually update route
function showRoute() {
var mypos = pos;

	//changeDisplayOptions();
	directionsRenderer.setMap(map); 
	directionsRenderer.setOptions( { suppressMarkers: true, suppressPolylines: false, preserveViewport: true } );
	directionsService
    .route({
      origin: mypos,
      destination: posselected,
      travelMode: google.maps.TravelMode.DRIVING,
    })
    .then((response) => {
      directionsRenderer.setDirections(response);
    })
    .catch((e) => window.alert("Directions request failed due to " + status)); 
    
};

function showListRoute(go) {
var mypos = pos;

if (go != null) {
	posselected = {lat: lat[go],lng: lng[go]};
	}
	
	//changeDisplayOptions();
	directionsRenderer.setMap(map); 
	directionsRenderer.setOptions( { suppressMarkers: true, suppressPolylines: false, preserveViewport: true } );
	directionsService
    .route({
      origin: mypos,
      destination: posselected,
      travelMode: google.maps.TravelMode.DRIVING,
    })
    .then((response) => {
      directionsRenderer.setDirections(response);
      distanceTo(response);
     
    })
    //.catch((e) => window.alert("Directions request failed due to " + status)); 

    //haversineDistance(mypos, posselected);
};

//show distance to site
function distanceTo(response) {
var uniqueId = "miles";

if (sitetype != "site") {
	
	//KM to miles conversion 2 decimal points
	var d = response.routes[0].legs[0].distance.value/1609.34;
	d = d.toFixed(2);

  //Swal.fire(d + ' miles');
  //alert(d+" miles");
  //alert(markers.length+","+arrayCount);
  	
  	deleteMarker();

 marker = new google.maps.Marker({
    position: location,
    map: map
});

    infoWindow = new google.maps.InfoWindow({
    content: d + ' miles',
    });

    infoWindow.open({
      anchor: marker,
      map,

  });
  
  //Set unique id
    marker.id = uniqueId;
  	
  	markers.push(marker);
  
    //Set Content of InfoWindow.
    //infoWindow.setContent(d + ' miles');

    //Set Position of InfoWindow.
    infoWindow.setPosition(pos);

    //Open InfoWindow.
    //infoWindow.open(map);
    
    }
    
};

function deleteMarker() {
    //Find and remove the marker from the Array
    for (var i = 0; i < markers.length; i++) {
        if (markers[i].id == "miles") {
            //Remove the marker from Map                  
            markers[i].setMap(null);

            //Remove the marker from array.
            markers.splice(i, 1);
            return;
        }
    }
};

//straight line distance between 2 points
//not driving (route) distance
function haversineDistance(mk1, mk2) {
    var rad = 6371.0710; // Radius of the Earth in kms
    var rlat1 = mk1.lat * (Math.PI/180); // Convert degrees to radians
    var rlat2 = mk2.lat * (Math.PI/180); // Convert degrees to radians
    var difflat = rlat2-rlat1; // Radian difference (latitudes)
    var difflon = (mk2.lng-mk1.lng) * (Math.PI/180); // Radian difference (longitudes)

    var d = 2 * rad * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
   // d = d * 0.62;
    //alert(d+ " miles");
  
};

function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
    directionsService.route({
        origin: pointA,
        destination: pointB,
        avoidTolls: true,
        avoidHighways: false,
        travelMode: google.maps.TravelMode.DRIVING
    }, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
};

function clearRoute() {

directionsRenderer.setMap(map); 
directionsRenderer.setOptions( { suppressMarkers: true, suppressPolylines: true } );

var center = map.getCenter();
myMarker.setPosition(center);

};

function centerPos() {

   // Try HTML5 geolocation.

var center = map.getCenter();
myMarker.setPosition(center);
	
};

function populateExp(){

	//FOR EXPERIENCE MARKERS
  	//parse json as object
  	var obj = JSON.parse(s);
  	
  	//total experiences in db
  	arrayCount = obj.length;
  	//alert("total experiences "+arrayCount);

	//type of experiences
	//field_1
	for (i = 0; i < arrayCount; i++) {
		exp[i] = (obj[i].field_1); 
		econ[i] = (obj[i].field_3);
		//alert(expcontent[i]);
		//experience content|information
		//alert(obj[0].field_3);
	}
  	
  	//latitude and longitude for Google Map experience markers
	for (i = 0; i < arrayCount; i++) {
		var obja = (obj[i].field_2_raw);
		lat[i] = obja.latitude;
		lng[i] = obja.longitude;
		//alert(lat[i]+","+lng[i]);
		}
		
  	//city and state for Google Map experience markers
	for (i = 0; i < arrayCount; i++) {
		var obja = (obj[i].field_2_raw);

		place[i] = obja.city + ", " + obja.state;
		//alert(lat[i]+","+lng[i]);
		}

	//site url	  
	for (i = 0; i < arrayCount; i++) {
		//var obja = (obj[i].field_4);
		url[i] = (obj[i].field_4); 
		//+"<br>"+obj[i].field_3);
	}
	
	//from experiences
	//img url source
	for (i = 0; i < arrayCount; i++) {
		var obja = (obj[i].field_21_raw);
		img[i] = obja.url; 
	}
	
	//go - to which site
		for (i = 0; i < arrayCount; i++) {
		go[i] = i; //which exp sites in the json array
	}
	//END EXPERIENCE

}

function populateSites(go){
var j = go;

	//FOR SITE MARKERS
  	//parse json as object
  	var obj = JSON.parse(s);
  	
  	//total experiences in db
  	//arrayCount = obj.length;
  	//alert("total experiences "+arrayCount);
  	
  	arrayCount = obj[j].sites.length;
  	//alert("total sites "+siteCount);

	//type of experiences
	//field_1
	for (i = 0; i < arrayCount; i++) {	
		exp[i] = (obj[j].sites[i].field_16); 
		econ[i] = (obj[j].sites[i].field_18); 
	//alert(expcontent[i]);
	//experience content|information
	//alert(obj[0].field_3);
	}
  	
	//latitude and longitude for Google Map site markers
	for (i = 0; i < arrayCount; i++) {
		var objs = (obj[j].sites[i].field_17_raw);
		lat[i] = objs.latitude;
		lng[i] = objs.longitude;
		//alert(lat[i]+","+lng[i]);
	}

	//site url	  
	for (i = 0; i < arrayCount; i++) {
		var obja = (obj[j].sites[i].field_32_raw); 
		url[i] = obja.url;
		//+"<br>"+obj[i].field_3);
	}
	
	//from experiences
	//img url source
	for (i = 0; i < arrayCount; i++) {
		var obja = (obj[j].sites[i].field_19_raw); 
		img[i] = obja.url; 
	}
	
	//no go - to which site
	//END SITES

};

function backtoExp() {

	posselected = null;
	clearRoute();
	removeMarkers();
	closeAllInfowindows();
	
	//remove div content
	resetdiv();
	sitetype = "exp";

	populateExp();
	addMarkers();
	
	moveMapTo();
	
};

function gotoSite(go){
	//alert(go);
	removeMarkers();
	//remove div content
	resetdiv();
	sitetype = "site";
	
	showListRoute(go);

	populateSites(go);
	addMarkers();
	moveMapTo();
	map.setZoom(16);
	
};

function moveMapTo(){

	//zoom in
	if (sitetype != "site") {
	

    navigator.geolocation.getCurrentPosition(function(position) {
	    pos = {
		    lat: position.coords.latitude,
		    lng: position.coords.longitude
		    };
		});

		//myMarker.setPosition(pos);
		map.setCenter(pos);
		var center = map.getCenter();
		myMarker.setPosition(center);
		map.setZoom(10);	
	} 
	
	if (sitetype == "site") {
		map.setCenter({lat:lat[0], lng:lng[0]});
		map.setZoom(16);
	} 
};

window.setInterval( function () {
    setGeolocation();
},  
250 //check every 1few seconds
);

function addMarkers() {
	
const image = 'https://www.veuzz.com/images/pin_historic_sites.png';

    for (i = 0; i < arrayCount; i++) {
    
	marker = new google.maps.Marker({

		position: new google.maps.LatLng(lat[i], lng[i]),
		map,
		//determine which icon type
		icon: image,
		
		//Either of next 2 lines work to center icons
		//origin: new google.maps.Point(0, 0),
		//anchor: new google.maps.LatLng(lat[i], lng[i]),

		center: {lat: lat[i], lng: lng[i]},	
		
		index: i
    });

    //push to markers array to delete later
    markers.push(marker);

     //CONTROL INFO WINDOW 
     //Message = title + photo
     const contentString = '<div style="text-align:center">'+exp[i]+'</div>';
     var Message = contentString;
     attachMessage(marker, Message);
     
     	}
    }; //end addMarkers

function removeMarkers(){
	//loop through all markers and remove it.
	for(var i=0; i < markers.length; i++){
   //for(var i=0; i < arrayCount; i++){
        markers[i].setMap(null);
        
    }
    markers = [];
    
};

function closeAllInfowindows() {
	
	//Infowindow.close();
	
};

//function to return contentString
function ContentString (exp, img, url, econ, go, place) {
//alert(sitetype);
//image title, content 
var videoString;

//exp
if (sitetype == "exp") { 

	var contentString =        
       
      '<div style="padding-right: 0px; padding-left:0px"><img src =' + img + ' width="100%"; top="0px"></div>' + '<p>' +
      
      '<div style="padding-right:20px; padding-left:20px; width:100%"; height:100%; -webkit-overflow-scrolling: touch !important; overflow: scroll !important>' +
      
      '<a href="javascript:gotoSite('+go+')"><img border="0" alt="'+go+'" src="https://www.veuzz.com/images/gobutton.png"></a>' +
      
//      '<img src="https://www.veuzz.com/images/directions.png" width = "42px" height = "42px" alt="Directions" title="Directions" //id="imgDirections" style="margin-left: 6px; border:none; cursor:pointer"; onclick = "showListRoute()"/>' +
      
      '</div>' +
      
      '<p><div id="content" style="font-size: 20px; padding-right: 20px; padding-left:20px">' + exp + 
      '</div>' +
      
      '<div id="content" style="font-size: 15; padding-right: 20px; padding-left:20px">' + place + 
      '</div>' +
      
      '<br>'+
      
      '<div id="content" stye = "font-size: 15px">'+
      '<a href = ' + url + ' target = "_blank">'+url+'</a></div>'+
      
      '<div id="content"><p></b>' + econ + '</p></div>'     
 
      //url, GO button
     +'<p></p></p>';
     
     } else {

//site

videoString = "";

	  if (url != null) {
	  videoString = 

/*
VIMEO
 <a href="https://vimeo.com/394685967"
   class="fresco"
   data-fresco-options="
     width: 853,
     height: 480,
     vimeo: { autoplay: 1,controls:1,portrait: 0,loop: 0, allowFullscreen: true, webkitallowfullscreen: true, mozallowfullscreen: true}
   "><img src="https://www.veuzz.com/images/video_play.png" width = "42px" height = "42px"></a>
   
YOUTUBE
<a
  href="http://www.youtube.com/watch?v=7gFwvozMHR4"
  class="fresco"
  data-fresco-options="
      width: 853,
      height: 480,
      youtube: { autoplay: 0 }
    "
  >Youtube - Dimensions and options</a
>
*/

'<a href=' + url + ' class= "fresco" data-fresco-options= "width: 853, height: 480, vimeo: { autoplay: 1,controls:1,portrait: 0,loop: 0, allowFullscreen: true, webkitallowfullscreen: true, mozallowfullscreen: true}"><img src="https://www.veuzz.com/images/video_play.png" id="vid" width = "42px" height = "42px"/></a>'; 

  	 } else {
  	 
  	 		videoString = "";
  	 }
	  	 
	  var contentString =        
       
      '<div style="padding-right: 0px; padding-left:0px"><img src =' + img + ' width="100%"; top="0px"></div>' + '<p></p>' +
       
      '<div style="padding-right:20px; padding-left:20px; width:100%"; height:100%; -webkit-overflow-scrolling: touch !important; overflow: scroll !important>' +
      
      '<img src="https://www.veuzz.com/images/TextToVoice.png" width = "42px" height = "42px" alt="Voice" title="Text to Voice" id="imgTextToVoice" style="margin-right: 6px; border:none; cursor:pointer"; onclick = "changeImage()"/>' + 

      videoString + '</div>' +
      
      '<p></p>' +
      
      '<div style="font-size: 20px; font-style:thin; font-weight:300; padding-right: 20px; padding-left:20px">' + exp + 
      
      '</div>' +
      
      '<div id="content" style="padding-right: 20px; padding-left:20px">' + econ + '</div>' +
      
      '<p></p>';     
  
     }

return contentString;
};

//function to return contentString
//exp, img, url, econ
function showExpList() {
var i, data;
var numarkers = new Array();

var bounds = map.getBounds();
data = "";

if (sitetype == "exp") { 

for (i = 0; i < arrayCount; i++) {

if(bounds.contains(markers[i].getPosition())===true) {
	
	data = data +   
	 
      '<div  style="padding-right: 0px; padding-left:0px"><img src =' + img[i] + ' width="100%"; top="0px"></div>' + '<p>' +
      
      '<div style = "padding-right: 20px; padding-left:20px" >' +
      
      '<a href="javascript:gotoSite('+go[i]+')"><img border="0" alt="'+go[i]+'" src="https://www.veuzz.com/images/gobutton.png"></a>' +
      
            '<img src="https://www.veuzz.com/images/directions.png" width = "42px" height = "42px" alt="Directions" title="Directions" id="imgDirections" style="margin-left: 6px; border:none; cursor:pointer"; onclick = "showListRoute('+go[i]+')"/>' +
      
      '</div>' +  
      
      '<p><div id="content" style="font-size: 20px; padding-right: 20px; padding-left:20px">' + exp[i] + 
      '</div>' +
      
      '<div id="content" style="font-size: 15; padding-right: 20px; padding-left:20px">' + place[i] + 
      '</div>' +
      
      '<br>'+
      
      '<div id="content">'+
      '<a href = ' + url[i] + 'font-size: 15px; target="_blank">'+url[i]+'</a></div>'+
      
      '<div id="content"><p></b>' + econ[i] + '</p></div>'+     
      
      //url, GO button on top 
     '<p></p></p>';
     
    	 } //if
    	 	
     } //for
     
     if (data == "") {
	     
	     data = '<p><br><br><br><div id="content" style = "display: relative; vertical-align: middle; text-align: center; align-items: center;">There are no Veuzz sites in this geographic region</div></br></br></br></p>'
     }

for (i = 0; i < arrayCount; i++) {
	
	} //for
    
} else {

//site data
for (i = 0; i < arrayCount; i++) {
	data = data +       
       
      '<div id="content" style="padding-right: 0px; padding-left:0px"><img src =' + img[i] + ' width="100%"; top="0px"></div>' +
      
      '<p><div id="content" style="font-size: 20px; padding-right: 20px; padding-left:20px">' + exp[i] + 
      '</div>' +
      
      '<div id="content"><p></b>' + econ[i] + '</p></div>'+     
      
      //url, no GO button
     '<p></p>';    
     }      
	     
   }

append_to_div(data);	
};

//Gets text from content div
//Parses out <b>, <p> etc tags
//Changeimage() changes icon from static to animated
function TextToVoice() {  

//Get text from #content div
var text = document.getElementById('content').innerHTML; 

text = text.replace(new RegExp('/', 'g'), '');
text = text.replace(/<strong>/g, '');
text = text.replace('</strong>', '');
text = text.replace(/<p>/g, '  ');
text = text.replace('</p>g', '');
text = text.replace('<b>', '');
text = text.replace('</b>', '');
text = text.replace('<br>', '');
text = text.replace('</br>', '');
             
//text = "This is a test";

if ("speechSynthesis" in window) {
  
    const msg = new SpeechSynthesisUtterance(text);
	    
    msg.lang = "en-GB";
    msg.text = text;
    msg.volume = 1;
    msg.rate = 0.95;
    msg.pitch = 0.92; 

   //doesn't work on iOS
   msg.onend = function(event) {
   //const msg = new SpeechSynthesisUtterance("");
	   const endTime = new Date();
	   //alert(`Speech finished at ${endTime}`);

	   var Image_Id = document.getElementById('imgTextToVoice');
	   Image_Id.src = "https://www.veuzz.com/images/text_to_voice.png";
}

   window.speechSynthesis.speak(msg);
   
   	// define variables to store the start and end times
	var startTime, endTime;
	
	// add an event listener to detect when the audio starts playing
	msg.addEventListener('start', function(event) {
	  startTime = new Date().getTime() / 1000;
	});
	
	// add an event listener to detect when the audio finishes playing
	msg.addEventListener('end', function(event) {
	  endTime = new Date().getTime() / 1000;
	  var duration = endTime - startTime;
	  //alert('Audio duration:', duration, 'seconds');
	});
 
 /*  msg.addEventListener('end', function(event) {
	   let msg = new SpeechSynthesisUtterance("");
	   $('#imgTextToVoice').trigger('click');
	   msg = new SpeechSynthesisUtterance("");
	   speechSynthesis.pause();
	   speechSynthesis.cancel();
	   var Image_Id = document.getElementById('imgTextToVoice');
	   Image_Id.src = "TextToVoice.png";
	   });
*/
  
}};

//Change image from static to animated
//Stop voice when clicked second time

function changeImage() {
    var Image_Id = document.getElementById('imgTextToVoice');
    if (Image_Id.src.match("TextToVoice.png")) {
        Image_Id.src = "https://www.veuzz.com/images/TextToVoice_animated.png";
        TextToVoice();
    }
    else {
        Image_Id.src = "https://www.veuzz.com/images/TextToVoice.png";
        if ("speechSynthesis" in window) {
        	let msg = new SpeechSynthesisUtterance("");
        	speechSynthesis.pause();
        	speechSynthesis.cancel();
        	}
    }
};


function getTextData() {
var d;
	
	$.get("apikey.txt", function(data) {
	alert(data);

});

};

var API_KEY;

function getTxtData() {
  
//alert("here");
/*const fs = require('fs')
fs.readFile('https://www.veuzz.com/map/apikey.txt', (err, inputD) => {
   if (err) throw err;
      alert(inputD.toString());
})
*/

//this works
jQuery.get('https://www.veuzz.com/maps/apikey.txt', function(data) {
    API_KEY = data;
    API_KEY = "https://maps.googleapis.com/maps/api/js?key=AIzaSyCrTZ5ngLS7UbsbQXIDH6Kx3TtGMXl-SCw&callback=initMap";
});
};

</script>

<script>
	
var elem = document.querySelector('.main-carousel');
var flkty = new Flickity( elem, {
  loadImages: 'true',
  cellAlign: 'center',
  contain: true
});

// element argument can be a selector string
//   for an individual element
var flkty = new Flickity( '.main-carousel', {

});

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrTZ5ngLS7UbsbQXIDH6Kx3TtGMXl-SCw&callback=initMap"></script>
  
</body>
</html>