

@extends('layouts.bootstrap-layout')

@section('title', __('outlet.list'))

@section('content')

<br><br><br><br><br>

<div class="card">
    <div  class="card-body" id="mapid"></div>
    <button  style="position: absolute;
  bottom: 10px;
  left: 10px;
  background: white;
  padding: 0.5em;
  border-radius: 8px;
  border: 1px black solid;
  z-index: 1000;" id="myButton">My Location</button>
</div>

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

<style>
    #mapid { min-height: 500px; }
</style>
@endsection
@push('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script>
    var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    
        L.Control.geocoder().addTo(map);
        if (!navigator.geolocation) {
            console.log("Your browser doesn't support geolocation feature!")
        } else {
            setInterval(() => {
                navigator.geolocation.getCurrentPosition(getPosition)
            }, 5000);
        };

        //getting user location and max radius (1km)
        var marker, circle, lat, long, accuracy;

        function getPosition(position) {
            // console.log(position)
            lat = position.coords.latitude
            long = position.coords.longitude
            accuracy = position.coords.accuracy

            if (marker) {
                map.removeLayer(marker)
            }

            if (circle) {
                map.removeLayer(circle)
            }

            marker = L.marker([lat, long])
            circle = L.circle([lat, long], { radius: 1000 })

            var featureGroup = L.featureGroup([marker, circle]).addTo(map)
            console.log("Your coordinate is: Lat: " + lat + " Long: " + long + " Accuracy: " + accuracy)
    
            //get back to user location
            document.getElementById('myButton').addEventListener('click', function() {
                map.fitBounds(featureGroup.getBounds())
        });

            var button = document.getElementById('myButton');
            var mapContainer = map.getContainer();
            mapContainer.appendChild(button);
          }
  

        

    var markers = L.markerClusterGroup();

    axios.get('{{ route('api.outlets.index') }}')
    .then(function (response) {
        var marker = L.geoJSON(response.data, {
            pointToLayer: function(geoJsonPoint, latlng) {
                return L.marker(latlng).bindPopup(function (layer) {
                    return layer.feature.properties.map_popup_content;
                });
            }
        });
        markers.addLayer(marker);
    })
    .catch(function (error) {
        console.log(error);
    });
    map.addLayer(markers);

    //sattelite layer
    
    var satelliteLayer = L.tileLayer('http://mt0.google.com/vt/lyrs=s&hl=en&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    var baseMaps = {
        "Street": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'),
        "Satellite": satelliteLayer
    };
    L.control.layers(baseMaps).addTo(map);


    @can('create', new App\Outlet)
    var theMarker;

    map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);

        if (theMarker != undefined) {
            map.removeLayer(theMarker);
        };

        var popupContent = "Your location : " + latitude + ", " + longitude + ".";
        popupContent += '<br><a href="{{ route('outlets.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Add new outlet here</a>';

        theMarker = L.marker([latitude, longitude]).addTo(map);
        theMarker.bindPopup(popupContent)
        .openPopup();
    });
    @endcan

 


</script>
@endpush


<div class="mt-4 mb-3">
    <div class="float-middle">
        @can('create', new App\Outlet)
            <a href="{{ route('outlets.create') }}" style="background: green; margin-bottom:" class="btn btn-success">Create New Report</a>
        @endcan
    </div>
    <h1 class="text-black page-title">Reports <small>{{ __('app.total') }} : {{ $outlets->total() }} Reports </small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="control-label">Search Report</label>
                        <input placeholder="{{ __('outlet.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" style="background: green;" value="Search Report" class="btn btn-secondary">
                    <a href="{{ route('outlets.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>Report Name</th>
                        <th>{{ __('outlet.address') }}</th>
                        <th>Severity</th>
                        <th>Urgency</th>
                        <th>Photo</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outlets as $key => $outlet)
                    <tr>
                        <td class="text-center">{{ $outlets->firstItem() + $key }}</td>
                        <td>{!! $outlet->name_link !!}</td>
                        <td>{{ $outlet->address }}</td>
                        <td>{{ $outlet->severity }}</td>
                        <td>{{ $outlet->urgency }}</td>
                        <td><img src="{{ asset($outlet->photo) }}" width= '50' height='50' class="img img-responsive" /></td>


                        <td class="text-center">
                            <a href="{{ route('outlets.show', $outlet) }}" id="show-outlet-{{ $outlet->id }}">{{ __('app.show') }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $outlets->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
