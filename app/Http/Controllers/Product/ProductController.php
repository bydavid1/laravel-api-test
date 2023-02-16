<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
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
        return $this->responseSuccess(data: $this->productService->getProducts());
    }

    public function search(Request $request) {
        return $this->responseSuccess(data: $this->productService->searchProducts($request->input('query')));
    }

    public function store(StoreProductRequest $request)
    {
        $user = $this->productService->storeProduct(data: $request->validated());

        return $this->responseSuccess(data: $user, message: 'Producto creado exitosamente');
    }

    public function update(UpdateProductRequest $request, int $id)
    {
        return $this->responseSuccess(
            data: $this->productService->updateProduct(
                product: $this->productService->getProduct($id),
                data: $request->validated()
            ),
            message: 'Producto actualizado exitosamente');
    }

    public function destroy(int $id)
    {
        return $this->responseSuccess(
            data: $this->productService->deleteProduct(
                product: $this->productService->getProduct($id)
            ),
            message: 'Producto eliminado exitosamente');
    }
}
