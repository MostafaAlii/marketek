<!-- Modal -->
<div class="modal fade" id="edit{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- Start Modal Dialog -->
    <div class="modal-dialog modal-lg" role="document">
        <!-- Start Modal Content -->
        <div class="modal-content">
            <!-- Start Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/supplier.edit_supplier_information') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- End Modal Header -->
            <!-- Start Form -->
            <form action="{{ route('Suppliers.update', 'test') }}" method="post" autocomplete="off">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                <!-- Start Modal Body -->
                <div class="modal-body">
                    <!-- Start Company Name -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-field form-group">
                                <label for="company_name" class="label">{{ trans('dashboard/supplier.supplier_company_name') }}</label>
                                <input id="company_name" class="input-text form-control" value="{{ $supplier->company_name }}" type="text" name="company_name" placeholder="{{ trans('dashboard/supplier.type_supplier_company_name') }}">
                                @error("company_name")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- End Company Name -->
                    <!-- Start First Name & Last Name -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-field form-group">
                                <label for="first_name" class="label">{{ trans('dashboard/supplier.first_name') }}</label>
                                <input id="first_name" class="input-text form-control" value="{{ $supplier->first_name }}" type="text" name="first_name">
                                @error("first_name")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-field form-group">
                                <label for="last_name" class="label">{{ trans('dashboard/supplier.last_name') }}</label>
                                <input id="last_name" class="input-text form-control" value="{{ $supplier->last_name }}" type="text" name="last_name">
                                @error("last_name")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- End First Name & Last Name -->
                    <!-- Start Email & Phone Number -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-field form-group">
                                <label for="email" class="label">{{ trans('dashboard/supplier.email') }}</label>
                                <input id="email" class="input-text form-control" value="{{ $supplier->email }}" type="email" name="email">
                                @error("email")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-field form-group">
                                <label for="phone" class="label">{{ trans('dashboard/supplier.phone_number') }}</label>
                                <input id="phone" class="input-text form-control" value="{{ $supplier->phone }}" type="text" name="phone">
                                @error("phone")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- End Email & Phone Number -->
                    <!-- Start Discount Presintage -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount" class="label">{{ trans('dashboard/supplier.discount') }}</label>
                                <input id="discount" class="input-text form-control" value="{{ $supplier->discount }}" type="number" name="discount" autocomplete="off">
                                @error("discount")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- End Discount Presintage -->
                    <!-- Start All Countries and Related -->
                    <div class="row">
                        <!-- Start Countries -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="country">{{ trans('dashboard/supplier.country') }}</label>
                                <select id="country" name="country_id" class="form-control">
                                    <optgroup label="{{ trans('dashboard/supplier.country') }}">
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
                        <!-- End Countries -->

                        <!-- Start Proviences -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="provience">{{ trans('dashboard/supplier.provience') }}</label>
                                <select id="provience" name="provience_id" class="form-control">
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
                        <!-- End Proviences -->

                        <!-- Start City -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="city">{{ trans('dashboard/supplier.city') }}</label>
                                <select id="city" name="city_id" class="form-control">
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
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- End City -->

                        <!-- Start Area -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="area">{{ trans('dashboard/supplier.area') }}</label>
                                <select id="area" name="area_id" class="form-control">
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
                        <!-- End Area -->
                    </div>
                    <!-- End All Countries and Related -->
                    <!-- Start Category && SubCategory -->
                    <div class="row">
                        <!-- Start Main Category -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mainCategory">{{ trans('dashboard/supplier.category') }}</label>
                                <select id="mainCategory" name="category_id" class="form-control">
                                    <optgroup label="{{ trans('dashboard/supplier.category') }}">
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
                        <!-- End Main Category -->
                        <!-- Start Sub Category -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subCategory">{{ trans('dashboard/supplier.subCategory') }}</label>
                                <select id="subCategory" name="subCategory_id" class="form-control">
                                    <optgroup label="{{ trans('dashboard/supplier.subCategory') }}">
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
                        <!-- End Sub Category -->
                    </div>
                    <!-- End Category && SubCategory -->
                    <hr>
                    <!-- Start Status -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="projectinput2">{{ trans('dashboard/supplier.supplier_status') }}</label>
                            <input type="hidden" {{ $supplier->status == '0' ? "checked " : "" }}  name="status" value="0" class="form-check-input"/>
                            <input type="checkbox" {{ $supplier->status == '1' ? "checked " : "" }} name="status" value="1" class="form-check-input"/>
                            <div class="col-md-6">
                                <p class="fw-bold ps-2 fs-6">مفعل/غير مفعل</p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- End Status -->
                    <hr>
                    <!-- Start Description -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description_textarea">{{ trans('dashboard/supplier.supplier_description') }}</label>
                                <textarea name="description" id="description_textarea">{{$supplier->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- End Description -->
                    <!-- Start Address -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="mytextarea">{{ trans('dashboard/supplier.supplier_address') }}</label>
                                <textarea name="address_primary" id="mytextarea">{{$supplier->address_primary}}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- End Address -->
                </div>
                <!-- End modal-body -->

                <!-- Start Modal Footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('dashboard/general.save') }}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('dashboard/general.cancel') }}</button>
                </div>
                <!-- End Modal Footer -->
            </form>
            <!-- End Form -->
        </div>
        <!-- End Modal Content -->
    </div>
    <!-- End Modal Dialog -->
</div>
<!-- End Modal -->
