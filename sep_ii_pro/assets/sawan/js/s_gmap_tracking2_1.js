// map main global varibles
var _map;

//latlngbounds
var latlngbounds;

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
                var markers = JSON.parse(data);
                console.log(data);
            //                deleteMarkers();
                for (var x = 0; x < markers.length; x++) {
                    var mapOptions = {
            //            center: new google.maps.LatLng(18.641400, 72.872200),
                        center: new google.maps.LatLng(markers[0].lat, markers[0].lon),
            //            center: centerCord,
                        zoom: 10,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
                    var infoWindow = new google.maps.InfoWindow();
                    var lat_lng = new Array();
                    var latlngbounds = new google.maps.LatLngBounds();
                    for (i = 0; i < markers.length; i++) {
                        var data = markers[i];
                        var myLatlng = new google.maps.LatLng(data.lat, data.lon);
                        lat_lng.push(myLatlng);
            //            latlngbounds.extend(marker.position);
                        latlngbounds.extend(myLatlng);
                        if(i === 0){
                            var marker = new google.maps.Marker({
                                position: myLatlng,
                                map: map,
                                icon:  Base_url + '/assets/sawan/images/gmap/blue-marker.png',
                                title: "Start Point"
                            });
                            (function (marker, data) {
                                google.maps.event.addListener(marker, "click", function (e) {
                                    infoWindow.setContent("Start Point");
                                    infoWindow.open(map, marker);
                                });
                            })(marker, data);
                        }
                        else if(i === (markers.length - 1)){
                            var marker = new google.maps.Marker({
                                position: myLatlng,
                                map: map,
                                icon:  Base_url + '/assets/sawan/images/gmap/green-marker.png',
                                title: "End Point"
                            });
                            (function (marker, data) {
                                google.maps.event.addListener(marker, "click", function (e) {
                                    infoWindow.setContent("End Point");
                                    infoWindow.open(map, marker);
                                });
                            })(marker, data);
                        }
                        else{}
                    }
                    map.setCenter(latlngbounds.getCenter());
                    map.fitBounds(latlngbounds);
                    //***********ROUTING****************//

                    //Initialize the Path Array
                    var path = new google.maps.MVCArray();

                    //Initialize the Direction Service
                    var service = new google.maps.DirectionsService();

                    //Set the Path Stroke Color
//                    var poly = new google.maps.Polyline({ map: map, strokeColor: '#4986E7' });

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
//                                avoidTolls: true,
                                region: 'LK'
                            }, function (result, status) {
                                if (status === google.maps.DirectionsStatus.OK) {
                                    var directionsRenderer = new google.maps.DirectionsRenderer({suppressMarkers: true});
                                    directionsRenderer.setMap(map);
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
                }
            },
            error: function() {
            }
        });
}
