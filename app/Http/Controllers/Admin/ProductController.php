<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Product::with('Categories')->get()
        return view('product.index', [
            'products' => Product::with('Categories')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create',[
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $data = $request->all();

        Product::create($data);

        return redirect(route('admin.product.index'))->with('success', "Data Produk telah berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', [
            'categories' => ProductCategory::all(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductStoreRequest $request, Product $product)
    {
        $data = $request->all();

        $product->update($data);

        return redirect(route('admin.product.index'))->with('success', "Data Produk telah berhasil diperbaharui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('admin.product.index'))->with('success', "Data Produk telah berhasil dihapus!");
    }
}
