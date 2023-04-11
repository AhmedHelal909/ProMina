<div class="tab-pane" id="employees">
    <table class="table table-bordered table-condensed" id="employeesTable">
        <thead>
        <tr>
            <th>{{__('site.id')}}</th>
            <th>{{__('site.name')}}</th>
            <th>{{__('site.email')}}</th>
            <th>{{__('site.action')}}</th>
        </tr>
        </thead>
    </table>
</div>

@push('script')
    
<script>
    function getEmployees() {
        if (!$.fn.dataTable.isDataTable('#employeesTable')) {
            $('#employeesTable').DataTable({
            dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
            ],
            ajax: '{{ route('dashboard.users.getEmployees') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email',},
                {data: 'action', name: 'action',},
                
      
            ],
            order: [[0, 'desc']]
        });
        $('#employees').append(`<?php 
        if(isset($dataTable)){
        echo $dataTable->table(['class' => 'table table-bordered table-condensed']);
        }
        ?>`);
    }
}
 </script>
 @endpush