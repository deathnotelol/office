<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'inventoryName',
        'inventory_category_id',
        'instock',
        'good',
        'fair',
        'bad',
        'total',
        'remark',
    ];

    public function category()
    {
        return $this->belongsTo(InventoryCategory::class, 'inventory_category_id');
    }

}
