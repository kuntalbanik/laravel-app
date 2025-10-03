<div style="background-color: rgba(255, 187, 255, 1);">
    <h1>Header File</h1>
    <a href="/home/?age=18&country=india">Home</a>
    <a href="/about/john/?age=18&country=india">About</a>
    @if (Auth::check())
        <a href="/profile">Profile</a>
        <a href="/students">Students data</a>
        <a href="/upload">Upload File</a>
        <a href="/logoutprofile">Logout</a>
    @else
        <a href="/register">Register</a>
        <a href="/login">Login</a>
    @endif

    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
</div>