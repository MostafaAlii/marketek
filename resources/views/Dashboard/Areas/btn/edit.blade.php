<!-- Modal -->
<div class="modal fade" id="edit{{$area->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/area.edit_area_details') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <form action="{{ route('Areas.update', 'test') }}" method="post" autocomplete="off">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label>{{ trans('dashboard/area.edit_area_name') }}</label>
                        <input type="hidden" name="id" class="form-control" value="{{ $area->id }}" />
                        <input type="text" name="name" class="form-control" value="{{ $area->name }}" />
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