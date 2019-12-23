


@extends('layouts.app')
@section('content')
    <div class="container" style="margin-left: 14%">
                    <div class="row">
                            <div class="col-md-8 col-sm-4 col-xs-5" style="margin-left: 7%">
                                    <div class="product-thumb" >
                                        <h1 style="color:black;" >The Customer Name : {{$customer->name}}</h1>
                                        <h2 style="color:black;">The Email_Address :{{$customer->email}}</h2>
                                        <h3 style="color:black;">The Customer Address : {{$customer->address}}</h3>
                                        <h4 style="color:black;">The Customer City : {{$customer->city}}</h4>
                                        <h4 style="color:black;">The Customer Phone : {{$customer->phone}}</h4>
                                    </div>
                            </div>
                    </div>
                </div>
@stop
