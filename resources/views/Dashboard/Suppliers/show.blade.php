@extends('Dashboard.layouts.master')
@section('css')
<link href="{{URL::asset('assets/Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/Dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" rel="stylesheet">
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqxiPxkv5Gw46jSkwDJ3GfVflUyy08skI&callback=initMap">
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqxiPxkv5Gw46jSkwDJ3GfVflUyy08skI&libraries=places&callback=initAutocomplete&language=ar&region=EG
         async defer"></script>
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('dashboard/supplier.supplier_profile') }} / {{ $userProfile->first_name . ' ' . $userProfile->last_name }}</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
        </div>

    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
        @include('Dashboard.MessageAlert.message_alert')
        <!-- Start row -->
        <div class="row row-sm">
            <!-- Start Col-lg-4 -->
            <div class="col-lg-4">
                <!-- Start card mg-b-20 -->
                <div class="card mg-b-20">
                    <!-- Start Card Body -->
                    <div class="card-body">
                        <!-- Start pl-0 -->
                        <div class="pl-0">
                            <!-- Start main-profile-overview -->
                            <div class="main-profile-overview">
                                <!-- Start main-img-user profile-user -->
                                <div class="main-img-user profile-user">
                                    <img alt="" src="{{$userProfile->image_path}}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                                </div>
                                <!-- End main-img-user profile-user -->
                                <!-- Start profile-user-name -->
                                <div class="d-flex justify-content-between mg-b-20">
                                    <div>
                                        <h5 class="main-profile-name">{{ $userProfile->first_name . ' ' . $userProfile->last_name }}</h5>
                                        <p class="main-profile-name-text">{{ $userProfile->company_name }}</p>
                                    </div>
                                </div>
                                <!-- End profile-user-name -->
                                <!-- Start Description -->
                                <h6>{{ trans('dashboard/supplier.supplier_description') }}</h6>
                                <div class="main-profile-bio">
                                    {!! $userProfile->description !!}
                                </div>
                                <!-- End Description -->
                                <hr class="mg-y-30">
                                <!-- Start Supplier Info -->
                                <label class="main-content-label tx-13 mg-b-20">{{ trans('dashboard/supplier.supplier_special_info') }}</label>
                                <!-- Start Contact List -->
                                <div class="main-profile-social-list">
                                    <!-- Start Phone Number -->
                                    <div class="media">
                                        <div class="media-icon bg-success-transparent text-success">
                                            <i class="las la-phone"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>{{ trans('dashboard/supplier.phone_number') }}</span> <a>{{ $userProfile->phone }}</a>
                                        </div>
                                    </div>
                                    <!-- End Phone Number -->
                                    <!-- Start Email Address -->
                                    <div class="media">
                                        <div class="media-icon bg-warning-transparent text-warning">
                                            <i class="las la-at"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>{{ trans('dashboard/supplier.supplier_email') }}</span> <a>{{ $userProfile->email }}</a>
                                        </div>
                                    </div>
                                    <!-- End Email Address -->
                                    <!-- Start Primary Address -->
                                    <div class="media">
                                        <div class="media-icon bg-primary-transparent text-primary">
                                            <i class="las la-map-marked"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>{{ trans('dashboard/supplier.supplier_primary_address') }}</span> <a>{!! $userProfile->address_primary !!}</a>
                                        </div>
                                    </div>
                                    <!-- End Primary Address -->
                                </div>
                                <!-- End Contact List -->
                                <!-- End Supplier Info -->
                                <hr class="mg-y-30">
                            </div>
                            <!-- End main-profile-overview -->
                        </div>
                        <!-- End pl-0 -->
                    </div>
                    <!-- End Card Body -->
                </div>
                <!-- End card mg-b-20 -->
            </div>
            <!-- End Col-lg-4 -->
            <!-- Start Col-lg-8 -->
            <div class="col-lg-8">
                <!-- Start Card -->
                <div class="card">
                    <!-- Start Card Body -->
                    <div class="card-body">
                        <!-- Start tabs-menu -->
                        <div class="tabs-menu ">
                            <!-- Start Tabs Head -->
                            <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                                <li class="">
                                    <a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">{{ trans('dashboard/supplier.supplier_more_info') }}</span> </a>
                                </li>
                                <li class="">
                                    <a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span> <span class="hidden-xs">{{ trans('dashboard/supplier.supplier_gallery') }}</span> </a>
                                </li>
                                <li class="">
                                    <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">{{ trans('dashboard/supplier.supplier_settings') }}</span> </a>
                                </li>
                            </ul>
                            <!-- End Tabs Head -->
                        </div>
                        <!-- End tabs-menu -->
                        <!-- Start Tabs Body -->
                        <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                            <div class="tab-pane active" id="home">
                                <h4 class="tx-15 text-primary text-uppercase mb-3">{{ trans('dashboard/supplier.supplier_primary_address') }}</h4>
                                <p class="m-b-5">{!! $userProfile->address_primary !!}</p>
                                <div class="m-t-30">
                                    <h4 class="tx-15 text-uppercase text-primary mt-3">{{-- trans('dashboard/supplier.supplier_currency') --}}</h4>
                                    <div class=" p-t-10">
                                        <h5 class="text-primary m-b-5 tx-14">{{-- $userProfile->currency->id --}}</h5>
                                    </div>
                                    <hr>
                                    <div class="">
                                        <h5 class="text-primary m-b-5 tx-14">{{ trans('dashboard/supplier.supplier_address_location') }}</h5>
                                        <div id="map" style="width:100%;height:400px;"></div>    
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="tab-pane" id="profile">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/7.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/8.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/9.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb  mb-xl-0">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/10.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb  mb-xl-0">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/6.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class=" border p-1 card thumb  mb-xl-0">
                                            <a href="#" class="image-popup" title="Screenshot-2"> <img src="{{URL::asset('assets/img/photos/5.jpg')}}" class="thumb-img" alt="work-thumbnail"> </a>
                                            <h4 class="text-center tx-14 mt-3 mb-0">Gallary Image</h4>
                                            <div class="ga-border"></div>
                                            <p class="text-muted text-center"><small>Photography</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="settings">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="FullName">Full Name</label>
                                        <input type="text" value="John Doe" id="FullName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="email" value="first.last@example.com" id="Email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Username">Username</label>
                                        <input type="text" value="john" id="Username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="AboutMe">About Me</label>
                                        <textarea id="AboutMe" class="form-control">Loren gypsum dolor sit mate, consecrate disciplining lit, tied diam nonunion nib modernism tincidunt it Loretta dolor manga Amalia erst volute. Ur wise denim ad minim venial, quid nostrum exercise ration perambulator suspicious cortisol nil it applique ex ea commodore consequent.</textarea>
                                    </div>
                                    <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                                </form>
                            </div>

                        </div>
                        <!-- End Tabs Body -->
                    </div>
                    <!-- End Card Body -->
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col-lg-8 -->
        </div>
        <!-- End row -->
    </div>
    <!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection


