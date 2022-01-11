<!-- Modal -->
<div class="modal fade" id="edit{{$countryCode->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/countryCode.edit_countryCode_details') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form action="{{ route('CountryCode.update', 'test') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label>{{ trans('dashboard/countryCode.enter_country_code') }}</label>
                        <input type="hidden" name="id" class="form-control" value="{{ $countryCode->id }}" />
                        <input type="text" name="country_code" class="form-control" value="{{ $countryCode->country_code }}" />
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" onchange="loadFile(event)" id="customFileLang">
                        <label class="custom-file-label" for="customFileLang">{{ trans('dashboard/countryCode.country_image_uplode') }} </label>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <img src="{{ $countryCode->image_path }} "id="output"  style="width: 65px; height:65px;" class="rounded-circle image-preview mx-auto d-block" alt="">
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