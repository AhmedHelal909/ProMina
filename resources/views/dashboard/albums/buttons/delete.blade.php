{{-- @if (auth()->user()->isAbleTo('read-'.$module_name_plural)) --}}
@if (auth()->user()->hasPermissionTo('update-'.$module_name_plural))
<button id="delete">delete</button>
@endif

@push('script')
<script>
    $(document).ready(function(){

        console.log('hih')
        var x = document.querySelector('button#delete');
        console.log(x);
        
        $('button#delete').on('click',function(){
            // ev.preventDefault();
            console.log('hih')
        });

    })
    
</script>      
@endpush