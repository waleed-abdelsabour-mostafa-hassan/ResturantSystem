@extends('layouts.app')
@section('content')

        <span class="glyphicon glyphicon-arrow-left btn btn-danger home"><b><a href="../public/Menus">Back To show Menus</a> </b></span>
        <h1>Edit Fields Menus:{{$menu->title}}</h1>
       <div class="panel-body">
        <div class="col-lg-8">
        <form method="post" action="{{route('Menus.update',$menu->id)}}" class="navbar-form " enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label>Menu_Title</label>
                <input type="text"  class="form-control" name="title" value="{{$menu->title}}" />
            </div><br>
            <div class="form-group">
                <label>Menu_Type</label>
                <select  name="type" class="form-control" value="{{$menu->type}}">
                    <option value="foods ">Foods</option>
                    <option value="hot_drinks">Hot Drinks</option>
                    <option value="cold_drinks">Cold Drinks</option>
                </select>            </div><br>
            <div class="form-group">
                <label>Menu_Description</label>
                <input type="text"  class="form-control" name="description" value="{{$menu->description}}" />
            </div><br>
            <div class="form-group">
                <label>Menu_Status</label>
                <select  name="status" class="form-control" value="{{$menu->status}}">
                    <option value="1 ">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div><br>  <div class="form-group">
                <label>Menu_Image</label>
                <img class="img-responsive" src="{{asset("images/".$menu->image)}}" width="130px" height="80px">
                <input type="file"  class="form-control" name="image"  />
            </div><br>  <div class="form-group">
                <label>User_Name</label>
                <select  name="user_id" class="form-control">
                    <option value=" ">No Data selected</option>
                    @foreach($users as $user)
                        <option @if($user->id==$menu->user_id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div><br>
            <button type="submit" class="btn btn-success">Update_Menu</button>
        </form></div>
        <div class="col-lg-4">
        <img src="{{asset("images/".$menu->image)}}" class="img-responsive" >
        </div>
       </div>
@endsection