<div class="filters">
    <div class="list-box">
        <div class="title-box open">
            <p>Фильтр</p>
            <div class="button-plus-minus">
            </div>
        </div>
        <div class="list-link open">
            <div class="left-filter-title">
                <p>Категория или коллекция</p>
            </div>
            <form class="left-form-filter" method="get"  action="">
                @foreach ($categories as $category)
                    <li>
                        <input name="filters[categories][{{ $category->id }}]"
                            value="{{ $category->id }}" @checked(request('filters.categories.' . $category->id))
                                class="category" type="checkbox" id="id_sheep">
                        <label class="" for="id_sheep">{{ $category->name }}</label>
                    </li>
                @endforeach
                @foreach ($collections as $collection)
                    <li>
                        <input name="filters[collections][{{ $collection->id }}]"
                            value="{{ $collection->id }}" @checked(request('filters.collections.' . $collection->id))
                                class="collection" type="checkbox" id="id_sheep">
                        <label class="" for="id_sheep">{{ $collection->name }}</label>
                    </li>
                @endforeach
                <div class="filter-price">
                    <div class="left-filter-title">
                        <p>Цена</p>
                    </div>
                    <div class="price-input">
                        <div class="field">
                            <span>Мин.</span>
                            <input type="number" name="filters[price][from]" class="input-min"
                                value="{{ request('filters.price.from', 0) }}">
                        </div>
                        <div class="separator">-</div>
                        <div class="field">
                            <span>Макс.</span>
                            <input type="number" name="filters[price][to]" class="input-max"
                                value="{{ request('filters.price.to', 100000) }}">
                        </div>
                    </div>
                    <div class="slider">
                        <div class="progress"></div>
                    </div>
                    <div class="range-input">
                        <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
                        <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
                    </div>
                </div>
                <div  class="filter-buttons-container">
                    <button type="submit" class="apply-filter">Применить</button>
                    <a type="button" href="{{ route(request()->route()->getName()) }}" class="reset-filter">Сбросить</a>
                </div>
            </form>
        </div>
    </div>
</div>
