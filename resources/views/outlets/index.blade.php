@extends('layouts.layout')

@section('title', __('outlet.list'))

@section('content')
<div class="mb-3">
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
