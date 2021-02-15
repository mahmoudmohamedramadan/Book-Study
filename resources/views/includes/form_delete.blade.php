<form action="{{ route('users.destroy', $user->id) }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="DELETE">

    <button class="btn btn-danger">{{ $buttonText }}</button>
</form>
