<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; } /* Fontos az ékezetekhez! */
        .header { text-align: center; color: #333; }
        .content { margin-top: 20px; border: 1px solid #ccc; padding: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $title }}</h1>
    </div>
    <div class="content">
        <p>Ez egy teszt PDF fájl, amit a Laravel generált.</p>
        <p>Dátum: <strong>{{ $date }}</strong></p>
        <p>Generálta: <strong>{{ $user }}</strong></p>
    </div>
</body>
</html>