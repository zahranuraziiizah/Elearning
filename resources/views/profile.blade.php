@php
$nama = "Zahra";
$role = "Admin";
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prolfile</title>
</head>
<body>
    @if($role == 'Admin')
        <h3>Hallo {{ $nama }}, Anda login sebagai administrator.</h3>
    @else
        <h3>Hallo {{ $nama }}.</h3>
    @endif
</body>

</html>