<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">INTITUCION</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active"> Institución</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-widgets py-3">

                        <div class="text-center">
                            <div class="">
                                <img src="{{ asset('assets/dashboard/assets/images/upea2.png') }}" alt=""
                                    class="avatar-lg mx-auto img-thumbnail rounded-circle">
                                <div class="online-circle"><i class="fas fa-circle text-success"></i>
                                </div>
                            </div>

                            <div class="mt-3 ">
                                <a href="#" class="text-reset fw-medium font-size-16">DATOS DE LA INTTITUCIÓN</a>
                                <p class="text-body mt-1 mb-1">DPTO. IDIOMAS</p>


                            </div><br> <br>
                            {{-- <div class="text-center">

                                    <h3>DATOS PERSONALES</h3>
                                </div> --}}
                            <div class="row mt-4 border border-start-0 border-end-0 p-3">
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">NOMBRE DE LA INSTITUCIÓN:</label>
                                        <input type="text" class="form-control" wire:model="nombre">
                                        @error('nombre')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>

                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">TITULO O DETALLE DE LA
                                            INSTITUCIÓN</label>
                                        <input type="text" class="form-control" wire:model="titulo">
                                        @error('titulo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>

                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">OTRA CARACTERISTICA</label>
                                        <input type="text" class="form-control" wire:model="sub_titulo">
                                        @error('sub_titulo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>

                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">MISIÓN</label>
                                        <textarea wire:model="mision" class="form-control"></textarea>
                                        @error('mision')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>

                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">VISIÓN</label>
                                        <textarea wire:model="vision" class="form-control"></textarea>
                                        @error('vision')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>

                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">HISTORIA</label>
                                        <textarea wire:model="historia"class="form-control"></textarea>
                                        @error('expedido')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>

                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">URL INSTAGRAM:</label>
                                        <input type="text" class="form-control" wire:model="instagram">
                                        @error('instagram')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>

                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">URL TIKTOK</label>
                                        <input type="text" class="form-control" wire:model="tiktok">
                                        @error('tiktok')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>

                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">URL FACEBOOL</label>
                                        <input type="text" class="form-control" wire:model="facebook">
                                        @error('facebook')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>

                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">URL YOUTUBE</label>
                                        <input type="text" class="form-control"wire:model="youtube">
                                        @error('youtube')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>

                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">URL TWITTER</label>
                                        <input type="text" class="form-control"wire:model="twitter">
                                        @error('twitter')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>

                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">TELEFONO - CELULAR</label>
                                        <input type="text" class="form-control"wire:model="telefono">
                                        @error('telefono')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>

                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">LOGO</label>
                                        <input type="file" accept=".jpg,.png"
                                            class="form-control"wire:model="logo_imagen_agregar">
                                        <iframe src="{{ $logo }}" frameborder="0"></iframe>
                                        @error('logo_imagen_agregar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>
                                    <div class="mb-3 " wire:loading wire:target="logo_imagen_agregar">
                                        <span>Cargando imagen...</span>
                                    </div>

                                    <!-- Vista previa de la imagen -->
                                    @if ($logo_imagen_agregar)
                                        <div class="mb-3">

                                            <label class="form-label">Vista Previa:</label>
                                            <br>
                                            <center><img src="{{ $logo_imagen_agregar->temporaryUrl() }}"
                                                    alt="Vista Previa de la Imagen" class="img-thumbnail"
                                                    style="width: 200px; height: 200px;"> </center>



                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">BANNER 1</label>
                                        <input type="file"accept=".jpg,.png"
                                            class="form-control"wire:model="banner_uno">
                                        <iframe src="{{ $banner1 }}" frameborder="0"></iframe>
                                        @error('banner_uno')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>
                                    <div class="mb-3 " wire:loading wire:target="banner_uno">
                                        <span>Cargando imagen...</span>
                                    </div>

                                    <!-- Vista previa de la imagen -->
                                    @if ($banner_uno)
                                        <div class="mb-3">

                                            <label class="form-label">Vista Previa:</label>
                                            <br>
                                            <center><img src="{{ $banner_uno->temporaryUrl() }}"
                                                    alt="Vista Previa de la Imagen" class="img-thumbnail"
                                                    style="width: 200px; height: 200px;"> </center>



                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">BANNER 2</label>
                                        <input type="file"accept=".jpg,.png"
                                            class="form-control"wire:model="banner_dos">
                                        <iframe src="{{ $banner2 }}" frameborder="0"></iframe>
                                        @error('banner_dos')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>
                                    <div class="mb-3 " wire:loading wire:target="banner_dos">
                                        <span>Cargando imagen...</span>
                                    </div>

                                    <!-- Vista previa de la imagen -->
                                    @if ($banner_dos)
                                        <div class="mb-3">

                                            <label class="form-label">Vista Previa:</label>
                                            <br>
                                            <center><img src="{{ $banner_dos->temporaryUrl() }}"
                                                    alt="Vista Previa de la Imagen" class="img-thumbnail"
                                                    style="width: 200px; height: 200px;"> </center>



                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">RECTOR</label>
                                        <input type="text" class="form-control" wire:model="rector_nombre">

                                        <iframe src="{{ $rector_imagen }}" frameborder="0"></iframe>
                                        <input type="file" accept=".jpg,.png"class="form-control"
                                            wire:model="rector_imagen_agregar">

                                        @error('rector_imagen_agregar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>
                                    <div class="mb-3 " wire:loading wire:target="rector_imagen_agregar">
                                        <span>Cargando imagen...</span>
                                    </div>

                                    <!-- Vista previa de la imagen -->
                                    @if ($rector_imagen_agregar)
                                        <div class="mb-3">

                                            <label class="form-label">Vista Previa:</label>
                                            <br>
                                            <center><img src="{{ $rector_imagen_agregar->temporaryUrl() }}"
                                                    alt="Vista Previa de la Imagen" class="img-thumbnail"
                                                    style="width: 200px; height: 200px;"> </center>



                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">VICERECTOR</label>
                                        <input type="text" class="form-control"wire:model="vicerector_nombre">
                                        <iframe src="{{ $vicerector_imagen }}" frameborder="0"></iframe>
                                        <input type="file"accept=".jpg,.png"
                                            class="form-control"wire:model="vicerector_imagen_agregar">

                                        @error('vicerector_imagen_agregar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>
                                    <div class="mb-3 " wire:loading wire:target="vicerector_imagen_agregar">
                                        <span>Cargando imagen...</span>
                                    </div>

                                    <!-- Vista previa de la imagen -->
                                    @if ($vicerector_imagen_agregar)
                                        <div class="mb-3">

                                            <label class="form-label">Vista Previa:</label>
                                            <br>
                                            <center><img src="{{ $vicerector_imagen_agregar->temporaryUrl() }}"
                                                    alt="Vista Previa de la Imagen" class="img-thumbnail"
                                                    style="width: 200px; height: 200px;"> </center>



                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">
                                        <label for="" class="form-label">JEFE DEL DPTO. IDIOMAS</label>
                                        <input type="text" class="form-control"wire:model="jefe_nombre">
                                        <iframe src="{{ $jefe_imagen }}" frameborder="0"></iframe>
                                        <input type="file"accept=".jpg,.png"
                                            class="form-control"wire:model="jefe_imagen_agregar">

                                        @error('jefe_imagen_agregar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </h6>
                                    <div class="mb-3 " wire:loading wire:target="jefe_imagen_agregar">
                                        <span>Cargando imagen...</span>
                                    </div>

                                    <!-- Vista previa de la imagen -->
                                    @if ($jefe_imagen_agregar)
                                        <div class="mb-3">

                                            <label class="form-label">Vista Previa:</label>
                                            <br>
                                            <center><img src="{{ $jefe_imagen_agregar->temporaryUrl() }}"
                                                    alt="Vista Previa de la Imagen" class="img-thumbnail"
                                                    style="width: 200px; height: 200px;"> </center>



                                        </div>
                                    @endif
                                </div>



                            </div>
                            <div class="text-center">
                                <button class="btn btn-success" wire:click.prevent="$emit('updatedatos')">EDITAR DATOS
                                </button>

                            </div>
                            <div class="mt-4">

                                <ui class="list-inline social-source-list">
                                    <li class="list-inline-item">
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle">
                                                <i class="mdi mdi-facebook"></i>
                                            </span>
                                        </div>
                                    </li>

                                    <li class="list-inline-item">
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-info">
                                                <i class="mdi mdi-twitter"></i>
                                            </span>
                                        </div>
                                    </li>

                                    <li class="list-inline-item">
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-danger">
                                                <i class="mdi mdi-google-plus"></i>
                                            </span>
                                        </div>
                                    </li>

                                    <li class="list-inline-item">
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-pink">
                                                <i class="mdi mdi-instagram"></i>
                                            </span>
                                        </div>
                                    </li>
                                </ui>

                            </div>
                        </div>

                    </div>
                </div>
            </div>




        </div>




    </div>
    @push('navi-js')
        <script>
            livewire.on('updatedatos', () => {
                Swal.fire({
                    title: '¿Está seguro/a de actualizar sus datos de la institucion?',
                    text: '¡No podrá revertir esto!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, editar datos!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        livewire.emit('updateinstitucion');

                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            'Datos seguros',
                            'Sus datos personales están seguros.',
                            'info'
                        );
                    }
                });
            });
        </script>
    @endpush
</div>
