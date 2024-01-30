<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdministracionModulos\AsignaturaController;
use App\Http\Controllers\AdministracionModulos\CertifiacadosController;
use App\Http\Controllers\AdministracionModulos\ConvocatoriaEstudianteController;
use App\Http\Controllers\AdministracionModulos\CostoController;
use App\Http\Controllers\AdministracionModulos\DocenteController;
use App\Http\Controllers\AdministracionModulos\EstudianteController;
use App\Http\Controllers\AdministracionModulos\GestionController;
use App\Http\Controllers\AdministracionModulos\IdiomaController;
use App\Http\Controllers\AdministracionModulos\InscripcionController;
use App\Http\Controllers\AdministracionModulos\ConvalidacionHomologacionController;
use App\Http\Controllers\AdministracionModulos\NivelIdiomaController;
use App\Http\Controllers\AdministracionModulos\NotaController;
use App\Http\Controllers\AdministracionModulos\ParaleloController;
use App\Http\Controllers\AdministracionModulos\PersonaController;
use App\Http\Controllers\AdministracionModulos\PersonaPreInscripcionController;
use App\Http\Controllers\AdministracionModulos\PlanificarAsignaturaController;
use App\Http\Controllers\AdministracionModulos\PlanificarParaleloController;
use App\Http\Controllers\AdministracionModulos\PreInscripcionController;
use App\Http\Controllers\AdministracionModulos\SiadiConvocatoriaController;
use App\Http\Controllers\AdministracionModulos\SiadiTipoEstudianteController;
use App\Http\Controllers\AdministracionModulos\TipoConvocatoriaController;
use App\Http\Controllers\AdministracionModulos\MigrarController;
use App\Http\Controllers\AdministracionModulos\SedeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Modulos\ModelocertificadoController;
use App\Http\Controllers\Modulos\PlanificarConvocatoriaController;
use App\Http\Controllers\Modulos\ReportesPdf;
use App\Http\Controllers\Modulos\TipoCertificadoController;
use App\Http\Controllers\Modulos\TomarAsignaturas;
use App\Http\Livewire\AdministracionModulos\MigrarIndex;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdministracionModulos\CertificadosProvisionalController;


Route::resource('dashboard', HomeController::class)->names('admin.home');

Route::resource('permission', PermissionController::class)->names('permisos'); ///->middleware('permission:role.index');
Route::resource('user', UserController::class)->names('usuarios');
Route::resource('role', RoleController::class)->names('roles');
//Route::resource('tipo-certificado', TipoCertificadoController::class)->names('tipo_certificado');
//Route::resource('modelo-certificado', ModelocertificadoController::class)->names('modelo_certificado');
//Route::index('planificar-convocatoria', PlanificarConvocatoriaController::class)->names('planificar_convocatoria');
//Route::resource('tomar-asignatura', [PlanificarConvocatoriaController::class,'tomar_asignatura'])->names('planificar_certificado');
//Route::resource('tomar-asignaturas/', TomarAsignaturas::class)->names('tomar_asignatura');
//Route::get('/asignaturas_convocatoria/{convocatoria}', [PlanificarConvocatoriaController::class, 'cursos_convocatoria'])->name('asignatura_convocatoria');

//Route::get('/reportes-certificados', [ReportesPdf::class,'generarpdf'])->name('generarpdf');

