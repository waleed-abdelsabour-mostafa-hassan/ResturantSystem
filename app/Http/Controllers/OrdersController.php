<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Customer;
use Illuminate\Support\Facades\Input;
use Storage;
use DB;
use Image;
class OrdersController extends Controller
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
        $orders=DB::table('orders')->get();
        //$Customers=Menu::all();
        return view('Orders.index',compact('orders'));
    }
    public function create(Order $order)
    {
        $customers=Customer::all();
        return view('Orders.create',compact('order','customers'));

    }
    public function search(Request $request)
    {
       // $customers=Customer::all();
        $search=$request->get('search');
        $orders=DB::table('orders')->where('total','like','%'.$search.'%')
            ->orWhere('cashIn','like','%'.$search.'%')
            ->orWhere('payment','like','%'.$search.'%')->get();
        return view('Orders.resultSearch',compact('orders'));
    }
    public function store(Request $request)
    {

        $orders=new Order();
        $orders->total=$request->total;
        $orders->statusl=$request->statusl;
        $orders->cashIn=$request->cashIn;
        $orders->payment=$request->payment;
        $orders->change=$request->change;
        $orders->customer_id=$request->customer_id;
        $orders->save();

        return redirect()->route('Orders.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Order::where('id',$id)->firstOrFail();
        return view('Orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
       $customers=Customer::all();
        return view('Orders.edit',compact('order','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {

        $order->total=$request->total;
        $order->statusl=$request->statusl;
        $order->cashIn=$request->cashIn;
        $order->payment=$request->payment;
        $order->change=$request->change;
        $order->customer_id=$request->customer_id;
        $order->save();
        return redirect()->route('Orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Order $order)
    {
        $order->delete();
        return redirect()->route('Orders.index',compact('order'));
    }
}
