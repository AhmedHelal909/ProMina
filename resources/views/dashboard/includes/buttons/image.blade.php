






<!-- Button trigger modal -->
<a  data-toggle="modal" data-target="#id-{{$id}}">
    <img width="50" height="50" src="{{asset('uploads/treatments/'.$image)}}" />
  </a>
  
  <!-- Modal -->
  <div class="modal fade" id="id-{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div style="width: 100%; height: 500px;">
                
                <img  src="{{asset('uploads/treatments/'.$image)}}" style="width: 100%; height: 100%;"/>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