Route::get('role',[RoleController::class, 'index'])->name('roles.index');
Route::get('user',[UserController::class, 'index'])->name('usuarios.index');
Route::get('certificados',[CertifiacadosController::class, 'index'])->name('certificado.index');
Route::get('certificados-lote',[CertifiacadosController::class, 'all'])->name('certificado-lotes.index'); # ver
Route::get('gestion',[GestionController::class, 'index'])->name('gestion.index');
Route::get('convocatoria',[SiadiConvocatoriaController::class, 'index'])->name('convocatoria.index');
Route::get('convocatoria/{id_convocatoria}',[SiadiConvocatoriaController::class, 'show'])->name('convocatoria.show'); # ver
Route::get('tipo-estudiante',[SiadiTipoEstudianteController::class, 'index'])->name('tipo_estudiante.index');
Route::get('idioma',[IdiomaController::class, 'index'])->name('idioma.index');
Route::get('tipo-convocatoria',[TipoConvocatoriaController::class, 'index'])->name('tipo_convocatoria.index');
Route::get('convocatoria-estudiante',[ConvocatoriaEstudianteController::class, 'index'])->name('convocatoria_estudiante.index');
Route::get('planificar-asignatura',[PlanificarAsignaturaController::class, 'index'])->name('planificar_asignatura.index');
Route::get('planificar-asignatura/{id_planificar_asignatura}', [PlanificarAsignaturaController::class, 'show'])->name('planificar_asignatura.show');
Route::get('asignatura',[AsignaturaController::class, 'index'])->name('asignatura.index');
Route::get('nivel-idioma',[NivelIdiomaController::class, 'index'])->name('nivel_idioma.index');
Route::get('costo',[CostoController::class, 'index'])->name('costo.index');
Route::get('estudiante',[EstudianteController::class, 'index'])->name('estudiante.index');
Route::get('estudiante-record',[EstudianteController::class, 'estudiante_record_view'])->name('estudiante_record.index');
Route::get('asignar-docente',[PlanificarParaleloController::class, 'index'])->name('planificar_paralelo.index');
Route::get('paralelo',[ParaleloController::class, 'index'])->name('paralelo.index');
Route::get('inscripcion',[InscripcionController::class, 'index'])->name('inscripcion.index');
Route::get('convalidacion-homologacion',[ConvalidacionHomologacionController::class, 'index'])->name('convalidacion-homologacion.index');
Route::get('materias.docente',[DocenteController::class, 'index'])->name('docente_materias.index');
Route::get('materias.docente.show/{id_planificar_asignatura}', [DocenteController::class, 'show'])->name('docente.materias.show');
Route::get('materias.docente.pdf_acta_calificaciones/{id_planificar_asignatura}', [DocenteController::class, 'reporte_materia_pdf'])->name('docente.materias.pdf.acta_calificaciones');
Route::get('reporte-docente/{asignatura}/{id_persona}',[DocenteController::class, 'reporte_docente'])->name('reporte_docente');
Route::get('inscripcion/{user}',[InscripcionController::class, 'show'])->name('inscripcion_user.index');
Route::get('intitucion',[InscripcionController::class, 'institucion'])->name('institucion.index');
Route::get('publicaciones',[InscripcionController::class, 'publicaciones'])->name('publicaciones.index');
Route::get('inscripcion-edit/{inscripcion}',[InscripcionController::class, 'show_edit'])->name('inscripcion_user_edit.index');
Route::get('inscripcion-create/{persona}',[InscripcionController::class, 'create'])->name('inscripcion_user_edit.create');
Route::post('inscripcion-store',[InscripcionController::class, 'store'])->name('inscripcion_user_edit.store');
Route::post('inscripcion-anular',[InscripcionController::class, 'anular_insc'])->name('inscripcion_anular.store'); 
Route::put('inscripcion-update/{inscripcion}',[InscripcionController::class, 'update_inscripcion'])->name('inscripcion_user.update');
Route::get('nota',[NotaController::class, 'index'])->name('nota.index');
Route::get('persona',[PersonaController::class, 'index'])->name('persona.index');
Route::get('pre-inscripcion',[PreInscripcionController::class, 'index'])->name('pre-inscripcion.index');
Route::get('persona-pre-inscripcion',[PersonaPreInscripcionController::class, 'index'])->name('persona-pre-inscripcion.index');
Route::get('reporte-preinscripcion/{inscripcion}',[PersonaPreInscripcionController::class, 'imprimir_reporte_preinscripcion'])->name('imprimir_reporte_preinscripcion');
Route::get('boleta-inscripcion/{persona}',[CertifiacadosController::class, 'boleta_de_inscripcion'])->name('imprimir_boleta');


Route::get('migrar',[MigrarController::class, 'index'])->name('migrar.index');
Route::get('sede',[SedeController::class, 'index'])->name('sede.index');
Route::get('inprimirreporteestudiante/{estudiante}',[EstudianteController::class, 'reporte_estudiante'])->name('reporteestudiante');
Route::get('formulario-inscripcion/{persona}',[CertifiacadosController::class, 'get_pdf_inscripcion'])->name('formularioinscripcion');
Route::get('formulario-preinscripcion/{persona}',[CertifiacadosController::class, 'get_pdf_preinscripcion'])->name('formulariopreinscripcion');
Route::get('formulario-preinscripcioninscrito/{persona}',[CertifiacadosController::class, 'get_pdf_preinscripcion_existente'])->name('form_cert_preinscip');

Route::get('reporte_asignatura/{id_planificar_asignatura}', [PlanificarAsignaturaController::class, 'reporte_pdf_asignatura'])->name('reporte_planificar_asignatura');
Route::get('reporte_asignatura_csv/{id_planificar_asignatura}', [PlanificarAsignaturaController::class, 'csv_asignatura'])->name('reporte_planificar_asignatura_csv');
Route::get('reporte_asignatura_excel/{id_planificar_asignatura}', [PlanificarAsignaturaController::class, 'reporte_excel_asignatura'])->name('reporte_planificar_asignatura_excel');
Route::get('certificado_notas/{id_persona}', [PersonaController::class, 'get_certificado_de_notas'])->name('reporte_pdf_certificado_notas');

Route::get('impresion_certificado_pdf/{id_certificado}/{carga_horaria}', [CertifiacadosController::class, 'get_pdf_impresion'])->name('impresion_certificado');  
Route::get('reimpresion_pdf/{id_certificado_reimpresion}', [CertifiacadosController::class, 'get_pdf_reimpresion'])->name('reimpresion');
Route::get('certificado_pdf_plan_asignatura/{id_planificar_asgnatura}', [CertifiacadosController::class, 'get_pdf_impresion_planificar_asignatura'])->name('certificado_asignatura');


# NUEVOS CERTIFICADOS
Route::get('certificados_provisional',[CertificadosProvisionalController::class, 'index'])->name('certificado_provisional.index');
Route::get('impresion_certificado_provisional_pdf/{id_certificado_provisional}/', [CertificadosProvisionalController::class, 'get_pdf_impresion_provisional'])->name('impresion_certificado_provisional');
Route::get('certificados_provisionales_materia/{id_planificar_asgnatura}', [CertificadosProvisionalController::class, 'get_pdf_certificado_provisional_materia'])->name('certificado_provisional_plan_asignatura');
Route::get('certificados-provisional-lote',[CertificadosProvisionalController::class, 'all'])->name('certificado_provisional-lotes.index');

# de notas filtrado por asignatura
Route::get('certificado_prov_notas/{id_nota}', [CertificadosProvisionalController::class, 'get_certificado_de_notas'])->name('reporte_pdf_certificado_prov_notas');

# documentacion
Route::get('documentacion', function(){
    return view('modulos.documentacion'); 
});