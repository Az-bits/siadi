@push('style-custom.css')
    <!-- Plugins css = dropzone-->
    <link href="{{ asset('assets/dashboard/assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Flag icons css = https://codepen.io/Fowerld/full/JjbMvew  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" type="text/css">
@endpush
<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">CERTIFICADOS</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Buscar Certificado</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="position-relative">
                        <div class="position-absolute top-0 start-0">
                            <div class="col-md-12">
                                <input type="text" class="form-control" wire:model="search" wire:keydown="clear_filter()"
                                placeholder="Ingrese CI" value="{{$search}}">
                            </div>
                        </div>
                        @if($status)
                        <div class="position-absolute top-0 end-0">
                            <div class="col-md-10">
                                <input type="text" class="form-control" wire:model="filter"
                                placeholder="Filtrar" value="{{$filter}}">
                            </div>
                        </div>
                        @endif
                    </div>

                </div>
                <div class="card-body">
                    <br>
                    @if(count($estudiantes)>0)
                    <hr>
                    @php
                        $abrev = "";
                        $pais = mb_strtolower($estudiantes[0]->pais_persona);
                        if($pais=="bolivia"){ $abrev = "bo";}
                        else if($pais=="perú") {$abrev = "pe";}
                        else if($pais=="argentina") {$abrev = "ar";}
                        else if($pais=="chile") {$abrev = "cl";}
                        else if($pais=="brazil") {$abrev = "br";}
                    @endphp
                    <div class="row g-3">
                        <div class="col-md-11">
                            <i class="bx bxs-user"></i> <b>Nombre completo:</b> {{$estudiantes[0]->nombres_persona}} <br>
                            <i class="bx bxs-user-detail"></i> <b>Cédula de Identidad:</b> {{$estudiantes[0]->ci}}
                        </div>
                        <div class="col-md-1 ">
                            <span class="flag-icon flag-icon-{{ $abrev }} fs-2"></span>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>MATERIAS</th>
                                    <th>TIPO</th>
                                    <th>GESTIÓN</th>
                                    <th>FECHA CERTIFICADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                @foreach ($estudiantes as $estudiante)
                                    <tr>
                                        <th>{{$cont++}}</th>
                                        <td>{{$estudiante->idioma}}</td>
                                        <td>{{$estudiante->modalidad}}</td>
                                        <td>{{$estudiante->gestion}}</td>
                                        <td>{{$estudiante->fecha_siadi_certificado}}</td>
                                        <td>
                                            @if($estudiante->certificado_id=="")
                                            <button type="button" class="btn btn-outline-danger"
                                                wire:click="abrir_form({{$estudiante->id_inscripcion}})" id="btnAgregarCertificados"> <!-- data-bs-toggle="modal" data-bs-target="#agregarCertificados" -->
                                                <i class="bx bxs-file-plus fs-5"></i> <b>Generar Certificado</b></button>
                                            @else
                                                <button type="button" class="btn btn-outline-info  d-flex justify-content-center align-self-center"
                                                    wire:click="mostrar_certificado({{$estudiante->certificado_id}})"> <!-- data-bs-toggle="modal" data-bs-target="#imprimirCertificado" -->
                                                    <b>Imprimir PDF</b> <i class="bx bxs-file-pdf fs-3"></i></button>
                                                <button type="button" class="btn btn-outline-success"
                                                    wire:click="mostrar_certificado_pdf_digital({{$estudiante->certificado_id}})"> <!-- data-bs-toggle="modal" data-bs-target="#agregarCertificadoImagen" -->
                                                    <b>PDF Digital</b> <i class="bx bxs-file-image fs-3"></i></button>
                                                <button type="button" class="btn btn-outline-secondary" 
                                                    wire:click="mostrar_formulario_reimpresion({{$estudiante->certificado_id}})"><b>Reimpresion</b> <i class="bx bxs-duplicate fs-3"></i></button> <!-- data-bs-toggle="modal" data-bs-target="#agregarCertificadosReimpresion" -->
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    {{-- BORRAR --}}
                    <br>
                    <p><b>CIS:</b> 
                        @foreach($personas as $person)
                            {{$person->ci_persona}}, 
                        @endforeach
                    </p>
        
                    <br><br>
                    
                    <!-- <div class='col p-2 bg-white'>
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('REIMPRESION/0002/2023|6953913-LP|CHOQUE-APAZA-ROBERTO-CAMILO|AYMARA-BÁSICO-1.1|LIBRO-13|NOTA-75|'. 'Verificar:'. url('/'). '/vc/C0001-2023')) !!} ">
                    </div> -->



                    <!-- ----------- inicio modales --------------- -->

                    <!-- ********** inicio modal 01 ********* -->
                    <div wire:ignore.self id="agregarCertificados" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myModalLabel">GENERAR CERTIFICADOS
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        wire:click="cancelar"></button>
                                </div>
                                <div class="modal-body ">
                                    <div class="d-flex justify-content-center d-none" id="loaderAgregarCertificados">
                                        <div class="spinner-border text-primary m-1" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    @if(!is_null($datos_inscripcion_estudiante))
                                    <div class="col-md-12">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label class="form-label">Códigos:</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label" for="nro_disponible">Números Disponibles:</label>
                                            </div>
                                            <div class="col-md-5">
                                                <select class="form-select @error('nro_disponible') border-danger svg-shadow shadow-danger shadow-intensity-lg @enderror" id="nro_disponible" wire:model="nro_disponible" wire:change="actualizar_rango_nro" >
                                                    <option value="">Elegir...</option>
                                                    @foreach ($numeros_disponibles as $dispon)
                                                        <option value="{{ $dispon }}">{{ $dispon}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-8 text-danger"> @error('nro_disponible') {{ $message }} @enderror</div>
                                        </div>

                                        <div class="row g-3">
                                            <div class="col-md-2">
                                                <label for="inicial" class="form-label">Inicial</label>
                                                <input type="text" class="form-control @error('inicial') border-danger @enderror" id="inicial" wire:model="inicial" value="{{$inicial}}" maxlength="1">
                                                @error('inicial')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nro" class="form-label ">Número</label>
                                                <input type="number" class="form-control @error('nro') border-danger @enderror" id="nro" wire:model="nro" value="{{$nro}}"
                                                    {{ ($errors->has('nro_disponible') || $statusNro==false)? 'disabled': 'enabled' }}
                                                min="{{$nroMin}}" max="{{$nroMax}}">
                                                @error('nro')
                                                <span class="text-danger fs-6">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-1">
                                                <label>/</label>
                                                <span class="input-group-text">/</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="anio" class="form-label">Año</label>
                                                <select id="inputState" class="form-select  @error('anio') border-danger @enderror" wire:model="anio" wire:change="actualiza_anio">
                                                    <option value="">Elegir...</option>
                                                    @foreach ($gestiones as $gestion)
                                                        <option value="{{ $gestion->nombre_gestion }}">{{ $gestion->nombre_gestion}}</option>
                                                    @endforeach
                                                </select>
                                                @error('anio')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-6">
                                            <label class="form-label" for="fecha">Fecha:</label>
                                            <input type="date" class="form-control @error('fecha') border-danger @enderror" id="fecha" wire:model="fecha" value="{{$fecha}}" required pattern="\d{4}-\d{2}-\d{2}">
                                            @error('fecha')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="acordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header bg-soft-danger p-1 rounded-1">
                                                <button class="accordion-button" type="button"  id="btn-collapseOne" 
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
                                                    <b>DATOS CERTIFICADO</b>
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample"> <!-- show -->
                                                <div class="accordion-body">
                                                    @php $datos_tmp = json_decode($datos_inscripcion_estudiante, false); @endphp
                                                    <span><i class="bx bxs-user-detail"></i> <b>CI:</b> {{$datos_tmp->ci}} </span> <br>
                                                    <span><i class="{{ $datos_tmp->genero_persona=='F'? 'bx bx-female': 'bx bx-male' }}"></i> <b>Nombre:</b> </span> {{$datos_tmp->nombres_persona}} <br>
                                                    <span><i class="bx bxs-book"></i> <b>Idioma:</b> {{$datos_tmp->idioma}} </span> <br>
                                                    <span><i class="bx bxs-bookmark"></i> <b>Modalidad:</b> {{$datos_tmp->modalidad}} </span> <br>
                                                    <span><i class="bx bxs-calendar-check"> </i> <b>Gestion:</b> {{$datos_tmp->gestion}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"
                                            wire:click="cancelar"><i class="bx bx-window-close"></i> CANCELAR</button>
                                        <button wire:click="guardar_certificado()"
                                            class="btn btn-primary waves-effect waves-light"> <i class="bx bxs-save"></i> GUARDAR DATOS</button>
                                            <button wire:click="guardar_certificado({{true}})"
                                            class="btn btn-primary waves-effect waves-light"><i class="bx bxs-printer"></i> GUARDAR E IMPRIMIR</button>
                                    </div>
                                    @endif
                                </div>
                                </div>
                            </div>
                            
                            <!-- /.modal-content -->
                        </div>
                    </div>
                    <!-- ************ fin modal 01 ********** -->


                    <!-- ************ inicio modal 02 **************** -->
                    <div wire:ignore.self id="imprimirCertificado" class="modal fade" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myModalLabel">IMPRIMIR CERTIFICADO
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        wire:click="clearDataPrint"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="acordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header bg-soft-info p-1 rounded-1">
                                                <button class="accordion-button" type="button"  
                                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" >
                                                    <b>DATOS CERTIFICADO</b> <i class="bx bxs-down-arrow"></i>
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2"> <!-- show -->
                                                <div class="accordion-body">
                                                    <i class="bx bxs-lock-alt"></i> <span><b>Codigo</b> {{$datosImpresion["codigo"]}}</span> <br>
                                                    <i class="bx bxs-user-detail"></i> <span><b>CI:</b> {{$datosImpresion["ci"]}}</span> <br>
                                                    <i class="bx bxs-user"></i> <span><b>Nombre:</b> {{$datosImpresion["nombre"]}}</span> <br>
                                                    <i class="bx bxs-book"></i> <span><b>Idioma:</b> {{$datosImpresion["idioma"]}}</span> <br>
                                                    <i class="bx bxs-bookmark"></i> <span><b>Modalidad:</b> {{$datosImpresion["modalidad"]}}</span> <br>
                                                    <i class="bx bxs-time-five"></i> <span><b>Carga Horaria</b> {{$datosImpresion["carga_horaria"]}}</span> <br>
                                                    <i class="bx bxs-calendar-check"></i><span><b>Gestion:</b> {{$datosImpresion["gestion"]}}</span> <br>
                                                    <i class="bx bxs-book-content"></i> <span><b>Nota Final:</b> {{$datosImpresion["final_nota"]}}</span> <br>
                                                    <i class="bx bxs-archive"></i><span><b>Nro Folio:</b> {{$datosImpresion["nro_folio_nota"]}}</span> <br>
                                                    <i class="bx bx-book"></i> <span><b>Materia:</b> {{$datosImpresion["materia"]}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-md-12">
                                        <div class="row g-3">
                                            <div class="col-md-5">
                                                <label class="form-label" for="estadoCargaHoraria">Mostrar carga horaria:</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="checkbox" class="form-label" wire:model="estadoCargaHoraria" />
                                            </div>
                                        </div>

                                        <div class="row g-3">
                                            <div class="col-md-5">
                                                <label class="form-label" for="fechaImpresion">Fecha de Impresión </label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="date" class="form-control @error('fechaImpresion') border-danger @enderror" id="fechaImpresion" wire:model="fechaImpresion" value="{{$fechaImpresion}}" required pattern="\d{4}-\d{2}-\d{2}">
                                                @error('fechaImpresion')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row g-3">
                                            <div class="col-md-5">
                                                <label class="form-label" for="formatoImpresion">Formato Impresión</label>
                                            </div>
                                            <div class="col-md-5">
                                                <select id="formatoImpresion" class="form-select @error('formatoImpresion') border-danger @enderror" wire:model="formatoImpresion">
                                                    <option value="">Elegir...</option>
                                                    <option value="formato1">Formato 1</option>
                                                    <option value="formato2">Formato 2</option>
                                                    <option value="formato3">Formato 3</option>
                                                </select>
                                                @error('formatoImpresion')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                </div>
                                
                                </div>

                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"
                                            wire:click="clearDataPrint">CANCELAR</button>
                                        <button wire:click="imprimir"
                                            class="btn btn-primary waves-effect waves-light">IMPRIMIR</button>
                                    </div>
                                </div>

                                

                            </div>
                            
                            <!-- /.modal-content -->
                        </div>
                    </div>
                    <!-- ************* fin modal 02 ****************** -->




                    <!-- ************* inicio modal 03 *************** -->
                    <div wire:ignore.self id="agregarCertificadoImagen" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myModalLabel">AGREGAR CERTIFICADO DIGITAL
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        wire:click="cancelar_imagen"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="acordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header bg-soft-success p-1 rounded-1">
                                                <button class="accordion-button" type="button"  
                                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" >
                                                    <b>DATOS CERTIFICADO</b> <i class="bx bxs-down-arrow"></i>
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample3"> <!-- show -->
                                                <div class="accordion-body">
                                                    <i class="bx bxs-lock-alt"></i> <span><b>Codigo</b> {{$datosImpresion["codigo"]}}</span> <br>
                                                    <i class="bx bxs-user-detail"></i> <span><b>CI:</b> {{$datosImpresion["ci"]}}</span> <br>
                                                    <i class="bx bxs-user"></i> <span><b>Nombre:</b> {{$datosImpresion["nombre"]}}</span> <br>
                                                    <i class="bx bxs-book"></i> <span><b>Idioma:</b> {{$datosImpresion["idioma"]}}</span> <br>
                                                    <i class="bx bxs-bookmark"></i> <span><b>Modalidad:</b> {{$datosImpresion["modalidad"]}}</span> <br>
                                                    <i class="bx bxs-time-five"></i><span><b>Carga Horaria</b> {{$datosImpresion["carga_horaria"]}}</span> <br>
                                                    <i class="bx bxs-calendar-check"></i> <span><b>Gestion:</b> {{$datosImpresion["gestion"]}}</span> <br>
                                                    <i class="bx bxs-calendar"></i> <span><b>Fecha:</b> {{$datosImpresion["fecha_original"]}}</span> <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div>
                                        <!-- plugin dropzone -->
                                        <!-- <div class="dropzone" action="#"> -->
                                            @php 
                                                $existeFoto = false;
                                                if(Storage::disk('cert')->exists($datosImpresion["imagen"]) && $datosImpresion["imagen"]!==""){
                                                    $existeFoto = true;
                                                    /* $imagen = Storage::disk('cert')->get($datosImpresion['imagen']);
                                                    $imagen = Storage::disk('cert')->url($datosImpresion['imagen']);
                                                    $this->emit('Mostrar', '>> '. $imagen->temporaryUrl()); */
                                                }
                                            @endphp
                                            <!-- <div class="fallback"> -->
                                            <div class="input-group">
                                                <label class="form-label" for="imagen">Imagen</label>
                                                <input type="file" class="form-control @error('imagen') border-danger @enderror" id="imagen" wire:model="imagen" value="{{$imagen}}">
                                                @error('imagen') 
                                                    <span class="error" style="display: block">{{ $message }}</span> 
                                                @enderror
                                            </div>
                                            <!-- </div>
                                            <div class="dz-message needsclick">
                                                <div class="mb-3">
                                                    <i class="display-4 text-muted mdi mdi-upload-network-outline"></i>
                                                </div>

                                                <h4>Drop files here or click to upload.</h4>
                                            </div>
                                        </div> -->
                                        <label class="position-relative d-block border border-primary" style="min-height: 150px;" for="imagen"> <!-- ratio ratio-16x9 -->
                                            @if($imagen && !$errors->has('imagen'))
                                                <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen Cargada" class="d-block w-100">
                                            @else
                                                @if($datosImpresion['imagen']!=="")
                                                    <img src="{{ Storage::disk('cert')->url($datosImpresion['imagen']) }}" alt="Certificado {{$datosImpresion['ci']}} {{$datosImpresion['codigo']}}" class="d-block w-100"> <!--  asset('certificados_scan/'. $datosImpresion['imagen']) -->
                                                @endif
                                            @endif
                                            <div class="position-absolute top-50 start-50 translate-middle w-25">
                                                <img src="{{asset('cert/35883.png')}}" alt="SUBIR IMAGEN" class="d-block w-100">
                                            </div>
                                            </label>
                                    </div>


                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"
                                            wire:click="cancelar_imagen">CANCELAR</button>
                                        @if($imagen && !$errors->has('imagen'))
                                        <button wire:click="guardar_imagen()"
                                            class="btn btn-primary waves-effect waves-light">GUARDAR</button>
                                        @endif
                                        @if($existeFoto && is_null($imagen))
                                        <button wire:click="imprimir_pdf_digital"
                                            class="btn btn-primary waves-effect waves-light">IMPRIMIR PDF DIGITAL</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                    </div>
                    <!-- ************** fin modal 03 ***************** -->




                    <!-- ************** inicio modal 04 ************* -->
                    <div wire:ignore.self id="agregarCertificadosReimpresion" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0 text-center" id="myModalLabel">AGREGAR CERTIFIDOS REIMPRESION R0001/2023
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        wire:click="cancelar_form_reimpresion"></button>
                                </div>
                                <div class="modal-body">
                                    @if(!is_null($certifica_prueba))
                                        <div class="acordion">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header bg-soft-secondary p-1 rounded-1">
                                                    <button class="accordion-button" type="button"  
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour" >
                                                        <b>DATOS CERTIFICADO</b> <i class="bx bxs-down-arrow"></i>
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#accordionExample3"> <!-- show -->
                                                    <div class="accordion-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <i class="bx bxs-lock-alt"></i>
                                                                <b>Código:</b> 
                                                                {{$certifica_prueba["codigo_siadi_certificado"]}}
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <i class="bx bxs-book"></i>
                                                                <b>Curso:</b> 
                                                                {{$certifica_prueba["idioma"]}}
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <i class="bx bxs-calendar"></i>
                                                                <b>Fecha:</b> 
                                                                {{\Carbon\Carbon::parse($certifica_prueba["fecha"])->locale('es')->isoFormat('dddd\, D MMMM \d\e\l YYYY')}} 
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <i class="bx bxs-bookmark"></i>
                                                                <b>Modalidad:</b> 
                                                                {{$certifica_prueba["modalidad"]}}
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <i class="bx bxs-time-five"></i>
                                                                <b>Carga Horaria:</b> 
                                                                {{$certifica_prueba["carga_horaria"]}}
                                                            </div>
                                                            
                                                            <div class="col-lg-6">
                                                                <i class="bx bxs-calendar-check"></i>
                                                                <b>Gestión:</b> 
                                                                {{$certifica_prueba["gestion"]}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="mb-3 col-lg-3">
                                                <label class="form-label " for="codigo_rimp">Codigo </label>
                                                <input type="text" id="codigo_rimp" name="untyped-input" wire:model="codigo_rimp"
                                                    class="form-control" value="{{$codigo_rimp}}" disabled/>
                                            </div>
                                            
                                            <div class="mb-3 col-lg-3">
                                                <label class="form-label" for="fecha_rimp">Fecha </label>
                                                <input type="date" id="fecha_rimp" class="form-control" 
                                                    wire:model="fecha_rimp" value="{{$fecha_rimp}}" required pattern="\d{4}-\d{2}-\d{2}">
                                                @error('fecha_rimp') 
                                                    <span class="error" style="display: block">{{ $message }}</span> 
                                                @enderror
                                            </div>

                                            <div class="col-lg-4 align-self-center">
                                                <button title="Guardar" wire:click="guardar_reimpresion"
                                                    class="btn btn-success waves-effect waves-light"><i class="bx bxs-save"></i> AÑADIR REIMPRESIÓN</button>
                                            </div>
                                            
                                        </div>
                                        <hr>
                                        
                                        @if(count($reimpreion_modal)>0)
                                        <div class="table-responsive">
                                            <h3 class="title text-center">HISTORIAL DE RE-IMPRESIONES</h3>
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>CODIGO</th>
                                                        <th>FECHA</th>
                                                        <th>IMAGEN</th>
                                                        <th>ACCIONES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $contRe = 1;
                                                    @endphp
                                                    @foreach ($reimpreion_modal as $reimpresion)
                                                        <tr>
                                                            <th>{{$contRe++}}</th>
                                                            <td>{{$reimpresion->codigo_siadi_certificado}} </td>
                                                            <td>{{$reimpresion->fecha_siadi_certificado}} </td>
                                                            <td>{{$reimpresion->imagen_certificado}}</td>
                                                            <td>
                                                                <button wire:click="imprimir_reimpresion({{ $reimpresion->certificados_reimpresions_id }})" title="Imprimir PDF"
                                                                    class="btn btn-success waves-effect waves-light"><i class="bx bxs-file-pdf"></i></button>
                                                                <button wire:click="mostrar_form_edit_reimpresion({{ $reimpresion->certificados_reimpresions_id }})" title="Editar"
                                                                    class="btn btn-primary waves-effect waves-light"><i class="bx bx-edit"></i></button>
                                                                <button  wire:click.prevent="$emit('deleteCertificadoReimpresion', {{ $reimpresion->certificados_reimpresions_id }})" title="Eliminar"
                                                                    class="btn btn-danger waves-effect waves-light"><i class="bx bx-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @else
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Sin registros de reimpresión.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                                    @endif

                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"
                                            wire:click="cancelar_form_reimpresion">CANCELAR</button>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                    </div>
                    <!-- ***************** fin modal 04 ************* -->




                    <!-- ************* inicio modal 05 *************** -->
                    <div wire:ignore.self id="modalEditarCertificadoReimpresion" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myModalLabel">EDITAR CERTIFICADO REIMPRESIÓN
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        wire:click="cancelar_edit_reimpresion"></button>
                                </div>
                                @if(!is_null($data_reimpresion))
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="mb-3 col-lg-4">
                                            <label class="form-label " for="codigo_edit_reimp">Codigo </label>
                                            <input type="text" id="codigo_edit_reimp" name="untyped-input" wire:model="codigo_edit_reimp"
                                                class="form-control" value="{{$codigo_edit_reimp}}" disabled/>
                                        </div>
                                        
                                        <div class="mb-3 col-lg-6">
                                            <label class="form-label" for="fecha_edit_reimp">Fecha Reimpresión</label>
                                            <input type="date" id="fecha_edit_reimp" class="form-control" 
                                                wire:model="fecha_edit_reimp" value="{{$fecha_edit_reimp}}" required pattern="\d{4}-\d{2}-\d{2}">
                                            @error('fecha_edit_reimp') 
                                                <span class="error" style="display: block">{{ $message }}</span> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-2">
                                            <label class="form-label" for="imagen_reimpresion">Imagen </label>
                                        </div>
                                        <div class="mb-3 col-lg-10">
                                            <input type="file" class="form-control @error('imagen_reimpresion') border-danger @enderror" id="imagen_reimpresion" wire:model="imagen_reimpresion" value="{{$imagen_reimpresion}}">
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            @error('imagen_reimpresion') 
                                                <span class="error" style="display: block">{{ $message }}</span> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-1"></div>
                                        <label class="d-block mb-3 col-lg-10" for="imagen_reimpresion">
                                            @php 
                                                $existeFotoReimp = false;
                                                if(Storage::disk('cert_reimpresion')->exists($data_reimpresion["imagen_certificado"]) && $data_reimpresion["imagen_certificado"]!==""){
                                                    $existeFotoReimp = true;
                                                }
                                            @endphp
                                            
                                            <div class="position-relative border border-primary" style="min-height: 150px;"> <!-- ratio ratio-16x9 -->
                                                @if($imagen_reimpresion && !$errors->has('imagen_reimpresion'))
                                                    <img src="{{ $imagen_reimpresion->temporaryUrl() }}" alt="Imagen Cargada" class="d-block w-100">
                                                @else
                                                    @if($existeFotoReimp)
                                                        <img src="{{ Storage::disk('cert_reimpresion')->url($data_reimpresion['imagen_certificado']) }}" alt="Certificado {{ $data_reimpresion['codigo_siadi_certificado'] }} {{ $data_reimpresion['fecha_siadi_certificado'] }}" class="d-block w-100">
                                                    @endif
                                                @endif
                                                <div class="position-absolute top-50 start-50 translate-middle w-25">
                                                    <img src="{{asset('cert/35883.png')}}" alt="SUBIR IMAGEN" class="d-block w-100">
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                   
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"
                                        wire:click="cancelar_edit_reimpresion">CANCELAR</button>
                                    <button wire:click="actualizar_form_edit_reimpresion()"
                                        class="btn btn-primary waves-effect waves-light">GUARDAR</button>
                                </div>
                                @endif
                            </div>
                            <!-- /.modal-content -->
                        </div>
                    </div>
                    <!-- ************** fin modal 05 ***************** -->



                    <!-- ------------ fin modales ----------------- -->
                </div>
            </div>
        </div>
    </div>


</div>

@push('navi-js')
    <!-- Plugins js = dropzone -->
    <!-- <script src="{{ asset('assets/dashboard/assets/libs/dropzone/min/dropzone.min.js') }}"></script> -->
    
    <script>
        document.addEventListener('livewire:load', function() {
        
            Livewire.on('showModalCreate', ()=> {
                $('#agregarCertificados').modal('show');
            });
            Livewire.on('closeModalCreate', ()=> {
                $('#agregarCertificados').modal('hide');
            });
            Livewire.on('showLoaderAgregarCerticados', ()=>{
                $('#loaderAgregarCertificados').removeClass('d-none');
            });
            Livewire.on('hideLoaderAgregarCerticados', ()=>{
                $('#loaderAgregarCertificados').addClass('d-none');
            });


            Livewire.on('showModalImprimirCertificado', ()=> {
                $('#imprimirCertificado').modal('show');
            });
            Livewire.on('closeModalImprimirCertificado', ()=> {
                $('#imprimirCertificado').modal('hide');
            });


            Livewire.on('showModalAgregarCertificadoImagen', ()=> {
                $('#agregarCertificadoImagen').modal('show');
            });
            Livewire.on('closeModalAgregarCertificadoImagen', ()=> {
                $('#agregarCertificadoImagen').modal('hide');
            });


            Livewire.on('showModalReimpresionCertificado', ()=> {
                $('#agregarCertificadosReimpresion').modal('show');
            });
            Livewire.on('closeModalReimpresionCertificado', ()=> {
                $('#agregarCertificadosReimpresion').modal('hide');
            });
            Livewire.on('deleteCertificadoReimpresion', id_cert_reimp => {
                Swal.fire({
                    title: 'Esta seguro/segura ?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, borrar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('reimpresion_eliminar', id_cert_reimp);
                    }
                })
            });

            
            Livewire.on('showModalEditarReimpresionCertificado', ()=> {
                $('#modalEditarCertificadoReimpresion').modal('show');
            });
            Livewire.on('closeModalEditarReimpresionCertificado', ()=> {
                $('#modalEditarCertificadoReimpresion').modal('hide');
            });


            Livewire.on('Mostrar', ($cadena)=> {
                console.log($cadena);
            });

            Livewire.on('Error', ($texto)=> {
                Swal.fire({
                    icon: 'error',
                    title: "Error",
                    text: $texto
                });
            });


            Livewire.on('abrirNuevaPestania', (url)=> {
                window.open(url, '_blank');
            });

        });
    </script>

@endpush

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="{{ asset('assets/dashboard/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script>
    $('#inicial').maxlength({
        alwaysShow: !0, warningClass: "badge bg-danger", limitReachedClass: "badge bg-success"
    });
</script>