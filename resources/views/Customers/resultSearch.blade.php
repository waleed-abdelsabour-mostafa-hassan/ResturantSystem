@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Customers</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>C_NAme</th>
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
