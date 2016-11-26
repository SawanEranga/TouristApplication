/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var map, path = new google.maps.MVCArray(),
    service = new google.maps.DirectionsService(), poly;

function Init() {
  var myOptions = {
    zoom: 17,
    center: new google.maps.LatLng(37.2008385157313, -93.2812106609344),
    mapTypeId: google.maps.MapTypeId.HYBRID,
    mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.HYBRID,
          google.maps.MapTypeId.SATELLITE]
    },
    disableDoubleClickZoom: true,
    scrollwheel: false,
    draggableCursor: "crosshair"
  }

  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  poly = new google.maps.Polyline({ map: map });
  google.maps.event.addListener(map, "click", function(evt) {
    if (path.getLength() === 0) {
      path.push(evt.latLng);
      poly.setPath(path);
    } else {
      service.route({
        origin: path.getAt(path.getLength() - 1),
        destination: evt.latLng,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
      }, function(result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
          for (var i = 0, len = result.routes[0].overview_path.length;
              i < len; i++) {
            path.push(result.routes[0].overview_path[i]);
          }
        }
      });
    }
  });
}



//
function load_cat(){
    if(parseInt($('#selct_cat').val()) !== -1){
        $.ajax({
            type: 'POST',
            url: Base_url + 'Gps_map/load_cat',
            data: {
                cat_type: $('#selct_cat').val()
            },
            success: function(data) {
                var agency = JSON.parse(data);
                deleteMarkers();
                for (var x = 0; x < agency.length; x++) {
                    var markerCord = new google.maps.LatLng(agency[x].pl_lat, 
                    agency[x].pl_long);
                    var marker = addMarker(markerCord,agency[x].pl_name);
                    
                    var content = '<h4>'+ agency[x].pl_name 
                                  +'</h4><div>'+ agency[x].pl_description 
                                  + '</div>';
                    var infowindow = new google.maps.InfoWindow();

                    google.maps.event.addListener(marker,'click', 
                        (function(marker,content,infowindow){ 
                            return function() {
                               infowindow.setContent(content);
                               infowindow.open(mapObj,marker);
                            };
                        })(marker,content,infowindow)); 
                }
            },
            error: function() {
            }
        });
    }
}

// Adds a marker to the map and push to the array.
    function addMarker(location,title) {
      var marker = new google.maps.Marker({
        position: location,
        map: mapObj,
        animation: google.maps.Animation.DROP,
        title: title 
      });
      markers.push(marker)
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
      setMapOnAll(map);
    }

      // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
      clearMarkers();
      markers = [];
    }


    var _gl_markers = [];
    window.onload = function () {
        var centerCord = {lat: 18.641400, lng: 72.872200};
        
    };