@include('common.header')
<div>
    User Id : {{ $response_data->userId }}
    <br>
    Title : {{ $response_data->title }}
    <br>
    Body : {{ $response_data->body }}
</div>

<div>
    
<br>
<br>
   <table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Batch</th>
    </tr>

    @foreach($students as $student)
    <tr>

        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->batch_year }}</td>
    </tr>
    @endforeach

    <!-- {{
        print_r($response_data)

    }} -->
    <br>
    


</div>
<div>
User data :
<br><br>
{{ $result }}
   <br><br>
</div>
