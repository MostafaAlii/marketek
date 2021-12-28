<!-- Modal -->
<div class="modal fade" id="edit{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/supplier.edit_supplier_information') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

            <form action="{{ route('Suppliers.update', 'test') }}" method="post" autocomplete="off">
                {{ method_field('patch') }}
                {{ csrf_field() }}
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
                </div>
            </form>
        </div>
    </div>
</div>
