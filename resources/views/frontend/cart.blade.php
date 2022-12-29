@extends('layouts.app')

@section('title')


@section('content')

    <div class=" container-fluid px-5 py-5">

        <div class="pt-5 px-5">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <h1 class="py-4">Shopping Cart</h1>
            <table class="table table-striped table-hover table-bordered py-5">
                <thead class="bg-dark text-white">
                    <tr>

                        <th>Product Name </i></th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Select</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach ($cart as $carts)
                        <tr>
                            <td>{{ $carts->name }}</td>
                            <td>{{ $carts->quantity }}</td>
                            <td>{{ $carts->price }}VND</td>
                            <td>{{ $total = $carts->quantity * $carts->price }}VND</td>
                            <td><a class="btn btn-danger" href="{{ url('delete', $carts->id) }}">Delete</a></td>
                        </tr>
                        @php
                            $totalPrice += $carts->price * $carts->quantity;
                        @endphp
                    @endforeach



                </tbody>
            </table>

            <h4 class="d-flex justify-content-end pt-3">Total Price = {{ $totalPrice }}VND</h4>
            <div class="d-flex justify-content-center ">
                <form action="{{ url('/vnpayment') }}" method="POST">

                    <input type="hidden" name="idbill" value="{{ rand() }}">
                    <input type="hidden" name="price" value="{{ $totalPrice }}">
                    <input type="hidden" name="price" value="{{ $totalPrice }}">
                    <button type="submit" name="redirect" class="btn btn-primary text-white">VNPAYMENT</button>
                    @csrf
                </form>

            </div>
        </div>

    </div>


@endsection
