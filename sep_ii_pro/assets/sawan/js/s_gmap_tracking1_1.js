/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// map main global varibles
var _map, _path, _service, _poly, _animate_marker
        , _km_layer = 0, _point_start, _point_end,_currentmap,
        _sales_markers, _map_polyn, int_car = 21,lat,lon;

var car_spped = 250;
var ikk = 0;
var i_interval = 0;
var break_exsist = 1;
var timeee;
var down = 0;
var sss = 0;
var total_out = 0;
var product_out = 0;
var unprodut_out = 0;
var missed_out = 0;
var prev_k = -1;
/*
 * 
 * start and end points
 */
var start_marker;
var end_marker;


// map global arrays
var time = new Array();
;
var _gl_sales_markers = [];
var _gl_outlet_markers = [];
var _gl_markers = [];
var _gl_polyn = [];

//routes_length, lat_lng, routes_
var mroutes_length = 0;
var mlat_lng = new Array();
var mroutes_;

var map;
var _mapCurrent;
var rep, date;
var bounds = [];
var drawIndex;
//check box
var nearDealers = [];
var productives = [];
var unproductives = [];
var distance;
var duration;
var startAddrs;
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
var bounds = [];
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
        mroutes_length = 0;
        m_lating_push = '';
        mroutes_ = '';
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
                         _lating_push.push(new google.maps.LatLng(routes_[i].lat, routes_[i].lon));
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
                    mroutes_length = routes_length;
                    m_lating_push = _lating_push;
                    mroutes_ = routes_;
                    addrouteWithTimeout();
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
            //set new lating pont to Polyline
            var map_polyn = new google.maps.Polyline({
                path: [_point_start,
                    _point_end],
                map: _map,
                strokeColor: '#4986E7',
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
