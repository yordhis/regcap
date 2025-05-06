@extends('layouts.app')

@section('title', 'Registros')

@section('content')

    @if (session('mensaje'))
        @include('partials.alert')
    @endif

    <div id="alert"></div>

    {{-- respuesta de validadciones --}}
    <div class="col-12">
        @if ($errors->any())
            <div class="alert alert-danger text-start">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <section class="section">
        <div class="row">

            <div class="col-12">
                <h2> Lista de registros </h2>
            </div>
            <div class="col-sm-4 col-xs-12 ">
                @include('admin.personas.partials.modalFormulario')

                <form action="{{ route('admin.person.exportPDF')}}" method="post" target="_blank">
                    @csrf
                    <button class="btn btn-danger my-2" type="submit" id="button-addon2">
                        <i class="bi bi-file"></i> Generar reporte
                    </button>
                </form>
            </div>
            <div class="col-sm-8 col-xs-12">
                <form action="{{ route('admin.person.index') }}" method="post">
                    @csrf
                    @method('get')
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="filtro"
                            placeholder="Filtrar (Por cédula o Por nombre)" aria-label="Filtrar"
                            aria-describedby="button-addon2" required>
                        <button class="btn btn-primary" type="submit" id="button-addon2">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-lg-12 table-responsive">
                <!-- Table with stripped rows -->

                <table class="table table-hover  bg-white mt-2">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th scope="col">#</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Cédula</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Centro de votación</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($people as $person)
                            <tr>
                                <td scope="row">{{ $person->id }}</td>
                                <td>{{ $person->name }}</td>
                                <td>{{ $person->last_name }}</td>
                                <td>{{ $person->dni }}</td>
                                <td>{{ $person->phone }}</td>
                                <td>{{ $person->voting_center }}</td>
                
                

                                <td>

                                    {{-- Boton modal de info del estudiante --}}
                                    @include('admin.personas.partials.modaldialog') 

                                    {{-- Boton editar --}}
                                    @include('admin.personas.partials.modalFormularioEditar') 


                                    {{-- Boton eliminar --}}
                                    @include('admin.personas.partials.modal')
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>

                            <td colspan="7" class="text-center table-secondary">
                                Total de Registros: {{ $people->total() }} |
                                <a href="{{ route('admin.person.index') }}" class="text-primary">
                                    Ver todo
                                </a>
                                <br>
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <!-- End Table with stripped rows -->
                <div class="col-xs-12 col-sm-6 ">
                    {{ $people->appends(['filtro' => $request->filtro])->links() }}
                </div>

            </div>




        </div>



    </section>
@endsection
