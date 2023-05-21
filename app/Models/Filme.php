<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Diretor;
use App\Models\Genero;

class Filme extends Model
{
    use HasFactory;
    protected $table = 'filme';
    public $timestamps = false;

    public function diretor(): BelongsTo
    {
        return $this->belongsTo(Diretor::class);
    }

    public function genero(): BelongsTo
    {
        return $this->belongsTo(Genero::class);
    }
}
