<script>
    jQuery(document).ready(function () {
        let
            filterButton = jQuery('.apply-filter'),
            sort = jQuery('#sort'),
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
                    sort: sort.val(),
                    categoryIds: categoryIds,
                    collectionIds: collectionIds,
                },
                success: function (data) {
                    let
                        positionParameters = location.pathname.indexOf('?'),
                        url = location.pathname.substring(positionParameters, location.pathname.length),
                        newUrl = url + '?';
                    newUrl += 'sort=' + sort.val() + '&page=' + {{ $_GET['page'] ?? 1 }};
                    if (categoryIds.length > 0)
                    {
                        newUrl += '&categoryIds=' + categoryIds;
                    }
                    if (collectionIds.length > 0)
                    {
                        newUrl += '&collectionIds=' + collectionIds;
                    }
                    jQuery(".pagination ul li a").each((_, el) => {
                        el.href = newUrl;
                    });
                    history.pushState({}, '', newUrl);
                    jQuery('#imgBlock').html(data);
                }
            });
        });
    });
</script>
