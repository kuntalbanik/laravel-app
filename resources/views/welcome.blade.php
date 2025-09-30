
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <style>
            .success {
                background-color: #96ffd3ff;
                color: #095736ff;
                padding: 10px;
                /* margin: 20px; */
            }
            .error {
                /* margin: 20px; */
                background-color: #ffa0a0ff;
                color: #a32121ff;
                padding: 10px;
                
            }
        </style>

    </head>

    <body >
        @include('common.header')
        <h1>Hello Laravel</h1>
        <a href="/home">Home</a>
        <a href="/about/john">About</a>
        
        <!-- Pass data to sub views -->
        <!-- includeIf check page exists or not? -->
        @includeIf('common.inner', ['page'=>"This data come from Welcome Blade"])



        <!-- Call component  -->
        <x-message-banner msg="User login successfully" cssClass="success"/>
        <x-message-banner msg="User login Failed" cssClass="error"/>
    </body>
    
</html>
