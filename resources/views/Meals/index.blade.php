@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header col-md-12">Meals   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="btn-group pull-right col-md-8">
                            <a href="{{route('Meals.create')}}" class="btn btn-success" >
                                <i class="fas fa-plus"></i>New Meal
                            </a>
                        </div>
                    <div class="col-md-6 pull-right" style="margin-left:550px;">
                        <form action="{{route('Meals.search')}}" method="post">
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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Created By</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                    <th>Show</th>
                                </tr>
                                </thead>
                            <tbody>
                            @foreach($meals as $meal)
                               <tr>
                                   <td>{{$meal->title}}</td>
                                   <td>{{$meal->description}}</td>
                                   <td>{{$meal->status}}</td>
                                   <td><img class="img-responsive" src="{{asset("images/".$meal->image)}}" width="130px" height="80px"></td>
                                   <td>{{$meal->price}}</td>

                                   {{-- <td>{{$menu->user->name}}</td> --}}
                                   <td><?php
                                       $user=\App\User::find($meal->user_id);
                                       if($user)
                                           echo $user->name;
                                       ?></td>
                                   <td>
                                       <a href="{{route('Meals.delete',$meal->id)}}" class="btn btn-danger" onclick="return confirm('Do You Want To Delete This Record? ')">Delete</a>
                                   </td>
                                  <td> <a href="{{route('Meals.edit',$meal->id)}}" class="btn btn-primary">Edit</a>
                                   </td>
                                   <td> <a href="{{route('Meals.show',$meal->id)}}" class="btn btn-info">Show</a>
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
