<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Customer;
use Illuminate\Support\Facades\Input;
use Storage;
use DB;
use Image;
class CustomersController extends Controller
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
        $customers=DB::table('customers')->get();
        // $Customers=Menu::all();
        return view('Customers.index',compact('customers'));
    }
    public function create(Customer $customer)
    {
        //$users=User::all();
        return view('Customers.create',compact('customer'));

    }
    public function search(Request $request)
    {
        $search=$request->get('search');
        $customers=DB::table('customers')->where('name','like','%'.$search.'%')
            ->orWhere('address','like','%'.$search.'%')
            ->orWhere('city','like','%'.$search.'%')
            ->orWhere('phone','like','%'.$search.'%')
            ->orWhere('email','like','%'.$search.'%')->get();
        return view('Customers.resultSearch',compact('customers'));
    }
    public function store(Request $request)
    {
        $customers=new Customer();
        $customers->name=$request->name;
        $customers->email=$request->email;
        $customers->password=$request->password;
        $customers->address=$request->address;
        $customers->city=$request->city;
        $customers->phone=$request->phone;
        $customers->save();

        return redirect()->route('Customers.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer=Customer::where('id',$id)->firstOrFail();
        return view('Customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
       // $users=User::all();
        return view('Customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {

        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->password=$request->password;
        $customer->address=$request->address;
        $customer->city=$request->city;
        $customer->phone=$request->phone;
        $customer->save();
        return redirect()->route('Customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('Customers.index',compact('customer'));
    }
}
