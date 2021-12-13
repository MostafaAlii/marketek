@extends('Dashboard.layouts.master')
@section('css')
<link href="{{URL::asset('assets/Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/Dashboard//plugins/notify/css/notifIt.css')}}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('dashboard/city.show_all_city') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
        </div>
        
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pr-1 mb-3 mb-xl-0">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                {{ trans('dashboard/city.add_new_city') }}
           </button>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
        @include('Dashboard.MessageAlert.message_alert')
            <!-- row opened -->
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card mg-b-20">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">{{ trans('dashboard/city.show_all_city') }}</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            <p class="tx-12 tx-gray-500 mb-2"></p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table key-buttons text-md-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">#</th>
                                            <th class="border-bottom-0">{{ trans('dashboard/city.city_name') }}</th>
                                            <th class="border-bottom-0">{{ trans('dashboard/city.related_province') }}</th>
                                            <th class="border-bottom-0">{{ trans('dashboard/groups.groups_created_by') }}</th>
                                            <th class="border-bottom-0">{{ trans('dashboard/groups.groups_updated_by') }}</th>
                                            <th class="border-bottom-0">{{ trans('dashboard/groups.groups_created_at') }}</th>
                                            <th class="border-bottom-0">{{ trans('dashboard/groups.groups_actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cities as $city)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $city->name }}</td>
                                                <td>{{ $city->provience->name }}</td>
                                                <td>{{ $city->created_by }}</td>
                                                <td>{{ $city->updated_by }}</td>
                                                <td>{{ $city->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-toggle="modal" href="#edit{{$city->id}}">
                                                        <i class="las la-pen"></i>
                                                    </a>
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-toggle="modal" href="#delete{{$city->id}}">
                                                        <i class="las la-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @include('Dashboard.Cities.btn.edit')
                                            @include('Dashboard.Cities.btn.delete')
                                        @endforeach()
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/div-->
            </div>
            <!-- /row -->

        @include('Dashboard.Cities.btn.add')
        
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
<script src="{{URL::asset('assets/Dashboard//plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard//plugins/notify/js/notifIt-custom.js')}}"></script>
<script>
$(document).ready(function() {
    $('.select2').select2({
        theme: "bootstrap4",
        width: 100%,
        maximumSelectionLength: 1,
    });
});
</script>
@endsection