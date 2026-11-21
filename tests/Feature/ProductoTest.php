<?php

use App\Models\User;
use App\Models\producto;

test('authenticated user can view the product edit form', function () {
    $user = User::factory()->create();
    $producto = producto::create([
        'nombre' => 'Producto original',
        'descripcion' => 'Descripción original',
        'precio' => 12.50,
        'stock' => 4,
    ]);

    $response = $this
        ->actingAs($user)
        ->get(route('producto.edit', $producto->id));

    $response
        ->assertOk()
        ->assertSee('Producto original')
        ->assertSee('Descripción original');
});

test('authenticated user can update an existing product', function () {
    $user = User::factory()->create();
    $producto = producto::create([
        'nombre' => 'Producto original',
        'descripcion' => 'Descripción original',
        'precio' => 12.50,
        'stock' => 4,
    ]);

    $response = $this
        ->actingAs($user)
        ->put(route('producto.update', $producto->id), [
            'nombre' => 'Producto actualizado',
            'descripcion' => 'Nueva descripción',
            'precio' => 25.75,
            'stock' => 8,
        ]);

    $response->assertRedirect(route('producto.index'));

    $this->assertDatabaseHas('productos', [
        'id' => $producto->id,
        'nombre' => 'Producto actualizado',
        'descripcion' => 'Nueva descripción',
        'precio' => 25.75,
        'stock' => 8,
    ]);
});
