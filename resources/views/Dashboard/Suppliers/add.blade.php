@extends('Dashboard.layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/Dashboard/plugins/sumoselect/sumoselect-rtl.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/Dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" rel="stylesheet">
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="http://maps.google.com/maps/api/js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
<style>

#mymap {

      border:1px solid red;

      width: 100%;

      height: 500px;

}

</style>
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('dashboard/supplier.add_new_supplier') }}</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
        </div>
        
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
        <!-- row -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('Suppliers.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <!-- Start Supplier Name -->
                                <!-- Start Supplier Avatar Profile -->
                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-1">
                                        <label>{{ trans('dashboard/supplier.avatar_photo') }}</label>
                                    </div>
                                    <div class="col-md-11 mg-t-5 mg-md-t-0">
                                        <input type="file" accept="image/*" name="image" onchange="loadFile(event)" />
                                        <img style="" class="rounded-circle"  width="85px" height="85px" id="output" />
                                    </div>
                                </div>
                                <!-- End Supplier Avatar Profile -->
                                <!-- Start First Row -->
                                <div class="row justify-content-md-start">
                                    <!-- Start Supplier Company Name -->
                                    <div class="col-6 col-md-4">
                                        <div class="form-field form-group">
                                            <label for="company_name" class="label">{{ trans('dashboard/supplier.supplier_company_name') }}</label>
                                            <input id="company_name" class="input-text form-control" value="{{ old('company_name') }}" type="text" name="company_name" placeholder="{{ trans('dashboard/supplier.type_supplier_company_name') }}">
                                            @error("company_name")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Supplier Company Name -->
                                    <div class="col-6 col-md-4">
                                        <div class="form-field form-group">
                                            <label for="first_name" class="label">{{ trans('dashboard/supplier.first_name') }}</label>
                                            <input id="first_name" class="input-text form-control" value="{{ old('first_name') }}" type="text" name="first_name"  placeholder="{{ trans('dashboard/supplier.enter_supplier_first_name') }}">
                                            @error("first_name")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Supplier First Name -->
                                    <!-- Start Supplier Last Name -->
                                    <div class="col-6 col-md-4">
                                        <div class="form-field form-group">
                                            <label for="last_name" class="label">{{ trans('dashboard/supplier.last_name') }}</label>
                                            <input id="last_name" class="input-text form-control" value="{{ old('last_name') }}" type="text" name="last_name" placeholder="{{ trans('dashboard/supplier.enter_supplier_last_name') }}">
                                            @error("last_name")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Supplier Last Name -->
                                </div>
                                <!-- End First Row -->

                                <!-- Start Second Row -->
                                <div class="row justify-content-md-start">
                                    <!-- Start Supplier Company Name -->
                                    <div class="col-6 col-md-4">
                                        <div class="form-field form-group">
                                            <label for="email" class="label">{{ trans('dashboard/supplier.enter_supplier_email') }}</label>
                                            <input id="email" class="input-text form-control" value="{{ old('email') }}" type="email" name="email">
                                            @error("email")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Supplier Company Name -->
                                    <div class="col-6 col-md-4">
                                        <div class="form-field form-group">
                                            <label for="password" class="label">{{ trans('dashboard/supplier.enter_supplier_password') }}</label>
                                            <input id="password" class="form-control" type="password" name="password" autocomplete="off">
                                            @error("password")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Supplier First Name -->
                                    <!-- Start Supplier Last Name -->
                                    <div class="col-6 col-md-4">
                                        <div class="form-field form-group">
                                            <label for="password_confirmation"> تاكيد كلمة المرور   </label>
                                            <input type="password" value="" id="password_confirmation"
                                                class="form-control"
                                                placeholder=" "
                                                name="password_confirmation">
                                                @error("password_confirmation")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Supplier Last Name -->
                                </div>
                                <!-- End Second Row -->

                                <!-- Start Supplier Phone Field -->
                                <div class="row justify-content-md-start">
                                    <div class="col-6 col-md-3">
                                        <div class="form-field form-group">
                                            <label for="tel" class="label">{{ trans('dashboard/supplier.phone_number') }}</label>
                                            <input id="tel" class="form-control" type="tel" name="phone" autocomplete="off">
                                            @error("phone")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="form-field form-group">
                                            <label for="discount" class="label">{{ trans('dashboard/supplier.discount') }}</label>
                                            <input id="discount" class="form-control" type="text" name="discount" autocomplete="off">
                                            @error("discount")
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- End Supplier Phone Field -->

                                <!-- Start Supplier Description -->
                                <div class="row justify-content-md-start">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput2">{{ trans('dashboard/supplier.supplier_description') }}</label>
                                            <textarea name="description" id="description_textarea"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Supplier Description -->
                                <hr>
                                <!-- Start First Row Select Box -->
                                <div class="row justify-content-md-start">
                                    <!-- Start Country Select -->
                                    <div class="col-6 col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput2">{{ trans('dashboard/supplier.select_country') }}</label>
                                            <select name="country_id" class="select2 form-control">
                                                <optgroup label="{{ trans('dashboard/supplier.select_country') }}">
                                                    @if($countries && $countries -> count() > 0)
                                                        @foreach($countries as $country)
                                                            <option value="{{$country->id }}">
                                                                {{$country->name}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </optgroup>
                                            </select>
                                            @error('country_id')
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Country Select -->

                                    <!-- Start Provience Select -->
                                    <div class="col-6 col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput2">{{ trans('dashboard/supplier.select_provience') }}</label>
                                            <select name="provience_id" class="select2 form-control">
                                                <optgroup label="{{ trans('dashboard/city.related_province') }}">
                                                    @if($proviences && $proviences -> count() > 0)
                                                        @foreach($proviences as $provience)
                                                            <option value="{{$provience->id }}">
                                                                {{$provience->name}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </optgroup>
                                            </select>
                                            @error('provience_id')
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Provience Select -->

                                    <!-- Start City Select -->
                                    <div class="col-6 col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput2">{{ trans('dashboard/supplier.select_city') }}</label>
                                            <select name="city_id" class="select2 form-control">
                                                <optgroup label="{{ trans('dashboard/supplier.related_city') }}">
                                                    @if($cities && $cities -> count() > 0)
                                                        @foreach($cities as $city)
                                                            <option value="{{$city->id }}">
                                                                {{$city->name}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </optgroup>
                                            </select>
                                            @error('city_id')
                                            <span class="text-danger"> {{$message}}</span>                                        @enderror
                                        </div>
                                    </div>
                                    <!-- End City Select -->

                                    <!-- Start City Select -->
                                    <div class="col-6 col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput2">{{ trans('dashboard/supplier.select_area') }}</label>
                                            <select name="area_id" class="select2 form-control">
                                                <optgroup label="{{ trans('dashboard/supplier.related_area') }}">
                                                    @if($areas && $areas -> count() > 0)
                                                        @foreach($areas as $area)
                                                            <option value="{{$area->id }}">
                                                                {{$area->name}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </optgroup>
                                            </select>
                                            @error('area_id')
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End City Select -->
                                </div>
                                <!-- End First Row Select Box -->
                                <hr>
                                <!-- Start Supplier Groups Field -->
                                <div class="row justify-content-md-start">
                                    <div class="col-6 col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput2">{{ trans('dashboard/supplier.select_groups') }}</label>
                                            <select name="group_id" class="select2 form-control">
                                                <optgroup label="{{ trans('dashboard/supplier.select_groups') }}">
                                                    @if($groups && $groups -> count() > 0)
                                                        @foreach($groups as $group)
                                                            <option value="{{$group->id }}">
                                                                {{$group->name}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </optgroup>
                                            </select>
                                            @error('group_id')
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- End Supplier Groups Field -->
                                <!-- Start Second Row Select Box -->
                                <div class="row justify-content-md-start">
                                    <!-- Start Category Select -->
                                    <div class="col-6 col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput2">{{ trans('dashboard/supplier.select_category') }}</label>
                                            <select name="category_id" class="select2 form-control">
                                                <optgroup label="{{ trans('dashboard/supplier.select_category') }}">
                                                    @if($categories && $categories -> count() > 0)
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id }}">
                                                                {{$category->name}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </optgroup>
                                            </select>
                                            @error('category_id')
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End Category Select -->

                                    <!-- Start SubCategory Select -->
                                    <div class="col-6 col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput2">{{ trans('dashboard/supplier.select_subCategory') }}</label>
                                            <select name="subCategory_id" class="select2 form-control">
                                                <optgroup label="{{ trans('dashboard/supplier.select_subCategory') }}">
                                                    @if($subCategories && $subCategories -> count() > 0)
                                                        @foreach($subCategories as $subCategory)
                                                            <option value="{{$subCategory->id }}">
                                                                {{$subCategory->name}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </optgroup>
                                            </select>
                                            @error('subCategory_id')
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- End SubCategory Select -->
                                </div>
                                <!-- End Second Row Select Box -->

                                <!-- Start Supplier Currency Field -->
                                <div class="row justify-content-md-start">
                                    <div class="col-6 col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput2">{{ trans('dashboard/supplier.select_currency') }}</label>
                                            <select name="currency_id" class="select2 form-control">
                                                <optgroup label="{{ trans('dashboard/supplier.select_currency') }}">
                                                    @if($currencies && $currencies -> count() > 0)
                                                        @foreach($currencies as $currency)
                                                            <option value="{{$currency->id }}">
                                                                {{$currency->name}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </optgroup>
                                            </select>
                                            @error('currency_id')
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- End Supplier Currency Field -->
                                <hr>
                                <!-- Start Supplier Status -->
                                <div class="row justify-content-md-start">
                                    <div class="col-6 col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput2">{{ trans('dashboard/supplier.supplier_status') }}</label>
                                            <input type="hidden" {{ old('status') == '0' ? "checked " : "" }}  name="status" value="0" class="form-check-input"/>
                                            <input type="checkbox" {{ old('status') == '1' ? "checked " : "" }} name="status" value="1" class="form-check-input"/>
                                            <span class="fw-bold ps-2 fs-6">مفعل/غير مفعل</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Supplier Status -->
                                <!-- Start Supplier Address -->
                                <div class="row justify-content-md-start">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput2">{{ trans('dashboard/supplier.supplier_address') }}</label>
                                            <textarea id="mytextarea" name="address_primary"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Supplier Address -->
                                <!-- Start Supplier Address -->
                                <div class="row justify-content-md-start">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <div id="mymap"></div>
                                            @error("map_address")
                                                <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- End Supplier Address -->
                                <hr>
                                <div class="text-center m-t-15">
                                    <button type="submit" class="btn btn-lg btn-primary waves-effect waves-light">
                                        <i class="fas fa-save">
                                            {{ trans('dashboard/general.save') }}
                                        </i>
                                    </button>
                                </div>
                            <!-- Start Supplier Email Field -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<script type="text/javascript">
    //var locations = <?php print_r(json_encode($cities)) ?>;
    var mymap = new GMaps({

      el: '#mymap',

      lat: 21.170240,

      lng: 72.831061,

      zoom:6

    });

    $.each( locations, function( index, value ){

	    mymap.addMarker({

	      lat: value.lat,

	      lng: value.lng,

	      title: value.city,

	      click: function(e) {

	        alert('This is '+value.city+', gujarat from India.');

	      }

	    });

   });


  </script>
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

<script src="{{URL::asset('assets/Dashboard/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/Dashboard/plugins/select2/js/select2.min.js')}}"></script>
<!-- Form-layouts js -->
<script src="{{URL::asset('assets/Dashboard/js/form-layouts.js')}}"></script>
<script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
     };
</script>

<script>
    $(document).ready(function () {
        $('.SlectBox').select2({
            search: true,allowClear: true,
            searchText: {{ trans('dashboard/supplier.please_select_with_list') }},
            placeholder: {
                id: '-1',
                text: {{ trans('dashboard/supplier.please_select_with_list') }},
            },
        });
    });
</script>
<script>
    tinymce.init({
        selector: '#mytextarea',
        directionality : 'rtl',
        language: 'ar'
    });
    tinymce.init({
    selector: '#description_textarea',
    directionality : 'rtl',
        language: 'ar'
  });
</script>
@endsection