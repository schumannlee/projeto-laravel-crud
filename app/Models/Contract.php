<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    protected $fillable = ['user_id', 'plan_id', 'start_date', 'status'];

    // Relacionamento: Um contrato pertence a um Usuário
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento: Um contrato pertence a um Plano
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
}
