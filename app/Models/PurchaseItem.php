<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseItem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function product(): BelongsTo{
        return $this->belongsTo(Product::class);
    }

    public function purchase(): BelongsTo{
        return $this->belongsTo(Purchase::class);
    }

}
