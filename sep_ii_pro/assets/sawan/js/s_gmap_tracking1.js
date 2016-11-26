/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// map main global varibles
var _map, _animate_marker
        , _km_layer = 0, _point_start, _point_end,
          int_car = 21;

var car_spped = 250;
var ikk = 0;
var i_interval = 0;
var break_exsist = 1; //no use check
var prev_k = -1;

// map global arrays
var time = new Array();

//check box
var _mapOptions;
var resume_k = true;
var latlngbounds;

$(function() {
    var centerCord = {lat: 6.9271, lng: 79.8612};
    _map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: centerCord
    });
    latlngbounds = new google.maps.LatLngBounds();
//    $('.datepicker').datepicker();
});

function Load_Map2() {
    alert('Load_Map');
    _mapOptions = {
        center: new google.maps.LatLng(6.9344, 79.8428),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    _map = new google.maps.Map(document.getElementById("map"), _mapOptions);
    $('#date').html("");
    $('#PauseBtn').hide();
    $('#ResumeBtn').hide();
    clearInterval(i_interval);
    i_interval = 0;
    ikk = 0;
    _km_layer = 0;
    prev_k = -1;
    resume_k = true;
}

function doc() {
    volatile_car();
}

function volatile_car() {
    var v_car = parseInt($('#car_range').val());
    car_spped = parseInt((int_car - v_car)) * 50;
    break_exsist = 0;
}


function draw_live_route() {
    var user;
    var date = $('#invdate').val();
//    var to = $('#to').val();
//    var from = $('#from').val();
    if(date != "") {
        ikk = 0;
        m_lating_push = '';
        clearInterval(i_interval);
        $.ajax({
            type: 'post',
            url: Base_url + 'Gps_map_tracking/load_cords',
            data: {
                user: user,
                date: date
//                to:to,
//                from:from
            },
            success: function (data) {
                _point_start = '';
                _point_end = '';
                _km_layer = 0;
                var _lating_push = new Array();
                var routes_ = JSON.parse(data);
                if(routes_.length=='0'){
                    alert('Data Not Found');
                }
                if (typeof routes_.length != "undefined" && routes_.length > 0) {
                    $('#PauseBtn').show();
                    var routes_length = routes_.length;
                    //change default location first lat and lon
                    _mapOptions = {
                        center: new google.maps.LatLng(routes_[0].lat, routes_[0].lon),
                        zoom: 18,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        draggable: true
                    };    
                    _map.setOptions(_mapOptions);

                    // set first marker on the map give first json object
                    _animate_marker = new google.maps.Marker({position: new google.maps.LatLng(routes_[0].lat, routes_[0].lon),
                        map: _map,
                        icon: Base_url + '/assets/sawan/images/gmap/green-marker.png'
                    });
                    //var travelWaypoints = [];
                    for (var i = 0; i < routes_length; i++) {
                        var myLatlng = new google.maps.LatLng(routes_[i].lat, routes_[i].lon);
                        _lating_push.push(myLatlng);
                        latlngbounds.extend(myLatlng);
                        time.push(routes_[i].time);
                     }
                    var contentString = '<div id="content">'+
                        '<div id="siteNotice">'+
                        '</div>'+
                        '<h1 id="firstHeading" class="firstHeading">Marker</h1>'+
                        '<div id="bodyContent">'+
                        '<p>User Details</p>'+
                        '</div>'+
                        '</div>';
                    var infowindow = new google.maps.InfoWindow({
                      content: contentString
                    });
//     ----------------------------------------------------------------------------------------------------               
                    _animate_marker.addListener('mouseover', function() {
                        infowindow.open(_map, _animate_marker);
                    });
                    _animate_marker.addListener('mouseout', function() {
                        infowindow.close();
                    });      
//     ----------------------------------------------------------------------------------------------------         
                    m_lating_push = _lating_push;
                    addrouteWithTimeout();
                    _map.setCenter(latlngbounds.getCenter());
                    _map.fitBounds(latlngbounds);
                }
            }
        });
    } else {
        alert('Please Select Date & User');
    }
}

function resume_btn_click() {
    $('#ResumeBtn').hide();
    $('#PauseBtn').show();
    resume_k = true;
    ikk = prev_k;
    addrouteWithTimeout();
}

function pause_btn_clck() {
    resume_k = false;
    $('#PauseBtn').hide();
    $('#ResumeBtn').show();
}


function addrouteWithTimeout() {
    if (resume_k == true) {
        i_interval = window.setTimeout(addrouteWithTimeout, car_spped);
        if ((ikk + 1) < m_lating_push.length) {
            //create new lating points
            _point_start = (m_lating_push[ikk]);
            _point_end = (m_lating_push[ikk + 1]);
            
            //Initialize the Path Array
//            var path = new google.maps.MVCArray();
//
//            //Initialize the Direction Service
//            var service = new google.maps.DirectionsService();
//
//            //Set the Path Stroke Color
//            var poly = new google.maps.Polyline({ map: _map, strokeColor: '#4986E7' });
//            
//            path.push(_point_start);
////            poly.setPath(path);
//            service.route({
//                origin: _point_start,
//                destination: _point_end,
//                travelMode: google.maps.DirectionsTravelMode.DRIVING
//            }, function (result, status) {
//                if (status === google.maps.DirectionsStatus.OK) {
////                    var directionsRenderer = new google.maps.DirectionsRenderer;
////                    directionsRenderer.setMap(_map);
////                    directionsRenderer.setDirections(result);
//                    for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
////                                        if(i !== (lat_lng.length-1)){
//                            path.push(result.routes[0].overview_path[i]);
//                            poly.setPath(path);
////                                        }
////                                        console.log(result.routes[0].overview_path[i]);
//                    }
//                }
//            });
            
            
            //set new lating pont to Polyline
            var map_polyn = new google.maps.Polyline({
                path: [_point_start,
                    _point_end],
                map: _map,
                strokeColor: '#4986E7',
                geodesic: true,
//                strokeOpacity: 0.6,
                strokeWeight: 6
            });
            _animate_marker.setPosition(_point_end);
            _map.panTo(_point_end);
            _map.setOptions({zoom: 17});
            _km_layer += (google.maps.geometry.spherical.computeDistanceBetween(_point_start, _point_end) / 1000);
            $('#km_ly').text(_km_layer.toFixed(2) + ' km');
            $("#win").text(time[ikk] + " Minutes");
        }
        
        prev_k = ikk;
        ikk++;
    }
}

function clear_draw_polyn() {
    _km_layer = 0;
    var cl_pol = '';
    if (typeof _animate_marker != 'undefined') {
        _animate_marker.setMap(null);
    }
    $.each(_lating_push, function (index, value) {
        cl_pol = value;
        cl_pol.setMap(null);
    });

    $.each(map_polyn, function (index, value) {
        cl_pol = value;
        cl_pol.setMap(null);
    });

    clearInterval(i_interval);
    i_interval = 0;
    ikk = 0;
    _km_layer = 0;
    resume_k = true;
    prev_k = -1;
}
