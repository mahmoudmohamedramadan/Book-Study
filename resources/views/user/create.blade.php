@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    @include('includes.alert')

    <form action="{{ route('users.store') }}" method="POST">

        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </div>

        <div class="row flex justify-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" name="name"
                        value="{{ old('name', 'default text for name input') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row flex justify-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email address</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" name="email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row flex justify-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row flex justify-center">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
