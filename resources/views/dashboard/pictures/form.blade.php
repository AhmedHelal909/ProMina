@php
    $dataColumns = [
        'name' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'album_id' => ['type' => 'select', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => $album],
        'image' => ['type' => 'image', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => '','path' => 'pictures'],


    ];
@endphp

<div class="card-body">
<div class="row">

    @foreach ($dataColumns as $colname => $detail)
        @include('dashboard.partials.elements.' . $detail['type'])
    @endforeach
</div>

</div>



@push('script')
@endpush
