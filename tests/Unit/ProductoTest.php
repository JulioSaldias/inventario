<?php

namespace Tests\Unit\Models;

use App\Models\Producto;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductoTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_new_product()
    {
        $producto = Producto::factory()->create();

        $this->assertDatabaseHas('productos', [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
        ]);
    }
}
?>