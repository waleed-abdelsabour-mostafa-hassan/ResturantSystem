<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Menu;
use Illuminate\Support\Facades\Input;
use Storage;
use DB;
use Image;
class MenusController extends Controller
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
        $menus=DB::table('menus')->get();
        // $menus=Menu::all();
        return view('Menus.index',compact('menus'));
    }
    public function create(Menu $menu)
    {
        $users=User::all();
        return view('Menus.create',compact('users','menu'));

    }
    public function search(Request $request)
    {
        $search=$request->get('search');
        $menus=DB::table('menus')->where('title','like','%'.$search.'%')
            ->orWhere('type','like','%'.$search.'%')
            ->orWhere('description','like','%'.$search.'%')->get();
        return view('Menus.resultSearch',compact('menus'));
    }
    public function store(Request $request)
    {
        $file = $request->file('image');
        $destinationPath ='images/';
        $file->move($destinationPath,$file->getClientOriginalName());

        $menus=new Menu();
        $menus->title=$request->title;
        $menus->type=$request->type;
        $menus->description=$request->description;
        $menus->status=$request->status;
        $menus->image=$file->getClientOriginalName();

        $menus->user_id=$request->user_id;


        $menus->save();

        return redirect()->route('Menus.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu=Menu::where('id',$id)->first();
        return view('Menus.show',compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $users=User::all();
        return view('Menus.edit',compact('users','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $file = $request->file('image');
        $destinationPath ='images/';
        $file->move($destinationPath,$file->getClientOriginalName());
       // $menus=new Menu();
       $menu->title=$request->title;
       $menu->type=$request->type;
       $menu->description=$request->description;
       $menu->status=$request->status;
       $menu->image=$file->getClientOriginalName();
       $menu->user_id=$request->user_id;
       $menu->save();
        return redirect()->route('Menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('Menus.index',compact('menu'));
    }
}
