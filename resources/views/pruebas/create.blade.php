<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar nueva prueba</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
            background: #f9f9f9;
            color: #333;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 450px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
        }
        input, select {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }
        button {
            margin-top: 20px;
            background-color: #b30000;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 700;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #7a0000;
        }
        .error {
            color: red;
            margin-top: 5px;
            font-size: 0.9rem;
        }
        .back-link {
            margin-bottom: 20px;
            display: inline-block;
            color: #b30000;
            text-decoration: none;
            font-weight: 600;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <a href="{{ route('dashboard') }}" class="back-link">&larr; Volver al panel</a>

    <h1>Agregar nueva prueba</h1>

    <form method="POST" action="{{ route('pruebas.store') }}">
        @csrf

        <label for="curso_id">Curso</label>
        <select name="curso_id" id="curso_id" required>
            <option value="">-- Selecciona un curso --</option>
            @foreach($cursos as $curso)
                <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>
                    {{ $curso->nombre }}
                </option>
            @endforeach
        </select>
        @error('curso_id')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="nombre">Nombre de la prueba</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
        @error('nombre')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="fecha">Fecha y hora de la prueba</label>
        <input type="datetime-local" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
        @error('fecha')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Crear prueba</button>
    </form>
</body>
</html>
