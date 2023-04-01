<script>
    jQuery(document).ready(function () {
        let
            filterButton = jQuery('.apply-filter'),
            categoryIds = [],
            collectionIds = [];
        filterButton.click(function (event) {
            event.preventDefault();
            jQuery('.category').each(function () {
                if (jQuery(this).is(':checked'))
                {
                    categoryIds.push(jQuery(this).data('id'));
                }
            });
            jQuery('.collection').each(function () {
                if (jQuery(this).is(':checked'))
                {
                    collectionIds.push(jQuery(this).data('id'));
                }
            });
            jQuery.ajax({
                method: "GET",
                url: "{{ route('main.index') }}",
                data: {
                    categoryIds: categoryIds,
                    collectionIds: collectionIds
                },
                success: function (data) {
                    jQuery('#imgBlock').html(data);
                }
            });
        });
    });
</script>
