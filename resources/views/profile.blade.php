<div>

<h3>Logged in</h3>
<p>Profile Page</p>

<!-- Show Flash message -->
{{ session('message') }}


<!-- Keep Flash session data by using this  within curly braces -->
 <!-- session()->keep(['message']) -->



@if(session('username'))
<h2>Welcome, {{ session('username') }}</h2>
@else
    <p>User not found</p>
    <a href="user-form">Login</a>
@endif

<br><br>



@if($filepath)
<img style="width: 400px;" src="{{ url('storage/'.$filepath) }}" alt="Uploaded Image" srcset="">


@endif

<br><br><br>
<a href="logout">Logout</a>
</div>
