{{-- <table class="table dataTable no-footer" id="user-table" role="grid" aria-describedby="user-table_info"
    style="width: 100%;">
    <thead>
        <tr role="row">
                <th>{{__('site.id')}}</th>
                <th>{{__('site.name')}}</th>
                <th>{{__('site.email')}}</th>
                <th>{{__('site.phone')}}</th>
                <th>{{__('site.roles')}}</th>
        
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>{{$row->name}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->phone}}</td>
        <td>{{$row->roles[0]->name}}</td>
      </tr>
    </tbody>
</table> --}}
<div class="row">
  <div class="col-xl-9">
      <div class="card">
          <div class="card-body">
              <h4 class="mt-0 header-title mb-4">{{__('site.details')}}</h4>
              <div class="row">
             
                <div class="col-md-4">
                    <h4 class="mt-0 header-title">{{__('site.id')}} : <span class="badge badge-success h6">{{$row->id}}</span></h4>
                   
                </div>
                <div class="col-md-4">
                    <h4 class="mt-0 header-title">{{__('site.name')}} : <span class="badge badge-success h6">{{$row->name}}</span></h4>
                   
                </div>
                <div class="col-md-4">
                    <h4 class="mt-0 header-title">{{__('site.email')}} : <span class="badge badge-success h6">{{$row->email}}</span></h4>
                   
                </div>
                <div class="col-md-4">
                    <h4 class="mt-0 header-title">{{__('site.phone')}} : <span class="badge badge-success h6">{{$row->phone}}</span></h4>
                   
                </div>
                <div class="col-md-4">
                    <h4 class="mt-0 header-title">{{__('site.roles')}} : <span class="badge badge-success h6">{{$row->roles[0]->name ?? null}}</span></h4>
                   
                </div>
            
              </div>

          </div>
      </div>
  </div>
  
  <div class="col-xl-3">
      <div class="card">
          <div class="card-body">
              <h4 class="mt-0 header-title mb-4">{{__('site.image')}}</h4>
              <table class="table table-striped mb-0">
                  <tbody>
                      <tr>
                          <td>
                            <img src="{{$row->image_path}}" width="60" height="60" alt="">
                            {{-- <i class="far fa-file-pdf text-primary h2"></i> --}}
                        </td>
                          <td>
                          <td>
                              <a href="{{$row->image_path}}" target="_blank" class="btn btn-primary btn-sm">
                                  <i class="fas fa-download"></i>
                              </a>
                          </td>
                      </tr>
                  </tbody>
              </table>

          </div>
      </div>
  </div>
</div>
