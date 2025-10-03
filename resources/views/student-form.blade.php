@include('common.header')

<div>
    <h1>Add new student</h1>

    <form action="addStudent" method="post">
        <!-- <form action="adduser" method="post"> -->
        <!--  -->
        <!-- If need to update date through put method then process it -->
        <!--  -->
        <!-- <input type="hidden" name="_method" value="PUT" id=""> -->


        @csrf
        <div class="input-wrapper">
            <input type="text" name="name" id="" placeholder="Enter name">
        </div>
        <div class="input-wrapper">
            <input type="email" name="email" id="" placeholder="Enter email">
        </div>
        <div class="input-wrapper">
            <input type="text" name="batch" id="" placeholder="Enter your batch year">
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