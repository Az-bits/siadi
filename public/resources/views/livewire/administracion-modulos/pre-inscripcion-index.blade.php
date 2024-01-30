<div>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">PREINSCRIPCIONES</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">preinscripcion</li>
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



                        <br>
                        <br>
                        <br>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <button class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#crearnuevapreinscripcion">AGREGAR PRE INSCRIPCIÓN</button>
                                <input type="text" class="form-control col-md-6" wire:model="search"
                                    placeholder="Buscar...">

                            </div>



                        </div>


                    </div>

                    <br>



                    @if ($personapreinscrita->count())


                        <div class="table-responsive">
                            <table class="table table-hover mb-0">

                                <thead>
                                    <tr>

                                        <th>
                                            N°
                                        </th>
                                        <th>CI PERSONA</th>

                                        <th>
                                            NOMBRE ESTUDIANTE
                                        </th>
                                        <th>
                                            TIPO ESTIANTE
                                        </th>


                                        <th>
                                            ACCIÓNES
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $cont = 1;
                                    @endphp
                                    @foreach ($personapreinscrita as $personapreinscrit)
                                        <tr>

                                            <th>
                                                @php
                                                    echo $cont;
                                                    $cont++;
                                                @endphp
                                            </th>
                                            <th>
                                                {{ $personapreinscrit->ci_persona }}
                                            </th>

                                            <td>

                                                {{ $personapreinscrit->paterno_persona }}
                                                {{ $personapreinscrit->materno_persona }}
                                                {{ $personapreinscrit->nombres_persona }}
                                            </td>
                                            <td>
                                                {{ $personapreinscrit->tipo_estudiante->nombre_tipo_estudiante }}
                                            </td>


                                            <td>
                                                {{-- @if ($insc->observacion_inscripcion == 'INSCRITO')
                                                    <button type="button"
                                                        class="btn btn-outline-success waves-effect waves-light">
                                                        INSCRITO
                                                    </button>
                                                @else --}}

                                                <button type="button"
                                                    class="btn btn-outline-primary waves-effect waves-light"
                                                    wire:click="inscribirestudiante({{ $personapreinscrit->id_siadi_persona }})">
                                                    INSCRIBIR
                                                </button>

                                                <button type="button"
                                                    class="btn btn-outline-danger waves-effect waves-light"
                                                    wire:click="inscribireditar({{ $personapreinscrit->id_siadi_persona }})">
                                                    EDITAR INSCRIPCIÓN
                                                </button>
                                                {{-- @endif --}}
                                                {{-- <a href="{{ route('imprimir_reporte_preinscripcion', $insc->id_pre_inscripcion) }}"
                                                        type="button"
                                                        class="btn btn-outline-danger waves-effect waves-light"> <i
                                                            class="fa fa-print"></i>
                                                    </a> --}}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="d-flex justify-content-center">

                            {{ $personapreinscrita->links() }}
                        </div>

                </div>
            @else
                <div class="px-5 py-3 border-gray-200  text-sm">
                    <strong>No hay Registros</strong>
                </div>
                @endif

            </div>


        </div>
    </div>
    <div wire:ignore.self id="editar_inscripcion" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="cancelar"></button>
                </div>
                <div class="modal-body">

                    <div class="row col-md-12" x-data="{ mostrarEdicion: false }">

                        <br>
                        <div class="col-md-12">
                            <div class="mb-12">

                                <center>
                                    <h3>.::ASIGNATURAS INSCRITAS::.</h3>
                                </center>
                                @if ($personaunica)
                                    <div class="text-center">
                                        <h4> NOMBRE: {{ $personaunica->nombres_persona }}
                                            {{ $personaunica->paterno_persona }} {{ $personaunica->materno_persona }}
                                            C.I.:{{ $personaunica->ci_persona }} </h4>
                                    </div>


                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>IDIOMA</th>
                                                    <th>DESCRIPCIÓN</th>
                                                    <th>NOTA FINAL</th>
                                                    <th>ESTADO</th>

                                                </tr>
                                            </thead>
                                            <tbody>



                                                @foreach ($personaunica->persona_inscrita as $inscp)
                                                    <tr>
                                                        <td>
                                                            {{ $inscp->planificar_asignatura->siadi_asignatura->idioma->nombre_idioma }}
                                                        </td>
                                                        <td>
                                                            {{ $inscp->planificar_asignatura->siadi_asignatura->nivel_idioma->nombre_nivel_idioma }}
                                                            {{ $inscp->planificar_asignatura->siadi_paralelo->nombre_paralelo }}
                                                            {{ $inscp->planificar_asignatura->turno_paralelo }}

                                                        </td>
                                                        <td>{{ $inscp->notas->final_nota }}</td>
                                                        <td>{{ $inscp->notas->observacion_nota }}</td>

                                                        <td>

                                                            <button class="btn btn-info"
                                                                x-on:click="mostrarEdicion = true"
                                                                wire:click="editarasig({{ $inscp->id_inscripcion }})">Editar</button>
                                                        </td>

                                                    </tr>
                                                @endforeach


                                            </tbody>

                                        </table>


                                    </div>
                                    <div class="row" x-show="mostrarEdicion">
                                        <div class="text-center">
                                            <h4>EDITAR INSCRIPCIÓN</h4>
                                        </div>



                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <label class="form-label text-center">ASIGNATURA :
                                                    {{ $nombre_asignatura_edit }}
                                                </label>
                                                <select class="form-select" wire:model="asignaturaGuardar">

                                                    @foreach ($asignaturas_validas as $asinaturasval)
                                                        <option value="{{ $asinaturasval->id_planificar_asignatura }}">
                                                            {{ $asinaturasval->nombre_idioma }}
                                                            {{ $asinaturasval->nombre_nivel_idioma }}
                                                            PARALELO:
                                                            {{ $asinaturasval->nombre_paralelo }}
                                                            {{ $asinaturasval->turno_paralelo }}</option>
                                                    @endforeach

                                                </select>
                                                @error('asignaturaGuardar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="text-center">
                                            <button class="btn btn-success" wire:click="guardareditarinscripcion"
                                                x-on:click="mostrarEdicion = false"> GUARDAR</button>
                                            <button class="btn btn-danger" x-on:click="mostrarEdicion = false">
                                                CANCELAR</button>
                                        </div>

                                    </div>
                                    <br>
                                    <br>
                                    <br>

                                @endif


                            </div>


                        </div>

                        <div class="text-center"> <button type="button" class="btn btn-danger waves-effect"
                                data-bs-dismiss="modal" x-on:click="mostrarEdicion = false">CANCELAR</button></div>

                    </div>





                </div>





            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <div wire:ignore.self id="inscribirestudiantemodal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="cancelar"></button>
                </div>
                <div class="modal-body">

                    <div class="row col-md-12">
                        <center>
                            <h2>
                                .::FORMULARIO DE INSCRIPCION::.
                            </h2>
                            <h3>.::ESTUDIANTE::. : </h3>
                            <br>
                            <h2>{{ $estudiante }} </h2>
                        </center>
                        <br>
                        <div class="col-md-12">
                            <div class="mb-12">

                                @if ($materias_preinscritas->count())
                                    <center>.::ASIGNATURAS PREINSCRINCRITAS::.</center>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>IDIOMA</th>
                                                    <th>NIVEL</th>
                                                    <th>PARALELO</th>
                                                    <th>SELECTOR</th>

                                                    <th>ANULAR</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($materias_preinscritas as $materiass)
                                                    <tr>
                                                        <td>{{ $materiass->planificar_asignatura->siadi_asignatura->idioma->nombre_idioma }}
                                                        </td>
                                                        <td> {{ $materiass->planificar_asignatura->siadi_asignatura->nivel_idioma->nombre_nivel_idioma }}
                                                        </td>
                                                        <td> {{ $materiass->planificar_asignatura->siadi_paralelo->nombre_paralelo }}
                                                            {{ $materiass->planificar_asignatura->turno_paralelo }}
                                                        </td>

                                                        <td>
                                                            @if ($materiass->observacion_inscripcion == 'INSCRITO')
                                                                ESTUDIANTE INSCRITO
                                                            @elseif ($materiass->observacion_inscripcion == 'OBSERVADO')
                                                         
                                                                PREINSCRIPCIÓN CON OBSERVACIÓN
                                                            @else
                                                          
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="{{ $materiass->id_pre_inscripcion }}"
                                                                        wire:model="asignaturas" switch="success"
                                                                        value="{{ $materiass->id_pre_inscripcion }}"
                                                                        checked />
                                                                    <label class="form-check-label"
                                                                        for="{{ $materiass->id_pre_inscripcion }}"
                                                                        data-on-label="Si"
                                                                        data-off-label="No"></label>
                                                                </div>
                                                                @error('asignaturas')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if ($materiass->observacion_inscripcion == 'INSCRITO')
                                                                ESTUDIANTE INSCRITO
                                                            @else
                                                                <button type="button"
                                                                    class="btn btn-outline-warning waves-effect waves-light"
                                                                    wire:click="anular_preinscripcion({{ $materiass->id_pre_inscripcion }})">ANULAR</button>
                                                            @endif

                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <div class="row col-md-12">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">NRO DE FOLIO:</label>
                                                <input type="text" wire:model="nro_folio" class="form-control">
                                                @error('nro_folio')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">NRO CARPETA</label>
                                                <input type="text" wire:model="nro_carperta" class="form-control">
                                                @error('nro_carperta')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    SIN MATERIAS PREINSCRITAS
                                @endif
                            </div>


                        </div>



                    </div>





                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"
                        wire:click="cancelar">CANCELAR</button>
                    <button wire:click="guardar_inscripcion_estudiante"
                        class="btn btn-primary waves-effect waves-light">GUARDAR
                        DATOS</button>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <div wire:ignore.self id="crearnuevapreinscripcion" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="cancelar"></button>
                </div>
                <div class="modal-body">

                    <div class="row col-md-12">
                        <center>
                            <h2>
                                .::CREAR NUEVA PREINSCRIPCIÓN::.
                            </h2>
                            <h3>.:: BUSCAR ESTUDIANTE::. : </h3>

                            <input type="search" class="form-control" placeholder="Buscador por CI"
                                wire:model="ciestudiante">
                            @error('estudiantenoencontrado')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <h2>{{ $nombre_estudiante }} </h2>

                        </center>
                        <br>




                    </div>
                    @if ($id_estudiante_encontrado)

                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="form-labe"> TIPO DE PAGO</label>
                                <select wire:model="tipopago" class="form-select">
                                    <option selected>Elegir...</option>
                                    <option value="Depósito">Depósito</option>
                                    <option value="Efectivo">Efectivo</option>
                                </select>
                                @error('tipopago')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if ($tipopago == 'Depósito')
                                <div class="col-md-6">
                                    <label for="" class="form-labe"> NRO DE DEPOSITO</label>
                                    <input type="text" class="form-control"
                                        placeholder="Ingrese el numero de deposito" wire:model="numero_deposito">
                                </div>
                                @error('numero_deposito')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="col-md-6">
                                    <label for="" class="form-labe"> MONTO DEPOSITO</label>
                                    <input type="text" class="form-control"
                                        placeholder="Ingrese el monto de deposito" wire:model="monto_deposito">
                                </div>
                                @error('monto_deposito')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="col-md-6">
                                    <label for="" class="form-labe"> FECHA DEPOSITO</label>
                                    <input type="date" class="form-control"
                                        placeholder="Ingrese el monto de deposito" wire:model="fecha_deposito">
                                </div>
                                @error('fecha_deposito')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            @endif

                        </div>
                        <table class="table">
                            <thead>
                                <tr>

                                    <th>IDIOMA</th>
                                    <th>ASIGNATURA</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                ayamara: {{ $materiaActualAymara }} - ingles:
                                {{ $materiaActualIngles }} asignaturassssssssssssssssssss
                                @foreach ($materiasaprobadas as $materias)
                                    {{ $materias->id_inscripcion }}
                                @endforeach
                                saadadsada
                                @foreach ($idiomasExcluidos as $item)
                                    {{ $item }}
                                @endforeach

                                @foreach ($materiaAtomarhabilitadas as $asignaturas)
                                    @if (!empty($asignaturas) && count($asignaturas) > 0)
                                        @php
                                            $idioma = $asignaturas[0]->nombre_idioma;
                                        @endphp
                                        <tr>

                                            <td>{{ $idioma }}</td>
                                            <td>
                                                <select class="form-select"
                                                    wire:model="idasignatura.{{ $idioma }}">
                                                    <option value="">Elegir...</option>
                                                    @foreach ($asignaturas as $asignatura)
                                                        <option value="{{ $asignatura->id_planificar_asignatura }}">

                                                            {{ $asignatura->turno_paralelo }}
                                                            {{ $asignatura->nombre_paralelo }}
                                                            {{ $asignatura->nombre_nivel_idioma }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                @if (isset($idasignatura[$idioma]) ? $idasignatura[$idioma] : '')
                                                    <button class="btn btn-success"
                                                        wire:click="preinscibir(  {{ isset($idasignatura[$idioma]) ? $idasignatura[$idioma] : '' }})">
                                                        PREINSCRIBIR


                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                @php
                                    $idiomasAgrupados = [];
                                @endphp

                                @foreach ($OtrasAsignaturasHabilitadas as $asignatura)
                                    @php
                                        $idioma = $asignatura->nombre_idioma;
                                        
                                    @endphp


                                    @if (!array_key_exists($idioma, $idiomasAgrupados))
                                        @php
                                            $idiomasAgrupados[$idioma] = [];
                                        @endphp
                                    @endif

                                    @php
                                        
                                        $idiomasAgrupados[$idioma][] = $asignatura;
                                    @endphp
                                @endforeach


                                @foreach ($idiomasAgrupados as $idioma => $asignaturasDelMismoIdioma)
                                    <tr>
                                        <td>{{ $idioma }}</td>
                                        <td>
                                            <select class="form-select"
                                                wire:model="idasignatura.{{ $idioma }}">
                                                <option value="">Elegir...</option>
                                                @foreach ($asignaturasDelMismoIdioma as $asignatura)
                                                    <option value="{{ $asignatura->id_planificar_asignatura }}">
                                                        {{-- {{ $asignatura->siadi_asignatura->nivel_idioma->nombre_nivel_idioma }}
                                                        {{ $asignatura->siadi_asignatura->nombre_asignatura }} -
                                                        {{ $asignatura->siadi_paralelo->nombre_paralelo }} - --}}

                                                        {{ $asignatura->turno_paralelo }}
                                                        {{ $asignatura->nombre_paralelo }}
                                                        {{ $asignatura->nombre_nivel_idioma }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            @if (isset($idasignatura[$idioma]) ? $idasignatura[$idioma] : '')
                                                <button class="btn btn-success"
                                                    wire:click="preinscibir(  {{ isset($idasignatura[$idioma]) ? $idasignatura[$idioma] : '' }})">
                                                    PREINSCRIBIR

                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                {{-- @foreach ($materiasInscritas as $item)
                                    {{$item->id_inscripcion}}
                                @endforeach
                                @foreach ($materiaAtomarhabilitadas as $asignaturas)
                                    @if (!empty($asignaturas) && count($asignaturas) > 0)
                                        @php
                                            $idioma = $asignaturas[0]->siadi_asignatura->idioma;
                                        @endphp
                                        <tr>

                                            <td>{{ $idioma->nombre_idioma }}</td>
                                            <td>
                                                <select class="form-select"
                                                    wire:model="idasignatura.{{ $idioma->nombre_idioma }}">
                                                    <option value="">Elegir...</option>
                                                    @foreach ($asignaturas as $asignatura)
                                                        <option value="{{ $asignatura->id_planificar_asignatura }}">
                                                            {{ $asignatura->siadi_asignatura->nivel_idioma->nombre_nivel_idioma }}
                                                            {{ $asignatura->siadi_asignatura->nombre_asignatura }} -
                                                            {{ $asignatura->siadi_paralelo->nombre_paralelo }} -
                                                            {{ $asignatura->turno_paralelo }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td> <button class="btn btn-success"
                                                    wire:click="preinscibir( {{ isset($idasignatura[$idioma->nombre_idioma]) ? $idasignatura[$idioma->nombre_idioma] : '' }})">
                                                    PREINSCRIBIR
                                                    {{ isset($idasignatura[$idioma->nombre_idioma]) ? $idasignatura[$idioma->nombre_idioma] : '' }}
                                                </button> </td>
                                        </tr>
                                    @endif
                                @endforeach

                                @php
                                    $idiomasAgrupados = [];
                                @endphp

                                @foreach ($OtrasAsignaturasHabilitadas as $asignatura)
                                    @php
                                        $idioma = $asignatura->siadi_asignatura->idioma->nombre_idioma;
                                    @endphp


                                    @if (!array_key_exists($idioma, $idiomasAgrupados))
                                        @php
                                            $idiomasAgrupados[$idioma] = [];
                                        @endphp
                                    @endif

                                    @php
                                        
                                        $idiomasAgrupados[$idioma][] = $asignatura;
                                    @endphp
                                @endforeach


                                @foreach ($idiomasAgrupados as $idioma => $asignaturasDelMismoIdioma)
                                    <tr>
                                        <td>{{ $idioma }}</td>
                                        <td>
                                            <select class="form-select"
                                                wire:model="idasignatura.{{ $idioma }}">
                                                <option value="">Elegir...</option>
                                                @foreach ($asignaturasDelMismoIdioma as $asignatura)
                                                    <option value="{{ $asignatura->id_planificar_asignatura }}">
                                                        {{ $asignatura->siadi_asignatura->nivel_idioma->nombre_nivel_idioma }}
                                                        {{ $asignatura->siadi_asignatura->nombre_asignatura }} -
                                                        {{ $asignatura->siadi_paralelo->nombre_paralelo }} -
                                                        {{ $asignatura->turno_paralelo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td> <button class="btn btn-success"
                                                wire:click="preinscibir(  {{ isset($idasignatura[$idioma]) ? $idasignatura[$idioma] : '' }})">
                                                PREINSCRIBIR
                                                {{ isset($idasignatura[$idioma]) ? $idasignatura[$idioma] : '' }}
                                            </button> </td>
                                    </tr>
                                @endforeach




                                @php
                                    $idiomasAgrupadosglobal = [];
                                @endphp

                                @foreach ($materiaAtomarhabilitadasGlobal as $asignatura)
                                    @php
                                        $idioma = $asignatura->siadi_asignatura->idioma->nombre_idioma;
                                    @endphp


                                    @if (!array_key_exists($idioma, $idiomasAgrupados))
                                        @php
                                            $idiomasAgrupadosglobal[$idioma] = [];
                                        @endphp
                                    @endif

                                    @php
                                        
                                        $idiomasAgrupadosglobal[$idioma][] = $asignatura;
                                    @endphp
                                @endforeach


                                @foreach ($idiomasAgrupadosglobal as $idioma => $asignaturasDelMismoIdioma)
                                    <tr>
                                        <td>{{ $idioma }}</td>
                                        <td>
                                            <select class="form-select"
                                                wire:model="idasignatura.{{ $idioma }}">
                                                <option value="">Elegir...</option>
                                                @foreach ($asignaturasDelMismoIdioma as $asignatura)
                                                    <option value="{{ $asignatura->id_planificar_asignatura }}">
                                                        {{ $asignatura->siadi_asignatura->nivel_idioma->nombre_nivel_idioma }}
                                                        {{ $asignatura->siadi_asignatura->nombre_asignatura }} -
                                                        {{ $asignatura->siadi_paralelo->nombre_paralelo }} -
                                                        {{ $asignatura->turno_paralelo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td> <button class="btn btn-success"
                                                wire:click="preinscibir(  {{ isset($idasignatura[$idioma]) ? $idasignatura[$idioma] : '' }})">
                                                PREINSCRIBIR
                                                {{ isset($idasignatura[$idioma]) ? $idasignatura[$idioma] : '' }}
                                            </button> </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    @else
                        Nota. Realiza la busqueda del estudiante por su carnet de identidad para ver las materias
                        disponibles para su preinscripción.

                    @endif
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"
                            wire:click="cancelar">CANCELAR</button>
                        <button wire:click="guardar_inscripcion_estudiante"
                            class="btn btn-primary waves-effect waves-light">GUARDAR
                            DATOS</button>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
        </div>
    </div>
    @push('navi-js')
        @push('navi-js')
            <script>
                document.addEventListener('livewire:load', function() {
                    Livewire.on('abrimodalinscripcion', function() {
                        $('#inscribirestudiantemodal').modal('show');
                    });
                });
                document.addEventListener('livewire:load', function() {
                    Livewire.on('abrimodaleditarinscripcion', function() {
                        $('#editar_inscripcion').modal('show');
                    });
                });
            </script>
            <script>
                document.addEventListener('livewire:load', function() {
                    Livewire.on('cerrarmodalinscripcion', function() {
                        $('#inscribirestudiantemodal').modal('hide');
                    });
                });
            </script>
        @endpush
        <script>
            livewire.on('inscribirestudiante', id_preinscripcion => {
                Swal.fire({
                    title: 'Esta seguro de inscribir al Estudiante?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, inscribir a las materias!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        // livewire.emitTo('servidor-index', 'delete', ServidorId);
                        livewire.emit('inscripbir', id_preinscripcion);


                    }
                })
            });
        </script>
    @endpush
