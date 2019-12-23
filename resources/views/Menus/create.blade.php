@extends('layouts.app')
@section('content')
    <center>
        <h1>Add Fields Menus</h1>
       {{-- {!! Form::open() !!}
        {!! Form::text('title',null,array('required','class'=>'form-control','placeholder'=>'Add New Menus Title')) !!}

        {!! Form::close() !!}--}}
        <form method="post" action="storeMenu" class="navbar-form col-md-6" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label>Menu_Title</label>
                <input type="text" placeholder="Add title" class="form-control" name="title" />
            </div>
            <div class="form-group">
                <label>Menu_Type</label>
                <select  name="type" class="form-control">
                    <option value="foods ">Foods</option>
                    <option value="hot_drinks">Hot Drinks</option>
                    <option value="cold_drinks">Cold Drinks</option>
                </select>            </div>
            <div class="form-group">
                <label>Menu_Description</label>
                <input type="text" placeholder="Add description" class="form-control" name="description" />
            </div>
            <div class="form-group">
                <label>Menu_Status</label>
                <select  name="status" class="form-control">
                    <option value="1 ">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Menu_Image</label>
                <input type="file" placeholder="Add image" class="form-control" name="image" />
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
            <button type="submit" class="btn btn-success">ADD_Menu</button>
        </form>
    </center>
@endsection