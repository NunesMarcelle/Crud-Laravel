@extends('layouts.admin')

@section('content')

<div class="card" style="max-width: 90%; margin: 20px auto; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px; overflow: hidden;">
    <div class="card-header" style="background-color: #4CAF50; color: white; padding: 20px; text-align: center; font-size: 24px; font-weight: bold;">
        Listar Usuários
    </div>

    <div style="padding: 20px; display: flex; justify-content: space-between; align-items: center;">
        <span style="font-size: 18px; font-weight: bold;">Gerencie seus usuários</span>
        <a href="{{ route('user.create') }}" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px; font-size: 16px;">+ Cadastrar Usuário</a>
    </div>

    @if(session('success'))
    <div style="text-align: center; margin-bottom: 20px;">
        <p style="color: #4CAF50; font-size: 16px; font-weight: bold;">{{ session('success') }}</p>
    </div>
    @endif

    <div style="overflow-x: auto; padding: 0 20px;">
        <table class="table" style="width: 100%; border-collapse: collapse; text-align: left; margin: 0 auto; font-size: 16px;">
            <thead style="background-color: #f4f4f4; color: #333; font-weight: bold; border-bottom: 2px solid #ddd;">
                <tr>
                    <th style="padding: 15px;">ID</th>
                    <th style="padding: 15px;">Nome</th>
                    <th style="padding: 15px;">E-mail</th>
                    <th style="padding: 15px; text-align: center;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 15px;">{{ $user->id }}</td>
                    <td style="padding: 15px;">{{ $user->name }}</td>
                    <td style="padding: 15px;">{{ $user->email }}</td>
                    <td style="padding: 15px; text-align: center;">
                        <a href="{{ route('user.show', ['user' => $user->id]) }}" style="padding: 8px 15px; background-color: #3498DB; color: white; text-decoration: none; border-radius: 5px; margin-right: 5px;">Visualizar</a>
                        <a href="{{ route('user.edit', ['user' => $user->id]) }}" style="padding: 8px 15px; background-color: #FFC107; color: white; text-decoration: none; border-radius: 5px; margin-right: 5px;">Editar</a>
                        <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}" style="display: inline-block;" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 8px 15px; background-color: #E74C3C; color: white; border: none; border-radius: 5px; cursor: pointer;">Apagar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="padding: 15px; text-align: center; color: #777;">Nenhum usuário cadastrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
