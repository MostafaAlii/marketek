<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/supplier.add_new_supplier') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <form action="{{ route('Suppliers.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <!-- Start Supplier Email Field -->
                    <div class="form-field form-group">
                        <label for="email" class="label">{{ trans('dashboard/supplier.enter_supplier_email') }}</label>
                        <input id="email" class="input-text form-control" value="{{ old('email') }}" type="email" name="email">
                        @error("email")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-field form-group col-lg-8"></div>
                    <!-- End Supplier Email Field -->
                    <!-- Start Supplier Password Field -->
                    <div class="form-field form-group">
                        <label for="password" class="label">{{ trans('dashboard/supplier.enter_supplier_password') }}</label>
                        <input id="password" class="form-control" type="password" name="password" autocomplete="off">
                        @error("password")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-field form-group col-lg-8"></div>
                    <!-- End Supplier Email Field -->
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('dashboard/general.save') }}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('dashboard/general.cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>