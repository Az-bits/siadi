@extends('layouts.admin_principal')
@section('body')
<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Documentación A.D.M.I.N.</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Documentación A.D.M.I.N.</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center" id="admin.home.index">admin.home.index</h2>
                    <div class="row">
                        <div class="col-md-7">
                            <img class="img-fluid" alt="Imagen admin.home.index" src="admin.home.index.jpg" data-holder-rendered="true">
                        </div>
                        <div class="col-md-5">
                            <p><b>Controlador</b> <span class="badge bg-black text-success">App\Http\Controllers\HomeController</span></p>
                            <p>Dashboard de Inicio donde pueden estar habilitados las siguientes vistas</p>
                            <ul>
                                <li><a href="#estadisticas.detalladas">estadisticas.detalladas</a></li>
                            </ul>
                            <p><b>Nota:</b> En caso de los roles Admin, Kardex y Docente al estar habilitado el el permiso se mostrar un cuadro resumen de:</p>
                            <ul>
                                <li><b>TOTAL POR MODALIDAD</b> Donde se muestra el total de estudiantes inscritos en todas las gestiones agrupados por modalidad. Los estudiantes inscritos contempla los estudiantes inscritos en la gestion actual, aprobados, reprobados y los que no se presentaron.</li>
                                <li><b>TOTAL POR GÉNERO </b>Se agrupan los estudiantes inscritos por género.</li>
                            </ul>
                            <img class="img-fluid" src="admin.home.index_1.jpg" alt="Imagen ">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xl-6">
                            <div class="card bg-soft-secondary">
                                <img class="card-img-top img-fluid" src="{{asset('assets/docum/estadisticas.detalladas.jpg')}}" alt="Card image cap">
                                <div class="card-body">
                                    <h3 class="card-title mt-0" id="estadisticas.detalladas">estadisticas.detalladas</h3>
                                    <p class="card-text">Este permiso permite listar los estudiantes inscritos por cada gestión y periodo, donde se muestran los aprobados, reprobados, no se presentaron e inscritos. Se pueden encontrar los siguientes datos:</p>
                                    <ul>
                                        <li>ÚLTIMAS 15 CONVOCATORIAS POR <b>PERIODO GESTIÓN</b></li>
                                        <li><b>PERIODO GESTIÓN</b> INDIVIDUAL DE UN PERIODO</li>
                                        <li><b>CONVOCATORIA ESTUDIANTE</b> POR MODALIDAD</li>
                                        <li>POR <b>SIADI ASIGNATURAS</b> DE UNA MODALIDAD</li>
                                        <li>por <b>SIADI ASIGNATURA NIVELES</b> DE UNA ASIGNATURA</li>
                                    </ul>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Cras justo odio</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center" id="role.index">role.index</h2>
                    <div class="row">
                        <div class="col-md-7">
                            <img class="img-fluid" alt="Imagen role.index" src="{{asset('assets/docum/role.index.jpg')}}" data-holder-rendered="true">
                        </div>
                        <div class="col-md-5">
                            <p><b>Controlador</b> <span class="badge bg-black text-success">App\Http\Controllers\Admin\RoleController</span></p>
                            <p>Aquí es donde establecemos permisos que cada uno necesita usar. Esto permite dejar al Administrador acceso a todas las características de la aplicación y clasificar a los usuarios los diferentes permisos dependiendo de su rol.</p>
                            <ul>
                                <li><a href="#role.create">role.create</a></li>
                                <li><a href="#role.edit">role.edit</a></li>
                                <li><a href="#role.delete">role.delete</a></li>
                            </ul>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xl-6">
                            <div class="card bg-soft-secondary">
                                <img class="card-img-top img-fluid" src="{{asset('assets/docum/estadisticas.detalladas.jpg')}}" alt="Card image cap">
                                <div class="card-body">
                                    <h3 class="card-title mt-0" id="estadisticas.detalladas">estadisticas.detalladas</h3>
                                    <p class="card-text">Este permiso permite listar los estudiantes inscritos por cada gestión y periodo, donde se muestran los aprobados, reprobados, no se presentaron e inscritos. Se pueden encontrar los siguientes datos:</p>
                                    <ul>
                                        <li>ÚLTIMAS 15 CONVOCATORIAS POR <b>PERIODO GESTIÓN</b></li>
                                        <li><b>PERIODO GESTIÓN</b> INDIVIDUAL DE UN PERIODO</li>
                                        <li><b>CONVOCATORIA ESTUDIANTE</b> POR MODALIDAD</li>
                                        <li>POR <b>SIADI ASIGNATURAS</b> DE UNA MODALIDAD</li>
                                        <li>por <b>SIADI ASIGNATURA NIVELES</b> DE UNA ASIGNATURA</li>
                                    </ul>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Cras justo odio</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection