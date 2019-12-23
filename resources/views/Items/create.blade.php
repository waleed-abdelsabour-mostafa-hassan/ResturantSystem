@extends('layouts.app')
@section('content')
    <center>
        <h1>Add Fields Items</h1>

        <form method="post" action="storeI" class="navbar-form col-md-6" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label>Item_Title</label>
                <input type="text" placeholder="Add title" class="form-control" name="title" />
            </div>
            <div class="form-group">
                <label>Item_Description</label>
                <input type="text" placeholder="Add description" class="form-control" name="description" />
            </div>
            <div class="form-group">
                <label>Item_Status</label>
                <select  name="status" class="form-control">
                    <option value="1 ">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Item_Image</label>
                <input type="file" placeholder="Add image" class="form-control" name="image" />
            </div>
            <div class="form-group">
                <label>Item_Price</label>
                <input type="number" placeholder="Add price" class="form-control" name="price" />
            </div>
            <div class="form-group">
                <label>User_Name</label>
                <select  name="user_id" class="form-control">
                    <option value=" ">No Data selected</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Menu</label>
                <select  name="menu_id" class="form-control">
                    <option value=" ">No Data selected</option>
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                    @endforeach
                </select>            </div>
            <button type="submit" class="btn btn-success">ADD_Item</button>
        </form>
    </center>
@endsection