<div class="form-group {{ $detail['cssClass'] }}">
    <label>@lang('site.logo_ar')</label>
    <input type="file" name="logo_ar" class="form-control image @error('image') parsley-error @enderror" id="logo_ar">

    @error($colname)
        <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
    @enderror
</div>
<div class="form-group {{ $detail['cssClass'] }}">
    <img src="{{ isset($row) ? ($row->logo_ar != null ? asset('uploads/logos/' . $row->logo_ar) : asset('uploads/logos/logo-ar.png') ) : asset('uploads/logos/logo-ar.png') }}"
        style="width: 115px;height: 80px;position: relative;
                top: 14px;"
        class="img-thumbnail image-preview">
</div>
<div class="form-group {{ $detail['cssClass'] }}">
    <label>@lang('site.logo_en')</label>
    <input type="file" name="logo_en" class="form-control image @error('image') parsley-error @enderror" id="logo_en">

    @error($colname)
        <ul class="parsley-errors-list filled" id="parsley-id-5">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
    @enderror
</div>
<div class="form-group {{ $detail['cssClass'] }}">
    <img src="{{ isset($row) ? ($row->logo_en != null ? asset('uploads/logos/' . $row->logo_en) : asset('uploads/logos/logo-en.png') ) : asset('uploads/logos/logo-en.png') }}"
        style="width: 115px;height: 80px;position: relative;
                top: 14px;"
        class="img-thumbnail image-preview2">
</div>


@push('script')
    <script>
        $("#logo_ar").change(function() {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
        $("#logo_en").change(function() {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-preview2').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endpush
