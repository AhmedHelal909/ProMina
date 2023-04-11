@push('after-style')
    {{-- <link href="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" /> --}}
@endpush


    <div class="{{ $detail['cssClass'] }}">
        
        <label for="formFileMultiple" class="form-label">@lang('site.Image_Uploadify')</label>
                <input class="form-control" id="image-uploadify" type="file" name="{{ $colname }}">
                @error($colname)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            
    </div>



@push('after-script')
    {{-- <script src="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#image-uploadify').imageuploadify();
    })
</script> --}}
@endpush
