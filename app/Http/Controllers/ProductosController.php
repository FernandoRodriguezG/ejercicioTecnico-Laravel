<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller
{
    public function getAllProducts()
    {
        $productos = Producto::orderBy('nombre')->get();

        return view('welcome', compact('productos'));
    }

    public function addNewProduct(Request $request)
    {
        $producto = New Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = floatval($request->precio);
        $producto->save();
        $productos = Producto::orderBy('nombre')->get();
        return redirect('/');
    }

    public function searchByName(Request $request)
    {
        $search = $request->searchByName;
        $productos = Producto::where('nombre', 'LIKE', "%{$search}%")->orderBy('nombre')->get();
        return view('welcome', compact('productos'));
    }

    public function searchByPriceRange(Request $request)
    {
        $productos = Producto::whereBetween('precio', [floatval($request->precioMin),floatval($request->precioMax)])->orderBy('nombre')->get();
        return view('welcome', compact('productos'));
    }
}
