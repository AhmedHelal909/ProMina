<div class="tab-pane " id="offers">
    <table class="table table-bordered table-condensed" id="offersTable">
        <thead>
        <tr>
            <th>Id</th>
            <th>{{__('site.name')}}</th>
            <th>{{__('site.description')}}</th>
            <th>{{__('site.action')}}</th>
        </tr>
        </thead>
    </table>
</div>

@push('script')
    
<script>
    function getOffers() {
        if (!$.fn.dataTable.isDataTable('#offersTable')) {
            $('#offersTable').DataTable({
            dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
            ],
            ajax: '{{ route('dashboard.offers.getOffers') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
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