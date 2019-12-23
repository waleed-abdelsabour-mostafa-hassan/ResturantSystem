@extends('layouts.app')
@section('content')

        <span class="glyphicon glyphicon-arrow-left btn btn-danger home"><b><a href="../public/Items">Back To show Menus</a> </b></span>
        <h1>Edit Fields Items:{{$item->title}}</h1>
       <div class="panel-body">
        <div class="col-lg-8">
        <form method="post" action="{{route('Items.update',$item->id)}}" class="navbar-form " enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label>Item_Title</label>
                <input type="text"  class="form-control" name="title" value="{{$item->title}}" />
            </div><br>
            <div class="form-group">
                <label>Item_Title</label>
                <select  name="menu_id" class="form-control">
                    <option value=" ">No Data selected</option>
                    @foreach($menus as $menu)
                        <option @if($menu->id==$item->menu_id) selected @endif value="{{ $menu->id }}">{{ $menu->title }}</option>
                    @endforeach
                </select>
            </div><br>
            <div class="form-group">
                <label>Item_Description</label>
                <input type="text"  class="form-control" name="description" value="{{$item->description}}" />
            </div><br>
            <div class="form-group">
                <label>Item_Status</label>
                <select  name="status" class="form-control" value="{{$item->status}}">
                    <option value="1 ">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div><br>  <div class="form-group">
                <label>Item_Image</label>
                <img class="img-responsive" src="{{asset("images/".$item->image)}}" width="130px" height="80px">
                <input type="file"  class="form-control" name="image"  />
            </div><br>
            <div class="form-group">
                <label>Item_Price</label>
                <input type="number"  class="form-control" name="price" value="{{$item->price}}" />
            </div><br>
            <div class="form-group">
                <label>User_Name</label>
                <select  name="user_id" class="form-control">
                    <option value=" ">No Data selected</option>
                    @foreach($users as $user)
                        <option @if($user->id==$item->user_id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div><br>
            <button type="submit" class="btn btn-success">Update_Item</button>
        </form></div>
        <div class="col-lg-4">
        <img src="{{asset("images/".$item->image)}}" class="img-responsive" >
        </div>
       </div>
@endsection