<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ejercicio Técnico</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    </head>
    <body >
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4 offset-md-8 ">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar producto</button>
                    </div>
                </div>
            </div>
            <form action="/buscaPorNombre" method="POST" id="name">
                @csrf
                <div class="row">
                    <div class="col-md-7">
                        <label for="searchByName" class="form-label">Buscar por nombre</label>
                        <input type="text" class="form-control" id="searchByName" name="searchByName">
                    </div>
                    <div class="col-md-4 offset-md-1">
                        <label class="form-label"></label>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Filtrar por nombre</button>
                        </div>
                    </div>
                </div> 
            </form>
            <form action="/buscaPorPrecio" method="POST" id="price">
                @csrf
            <div class="row">
                    <div class="col-md-3">
                        <label for="precioMin" class="form-label">Precio Minimo</label>
                        <input type="number" class="form-control" id="precioMin" name="precioMin">
                    </div>
                    <div class="col-md-3 offset-md-1">
                        <label for="precioMax" class="form-label">Precio Maximo</label>
                        <input type="number" class="form-control" id="precioMax" name="precioMax">
                    </div>
                    <div class="col-md-4 offset-md-1">
                        <label class="form-label"></label>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Filtrar por precio</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="container">
            <table class="table  table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($productos->count() > 0)
                        @foreach ($productos as $p)     
                            <tr>
                            <th scope="row">{{$p->id}}</th>
                            <td>{{$p->nombre}}</td>
                            <td>{{$p->descripcion}}</td>
                            <td>{{$p->precio}}</td>
                            </tr>
                        @endforeach
                    @else
                        No hay productos disponibles
                    @endif
                    
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-4 offset-md-8 ">
                    <div class="d-grid gap-2">
                        <a class="btn btn-primary" type="button" href="/">Limpiar busqueda</a>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nuevo producto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/agregarProducto" method="POST" id="name">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="col-md-12">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                    </div>
                    <div class="col-md-12">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio">
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar producto</button>
            </div>
        </form>
        </div>
    </div>
  </div>
