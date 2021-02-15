@extends('layouts.app')

@section('title', 'Show Users')

    @push('scripts')
        <script>
            console.log('welcome from index view using push directive');

        </script>
    @endpush

    @prepend('scripts')
        {{-- code which written into prepend directive always be in the top of code which written
        into push directive --}}
        <script>
            console.log('welcome from index view using prepend directive');

        </script>
    @endprepend

@section('content')
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($users as $user)
                <tr>
                    <td><a href="{{ route('users.edit', $user->id) }}">{{ $user->id }}</a></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td> --}}
                        {{-- you can pass data to include directive
                        --}}
                        {{-- @include('includes.form_delete',['buttonText' => 'Delete'])
                        --}}
                        {{-- @includeWhen(auth()->user()->email ==
                        'admin@gmail.com','includes.form_delete') --}}
                        {{-- @includeIf(auth()->user()->email ==
                        'admin@gmail.com','includes.form_delete') --}}
                        {{-- @includeUnless(auth()->user()->email ==
                        'admin@gmail.com','includes.form_delete') --}}
                        {{-- includeFirst directive take array of views as first parameter and
                        this directive take first one also you can pass data --}}
                        {{-- @includeFirst(['includes.form_delete','test'],['buttonText' =>
                        'Delete']) --}}
                        {{-- </td>
                </tr>
            @endforeach --}}

            {{-- inject directive allow you to take an instance from second
            parameter(class/interface) in this example you call constructor --}}
            {{-- @inject('user', '\App\Http\Controllers\UserController')
            {{ $user }} --}}

            @each('includes.table_rows', $users,'user','includes.none')

            {{-- each directive used to loop over users varibale in table_rows view as user
            and in case of there is
            no users will call none view --}}
        </tbody>
    </table>
@endsection
