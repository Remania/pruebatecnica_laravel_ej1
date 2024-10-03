<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::all();
            return response()->json($products);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Error al actualizar el producto.',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:1',
                'stock_quantity' => 'required|integer|min:1',
            ]);
    
            $product = Product::create($validatedData);
    
            return response()->json([
                'message' => 'Producto creado correctamente.',
                'product' => $product
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Error al actualizar el producto.',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $product = Product::find($id);

            if ($product) {
                return response()->json($product);
            } else {
                return response()->json(['message' => 'Producto con ID ' . $id . ' no encontrado'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Error al actualizar el producto.',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $product = Product::find($id);

            if ($product) {
                $validatedData = $request->validate([
                    'name' => 'required|string|max:255',
                    'description' => 'required|string',
                    'price' => 'required|numeric|min:1',
                    'stock_quantity' => 'required|integer|min:1',
                ]);

                $product->update($validatedData);

                return response()->json([
                    'message' => 'Producto actualizado correctamente.',
                    'product' => $product
                ]);
            } else {
                return response()->json(['message' =>  'Producto con ID ' . $id . ' no encontrado'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Error al actualizar el producto.',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::find($id);

            if ($product) {
                $product->delete();
                return response()->json(['message' => 'Producto eliminado correctamente.']);
            } else {
                return response()->json(['message' => 'Producto con ID ' . $id . ' no encontrado'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Error al actualizar el producto.',
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
