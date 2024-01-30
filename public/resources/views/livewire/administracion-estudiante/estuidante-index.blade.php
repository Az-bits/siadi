<div>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">ADMINISTRACIÓN ESTUDIANTE</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active"> Estudiante</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if ($materiasInscritas > 0)

                        <div class="row">
                            <div class="text-center">
                                <h4>RECORD ACADÉMICO</h4>
                            </div>

                            <div class="col-4">

                                <br>
                                <button class="btn btn-success"
                                    wire:click="imprimir_record({{ $persona_auth->id_persona_siadi }})">IMPRIMIR RECORD
                                    <i class="bx bx-printer"></i></button>
                            </div>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>IDIOMA</th>
                                        <th>PARALELO</th>
                                        <th>NOTA</th>
                                        <th> ESTADO</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($materiasInscritas as $materia)
                                        <tr>
                                            <td>{{ $materia->nombre_idioma }} {{ $materia->nombre_nivel_idioma }}</td>
                                            <td> {{ $materia->nombre_paralelo }} {{ $materia->turno_paralelo }}</td>
                                            <td>
                                                {{ $materia->final_nota }}
                                            </td>
                                            <td>{{ $materia->observacion_nota }}</td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>
                    @else
                        SIN MATERIA INSCRITAS

                    @endif


                    <div class="text-center">
                        <h4>PREINSCRIPCIÓN</h4>
                    </div>
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
                                <input type="text" class="form-control" placeholder="Ingrese el numero de deposito"
                                    wire:model="numero_deposito">
                            </div>
                            @error('numero_deposito')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        @endif
                        @if ($tipopago == 'Depósito')
                            <div class="col-md-6">
                                <label for="" class="form-labe"> MONTO DE DEPOSITO</label>
                                <input type="text" class="form-control" placeholder="Ingrese el numero de deposito"
                                    wire:model="monto">
                            </div>
                            @error('monto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        @endif
                        @if ($tipopago == 'Depósito')
                            <div class="col-md-6">
                                <label for="" class="form-labe"> FECHA DE DEPOSITO</label>
                                <input type="date" class="form-control" placeholder="Ingrese el numero de deposito"
                                    wire:model="fecha_deposito">
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
                            {{-- ayamara: {{ $materiaActualAymara }} - ingles:
                            {{ $materiaActualIngles }} asignaturassssssssssssssssssss
                            @foreach ($materiasaprobadas as $materias)
                                {{ $materias->id_inscripcion }}
                            @endforeach
                            saadadsada --}}
                            {{-- @foreach ($idiomasExcluidos as $item)
                                {{ $item }}
                            @endforeach --}}

                            @foreach ($materiaAtomarhabilitadas as $asignaturas)
                                @if (!empty($asignaturas) && count($asignaturas) > 0)
                                    @php
                                        $idioma = $asignaturas[0]->nombre_idioma;
                                    @endphp
                                    <tr>

                                        <td>{{ $idioma }}</td>
                                        <td>
                                            <select class="form-select" wire:model="idasignatura.{{ $idioma }}">
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
                                                    wire:click="preinscibir({{ isset($idasignatura[$idioma]) ? $idasignatura[$idioma] : '' }},{{ Auth::user()->id_persona_siadi }})">
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
                                        <select class="form-select" wire:model="idasignatura.{{ $idioma }}">
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
                                                wire:click="preinscibir(  {{ isset($idasignatura[$idioma]) ? $idasignatura[$idioma] : '' }},{{ Auth::user()->id_persona_siadi }})">
                                                PREINSCRIBIR

                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>
</div>
