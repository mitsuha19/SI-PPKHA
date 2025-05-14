<!-- resources/views/layouts/auth.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth - CAIS</title>
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;

        }

        .container {
            display: flex;
            flex-direction: row;
            min-height: 100vh;
        }

        .image-section, .form-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .image-section img {
            width: 80%;
            max-width: 500px;
            height: auto;
            border-radius: 10px;
        }

        .form-section {
            flex-direction: column;
        }

        .tab-switch {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .tab-switch a {
            padding: 0.5rem 1rem;
            border: 1px solidrgb(249, 251, 252);
            border-radius: 25px;
            text-decoration: none;
            color:rgb(249, 250, 251);
        }

        .tab-switch a.active {
            background-color:rgb(249, 250, 251);
            color:rgb(43, 100, 161);
        }

        .form-wrapper {
            width: 100%;
            max-width: 400px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .image-section,
            .form-section {
                width: 100%;
                padding: 1.5rem;
            }

            .image-section img {
                max-width: 200px;
            }

            .form-wrapper {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-section">
            <img src="{{ asset('assets/images/CAISIMG.png') }}" alt="CAIS">
        </div>
        <div class="form-section">
            <div class="tab-switch">
                <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
                <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">Registrasi</a>
            </div>
            <div class="form-wrapper">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
