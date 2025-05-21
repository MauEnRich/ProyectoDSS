<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class NotaController extends Controller
{
    public function index()
    {
        // Obtiene las notas del usuario autenticado
        $notas = Nota::where('user_id', Auth::id())->latest()->get();

        // Retorna la vista index con las notas
        return view('index', compact('notas'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
        ]);

        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('notas', 'public');
        }

        Nota::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'imagen' => $rutaImagen,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('notas.index')->with('success', 'Nota creada correctamente.');
    }

    public function edit($id)
    {
        $nota = Nota::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('edit', compact('nota'));
    }

    public function update(Request $request, $id)
    {
        $nota = Nota::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            if ($nota->imagen) {
                Storage::disk('public')->delete($nota->imagen);
            }
            $nota->imagen = $request->file('imagen')->store('notas', 'public');
        }

        $nota->titulo = $request->titulo;
        $nota->contenido = $request->contenido;
        $nota->save();

        return redirect()->route('notas.index')->with('success', 'Nota actualizada.');
    }

    public function destroy($id)
{
    $nota = Nota::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

    // No borramos la imagen ni eliminamos la nota, solo la marcamos como eliminada
    $nota->delete();

    return redirect()->route('notas.index')->with('success', 'Nota movida a la papelera.');
}


    public function descargarPDF($id)
    {
        $nota = Nota::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $pdf = Pdf::loadView('notas.pdf', compact('nota'));
        return $pdf->download('nota_' . $nota->id . '.pdf');
    }


public function papelera()
{
    // Traemos solo las notas eliminadas
    $notasEliminadas = Nota::onlyTrashed()->where('user_id', Auth::id())->get();

    return view('notas.papelera', compact('notasEliminadas'));
}

public function restaurar($id)
{
    $nota = Nota::onlyTrashed()->where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    $nota->restore();

    return redirect()->route('notas.papelera')->with('success', 'Nota restaurada correctamente.');
}

public function eliminarDefinitivo($id)
{
    $nota = Nota::onlyTrashed()->where('id', $id)->where('user_id', Auth::id())->firstOrFail();

    // Si la nota tiene imagen la borramos del storage
    if ($nota->imagen) {
        Storage::disk('public')->delete($nota->imagen);
    }

    $nota->forceDelete(); // Borrado definitivo

    return redirect()->route('notas.papelera')->with('success', 'Nota eliminada definitivamente.');
}

public function toggleFavorito($id)
{
    $nota = Nota::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

    $nota->favorito = !$nota->favorito; // Cambia de true a false o viceversa
    $nota->save();

    return redirect()->back()->with('success', 'Estado de favorito actualizado.');
}

public function favoritos()
{
    $notas = Nota::where('user_id', Auth::id())
                 ->where('favorito', true)
                 ->latest()
                 ->get();

    return view('notas.favoritos', compact('notas'));
}


}
