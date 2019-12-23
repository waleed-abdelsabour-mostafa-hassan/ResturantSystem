@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Menus</div>
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
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Created By</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                    <th>Show</th>
                                </tr>
                                </thead>
                            <tbody>
                            @foreach($menus as $menu)
                               <tr>
                                   <td>{{$menu->title}}</td>
                                   <td>{{$menu->type}}</td>
                                   <td>{{$menu->description}}</td>
                                   <td>{{$menu->status}}</td>
                                   <td><img class="img-responsive" src="{{asset("images/".$menu->image)}}" width="130px" height="80px"></td>
                                  {{-- <td>{{$menu->user->name}}</td> --}}
                                   <td><?php
                                       $user=\App\User::find($menu->user_id);
                                       if($user)
                                           echo $user->name;
                                       ?></td>
                                   <td>
                                       <a href="{{route('Menus.delete',$menu->id)}}" class="btn btn-danger" onclick="return confirm('Do You Want To Delete This Record? ')">Delete</a>
                                   </td>
                                  <td> <a href="{{route('Menus.edit',$menu->id)}}" class="btn btn-primary">Edit</a>
                                   </td>
                                   <td> <a href="{{route('Menus.show',$menu->id)}}" class="btn btn-info">Show</a>
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
