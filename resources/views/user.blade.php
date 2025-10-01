<h3>User Data</h3>

<table border="1">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>email_verified_at</th>
        <th>password</th>
        <th>remember_token</th>
        <th>created_at</th>
        <th>updated_at</th>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->email_verified_at }}</td>
        <td>{{ $user->password }}</td>
        <td>{{ $user->remember_token }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
    </tr>
    @endforeach
</table>