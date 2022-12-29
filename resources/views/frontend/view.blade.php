@extends('layouts.app')

@section('title', $products->name)

@section('content')

    <div class="py-5">
        <section class="py-5">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="container px-4 px-lg-5 my-5 py-5">

                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <img class="card-img-top mb-5 mb-md-0 h-50 w-60" src="{{ asset($products->productImages[0]->image) }}"
                            alt="Product Image">

                    </div>

                    <div class="col-md-6 mt-5">
                        <div class="d-flex justify-content-between">

                            <h2 class="text-success"> {{ $products->name }}</h2>
                            <div class="fs-5 mb-5">

                                <h2>{{ $products->original_price }} VND</h2>
                            </div>
                        </div>

                        <p class="lead text-center">{{ $products->description }}</p>
                        <div class="row mt-2 ">
                            <form action="{{ url('addcart', $products->id) }}" method="POST">
                                @csrf
                                <div class="col-md-3">

                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group text-center mb-3" style="width:130px;">

                                        <input type="number" value="1" min="1" name="quantity"
                                            class="form-control text-center">

                                    </div>
                                </div>
                                <button class="btn btn-outline-dark px-3 flex-shrink-0 btn-lg" type="submit">
                                    Add to cart
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
