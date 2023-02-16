<?php

namespace App\Services\Product;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function getProduct(int $id) : Product
    {
        return Product::findOrFail($id);
    }

    public function getProducts() : Collection
    {
        return Product::all();
    }

    public function searchProducts(string $query) : Collection
    {
        return Product::where(DB::raw('BINARY `name`'), 'like', "%{$query}%")
        ->orWhere(DB::raw('BINARY `SKU`'), 'like', "%{$query}%")
        ->get();
    }

    public function storeProduct(array $data) : Product
    {
        $body = [
            'sku' => $data['sku'],
            'name' => $data['name'],
            'quantity' => $data['quantity'],
            'price' => $data['price'],
            'description' => $data['description']
        ];

        return Product::create($body);
    }

    public function updateProduct(Product $product, array $data) : bool
    {
        $body = [
            'sku' => $data['sku'],
            'name' => $data['name'],
            'quantity' => $data['quantity'],
            'price' => $data['price'],
            'description' => $data['description']
        ];

        return $product->update($body);
    }

    public function deleteProduct(Product $product) : bool
    {
        return $product->delete();
    }
}
