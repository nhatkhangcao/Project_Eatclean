@extends('layouts.app')

@section('title')

@section('content')
    <div class="py-5 mt-5">
        <div class="container py-5">
            <div class="card">
                <div class="card-body mx-4">
                    <div class="container">
                        <p class="my-5 mx-5" style="font-size: 30px;">Thank for your purchase</p>
                        <div class="row">
                            <ul class="list-unstyled">
                                <li class="text-black">Customer: {{ $username }}</li>
                                <li class="text-muted mt-1"><span class="text-black">CODE:</span>{{ $pay_code_vnpay }}</li>

                            </ul>
                            <hr>
                            <div class="col-xl-10">
                                <p>BANK</p>
                            </div>
                            <div class="col-xl-2">
                                <p class="float-end">{{ $pay_code_bank }}
                                </p>
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-xl-10">
                                <p>Date Time</p>
                            </div>
                            <div class="col-xl-2">
                                <p class="float-end">{{ $pay_time }}
                                </p>
                            </div>
                            <hr>
                        </div>

                        <div class="row text-black">

                            <div class="col-xl-12">
                                <p class="float-end fw-bold">Total: {{ $pay_price }}
                                </p>
                            </div>
                            <hr style="border: 2px solid black;">
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
