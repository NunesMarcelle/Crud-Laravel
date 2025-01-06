@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}" class="text-decoration-none">Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizar Usuário</li>
        </ol>
    </nav>

    <!-- Título -->
    <h2 class="mb-4">Visualizar Usuário</h2>

    <!-- Informações do Usuário -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title">Detalhes do Usuário</h5>
            <p class="card-text"><strong>ID:</strong> {{ $user->id }}</p>
            <p class="card-text"><strong>Nome:</strong> {{ $user->name }}</p>
            <p class="card-text"><strong>E-mail:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Cadastrado:</strong> {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}</p>
            <p class="card-text"><strong>Editado:</strong> {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>

    <!-- Ações -->
    <div class="d-flex justify-content-end">
        <a href="{{ route('user.index') }}" class="btn btn-secondary me-2">Voltar</a>
        <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-warning me-2">Editar</a>
        <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Apagar</button>
        </form>
    </div>
</div>
@endsection
