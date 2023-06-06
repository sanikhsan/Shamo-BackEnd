<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index (Request $request)
    {
        // Get request limit parameter
        $limit = $request->input('limit');

        // Get all Data Product
        $product = Product::with(['Categories', 'Galleries'])->paginate($limit);

        // $price_from = $request->input('price_from');
        // $price_to = $request->input('price_to');

        // Request with parameter filter by ID
        $id = $request->input('id');
        if ($id) {
            $product = Product::with(['Categories', 'Galleries'])->find($id);

            if ($product) {
                return ResponseFormatter::success(
                    $product,
                    'Data produk berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data produk tidak ada',
                    404
                );
            }
        }

        // Request with parameter filter by Name
        $name = $request->input('name');
        if ($name) {
            $product->where('name', 'like', '%' . $name . '%');
        }

        // Request with parameter filter by Description
        $description = $request->input('description');
        if ($description) {
            $product->where('description', 'like', '%' . $description . '%');
        }

        // Request with parameter filter by Tags
        $tags = $request->input('tags');
        if ($tags) {
            $product->where('tags', 'like', '%' . $tags . '%');
        }

        // Request with parameter filter by Categories
        $categories = $request->input('categories');
        if ($categories) {
            $product->where('categories', $categories);
        }

        // Return data products
        return ResponseFormatter::success(
            $product,
            'Semua data produk berhasil diambil'
        );
    }  
}
