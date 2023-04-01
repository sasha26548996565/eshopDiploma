<script>
    jQuery(document).ready(function () {
        let sort = jQuery('#sort');
        sort.click(function (event) {
            event.preventDefault();
            jQuery.ajax({
                method: "GET",
                url: "{{ route('main.index') }}",
                data: {
                    sort: sort.val(),
                },
                success: function (data) {
                    let positionParameters = location.pathname.indexOf('?'),
                        url = location.pathname.substring(positionParameters, location.pathname.length),
                        newUrl = url + '?';
                    newUrl += 'sort=' + sort.val() + '&page=' + {{ $_GET['page'] ?? 1 }};
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
