@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}" class="text-decoration-none">Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar Usuário</li>
        </ol>
    </nav>

    <!-- Título -->
    <h2 class="mb-4">Cadastrar Usuário</h2>

    <!-- Exibição de Erros -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário de Cadastro -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('user-store') }}" method="POST">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nome completo" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Senha com no mínimo 6 caracteres" required>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('user.index') }}" class="btn btn-secondary me-2">Voltar</a>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
