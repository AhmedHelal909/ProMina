<script>
    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var that = $(this)
        Lobibox.confirm({
            msg: "Are you sure you want to delete this user?",
            callback: function($this, type, ev) {
                if (type == 'yes')
                    that.submit();
            }
        });
    })
</script>
