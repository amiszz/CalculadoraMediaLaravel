<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escolar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

        <nav class="navbar navbar-expand-lg navbar-dark bg-black shadow-sm">

        <div class="container">

            <a class="navbar-brand fw-bold"
            href="/turmas">

                <i class="bi bi-mortarboard-fill"></i>

                GestãoEscolar

            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#menu">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse"
                id="menu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item mx-2">

                        <a href="/turmas"
                        class="nav-link btn btn-dark text-white px-3">

                            <i class="bi bi-building"></i>

                            Turmas

                        </a>

                    </li>

                    <li class="nav-item mx-2">

                        <a href="/alunos"
                        class="nav-link btn btn-dark text-white px-3">

                            <i class="bi bi-people"></i>

                            Alunos

                        </a>

                    </li>

                    <li class="nav-item mx-2">

                        <a href="/notas"
                        class="nav-link btn btn-dark text-white px-3">

                            <i class="bi bi-journal-check"></i>

                            Notas

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>


    <div class="container mt-5">

        @if(session('sucesso'))
            <div class="alert alert-success">
                {{ session('sucesso') }}
            </div>
        @endif

        @if(session('erro'))
            <div class="alert alert-danger">
                {{ session('erro') }}
            </div>
        @endif

        @yield('content')

    </div>

</body>
</html>