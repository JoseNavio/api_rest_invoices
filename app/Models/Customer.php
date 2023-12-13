<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [];

    //Defines the relation in database (Uno a muchos) BelongsTo then goes in child's class
    public function invoices(): HasMany{
        return $this->hasMany(Invoice::class);
    }

}
