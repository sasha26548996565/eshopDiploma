<script>
    jQuery(document).ready(function () {
        let sort = jQuery('#sort');

        sort.click(function (event) {
            event.preventDefault();

            jQuery.ajax({
                method: "GET",
                url: "{{ route('main.index') }}",
                data: {
                    sort: sort.val()
                },
                success: function (data) {
                    jQuery('#imgBlock').html(data);
                }
            });
        });
    });
</script>
