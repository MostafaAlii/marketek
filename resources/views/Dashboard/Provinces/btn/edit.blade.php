<!-- Modal -->
<div class="modal fade" id="edit{{$province->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/groups.edit_group_details') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <form action="{{ route('Provinces.update', 'test') }}" method="post" autocomplete="off">
                {{ method_field('patch') }}
                {{ csrf_field() }}
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
                        <label>{{ trans('dashboard/groups.enter_group_name') }}</label>
                        <input type="hidden" name="id" class="form-control" value="{{ $province->id }}" />
                        <input type="text" name="name" class="form-control" value="{{ $province->name }}" />
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