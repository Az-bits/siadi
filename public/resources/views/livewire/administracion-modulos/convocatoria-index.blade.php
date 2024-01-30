<div>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">planificarconvocatoriaS</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">planificarconvocatorias</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="mb-3 row">

                        <div class="col-md-6">
                            <button class="btn btn-outline-primary waves-effect waves-light col-md-6 "
                                data-bs-toggle="modal" data-bs-target="#agregarplanificarconvocatoria"> <i
                                    class="bx bxs-plus-circle">AGREGAR</i></button>


                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <input type="text" class="form-control col-md-6" wire:model="search"
                                    placeholder="Buscar...">

                            </div>
                        </div>
                    </div>
                    <br>

                    @if ($planificarconvocatorias->count())


                        <div class="table-responsive">
                            <table class="table table-hover mb-0">

                                <thead>
                                    <tr>

                                        <th>
                                            N°
                                        </th>


                                        <th>
                                            NOMBRE CONVOCATORIA
                                        </th>

                                        <th>
                                            GESTION CONVOCATORIA
                                        </th>
                                        <th>
                                            PERIODO CONVOCATORIA
                                        </th>
                                        <th>
                                            TIPO CONVOCATORIA
                                        </th>
                                        <th>
                                            SEDE CONVOCATORIA
                                        </th>
                                        <th>
                                            DESCRIPCION CONVOCATORIA
                                        </th>
                                        <th>
                                            FECHA INICIO CONVOCATORIA
                                        </th>
                                        <th>
                                            FECHA FIN CONVOCATORIA
                                        </th>
                                        <th>
                                            ESTADO CONVOCATORIA
                                        </th>
                                        <th>
                                            ACCIÓN
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $cont = 1;
                                    @endphp
                                    @foreach ($planificarconvocatorias as $planificarconvocatoria)
                                        <tr>

                                            <th>
                                                {{ $cont }}
                                            </th>

                                            <td>
                                                {{ $planificarconvocatoria->nombre_convocatoria }}
                                            </td>

                                            <td>
                                                {{ $planificarconvocatoria->gestion->nombre_gestion }}
                                            </td>
                                            <td>
                                                {{ $planificarconvocatoria->periodo }}
                                            </td>
                                            <td>
                                                {{ $planificarconvocatoria->tipo_convocatoria->tipo_estudiante->nombre_tipo_estudiante }}
                                                -
                                                {{ $planificarconvocatoria->tipo_convocatoria->convocatoria_estudiante->nombre_convocatoria_estudiante }}
                                                -
                                                {{ $planificarconvocatoria->tipo_convocatoria->costo->costo_siado_costo }}
                                                -
                                                {{ $planificarconvocatoria->tipo_convocatoria->costo->observacion_costo }}
                                            </td>
                                            <td>
                                                {{ $planificarconvocatoria->sede }}
                                            </td>
                                            <td>
                                                {{ $planificarconvocatoria->descripcion_convocatoria }}
                                            </td>
                                            <td>
                                                {{ $planificarconvocatoria->fecha_inicio }}
                                            </td>
                                            <td>
                                                {{ $planificarconvocatoria->fecha_fin }}
                                            </td>
                                            <td>

                                                @if ($planificarconvocatoria->estado_convocatoria == 'ACTIVO')
                                                    <button type="button"
                                                        class="btn btn-outline-success waves-effect waves-light"
                                                        wire:click="cambiar_estado_convocatoria({{ $planificarconvocatoria->id_siadi_convocatoria }})">
                                                        ACTIVO
                                                    </button>
                                                @elseif ($planificarconvocatoria->estado_convocatoria == 'INACTIVO')
                                                    <button type="button"
                                                        class="btn btn-outline-danger waves-effect waves-light"
                                                        wire:click="cambiar_estado_convocatoria({{ $planificarconvocatoria->id_siadi_convocatoria }})">
                                                        INACTIVO</button>
                                                @endif

                                            </td>
                                            <td>


                                                <button type="button"
                                                    class="btn btn-outline-warning waves-effect waves-light"
                                                    style="border-radius: 50%" data-bs-toggle="modal"
                                                    data-bs-target="#editarplanificarconvocatoria"
                                                    wire:click="editar_planificarconvocatoria({{ $planificarconvocatoria->id_siadi_convocatoria }})">
                                                    <i class="bx bx-pencil"></i>
                                                </button>


                                                <button type="button"
                                                    class="btn btn-outline-danger waves-effect waves-light"
                                                    style="border-radius: 50%"
                                                    wire:click.prevent="$emit('deleteconvoca', {{ $planificarconvocatoria->id_siadi_convocatoria }})">
                                                    <i class="bx bx-trash"></i></button>

                                            </td>

                                        </tr>
                                    @endforeach
                                    @php
                                        $cont++;
                                    @endphp
                                </tbody>
                            </table>

                        </div>
                        <div class="d-flex justify-content-center">

                            {{ $planificarconvocatorias->links() }}
                        </div>

                </div>
            @else
                <div class="px-5 py-3 border-gray-200  text-sm">
                    <strong>No hay Registros</strong>
                </div>
                @endif
            </div>



            <div wire:ignore.self data-bs-backdrop="static" id="editarplanificarconvocatoria" class="modal fade"
                tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel"> EDITAR planificarconvocatoria

                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                wire:click="cancelarEditar"></button>
                        </div>
                        <div class="modal-body">







                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">NOMBRE CONVOCATORIA:</label>
                                    <input type="text" class="form-control" wire:model="nombre_convocatoria2">
                                    @error('nombre_convocatoria2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">DESCRIPCION:</label>
                                    <textarea class="form-control" wire:model="descripcion_convocatoria2"></textarea>

                                    @error('descripcion_convocatoria2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">GESTION:</label>
                                        <select wire:model="id_gestion2" class="form-select"
                                            aria-label="Default select example">
                                            <option>Elegir...</option>
                                            @foreach ($gestiones as $gestion)
                                                <option value="{{ $gestion->id_gestion }}">
                                                    {{ $gestion->nombre_gestion }}</option>
                                            @endforeach


                                        </select>
                                        @error('id_gestion2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">PERIODO:</label>
                                        <select wire:model="periodo2" class="form-select">
                                            <option>Elegir...</option>

                                            <option value="I">I</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>




                                        </select>
                                        @error('periodo2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">TIPO CONVOCATORIA:</label>
                                        <select wire:model="id_tipo_convocatoria2" class="form-select"
                                            aria-label="Default select example">
                                            <option>Elegir...</option>
                                            @foreach ($siadi_tipo_convocatorias as $siadi_tipo_convocatoria)
                                                <option value="{{ $siadi_tipo_convocatoria->id_tipo_convocatoria }}">
                                                    {{ $siadi_tipo_convocatoria->tipo_estudiante->nombre_tipo_estudiante }}
                                                    -
                                                    {{ $siadi_tipo_convocatoria->convocatoria_estudiante->nombre_convocatoria_estudiante }}
                                                    - {{ $siadi_tipo_convocatoria->costo->costo_siado_costo }} -
                                                    {{ $siadi_tipo_convocatoria->costo->observacion_costo }}</option>
                                            @endforeach


                                        </select>
                                        @error('id_tipo_convocatoria2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">SEDE:</label>
                                        <select wire:model="sede2" class="form-select"
                                            aria-label="Default select example">
                                            <option>Elegir...</option>
                                            @foreach ($sedes as $sede)
                                                <option value="{{ $sede->nombre_sede }}"> {{ $sede->nombre_sede }}
                                                </option>
                                            @endforeach


                                        </select>
                                        @error('sede2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">FECHA INICIO:</label>
                                        <input type="date" class="form-control" wire:model="fecha_inicio2">
                                        @error('fecha_inicio2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">FECHA FIN:</label>
                                        <input type="date" class="form-control" wire:model="fecha_fin2">
                                        @error('fecha_fin2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>



                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"
                                wire:click="cancelarEditar">CANCELAR</button>
                            <button class="btn btn-primary waves-effect waves-light"
                                wire:click="guardarEditadoplanificarconvocatoria">GUARDAR DATOS</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->

            </div>




            <div wire:ignore.self id="agregarplanificarconvocatoria" class="modal fade modal-lg" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel">NUEVA PLANIFICACION :: CONVOCATORIA
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                wire:click="cancelar"></button>
                        </div>
                        <div class="modal-body">


                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">NOMBRE CONVOCATORIA:</label>
                                    <input type="text" class="form-control" wire:model="nombre_convocatoria">
                                    @error('nombre_convocatoria')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">GESTION:</label>
                                        <select wire:model="id_gestion" class="form-select"
                                            aria-label="Default select example">
                                            <option>Elegir...</option>
                                            @foreach ($gestiones as $gestion)
                                                <option value="{{ $gestion->id_gestion }}">
                                                    {{ $gestion->nombre_gestion }}</option>
                                            @endforeach


                                        </select>
                                        @error('id_gestion')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">PERIODO:</label>
                                        <select wire:model="periodo" class="form-select">
                                            <option>Elegir...</option>

                                            <option value="I">I</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>




                                        </select>
                                        @error('periodo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">TIPO CONVOCATORIA:</label>
                                        <select wire:model="id_tipo_convocatoria" class="form-select"
                                            aria-label="Default select example">
                                            <option>Elegir...</option>
                                            @foreach ($siadi_tipo_convocatorias as $siadi_tipo_convocatoria)
                                                <option value="{{ $siadi_tipo_convocatoria->id_tipo_convocatoria }}">
                                                    {{ $siadi_tipo_convocatoria->tipo_estudiante->nombre_tipo_estudiante }}
                                                    -
                                                    {{ $siadi_tipo_convocatoria->convocatoria_estudiante->nombre_convocatoria_estudiante }}
                                                    - {{ $siadi_tipo_convocatoria->costo->costo_siado_costo }} -
                                                    {{ $siadi_tipo_convocatoria->costo->observacion_costo }}</option>
                                            @endforeach


                                        </select>
                                        @error('id_tipo_convocatoria')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">SEDE:</label>
                                        <select wire:model="sede" class="form-select"
                                            aria-label="Default select example">
                                            <option>Elegir...</option>
                                            @foreach ($sedes as $sede)
                                                <option value="{{ $sede->nombre_sede }}"> {{ $sede->nombre_sede }}
                                                </option>
                                            @endforeach


                                        </select>
                                        @error('sede')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">DESCRIPCION:</label>
                                        <textarea class="form-control" wire:model="descripcion_convocatoria"></textarea>

                                        @error('descripcion_convocatoria')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">FECHA INICIO:</label>
                                        <input type="date" class="form-control" wire:model="fecha_inicio">
                                        @error('fecha_inicio')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <label class="form-label">FECHA FIN:</label>
                                        <input type="date" class="form-control" wire:model="fecha_fin">
                                        @error('fecha_fin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row" id="lista_asignaturas">
                                <div class="col-md-11 row asignaturas_idiomas" id="idas_{{ $cont_asignaturas }}">
                                    <div class="col-md-12">
                                        <label class="form-label">IDIOMA:</label>
                                        <select class="form-control"
                                            wire:model="asignaturas.{{ $cont_asignaturas }}.idioma">
                                            <option value="">Elegir...</option>
                                            @foreach ($idiomas as $idioma)
                                                <option value="{{ $idioma->nombre_idioma }}">
                                                    {{ $idioma->nombre_idioma }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('asignaturas')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <pre>
                                        {{ print_r($asignaturas) }}
                                    </pre>
                                    <div class="row col-md-12">
                                        @if (sizeof($asignaturas) > $cont_asignaturas)
                                            @foreach ($planificar as $plan)
                                                @if ($plan->nombre_idioma == $asignaturas[$cont_asignaturas]['idioma'])
                                                    <div class="col-md-12 row mt-3">
                                                        <div
                                                            class="col-md-2 form-group d-flex justify-content-center align-items-center">
                                                            <label
                                                                class="form-check-label">{{ $plan->nombre_nivel_idioma }}</label>
                                                            &nbsp;
                                                            <input type="checkbox" class="form-check-input"
                                                                style="width: 30px;height:30px;border:1px solid var(--bs-table-bg)"
                                                                wire:model="asignaturas.{{ $cont_asignaturas }}.nivel.{{ $plan->id_siadi_asignatura }}">
                                                        </div>
                                                        @if (!empty($asignaturas[$cont_asignaturas]['nivel'][$plan->id_siadi_asignatura]))
                                                            @foreach ($paralelos as $paralelo)
                                                                <div class="col-md-2">
                                                                    <label
                                                                        class="form-check-label">{{ $paralelo->nombre_paralelo }}</label>
                                                                    <input type="checkbox" class="form-check-input"
                                                                        style="width:25px;height:25px;"
                                                                        wire:model="asignaturas.{{ $cont_asignaturas }}.paralelos.{{ $plan->id_siadi_asignatura }}.{{ $paralelo->id_paralelo }}">
                                                                    <br>
                                                                    <br>
                                                                    <select class="form-select"
                                                                        wire:model="asignaturas.{{ $cont_asignaturas }}.paralelos.{{ $plan->id_siadi_asignatura }}.{{ $paralelo->id_paralelo }}">
                                                                        <option value="Mañana">Mañana</option>
                                                                        <option value="Tarde" selected>Tarde</option>
                                                                        <option value="Noche">Noche</option>
                                                                    </select>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <hr>
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="col-md-6"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    @if (!empty($asignaturas[$cont_asignaturas]['idioma']))
                                        @php
                                            $cont_niv = 0;
                                            if (!empty($asignaturas[$cont_asignaturas]['nivel'])) {
                                                foreach ($asignaturas[$cont_asignaturas]['nivel'] as $value) {
                                                    $cont_niv = $cont_niv + $value;
                                                }
                                            }
                                        @endphp
                                        @if ($cont_niv > 0)
                                            <button class="btn btn-success mt-3" wire:click="addAsignatura">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            @if (!empty($asignaturas))
                                <div>
                                    <table class="table table-bordered mt-3">
                                        <tr>
                                            <th>Idioma</th>
                                            <th>Niveles</th>
                                            <th></th>
                                        </tr>
                                        @for ($i = 0; $i < $cont_asignaturas; $i++)
                                            @if (!empty($asignaturas[$i]))
                                                <tr>
                                                    <td>{{ $asignaturas[$i]['idioma'] }}</td>
                                                    <td>
                                                        @foreach ($asignaturas[$i]['nivel'] as $key => $niv)
                                                            @if ($asignaturas[$i]['nivel'][$key])
                                                                <span
                                                                    class="badge bg-dark">{{ $niveles[$key] }}</span>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td><button class="btn btn-sm btn-danger"
                                                            wire:click.prevent="eliminarAsignatura({{ $i }})"><i
                                                                class="fa fa-trash"></i></button></td>
                                                </tr>
                                            @endif
                                        @endfor
                                    </table>
                                </div>
                            @endif
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"
                                wire:click="cancelar">CANCELAR</button>
                            <button wire:click="guardar_planificarconvocatoria"
                                class="btn btn-primary waves-effect waves-light">GUARDAR DATOS</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>

        </div>

        @push('navi-js')
            <script>
                document.addEventListener('livewire:load', function() {
                    Livewire.on('closeModalCreate', function() {
                        $('#agregarplanificarconvocatoria').modal('hide');
                    });
                });
            </script>
        @endpush
        @push('navi-js')
            <script>
                document.addEventListener('livewire:load', function() {
                    Livewire.on('closeModalEdit', function() {
                        $('#editarplanificarconvocatoria').modal('hide');
                    });
                });
            </script>
        @endpush
        @push('navi-js')
            <script>
                livewire.on('deleteconvoca', id_siadi_convocatoria => {
                    Swal.fire({
                        title: 'Esta seguro/segura ?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '¡Sí, bórralo!'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            // livewire.emitTo('servidor-index', 'delete', ServidorId);
                            livewire.emit('delete', id_siadi_convocatoria);

                            Swal.fire(
                                'Eliminado!',
                                'Su Registro ha sido eliminado..',
                                'Exitosamente'
                            )
                        }
                    })
                });
            </script>
        @endpush
