<?php

namespace App\Http\Controllers\API\v1;

use App\Actions\Purchase\StorePurchaseAction;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Resources\PurchaseResource;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {       
        $purchase = (new StorePurchaseAction)->execute($request->validated());

        return response($purchase);
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        return new PurchaseResource($purchase);
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
