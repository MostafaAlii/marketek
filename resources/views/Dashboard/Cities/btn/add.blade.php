<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/city.add_new_city') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <form action="{{ route('Cities.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="projectinput2">{{ trans('dashboard/city.related_province') }}</label>
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

                    <div class="form-group">
                        <label>{{ trans('dashboard/city.city_name') }}</label>
                        <input type="text" name="name" class="form-control" placeholder="{{ trans('dashboard/city.enter_city_name_placeholder') }}" />
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