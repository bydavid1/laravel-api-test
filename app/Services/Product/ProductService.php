<?php

namespace App\Services\Product;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function getProduct(int $id) : Product
    {
        return Product::findOrFail($id);
    }

    public function getProducts() : LengthAwarePaginator
    {
        return Product::paginate();
    }

    public function searchProducts(string $query) : LengthAwarePaginator
    {
        return Product::where(DB::raw('BINARY `name`'), 'like', "%{$query}%")
        ->orWhere(DB::raw('BINARY `SKU`'), 'like', "%{$query}%")
        ->paginate();
    }

    public function storeProduct(array $data) : Product
    {
        $body = [
            'sku' => $data['sku'],
            'name' => $data['name'],
            'quantity' => $data['quantity'],
            'price' => $data['price'],
            'description' => $data['description'],
        ];

        //If image exists then save
        if (array_key_exists('image', $data) && $data['image'] != null) {
            $body['image'] = Storage::putFile('images', $data['image']);
        }

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

        //If image exists then save
        if (array_key_exists('image', $data) && $data['image'] != null) {
            //delete last image
            if ($product->image != null) Storage::delete($product->image);

            $body['image'] = Storage::putFile('images', $data['image']);
        }

        return $product->update($body);
    }

    public function deleteProduct(Product $product) : bool
    {
        return $product->delete();
    }
}
