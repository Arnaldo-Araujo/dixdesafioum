<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $user = auth()->user();

        $request->validate([
            'name'             => 'required|string|max:255',
            'foto'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'current_password' => 'nullable|required_with:new_password|string',
            'new_password'     => 'nullable|string|min:6|confirmed',
            'theme_color'      => 'nullable|in:primary,blue,green,pink-purple',
        ]);

        $user->name = $request->name;

        // Atualizar a cor do tema
        if ($request->filled('theme_color')) {
            $user->theme_color = $request->theme_color;
        }

        // Atualizar a foto
        if ($request->hasFile('foto')) {
            // Apagar a foto antiga se existir
            if ($user->foto && file_exists(public_path($user->foto))) {
                unlink(public_path($user->foto));
            }

            $imagem        = $request->file('foto');
            $nomeImagem    = uniqid() . '.' . $imagem->getClientOriginalExtension();
            $caminhoImagem = 'uploads/fotos/' . $nomeImagem;
            $imagem->move(public_path('uploads/fotos'), $nomeImagem);

            $user->foto = $caminhoImagem;
        }

        // Atualizar senha se necessário
        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (! Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'A senha atual está incorreta.']);
            }

            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
    }

    public function password(Request $request)
    {
        // lógica de troca de senha aqui
        return back()->with('success', 'Senha alterada com sucesso!');
    }
    public function removerFoto()
    {
        $user = auth()->user();

        if ($user->foto && file_exists(public_path($user->foto))) {
            unlink(public_path($user->foto));
        }

        $user->foto = null;
        $user->save();

        return redirect()->back()->with('success', 'Foto de perfil removida com sucesso!');
    }
    public function updateFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = auth()->user();

        // Remove a foto antiga se existir
        if ($user->foto && file_exists(public_path($user->foto))) {
            unlink(public_path($user->foto));
        }

        // Salva a nova foto
        $imagem        = $request->file('foto');
        $nomeImagem    = uniqid() . '.' . $imagem->getClientOriginalExtension();
        $caminhoImagem = 'uploads/fotos/' . $nomeImagem;
        $imagem->move(public_path('uploads/fotos'), $nomeImagem);

        $user->foto = $caminhoImagem;
        $user->save();

        return redirect()->back()->with('success', 'Foto de perfil atualizada com sucesso!');
    }

}
