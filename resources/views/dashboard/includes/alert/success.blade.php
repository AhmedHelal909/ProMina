@if (session('success'))
   <script>
       
            Lobibox.notify(
                'success', {
                    title: '{{ session()->get('success') }}',
                    msg: 'Wait...',
                    size: 'mini',
                    delay: 10000,
                    closeOnClick: true,
                    position: "top right"
                }
            );

    </script>
@endif
