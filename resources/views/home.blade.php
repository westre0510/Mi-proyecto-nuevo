{{--@foreach ($posts as $p)
    <p>{{$p}}</p>    
@endforeach--}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer Intento</title>
</head>
<body>
    <h1>Hola Bro - {!!"Siga Participando"!!}</h1>
    <script>alert("Hola");</script>
    <ul>
            {{--$posts esta definido y no es nulo--}}
            @isset($posts2)
                isset
            @endisset
            {{--$posts es nullo--}}
            @empty($posts2)
                empty
            @endempty
        @forelse ($posts as $post)
        <li>
            @if (@$loop->first)
            Primero:
            @elseif (@$loop->last)
            Ultimo:  
            @else
            Medio:    
            @endif
            {{$post}}
        </li>
        @empty <li>Vacio</li>
        @endforelse
    </ul>
</body>
</html>