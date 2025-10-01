<div>

<h3>Logged in</h3>
<p>Profile Page</p>

@if(session('username'))
<h2>Welcome, {{ session('username') }}</h2>
@else
    <p>User not found</p>
    <a href="user-form">Login</a>
@endif

<br><br>
<a href="logout">Logout</a>
</div>
