<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/currency.add_new_currency') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <form action="{{ route('Currencies.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-md-start">
                            <div class="col-8 col-md-6">
                                <div class="form-field form-group">
                                    <label for="name" class="label">{{ trans('dashboard/currency.add_currency_name') }}</label>
                                    <input id="name" class="input-text form-control" value="{{ old('name') }}" type="text" name="name" placeholder="{{ trans('dashboard/currency.add_currency_name_placeholder') }}">
                                    @error("name")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- End Supplier First Name -->
                            <div class="col-8 col-md-6">
                                <div class="form-field form-group">
                                    <label for="currency_symbol" class="label">{{ trans('dashboard/currency.currency_symbol') }}</label>
                                    <input id="currency_symbol" class="input-text form-control" value="{{ old('currency_symbol') }}" type="text" name="currency_symbol" placeholder="{{ trans('dashboard/currency.add_currency_symbol_placeholder') }}">
                                    @error("currency_symbol")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- End Supplier First Name -->
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('dashboard/general.save') }}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('dashboard/general.cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>