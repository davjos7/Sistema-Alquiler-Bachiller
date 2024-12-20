@extends('layouts.template')

@section('contenido')

<head>

    <meta charset="utf-8" />
    <title>Cuartos</title>
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
                            <h4 class="card-title mb-0">Listado de Cuartos</h4>
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
                                            <th scope="col">Nombre del Cuarto</th>
                                            <th scope="col">Descripcion del Cuarto</th>
                                            <th scope="col">Precio del Cuarto</th>
                                            <th scope="col">Disponibilidad</th>
                                            <th scope="col">Acciones</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                    @foreach ($cuartos as $cuarto)
                                          <tr>
                                            <th scope="row">{{ $cuarto->id_cuarto }}</th>
                                            <td>{{ $cuarto->nombre_cuarto }}</td>
                                            <td>{{ $cuarto->descripcion_cuarto }}</td>
                                            <td>S/. {{ $cuarto->precio_cuarto }}</td>
                                            <td>
                                                <span class="badge text-uppercase
                                                             {{ $cuarto->disponible_cuarto == 1 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}"
                                                      data-status="{{ $cuarto->disponible_cuarto }}">
                                                    {{ $cuarto->disponible_cuarto == 1 ? 'Disponible' : 'No Disponible' }}
                                                </span>
                                            </td>

                                            <td>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#EditarModal{{ $cuarto->id_cuarto }}" class="btn btn-success">
                                                    Editar
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteRecordModal{{ $cuarto->id_cuarto }}" class="btn btn-danger">
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

            {{-- MODAL DE AGREGAR CUARTOS --}}
            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Cuarto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form  action="{{route('cuartos.store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Nombre</label>
                                    <input type="text" id="customername-field" class="form-control" name="nombre_cuarto" placeholder="Ingrese un nombre" required />
                                    <div class="invalid-feedback">Por favor ingrese un nombre</div>
                                </div>

                                <div class="mb-3">
                                    <label for="email-field" class="form-label">Descripcion</label>
                                    <input type="text" name="descripcion_cuarto" id="email-field" class="form-control" placeholder="Ingrese una descripcion" required />
                                    <div class="invalid-feedback">Please enter an email.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="phone-field" class="form-label">Precio</label>
                                    <input min="0" max="3000" type="number" id="phone-field" name="precio_cuarto" class="form-control" placeholder="Ingrese un precio" required />
                                    <div class="invalid-feedback">Please enter a phone.</div>
                                </div>

                                <div>
                                    <label for="status-field" class="form-label">Estado</label>
                                    <select class="form-control" name="disponible_cuarto" id="status-field" required>
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



             {{-- MODAL DE Editar CUARTOS --}}
            @foreach($cuartos as $cuarto)
             <div class="modal fade" id="EditarModal{{ $cuarto->id_cuarto }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Cuarto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form action="{{route('cuartos.update', $cuarto->id_cuarto)}}" method="post"">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Nombre</label>
                                    <input type="text" id="customername-field" value="{{ $cuarto->nombre_cuarto }}" class="form-control" name="nombre_cuarto" placeholder="Ingrese un nombre" required />
                                    <div class="invalid-feedback">Por favor ingrese un nombre</div>
                                </div>

                                <div class="mb-3">
                                    <label for="email-field" class="form-label">Descripcion</label>
                                    <input type="text" name="descripcion_cuarto" value="{{ $cuarto->descripcion_cuarto }}" id="email-field" class="form-control" placeholder="Ingrese una descripcion" required />
                                    <div class="invalid-feedback">Please enter an email.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="phone-field" class="form-label">Precio</label>
                                    <input min="0" max="3000" type="number" value="{{ $cuarto->precio_cuarto }}" id="phone-field" name="precio_cuarto" class="form-control" placeholder="Ingrese un precio" required />
                                    <div class="invalid-feedback">Please enter a phone.</div>
                                </div>

                                <div>
                                    <label for="status-field" class="form-label">Estado</label>
                                    <select class="form-control" name="disponible_cuarto" id="status-field" required>
                                        <option value="">Estado</option>
                                        <option value="1" {{ $cuarto->disponible_cuarto == 1 ? 'selected' : '' }}>Disponible</option>
                                        <option value="0" {{ $cuarto->disponible_cuarto == 0 ? 'selected' : '' }}>No Disponible</option>
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
            {{-- FIN MODAL DE Editar CUARTOS --}}


            {{-- MODAL DE ELIMINAR CUARTOS --}}
            @foreach($cuartos as $cuarto)
            <div class="modal fade zoomIn" id="deleteRecordModal{{ $cuarto->id_cuarto }}" tabindex="-1" aria-hidden="true">
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
                                <!-- Formulario de eliminación específico para cada cuarto -->
                                <form action="{{ route('cuartos.destroy', $cuarto->id_cuarto) }}" method="POST">
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
    {{-- <script src="assets/libs/prismjs/prism.js"></script>
    <script src="assets/libs/list.js/list.min.js"></script>
    <script src="assets/libs/list.pagination.js/list.pagination.min.js"></script>

    <!-- listjs init -->
    <script src="assets/js/pages/listjs.init.js"></script>

    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script> --}}



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
