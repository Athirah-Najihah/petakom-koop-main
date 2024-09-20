<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReceiptProduct extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'receipt_id',
        'product_id',
        'name',
        'price',
        'quantity',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'receipt_products';

    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
