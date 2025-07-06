<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard del Estudiante</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
            background-color: #f9f9f9;
            color: #333;
        }
        .alert {
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid #ccc;
        }
        .alert-warning {
            background-color: #fff3cd;
            border-color: #ffeeba;
            color: #856404;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        h1 {
            margin-bottom: 1rem;
        }
        ul {
            margin-top: 0.5rem;
            padding-left: 1.5rem;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .curso-box {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <h1>Panel del Estudiante</h1>

    @if($pruebasProximas->isNotEmpty())
        <div class="alert alert-warning">
            <h2>📌 ¡Tienes pruebas próximas!</h2>
            @foreach($pruebasProximas as $info)
                <div class="curso-box">
                    <strong>Curso:</strong> {{ $info['curso'] }}<br>
                    <strong>Prueba:</strong> {{ $info['prueba'] }}<br>
                    <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($info['fecha'])->format('d/m/Y H:i') }}
                    <ul>
                        @foreach($info['temas'] as $id => $tema)
                            <li><a href="{{ route('temas.show', $id) }}">{{ $tema }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-success">
            ✅ No tienes pruebas próximas con temas pendientes. ¡Buen trabajo!
        </div>
    @endif

    <p>Esta es tu página principal. Aquí puedes agregar más secciones en el futuro.</p>
</body>
</html>
