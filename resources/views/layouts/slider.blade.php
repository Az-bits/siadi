<div id="sidebar-menu">

    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>


        @can('admin.home.index')
            <li>

                <a href="{{ route('admin.home.index') }}" class="waves-effect">
                    <i class="mdi mdi-airplay"></i>
                    <span>INICIO</span>
                </a>
            </li>
        @endcan
        @canany(['usuario.index', 'role.index'])
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-account-circle-outline"></i>
                    <span>ADMINISTRACION USUARIOS</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @can('usuario.index')
                        <li><a href="{{ route('usuarios.index') }}">USUARIOS</a></li>
                    @endcan
                    @can('role.index')
                        <li><a href="{{ route('roles.index') }}">ROLES</a></li>
                    @endcan
                </ul>
            </li>
        @endcanany

        <li class="menu-title">CONTENIDO</li>
        @canany(['gestiones.index', 'tipo_estudiante.index', 'idioma.index', 'nivel_idioma.index',
            'convocatoria_estudiante.index', 'costo.index', 'paralelo.index', 'tipo_convocatoria.index',
            'asignaturas.index', 'sede.index', 'institucion.index','publicaciones.index'])




            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-calendar-check"></i>
                    <span>COMPLEMENTOS</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @can('gestiones.index')
                        <li><a href="{{ route('gestion.index') }}">GESTIONES</a></li>
                    @endcan
                    @can('tipo_estudiante.index')
                        <li><a href="{{ route('tipo_estudiante.index') }}">TIPO ESTUDIANTE</a></li>
                    @endcan
                    @can('idioma.index')
                        <li><a href="{{ route('idioma.index') }}">IDIOMA</a></li>
                    @endcan
                    @can('nivel_idioma.index')
                        <li><a href="{{ route('nivel_idioma.index') }}">NIVEL IDIOMA</a></li>
                    @endcan
                    @can('convocatoria_estudiante.index')
                        <li><a href="{{ route('convocatoria_estudiante.index') }}">CONVOCATORIA ESTUDIANTE</a></li>
                    @endcan
                    @can('costo.index')
                        <li><a href="{{ route('costo.index') }}">COSTO</a></li>
                    @endcan
                    @can('paralelo.index')
                        <li><a href="{{ route('paralelo.index') }}">PARALELO</a></li>
                    @endcan

                    @can('tipo_convocatoria.index')
                        <li><a href="{{ route('tipo_convocatoria.index') }}">TIPO CONVOCATORIA</a></li>
                    @endcan
                    @can('asignaturas.index')
                        <li><a href="{{ route('asignatura.index') }}">ASIGNATURAS</a></li>
                    @endcan 
                    @can('sede.index')
                        <li><a href="{{ route('sede.index') }}">SEDE</a></li>
                    @endcan
                    @can('institucion.index')
                        <li><a href="{{ route('institucion.index') }}">DATOS DE INSTITUCIÓN</a></li>
                    @endcan
                    @can('publicaciones.index')
                        <li><a href="{{ route('publicaciones.index') }}">PUBLICACIONES</a></li>
                    @endcan









                </ul>
            </li>
        @endcanany
        @canany(['planificar_convocatoria.index', 'planificar_asignatura.index', 'planificar_asignatura.show',
            'asignardocente.index'])


            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-checkbox-multiple-blank-outline"></i>
                    <span>PLANIFICAR</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @can('planificar_convocatoria.index')
                        <li><a href="{{ route('convocatoria.index') }}">PLANIFICAR CONVOCATORIA</a></li>
                    @endcan
                    @canany(['planificar_asignatura.index', 'planificar_asignatura.show'])
                        <li><a href="{{ route('planificar_asignatura.index') }}">PLANIFICAR ASIGNATURA</a></li>
                    @endcanany
                    {{-- @can('planificar_paralelo.index')
                    <li><a href="{{ route('planificar_paralelo.index') }}">PLANIFICAR PARALELO</a></li>
                @endcan --}}
                    @can('asignardocente.index')
                        <li><a href="{{ route('planificar_paralelo.index') }}">ASIGNAR DOCENTE</a></li>
                    @endcan
                 
                </ul>
            </li>
        @endcanany
        @canany(['pre-inscripcion.index', 'persona.index', 'inscripcion.index', 'migrar.index', 'convalidacion.index'])
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-checkbox-multiple-blank-outline"></i>
                    <span>INSCRIPCIONES</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @can('preinscripcion.index')
                        <li><a href="{{ route('pre-inscripcion.index') }}"> PREINSCRIPCION E INSCRIPCION</a></li>
                    @endcan
                    @can('personas.index')
                        <li><a href="{{ route('persona.index') }}">PERSONA INSCRIPCION</a></li>
                    @endcan
                    @can('inscripcion.index')
                        <li><a href="{{ route('inscripcion.index') }}">TESORERIA</a></li>
                    @endcan
                    @can('migrar.index')
                        <li><a href="{{ route('migrar.index') }}">MIGRAR</a></li>
                    @endcan
                    @can('convalidacion.index')
                        <li><a href="{{ route('convalidacion-homologacion.index') }}">HOMOLOGACIÓN Y CONVALIDACIÓN</a></li>
                    @endcan




                </ul>
            </li>
        @endcanany
        @canany(['certificado.index', 'certificado-lotes.index', 'certificado_provisional.index'. 'certificado_provisional-lotes.index'])
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-clipboard-list-outline"></i>
                    <span>CERTIFICADOS</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @can('certificado.index')
                        <li><a href="{{ route('certificado.index') }}">BUSCAR CERTIFICADO</a></li>
                    @endcan
                    @can('certificado.lotes.index')
                        <li><a href="{{ route('certificado-lotes.index') }}">ADMINISTRACIÓN CERTIFICADOS</a></li>
                    @endcan
                    @can('certificado_provisional.index')
                        <li><a href="{{ route('certificado_provisional.index') }}">BUSCAR  CERTIFICADO PROVISIONAL</a></li>
                    @endcan 
                    @can('certificado_provisional-lotes.index')
                        <li><a href="{{ route('certificado_provisional-lotes.index') }}">ADMINISTRACIÓN CERTIFICADO PROVISIONAL</a></li>
                    @endcan 
                </ul>
            </li>
        @endcanany
        @can('docente.materias')
            <li>

                <a href="{{ route('docente_materias.index') }}" class="waves-effect">
                    <i class="mdi mdi-newspaper"></i>
                    <span>MATERIAS </span>
                </a>


            </li>
        @endcan
        @can('estudiante.index')
            <li>

                <a href="{{ route('estudiante.index') }}" class="waves-effect">
                    <i class="mdi mdi-newspaper"></i>
                    <span>PREINSCRIPCIÓN ESTUDIANTE</span>
                </a>
            </li>
           
        @endcan
        @can('estudiante_record.index')
             <li>

                <a href="{{ route('estudiante_record.index') }}" class="waves-effect">
                    <i class="mdi mdi-newspaper"></i>
                    <span>RECORD ACADÉMICO</span>
                </a>
            </li>
        @endcan 
    </ul>
</div>
