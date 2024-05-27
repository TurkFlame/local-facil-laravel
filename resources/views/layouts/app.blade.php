<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Agiota na Mão')</title>
</head>
<body>
    <header>
        <h1>Agiota na mão</h1>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
