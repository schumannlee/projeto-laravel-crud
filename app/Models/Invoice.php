<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['contract_id', 'amount', 'due_date', 'status'];

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }
}
