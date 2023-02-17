<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Services\Product\ProductService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponse;

    public function __construct(
        private ProductService $productService
    )
    {

    }

    public function list() {
        return ProductCollection::make($this->productService->getProducts());
    }

    public function search(Request $request) {
        return ProductCollection::make($this->productService->searchProducts($request->input('query')));
    }

    public function store(StoreProductRequest $request)
    {
        $this->productService->storeProduct(data: $request->validated());

        return $this->responseSuccess(message: 'Producto creado exitosamente', statusCode: 201);
    }

    public function update(UpdateProductRequest $request, int $id)
    {
        $this->productService->updateProduct(product: $this->productService->getProduct($id),data: $request->validated());
        return $this->responseSuccess(message: 'Producto actualizado exitosamente');
    }

    public function destroy(int $id)
    {
        $this->productService->deleteProduct(product: $this->productService->getProduct($id));

        return $this->responseSuccess(message: 'Producto eliminado exitosamente');
    }
}
