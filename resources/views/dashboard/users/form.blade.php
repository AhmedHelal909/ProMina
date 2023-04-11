@php
    $dataColumns = [
        'name' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'address' => ['type' => 'text', 'cssClass' => 'col-md-6', 'attr' => '','placeholder' => __('site.address'), 'data' => ''],
        'email' => ['type' => 'email', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'phone' => ['type' => 'number', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'age' => ['type' => 'number', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'salary' => ['type' => 'number', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'ssn' => ['type' => 'number', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'gender' => ['type' => 'select', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => $gender],
        'image' => ['type' => 'image', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => '','path' => 'users'],
        'password' => ['type' => 'password', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'password_confirmation' => ['type' => 'password', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        // 'phone' => ['type' => 'tel', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => ''],
        'roles' => ['type' => 'select_roles', 'cssClass' => 'col-md-6', 'attr' => '', 'data' => $roles, 'colName' => 'name'],
        

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
