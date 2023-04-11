
 @section('style')
 <link href="{{ asset('assets/plugins/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet" />
@endsection



    <div class="{{ $detail['cssClass'] }}">
        <label for="formFileMultiple" class="form-label">@lang('site.File_Uploadify')</label>
        <input class="fancy-file-upload form-control" type="file" name="{{ $colname }}">
            
    </div>



{{-- @section('script')
<script src="{{ asset('assets/plugins/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('assets/plugins/fancy-file-uploader/jquery.fileupload.js') }}"></script>
<script src="{{ asset('assets/plugins/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
<script>
    $('.fancy-file-upload').FancyFileUpload({
        params: {
            action: 'fileuploader'
        },
        maxfilesize: 1000000
    });
</script>
@endsection --}}
