<?php

namespace App\Observers;

use App\Models\Purchase;
use Illuminate\Support\Str;

class PurchaseObserver
{
    public function creating(Purchase $model): void
    {
        $model->user_id = auth()->id();
        $model->invoice_no = Str::uuid();
    }
}
