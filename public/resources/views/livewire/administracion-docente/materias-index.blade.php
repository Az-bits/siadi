<div>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">MATERIAS DOCENTE</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Docente materias</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body" x-data="{ showButton: false }">

                    <div x-show="showButton" x-cloak>
                        <div class="row">


                            <div class="table-responsive">
                                <center>
                                    <h2>NOMINA DE ESTUDIANTES</h2>
                                </center>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>CI:</th>
                                            <th>NOMBRE</th>

                                            <th>NOTA FINAL</th>
                                            <th>OBSERVACION</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @error('notaerror')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @foreach ($estudiantes_por_materia as $inscripcion)
                                            <tr>
                                                <td>{{ $inscripcion->siadi_persona->ci_persona }}</td>
                                                <td>{{ $inscripcion->siadi_persona->nombres_persona }}
                                                    {{ $inscripcion->siadi_persona->paterno_persona }}
                                                    {{ $inscripcion->siadi_persona->materno_persona }}</td>

                                                <td>
                                                    @if ($editableNotaId === $inscripcion->notas->id_nota)
                                                        <input type="number"
                                                            wire:model="notaFinal.{{ $inscripcion->notas->id_nota }}"
                                                            class="form-control">
                                                        <button class="btn btn-sm btn-danger"
                                                            wire:click="saveNota({{ $inscripcion->notas->id_nota }})">Guardar</button>
                                                    @else
                                                        <span
                                                            id="nota-{{ $inscripcion->notas->id_nota }}">{{ $inscripcion->notas->final_nota }}</span>
                                                        <button class="btn btn-sm btn-success"
                                                            wire:click="editNota({{ $inscripcion->notas->id_nota }})">Editar</button>
                                                    @endif


                                                </td>
                                                <td>
                                                    <span
                                                        id="observacion-{{ $inscripcion->notas->id_nota }}">{{ $inscripcion->notas->observacion_nota }}</span>

                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center"> <button class="btn btn-info"
                                    wire:click.prevent="imprimir_acta({{$id_asignatura_actual}})">
                                    <i class="bx bx-printer"></i> IMPRIMIR ACTA</button></div>
                            </div>


                        </div>
                    </div>
                    <br>
               
@if (count($materiasdocente) > 0)
       <h2 class="text-center">MATERIAS </h2>
                    @foreach ($materiasdocente as $materia)
                        <div class="row ">
                            <div class="col-md-12 border border-2 border-danger rounded">
                                <div class="card-body">
                                    <h5 class="card-title text-center"> ASIGNATURA:
                                        {{ $materia->siadi_asignatura->idioma->nombre_idioma }}
                                        {{ $materia->siadi_asignatura->nivel_idioma->nombre_nivel_idioma }} - PARALELO:
                                        .:: {{ $materia->siadi_paralelo->nombre_paralelo }}
                                        {{ $materia->turno_paralelo }} ::. </h5>


                                </div>
                                <div class="card-footer d-flex justify-content-evenly">

                                    <div>
                                        @if ($materia->estado_planificar_asignartura == 'ACTIVO')
                                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                                x-on:click="showButton = !showButton" x-cloak
                                                wire:click="verestudiantesasignaturas({{ $materia->id_planificar_asignatura }})">
                                                Ver Estudiantes



                                    </div>
                                @else
                                    <div class="text-center"><strong class="text-danger">ASIGNATURA CERRADA</strong>
                                    </div>
                    @endif


                </div>
            </div>
            @endforeach
@else
     <div class="text-center"><strong class="text-danger">SIN ASIGNATURA </strong>
@endif
                 




        </div>
    </div>
</div>
</div>
</div>

@push('navi-js')
    <script>
        // Escuchar el evento para actualizar la nota y observación en tiempo real
        Livewire.on('notaActualizada', (id) => {
            const notaSpan = document.getElementById(`nota-${id}`);
            const observacionSpan = document.getElementById(`observacion-${id}`);
            const newValue = @this.get(`notaFinal.${id}`);

            notaSpan.textContent = newValue;
            observacionSpan.textContent = (newValue >= 51) ? 'APROBADO' : 'REPROBADO';
        });
    </script>
@endpush
</div>
