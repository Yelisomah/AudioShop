<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audiophile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- <main>
        <x-navbar />

        
        <section class="main">
            @yield('content')
        </section>
            
        <x-footer />
    </main> -->

    @include('components.navbar')

    @yield('content')

    @include('components.footer')
</body>
</html>