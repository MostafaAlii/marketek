<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/province.') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <form action="{{ route('Provinces.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="projectinput2"> أختر القسم </label>
                        <select name="country_id" class="select2 form-control">
                            <optgroup label="{{ trans('dashboard/province.please_choose_countr_name') }}">
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

                    <div class="form-group">
                        <label>{{ trans('dashboard/province.add_new_province') }}</label>
                        <input type="text" name="name" class="form-control" placeholder="{{ trans('dashboard/province.enter_province_name_placeholder') }}" />
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