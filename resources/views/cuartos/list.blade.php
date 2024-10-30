@extends('layouts.template')

@section('contenido')



        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            CUARTOS
        </h2>
        <a href="{{route('cuartos.create')}}" class="btn btn-dark btn-sm ms-auto" >Ir a Formulario</a>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre del Cuarto</th>
                        <th scope="col">Descripcion del Cuarto</th>
                        <th scope="col">Precio del Cuarto</th>
                        <th scope="col">Disponibilidad</th>
                      </tr>
                    </thead>
                    <tbody>
                @foreach ($cuartos as $cuarto)
                      <tr>
                        <th scope="row">{{ $cuarto->id_cuarto }}</th>
                        <td>{{ $cuarto->nombre_cuarto }}</td>
                        <td>{{ $cuarto->descripcion_cuarto }}</td>
                        <td>{{ $cuarto->precio_cuarto }}</td>
                        <td>{{ $cuarto->disponible_cuarto }}</td>
                        <td><a class="btn btn-success" href="{{ route('cuartos.edit', $cuarto->id_cuarto) }}">editar</a></td>
                        <td>
                            <form action="{{ route('cuartos.destroy', $cuarto->id_cuarto) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
