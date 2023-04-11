<div class="tab-pane " id="profile">
    <table class="table table-bordered table-condensed" id="offersTable">
        <thead>
        <tr>
            <th>Id</th>
            <th>{{__('site.name')}}</th>
            {{-- <th>{{__('site.address')}}</th> --}}
            <th>{{__('site.email')}}</th>
            <th>{{__('site.phone')}}</th>
            <th>{{__('site.action')}}</th>
        </tr>
        </thead>
    </table>
</div>

@push('script')
    
<script>
    function getUsers() {
        if (!$.fn.dataTable.isDataTable('#offersTable')) {
            $('#offersTable').DataTable({
            dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
            ],
            ajax: '{{ route('dashboard.users.getUsers',["id"=>$row->id]) }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                // {data: 'address', name: 'address'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'action', name: 'action'},
      
            ],
            order: [[0, 'desc']]
        });
        $('#offers').append(`<?php 
        if(isset($dataTable)){
        echo $dataTable->table(['class' => 'table table-bordered table-condensed']);
        }
        ?>`);
    }
}
 </script>
 @endpush