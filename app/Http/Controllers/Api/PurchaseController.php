<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseRequest;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index(Request $request) : JsonResponse
    {
        $purchases = Purchase::with('product')
            ->where('user_id', $request->user()->id)
            ->orderBy('purchase_date', 'desc')
            ->get();

        return response()->json($purchases);
    }

    public function store(StorePurchaseRequest $request) : JsonResponse
    {
        $product = Product::findOrFail($request->product_id);

        $total = Purchase::calculateTotal($product, $request->quantity);

        $purchase = Purchase::create([
            'user_id' => $request->user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total' => $total,
            'purchase_date' => $request->purchase_date ?? now(),
        ]);

        return response()->json([
            'message' => 'Purchase created successfully',
            'data' => $purchase->load('product')
        ], 201);
    }
}
