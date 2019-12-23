@extends('layouts.app')
@section('content')
    <center>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add Fields Orders</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('Orders.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Order_Total') }}</label>

                                    <div class="col-md-6">
                                        <input id="total" type="text" class="form-control{{ $errors->has('total') ? ' is-invalid' : '' }}" name="total" value="{{ old('total') }}" required autofocus>

                                        @if ($errors->has('total'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('total') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="statusl" class="col-sm-4 col-form-label text-md-right">{{ __('Order-Status') }}</label>

                                    <div class="col-md-6">
                                        <select id="statusl" class="form-control{{ $errors->has('statusl') ? ' is-invalid' : '' }}" name="statusl" value="{{ old('statusl') }}" required autofocus>
                                            <option value="1 ">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                        @if ($errors->has('statusl'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('statusl') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cashIn" class="col-md-4 col-form-label text-md-right">{{ __('Order_CashIn') }}</label>

                                    <div class="col-md-6">
                                        <input id="cashIn" type="text" class="form-control{{ $errors->has('cashIn') ? ' is-invalid' : '' }}" name="cashIn" required autofocus>

                                        @if ($errors->has('cashIn'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cashIn') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="payment" class="col-sm-4 col-form-label text-md-right">{{ __('Order_Payment') }}</label>

                                    <div class="col-md-6">
                                        <input id="payment" type="text" class="form-control{{ $errors->has('payment') ? ' is-invalid' : '' }}" name="payment" value="{{ old('payment') }}" required autofocus>

                                        @if ($errors->has('payment'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('payment') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="change" class="col-sm-4 col-form-label text-md-right">{{ __('Order_Change') }}</label>

                                    <div class="col-md-6">
                                        <input id="change" type="text" class="form-control{{ $errors->has('change') ? ' is-invalid' : '' }}" name="change" value="{{ old('change') }}" required autofocus>

                                        @if ($errors->has('change'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('change') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="customer_id" class="col-sm-4 col-form-label text-md-right">{{ __('Customer_Name') }}</label>

                                    <div class="col-md-6">
                                        <select  id="customer_id" class="form-control{{ $errors->has('customer_id') ? ' is-invalid' : '' }}" name="customer_id" value="{{ old('customer_id') }}" required autofocus >
                                            <option value=" ">No Data selected</option>
                                            @foreach($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('customer_id'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('customer_id') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add_Order') }}
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection