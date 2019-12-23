@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Items</div>
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
                                    <th>Menu</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                    <th>Show</th>
                                </tr>
                                </thead>
                            <tbody>
                            @foreach($items as $item)
                               <tr>
                                   <td>{{$item->title}}</td>
                                    <td>{{$item->description}}</td>
                                   <td>{{$item->status}}</td>
                                   <td><img class="img-responsive" src="{{asset("images/".$item->image)}}" width="130px" height="80px"></td>
                                  <td>{{$item->price}}</td>
                                  {{-- <td>{{$menu->user->name}}</td> --}}
                                   <td><?php
                                       $user=\App\User::find($item->user_id);
                                       if($user)
                                           echo $user->name;
                                       ?></td>
                                        <td><?php
                                         $menu=\App\Menu::find($item->menu_id);
                                           if($menu)
                                            echo $menu->title;
                                           ?></td>
                                   <td>
                                       <a href="{{route('Items.delete',$item->id)}}" class="btn btn-danger" onclick="return confirm('Do You Want To Delete This Record? ')">Delete</a>
                                   </td>
                                  <td> <a href="{{route('Items.edit',$item->id)}}" class="btn btn-primary">Edit</a>
                                   </td>
                                   <td> <a href="{{route('Items.show',$item->id)}}" class="btn btn-info">Show</a>
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
