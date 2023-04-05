<?php

namespace App\Http\Controllers;

use App\DatabaseJson\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View|ApplicationAlias|Factory|Application
     */
    public function index(): View|ApplicationAlias|Factory|Application
    {
        $products = Product::orderBy('id','DESC')->all();

        return view('products.index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): JsonResponse
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = (int)$request->price;
        $product->quantity = (int)$request->quantity;
        $product->save();

        $tableRow = view('products.table-row', compact('product'))->render();

        return response()->json(['status' => 'success', 'row' => $tableRow]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);

        return response()->json(['product' => $product->toArray()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        Product::update([
            'name' => $request->name,
            'price' => (int)$request->price,
            'quantity' => (int)$request->quantity
            ],$id);

        return response()->json(['status' => 'success']);
    }
}
