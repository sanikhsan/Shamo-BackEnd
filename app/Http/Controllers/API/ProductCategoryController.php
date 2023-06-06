<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        // Request Filter Limit / Paginate
        $limit = $request->input('limit');

        // Get All Data Product Category
        $categories = ProductCategory::query()->paginate($limit);

        // Request Get Single Product Categories and the Product Filtered by ID
        $id = $request->input('id');
        if ($id) {
            $categories = ProductCategory::with('Products')->where('id', $id)->paginate($limit);

            if ($categories) {
                return ResponseFormatter::success(
                    $categories,
                    'Data Kategori berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data kategori tidak ada',
                    404
                );
            }
        }

        // Request Get All Product Categories with The Product
        $show_product = $request->input('show_product');
        if ($show_product) {
            $categories = ProductCategory::with('Products')->paginate($limit);
        }

        return ResponseFormatter::success(
            $categories,
            'Data Kategori berhasil diambil.'
        );
    }
}
