@extends('layouts.template')

@section('contenido')

<head>

    <meta charset="utf-8" />
    <title>Huespedes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Sweet Alert css-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />


</head>





<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Listado de Reservas</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Agregar</button>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Cuarto</th>
                                            <th scope="col">Huesped</th>
                                            <th scope="col">Fecha Inicio</th>
                                            <th scope="col">Fecha Fin</th>
                                            <th scope="col">Monto Total</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Acciones</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                    @foreach ($reservas as $reserva)
                                          <tr>
                                            <th scope="row">{{ $reserva->id_reserva }}</th>
                                            <td>{{ \App\Models\Cuarto::find($reserva->id_cuarto)->nombre_cuarto ?? 'Sin cuarto asignado' }}</td>
                                            <td>{{ \App\Models\Huesped::find($reserva->id_huesped)->nombres ?? 'Sin cuarto asignado'  }}</td>
                                            <td>{{ $reserva->fecha_inicio }}</td>
                                            <td>{{ $reserva->fecha_fin }}</td>
                                            <td>{{ $reserva->monto_total }}</td>
                                            <td>
                                                <span class="badge text-uppercase
                                                             {{ $reserva->estado == 1 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}"
                                                      data-status="{{ $reserva->estado }}">
                                                    {{ $reserva->estado == 1 ? 'Disponible' : 'No Disponible' }}
                                                </span>
                                            </td>
                                            <td>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#EditarModal{{ $reserva->id_reserva }}" class="btn btn-success">
                                                    Editar
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteRecordModal{{ $reserva->id_reserva }}" class="btn btn-danger">
                                                    Eliminar
                                                </button>
                                            </td>
                                          </tr>
                                          @endforeach
                                        </tbody>
                                      </table>
                                    <div class="noresult" style="display: none">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                            </lord-icon>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                                orders for you search.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="javascript:void(0);">
                                            Next
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            {{-- MODAL DE AGREGAR HUESPED --}}
            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Reservas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form  action="{{route('reservas.store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Cuarto</label>
                                    <select id="customername-field" class="form-control" name="id_cuarto" required>
                                        <option value="" disabled selected>Seleccione un cuarto</option>
                                        @foreach ($cuartos as $cuarto )
                                        <option value="{{ $cuarto->id_cuarto }}">{{ $cuarto->nombre_cuarto }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Por favor seleccione un cuarto</div>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Huesped</label>
                                    <select id="customername-field" class="form-control" name="id_huesped" required>
                                        <option value="" disabled selected>Seleccione un huesped</option>
                                        @foreach ($huespedes as $huesped )
                                        <option value="{{ $huesped->id_huesped }}">{{ $huesped->nombres }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Por favor seleccione un cuarto</div>
                                </div>

                                <div class="mb-3">
                                    <label for="phone-field" class="form-label">Fecha Inicio</label>
                                    <input type="date" id="phone-field" name="fecha_inicio" class="form-control" placeholder="Ingrese un precio" required />
                                    <div class="invalid-feedback">Please enter a phone.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="phone-field" class="form-label">Fecha Fin</label>
                                    <input type="date" id="phone-field" name="fecha_fin" class="form-control" placeholder="Ingrese un precio" required />
                                    <div class="invalid-feedback">Please enter a phone.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="phone-field" class="form-label">Monto Total</label>
                                    <input type="number" id="phone-field" name="monto_total" class="form-control" placeholder="Ingrese un precio" required />
                                    <div class="invalid-feedback">Please enter a phone.</div>
                                </div>

                                <div>
                                    <label for="status-field" class="form-label">Estado</label>
                                    <select class="form-control" name="estado" id="status-field" required>
                                        <option value="">Estado</option>
                                        <option value="1">Disponible</option>
                                        <option value="0">No Disponible</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Agregar</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- FIN MODAL DE AGREGAR CUARTOS --}}



             {{-- MODAL DE Editar Reservas --}}
            @foreach($reservas as $reserva)
             <div class="modal fade" id="EditarModal{{ $reserva->id_reserva }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Editar reserva</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{route('reservas.update', $reserva->id_reserva)}}" method="post"">
                            @csrf
                            @method('PUT')
                             <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Cuarto</label>
                                    <select id="customername-field" class="form-control" name="id_cuarto" required>
                                        <option value="" disabled>Seleccione un cuarto</option>
                                        @foreach ($cuartos as $cuarto)
                                            <option value="{{ $cuarto->id_cuarto }}"
                                                {{ $cuarto->id_cuarto == $reserva->id_cuarto ? 'selected' : '' }}>
                                                {{ $cuarto->nombre_cuarto }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Por favor seleccione un cuarto</div>
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Huesped</label>
                                    <select id="customername-field" class="form-control" name="id_huesped" required>
                                        <option value="" disabled>Seleccione un huesped</option>
                                        @foreach ($huespedes as $huesped)
                                            <option value="{{ $huesped->id_huesped }}"
                                                {{ $huesped->id_huesped == $reserva->id_huesped ? 'selected' : '' }}>
                                                {{ $huesped->nombres }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Por favor seleccione un huesped</div>
                                </div>

                                <div class="mb-3">
                                    <label for="phone-field" class="form-label">Fecha Inicio</label>
                                    <input type="date" value="{{ $reserva->fecha_inicio }}" id="phone-field" name="fecha_inicio" class="form-control" placeholder="Ingrese un precio" required />
                                    <div class="invalid-feedback">Please enter a phone.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="phone-field" class="form-label">Fecha Fin</label>
                                    <input type="date" value="{{ $reserva->fecha_fin }}" id="phone-field" name="fecha_fin" class="form-control" placeholder="Ingrese un precio" required />
                                    <div class="invalid-feedback">Please enter a phone.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="phone-field" class="form-label">Monto Total</label>
                                    <input type="number" value="{{ $reserva->monto_total }}" id="phone-field" name="monto_total" class="form-control" placeholder="Ingrese un precio" required />
                                    <div class="invalid-feedback">Please enter a phone.</div>
                                </div>

                                <div>
                                    <label for="status-field" class="form-label">Estado</label>
                                    <select class="form-control" name="disponible_cuarto" id="status-field" required>
                                        <option value="">Estado</option>
                                        <option value="1" {{ $reserva->estado == 1 ? 'selected' : '' }}>Disponible</option>
                                        <option value="0" {{ $reserva->estado == 0 ? 'selected' : '' }}>No Disponible</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Editar</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- FIN MODAL DE Editar HUESPEDES --}}


            {{-- MODAL DE ELIMINAR CUARTOS --}}
            @foreach($reservas as $reserva)
            <div class="modal fade zoomIn" id="deleteRecordModal{{ $reserva->id_reserva }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mt-2 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                    <h4>Estas Seguro?</h4>
                                    <p class="text-muted mx-4 mb-0">¿Estás segur@ de que quieres eliminar este registro?</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Cerrar</button>
                                <!-- Formulario de eliminación específico para cada reserva -->
                                <form action="{{ route('reservas.destroy', $reserva->id_reserva) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn w-sm btn-danger" id="delete-record">Si, borralo!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- FIN MODAL DE ELIMINAR CUARTOS --}}


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Joseph Davila.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Sistema de Alquiler
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <!-- prismjs plugin -->
    {{-- <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script> --}}

    <!-- listjs init -->
    {{-- <script src="{{ asset('assets/js/pages/listjs.init.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script> --}}



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
