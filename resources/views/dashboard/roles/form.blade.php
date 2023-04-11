@php
    $dataColumns = [
        'name' => ['type' => 'text', 'cssClass' => 'col-md-12', 'attr' => '', 'data' => ''],
        'permissions' => ['type' => 'permissions', 'cssClass' => 'col-md-3', 'attr' => '', 'data' => ''],
    ];
@endphp

<div class="card-body">

        @foreach ($dataColumns as $colname => $detail)
            @include('dashboard.partials.elements.' . $detail['type'])
        @endforeach

</div>



@push('script')
@endpush
