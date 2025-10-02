<div>

<h3>Logged in</h3>
<p>Profile Page</p>

<!-- Show Flash message -->
{{ session('message') }}


<!-- Keep Flash session data by using this  within curly braces -->
 <!-- session()->keep(['message']) -->



@if(session('name'))
<h2>Welcome, {{ session('name') }}</h2>
@else
    <p>User only from session not found</p>
    <a href="login">Login</a>
@endif

<br>
<a href="logout">Logout - Session</a>
<br><br>


@if(session('email'))
<h2>Welcome, {{ session('email') }}</h2>
@else
    <p>User from DB not found</p>
    <a href="login">Login</a>
@endif

<br>
<a href="logoutprofile">Logout - User DB</a>

<br><br>

@isset($filepath)
    <img style="width: 400px;" src="{{ url('storage/'.$filepath) }}" alt="Uploaded Image" srcset="">
@endisset

<br>
</div>
