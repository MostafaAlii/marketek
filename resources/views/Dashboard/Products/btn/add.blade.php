@extends('Dashboard.layouts.master')
@section('css')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" integrity="sha512-uyGg6dZr3cE1PxtKOCGqKGTiZybe5iSq3LsqOolABqAWlIRLo/HKyrMMD8drX+gls3twJdpYX0gDKEdtf2dpmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{URL::asset('assets/Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('dashboard/product.add_new_product') }}</h4>
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
                        <!-- Start Form -->
                        <form action="{{ route('product_general_information_store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <!-- Start Product Name && Product Slug -->
                            <div class="row justify-content-md-start">
                                <!-- Start Product Name -->
                                <div class="col-6 col-md-6">
                                    <div class="form-field form-group">
                                        <label for="name">{{trans('dashboard/product.product_name')}}</label>
                                        <input type="text" id="name" class="form-control" placeholder="{{trans('dashboard/product.product_name_placeholder')}}" value="{{old('name')}}" name="name">
                                        @error("name")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End Product Name -->
                                <!-- Start Product Slug -->
                                <div class="col-6 col-md-6">
                                    <div class="form-field form-group">
                                        <label for="slug">{{trans('dashboard/product.product_slug_name')}}</label>
                                        <input type="text" id="slug" class="form-control" placeholder="{{trans('dashboard/product.product_slug_name_placeholder')}}" value="{{old('slug')}}" name="slug">
                                        @error("slug")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End Product Slug -->
                            </div>
                            <!-- End Product Name && Product Slug -->
                            <!-- Start Description && Short Description -->
                            <div class="row justify-content-md-start">
                                <div class="col-6 col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput2">{{ trans('dashboard/product.product_description') }}</label>
                                        <textarea name="description" id="description" placeholder="{{ trans('dashboard/product.product_description_placeholder') }}">
                                            {{old('description')}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput2">{{ trans('dashboard/product.product_short_description') }}</label>
                                        <textarea name="short_description" id="short-description" placeholder="{{ trans('dashboard/product.product_short_description_placeholder') }}">
                                            {{old('short_description')}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Description && Short Description -->
                            <hr>
                            <!-- Select Suppliers && Sections -->
                            <div class="row justify-content-md-start">
                                <!-- Start Sections -->
                                <div class="col-6 col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput1">{{trans('dashboard/product.product_category_select')}}</label>
                                        <select name="categories" class="select2 form-control">
                                            <optgroup label="{{trans('dashboard/product.product_category_select')}}">
                                                @if($sections && $sections->count() > 0)
                                                    @foreach($sections as $section)
                                                        <option
                                                            value="{{$section->id }}">{{$section->name}}</option>
                                                    @endforeach
                                                @endif
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <!-- End Sections -->
                                
                            </div>
                            <!-- End Select Suppliers && Sections -->
                            <hr>
                            <!-- Start Status Select -->
                            <div class="row justify-content-md-start">
                                <div class="col-12">
                                    <div class="form-group mt-1">
                                        <input type="checkbox" value="1"
                                                name="is_active"
                                                id="switcheryColor4"
                                                class="switchery" data-color="success"
                                                checked/>
                                        <label for="switcheryColor4" class="card-title ml-1">
                                            {{trans('dashboard/product.product_status')}}
                                        </label>
                                        @error("is_active")
                                        <span class="text-danger">{{$message }}</span>
                                        @enderror
                                    </div>
                                <div>
                            </div>
                            <!-- End Status Select -->
                            <!-- Start Submit Btn -->
                            <hr>
                            <div class="text-center m-t-15">
                                <button type="submit" class="btn btn-primary">{{ trans('dashboard/general.save') }}</button>
                    <button type="button" class="btn btn-secondary">{{ trans('dashboard/general.cancel') }}</button>
                            </div>
                            <!-- End Submit Btn -->
                        </form>
                        <!-- End Form -->
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
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/Dashboard/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/plugins/notify/js/notifIt-custom.js')}}"></script>
<script src="{{URL::asset('assets/Dashboard/js/form-layouts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js" integrity="sha512-lC8vSUSlXWqh7A/F+EUS3l77bdlj+rGMN4NB5XFAHnTR3jQtg4ibZccWpuSSIdPoPUlUxtnGktLyrWcDhG8RvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2({
            search: true,allowClear: true,
            searchText: {{ trans('dashboard/supplier.please_select_with_list') }},
            placeholder: {
                text: {{ trans('dashboard/supplier.please_select_with_list') }},
            },
        });
    });
</script>
<script>
    tinymce.init({
        selector: '#description',
        directionality : 'rtl',
        language: 'ar'
    });
    tinymce.init({
    selector: '#short-description',
    directionality : 'rtl',
        language: 'ar'
  });
</script>
<script type="text/javascript">
    $(function (){
        // Switchery Check Box ::
        var elem = document.querySelector('.js-switch');
        var init = new Switchery(elem,{
            color             : '#64bd63',
            secondaryColor    : '#ccc',
            jackColor         : '#fff',
            jackSecondaryColor: null,
            className         : 'switchery',
            disabled          : false,
            disabledOpacity   : 0.5,
            speed             : '1s',
            size              : 'small',
        });
    });
</script>
@endsection