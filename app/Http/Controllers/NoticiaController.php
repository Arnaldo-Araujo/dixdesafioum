<?php
namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller
{
    public function index(Request $request)
    {
        $query = Noticia::where('user_id', auth()->id());

        if ($request->filled('titulo')) {
            $query->where('titulo', 'like', '%' . $request->titulo . '%');
        }

        if ($request->filled('conteudo')) {
            $query->where('conteudo', 'like', '%' . $request->conteudo . '%');
        }

        if ($request->filled('data')) {
            $query->whereDate('created_at', $request->data);
        }

        $noticias = $query->latest()->paginate(10);

        return view('noticias.index', compact('noticias'));
    }

    public function create()
    {
        return view('noticias.create', [
            'pageSlug' => 'noticias',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'   => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);

        Noticia::create([
            'user_id'  => Auth::id(),
            'titulo'   => $request->titulo,
            'conteudo' => $request->conteudo,
        ]);

        return redirect()->route('noticias.index')->with('success', 'Notícia criada com sucesso!');
    }
    // Mostra o formulário de edição
    public function edit($id)
    {
        $noticia = Noticia::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('noticias.edit', compact('noticia'));
    }

// Salva as alterações
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo'   => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);

        $noticia = Noticia::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $noticia->update([
            'titulo'   => $request->titulo,
            'conteudo' => $request->conteudo,
        ]);

        return redirect()->route('noticias.index')->with('success', 'Notícia atualizada com sucesso!');
    }
    public function destroy($id)
    {
        $noticia = Noticia::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $noticia->delete();

        return redirect()->route('noticias.index')->with('success', 'Notícia excluída com sucesso!');
    }
    public function show($id)
    {
        $noticia = Noticia::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('noticias.show', compact('noticia'));
    }

}
