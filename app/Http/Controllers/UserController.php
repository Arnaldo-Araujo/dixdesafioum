<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', [
            'users'    => $users,
            'pageSlug' => 'users',
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user'     => $user,
            'pageSlug' => 'users',
        ]);
    }

    public function update(Request $request, User $user)
    {
        // lógica para atualizar usuário
        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Usuário removido!');
    }
}
