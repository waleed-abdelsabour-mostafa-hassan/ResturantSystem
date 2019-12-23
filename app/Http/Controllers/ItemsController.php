<?php

namespace App\Http\Controllers;

use App\Menu;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Item;
use Illuminate\Support\Facades\Input;
use Storage;
use DB;
use Image;
class ItemsController extends Controller
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
        $items=DB::table('items')->get();
        // $menus=Menu::all();
        return view('Items.index',compact('items'));
    }
    public function create(Item $item)
    {
        $menus=Menu::all();
        $users=User::all();
        return view('Items.create',compact('menus','users','item'));

    }
    public function search(Request $request)
    {
        $search=$request->get('search');
        $items=DB::table('items')->where('title','like','%'.$search.'%')
            ->orWhere('price','like','%'.$search.'%')
            ->orWhere('description','like','%'.$search.'%')->get();
        return view('Items.resultSearch',compact('items'));
    }
    public function store(Request $request)
    {
        $file = $request->file('image');
        $destinationPath ='images/';
        $file->move($destinationPath,$file->getClientOriginalName());

        $items=new Item();
        $items->title=$request->title;
        $items->description=$request->description;
        $items->status=$request->status;
        $items->image=$file->getClientOriginalName();
        $items->price=$request->price;
        $items->user_id=$request->user_id;
        $items->menu_id=$request->menu_id;


        $items->save();

        return redirect()->route('Items.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=Item::where('id',$id)->first();
        return view('Items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $menus=Menu::all();
        $users=User::all();
        return view('Items.edit',compact('menus','users','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $file = $request->file('image');
        $destinationPath ='images/';
        $file->move($destinationPath,$file->getClientOriginalName());
       // $menus=new Menu();
        $item->title=$request->title;
        $item->menu_id=$request->menu_id;
        $item->description=$request->description;
        $item->status=$request->status;
        $item->image=$file->getClientOriginalName();
        $item->price=$request->price;
        $item->user_id=$request->user_id;
        $item->save();
        return redirect()->route('Items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Item $item)
    {
        $item->delete();
        return redirect()->route('Items.index',compact('item'));
    }
}
