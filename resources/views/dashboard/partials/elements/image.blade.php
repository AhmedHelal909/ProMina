    <div class="form-group {{ $detail['cssClass'] }}">
        <label>@lang('site.image')</label>
        <input type="file" name="image" class="form-control image @error('image') parsley-error @enderror">

        @error($colname)
            <ul class="parsley-errors-list filled" id="parsley-id-5">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
    <div class="form-group {{ $detail['cssClass'] }}">
        <img src="{{ isset($row) ? ($row->image != null ? asset('uploads/' . $detail['path'] . '/' . $row->image) : asset('uploads/' . $detail['path'] . '/default.png') ) : asset('uploads/' . $detail['path'] . '/default.png') }}"
            style="width: 115px;height: 80px;position: relative;
                    top: 14px;"
            class="img-thumbnail image-preview">
    </div>

    @push('script')
        <script>
            $(".image").change(function() {

                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.image-preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });
        </script>
    @endpush
