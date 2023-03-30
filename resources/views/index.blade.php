@extends('layouts.master')
@section('content')
    <main>
        <div class="wrapper">

            <div class="shop-wrapper">
                <!-- левая панель -->
                <aside class="left-side">
                    @include('includes.left_panel.categories')
                    @include('includes.left_panel.filter')
                </aside>
                <section class="right-side"> <!-- Правая галерея товаров -->
                    <!-- Главный слайдер -->
                   <div class="slider-carousel-wrapper">
                        <div class="slider-carousel">
                            <div class="slider-wrap">
                                <a href="#">
                                    <img class="slider-img" src="images/NICI/slider/slider1.jpg" alt="" />
                                </a>
                            </div>
                            <div class="slider-wrap">
                                <a href="#">
                                    <img class="slider-img" src="images/NICI/slider/slider2.jpg" alt="" />
                                </a>
                            </div>
                            <div class="slider-wrap">
                                <a href="#">
                                    <img class="slider-img" src="images/NICI/slider/slider3.jpg" alt="" />
                                </a>
                            </div>
                            <div class="slider-wrap">
                                <a href="#">
                                    <img class="slider-img" src="images/NICI/slider/slider4.png" alt="" />
                                </a>
                            </div>
                        </div>
                        <button class="slider-button-left"></button>
                        <button class="slider-button-right"></button>
                    </div>

                    <!--Здесь была Сортировка галереи товаров-->

                   <!--  <ul class="shop_gallery"> здесь была Галерея товаров-->
                   @include('includes.product_gallery')

                </section>
            </div>
        </div>
    </main>
@endsection
