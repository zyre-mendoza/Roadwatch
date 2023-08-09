@extends('layouts.layout')

@section('title', __('outlet.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Reports Details</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>Report Name/td><td>{{ $outlet->name }}</td></tr>
                        <tr><td>report Address</td><td>{{ $outlet->address }}</td></tr>
                        <tr><td>Details</td><td>{{ $outlet->details }}</td></tr>
                        <tr><td>Photo</td><td><img src="{{ asset($outlet->photo) }}" width= '50' height='50' class="img img-responsive" /></td>
                        <tr><td>Severity</td><td>{{ $outlet->severity }}</td></tr>
                        <tr><td>Urgency</td><td>{{ $outlet->urgency }}</td></tr>

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $outlet)
                    <a href="{{ route('outlets.edit', $outlet) }}" id="edit-outlet-{{ $outlet->id }}" class="btn btn-warning">Edit School</a>
                @endcan
                @if(auth()->check())
                    <a href="{{ route('outlets.index') }}" class="btn btn-link">Back to Reports</a>
                @else
                    <a href="{{ route('outlet_map.index') }}" class="btn btn-link">{{ __('outlet.back_to_index') }}</a>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ trans('outlet.location') }}</div>
            @if ($outlet->coordinate)
            <div class="card-body" id="mapid"></div>
            @else
            <div class="card-body">{{ __('outlet.no_coordinate') }}</div>
            @endif
        </div>
    </div>

</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<!-- map syle (please move it to the css public folder) -->
<style>
    #mapid { height: 400px; }
</style>

@endsection
@push('scripts')

<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<script>
    var map = L.map('mapid').setView([{{ $outlet->latitude }}, {{ $outlet->longitude }}], {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $outlet->latitude }}, {{ $outlet->longitude }}]).addTo(map)
        .bindPopup('{!! $outlet->map_popup_content !!}');
</script>
@endpush