@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/Dashboard/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/notify/js/notifIt-custom.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

<script>
    $("#pac-input").focusin(function() {
        $(this).val('');
    });
    $('#latitudef').val('');
    $('#longitudef').val('');
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 24.740691, lng: 46.6528521 },
            zoom: 13,
            mapTypeId: 'roadmap'
        });
        // move pin and current location
        infoWindow = new google.maps.InfoWindow;
        geocoder = new google.maps.Geocoder();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setCenter(pos);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(pos),
                    map: map,
                    title: 'موقعك الحالي'
                });
                markers.push(marker);
                marker.addListener('click', function() {
                    geocodeLatLng(geocoder, map, infoWindow,marker);
                });
                // to get current position address on load
                google.maps.event.trigger(marker, 'click');
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
        var geocoder = new google.maps.Geocoder();
        google.maps.event.addListener(map, 'click', function(event) {
            SelectedLatLng = event.latLng;
            geocoder.geocode({
                'latLng': event.latLng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        deleteMarkers();
                        addMarkerRunTime(event.latLng);
                        SelectedLocation = results[0].formatted_address;
                        console.log( results[0].formatted_address);
                        splitLatLng(String(event.latLng));
                        $("#pac-input").val(results[0].formatted_address);
                    }
                }
            });
        });
        function geocodeLatLng(geocoder, map, infowindow,markerCurrent) {
            var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
            /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
            $('#latitudef').val(markerCurrent.position.lat());
            $('#longitudef').val(markerCurrent.position.lng());
            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        map.setZoom(8);
                        var marker = new google.maps.Marker({
                            position: latlng,
                            map: map
                        });
                        markers.push(marker);
                        infowindow.setContent(results[0].formatted_address);
                        SelectedLocation = results[0].formatted_address;
                        $("#pac-input").val(results[0].formatted_address);
                        infowindow.open(map, marker);
                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
            SelectedLatLng =(markerCurrent.position.lat(),markerCurrent.position.lng());
        }
        function addMarkerRunTime(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }
        function clearMarkers() {
            setMapOnAll(null);
        }
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        $("#pac-input").val("أبحث هنا ");
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });
        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
            if (places.length == 0) {
                return;
            }
            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];
            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(100, 100),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };
                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));
                $('#latitudef').val(place.geometry.location.lat());
                $('#longitudef').val(place.geometry.location.lng());
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
    function splitLatLng(latLng){
        var newString = latLng.substring(0, latLng.length-1);
        var newString2 = newString.substring(1);
        var trainindIdArray = newString2.split(',');
        var lat = trainindIdArray[0];
        var Lng  = trainindIdArray[1];
        $("#latitudef").val(lat);
        $("#longitudef").val(Lng);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKZAuxH9xTzD2DLY2nKSPKrgRi2_y0ejs&libraries=places&callback=initAutocomplete&language=ar&region=EG
     async defer"></script>
     <script
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEUMlB_gekJKv8yjUXSb2kJkcyQ9ua8Eg&callback=initAutocomplete&v=weekly"
     async
   ></script>


@endsection