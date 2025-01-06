<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\User;



class UserController extends Controller
{
    public function index(){
        
        $users = User::orderbyDesc('id')->get();
        return view('users.index', ['users' => $users]);
    }

    public function create(){
        return view('users.create');
    }

    public function show(User $user){
      return view('users.show', ['user' => $user]);
    }

    public function edit(User $user){
        return view('users.edit', ['user' => $user]);
    }

    public function store(UserRequest $request){
        $request -> validated();
        User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'password' =>$request->password,
        ]);
        return redirect()->route('user.index')->with('success', 'Usuário cadastrado com sucesso!!');

    }

    public function update(UserRequest $request, User $user)
    {
        // Obtém os dados validados
        $data = $request->validated();
    
        // Se a senha foi preenchida, criptografa antes de salvar
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            // Remove a chave 'password' se estiver vazia
            unset($data['password']);
        }
    
        // Atualiza o usuário
        $user->update($data);
    
        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(User $user)
{
    $user->delete();
    return redirect()->route('user.index')->with('success', 'Usuário excluído com sucesso!');
}

    
}