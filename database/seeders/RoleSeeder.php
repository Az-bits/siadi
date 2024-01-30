<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1= Role::create(['name'=> 'Admin']);
       $rol2= Role::create(['name'=> 'Director']);
        $rol3=Role::create(['name'=> 'Kardex']);
       $rol4= Role::create(['name'=> 'Secretaria']);
        $rol5=Role::create(['name'=> 'Docente']);
       $rol6= Role::create(['name'=> 'Estudiante']);
       $rol7= Role::create(['name'=> 'Auxiliar']);
       $rol8= Role::create(['name'=> 'DepPosgrado']);

       Permission::create(['name' => 'admin.home.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'usuario.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'usuario.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'usuario.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'usuario.delete'])->syncRoles([$rol1]);
       Permission::create(['name' => 'role.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'role.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'role.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'role.delete'])->syncRoles([$rol1]);
 
       Permission::create(['name' => 'gestiones.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'gestiones.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'gestiones.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'gestiones.delete'])->syncRoles([$rol1]);
       Permission::create(['name' => 'gestiones.estado'])->syncRoles([$rol1]);
       Permission::create(['name' => 'tipo_estudiante.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'tipo_estudiante.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'tipo_estudiante.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'tipo_estudiante.delete'])->syncRoles([$rol1]);
       Permission::create(['name' => 'tipo_estudiante.estado'])->syncRoles([$rol1]);
       Permission::create(['name' => 'idioma.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'idioma.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'idioma.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'idioma.delete'])->syncRoles([$rol1]);
       Permission::create(['name' => 'idioma.estado'])->syncRoles([$rol1]);
       Permission::create(['name' => 'nivel_idioma.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'nivel_idioma.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'nivel_idioma.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'nivel_idioma.delete'])->syncRoles([$rol1]);
       Permission::create(['name' => 'nivel_idioma.estado'])->syncRoles([$rol1]);
       Permission::create(['name' => 'convocatoria_estudiante.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'convocatoria_estudiante.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'convocatoria_estudiante.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'convocatoria_estudiante.delete'])->syncRoles([$rol1]);
       Permission::create(['name' => 'convocatoria_estudiante.estado'])->syncRoles([$rol1]);
       Permission::create(['name' => 'costo.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'costo.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'costo.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'costo.delete'])->syncRoles([$rol1]);
       Permission::create(['name' => 'paralelo.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'paralelo.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'paralelo.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'paralelo.delete'])->syncRoles([$rol1]);
       Permission::create(['name' => 'paralelo.estado'])->syncRoles([$rol1]);
       Permission::create(['name' => 'tipo_convocatoria.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'tipo_convocatoria.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'tipo_convocatoria.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'tipo_convocatoria.delete'])->syncRoles([$rol1]);
       Permission::create(['name' => 'tipo_convocatoria.estado'])->syncRoles([$rol1]);
       Permission::create(['name' => 'asignaturas.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'asignaturas.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'asignaturas.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'asignaturas.delete'])->syncRoles([$rol1]);
       Permission::create(['name' => 'asignaturas.estado'])->syncRoles([$rol1]);
       Permission::create(['name' => 'planificar_convocatoria.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'planificar_convocatoria.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'planificar_convocatoria.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'planificar_convocatoria.delete'])->syncRoles([$rol1]);
       Permission::create(['name' => 'planificar_convocatoria.estado'])->syncRoles([$rol1]);
       Permission::create(['name' => 'planificar_asignatura.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'planificar_asignatura.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'planificar_asignatura.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'planificar_asignatura.delete'])->syncRoles([$rol1]);
       Permission::create(['name' => 'planificar_asignatura.estado'])->syncRoles([$rol1]);
       Permission::create(['name' => 'planificar_paralelo.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'planificar_paralelo.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'planificar_paralelo.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'planificar_paralelo.delete'])->syncRoles([$rol1]);
       Permission::create(['name' => 'planificar_paralelo.estado'])->syncRoles([$rol1]);
       Permission::create(['name' => 'preinscripcion.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'preinscripcion.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'preinscripcion.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'preinscripcion.delete'])->syncRoles([$rol1]);
       Permission::create(['name' => 'preinscripcion.estado'])->syncRoles([$rol1]);
       Permission::create(['name' => 'inscripcion.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'inscripcion.create'])->syncRoles([$rol1]);
       Permission::create(['name' => 'inscripcion.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'inscripcion.delete'])->syncRoles([$rol1]);
       Permission::create(['name' => 'inscripcion.estado'])->syncRoles([$rol1]);
       Permission::create(['name' => 'personas.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'personas.edit'])->syncRoles([$rol1]);
       Permission::create(['name' => 'personas.inscribir'])->syncRoles([$rol1]);
      
       Permission::create(['name' => 'buscar_certificado.index'])->syncRoles([$rol1]);
       Permission::create(['name' => 'buscar_certificado.imprimir_certificado'])->syncRoles([$rol1]);
       Permission::create(['name' => 'docente.materias'])->syncRoles([$rol5]);
       Permission::create(['name' => 'estudiante.preinscripcion'])->syncRoles([$rol6]);
       
       
       
     
    }
}
