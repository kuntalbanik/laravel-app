<div>


    @if (Auth::check())
        <script>
            // Redirects the user immediately to the specified URL
            window.location.href = "{{ url('profile/') }}"; 
        </script>
    @endif


    <h1>User login</h1>

    <form action="login" method="post">
        <!-- <form action="adduser" method="post"> -->
        <!--  -->
        <!-- If need to update date through put method then process it -->
        <!--  -->
        <!-- <input type="hidden" name="_method" value="PUT" id=""> -->


        @csrf
        <div class="input-wrapper">
            <input type="email" name="email" id="" placeholder="Enter email">
        </div>
        <div class="input-wrapper">
            <input type="password" name="password" id="" placeholder="Enter password">
        </div>

        <div class="input-wrapper">
            <button>Add new user</button>
        </div>
    </form>
</div>
<style>
    .input-wrapper {
        margin-top: 10px;
        margin-bottom: 5px;
    }
</style>