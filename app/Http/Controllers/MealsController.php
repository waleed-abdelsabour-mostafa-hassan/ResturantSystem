<?php

namespace App\Http\Controllers;

use App\MealItem;
use App\Menu;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Meal;
use Illuminate\Support\Facades\Input;
use Storage;
use DB;
use Image;
class MealsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals=DB::table('meals')->get();
        $users=User::all();
        return view('Meals.index',compact('users','meals'));
    }
    public function create(Meal $meal)
    {
        $menus=Menu::all();
        $users=User::all();
        return view('Meals.create',compact('menus','users','meal'));

    }
    public function search(Request $request)
    {
        $search=$request->get('search');
        $meals=DB::table('meals')->where('title','like','%'.$search.'%')
            ->orWhere('price','like','%'.$search.'%')
            ->orWhere('description','like','%'.$search.'%')->get();
        return view('Meals.resultSearch',compact('meals'));
    }
    public function store(Request $request)
    {
        $file = $request->file('image');
        $destinationPath ='images/';
        $file->move($destinationPath,$file->getClientOriginalName());

        $meals=new Meal();
        $meals->title=$request->title;
        $meals->description=$request->description;
        $meals->status=$request->status;
        $meals->image=$file->getClientOriginalName();
        $meals->price=$request->price;
        $meals->user_id=$request->user_id;
        $meals->save();
        //$request->all(['discount-11']);
       /* foreach ($request->all(['items']) as $item)
        {
            MealItem::create(['meal_id'=>$meals->id,'item_id'=>$item,$request->all(['discount'][$item])]);
        }
        $mealItems=MealItem::where('meal_id',$meals->id)->get();
        $mealItemsIDs=array();
        foreach ($mealItems as $mealItem)
        {
            $mealItemsIDs[]=$mealItem->item_id;
        }*/
        $menus=Menu::all();

        return redirect()->route('Meals.index',compact('meals','menus'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal=Meal::where('id',$id)->first();
        return view('Meals.show',compact('meal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        $menus=Menu::all();
        $users=User::all();
        return view('Meals.edit',compact('menus','users','meal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        $file = $request->file('image');
        $destinationPath ='images/';
        $file->move($destinationPath,$file->getClientOriginalName());
       // $menus=new Menu();
        $meal->title=$request->title;
        $meal->description=$request->description;
        $meal->status=$request->status;
        $meal->image=$file->getClientOriginalName();
        $meal->price=$request->price;
        $meal->user_id=$request->user_id;
        $meal->save();
        return redirect()->route('Meals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Meal $meal)
    {
        $meal->delete();
        return redirect()->route('Meals.index',compact('meal'));
    }
}
