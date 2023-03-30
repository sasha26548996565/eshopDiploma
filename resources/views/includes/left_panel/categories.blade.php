<div class="category">
    <div class="list-box">
        <div class="title-box open">
            <p>Категории</p>
            <div class="button-plus-minus">
            </div>
        </div>
        <div class="list-link open">
            <nav>
                @foreach ($categories as $category)
                    <li><a href="#">{{ $category->name }} </a></li>
                @endforeach

                <!--<li><a href="#">Мягкие игрушки</a></li>
                <li><a href="#">Брелки</a></li>
                <li><a href="#">Магниты</a></li>
                <li><a href="#">Подушки</a></li> -->
            </nav>
        </div>
    </div>
    <!-- левая панель: Коллекции -->
    <div class="list-box">
        <div class="title-box open">
            <p>Коллекции</p>
            <div class="button-plus-minus">
            </div>
        </div>
        <div class="list-link open">
            <nav>
                @foreach ($collections as $collection)
                    <li><a href="#">{{ $collection->name }} </a></li>
                @endforeach
                <!-- <li><a href="#">Овечки Jolly Mäh</a></li>
                <li><a href="#">Единорог Theodor и его друзья</a></li>
                <li><a href="#">Лесные жители</a></li>
                <li><a href="#">Дикие обитатели</a></li>
                <li><a href="#">Веселая ферма</a></li> -->
            </nav>
        </div>
    </div>
</div>
