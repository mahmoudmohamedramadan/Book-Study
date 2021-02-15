@extends('layouts.app')

@section('title', 'Book Testing')

@section('content')

    <div class="row flex justify-center">
        <div class="col-md-6">
            @if ($normalEcho)
                <h3>{{ $normalEcho }}</h3>
            @endif

            @unless($normalEcho) {{-- unless equals to if(! $normalEcho)
                --}}
                <h3>normalEcho is Null</h3>
            @endunless
            <h3>@{{ directiveEcho }}</h3>
        </div>
    </div>

    <div class="row flex justify-centter">
        <div class="col-md-6">
            <ul>
                @foreach ($lettersArray as $letter)
                    {{-- loop variable is a variable available in loops like(foreach, forelse)
                    --}}
                    <li>index: {{ $loop->index }}</li>
                    <li>iteration: {{ $loop->iteration }}</li>
                    <li>remaining: {{ $loop->remaining }}</li>
                    <li>count: {{ $loop->count }}</li>
                    <li>first: {{ $loop->first }}</li> {{-- when loop in first item will print
                    first: 1 and last: null --}}
                    <li>last: {{ $loop->last }}</li> {{-- when loop in last item will print
                    last: 1 and first: null --}}
                    <li>depth: {{ $loop->depth }}</li>{{-- count of nested loop if you have
                    two nested for will print 2 --}}
                    <li>parent: {{ $loop->parent }}</li>
                    {{-- aprent will point to parent foreach in case you have two nested
                    foreach --}}
                    <li>---------------------</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row flex justify-center">
        <div class="col-md-6">
            <a href="{{ URL::route('posts.index') }}">URL Route</a>
        </div>
    </div>
    <div class="row flex justify-center">
        <div class="col-md-6">
            <a href="{{ URL::signedRoute('posts.index') }}">URL Signed Route</a>
        </div>
    </div>
    <div class="row flex justify-center">
        <div class="col-md-6">
            <a href="{{ URL::temporarySignedRoute('posts.index', now()->addMinutes(2)) }}">
                URL Temporary Signed Route
            </a>
        </div>
    </div>

@stop


@section('parent')  {{-- here without parent directive we will overwrite what inside parent section --}}
    <script>
        console.log('Children');

    </script>
    @parent {{-- parent directive used to show script in parent section --}}
@endsection
