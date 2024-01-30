
<div>
    @push('style-custom.css')
        <!-- hide arrow input:number -->
    <style type="text/css">
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input#nota_final {
            -moz-appearance: textfield;
        }
    </style>
    @endpush
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">MIGRAR</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Migrar</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <!-- ------------ inicio contenedor principal ------------ -->
	<div class="row">

        
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <!-- ============== inicio header selects ============= -->
                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="gestion" class="form-label">Gestión</label>
                            <select id="gestion" class="form-select" wire:model="gestion" wire:change="on_change_gestion">
                                <option value="">Seleccione</option>
                                @foreach ($gestiones as $gestion)
                                    <option value="{{ $gestion->id_gestion }}">{{ $gestion->nombre_gestion }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            @if($statusPeriodo)
                            <label for="periodo" class="form-label">Periodo</label>
                            <select id="periodo" class="form-select" wire:model="periodo" wire:change="on_change_periodo">
                                <option value="">Seleccione</option>
                                @foreach ($periodos as $perio)
                                    <option value="{{ $perio->periodo }}">{{ $perio->periodo }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>

                        <div class="col-md-5">
                            @if($statusTipoConvocatoria)
                            <label for="tipo_convocatoria" class="form-label">Sede - Tipo Convocatoria</label>
                            <select id="tipo_convocatoria" class="form-select" wire:model="tipo_convocatoria" wire:change="on_change_tipo_convocatoria">
                                <option value="">Seleccione</option>
                                @foreach($convocatorias as $convocatory)
                                    <option value="{{$convocatory->id_siadi_convocatoria. ';'. $convocatory->sede}}">{{$convocatory->tipo_convocatoria->convocatoria_estudiante->nombre_convocatoria_estudiante}} .:: {{$convocatory->sede}}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>


                    </div>
                    <!-- =============== fin header selects ============= -->

                    <br>
                    
                    <!-- ============== inicio content ============= -->
                    <div class="row g-3">
                        
                        @if($statusTipoConvocatoria==true && $tipo_convocatoria !== "")
                            @if(count($asignaturas)>0)
                                @php
                                    $estilo_paralelo = [
                                        "Mañana" => ["icono" => "bxs-sun", "color" => "text-primary"],
                                        "Tarde" => ["icono" => "bxs-sun", "color" => "text-warning"],
                                        "Noche" => ["icono" => "bxs-moon", "color" => ""]
                                    ]; 
                                    $contador = 1;
                                @endphp
                                @foreach($asignaturas as $asignatura)
                                    <div class="col-xl-3 col-sm-6 col-12"> 
                                        <div class="card bg-soft-secondary ">
                                            <div class="card-title text-center bg-primary bg-gradient text-white">
                                                <div class="float-start  bg-danger">{{str_pad($contador++, 2, "0", STR_PAD_LEFT)}}</div>
                                                <h3>{{$asignatura->idioma->nombre_idioma}} {{$asignatura->nivel_idioma->descripcion_nivel_idioma}} {{$asignatura->nivel_idioma->nombre_nivel_idioma}}</h3>
                                            </div>
                                            <div class="card-content bg-light">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="align-self-center">
                                                            <h3>Paralelos</h3>
                                                                @php $contador_estudiantes = 0; @endphp
                                                                @foreach($asignatura->siadi_asignatura_planificar as $planificar_asing)
                                                                    @if($planificar_asing->id_siadi_convocatoria==$id_convocatoria && $planificar_asing->estado_planificar_asignartura!=='ELIMINAR')
                                                                        <i class="bx fs-4 {{$estilo_paralelo[$planificar_asing->turno_paralelo]['icono']}} {{$estilo_paralelo[$planificar_asing->turno_paralelo]['color']}}" title="Turno: {{$planificar_asing->turno_paralelo}}"></i> Paralelo {{$planificar_asing->siadi_paralelo->nombre_paralelo}} <br>
                                                                        @foreach($planificar_asing->inscripcipciones as $ins)
                                                                            @if($planificar_asing->id_planificar_asignatura == $ins->id_planificar_asignatura && $ins->estado_inscripcion!=='ELIMINAR')
                                                                                @php $contador_estudiantes++; @endphp
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                        </div>
                                                        <div class="text-right">
                                                            <h3><i class="bx bxs-user text-primary fs-3"></i> {{$contador_estudiantes}}</h3>
                                                            <span>Estudiantes <br> Inscritos</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-white d-flex justify-content-evenly border border-top-0 border-soft-info">
                                                <button class="btn btn-outline-primary waves-effect waves-light font-weight-bold" wire:click="show_asignatura({{$asignatura->id_siadi_asignatura}})">VERIFICAR ESTUDIANTE {{$asignatura->id_siadi_asignatura}}</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else 
                                <p>No hay Registros</p>
                            @endif
                        @endif

                        <hr>
                        <ul>
                            @foreach ($convocatorias as $convocat)
                                <li>{{$convocat->id_gestion}}, {{$convocat->gestion->nombre_gestion}} || {{$convocat->sede}}, {{$convocat->id_siadi_convocatoria}} >> {{$convocat->tipo_convocatoria->convocatoria_estudiante->nombre_convocatoria_estudiante}}</li>
                            @endforeach 
                            <p>{{$id_convocatoria}}</p>
                        </ul>
                        
                    </div>
                    <!-- =============== fin content ============== -->
                </div>
                <!-- -------- end card-body ----------- -->

                <!-- *********************** modales ***************** -->
                
                <!-- ***************** inicio modal buscar_persona ************* -->
                <div wire:ignore.self id="verificarInscripcionCI" class="modal fade" tabindex="-1" role="dialog"
                     aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-lg"> <!-- modal-lg -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" >VERIFICAR INSCRIPCIÓN {{ is_null($this->asignatura_actual)? '': '.:: '. $this->asignatura_actual->idioma->nombre_idioma .' '. $this->asignatura_actual->nivel_idioma->descripcion_nivel_idioma .' '.  $this->asignatura_actual->nivel_idioma->nombre_nivel_idioma}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        wire:click="close_asignatura"></button>
                                </div>
                                <div class="modal-body">
                                    @if( !is_null($this->asignatura_actual) )
                                        <div class="row">
                                            <div class="mb-3 col-lg-1 d-flex align-items-center justifify-content-center">
                                                <label class="d-block form-label" for="ci_buscar">CI: </label>
                                            </div>
                                            <div class="mb-3 col-lg-4">
                                                <input type="text" id="ci_buscar"  wire:model="ci_buscar" maxlength="15"
                                                    class="form-control" value="{{$ci_buscar}}" />
                                                @error('ci_buscar') 
                                                    <span class="error">{{ $message }}</span> 
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-lg-7">
                                                
                                                @if(is_null($estudiante_buscar_existe_local) && strlen($ci_buscar)>=3)
                                                    <button type="button" class="btn btn-outline-primary" wire:click="mostrar_form_registrar_persona">Registrar</button>
                                                @elseif(strlen($ci_buscar)>=3 && !is_null($estudiante_buscar_existe_local))
                                                    <h5 class="text-success">DATOS ESTUDIANTE</h5> 
                                                    <i class="bx bxs-user-detail"></i> <b>CI<span class="text-danger">:</span></b> {{$estudiante_buscar_existe_local->ci_persona. ' '. $estudiante_buscar_existe_local->expedido_persona }} </br>
                                                    <i class="bx bxs-user"></i> <b>Nombre Completo<span class="text-danger">:</span></b> {{$estudiante_buscar_existe_local->paterno_persona .' '. $estudiante_buscar_existe_local->materno_persona .' '. $estudiante_buscar_existe_local->nombres_persona}} </br>
                                                    <i class="bx bxs-calendar-plus"></i> <b>Fecha Nacimiento<span class="text-danger">:</span></b> {{\Carbon\Carbon::parse($estudiante_buscar_existe_local->fecha_nacimiento_persona)->locale('es')->isoFormat('DD \d\e MMMM \d\e YYYY')}} <br>
                                                    <i class="bx bxs-map-alt"></i> <b>País<span class="text-danger">:</span></b> {{$estudiante_buscar_existe_local->pais_persona}}
                                                @endif
                                            </div>
                                        </div>
                                        
                                        @if(strlen($ci_buscar)>=3)
                                            <div>
                                                @if(!is_null($estudiante_buscar_esta_inscrito))
                                                    <span class="text-success">El estudiante se encuentra registrado</span>
                                                @else
                                                    <span class="text-danger">El estudiante no está registrado en la asignatura</span>
                                                @endif
                                            </div>
                                        @endif

                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h3 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Información de la Asignatura
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionDataAsignatura">
                                                    <div class="accordion-body">
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <b>Paralelo</b>
                                                            </div>
                                                            <div class="col-7 text-center"><b>Cupos</b></div>
                                                        </div>
                                                        @foreach($asignatura_actual->siadi_asignatura_planificar as $planificar_actual_asignatura)
                                                            @if($planificar_actual_asignatura->id_siadi_convocatoria==$id_convocatoria && $planificar_actual_asignatura->estado_planificar_asignartura!=='ELIMINAR')
                                                                <div class="row">
                                                                    <div class="col-2 border-2 border-bottom d-flex align-items-center justify-content-center">
                                                                        <b class="d-block">{{$planificar_actual_asignatura->siadi_paralelo->nombre_paralelo}}</b>
                                                                    </div>
                                                                    <div class="col-7 border-2 border-bottom">
                                                                        @php $contador_estudiantes_asignatura = 0; @endphp
                                                                        @foreach($planificar_actual_asignatura->inscripcipciones as $inscrip_estudiante)
                                                                            @if($planificar_actual_asignatura->id_planificar_asignatura == $inscrip_estudiante->id_planificar_asignatura && $inscrip_estudiante->estado_inscripcion!=='ELIMINAR')
                                                                                @php $contador_estudiantes_asignatura++; @endphp
                                                                            @endif
                                                                        @endforeach
                                                                        @php $porcentaje_plan_asign = round( ($contador_estudiantes_asignatura / $planificar_actual_asignatura->cupo_maximo_paralelo)*100, 2, PHP_ROUND_HALF_EVEN); @endphp
                                                                        <span class="text-white bg-success rounded-2 small">{{$contador_estudiantes_asignatura}}/{{$planificar_actual_asignatura->cupo_maximo_paralelo}}</span> estudiantes inscritos
                                                                        <div class="progress mb-4 bg-soft-secondary" style="height: 15px;">
                                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?=$porcentaje_plan_asign?>%" aria-valuenow="{{$porcentaje_plan_asign}}" aria-valuemin="0" aria-valuemax="100">{{$porcentaje_plan_asign}}%</div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="col-3 border-2 border-bottom">
                                                                        @if($planificar_actual_asignatura->cupo_maximo_paralelo!==0 && $contador_estudiantes < $planificar_actual_asignatura->cupo_maximo_paralelo && !is_null($estudiante_buscar_existe_local) && is_null($estudiante_buscar_esta_inscrito))
                                                                            <button type="button" class="btn btn-outline-success" wire:click="mostrar_form_inscribir({{$planificar_actual_asignatura->id_planificar_asignatura}})">Inscribir</button>
                                                                        @else 
                                                                            @php 
                                                                                $texto = 'No disponible';
                                                                                if (strlen($ci_buscar)>=3){
                                                                                    if( $planificar_actual_asignatura->cupo_maximo_paralelo==0 || $contador_estudiantes >= $planificar_actual_asignatura->cupo_maximo_paralelo ){
                                                                                        $texto = 'Sin cupos disponibles';
                                                                                    } else if( is_null($estudiante_buscar_existe_local) ) {
                                                                                        $texto = 'No existe estudiante';
                                                                                    } else if( !is_null($estudiante_buscar_esta_inscrito) ) {
                                                                                        foreach($estudiante_buscar_esta_inscrito->persona_inscrita as $persona_inscripcion){
                                                                                            if($persona_inscripcion->estado_inscripcion!=='ELIMINAR' && $persona_inscripcion->id_planificar_asignatura==$planificar_actual_asignatura->id_planificar_asignatura){
                                                                                                $texto = "Inscrito";
                                                                                                break;
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                                
                                                                            @endphp
                                                                            <div class="btn {{$texto=='Inscrito'? 'btn-dark': 'btn-secondary'}}">{{$texto}}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endif
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"
                                        wire:click="close_asignatura">CANCELAR</button>
                                </div>
                            </div> <!-- end modal-content -->
                            
                        </div>
                </div>
                <!-- ***************** fin modal buscar_persona ************* -->


                <!-- ***************** inicio modal registrar estudiante ************* -->
                <div wire:ignore.self id="agregarPersona" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabelTitle" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content modal-lg">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myModalLabelTitle">AGREGAR PERSONA</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    wire:click="close_agregar_persona"></button>
                            </div>
                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="mb-6">
                                            <label class="form-label">CI:</label>
                                            <input type="text" class="form-control @if($errors->has('ci')) border-danger @endif" wire:model="ci" disabled>
                                            @error('ci')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-6">
                                            <label class="form-label" for="expedido">EXPEDIDO:</label>
                                            <select class="form-control @if($errors->has('expedido')) border-danger @endif" wire:model="expedido" id="expedido">
                                                <option value="">Seleccione</option>
                                                @foreach($expedido_data as $exped)
                                                    <option value="{{$exped}}">{{$exped}}</option>
                                                @endforeach
                                            </select>
                                            <!-- <input type="text" class="form-control @if($errors->has('expedido')) border-danger @endif" wire:model="expedido"> -->
                                            @error('expedido')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-6">
                                            <label class="form-label" for="estado_civil">ESTADO CIVIL:</label>
                                            <input type="text" class="form-control @if($errors->has('estado_civil')) border-danger @endif" wire:model="estado_civil" id="estado_civil">
                                            @error('estado_civil')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-6">
                                            <label class="form-label" for="nombre">NOMBRE:</label>
                                            <input type="text" class="form-control @if($errors->has('nombre')) border-danger @endif" wire:model="nombre" id="nombre">
                                            @error('nombre')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-6">
                                            <label class="form-label" for="paterno">PATERNO:</label>
                                            <input type="text" class="form-control @if($errors->has('paterno')) border-danger @endif" wire:model="paterno" id="paterno">
                                            @error('paterno')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-6">
                                            <label class="form-label" for="materno">MATERNO:</label>
                                            <input type="text" class="form-control @if($errors->has('materno')) border-danger @endif" wire:model="materno" id="materno">
                                            @error('materno')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-6">
                                            <label class="form-label" for="pais">PAIS:</label>
                                            
                                            <select class="form-control @if($errors->has('pais')) border-danger @endif" wire:model="pais" id="pais">        	
												<option value="">Seleccione país</option>
												@foreach($paises as $pais_indice => $pais_value)
													<option value="{{$pais_indice}}">{{$pais_indice}}</option>
												@endforeach
                                            </select>
                                            @error('pais')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-6">
                                            <label class="form-label" for="genero">GENERO:</label>
                                            <select class="form-select @if($errors->has('genero')) border-danger @endif" wire:model="genero" id="genero">
                                                <option value="M">MASCULINO</option>
                                                <option value="F">FEMENINO</option>
                                            </select>
                                            @error('genero')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-6">
                                            <label class="form-label" for="fecha_nacimiento">FECHA DE NACIMIENTO:</label>
                                            <input type="date" class="form-control @if($errors->has('fecha_nacimiento')) border-danger @endif" wire:model="fecha_nacimiento" id="fecha_nacimiento">
                                            @error('fecha_nacimiento')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-6">
                                            <label class="form-label" for="profesion">PROFESION:</label>
                                            <input type="text" class="form-control @if($errors->has('profesion')) border-danger @endif" wire:model="profesion" id="profesion">
                                            @error('profesion')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-6">
                                            <label class="form-label" for="direccion">DIRECCION:</label>
                                            <input type="text" class="form-control @if($errors->has('direccion')) border-danger @endif" wire:model="direccion" id="direccion">
                                            @error('direccion')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-6">
                                            <label class="form-label" for="telefono">TELEFONO:</label>
                                            <input type="text" class="form-control @if($errors->has('telefono')) border-danger @endif" wire:model="telefono" id="telefono">
                                            @error('telefono')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-6">
                                            <label class="form-label" for="celular">CELULAR:</label>
                                            <input type="text" class="form-control @if($errors->has('celular')) border-danger @endif" wire:model="celular" id="celular">
                                            @error('celular')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-6">
                                            <label class="form-label" for="email">EMAIL:</label>
                                            <input type="text" class="form-control @if($errors->has('email')) border-danger @endif" wire:model="email" id="email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-6">
                                            <label class="form-label" for="tipo_estudiante">TIPO ESTUDIANTE:</label>
                                            <select wire:model="tipo_estudiante" class="form-select @if($errors->has('tipo_estudiante')) border-danger @endif" id="tipo_estudiante">
                                                <option value=''>Seleccionar ...</option>
                                                @foreach ($tipo_estudiante2 as $tipo_e)
                                                    <option value="{{ $tipo_e->id_tipo_estudiante }}">
                                                        {{ $tipo_e->nombre_tipo_estudiante }}</option>
                                                @endforeach
                                            </select>
                                            @error('tipo_estudiante')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-danger waves-effect" 
                                        wire:click="close_agregar_persona">CANCELAR</button> <!-- data-bs-dismiss="modal" -->
                                <button class="btn btn-primary waves-effect waves-light"
                                    wire:click="guardar_persona_migracion">GUARDAR PERSONA</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- END = modal-dialog modal-lg -->
                </div>
                <!-- ****************** fin modal registra estudiante ************** -->


                <!-- ***************** inicio modal registrar inscripcion migracion ************* -->
                <div wire:ignore.self id="agregarInscripcionMigracion" class="modal" data-easein="expandIn" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabelTitle" aria-hidden="true" data-bs-backdrop="static">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content modal-lg">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" >INSCRIPCION MIGRACION</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    wire:click="close_form_inscribir"></button>
                            </div>
                            <div class="modal-body">
                                @if(!is_null($dataPlanificarAsignaturaForm) && !is_null($estudiante_buscar_existe_local) && strlen($ci_buscar)>=3)
                                    <div class="row bg-soft-secondary rounded-1">
                                        <div class="mb-1 col-md-12"><h5 class="text-center text-primary pt-1">DATOS INSCRIPCIÓN</h5></div>
                                        <div class="mb-3 col-md-5">
                                            <label class="form-label" >ESTUDIANTE</label>
                                            <label class="form-control">{{$estudiante_buscar_existe_local->paterno_persona .' '. $estudiante_buscar_existe_local->materno_persona .' '. $estudiante_buscar_existe_local->nombres_persona}} ({{$estudiante_buscar_existe_local->ci_persona. ' '. $estudiante_buscar_existe_local->expedido_persona }})</label>
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label" >ASIGNATURA</label>
                                            <label class="form-control">{{$dataPlanificarAsignaturaForm->siadi_asignatura->idioma->nombre_idioma}} {{$dataPlanificarAsignaturaForm->siadi_asignatura->nivel_idioma->descripcion_nivel_idioma}} {{$dataPlanificarAsignaturaForm->siadi_asignatura->nivel_idioma->nombre_nivel_idioma}}</label>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label class="form-label" >OBSERVACION</label>
                                            <label class="form-control">MIGRACION</label>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="mb-1 col-md-12"><h5 class="text-center text-primary pt-1">NOTAS</h5></div>
                                        <div class="mb-4 col-md-3">
                                            <label class="form-label" for="nota_final">NOTA FINAL</label>
                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                <span class="input-group-btn input-group-prepend">
                                                    <button class="btn btn-primary bootstrap-touchspin-down" type="button" wire:click="menos" >-</button>
                                                </span>
                                                <input type="number" value="{{$nota_final}}" id="nota_final" class="form-control" maxlength="3" wire:model="nota_final"
                                                    min="0" max="100" > <!-- actualiza_value_sum -->
                                                <span class="input-group-btn input-group-append">
                                                    <button class="btn btn-primary bootstrap-touchspin-up" type="button" wire:click="mas" >+</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label class="form-label" >OBSERVACION</label>
                                            <label class="form-control">{{$nota_observacion}}</label>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label class="form-label" >NRO. DE FOLIO</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label class="form-label" >NRO. CARPETA NOTA</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                @else 
                                    <p>NO DATA FROUND</p>
                                @endif
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-danger waves-effect" 
                                        wire:click="close_form_inscribir">CANCELAR</button> <!-- data-bs-dismiss="modal" -->
                                <button class="btn btn-primary waves-effect waves-light"
                                    wire:click="">GUARDAR MIGRACION</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- END = modal-dialog modal-lg -->
                </div>
                <!-- ******************* fin modal registrar inscripcion migracion ************** -->

                <!-- ********************* fin modales *************** -->
            </div>
        </div>
    </div>
	<!-- --------------- fin contenedor principal ------------ -->

    @push('navi-js')
    <script>
        document.addEventListener('livewire:load', function() {
        
            Livewire.on('showModalVerificarInscripcion', ()=> {
                $('#verificarInscripcionCI').modal('show');
            });
            Livewire.on('closeModalVerificarInscripcion', ()=> {
                $('#verificarInscripcionCI').modal('hide');
            });


            Livewire.on('showModalAgregarPersona', ()=> {
                $('#agregarPersona').modal('show');
            });
            Livewire.on('closeModalAgregarPersona', ()=> {
                $('#agregarPersona').modal('hide');
            });

            Livewire.on('showModalAgregarInscripcionMigracion', ()=> {
                $('#agregarInscripcionMigracion').modal('show');
            });
            Livewire.on('closeModalAgregarInscripcionMigracion', ()=> {
                $('#agregarInscripcionMigracion').modal('hide');
            });
            

            Livewire.on('mostrar', (mensaje)=> {
                console.log(mensaje);
            });
        });
    </script>
    @endpush
</div>
>
