<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>CRUD</title>
</head>
<body>
    <header class="p-3 text-bg-primary">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Logo">
                        <use xlink:href="#bootstrap" />
                    </svg>
                    <span class="fs-4">CRUD Sistema</span>
                </a>

                <ul class="nav col-12 col-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Usuários</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Configurações</a></li>
                </ul>

                <div class="text-end">
                    <button type="button" class="btn btn-light me-2">Login</button>
                    <button type="button" class="btn btn-warning">Logout</button>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-4">
        @yield('content')
    </div>

   
</body>
</html>
