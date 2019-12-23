
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header col-md-12">Customers &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="btn-group pull-right col-md-8">
                            <a href="{{route('Customers.create')}}" class="btn btn-success" >
                                <i class="fas fa-plus"></i>New Customer
                            </a>
                        </div>
                        <div class="col-md-6 pull-right" style="margin-left:550px;">
                            <form action="{{route('Customers.search')}}" method="post">
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
                                <th>C_Name</th>
                                <th>Email_Address</th>
                                <th>Password</th>
                                <th>C_Address</th>
                                <th>C_City</th>
                                <th>C_Phone</th>
                                <th>Delete</th>
                                <th>Edit</th>
                                <th>Show</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->password}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>{{$customer->city}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>
                                        <a href="{{route('Customers.delete',$customer->id)}}" class="btn btn-danger" onclick="return confirm('Do You Want To Delete This Record? ')">Delete</a>
                                    </td>
                                    <td> <a href="{{route('Customers.edit',$customer->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td> <a href="{{route('Customers.show',$customer->id)}}" class="btn btn-info">Show</a>
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
