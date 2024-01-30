<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">PUBLICACIONES</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Publicaciones</li>
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


                        <div class="col-md-6">
                            <button class="btn btn-outline-primary waves-effect waves-light col-md-6 "
                                data-bs-toggle="modal" data-bs-target="#crearpublicacion"> <i
                                    class="bx bxs-plus-circle">AGREGAR</i></button>


                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <input type="text" class="form-control col-md-6" wire:model="search"
                                    placeholder="Buscar...">

                            </div>



                        </div>


                    </div>

                    <div class="row">

                        @foreach ($publicaciones as $pu)
                            <div class="col-md-6 col-lg-6">
                                <div class="card bg-soft-secondary">
                                    <div class="card-title text-center bg-success bg-gradient text-white">
                                          <h2 style="color: black">{{$pu->publicaciones_tipo}}</h2> 
                                        <h3>{{ $pu->publicaciones_titulo }}</h3>
                                        <p>{{ $pu->publicaciones_descripcion }} </p>
                                    </div>
                                    <div class="card-content bg-light">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="align-self-center" style="width: 100%;">
                                                    @if ($pu->publicaciones_tipo == 'Horario')
                                                        <iframe src="{{ $pu->publicaciones_imagen_url }}" class="w-100"
                                                            frameborder="0" allow="download" allowfullscreen
                                                            style="height: 100vh;"></iframe>
                                                    @else
                                                        <img src="{{ $pu->publicaciones_imagen_url }}"
                                                            class="img-fluid w-100" alt="img">
                                                    @endif
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="card-content text-center">
                                           <button type="button"
                                                    class="btn btn-outline-success waves-effect waves-light"
                                                    style="border-radius: 50%" data-bs-toggle="modal"
                                                    data-bs-target="#editarparalelo"
                                                    wire:click="editar_publicacion({{ $pu->publicaciones_id  }})">
                                                    <i class="bx bx-pencil"></i>
                                                </button>


                                                <button type="button"
                                                    class="btn btn-outline-danger waves-effect waves-light"
                                                    style="border-radius: 50%"
                                                    wire:click.prevent="$emit('deletepublicacion', {{ $pu->publicaciones_id  }})">
                                                    <i class="bx bx-trash"></i></button>



                                    </div>
                                </div>



                            </div>
                        @endforeach
                        <div class="d-flex justify-content-center">

                            {{ $publicaciones->links() }}
                        </div>
                    </div>



                </div>




            </div>
        </div>
    </div>

    <div wire:ignore.self data-bs-backdrop="static" id="crearpublicacion" class="modal fade" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">
                        CREAR PUBLICACIÓN
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="cancelar"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3 col-lg-12  ">
                        <label class="form-label">TIPO DE PUBLICACIÓN:</label>

                        <select class="form-select" wire:model="tipopublicacion">
                            <option>Elegir...</option>
                            <option value="Convocatoria">Convocatoria</option>
                            <option value="Comunicados">Comunicados</option>
                            <option value="Horario">Horario</option>

                        </select>
                        @error('tipopublicacion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-lg-12">
                        <label class="form-label">TITULO PUBLICACIÓN:</label>
                        <input type="text" class="form-control" wire:model="titulo">
                        @error('titulo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-12">
                        <label class="form-label">DESCRIPCIÓN PUBLICACIÓN: </label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"wire:model="descripcion"></textarea>

                        @error('descripcion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @if ($tipopublicacion == 'Comunicados' || $tipopublicacion == 'Convocatoria')
                        <div class="mb-3 col-lg-12">
                            <label class="form-label">IMAGEN:</label>
                            <input type="file" class="form-control" wire:model="imagen"
                                accept=".jpg, .jpeg, .png,.pdf">
                            @error('imagen')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-12" wire:loading wire:target="imagen">
                            <span>Cargando imagen...</span>
                        </div>
                        @if ($imagen)
                            <div class="mb-3 col-lg-12">

                                <label class="form-label">Vista Previa:</label>
                                <br>
                                <center><img src="{{ $imagen->temporaryUrl() }}" alt="Vista Previa de la Imagen"
                                        class="img-thumbnail" style="width: 300px; height: 300px;"> </center>



                            </div>
                        @endif


                    @endif
                    @if ($tipopublicacion == 'Horario')
                        <div class="mb-3 col-lg-12">
                            <label class="form-label">PDF:</label>
                            <input type="file" class="form-control" wire:model="imagen" accept=".pdf">
                            @error('imagen')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif











                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"
                        wire:click="cancelar">CANCELAR</button>
                    <button class="btn btn-primary waves-effect waves-light" wire:click="guardar_publicacion">GUARDAR
                        DATOS</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        <style>
            .popup {
                cursor: pointer;
            }
        </style>
    </div>
       <div wire:ignore.self data-bs-backdrop="static" id="editarpublicacion" class="modal fade" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">
                        EDITAR PUBLICACIÓN
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="cancereditar"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3 col-lg-12  ">
                        <label class="form-label">TIPO DE PUBLICACIÓN:</label>

                       <input type="text" class=" form-control" wire:model="tipo_publicacion_edit" disabled style="color: black">
                        @error('tipopublicacion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-lg-12">
                        <label class="form-label">TITULO PUBLICACIÓN:</label>
                        <input type="text" class="form-control" wire:model="titulo_edit">
                        @error('titulo_edit')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-12">
                        <label class="form-label">DESCRIPCIÓN PUBLICACIÓN: </label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"wire:model="descripcion_edit"></textarea>

                        @error('descripcion_edit')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @if ($tipo_publicacion_edit == 'Comunicados' || $tipo_publicacion_edit == 'Convocatoria')
                           <label class="form-label">IMAGEN ACTUAL:</label>
                                <br>
                                <center><img src="{{$imagen_edit}}" alt="Vista Previa de la Imagen"
                                        class="img-thumbnail" style="width: 300px; height: 300px;"> </center>
                        <div class="mb-3 col-lg-12">
                            <label class="form-label">IMAGEN:</label>
                            <input type="file" class="form-control" wire:model="imagen_edit_nuevo"
                                accept=".jpg, .jpeg, .png,.pdf">
                            @error('imagen_edit_nuevo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-12" wire:loading wire:target="imagen_edit_nuevo">
                            <span>Cargando imagen...</span>
                        </div>
                        @if ($imagen_edit_nuevo)
                            <div class="mb-3 col-lg-12">

                                <label class="form-label">Vista Previa:</label>
                                <br>
                                <center><img src="{{ $imagen_edit_nuevo->temporaryUrl() }}" alt="Vista Previa de la Imagen"
                                        class="img-thumbnail" style="width: 300px; height: 300px;"> </center>



                            </div>
                        @endif


                    @endif
                    @if ($tipo_publicacion_edit == 'Horario')
                        <div class="mb-3 col-lg-12">
                              <label class="form-label">PDF ACTUAL:</label>
                                <br>
                                <center><iframe src="{{$imagen_edit}}" alt="Vista Previa de la Imagen"
                                        class="img-thumbnail" ></iframe></center>
                            <label class="form-label">NUEVO PDF:</label>
                            <input type="file" class="form-control" wire:model="imagen_edit_nuevo" accept=".pdf">
                            @error('imagen_edit_nuevo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif











                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal"
                        wire:click="cancereditar">CANCELAR</button>
                    <button class="btn btn-primary waves-effect waves-light" wire:click="guardar_editar_publicacion">GUARDAR
                        DATOS</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        <style>
            .popup {
                cursor: pointer;
            }
        </style>
    </div>
    @push('navi-js')
        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('cerrarmodalcrearpublicacion', function() {
                    $('#crearpublicacion').modal('hide');
                });
            });
        </script>
        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('abrirmodaleditarpublicacion', function() {
                    $('#editarpublicacion').modal('show');
                });
            });
            document.addEventListener('livewire:load', function() {
                Livewire.on('cerrarmodaleditarpublicacion', function() {
                    $('#editarpublicacion').modal('hide');
                });
            });
        </script>
     <script>
                livewire.on('deletepublicacion', id_publicacion=> {
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
                            livewire.emit('delete', id_publicacion);

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
</div>
