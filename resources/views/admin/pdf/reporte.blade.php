<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>

    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #fff;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            /* Colapsa los bordes de las celdas */
            width: 100%;
            /* Ancho de la tabla */
            max-width: 800px;
            /* Ancho máximo para evitar que se vea demasiado grande */
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
            /* Sombra suave */
            background-color: #fff;
            border-radius: 3px;
            overflow: hidden;
            /* Para que el border-radius afecte a los bordes internos */
        }

        thead th {
            background-color: #8f8e8e;
            /* Color de fondo del encabezado */
            color: rgb(31, 30, 30);
            /* Color del texto del encabezado */
            font-weight: bold;
            padding: 2px 6px;
            text-align: left;
            border: 1px solid #878585;
            /* Borde inferior del encabezado */
            font-size: 12px;
        }

        tbody td {
            padding: 2px 4px;
            border: 1px solid #878585;
            /* Línea divisoria entre filas */
            font-size: 12px;
        }

        tbody tr:last-child td {
            /* border-bottom: none; */
            /* Elimina la línea inferior de la última fila */
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
            /* Color de fondo para filas pares (opcional) */
        }

        tbody td:nth-child(4) {
            text-align: right;
            /* Alinea el precio a la derecha */
        }

        /* Estilos al pasar el ratón por encima de las filas (opcional) */
        tbody tr:hover {
            background-color: #e0f7fa;
            cursor: pointer;
        }

        .cabecera {

            background-color: #fff;
            /* Color de fondo claro */
            color: #333;
            /* Color de texto principal */
            padding: 0px;
            display: flex;
            /* Para alinear los elementos horizontalmente */
            justify-content: space-between;
            /* Espacio entre la información y el logo */
            align-items: center;
            /* Centrar verticalmente los elementos */
            border-bottom: 1px solid #121212ab;
            /* Línea divisoria inferior opcional */
            margin-bottom: 1%;
        }

        .info-empresa {
            text-align: left;
            margin: 0%;
            /* Alinea la información a la izquierda */
        }

        .nombre-empresa {
            margin: 0px;
            padding: 0%;
            font-size: 1em;
            font-weight: bold;
        }

        .rif-empresa {
            font-size: 0.7em;
            color: #666;
            margin: 0%;
        }

        .fecha {
            font-size: 0.7em;
            color: #666;
            margin: 0.5%;
            text-align: right
        }

        .logo-empresa {
            position: absolute;
            margin-left: 80%;
            margin-top: -10%;
            width: 150px;
            /* Ancho deseado para el logo */
            height: 150px;
            /* Mantiene la proporción del logo */
        }

        .logo-empresa img {
            max-width: 100%;
            /* Asegura que la imagen no exceda el ancho del contenedor */
            height: 150px;
            /* display: block; */
            /* Elimina espacio extra debajo de la imagen */
        }

        .totales {
            font-size: 0.8em;
            color: #666;
            margin: 0%;
            text-align: right;
            padding: 2px 4px;

            /* Línea divisoria entre filas */
        }
    </style>
</head>

<body>
    <div class="logo-empresa">
        <img src="{{ asset('assets/img/logo-sin-fondo.png') }}" alt="Logo del sistema">
    </div>
    <header class="cabecera">
        <div class="info-empresa">
            <h1 class="nombre-empresa">Reporte de captación del estado Barinas</h1>
            <p class="rif-empresa">Fecha y hora: {{ $info['fecha'] . ' - ' . $info['hora'] }}</p>
        </div>
    </header>

    {{-- <p class="fecha">Fecha y hora: {{ $info['fecha'] . ' - ' . $info['hora'] }}</p> --}}



    @foreach ($municipios as $municipio)
        <table>
            <thead>
                <tr>
                    <td colspan="7" class="municipio">Municipio: {{ $municipio }}</td>
                </tr>

            </thead>
            @foreach ($personas[$municipio] as $parroquia => $arrayPersonas)
                <thead>
                    <tr>
                        <td colspan="7">Parroquia: {{ $parroquia }}</td>
                    </tr>
                </thead>

                <thead>
                    <tr>
                        <th>N#</th>
                        <th>Nombres y Apellidos</th>
                        <th>Cédula</th>
                        <th>Teléfono</th>
                        <th>E-mail</th>
                        <th>Dirección</th>
                        <th>Centro de votación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arrayPersonas as $key => $persona)
                        @php
                            $contador++;
                        @endphp
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $persona->name . ' ' . $persona->last_name }}</td>
                            <td>{{ $persona->dni }}</td>
                            <td>{{ $persona->phone }}</td>
                            <td>{{ $persona->email }}</td>
                            <td>{{ $persona->address }}</td>
                            <td>{{ $persona->voting_center }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7" class="totales">Total de personas de la parroquia {{ $parroquia }}:
                            {{ count($arrayPersonas) }} </td>
                    </tr>
                </tfoot>
            @endforeach
            <tfoot>
                <tr>
                    <td colspan="7" class="totales">Total de personas del municipio {{ $municipio }}:

                        {{ $contador }} </td>
                </tr>
            </tfoot>
            <hr>
            @php
                $contador = 0;
            @endphp
        </table>
    @endforeach
</body>

</html>
