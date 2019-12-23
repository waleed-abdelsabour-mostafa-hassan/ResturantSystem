@extends('layouts.app')
@section('content')
    <center>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add Fields Customers</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('Customers.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('C_Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-4 col-form-label text-md-right">{{ __('C_Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-sm-4 col-form-label text-md-right">{{ __('C_City') }}</label>

                                    <div class="col-md-6">
                                        <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autofocus>

                                        @if ($errors->has('city'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('city') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-4 col-form-label text-md-right">{{ __('C_Phone') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add_Customer') }}
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