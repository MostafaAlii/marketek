<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/area.add_new_area') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <form action="{{ route('Areas.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="projectinput2">{{ trans('dashboard/area.related_province') }}</label>
                        <select name="city_id" class="select2 form-control">
                            <optgroup label="{{ trans('dashboard/area.related_province') }}">
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

                    <div class="form-group">
                        <label>{{ trans('dashboard/area.area_name') }}</label>
                        <input type="text" name="name" class="form-control" placeholder="{{ trans('dashboard/area.enter_area_name_placeholder') }}" />
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