@extends('layouts.app')
@section('content')

        <span class="glyphicon glyphicon-arrow-left btn btn-danger home"><b><a href="../public/Meals">Back To show Menus</a> </b></span>
        <h1>Edit Fields Meals:{{$meal->title}}</h1>
       <div class="panel-body">
        <div>
        <form method="post" action="{{route('Meals.update',$meal->id)}}" class="navbar-form " enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group col-lg-4">
                <label>Meal_Title</label>
                <input type="text"  class="form-control" name="title" value="{{$meal->title}}" />
            </div><br>
            <div class="form-group col-lg-4">
                <label>Meal_Description</label>
                <input type="text"  class="form-control" name="description" value="{{$meal->description}}" />
            </div><br>
            <div class="form-group col-lg-4">
                <label>Meal_Status</label>
                <select  name="status" class="form-control" value="{{$meal->status}}">
                    <option value="1 ">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div><br>  <div class="form-group col-lg-4">
                <label>Meal_Image</label>
                <img class="img-responsive" src="{{asset("images/".$meal->image)}}" width="130px" height="80px">
                <input type="file"  class="form-control" name="image"  />
            </div><br>
            <div class="form-group col-lg-4">
                <label>Meal_Price</label>
                <input type="number"  class="form-control" name="price" value="{{$meal->price}}" />
            </div><br>
            <div class="form-group col-lg-4">
                <label>User_Name</label>
                <select  name="user_id" class="form-control">
                    <option value=" ">No Data selected</option>
                    @foreach($users as $user)
                        <option @if($user->id==$meal->user_id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div><br>
            <div class="clearfix"></div>
            <div class="form-group col-lg-8">
                @foreach($menus as $menu)
                    @if(count($menu->items)>0)
                        <div class="form-group col-lg-4 ">
                            <h4>{{$menu->title}}</h4>
                            <ul>
                                @foreach($menu->items as $item)
                                    <li><input type="checkbox" name="items[]" value="{{$item->id}}">{{ $item->title}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="clearfix"></div>
            <button type="submit" class="btn btn-success">Update_Meal</button>
        </form></div>
        <div class="col-lg-4">
        <img src="{{asset("images/".$meal->image)}}" class="img-responsive" >
        </div>
       </div>
@endsection