<!-- LOGOUT BUTTON -->
<!doctype html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"/>
    </head>
    <body>
        <h1>Apéros techniques</h1>
        <nav>
            <ul>
                <li><a href="{{ URL::to('/') }}">Accueil</a></li>
                <li><a href="{{ URL::to('search') }}">Chercher Apéro</a></li>
                <li><a href="{{URL::to('create')}}">Organiser Apéro</a></li>
                @if(!Auth::check())
                    <li><a href="{{URL::to('login')}}">Se connecter</a></li>
                @else
                    <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                @endif
            </ul>
        </nav>
    <section>
        @if(count($aperos)!=0)
            @foreach($aperos as $apero)
                <h2>{{$apero->title}}</h2>
            @endforeach
        @else
            <h2>DSL pas d'apéros</h2>
        @endif
    </section>
    </body>
</html>