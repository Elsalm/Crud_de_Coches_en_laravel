<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar coches</title>
    </head>
    <body>
        <h1>Editar</h1>
       <form action="/edit-coche/{{$coche->id}}" method="POST">
           @csrf
           @method('PUT')
           <label for="marca">marca</label><input type="text" name="marca" value="{{$coche->marca}}">
           <label for="modelo">Modelo</label><input type="text" name="modelo" value="{{$coche->modelo}}">
           <label for="color">precio</label><input type="text" name="precio" value="{{$coche->precio}}">
           <label for="color">Color</label><input type="color" name="color" value="{{$coche->color}}">
           <button type="submit">Guardar Cambios</button>
       </form>
    </body>
</html>
