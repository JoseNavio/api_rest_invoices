<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'status', 'billed_date', 'paid_date','customer_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
