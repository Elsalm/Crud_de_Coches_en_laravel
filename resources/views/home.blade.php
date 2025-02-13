<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    </head>
    <style>
    div{
        border:solid 1px black;
        margin:1rem auto;
        width:45%;
    }
    table {
        boder:solid 1px black;
    }
    table th{
        font-weight:bold;
    }
    table td, table th {
       padding:1rem;
       border:solid 1px black;
    }
    </style>
    <body>
        <h1>Crud de coches en laravel</h1>
        <div >
       <form action="/create-coche" method="POST">
           @csrf
           <label for="marca">Marca</label>
           <input type="text" name="marca" placeholder="marca">
           <label for="modelo">Modelo</label>
           <input type="text" name="modelo" placeholder="modelo">
           <label for="precio">precio</label>
            <input type="text" name="precio" placeholder="precio">
            <label for="anio">año</label>
            <input type="text" name="anio" placeholder="año">
           <label for="color">Color</label>
           <input type="color" name="color">
           <button type="submit">crear</button>
       </form></div>

        <h2>Buscar coches</h2>
        <div>
            <form action="/" method="GET" >
                <input name="search" type="text" ></input>
                <button type="submit">buscar</button>
            </form>
        </div>
        <div>
            <table>
                <tr>
                    <th>marca</th>
                    <th>modelo</th>
                    <th>color</th>
                </tr>
                @foreach ($coches as $coche)
                <tr>
                    <td>{{$coche->marca}}</td>
                    <td>{{$coche->modelo}}</td>
                    <td style="color:{{$coche->color}}">{{$coche->color}}</td>
                    <td><a href="/edit-coche/{{$coche->id}}"><button>edit</button></a></td>
                    <td>
                    <form action="/delete-coche/{{$coche->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">delete</button>
                    </form>
                    </td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </body>
</html>
