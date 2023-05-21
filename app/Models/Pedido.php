<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Cliente;
use App\Models\Pedido;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';
  
    public $timestamps = false;

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }
}
