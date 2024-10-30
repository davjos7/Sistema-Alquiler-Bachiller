@extends('layouts.template')
@section('contenido')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            CUARTOS
        </h2>
        <a href="{{route('cuartos.index')}}" class="btn btn-dark btn-sm ms-auto" >Ir a Listado</a>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{route('cuartos.store')}}" method="post" class="row">
                    @csrf
                    <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nombre del Cuarto</label>
                            <input type="text" name="nombre_cuarto" class="form-control" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Descripcion Del Cuarto</label>
                            <input type="text" name="descripcion_cuarto" class="form-control" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Precio del Cuarto</label>
                            <input type="number" name="precio_cuarto" class="form-control" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="disponible_cuarto">Estado de disponibilidad:</label>
                                <select id="disponible_cuarto" name="disponible_cuarto" class="form-control">
                                    <option value="1" {{ old('disponible_cuarto') == 1 ? 'selected' : '' }}>Disponible</option>
                                    <option value="0" {{ old('disponible_cuarto') == 0 ? 'selected' : '' }}>No Disponible</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Cursos</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm ms-auto col-md-2">Guardar</button>
                        </div>
                        <div class="col-md-10"></div>
                    </form>
            </div>
        </div>
    </div>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
