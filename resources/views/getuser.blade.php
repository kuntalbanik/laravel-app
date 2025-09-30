<h1>User name : {{ $name }}</h1>

<!-- if elseif else endif-->
@if($name == 'john')
<h2>This is {{$name}}</h2>
@elseif($name == 'jane')
<h2>This is {{$name}}</h2>
@else
<h2>Other user</h2>
@endif


<div>
    @foreach($users as $user)
    <h5>{{ $user }}</h5>
    @endforeach
</div>

<div>
    @for($i=0;$i <= 10;$i++)
        <p>{{ $i }}</p>
    @endfor
</div>
