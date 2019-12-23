


@extends('layouts.app')
@section('content')
    <div class="container" style="margin-left: 14%">
                    <div class="row">
                            <div class="col-md-8 col-sm-4 col-xs-5" style="margin-left: 7%">
                                    <div class="product-thumb" >
                                        <h1 style="color:black;" >The Order TotalPrice : {{$order->total}}</h1>
                                        <h2 style="color:black;">The Order CashIn :{{$order->cashIn}}</h2>
                                        <h3 style="color:black;">The Order Payment : {{$order->payment}}</h3>
                                        <h4 style="color:black;">The Order Change : {{$order->change}}</h4>
                                        <h4 style="color:black;">The Customer Name : <?php
                                            $customer=\App\Customer::find($order->customer_id);
                                            if($customer)
                                                echo $customer->name;
                                            ?></h4>
                                    </div>
                            </div>
                    </div>
                </div>
@stop
