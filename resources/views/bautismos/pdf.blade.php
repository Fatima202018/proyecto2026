
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificación de Bautismo</title>
    <style>
        @page {
            margin: 45px 55px;
        }

        body {
            font-family: "DejaVu Sans", sans-serif;
            color: #263238;
            font-size: 12px;
            line-height: 1.6;
        }

        .marco {
            border: 2px solid #b08d45;
            padding: 25px;
            min-height: 850px;
        }

        .encabezado {
            text-align: center;
        }

        .logo {
            height: 85px;
            max-width: 110px;
            margin-bottom: 8px;
        }

        .parroquia {
            font-size: 20px;
            font-weight: bold;
            color: #263b53;
            text-transform: uppercase;
        }

        .subtitulo {
            color: #777;
            font-size: 11px;
        }

        .titulo {
            margin-top: 25px;
            font-size: 21px;
            color: #263b53;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .referencia {
            margin-top: 10px;
            padding: 9px;
            background: #f5f1e8;
            border: 1px solid #d8c69e;
            text-align: center;
        }

        .seccion {
            margin-top: 22px;
        }

        .seccion h3 {
            color: #8b6b2e;
            font-size: 12px;
            border-bottom: 1px solid #c8b27e;
            padding-bottom: 5px;
            text-transform: uppercase;
        }

        .dato {
            margin: 8px 0;
        }

        .etiqueta {
            font-weight: bold;
            color: #34495e;
        }

        .notas {
            min-height: 45px;
        }

        .certificacion {
            margin-top: 25px;
            text-align: justify;
        }

        .firmas {
            margin-top: 65px;
            width: 100%;
            text-align: center;
        }

        .firma {
            border-top: 1px solid #333;
            width: 220px;
            margin: 0 auto;
            padding-top: 7px;
        }

        .sello {
            max-height: 90px;
            max-width: 100px;
            margin-bottom: 8px;
        }

        .pie {
            margin-top: 25px;
            text-align: center;
            font-size: 9px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="marco">

    <div class="encabezado">

        @if($configuracion?->logo && file_exists(public_path('storage/' . $configuracion->logo)))
            <img class="logo"
                 src="{{ public_path('storage/' . $configuracion->logo) }}">
        @endif

        <div class="parroquia">
            {{ $configuracion?->nombre_parroquia ?? 'PARROQUIA' }}
        </div>

        <div class="subtitulo">
            {{ $configuracion?->nombre_diocesis ?? '' }}
        </div>

        <div class="subtitulo">
            {{ $configuracion?->direccion ?? '' }}
        </div>

        <div class="subtitulo">
            {{ $configuracion?->municipio ?? '' }}
            {{ $configuracion?->departamento ? ', ' . $configuracion->departamento : '' }}
        </div>

        <div class="titulo">
            CERTIFICACIÓN DE BAUTISMO
        </div>

    </div>

    <div class="referencia">
        <strong>Libro:</strong> {{ $bautismo->libro ?? '—' }}
        &nbsp;&nbsp;
        <strong>Folio:</strong> {{ $bautismo->folio ?? '—' }}
        &nbsp;&nbsp;
        <strong>Partida:</strong> {{ $bautismo->numero_partida }}
    </div>

    <div class="seccion">
        <h3>Datos de la persona bautizada</h3>

        <div class="dato">
            <span class="etiqueta">Nombre completo:</span>
            {{ $bautismo->nombres }} {{ $bautismo->apellidos }}
        </div>

        <div class="dato">
            <span class="etiqueta">Sexo:</span>
            {{ $bautismo->sexo ?? '—' }}
        </div>

        <div class="dato">
            <span class="etiqueta">Fecha de nacimiento:</span>
            {{ $bautismo->fecha_nacimiento?->format('d/m/Y') ?? '—' }}
        </div>

        <div class="dato">
            <span class="etiqueta">Lugar de nacimiento:</span>
            {{ $bautismo->lugar_nacimiento ?? '—' }}
        </div>
    </div>

    <div class="seccion">
        <h3>Datos familiares</h3>

        <div class="dato">
            <span class="etiqueta">Padre:</span>
            {{ $bautismo->nombre_padre ?? '—' }}
        </div>

        <div class="dato">
            <span class="etiqueta">Madre:</span>
            {{ $bautismo->nombre_madre ?? '—' }}
        </div>

        <div class="dato">
            <span class="etiqueta">Padrino:</span>
            {{ $bautismo->nombre_padrino ?? '—' }}
        </div>

        <div class="dato">
            <span class="etiqueta">Madrina:</span>
            {{ $bautismo->nombre_madrina ?? '—' }}
        </div>
    </div>

    <div class="seccion">
        <h3>Datos del sacramento</h3>

        <div class="dato">
            <span class="etiqueta">Fecha de bautismo:</span>
            {{ $bautismo->fecha_bautismo?->format('d/m/Y') }}
        </div>

        <div class="dato">
            <span class="etiqueta">Lugar de bautismo:</span>
            {{ $bautismo->lugar_bautismo ?? '—' }}
        </div>

        <div class="dato">
            <span class="etiqueta">Ministro celebrante:</span>
            {{ $bautismo->ministro_celebrante ?? '—' }}
        </div>
    </div>

    @if($bautismo->observaciones || $bautismo->notas_marginales)
        <div class="seccion">
            <h3>Observaciones y notas marginales</h3>

            @if($bautismo->observaciones)
                <div class="dato">
                    <span class="etiqueta">Observaciones:</span>
                    {{ $bautismo->observaciones }}
                </div>
            @endif

            @if($bautismo->notas_marginales)
                <div class="dato">
                    <span class="etiqueta">Notas marginales:</span>
                    {{ $bautismo->notas_marginales }}
                </div>
            @endif
        </div>
    @endif

    <div class="certificacion">
        La presente certificación se extiende a solicitud de la
        persona interesada, conforme a los datos que constan en
        los registros parroquiales.
    </div>

    <div class="firmas">

        @if($configuracion?->sello && file_exists(public_path('storage/' . $configuracion->sello)))
            <img class="sello"
                 src="{{ public_path('storage/' . $configuracion->sello) }}">
            <br>
        @endif

        <div class="firma">
            {{ $configuracion?->nombre_parroco ?? 'Párroco' }}
            <br>
            Párroco
        </div>

    </div>

    <div class="pie">
        {{ $configuracion?->nombre_parroquia ?? 'Parroquia' }}
        @if($configuracion?->telefono)
            | Tel. {{ $configuracion->telefono }}
        @endif
        @if($configuracion?->correo)
            | {{ $configuracion->correo }}
        @endif
    </div>

</div>

</body>
</html>
