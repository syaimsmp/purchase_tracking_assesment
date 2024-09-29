<?php

namespace App\Models;

use App\Observers\PurchaseObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([PurchaseObserver::class])]
class Purchase extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany{
        return $this->hasMany(PurchaseItem::class);
    }
}
