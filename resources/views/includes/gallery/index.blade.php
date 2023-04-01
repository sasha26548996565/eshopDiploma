<div class="sorting-line-divider">
    <div class="sort-wrapper" x-data="{}">
        <form action="{{ route('main.index') }}" x-ref="sortForm" method="GET" class="sort-form">
            <label for="sort">Сортировать по:</label>
            <select name="sort" id="sort" x-on:change="$refs.sortForm.submit()" class="sort-field">
                <option @selected(request('sort') == 'title') value="title">Названию</option>
                <option @selected(request('sort') == '-price') value="-price">Уменьшению цены</option>
                <option @selected(request('sort') == 'price') value="price">Увеличению цены</option>
            </select>
        </form>
    </div>
</div>

@include('includes.gallery.products', $products)

{{ $products->withQueryString()->links('includes.pagination') }}
