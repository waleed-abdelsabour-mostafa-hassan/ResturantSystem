


@extends('layouts.app')
@section('content')
    <div class="container" style="margin-left: 14%">
                    <div class="row">
                            <div class="col-md-8 col-sm-4 col-xs-5" style="margin-left: 7%">
                                    <div class="product-thumb" >
                                        <h3 style="color:black;" >The Name : {{$item->title}}</h3>
                                        <img  src="{{asset('images/'.$item->image)}}" alt="FCI" width="500px" height="350px" />
                                        <h4 style="color:black;" >The Price : {{$item->price}}</h4>
                                        <p style="color:black;"><strong><i><u>Description : </u></i></strong>{{$item->description}}</p>
                                    </div>
                            </div>
                    </div>
                </div>
@stop
