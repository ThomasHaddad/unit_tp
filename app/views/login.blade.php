<!doctype html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"/>
    </head>
    <body>

        {{ Form::open(array('url' => 'login')) }}

        <h1>Login</h1>

        <!-- if there are login errors, show them here -->
        <p>
            {{ $errors->first('username') }}
            {{ $errors->first('password') }}
        </p>

        <p>
            {{ Form::label('username', 'Username') }}
            {{ Form::text('username', Input::old('username')) }}
        </p>

        <p>
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password') }}
        </p>

        <p>{{ Form::submit('Submit') }}</p>
        {{ Form::close() }}
    </body>
</html>