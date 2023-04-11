<div class="tab-pane " id="coupons">
    <table class="table table-bordered table-condensed" id="couponsTable">
        <thead>
        <tr>
            <th>{{__('site.id')}}</th>
            <th>{{__('site.name')}}</th>
            <th>{{__('site.count')}}</th>
            <th>{{__('site.action')}}</th>
        </tr>
        </thead>
    </table>
</div>

@push('script')
    
<script>
    function getCoupons() {
        if (!$.fn.dataTable.isDataTable('#couponsTable')) {
            $('#couponsTable').DataTable({
            dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
            ],
            ajax: '{{ route('dashboard.coupons.getCoupons') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'count', name: 'count'},
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