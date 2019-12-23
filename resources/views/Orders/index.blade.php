@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header col-md-12">Orders &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="btn-group pull-right col-md-8">
                            <a href="{{route('Orders.create')}}" class="btn btn-success" >
                                <i class="fas fa-plus"></i>New Order
                            </a>
                        </div>
                        <div class="col-md-6 pull-right" style="margin-left:550px;">
                            <form action="{{route('Orders.search')}}" method="post">
                                {{csrf_field()}}
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control">
                                    <span class="input-group-btn">
                               <button type="submit" class="btn btn-primary">Search</button>
                              </span>
                                </div>
                            </form>
                        </div></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Order_TotalPrice</th>
                                <th>Order_Status</th>
                                <th>Order_CashIn</th>
                                <th>Order_Payment</th>
                                <th>Order_Change</th>
                                <th>Customer_Name</th>
                                <th>Delete</th>
                                <th>Edit</th>
                                <th>Show</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->total}}</td>
                                    <td>{{$order->statusl}}</td>
                                    <td>{{$order->cashIn}}</td>
                                    <td>{{$order->payment}}</td>
                                    <td>{{$order->change}}</td>--}}
                                    {{--<td>{{$order->customer->name}}</td>--}}
                                     <td><?php
                                         $customer=\App\Customer::find($order->customer_id);
                                         if($customer)
                                             echo $customer->name;
                                         ?></td>
                                    <td>
                                        <a href="{{route('Orders.delete',$order->id)}}" class="btn btn-danger" onclick="return confirm('Do You Want To Delete This Record? ')">Delete</a>
                                    </td>
                                    <td> <a href="{{route('Orders.edit',$order->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td> <a href="{{route('Orders.show',$order->id)}}" class="btn btn-info">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection