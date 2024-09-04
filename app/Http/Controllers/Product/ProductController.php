<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFilterRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductFilterService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductFilterService $productFilterService;

    public function __construct(ProductFilterService $productFilterService)
    {
        $this->productFilterService = $productFilterService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(ProductFilterRequest $request)
    {

        $query = Product::with('properties');

        // Применение фильтров через сервис
        if ($request->has('properties')) {
            $query = $this->productFilterService->applyFilters($query, $request->input('properties'));
        }

        $perPage = $request->input('per_page', 40);
        $products = $query->paginate($perPage);

        // Проверка, есть ли результаты фильтрации
        if ($products->isEmpty()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Не найдено товаров, соответствующих вашим критериям.',
            ], 200);
        }

        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
