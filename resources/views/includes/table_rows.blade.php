<tr>
    <td><a href="{{ route('users.edit', $user->id) }}">{{ $user->id }}</a></td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
        @include('includes.form_delete',['buttonText' => 'Delete'])
    </td>
</tr>
