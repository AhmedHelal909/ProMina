<div class="tab-pane " id="vendors">
  {{-- <table class="table table-bordered table-condensed" id="vendorsTable">
      <thead>
      <tr>
          <th>{{__('site.id')}}</th>
          <th>{{__('site.name')}}</th>
       
      </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$row->id}}</td>
          <td>{{$row->name}}</td>
    
        </tr>
      </tbody>
  </table> --}}


  <div class="card">
    <div class="card-body">
        <h4 class="mt-0 header-title mb-4">{{__('site.details')}}</h4>
        <div class="row">
          <div class="col-md-6">
            <h4 class="mt-0 header-title">{{__('site.id')}} : <span class="badge badge-success h6">{{$row->id}}</span></h4>
          </div>
          <div class="col-md-6">
            <h4 class="mt-0 header-title">{{__('site.name')}} : <span class="badge badge-success h6">{{$row->name}}</span></h4>
         
          </div>
        </div>

    </div>
</div>

</div>

