<div>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">PLANIFICAR ASIGNATURA</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Planificar Asignatura</li>
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
                                data-bs-toggle="modal" data-bs-target="#agregarplanificar_asignatura"> <i
                                    class="bx bxs-plus-circle">AGREGAR</i></button>


                        </div>
                        <br>
                        <br>
                        <br>
                        {{-- <div class="col-md-12">
                            <div class="col-md-6">
                                <input type="text" class="form-control col-md-6" wire:model="search"
                                    placeholder="Buscar...">
                            </div>
                        </div> --}}

                        {{-- <pre>
                            @php
                                print_r($f_gestion);
                                echo ' - ';
                                print_r($f_sede);
                                echo ' - ';
                                print_r($f_idioma);
                                echo ' - ';
                                print_r($f_nivel);
                            @endphp
                        </pre> --}}

                        {{-- @dd($gestiones) --}}

                        <div class="col-12 row">
                            <div class="col-12 col-md-3">
                                <label for="gestiones" class="form-label">GESTION: </label>
                                <select name="gestiones" id="gestiones" class="form-select" wire:model="f_gestion">
                                    <option value="0">Elegir...</option>
                                    @foreach ($gestiones as $gestion)
                                        <option value="{{ $gestion->id_gestion }}">
                                            {{ $gestion->nombre_gestion }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            @if ($f_gestion != 0)
                                <div class="col-12 col-md-3">
                                    <label for="sedes" class="form-label">SEDE: </label>
                                    <select name="sedes" id="sedes" class="form-select" wire:model="f_sede">
                                        <option value="0">Elegir...</option>
                                        @foreach ($sedes as $sede)
                                            <option value="{{ $sede->nombre_sede }}">{{ $sede->nombre_sede }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            @if ($f_sede != 0)
                                <div class="col-12 col-md-3">
                                    <label for="idiomas" class="form-label">IDIOMAS: </label>
                                    <select name="idiomas" id="idiomas" class="form-select" wire:model="f_idioma">
                                        <option value="0">Elegir...</option>
                                        @foreach ($idiomas as $idioma)
                                            <option value="{{ $idioma->id_idioma }}">{{ $idioma->nombre_idioma }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            @if ($f_idioma)
                                <div class="col-12 col-md-3">
                                    <label for="niveles" class="form-label">NIVEL: </label>
                                    <select name="niveles" id="niveles" class="form-select" wire:model="f_nivel">
                                        <option value="0">Elegir...</option>
                                        @foreach ($niveles as $nivel)
                                            <option value="{{ $nivel->id_nivel_idioma }}">
                                                {{ $nivel->nombre_nivel_idioma }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        </div>


                    </div>

                    <br>
                    <div>
                        {{-- <button class="btn btn-danger" wire:click="generarReportePDF">
                            Generar reporte PDF &nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf" viewBox="0 0 16 16"><path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" /><path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" /></svg>
                        </button>
                        <button class="btn btn-success">
                            Generar reporte EXCEL &nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-excel" viewBox="0 0 16 16"><path d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704z" /><path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" /></svg>
                        </button> --}}
                    </div>
                    <br>

                    @if ($planificar_asignaturas->count())
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>
                                            N°
                                        </th>
                                        <th>
                                            GESTION
                                        </th>
                                        <th>
                                            PERIODO
                                        </th>
                                        <th>
                                            SEDE
                                        </th>
                                        <th>
                                            ASIGNATURA
                                        </th>
                                        <th>
                                            NIVEL
                                        </th>
                                        <th>
                                            PARALELO
                                        </th>
                                        <th>
                                            COSTO
                                        </th>
                                        <th>
                                            CARGA HORARIA
                                        </th>
                                        <th>
                                            ESTADO
                                        </th>
                                        <th>
                                            ACCIÓN
                                        </th>
                                        <th>
                                            REPORTES
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $cont = 1;
                                    @endphp

                                    {{-- @dd($planificar_asignaturas) --}}
                                    @foreach ($planificar_asignaturas as $planificar_asignatura)
                                        <tr>
                                            <th>
                                                {{-- @php
                                                    echo $cont;
                                                    $cont++;
                                                @endphp --}}
                                                {{ $planificar_asignatura->id_planificar_asignatura }}
                                            </th>
                                            <td>
                                                {{ $planificar_asignatura->siadi_convocatoria->gestion->nombre_gestion }}
                                            </td>

                                            <td>
                                                {{ $planificar_asignatura->siadi_convocatoria->periodo }}
                                            </td>
                                            <td>
                                                {{ $planificar_asignatura->siadi_convocatoria->sede }} ::
                                                {{ $planificar_asignatura->siadi_convocatoria->tipo_convocatoria->tipo_estudiante->nombre_tipo_estudiante }}
                                                ::
                                                {{ $planificar_asignatura->siadi_convocatoria->tipo_convocatoria->convocatoria_estudiante->nombre_convocatoria_estudiante }}
                                            </td>

                                            <td>
                                                {{ $planificar_asignatura->siadi_asignatura->idioma->nombre_idioma }}
                                            </td>
                                            <td>
                                                {{ $planificar_asignatura->siadi_asignatura->nivel_idioma->nombre_nivel_idioma }}
                                            </td>

                                            <td>
                                                {{ $planificar_asignatura->siadi_paralelo->nombre_paralelo }}
                                            </td>
                                            <td>
                                                {{ $planificar_asignatura->siadi_convocatoria->tipo_convocatoria->costo->tipo_costo }}

                                            </td>
                                            <td>
                                                {{ $planificar_asignatura->carga_horaria_planificar_asignartura }}
                                            </td>
                                            <td>

                                                @if ($planificar_asignatura->estado_planificar_asignartura == 'ACTIVO')
                                                    <button type="button"
                                                        class="btn btn-outline-success waves-effect waves-light"
                                                        wire:click="cambiar_estado_planificar_asignatura({{ $planificar_asignatura->id_planificar_asignatura }})">
                                                        ACTIVO
                                                    </button>
                                                @elseif ($planificar_asignatura->estado_planificar_asignartura == 'INACTIVO')
                                                    <button type="button"
                                                        class="btn btn-outline-danger waves-effect waves-light"
                                                        wire:click="cambiar_estado_planificar_asignatura({{ $planificar_asignatura->id_planificar_asignatura }})">
                                                        INACTIVO</button>
                                                @endif
                                            </td>
                                            <td>


                                                <button type="button"
                                                    class="btn btn-outline-warning waves-effect waves-light"
                                                    style="border-radius: 50%" data-bs-toggle="modal"
                                                    data-bs-target="#editarplanificar_asignatura"
                                                    wire:click="editar_planificar_asignatura({{ $planificar_asignatura }})">
                                                    <i class="bx bx-pencil"></i>
                                                </button>

                                                <button type="button"
                                                    class="btn btn-outline-danger waves-effect waves-light"
                                                    style="border-radius: 50%"
                                                    wire:click.prevent="$emit('deleteplanificar_asignatura', {{ $planificar_asignatura->id_planificar_asignatura }})">
                                                    <i class="bx bx-trash"></i></button>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-danger waves-effect waves-light"
                                                    style="border-radius: 50%"
                                                    wire:click.prevent="generarReportePDF({{ $planificar_asignatura->id_planificar_asignatura }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-file-pdf"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                                                        <path
                                                            d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
                                                    </svg>
                                                </button>
                                                {{-- <button class="btn btn-outline-success waves-effect waves-light"
                                                    style="border-radius: 50%"
                                                    wire:click.prevent="generarReporteXLS({{ $planificar_asignatura->id_planificar_asignatura }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-file-excel"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704z" />
                                                        <path
                                                            d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                                                    </svg>
                                                </button> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="d-flex justify-content-center">

                            {{ $planificar_asignaturas->links() }}
                        </div>

                </div>
            @else
                <div class="px-5 py-3 border-gray-200  text-sm">
                    <strong>No hay Registros</strong>
                </div>

                @endif
            </div>



            <div wire:ignore.self data-bs-backdrop="static" id="editarplanificar_asignatura" class="modal fade"
                tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel"> EDITAR PLANIFICAR ASIGNATURA

                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                wire:click="cancelarEditar"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">CONVOCATORIA :</label>
                                        <select wire:model="convocatoria_estudiante" class="form-select"
                                            aria-label="Default select example">
                                            <option>Elegir...</option>
                                            @foreach ($convocatorias as $convocatoria)
                                                <option value="{{ $convocatoria->id_siadi_convocatoria }}">
                                                    {{ $convocatoria->nombre_convocatoria }} -
                                                    {{ $convocatoria->nombre_convocatoria_estudiante }}
                                                </option>
                                            @endforeach


                                        </select>
                                        @error('convocatoria_estudiante')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">ASIGNATURAS:</label>
                                        <select wire:model="asignatura" class="form-select"
                                            aria-label="Default select example">
                                            <option>Elegir...</option>
                                            @foreach ($asignaturas as $asignatura)
                                                <option value="{{ $asignatura->id_siadi_asignatura }}">
                                                    {{ $asignatura->idioma->nombre_idioma }} -
                                                    {{ $asignatura->idioma->tipo_idioma }}-
                                                    {{ $asignatura->idioma->sigla_codigo_idioma }} -
                                                    {{ $asignatura->nivel_idioma->nombre_nivel_idioma }}</option>
                                            @endforeach


                                        </select>

                                        @error('asignatura')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">PARALELO :</label>
                                        <select wire:model="id_paralelo" class="form-select"
                                            aria-label="Default select example">
                                            <option>Elegir...</option>
                                            @foreach ($paralelos as $paralelo)
                                                <option value="{{ $paralelo->id_paralelo }}">
                                                    {{ $paralelo->nombre_paralelo }}
                                                </option>
                                            @endforeach


                                        </select>
                                        @error('id_paralelo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">TURNO PARALELO:</label>
                                        <select wire:model="turno_paralelo" class="form-select"
                                            aria-label="Default select example">
                                            <option>Elegir...</option>
                                            <option value="Mañana">Mañana</option>
                                            <option value="Tarde">Tarde</option>
                                            <option value="Noche">Noche</option>


                                        </select>
                                        @error('turno_paralelo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">CUPO MINIMO:</label>
                                        <input type="number" class="form-control" wire:model="cupo_minimo">
                                        @error('cupo_minimo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">CUPO MAXIMO:</label>
                                        <input type="number" class="form-control" wire:model="cupo_maximo">
                                        @error('cupo_maximo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">CARGA HORARIA:</label>
                                        <input type="number" class="form-control" wire:model="carga_horaria"
                                            placeholder="Horas">
                                        @error('carga_horaria')
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
                                wire:click="guardarEditado_planificarAsignatura">GUARDAR DATOS</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->

            </div>




            <div wire:ignore.self id="agregarplanificar_asignatura" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel">AGREGAR PLANIFICACION ASIGNATURA
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                wire:click="cancelar"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">CONVOCATORIA :</label>
                                        <select wire:model="convocatoria_estudiante" class="form-select"
                                            aria-label="Default select example">
                                            <option>Elegir...</option>
                                            @foreach ($convocatorias as $convocatoria)
                                                <option value="{{ $convocatoria->id_siadi_convocatoria }}">
                                                    {{ $convocatoria->nombre_convocatoria }} -
                                                    {{ $convocatoria->nombre_convocatoria_estudiante }}
                                                </option>
                                            @endforeach


                                        </select>
                                        @error('convocatoria_estudiante')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">ASIGNATURAS:</label>
                                        <select wire:model="asignatura" class="form-select"
                                            aria-label="Default select example">
                                            <option>Elegir...</option>
                                            @foreach ($asignaturas as $asignatura)
                                                <option value="{{ $asignatura->id_siadi_asignatura }}">
                                                    {{ $asignatura->idioma->nombre_idioma }} -
                                                    {{ $asignatura->idioma->tipo_idioma }}-
                                                    {{ $asignatura->idioma->sigla_codigo_idioma }} -
                                                    {{ $asignatura->nivel_idioma->nombre_nivel_idioma }}</option>
                                            @endforeach


                                        </select>

                                        @error('asignatura')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">PARALELO :</label>
                                        <select wire:model="id_paralelo" class="form-select" >
                                            <option>Elegir...</option>
                                            @foreach ($paralelos as $paralelo)
                                                <option value="{{ $paralelo->id_paralelo }}">
                                                    {{ $paralelo->nombre_paralelo }}
                                                </option>
                                            @endforeach


                                        </select>
                                        @error('id_paralelo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">TURNO PARALELO:</label>
                                        <select wire:model="turno_paralelo" class="form-select" >
                                            <option>Elegir...</option>
                                            <option value="Mañana">Mañana</option>
                                            <option value="Tarde">Tarde</option>
                                            <option value="Noche">Noche</option>


                                        </select>
                                        @error('turno_paralelo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">CUPO MINIMO:</label>
                                        <input type="number" class="form-control" wire:model="cupo_minimo">
                                        @error('cupo_minimo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">CUPO MAXIMO:</label>
                                        <input type="number" class="form-control" wire:model="cupo_maximo">
                                        @error('cupo_maximo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">CARGA HORARIA:</label>
                                        <input type="number" class="form-control" wire:model="carga_horaria"
                                            placeholder="Horas">
                                        @error('carga_horaria')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"
                                wire:click="cancelar">CANCELAR</button>
                            <button wire:click="guardar_planificar_asignatura"
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
                        $('#agregarplanificar_asignatura').modal('hide');
                    });
                });
            </script>
        @endpush
        @push('navi-js')
            <script>
                document.addEventListener('livewire:load', function() {
                    Livewire.on('closeModalEdit', function() {
                        $('#editarplanificar_asignatura').modal('hide');
                    });
                });
            </script>
        @endpush
        @push('navi-js')
            <script>
                livewire.on('deleteplanificar_asignatura', id_planificar_asignatura => {
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
                            livewire.emit('delete', id_planificar_asignatura);

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
