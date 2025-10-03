@include('common.header')


<!-- API call data output from StudentController -->
<!-- <div>
    User Id : $response_data->userId 
    <br>
    Title : $response_data->title
    <br>
    Body : $response_data->body
</div> -->

<div>
    
<br>
<br>

<a href="student-form/">Enter Student Data</a>


<br><br>

<h3>Students database data</h3>
   <table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Batch</th>
        <th>Operation</th>
    </tr>

    @foreach($students as $student)
    <tr>

        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->batch_year }}</td>
        <td><a href="{{ 'students/delete/'. $student->id }}">Delete</a></td>
    </tr>
    @endforeach
   </table>
</div>


<br>

<div>

<h3>Users database data</h3>
   <table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Email Verified</th>
        <th>Token</th>
        <th>Created</th>
        <th>Updated</th>
    </tr>

    @foreach($users as $user)
    <tr>

        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->email_verified_at}}</td>
        <td>{{ $user->remember_token }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
    </tr>
    @endforeach
   </table>

</div>
