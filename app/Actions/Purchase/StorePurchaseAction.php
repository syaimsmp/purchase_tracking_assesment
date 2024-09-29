<?php
namespace App\Actions\Purchase;

use App\Models\Purchase;

class StorePurchaseAction{
    public function execute(array $request):Purchase{
        
        $purchase = Purchase::create($request);

        $purchase->items()->createMany(
            array_map(fn($item) => [
                'product_id' => $item['id'],
            ], $request['items'])
        );

        return $purchase;
    }
}