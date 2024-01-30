@push('style-custom.css')
    <style type="text/css">
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="number"]{
            -moz-appearance: textfield;
        }
    </style>
@endpush
<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18"> {{is_null($asignatura)? '': $asignatura->siadi_asignatura->idioma->nombre_idioma .' '. $asignatura->siadi_asignatura->nivel_idioma->descripcion_nivel_idioma. ' '. $asignatura->siadi_asignatura->nivel_idioma->nombre_nivel_idioma }} </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('docente_materias.index') }}">Materias</a></li>
                        <li class="breadcrumb-item active"> {{is_null($asignatura)? '': $asignatura->siadi_asignatura->idioma->nombre_idioma .' '. $asignatura->siadi_asignatura->nivel_idioma->descripcion_nivel_idioma. ' '. $asignatura->siadi_asignatura->nivel_idioma->nombre_nivel_idioma }} </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    {{-- CONTENIDO --}}
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <i class="bx bxs-calendar-check"></i> <b>GESTIÓNs:</b> {{ $asignatura->siadi_convocatoria->periodo }}-{{ $asignatura->siadi_convocatoria->gestion->nombre_gestion }} <br>
                            <i class="bx bxs-home"></i> <b>SEDE: </b> {{ $asignatura->siadi_convocatoria->sede }} <br>
                            <i class="bx bxs-bookmark"></i> <b>MODALIDAD:</b> {{$asignatura->siadi_convocatoria->modalidad->nombre_convocatoria_estudiante}} {{$asignatura->siadi_convocatoria->id_modalidad_curso==1? ' ('. $asignatura->siadi_convocatoria->convocatoria_costo->tipo_costo .')': ''}}<br>
                            <i class="bx bxs-collection"></i> <b>PARALELO: </b> {{ $asignatura->siadi_paralelo->nombre_paralelo }} <br>
                            <i class="bx bxs-sun"></i> <b>TURNO Y HORARIO: </b> {{ $asignatura->turno_paralelo }} <br>
                            <i class="bx bxs-user-detail"></i> <b>DOCENTE:</b> @if(is_null($asignatura->id_asignacion_docente))
                                                                                    <span class="text-danger">Sin docente asignado</span>
                                                                                @else
                                                                                    @php $estado_nom = ( !is_null($asignatura->siadi_nombramiento) && $asignatura->siadi_persona_asignada_docente->id == $asignatura->siadi_nombramiento->id_persona) @endphp
                                                                                    {{-- @if(!is_null($nombramiento)) <span class="text-secondary">{{ mb_strtoupper($nombramiento->grado_nombramiento) }}</span> @endif
                                                                                    {{ $asignatura->siadi_persona_asignada_docente->nombre .' '.$asignatura->siadi_persona_asignada_docente->paterno .' '. $asignatura->siadi_persona_asignada_docente->materno }}
                                                                                    @if(!is_null($nombramiento)) <br> <small title="Nombramiento Docente">{{$nombramiento->item_nombramiento}}</small> @endif--}}
                                                                                    @if($estado_nom) <span class="text-secondary">{{ $asignatura->siadi_nombramiento->grado_nombramiento}} </span> @endif
                                                                                    {{ $asignatura->siadi_persona_asignada_docente->nombre .' '.$asignatura->siadi_persona_asignada_docente->paterno .' '. $asignatura->siadi_persona_asignada_docente->materno }}
                                                                                    @if($estado_nom) <br> <i class="bx bxs-user-detail"></i> <b>NOMBRAMIENTO: </b><small title="Nombramiento Docente">{{$asignatura->siadi_nombramiento->item_nombramiento}}</small> @endif 
                                                                                @endif <br>
                            <i class="bx bxs-user"></i> <b>TOTAL ESTUDIANTES: </b> {{ count($inscritos) }} <br>  {{-- ->total() --}}
                        </div>
                        <div class="col-md-5 " style="background: #e1e3e6;"> <!-- bg-soft-info -->
                            <h5 class="text-center">INFORMACIÓN DE NOTAS</h5>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr align="center">
                                        <th><b>ESTADO</b></th>
                                        <th><b>DETALLE</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="badge bg-soft-secondary">______</span><b> INSCRITO</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-soft-success text-success">______</span><b> APROBADO</b></td>
                                        <td>Notas entre 51 y 100.</td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-soft-danger text-danger">______</span><b> REPROBADO</b></td>
                                        <td>Notas entre 1 y 50.</td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge bg-white text-white">______</span><b> NO SE PRESENTÓ</b></td>
                                        <td>Nota de 0.</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-1">
                            @php $fecha_actual = \Carbon\Carbon::now(); @endphp
                            {{-- <p>Editar {{ (!is_null($asignatura->fecha_limite_subir_nota) && $asignatura->fecha_limite_subir_nota!=="" && $fecha_actual <= \Carbon\Carbon::parse($asignatura->fecha_limite_subir_nota .' 23:59:59') )}}</p>
                            <p>Actual {{$fecha_actual}}</p>
                            <p>Hasta {{$asignatura->fecha_limite_subir_nota}}</p> --}}
                            @if(!is_null($asignatura->fecha_limite_subir_nota) && $asignatura->fecha_limite_subir_nota!=="" && $fecha_actual <= \Carbon\Carbon::parse($asignatura->fecha_limite_subir_nota .' 23:59:59') ) {{-- && $asignatura->estado_planificar_asignartura=='ACTIVO' --}}
                                @if(count($inscritos)>0)
                                    @if($edicion)
                                        <button type="button" class=" btn btn-outline-success waves-effect waves-light" 
                                            wire:click.prevent="$emit('confirmarEdicionNotas')"><i class="bx bxs-save fs-5"></i> GUARDAR</button>
                                        <button type="button" class=" btn btn-outline-danger waves-effect waves-light" 
                                            wire:click.prevent="$emit('cancelarEdicionNotas')"><i class="bx bxs-x-square fs-5"></i> CANCELAR</button>
                                    @else
                                        <button type="button" class=" btn btn-outline-warning waves-effect waves-light" 
                                            wire:click.prevent="$emit('habilitarEdicion')"><i class="bx bxs-pencil fs-5"></i> EDITAR</button>
                                        {{-- <button wire:click="tabla"> fdsf</button> --}}
                                    @endif
                                @endif
                            @else 
                                <p class="text-danger">Edición de notas cerrada</p>
                            @endif
                            {{-- 
                            <label for="edicion" class="d-block mb-0 user-select-none">Edición de Notas</label>
                            <input type="checkbox" id="edicion" switch="bool" {{$edicion==true? "checked": ""}} wire:model="edicion" wire:click.prevent="$emit('{{ $edicion==true? 'confirmarEdicionNotas': 'habilitarEdicion' }}')">
                            <label class="form-label" for="edicion" data-on-label="Si" data-off-label="No"></label> --}}
                        </div>
                    </div>

                    <div class="mb-3 row g-3 button-items">
                        @if(count($asignatura->inscripcipciones)>0)
                            @can('planificar_asignatura.acta_calificaciones')
                                <a class="col-md-3 btn btn-outline-danger waves-effect waves-light " target="_blank" href="{{ route('docente.materias.pdf.acta_calificaciones', ['id_planificar_asignatura' => base64_encode(str_pad($asignatura->id_planificar_asignatura, 15, '0', STR_PAD_LEFT))]) }}">
                                    <i class="bx bxs-file-pdf fs-4"></i> ACTA DE CALIFICACIONES
                                </a>
                            @endcan
                            
                            <a class="col-md-3 btn btn-outline-success waves-effect waves-light " target="_blank" href="{{ route('reporte_planificar_asignatura_csv', ['id_planificar_asignatura' => base64_encode(str_pad($asignatura->id_planificar_asignatura, 15, '0', STR_PAD_LEFT))]) }}">
                                <i class="bx bxs-file fs-4"></i> LISTA DE ESTUDIANTES CSV
                            </a>
                        @endif
                        {{-- @if(count($asignatura->inscripcipciones)>0)
                            @php
                                $estado_certificado = false;
                                foreach($asignatura->inscripcipciones as $inscrip){
                                    # echo "<li>". $inscrip->notas->final_nota. " , ". $inscrip->notas->certificados ."</li>";
                                    if(!is_null($inscrip->notas->certificados)){
                                        $estado_certificado = true;
                                        break;
                                    }
                                }
                            @endphp
                            @if($estado_certificado)
                            <a class="col-md-3 btn btn-outline-info waves-effect waves-light" target="_blank" href="{{ route('certificado_asignatura', ['id_planificar_asgnatura' => $asignatura->id_planificar_asignatura ]) }}">
                                <i class="bx bxs-file-pdf fs-4"></i> CERTIFICADOS
                            </a>
                            @endif
                        @endif --}}
                    </div>
                    
                    <div class="table-responsive">
                        @if(count($inscritos)>0)
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>CI </th>
                                    <th>PATERNO</th>
                                    <th>MATERNO</th>
                                    <th>NOMBRES</th>
                                    <th>NOTA FINAL</th>
                                    <th>RESULTADO</th>
                                    <th>OBSERVACIÓN</th>
                                    {{-- <th>USUARIO</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                @foreach ($inscritos as $index => $inscripcion)
                                    @php
                                        $bg_color = '';
                                        if($inscripcion->observaciones_detalle=='INSCRITO'){
                                            $bg_color = 'bg-soft-secondary';
                                        } else if($inscripcion->final_nota >= 51){
                                            $bg_color = 'bg-soft-success';
                                        } else if($inscripcion->final_nota > 0){
                                            $bg_color = 'bg-soft-danger';
                                        }
                                    @endphp
                                    <tr class="{{ $bg_color }}" >
                                        <th>{{ $cont++ }}</th>
                                        <td>{{ $inscripcion->ci_persona }} {{ $inscripcion->expedido_persona }}</td>
                                        <td>{{ $inscripcion->paterno_persona }}</td>
                                        <td>{{ $inscripcion->materno_persona }}</td>
                                        <td>{{ $inscripcion->nombres_persona }}</td>
                                        @if($edicion)
                                            <td>
                                                @if($observacion_notas[$index]!=='BAJA')
                                                    <input wire:model="final_notas.{{ $index }}" type="number" class="form-control notas-finales @if(strval($inscripcion->final_nota)!==strval($final_notas[$index])) border-info @endif @error('final_notas.'. $index) border-danger @enderror" value="{{$final_notas[$index]}}" min="0" max="100">
                                                    @error("final_notas.". $index)
                                                        <span class="text-danger fs-6">{{ $message }}</span>
                                                    @enderror
                                                @else
                                                    <span class="form-control border-warning" title="No se puede editar las BAJAS">{{$final_notas[$index]}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <label class="form-control @if($observacion_notas[$index]!== $inscripcion->observacion_nota) border-info @endif " >
                                                    {{$observacion_notas[$index] }} 
                                                </label>
                                                @error("observacion_notas.". $index)
                                                    <span class="text-danger fs-6">{{ $message }}</span>
                                                @enderror
                                            </td>
                                        @else
                                            <td>{{ $inscripcion->final_nota }}</td>
                                            <td>{{ $inscripcion->observacion_nota }}</td>
                                        @endif
                                        <td>{{ $inscripcion->observaciones_detalle }}</td>
                                        {{-- <td>{{ $inscripcion->name }} {{ $inscripcion->paterno }} {{ $inscripcion->materno }}</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <p><b>NO HAY ESTUDIANTES INSCRITOS</b></p>
                        @endif
                    </div>
                </div>
            <div>
        </div>


    </div>

    @push('navi-js')
        <script>
            livewire.on('habilitarEdicion', () => {
                Swal.fire({
                    title: 'Esta seguro de habilitar la edición de notas ?',
                    //text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        livewire.emit('edicion_notas');
                    }
                })
            });

            livewire.on('confirmarEdicionNotas', () => {
                Swal.fire({
                    title: 'Esta seguro de actualizar las notas ?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, estoy seguro!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        livewire.emit('guardar_notas');
                    }
                })
            });

            livewire.on('cancelarEdicionNotas', () => {
                Swal.fire({
                    title: 'Esta seguro de cancelar edición ?',
                    text: "¡No podrás revertir esto!",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, estoy seguro!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        livewire.emit('cancelar_edicion');
                    }
                })
            });

            livewire.on('Mostrar', (mensaje) => {
                console.log(mensaje);
            });
        </script>
    @endpush
</div>
