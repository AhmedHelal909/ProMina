@if (session('error'))
   <script>
        $(document).ready(function() {
            Lobibox.notify(
                'error', {
                    title: '{{ session()->get('error') }}',
                    msg: 'Wait...',
                    size: 'mini',
                    delay: 5000,
                    closeOnClick: true,
                    position: "top right"
                }
            );

        });
    </script>
@endif
