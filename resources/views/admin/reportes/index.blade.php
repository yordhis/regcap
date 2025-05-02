@extends('layouts.app')

@section('title', 'Reportes')

@section('content')

    @if (session('mensaje'))
        @include('partials.alert')
    @endif


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
                <h2> Lista de participación </h2>
            </div>
            {{-- Filtro 1 - Filtra los programas --}}
            <div class="col-sm-10 col-xs-12">
                <form action="{{ route('admin.reportes.index') }}" method="post">
                    @csrf
                    @method('GET')
                    <div class="input-group">
                        <input type="hidden" name="filtro" value="1">

                        <!-- Sedes -->
                        <select class="form-select" name="codigo_sede" id="inputGroupSelect04"
                            aria-label="Example select with button addon">
                            <option selected disabled>Seleccione Sede</option>
                            @foreach ($sedes as $sede)
                                <option value="{{ $sede->codigo_sede }}">
                                    {{ $sede->tipo_sede }} -
                                    {{ $sede->nombre_sede }} -
                                    {{ $sede->estado_sede }} -
                                    {{ $sede->municipio_sede }} -
                                    {{ $sede->sector_sede }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Programas -->
                        <select class="form-select" name="codigo_programa" id="inputGroupSelect04"
                            aria-label="Example select with button addon">
                            <option selected disabled>Seleccione Programa</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->codPrograma }}">{{ $programa->nombre }}</option>
                            @endforeach
                        </select>

                        <!-- Carreras -->
                        <select class="form-select" name="codigo_carrera" id="inputGroupSelect04"
                            aria-label="Example select with button addon">
                            <option selected disabled>Seleccione Carrera</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->CodCar }}">{{ $carrera->NombCar }}</option>
                            @endforeach
                        </select>

                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>



            <div class="col-sm-2 col-xs-12">
                <form action="{{ route('admin.reportes.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-primary"> Generar Reporte </button>
                </form>
            </div>


            <div class="col-lg-12 mt-4 ">

                <div class="table-responsive">
                    <!-- LISTA DE reportes -->
                    <table class="table table-hover bg-white">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Cédula</th>
                                <th scope="col">Sede</th>
                                <th scope="col">Programa</th>
                                <th scope="col">Carrera</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($votos as $voto)
                                <tr>
                                    <td>{{ $voto->nombres }}</td>
                                    <td>{{ $voto->apellidos }}</td>
                                    <td>{{ $voto->cedula }}</td>
                                    <td>{{ $voto->nombre_sede }}</td>
                                    <td>{{ $voto->nombre_programa }}</td>
                                    <td>{{ $voto->nombre_carrera }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>

                                <td colspan="9" class="text-center table-secondary">
                                    Total de participación: {{ $votos->total() }} |
                                    <a href="{{ route('admin.reportes.index') }}" class="text-primary">
                                        Ver todo
                                    </a>
                                    <br>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- End LISTA DE votos -->
                    <!-- PAGINACIÓN DE votos -->
                    <div class="col-xs-12 col-sm-6 ">
                        {{ $votos->appends(['filtro' => $request->filtro])->links() }}
                    </div>
                    <!-- CIERRE PAGINACIÓN DE votos -->
                </div>

            </div>
        </div>
    </section>

    {{-- <script src="{{ asset('js/utilidad/autorizacion.js') }}" defer></script>
    <script src="{{ asset('/js/main.js') }}" defer></script> --}}


@endsection
