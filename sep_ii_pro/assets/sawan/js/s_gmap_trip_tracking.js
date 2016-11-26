// map main global varibles
var _map;

//latlngbounds
var latlngbounds;
var markers = [];
$(function() {
    var centerCord = {lat: 6.9271, lng: 79.8612};
    _map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: centerCord
    });
    latlngbounds = new google.maps.LatLngBounds();
});

function load_trip_loc(){
    $.ajax({
        type: 'post',
        url: Base_url + 'Gps_map_tracking/load_trip_loc',
        data: {
            selct_trp: $('#selct_trp').val()
        },
        success: function (data) {
            deleteMarkers();
            console.log(data);
            var plc_arr = JSON.parse(data);
            var lat_lng = new Array();
            var latlngbounds = new google.maps.LatLngBounds();
            for(var i = 0; i < plc_arr.length; i++) {
                var data_plc = plc_arr[i];
                var myLatlng = new google.maps.LatLng(data_plc.lat, data_plc.lon);
                lat_lng.push(myLatlng);
    //            latlngbounds.extend(marker.position);
                latlngbounds.extend(myLatlng);
                var regex = new RegExp(',', 'g');
                var marker_ac = addMarker(myLatlng,data_plc.pl_name);
                var content = '<h4>'+ data_plc.pl_name 
                              +'</h4><div>'+ data_plc.pl_description.replace(regex,'<br/>'); 
                              + '</div>';
                var infowindow = new google.maps.InfoWindow();

                google.maps.event.addListener(marker_ac,'click', 
                    (function(marker_ac,content,infowindow){ 
                        return function() {
                           infowindow.setContent(content);
                           infowindow.open(_map,marker_ac);
                        };
                    })(marker_ac,content,infowindow)); 
                        
            }
//            showMarkers();
            //***********ROUTING****************//

            //Initialize the Path Array
            var path = new google.maps.MVCArray();

            //Initialize the Direction Service
            var service = new google.maps.DirectionsService();

            //Loop and Draw Path Route between the Points on MAP
            for (var i = 0; i < (lat_lng.length - 1); i++) {
                var src = lat_lng[i];
                var des = lat_lng[i + 1];
//                            path.push(src);
//                            poly.setPath(path);
                service.route({
                    origin: src,
                    destination: des,
                    travelMode: google.maps.DirectionsTravelMode.DRIVING,
                    provideRouteAlternatives: false,
                    avoidTolls: true,
                    region: 'LK'
                }, function (result, status) {
                    if (status === google.maps.DirectionsStatus.OK) {
                        var directionsRenderer = new google.maps.DirectionsRenderer({suppressMarkers: true});
                        directionsRenderer.setMap(_map);
                        directionsRenderer.setDirections(result);
                        for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                            if(i !== (lat_lng.length-1)){
                                path.push(result.routes[0].overview_path[i]);
                            }
//                                        console.log(result.routes[0].overview_path[i]);
                        }
                    }
                });
            }
            _map.setCenter(latlngbounds.getCenter());
            _map.fitBounds(latlngbounds);
        },
        error: function() {
        }
    });
}



// Adds a marker to the map and push to the array.
    function addMarker(location,title) {
      var marker = new google.maps.Marker({
        position: location,
        map: _map,
        icon:  Base_url + '/assets/sawan/images/gmap/green-marker.png',
//        animation: google.maps.Animation.DROP,
        title: title 
      });
      markers.push(marker);
      return marker;
    }

// Sets the map on all markers in the array.
    function setMapOnAll(map) {
      for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
      }
    }

// Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
      setMapOnAll(null);
    }

      // Shows any markers currently in the array.
    function showMarkers() {
      setMapOnAll(_map);
    }

      // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
      clearMarkers();
      markers = [];
    }