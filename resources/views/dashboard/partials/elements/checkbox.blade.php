<div class="form-group {{ $detail['cssClass'] }}">
    <input type="checkbox" name="select-all" id="select-all" />
    <label class="form-check-label">Select All</label>
</div>

@foreach ($permissions as $permission)
    <div class="form-group {{ $detail['cssClass'] }}">
        <div class="form-check">
            <input class="form-check-input @error($colname) parsley-error @enderror" type="checkbox"
                name="{{ $colname }}[]" value="{{ $permission->id }}" id="flexCheckDefault"
                {{ isset($row) ? ($row->permissions->contains($permission) ? 'checked' : '') : '' }} />
            <label class="form-check-label" for="Input{{ $colname }}">{{ $permission->name }}</label>
        </div>

        @error($colname)
            <ul class="parsley-errors-list filled" id="parsley-id-5">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror

    </div>
@endforeach

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    // Listen for click on toggle checkbox
    $('#select-all').click(function(event) {
        if (this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    });
</script>
