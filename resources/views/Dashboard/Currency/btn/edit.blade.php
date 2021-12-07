<!-- Modal -->
<div class="modal fade" id="edit{{$currency->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/groups.edit_group_details') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <form action="{{ route('Currencies.update', 'test') }}" method="post" autocomplete="off">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-md-start">
                            <div class="col-8 col-md-6">
                                <div class="form-field form-group">
                                    <label for="name" class="label">{{ trans('dashboard/currency.add_currency_name') }}</label>
                                    <input type="hidden" name="id" class="form-control" value="{{ $currency->id }}" />
                                    <input id="name" class="input-text form-control" value="{{ $currency->name }}" type="text" name="name">
                                    @error("name")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- End Supplier First Name -->
                            <div class="col-8 col-md-6">
                                <div class="form-field form-group">
                                    <label for="currency_symbol" class="label">{{ trans('dashboard/currency.currency_symbol') }}</label>
                                    <input id="currency_symbol" class="input-text form-control" value="{{ $currency->currency_symbol }}" type="text" name="currency_symbol">
                                    @error("currency_symbol")
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- End Supplier First Name -->
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