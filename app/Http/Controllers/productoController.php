<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;

class productoController extends Controller
{
    public function index(Request $request)
    {
        $productos = producto::latest()->paginate(5);
        return view('producto.index', compact('productos'));
    }

    public function create()
    {
        return view('producto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => ['required', 'numeric', 'decimal:0,2', 'min:0'],
            'stock' => 'required|integer'
        ]);

        producto::create($request->all());
        return redirect()->route('producto.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        $producto = producto::findOrFail($id);
        return view('producto.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => ['required', 'numeric', 'decimal:0,2', 'min:0'],
            'stock' => 'required|integer'
        ]);

        $producto = producto::findOrFail($id);
        $producto->update($validated);
        return redirect()->route('producto.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $producto = producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('producto.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
