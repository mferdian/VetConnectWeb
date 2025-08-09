<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'VetConnect')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/vetconnect_icon.png') }}">
    <link rel="icon" type="image/x-icon" sizes="32x32" href="{{ asset('images/vetconnect_icon.png') }}">
    <link rel="icon" type="image/x-icon" sizes="16x16" href="{{ asset('images/vetconnect_icon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/vetconnect_icon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/payment.js', 'resources/js/doctor-page.js', 'resources/js/bootstrap.js', 'resources/js/booking-detail.js'])
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Lottie Animations -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary: #497D74;
            --primary-dark: #3b665d;
            --primary-light: #5a8f85;
            --accent: #f8c537;
        }

        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        .btn-primary {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .text-gradient {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .rating-star {
            color: #fbbf24;
        }

        .specialization-badge {
            background-color: var(--primary-light);
            color: white;
        }
    </style>
</head>

<body class="bg-gray-100">

    @include('layouts._navbar')

    <div class="container mx-auto">
        @yield('content')
    </div>

</body>

</html>
