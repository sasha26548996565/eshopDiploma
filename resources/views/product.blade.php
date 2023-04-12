
    <main>
        <div class="wrapper">
            <div class="shop-wrapper">
                <!-- левая панель -->
                <aside class="left-side-product">
                    <!-- <div class="photo-slider"> -->
                    <!-- Главный слайдер -->
                    <div class="product-carousel">
                        <div class="slider-wrap">
                            @foreach ($previews->toArray()['preview_images'] as $preview)
                                <img class="slider-img" src="{{ Storage::url($preview) }}"
                                    alt="" />
                                {{-- images --}}
                            @endforeach
                        </div>
                    </div>
                    <div class="slider-nav">
                        <div class="slider-wrap">
                            @foreach ($images->toArray()['images'] as $image)
                                <img class="slider-img1" src="{{ Storage::url($image) }}"
                                    alt="" />
                                {{-- images small --}}
                            @endforeach
                        </div>
                    </div>
                    <!-- </div>                     -->
                </aside>
                <section class="right-side-product">
                    <!-- Правая панель -->
                    <!--  <ul class="shop_gallery"> -->
                    <div>
                        Product description
                    </div>
                </section>
            </div>
        </div>
    </main>
