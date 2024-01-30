<div>
    @if (Auth::user()->roles[0]->name == 'Admin' or
            Auth::user()->roles[0]->name == 'Kardex' or
            Auth::user()->roles[0]->name == 'Docente')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">
                                Bienvenido al sistema SI@DI
                            </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        @livewire('modulos.graficos-apex-chart')



        <!-- <div class="row">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="avatar-sm font-size-20 me-3">
                                <span class="avatar-title bg-soft-primary text-primary rounded">
                                    <i class="mdi mdi-tag-plus-outline"></i>
                                </span>
                            </div>
                            <div class="flex-1">
                                <div class="font-size-16 mt-2">New Orders</div>
                            </div>
                        </div>
                        <h4 class="mt-4">1,368</h4>
                        <div class="row">
                            <div class="col-7">
                                <p class="mb-0"><span class="text-success me-2"> 0.28% <i
                                            class="mdi mdi-arrow-up"></i>
                                    </span></p>
                            </div>
                            <div class="col-5 align-self-center">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 62%"
                                        aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="avatar-sm font-size-20 me-3">
                                <span class="avatar-title bg-soft-primary text-primary rounded">
                                    <i class="mdi mdi-account-multiple-outline"></i>
                                </span>
                            </div>
                            <div class="flex-1">
                                <div class="font-size-16 mt-2">New Users</div>

                            </div>
                        </div>
                        <h4 class="mt-4">2,456</h4>
                        <div class="row">
                            <div class="col-7">
                                <p class="mb-0"><span class="text-success me-2"> 0.16% <i
                                            class="mdi mdi-arrow-up"></i>
                                    </span></p>
                            </div>
                            <div class="col-5 align-self-center">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 62%"
                                        aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Sales Report</h4>

                        <div id="line-chart" class="apex-charts"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Revenue</h4>

                        <div id="column-chart" class="apex-charts"></div>
                    </div>
                </div>
            </div>
        </div> -->


        <!-- <div class="row">
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Sales Analytics</h4>

                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div id="donut-chart" class="apex-charts"></div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="py-3">
                                                <p class="mb-1 text-truncate"><i
                                                        class="mdi mdi-circle text-primary me-1"></i> Online
                                                </p>
                                                <h5>$ 2,652</h5>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="py-3">
                                                <p class="mb-1 text-truncate"><i
                                                        class="mdi mdi-circle text-success me-1"></i>
                                                    Offline</p>
                                                <h5>$ 2,284</h5>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="py-3">
                                                <p class="mb-1 text-truncate"><i
                                                        class="mdi mdi-circle text-warning me-1"></i>
                                                    Marketing</p>
                                                <h5>$ 1,753</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Monthly Sales</h4>

                        <div id="scatter-chart" class="apex-charts"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class="card bg-primary">
                    <div class="card-body">
                        <div class="text-white-50">
                            <h5 class="text-white">2400 + New Users</h5>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus</p>
                            <div>
                                <a href="#" class="btn btn-outline-success btn-sm">View more</a>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-8">
                                <div class="mt-4">
                                    <img src="{{ asset('assets/dashboard/assets/images/widget-img.png') }}"
                                        alt="" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    @elseif (Auth::user()->roles[0]->name == 'Estudiante')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">DATOS PERSONALES</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Datos Personales</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- start row -->
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-widgets py-3">

                            <div class="text-center">
                                <div class="">
                                    <img src="{{ asset('assets/dashboard/assets/images/upea2.png') }}" alt=""
                                        class="avatar-lg mx-auto img-thumbnail rounded-circle">
                                    <div class="online-circle"><i class="fas fa-circle text-success"></i>
                                    </div>
                                </div>

                                <div class="mt-3 ">
                                    <a href="#"
                                        class="text-reset fw-medium font-size-16">{{ Auth::user()->name }}
                                        {{ Auth::user()->paterno }} {{ Auth::user()->materno }}</a>
                                    <p class="text-body mt-1 mb-1">{{ Auth::user()->roles[0]->name }}</p>


                                </div><br> <br>
                                <div class="text-center">

                                    <h3>DATOS PERSONALES</h3>
                                </div>
                                <div class="row mt-4 border border-start-0 border-end-0 p-3">
                                    <div class="col-md-6">
                                        <h6 class="text-muted">
                                            <label for="" class="form-label">NOMBRES:</label>
                                            <input type="text" class="form-control" wire:model="nombre">
                                            @error('nombre')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </h6>

                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted">
                                            <label for="" class="form-label">APELLIDO PATERNO</label>
                                            <input type="text" class="form-control" wire:model="paterno">
                                            @error('paterno')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </h6>

                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted">
                                            <label for="" class="form-label">APELLIDO MATERNO</label>
                                            <input type="text" class="form-control" wire:model="materno">
                                            @error('materno')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </h6>

                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted">
                                            <label for="" class="form-label">PAIS O NACIONALIDAD</label>
                                            <input type="text" class="form-control" wire:model="pais">
                                            @error('pais')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </h6>

                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted">
                                            <label for="" class="form-label">C.I:</label>
                                            <input type="text" class="form-control" wire:model="ci">
                                            @error('ci')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </h6>

                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted">
                                            <label for="" class="form-label">EXPEDIDO</label>
                                            <input type="text" class="form-control" wire:model="expedido">
                                            @error('expedido')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </h6>

                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted">
                                            <label for="" class="form-label">FECHA NACIMIENTO:</label>
                                            <input type="date" class="form-control" wire:model="fecha_nacimiento">
                                            @error('fecha_nacimiento')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </h6>

                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted">
                                            <label for="" class="form-label">PROFESIÓN</label>
                                            <input type="text" class="form-control" wire:model="profesion">
                                            @error('profesion')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </h6>

                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted">
                                            <label for="" class="form-label">DIRECCIÓN</label>
                                            <input type="text" class="form-control" wire:model="direccion">
                                            @error('direccion')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </h6>

                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted">
                                            <label for="" class="form-label">TELEFONO</label>
                                            <input type="text" class="form-control"wire:model="telefono">
                                            @error('telefono')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </h6>

                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted">
                                            <label for="" class="form-label">CELULAR</label>
                                            <input type="text" class="form-control"wire:model="celular">
                                            @error('celular')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </h6>

                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted">
                                            <label for="" class="form-label">TIPO DE ESTUDIANTE</label>
                                            <select class="form-select" wire:model="tipo_estudiante">
                                                @foreach ($tiposestudiantes as $tipo)
                                                    <option value="{{ $tipo->id_tipo_estudiante }}">
                                                        {{ $tipo->nombre_tipo_estudiante }}</option>
                                                @endforeach

                                            </select>
                                            @error('tipo_estudiante')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </h6>

                                    </div>


                                </div>
                                <div class="text-center">
                                    @if ($validarregistros == 'no_tiene_registros')
                                        <button class="btn btn-success"
                                            wire:click.prevent="$emit('updatedatospersona')">EDITAR DATOS
                                            PERSONALES</button>
                                    @endif


                                </div>
                                <div class="mt-4">

                                    <ui class="list-inline social-source-list">
                                        <li class="list-inline-item">
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle">
                                                    <i class="mdi mdi-facebook"></i>
                                                </span>
                                            </div>
                                        </li>

                                        <li class="list-inline-item">
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-info">
                                                    <i class="mdi mdi-twitter"></i>
                                                </span>
                                            </div>
                                        </li>

                                        <li class="list-inline-item">
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-danger">
                                                    <i class="mdi mdi-google-plus"></i>
                                                </span>
                                            </div>
                                        </li>

                                        <li class="list-inline-item">
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-pink">
                                                    <i class="mdi mdi-instagram"></i>
                                                </span>
                                            </div>
                                        </li>
                                    </ui>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>




            </div>




        </div>
    @endif
    @push('navi-js')
        <script>
            livewire.on('updatedatospersona', () => {
                Swal.fire({
                    title: '¿Está seguro/a de actualizar sus datos personales?',
                    text: '¡No podrá revertir esto!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, editar datos!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        livewire.emit('updatepersona');

                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            'Datos seguros',
                            'Sus datos personales están seguros.',
                            'info'
                        );
                    }
                });
            });
        </script>
    @endpush

</div>
