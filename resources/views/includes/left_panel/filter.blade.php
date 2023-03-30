<div class="filters">
    <!-- левая панель: Фильтр -->
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
                <li>
                    <input class="" type="checkbox" id="id_sheep" name="sheep">
                    <label class="" for="id_sheep">Овечки Jolly Mäh</label>
                </li>
                <li>
                    <input class="" type="checkbox" id="id_unicorn" name="unicorn">
                    <label class="" for="id_unicorn">Единорог Theodor и его друзья</label>
                </li>
                <li>
                    <input class="" type="checkbox" id="id_forest" name="forest">
                    <label class="" for="id_forest">Лесные жители</label>
                </li>
                <li>
                    <input class="" type="checkbox" id="id_wild" name="wild">
                    <label class="" for="id_wild">Дикие обитатели</label>
                </li>
                <li>
                    <input class="" type="checkbox" id="id_farm" name="farm">
                    <label class="" for="id_farm">Веселая ферма</label>
                </li>
            <!-- </form> -->
            <!-- левая панель: Фильтр по цене -->
                <div class="filter-price">
                    <div class="left-filter-title">
                        <p>Цена</p>
                    </div>
                    <div class="price-input">
                        <div class="field">
                            <span>Мин.</span>
                            <input type="number" class="input-min" value="2500">
                        </div>
                        <div class="separator">-</div>
                        <div class="field">
                            <span>Макс.</span>
                            <input type="number" class="input-max" value="7500">
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
                    <button type="button" class="reset-filter">Сбросить</button>
                </div>
            </form>
        </div>
    </div>
</div>
