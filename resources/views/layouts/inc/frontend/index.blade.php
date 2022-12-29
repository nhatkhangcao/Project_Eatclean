<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
@extends('layouts.app')
@section('content')
    <main class="">

        <div class="slideshow-container ">
            <div class="mySlides">
                <img src="assets/images/slider1.jpg">

            </div>
            <div class="mySlides">
                <img src="assets/images/slider2.jpg">

            </div>
            <div class="mySlides">

                <img src="assets/images/slider3.jpg">

            </div>

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
        </div>
        <br>
        <div style="text-align:center;">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <div class="guide">
            <h1 class="guide__text">
                How to order?
            </h1>
            <div class="guide__container">
                <article class="guide__container--card">
                    <figure>
                        <img src="assets/images/menu.png">
                    </figure>

                    <p class="card-excerpt">Choose your meals</p>

                </article>

                <article class="guide__container--card">
                    <figure>
                        <img src="assets/images/cooking.png">
                    </figure>
                    <p class="card-excerpt">We cook</p>

                </article>

                <article class="guide__container--card">
                    <figure>
                        <img src="assets/images/delivery.png">
                    </figure>
                    <p class="card-excerpt">Delivery</p>

                </article>
            </div>

        </div>

        <div>
            <div class="container">
                <div class="row">
                    @foreach ($menu_products as $product)
                    @endforeach
                    <div class="card">
                        <img src="{{ asset('assets/uploads/products/' . $product->image) }}" alt="Product Image">
                        <div class="card-body">
                            <h5>Demo</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="product">
            <h1 class="product__text">
                MENU
            </h1>
            <h3 class="product__note">
                All of our products are fresh...
            </h3>
            <div class="product-container">
                <div class="product__card">
                    <figure>
                        <img src="images/yogurt.jpg">
                    </figure>

                    <div class="product__card--info">
                        <h5>Yogurt</h2>

                    </div>
                </div>

                <div class="product__card">
                    <figure>
                        <img src="images/chicken1.jpg">
                    </figure>

                    <div class="product__card--info">
                        <h5>Roasted Chicken</h2>
                    </div>



                </div>

                <div class="product__card">
                    <figure>
                        <img src="images/fruit.jpg">
                    </figure>
                    <div class="product__card--info">
                        <h5>Fruit</h2>

                    </div>



                </div>
                <div class="product__card">
                    <figure>
                        <img src="images/salad.jpg">
                    </figure>
                    <div class="product__card--info">
                        <h5>Salad</h2>

                    </div>

                </div>

                <div class="product__card">
                    <figure>
                        <img src="images/chiabread.jpg">
                    </figure>
                    <div class="product__card--info">
                        <h5>Chia Bread</h2>

                    </div>

                </div>

                <div class="product__card">
                    <figure></figure>
                    <img src="images/eggrice.jpg">
                    </figure>
                    <div class="product__card--info">
                        <h5>Egg Rice</h2>

                    </div>


                </div>

                <div class="product__card">
                    <figure>
                        <img src="images/beef.jpg">
                    </figure>
                    <div class="product__card--info">
                        <h5>Beef Steak</h2>

                    </div>



                </div>

                <div class="product__card">
                    <figure>
                        <img src="images/eggbread.jpg">
                    </figure>
                    <div class="product__card--info">
                        <h5>Egg Bread</h2>

                    </div>



                </div> --}}


        </div>

        </div>
        <h1>Latest News</h1>
        <div class="latest-news">

            <div class="latest-news__card">

                <div class="latest-news__card-img">
                    <img src="assets/images/breakfast.jpg">
                </div>
                <div class="latest-news__card-text">
                    <span class="date">1 hours ago</span>
                    <h2>Why breakfast is so important?</h2>
                    <p>When you wake up from your overnight sleep, you may not have eaten for up to 10 hours. Breakfast
                        replenishes the stores of energy and nutrients in your body.</p>
                </div>

            </div>

            <div class="latest-news__card">
                <div class="latest-news__card-img">
                    <img src="assets/images/vegetabes.jpg">
                </div>
                <div class="latest-news__card-text">
                    <span class="date">4 days ago</span>
                    <h2>What is the eat clean diet?</h2>
                    <p>The basic principles of eat clean will encourage you to consume more whole foods such as: fruits,
                        vegetables, lean protein, whole grains and healthy fats and at the same time.</p>
                </div>

            </div>

            <div class="latest-news__card">
                <div class="latest-news__card-img">
                    <img src="assets/images/milk.jpg">
                </div>
                <div class="latest-news__card-text">
                    <span class="date">Apr 21, 2022</span>
                    <h2>How Do The Top Milks Stack Up?</h2>
                    <p>We took a closer look at the non-dairy shelves to see how they stack up nutritionally and in uses
                        in the kitchen so you can make an informed decision before your next
                        milk run.</p>
                </div>

            </div>

        </div>

    </main>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

</html>
