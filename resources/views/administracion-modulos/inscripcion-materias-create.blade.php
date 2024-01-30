@extends('layouts.admin_principal')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">EDITAR INSCRIPCION</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Tipo Estudiante</li>
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



                        <div class="col-md-12">







                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="mb-3">


                                        <center>
                                            <h2> ESTUDIANTE: {{ $persona->paterno_persona }}
                                                {{ $persona->materno_persona }}
                                                {{ $persona->nombres_persona }} </h2>
                                        </center>
                                    </div>
                                </div>

                            </div>
                            <form action="{{ route('inscripcion_user_edit.store') }}"
                                method="POST" enctype="multipart/form-data">
                                <div class="row">


                                    @csrf
                               
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">PARALELO:</label>
                                            <input type="hidden" id="persona" name="persona" value="{{$persona->id_siadi_persona}}">
                                            <select name="paralelo" id="paralelo" class="form-select">
                                                <option value="">Elegir...</option>
                                                @foreach ($paralelos as $paralelo)
                                                    <option value="{{ $paralelo->id_planificar_paralelo }}"
                                                        >
                                                        {{ $paralelo->paralelo->nombre_paralelo }} -
                                                        {{ $paralelo->turno_paralelo }} -
                                                        {{ $paralelo->planificar_asignatura->siadi_asignatura->idioma->nombre_idioma }}
                                                        {{ $paralelo->planificar_asignatura->siadi_asignatura->nivel_idioma->nombre_nivel_idioma }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('paralelo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">TIPO DE PAGO:</label>
                                            <select name="deposito" id="deposito" class="form-select">

                                                <option value="">Elegir...</option>
                                                <option
                                                    value="Depósito">
                                                    Despósito</option>
                                                <option value="Efectivo"
                                                   >
                                                    Efectivo</option>

                                            </select>
                                            @error('deposito')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">FECHA:</label>
                                            <input class="form-control" type="date" name="fecha" id="fecha"
                                               >
                                            @error('date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <button type="submit"
                                                class="btn btn-outline-success waves-effect waves-light"><i
                                                    class="fa fa-save"></i></button>
                                        </div>
                                    </div>




                                </div>
                            </form>


                        </div>


                    </div>

                    <br>



                </div>


            </div>

        </div>
    </div>
@endsection
