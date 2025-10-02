@include('common.header')

<div>

    

    <!-- Show Flash message -->
    {{ session('message') }}


    <!-- Keep Flash session data by using this  within curly braces -->
    <!-- session()->keep(['message']) -->


    <h3>Session Part practice</h3>
    <br>
    @if(session('name'))
    <h2>Welcome, {{ session('name') }}</h2>
    @else
    <p>User only from session not found</p>
    <a href="login">Login</a>
    @endif

    <br>
    <a href="logout">Logout - Session</a>
    <br>
    <br>



    <!-- DB Login part -->
    <hr>

    @if (Auth::check())
        <h3>Logged in</h3>
        <p>Profile Page</p>
    @endif



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