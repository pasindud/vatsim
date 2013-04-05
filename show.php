<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>PHP/MySQL & Google Maps Example</title>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
    //<![CDATA[

    var customIcons = {
      restaurant: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      bar: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      }
    };

    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
     //   center: new google.maps.LatLng(47.6145, -122.3418),
        center: new google.maps.LatLng(0,0),
        zoom:3,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("http://pasindu.us/vatsim/api?format=xml&callback=databack&data=pilots", function(data) {
        var xml = data.responseXML;
		var qwe=3000;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 1; i < markers.length; i++) {
		
	
			 console.log(i);
          var name = markers[i].getAttribute("callsign");
          var address = markers[i].getAttribute("realname");
          var type = markers[i].getAttribute("cid");
		
          var point = new google.maps.LatLng(parseFloat(markers[i].getAttribute("latitude")) , parseFloat(markers[i].getAttribute("longitude")));
          var html = "<b>" + name + "</b> <br/>" + address;
          var icon = customIcons[type] || {};
	 var marker = new google.maps.Marker({  position: point,
              map: map,
          draggable: false,
          animation: google.maps.Animation.DROP
          });
		  
          bindInfoWindow(marker, map, infoWindow, html);
	  
        }
      });
    }
var ij=1;
	function mkload(point){
	
			 setInterval(function() {
	

	}, ij * 200);
	}
	
    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    //]]>

  </script>

  </head>
  <style type="text/css">
     html { height: 100% }
     body { height: 100%; margin: 0px; padding: 0px }
     #map { height: 100% }
   </style>
  <body onload="load()">
    <div id="map" ></div>
  </body>

</html>
