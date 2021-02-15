@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PATCH">
            </div>
        </div>

        <div class="row flex justify-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputName">User Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ $user->name }}">
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
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}">
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
                    <input type="password" class="form-control" name="password" value="{{ $user->password }}">
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
