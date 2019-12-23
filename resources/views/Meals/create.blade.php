@extends('layouts.app')
@section('content')
    <center>
        <h1>Add Fields MEals</h1>

        <form method="post" action="storeMeal" class="navbar-form col-lg-8" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label>Meal_Title</label>
                <input type="text" placeholder="Add title" class="form-control" name="title" />
            </div>
            <div class="form-group">
                <label>Meal_Description</label>
                <input type="text" placeholder="Add description" class="form-control" name="description" />
            </div>
            <div class="form-group">
                <label>Meal_Status</label>
                <select  name="status" class="form-control">
                    <option value="1 ">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Meal_Image</label>
                <input type="file" placeholder="Add image" class="form-control" name="image" />
            </div>
            <div class="form-group">
                <label>Meal_Price</label>
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
            <div class="form-group col-lg-8">
                @foreach($menus as $menu)
                    @if(count($menu->items)>0)
                        <div class="form-group col-lg-4 ">
                        <h4>{{$menu->title}}</h4>
                         <ul>
                             @foreach($menu->items as $item)
                             <li>
                                 <input type="checkbox" name="items[]" value="{{$item->id}}">
                                 <input type="number" name="discount[{{$item->id}}]" style="width:30px; height: 20px;">
                                 {{ $item->title}}</li>
                             @endforeach
                         </ul>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="clearfix"></div>
            <button type="submit" class="btn btn-success pull-right">ADD_Meal</button>
        </form>
    </center>
@endsection