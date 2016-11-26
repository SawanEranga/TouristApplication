/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var mapObj;
var markers = [];
$(function() {
//    mapObj = new GMaps({
//        el: '#map',
//        lat: 6.9271,
//        lng: 79.8612,
//        zoom: 8
//      });
    var centerCord = {lat: 6.9271, lng: 79.8612};
    mapObj = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: centerCord
    });

});

function load_cat(){
    if(parseInt($('#selct_cat').val()) !== -1){
        $.ajax({
            type: 'POST',
            url: Base_url + 'Gps_map/load_cat',
            data: {
                cat_type: $('#selct_cat').val()
            },
            success: function(data) {
    //                    alert(data);
                var agency = JSON.parse(data);
                //alert($agency);
//                mapObj.removeMarkers();
                deleteMarkers();
//                var infowindows = [];
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
//                    infowindows[x] = new google.maps.InfoWindow({
//                        content: '<h4>'+ agency[x].pl_name 
//                                  +'</h4><div>'+ agency[x].pl_description 
//                                  + '</div>',
//                        maxWidth: 200
//                    });
//                    markers[x].addListener('click', function() {
//                        infowindows[x].open(mapObj, markers[x]);
//                      });

//                    var m = mapObj.addMarker({
//                        lat: agency[x].pl_lat,
//                        lng: agency[x].pl_long,
//                        title: agency[x].pl_name,
//                        infoWindow: {
//                          content: '<h4>'+ agency[x].pl_name 
//                                  +'</h4><div>'+ agency[x].pl_description 
//                                  + '</div>',
//                          maxWidth: 200
//                        }
//                    });
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