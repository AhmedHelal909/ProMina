     <div class="row">
         <div class="col-md-12">
             <div class="card card-default">
                 <div class="card-header">
                     <h3 class="card-title">{{ $colname }}</h3>
                 </div>
                 <div class="card-body">

                     <div class="input-group">
                         <div class="custom-file">
                             <input type="file" name="{{ $colname }}"
                                 class="custom-file-input @error($colname) parsley-error @enderror"
                                 @if (isset($row)) value="{{ $row->$colname }}" @endif>
                             <label class="custom-file-label" for="exampleInputFile">Choose {{ $colname }}</label>

                             @error($colname)
                                 <ul class="parsley-errors-list filled" id="parsley-id-5">
                                     <li class="parsley-required">{{ $message }}</li>
                                 </ul>
                             @enderror

                         </div>
                         <div class="input-group-append">
                             <span class="input-group-text">Upload</span>
                         </div>
                     </div>

                 </div>

             </div>
         </div>
     </div>
