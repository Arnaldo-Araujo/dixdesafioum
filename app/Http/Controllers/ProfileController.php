<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'pageSlug' => 'profile',
        ]);
    }

    public function update(Request $request)
    {
        // lógica de update aqui
        return redirect()->route('profile.edit')->with('success', 'Perfil atualizado!');
    }

    public function password(Request $request)
    {
        // lógica de troca de senha aqui
        return back()->with('success', 'Senha alterada com sucesso!');
    }
}
