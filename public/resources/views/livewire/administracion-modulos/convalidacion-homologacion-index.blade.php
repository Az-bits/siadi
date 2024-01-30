<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">CONVALIDACION - HOMOLOGACION</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Convalidacion Homologacion</li>
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
                        <br>
                        <br>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <input type="text" class="form-control col-md-6" wire:model="search"
                                    placeholder="Buscador por C.I.:">
                            </div>
                        </div>
                    </div>
                    <br>
                    {{-- <pre>
                        {{ print_r($materias) }}
                    </pre> --}}
                    @if (!empty($lista))
                        <div class="row">
                            @foreach ($materias as $materia)
                                <div class="col-6 card border px-4 py-3">
                                    <p class="my-0">
                                        <b>CI: </b>10102012
                                    </p>
                                    <p class="my-0">
                                        <b>Nombres:</b>
                                        Garg arga g eagerger
                                    </p>
                                    <p class="my-0">
                                        <b>Materia: </b>
                                        {{ $materia['nombre'] }}
                                    </p>
                                    <p class="my-0">
                                        <b>Niveles: </b>
                                    </p>
                                    <p class="my-0">
                                        <b>Basico: </b><br>
                                        <b>1.1 => </b>{{ $materia['1.1'] }}
                                        <br>
                                        <b>1.2 => </b>{{ $materia['1.2'] }}
                                    </p>
                                    <p class="my-0">
                                        <b>Intermedio: </b><br>
                                        <b>2.1 => </b>{{ $materia['2.1'] }}
                                        <br>
                                        <b>2.2 => </b>{{ $materia['2.2'] }}
                                    </p>
                                    <p class="my-0">
                                        <b>Superior: </b><br>
                                        <b>3.1 => </b>{{ $materia['3.1'] }}
                                        <br>
                                        <b>3.2 => </b>{{ $materia['3.2'] }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center">No hay registros</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @push('navi-js')
    <script>
        livewire.on('inscribirestudiante', id_preinscripcion => {
            Swal.fire({
                title: 'Esta seguro de inscribir al Estudiante?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, inscribir a las materias!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // livewire.emitTo('servidor-index', 'delete', ServidorId);
                    livewire.emit('inscripbir', id_preinscripcion);
                }
            })
        });
        document.addEventListener('livewire:load', function() {
            Livewire.on('abrirmodalinscpp', function() {
                $('#modalinscrip').modal('show');
            });
        });
    </script>
@endpush --}}
