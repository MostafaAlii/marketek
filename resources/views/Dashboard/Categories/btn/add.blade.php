<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/sections.add_new_section') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <form action="{{ route('Categories.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <!-- Start Category Name Field -->
                    <div class="form-field form-group">
                        <label for="name" class="label">{{ trans('dashboard/sections.enter_section_name') }}</label>
                        <input id="name" class="input-text form-control" value="{{ old('name') }}" type="text" name="name">
                        @error("name")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-field form-group col-lg-8"></div>
                    <!-- End Category Name Field -->

                    {{--<div class="form-group">
                        <label>{{ trans('dashboard/sections.select_type') }}</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                    </div>--}}
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('dashboard/general.save') }}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('dashboard/general.cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>