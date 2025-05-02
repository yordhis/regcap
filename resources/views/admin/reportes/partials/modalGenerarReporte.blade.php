<!-- Vertically centered Modal -->
<a class="text-white btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalGenerarReporte">
    <i class="bi bi-file-earmark-excel"></i> <i>Generar reporte</i>
</a>

<div class="modal fade" id="modalGenerarReporte" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Generar reporte de venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Formulario de esxportar las facturas por vendedor  --}}
                <div class="col-12">
                    <p>Configure reporte</p>
                    <form action="{{ route('admin.reportes.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="input-group">
                            <!-- Sedes -->
                            <select class="form-select" name="codigo_sede" id="codigo_sede"
                                aria-label="Example select with button addon" required>
                                <option selected disabled>Seleccione Sede</option>
                                <option value="all">Todo</option>
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
                            <select class="form-select" name="codigo_programa" id="codigo_programa"
                                aria-label="Example select with button addon" required>
                                <option selected disabled>Seleccione Programa</option>
                                <option value="all">Todo</option>
                                @foreach ($programas as $programa)
                                    <option value="{{ $programa->codPrograma }}">{{ $programa->nombre }}</option>
                                @endforeach
                            </select>

                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-file-earmark-excel fs-5"></i><i>Generar reporte</i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->
