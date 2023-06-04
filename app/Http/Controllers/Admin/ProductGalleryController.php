<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductGalleryRequest;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        return view('gallery.index', [
            'product' => $product,
            'galleries' => ProductGallery::with('Products')->where('products_id', $product->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('gallery.create', [
            'product' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductGalleryRequest $request, Product $product)
    {
        $filename = Session::get('filename');
        $old_image_path = Session::get('path');
        $new_image_path = 'public/ProductGalleries/'.$filename;
        Storage::move($old_image_path, $new_image_path);

        $data = $request->all();
        $data['products_id'] = $product->id;
        $data['url'] = $new_image_path;

        ProductGallery::create($data);

        // $transaction->update($data);
        return redirect(route('admin.product.gallery.index', $product))->with('success', "Berhasil menambahkan Gambar Produk!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductGallery $gallery)
    {
        $gallery->delete();

        return redirect(route('admin.product.gallery.index', $gallery->products_id))->with('success', "Berhasil menghapus Gambar Produk!");
    }

    /**
     * Store image using Filepond to Storage
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'Product'.'_'.uniqid().'_'.$file->getClientOriginalName();
            $file->storeAs('public/tmp/ProductGalleries/'.$filename);
            $path = 'public/tmp/ProductGalleries/'.$filename;

            Session::put('filename', $filename);
            Session::put('path', $path);
            return 'Berhasil Simpan Gambar Produk!';
        }
    }

    /**
     * Cancel Store image using Filepond from Storage
     */
    public function cancel()
    {
        $deletepath = Session::get('path');
        Storage::delete($deletepath);
        Session::forget('path');
        return 'Gambar dan Session Path berhasil dihapus';
    }
    /**
     * Display the specified resource.
     *
     * public function show(ProductGallery $productGallery)
     * {
     *   //
     * }
     **/

    /**
     * Show the form for editing the specified resource.
     *
     * public function edit(ProductGallery $productGallery)
     * {
     *   // 
     * }
     **/

    /**
     * Update the specified resource in storage.
     *
     * public function update(Request $request, ProductGallery $productGallery)
     * {
     *   //
     * }
     **/
}
