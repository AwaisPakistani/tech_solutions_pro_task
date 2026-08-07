<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Model, SoftDeletes};

use App\Traits\{ScopeTrait, creator, updator};
#[Fillable(['country', 'item_type', 'sales_channel', 'order_id', 'unit_price', 'total_profit'])]
class Sale extends Model
{
    use ScopeTrait, creator, updator, SoftDeletes;

    protected $fillable = ['country', 'item_type', 'sales_channel', 'order_id', 'unit_price', 'total_profit'];

    public function scopeSearch($query, $search)
    {
        return $query->whereAny(
            ['country', 'item_type','sales_channel', 'order_id', 'unit_price', 'total_profit'],
            'like',
            "%{$search}%"
        );
    }
}
