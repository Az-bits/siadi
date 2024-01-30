<div>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">PERSONAS REGISTRADAS</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Personas</li>
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



                        <br>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearpersona">AGREGAR PERSONA</button>
                                <input type="text" class="form-control col-md-6" wire:model="search"
                                    placeholder="Buscador por C.I.">

                            </div>



                        </div>


                    </div>

                    <br>

                    @if ($personas->count())


                        <div class="table-responsive">
                            <table class="table table-hover mb-0">

                                <thead>
                                    <tr>

                                        <th>
                                            N°
                                        </th>

                                        <th>
                                            NOMBRE COMPLETO
                                        </th>
                                        <th>
                                            CI
                                        </th>

                                        <th>
                                            ESTADO CIVL
                                        </th>
                                        <th>
                                            PAIS
                                        </th>
                                        <th>
                                            GENERO
                                        </th>
                                        <th>
                                            FECHA NACIMIENTO
                                        </th>
                                        <th>
                                            PROFESION
                                        </th>
                                        <th>
                                            DIRECCION
                                        </th>
                                        <th>
                                            TELEFONO
                                        </th>
                                        <th>
                                            CELULAR
                                        </th>


                                        <th>
                                            EMAIL
                                        </th>
                                       
                                        <th>
                                            ACCION
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $cont = 1;
                                    @endphp
                                    @foreach ($personas as $persona)
                                        <tr>

                                            <th>
                                                @php
                                                    echo $cont;
                                                    $cont++;
                                                @endphp
                                            </th>

                                            <td> 
                                                {{ $persona->nombres_persona }} {{ $persona->paterno_persona }} 
                                                {{ $persona->materno_persona }}
                                            </td>

                                            <td>
                                                {{ $persona->ci_persona }} {{ $persona->expedido_persona }}
                                            </td>
                                            <td>
                                                {{ $persona->estado_civil_persona }}
                                            </td>
                                            <td>
                                                {{ $persona->pais_persona }}
                                            </td>
                                            <td>
                                                {{ $persona->genero_persona }}
                                            </td>

                                            <td>
                                                {{ $persona->fecha_nacimiento_persona }}
                                            </td>
                                            <td>
                                                {{ $persona->profesion_persona }}
                                            </td>
                                            <td>
                                                {{ $persona->direccion_persona }}
                                            </td>
                                            <td>
                                                {{ $persona->telefono_persona }}
                                            </td>
                                            <td>
                                                {{ $persona->celular_persona }}
                                            </td>
                                            <td>
                                                {{ $persona->email_persona }}
                                            </td>

                                          
                                            <td>


                                                <button type="button"
                                                    class="btn btn-outline-success waves-effect waves-light"
                                                    style="border-radius: 50%" 
                                                    wire:click="editar_persona({{ $persona->id_siadi_persona }})">
                                                    <i class="bx bx-pencil"></i>
                                                </button>


                                              
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="d-flex justify-content-center">

                            {{ $personas->links() }}
                        </div>

                </div>
            @else
                <div class="px-5 py-3 border-gray-200  text-sm">
                    <strong>No hay Registros</strong>
                </div>
                @endif
            </div>



            <div wire:ignore.self data-bs-backdrop="static" id="editarpersona" class="modal fade" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content modal-lg">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel"> EDITAR PERSONA

                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                wire:click="cancelarEditar"></button>
                        </div>
                        <div class="modal-body">





                            <div class="row">

                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">CI:</label>
                                        <input type="text" class="form-control" wire:model="ci_edit">
                                        @error('ci_edit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">EXPEDIDO:</label>
                                        <input type="text" class="form-control" wire:model="expedido_edit">
                                        @error('expedido_edit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">ESTADO CIVIL:</label>
                                        <input type="text" class="form-control" wire:model="estado_civil_edit">
                                        @error('estado_civil_edit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">NOMBRE:</label>
                                        <input type="text" class="form-control" wire:model="nombre_edit">
                                        @error('nombre_edit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">PATERNO:</label>
                                        <input type="text" class="form-control" wire:model="paterno_edit">
                                        @error('paterno_edit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">MATERNO:</label>
                                        <input type="text" class="form-control" wire:model="materno_edit">
                                        @error('materno_edit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">PAIS:</label>
                                        <input type="text" class="form-control" wire:model="pais_edit">
                                        @error('pais_edit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">GENERO:</label>

                                        <select class="form-select"wire:model="genero_edit">
                                            <option value="M">MASCULINO</option>
                                            <option value="F">FEMENINO</option>
                                        </select>
                                        @error('genero_edit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">FECHA DE NACIMIENTO:</label>
                                        <input type="date" class="form-control"
                                            wire:model="fecha_nacimiento_edit">
                                        @error('fecha_nacimiento_edit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">PROFESION:</label>
                                        <input type="text" class="form-control" wire:model="profesion_edit">
                                        @error('profesion_edit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">DIRECCION:</label>
                                        <input type="text" class="form-control" wire:model="direccion_edit">
                                        @error('direccion_edit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">TELEFONO:</label>
                                        <input type="text" class="form-control" wire:model="telefono_edit">
                                        @error('telefono_edit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">CELULAR:</label>
                                        <input type="text" class="form-control" wire:model="celular_edit">
                                        @error('celular_edit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">EMAIL:</label>
                                        <input type="text" class="form-control" wire:model="email_edit">
                                        @error('email_edit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">TIPO ESTUDIANTE:</label>
                                        <select wire:model="tipo_estudiante_edit" class="form-select"
                                            aria-label="Default select example">
                                            <option>Elegir...</option>
                                            @foreach ($tipo_estudiante2 as $tipo_e)
                                                <option value="{{ $tipo_e->id_tipo_estudiante }}">
                                                    {{ $tipo_e->nombre_tipo_estudiante }}</option>
                                            @endforeach






                                        </select>
                                        @error('tipo_estudiante_edit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>



                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-danger waves-effect"
                                data-bs-dismiss="modal">CANCELAR</button>
                            <button class="btn btn-primary waves-effect waves-light"
                                wire:click="guardareditarapersona">GUARDAR DATOS</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->

            </div>




            <div wire:ignore.self data-bs-backdrop="static"  id="crearpersona" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel">AGREGAR idioma
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                wire:click="cancelar"></button>
                        </div>
                        <div class="modal-body">
  <div class="row">

                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">CI:</label>
                                        <input type="text" class="form-control" wire:model="ci">
                                        @error('ci')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">EXPEDIDO:</label>
                                        <input type="text" class="form-control" wire:model="expedido">
                                        @error('expedido')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">ESTADO CIVIL:</label>
                                        <input type="text" class="form-control" wire:model="estado_civil">
                                        @error('estado_civil')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">NOMBRE:</label>
                                        <input type="text" class="form-control" wire:model="nombre">
                                        @error('nombre')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">PATERNO:</label>
                                        <input type="text" class="form-control" wire:model="paterno">
                                        @error('paterno')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">MATERNO:</label>
                                        <input type="text" class="form-control" wire:model="materno">
                                        @error('materno')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">PAIS:</label>
                                        <input type="text" class="form-control" wire:model="pais">
                                        @error('pais')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">GENERO:</label>

                                        <select class="form-select"wire:model="genero">
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
                                        <label class="form-label">FECHA DE NACIMIENTO:</label>
                                        <input type="date" class="form-control"
                                            wire:model="fecha_nacimiento">
                                        @error('fecha_nacimiento')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">PROFESION:</label>
                                        <input type="text" class="form-control" wire:model="profesion">
                                        @error('profesion')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">DIRECCION:</label>
                                        <input type="text" class="form-control" wire:model="direccion">
                                        @error('direccion')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">TELEFONO:</label>
                                        <input type="text" class="form-control" wire:model="telefono">
                                        @error('telefono')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">CELULAR:</label>
                                        <input type="text" class="form-control" wire:model="celular">
                                        @error('celular')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">EMAIL:</label>
                                        <input type="text" class="form-control" wire:model="email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">TIPO ESTUDIANTE:</label>
                                        <select wire:model="tipo_estudiante" class="form-select"
                                            aria-label="Default select example">
                                            <option>Elegir...</option>
                                            @foreach ($tipo_estudiante2 as $tipo_est)
                                                <option value="{{ $tipo_est->id_tipo_estudiante }}">
                                                    {{ $tipo_est->nombre_tipo_estudiante }}</option>
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
                            <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"
                                wire:click="cancelar">CANCELAR</button>
                            <button wire:click="guardarpersonanueva"
                                class="btn btn-primary waves-effect waves-light">GUARDAR DATOS</button>
                        </div>

                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>

        </div>

        @push('navi-js')
            <script>
                document.addEventListener('livewire:load', function() {
                    Livewire.on('abrirnodaleditarpersona', function() {
                        $('#editarpersona').modal('show');
                    });
                });
                document.addEventListener('livewire:load', function() {
                    Livewire.on('cerrarmodaldeeditar', function() {
                        $('#editarpersona').modal('hide');
                    });
                });
                document.addEventListener('livewire:load', function() {
                    Livewire.on('cerrarmodaldeguardarpersona', function() {
                        $('#crearpersona').modal('hide');
                    });
                });
            </script>
        @endpush
        @push('navi-js')
            <script>
                document.addEventListener('livewire:load', function() {
                    Livewire.on('closeModalEdit', function() {
                        $('#editaridioma').modal('hide');
                    });
                });
            </script>
        @endpush
        @push('navi-js')
            <script>
                livewire.on('deleteconvoca', id_siadi_convocatoria => {
                    Swal.fire({
                        title: 'Esta seguro/segura ?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '¡Sí, bórralo!'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            // livewire.emitTo('servidor-index', 'delete', ServidorId);
                            livewire.emit('delete', id_siadi_convocatoria);

                            Swal.fire(
                                'Eliminado!',
                                'Su Registro ha sido eliminado..',
                                'Exitosamente'
                            )
                        }
                    })
                });
            </script>
        @endpush
