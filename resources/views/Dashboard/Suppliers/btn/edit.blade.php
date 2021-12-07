<!-- Modal -->
<div class="modal fade" id="edit{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/sections.edit_section_title') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <form action="{{ route('Suppliers.update', 'test') }}" method="post" autocomplete="off">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <!-- Start Supplier Name -->
                    <div class="container">
                        <div class="row justify-content-md-start">
                            <div class="col-8 col-md-6">
                                <div class="form-field form-group">
                                    <label for="first_name" class="label">{{ trans('dashboard/supplier.first_name') }}</label>
                                    <input id="first_name" class="input-text form-control" value="{{ $supplier->first_name }}" type="text" name="first_name">
                                    @error("first_name")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- End Supplier First Name -->
                            <div class="col-8 col-md-6">
                                <div class="form-field form-group">
                                    <label for="last_name" class="label">{{ trans('dashboard/supplier.last_name') }}</label>
                                    <input id="last_name" class="input-text form-control" value="{{ $supplier->last_name }}" type="text" name="last_name">
                                    @error("last_name")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- End Supplier First Name -->
                        </div>
                    </div>
                    <!-- Start Supplier Email Field -->
                    <div class="container">
                        <div class="row justify-content-md-start">
                            <div class="col-8 col-md-6">
                                <div class="form-field form-group">
                                    <label for="email" class="label">{{ trans('dashboard/supplier.enter_supplier_email') }}</label>
                                    <input id="email" class="input-text form-control" value="{{ $supplier->email }}" type="email" name="email">
                                    @error("email")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
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