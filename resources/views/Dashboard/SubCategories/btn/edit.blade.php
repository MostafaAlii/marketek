<!-- Modal -->
<div class="modal fade" id="edit{{$subCategory->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/sections.edit_section_title') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
            <form action="{{ route('SubCategories.update', 'test') }}" method="post" autocomplete="off">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" name="id" class="form-control" value="{{ $subCategory->id }}" />
                    <!-- Start Parent Category Select -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="projectinput2"> أختر القسم </label>
                                <select name="parent_id" class="select2 form-control">
                                    <optgroup label="من فضلك أختر القسم ">
                                        @if($categories && $categories -> count() > 0)
                                            @foreach($categories as $mainCategory)
                                                <option
                                                    value="{{$mainCategory->id }}" @if($mainCategory->id == $mainCategory ->parent_id)  selected @endif>
                                                    {{$mainCategory->name}}
                                                </option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                @error('parent_id')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- End Parent Category Select -->
                    <!-- Start Category Name Field -->
                    <div class="form-field form-group">
                        <label for="name" class="label">{{ trans('dashboard/sections.edit_section_name') }}</label>
                        <input id="name" class="input-text form-control" value="{{ $subCategory->name }}" type="text" name="name">
                        @error("name")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-field form-group col-lg-8"></div>
                    <!-- End Category Name Field -->
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('dashboard/general.save') }}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('dashboard/general.cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>