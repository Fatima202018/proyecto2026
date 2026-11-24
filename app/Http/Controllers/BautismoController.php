<?php

namespace App\Http\Controllers;

use App\Models\Bautismo;
use Illuminate\Http\Request;
use App\Models\Configuracion;
use Barryvdh\DomPDF\Facade\Pdf;

class BautismoController extends Controller
{
    // Mostrar todas las partidas de bautismo
    
public function index(Request $request)
{
    $buscar = trim($request->input('buscar', ''));

    $consulta = Bautismo::query();

    if ($buscar !== '') {
        $terminos = preg_split('/\s+/', $buscar, -1, PREG_SPLIT_NO_EMPTY);

        $consulta->where(function ($query) use ($terminos) {
            foreach ($terminos as $termino) {
                $query->where(function ($subquery) use ($termino) {
                    $subquery->where('nombres', 'like', "%{$termino}%")
                        ->orWhere('apellidos', 'like', "%{$termino}%");
                });
            }
        });
    }

    $bautismos = $consulta->latest()
    ->paginate(10)
    ->withQueryString();

return view('bautismos.index', compact('bautismos', 'buscar'));
}


    // Mostrar formulario para registrar un bautismo
    public function create()
    {
        return view('bautismos.create');
    }

    // Guardar una nueva partida
    public function store(Request $request)
    {
        $datos = $request->validate([
            'numero_partida' => 'required|string|max:50',
            'libro' => 'nullable|string|max:50',
            'folio' => 'nullable|string|max:50',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'sexo' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'lugar_nacimiento' => 'nullable|string|max:255',
            'fecha_bautismo' => 'required|date',
            'lugar_bautismo' => 'nullable|string|max:255',
            'nombre_padre' => 'nullable|string|max:255',
            'nombre_madre' => 'nullable|string|max:255',
            'nombre_padrino' => 'nullable|string|max:255',
            'nombre_madrina' => 'nullable|string|max:255',
            'ministro_celebrante' => 'nullable|string|max:255',
            'observaciones' => 'nullable|string',
            'notas_marginales' => 'nullable|string',
        ]);

        Bautismo::create($datos);

        return redirect()
            ->route('bautismos.index')
            ->with('success', 'Partida de bautismo registrada correctamente.');
    }

    // Mostrar formulario para editar una partida
    public function edit($id)
    {
        $bautismo = Bautismo::findOrFail($id);

        return view('bautismos.edit', compact('bautismo'));
    }

    // Actualizar una partida existente
    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'numero_partida' => 'required|string|max:50',
            'libro' => 'nullable|string|max:50',
            'folio' => 'nullable|string|max:50',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'sexo' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'lugar_nacimiento' => 'nullable|string|max:255',
            'fecha_bautismo' => 'required|date',
            'lugar_bautismo' => 'nullable|string|max:255',
            'nombre_padre' => 'nullable|string|max:255',
            'nombre_madre' => 'nullable|string|max:255',
            'nombre_padrino' => 'nullable|string|max:255',
            'nombre_madrina' => 'nullable|string|max:255',
            'ministro_celebrante' => 'nullable|string|max:255',
            'observaciones' => 'nullable|string',
            'notas_marginales' => 'nullable|string',
        ]);

        $bautismo = Bautismo::findOrFail($id);

        $bautismo->update($datos);

        return redirect()
            ->route('bautismos.index')
            ->with('success', 'Partida de bautismo actualizada correctamente.');
    }
    // Eliminar una partida de bautismo
public function destroy($id)
{
    $bautismo = Bautismo::findOrFail($id);

    $bautismo->delete();

    return redirect()
        ->route('bautismos.index')
        ->with('success', 'Partida de bautismo eliminada correctamente.');
}
    // Mostrar el detalle completo de una partida
    public function show($id)
    {
        $bautismo = Bautismo::findOrFail($id);

        return view('bautismos.show', compact('bautismo'));
    }

    public function pdf($id)
{
    $bautismo = Bautismo::findOrFail($id);
    $configuracion = Configuracion::first();

    $pdf = Pdf::loadView('bautismos.pdf', compact(
        'bautismo',
        'configuracion'
    ));

    $pdf->setPaper('A4', 'portrait');

    return $pdf->stream(
        'partida-bautismo-' . $bautismo->numero_partida . '.pdf'
    );
}

}
