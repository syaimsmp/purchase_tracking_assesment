<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Resources\PurchaseResource;
use App\Http\Requests\Purchase\StoreRequest;
use App\Actions\Purchase\StorePurchaseAction;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;

class PurchaseController extends Controller
{
    public function create()
    {
        return Inertia::render('Purchase/Form', [
            'availableItems' => Product::select('id', 'name', 'price')->get(),
            'status' => session('status'),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {       
        $purchase = (new StorePurchaseAction)->execute($request->validated());

        return Redirect::route('purchases.show', $purchase->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        $purchase->load('user', 'items', 'items.product');
        return Inertia::render('Purchase/Show', [
            'purchase' => $purchase,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
