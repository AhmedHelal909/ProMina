<div style="display: inline-block">
    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success ">
        <input type="checkbox" class="custom-control-input  consultations_status" {{ $row->status == 1 ? 'checked' : '' }}
            data-route="{{ route('dashboard.consultations.status', ['id' => $row->id]) }}" value="{{ $row->id }}"
            id="customSwitch{{ $row->id }}" data-status="{{ $row->status }}">
        <label class="custom-control-label" for="customSwitch{{ $row->id }}"></label>
    </div>
</div>