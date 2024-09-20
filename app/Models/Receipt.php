<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receipt extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'total_payment',
        'total_price',
        'total_change',
    ];

    protected $searchableFields = ['*'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function receiptProducts()
    {
        return $this->hasMany(ReceiptProduct::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
