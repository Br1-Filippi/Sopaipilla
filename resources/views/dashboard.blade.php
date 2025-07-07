<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 2rem;
            color: #333;
        }
        .top-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
        .btn-agregar-prueba {
            background-color: #b30000;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn-agregar-prueba:hover {
            background-color: #7a0000;
        }
        .alert-banner {
            background-color: #ffe6e6;
            border: 1px solid #f5c2c2;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 6px rgb(0 0 0 / 0.1);
        }
        .alert-banner h2 {
            margin-top: 0;
            color: #b30000;
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }
        .curso-box {
            background: white;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 15px 20px;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px rgb(0 0 0 / 0.1);
        }
        .curso-box strong {
            display: inline-block;
            width: 90px;
            color: #555;
        }
        ul {
            list-style: none;
            padding-left: 0;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
        li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        li:last-child {
            border-bottom: none;
        }
        input[type="text"] {
            padding: 5px 8px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 180px;
        }
        button {
            background-color: #b30000;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 6px 12px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #7a0000;
        }
        form {
            margin: 0;
        }
        .tema-estudiado {
            color: green;
            font-weight: 600;
        }
        .tema-no-estudiado {
            color: #a00;
            font-weight: 600;
        }
        .tema-editar {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        button.small {
            padding: 4px 8px;
            font-size: 0.9rem;
        }
        .check-label {
            display: flex;
            align-items: center;
            cursor: pointer;
            gap: 8px;
            user-select: none;
        }
    </style>
</head>
<body>

    <div class="top-bar">
        <a href="{{ route('pruebas.create') }}" class="btn-agregar-prueba">+ Agregar nueva prueba</a>
    </div>

@if($pruebasProximas->isNotEmpty())
    <div class="alert-banner">
        <h2>Pruebas próximas</h2>

        @foreach($pruebasProximas as $info)
            <div class="curso-box">
                <div><strong>Curso:</strong> {{ $info['curso'] }}</div>
                <div><strong>Prueba:</strong> {{ $info['prueba'] }}</div>
                <div><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($info['fecha'])->format('d/m/Y H:i') }}</div>

                <ul>
                    @foreach($info['temas'] as $tema)
                        <li>
                            <form method="POST" action="{{ route('temas.toggleEstudiado', $tema->id) }}">
                                @csrf
                                @method('PATCH')
                                <label class="check-label">
                                    <input type="checkbox" onchange="this.form.submit()" {{ $tema->estudiado ? 'checked' : '' }}>
                                    <span class="{{ $tema->estudiado ? 'tema-estudiado' : 'tema-no-estudiado' }}">
                                        {{ $tema->estudiado ? 'Estudiado' : 'No estudiado' }}
                                    </span>
                                </label>
                            </form>

                            <form method="POST" action="{{ route('temas.update', $tema->id) }}" class="tema-editar">
                                @csrf
                                @method('PUT')
                                <input type="text" name="nombre" value="{{ $tema->nombre }}">
                                <button type="submit" class="small">Actualizar</button>
                            </form>

                            <form method="POST" action="{{ route('temas.destroy', $tema->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="small">Eliminar</button>
                            </form>
                        </li>
                    @endforeach
                </ul>

                <form method="POST" action="{{ route('temas.store', $info['prueba_id']) }}">
                    @csrf
                    <input type="text" name="nombre" placeholder="Nuevo tema..." required>
                    <button>Agregar tema</button>
                </form>
            </div>
        @endforeach

    </div>
@else
    <p>No hay pruebas próximas</p>
@endif

</body>
</html>
