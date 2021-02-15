@extends('layouts.app')

@section('title', 'Create Comment')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label>User Name</label>
                    <select class="custom-select" name="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Post Body</label>
                    <textarea name="body" style="height: 100px;min-height: 100px;max-height: 150px"
                        class="form-control"></textarea>
                    @error('body')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
