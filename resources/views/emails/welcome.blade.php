<!DOCTYPE html>
<html>
<head>
    <title>Üdvözlünk!</title>
</head>
<body>
    <h1>Szia, {{ $user->name }}!</h1>
    <p>Sikeresen regisztráltak a rendszerbe.</p>
    <p>A belépéshez szükséges adataid:</p>
    <ul>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>Jelszó:</strong> {{ $password }}</li>
    </ul>
    <p>Kérjük, az első belépés után változtasd meg a jelszavad!</p>
</body>
</html>