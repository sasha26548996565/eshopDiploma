@section('custom_js')
    @include('includes.ajax.sort')
@endsection

<div class="sorting-line-divider">
    <div class="sort-wrapper">
        <form action="/sort" method="get" class="sort-form">
            <label for="sort">Сортировать по:</label>
            <select name="sort" id="sort" class="sort-field">
                <option value="title|asc">Названию</option>
                <option value="price|desc">Уменьшению цены</option>
                <option value="price|asc">Увеличению цены</option>
            </select>
        </form>
    </div>
</div>

@include('includes.gallery.products', $products)

{{ $products->withQueryString()->links('includes.pagination') }}
