<div class="tab-pane " id="orders">
    <table class="table table-bordered table-condensed" id="ordersTable">
        <thead>
        <tr>
            <th>{{__('site.id')}}</th>
            <th>{{__('site.phone')}}</th>
            <th>{{__('site.address')}}</th>
            <th>{{__('site.order_number')}}</th>
            <th>{{__('site.inprogress')}}</th>
            <th>{{__('site.delivered')}}</th>
            <th>{{__('site.execute')}}</th>
            <th>{{__('site.action')}}</th>
        </tr>
        </thead>
    </table>
</div>

@push('script')
    
<script>
    function getOrders() {
        if (!$.fn.dataTable.isDataTable('#ordersTable')) {
            $('#ordersTable').DataTable({
            dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
            ],
            ajax: '{{ route('dashboard.orders.getOrders') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'phone', name: 'phone'},
                {data: 'address', name: 'address', width: '110px'},
                {data: 'order_number', name: 'order_number', width: '110px'},
                {data: 'inprogress', name: 'inprogress', width: '110px'},
                {data: 'delivered', name: 'delivered', width: '110px'},
                {data: 'execute', name: 'execute', width: '110px'},
                {data: 'action', name: 'execute'},
      
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