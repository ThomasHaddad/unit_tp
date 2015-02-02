<!doctype html>
<html>
<head>
    <title>Create an apero</title>
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"/>
</head>
<body>

{{Form::open(['url'=>'postCreate', 'files'=>true, 'method'=>'POST'])}}
<h1>Créer un apéro</h1>
<p>
    {{ $errors->first('title') }}
    {{ $errors->first('content') }}
    {{ $errors->first('thumbnail') }}
</p>
<p>
    {{ Form::label('title', 'title') }}
    {{ Form::text('title', Input::old('title')) }}
</p>
<p>
    {{ Form::label('content', 'content') }}
    {{ Form::textarea('content', Input::old('content')) }}
</p>
<p>
    {{Form::label('date', 'Date')}}
    {{Form::input('date', 'date') }}
</p>
<p>
    {{Form::label('thumbnail', 'thumbnail')}}
    {{Form::file('file', array('multiple'=>false))}}
</p>
<p>
    {{Form::label('tag', 'tag')}}
    {{Form::select('tag',$tags, Input::old('tag'))}}
</p>

<p>{{ Form::submit('Submit') }}</p>
{{ Form::close() }}
</body>
</html>
