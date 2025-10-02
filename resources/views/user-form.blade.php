<div>
    @if (Auth::check())
        <script>
            // Redirects the user immediately to the specified URL
            window.location.href = "{{ url('profile/') }}"; 
        </script>
    @endif
    <h1>Add new user</h1>

    <form action="adduser" method="post">
    <!-- <form action="adduser" method="post"> -->
        <!--  -->
        <!-- If need to update date through put method then process it -->
        <!--  -->
        <!-- <input type="hidden" name="_method" value="PUT" id=""> -->


        @csrf
        <div class="input-wrapper">
            <input type="text" name="name" id="" placeholder="Enter username">
        </div>
        <div class="input-wrapper">
            <input type="password" name="password" id="" placeholder="Enter password">
        </div>
        <div class="input-wrapper">
            <input type="email" name="email" id="" placeholder="Enter email">
        </div>

        
        
        
        
        <!-- skill[]  Use to get all values as array -->
        <!-- <div>
            <h5>User skill :</h5>
            <input type="checkbox" name="skill[]" value="PHP" id="php">
            <label for="php">PHP</label>
            <input type="checkbox" name="skill[]" value="Node" id="node">
            <label for="node">Node</label>
            <input type="checkbox" name="skill[]" value="Java" id="java">
            <label for="java">Java</label>
        </div>

        <div>
            <h5>Gender :</h5>
            <input type="radio" name="gender" value="Male" id="male">
            <label for="male">Male</label>
            <input type="radio" name="gender" value="Female" id="female">
            <label for="female">Female</label>
            <input type="radio" name="gender" value="Others" id="others">
            <label for="others">Others</label>
        </div>

        <div>
            <h5> City: </h5>
            <select name="city" id="city">
                <option value="Delhi">Delhi</option>
                <option value="Noida">Noida</option>
                <option value="Kolkata">Kolkata</option>
            </select>
        </div>
        
        
        <div>
            
            <h5> Age: </h5>
            <input type="range" name="age" id="age" min="18" max="60">
        </div> -->


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