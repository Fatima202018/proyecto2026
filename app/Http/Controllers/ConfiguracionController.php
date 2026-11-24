<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfiguracionController extends Controller
{
    // Mostrar la configuración de la parroquia
    public function index()
    {
        $configuracion = Configuracion::first();

        return view('configuracion.index', compact('configuracion'));
    }

    // Guardar o actualizar los datos de la parroquia
    
    public function update(Request $request)
    {
        $datos = $request->validate([
            'nombre_parroquia' => 'nullable|string|max:255',
            'nombre_diocesis' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'municipio' => 'nullable|string|max:255',
            'departamento' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:50',
            'correo' => 'nullable|email|max:255',
            'nombre_parroco' => 'nullable|string|max:255',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sello' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Buscar la configuración existente o preparar una nueva
        $configuracion = Configuracion::firstOrNew();

        // Los archivos se procesan por separado
        unset($datos['logo'], $datos['sello']);

        // Guardar los datos institucionales
        $configuracion->fill($datos);

        // Guardar el logo si se seleccionó uno nuevo
        if ($request->hasFile('logo')) {

            $nuevoLogo = $request->file('logo')->store('parroquia', 'public');

            if ($configuracion->logo) {
                Storage::disk('public')->delete($configuracion->logo);
            }

            $configuracion->logo = $nuevoLogo;
        }

        // Guardar el sello si se seleccionó uno nuevo
        if ($request->hasFile('sello')) {

            $nuevoSello = $request->file('sello')->store('parroquia', 'public');

            if ($configuracion->sello) {
                Storage::disk('public')->delete($configuracion->sello);
            }

            $configuracion->sello = $nuevoSello;
        }

        $configuracion->save();

        return redirect()
            ->route('configuracion.index')
            ->with('success', 'Configuración de la parroquia guardada correctamente.');
    }

}
