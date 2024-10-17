<?php

namespace App\Models\Estoque;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstoqueSangues extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;
    protected $table = 'estoque_sangues';

    public function saidas()
    {
        return $this->HasMany(EstoqueSaidas::class, 'id_estoque');
    }
    public function entradas()
    {
        return $this->HasMany(EstoqueEntradas::class, 'id_estoque');
    }

    public function getQuantidadeAtualAttribute($value)
    {
        return $this->entradas->sum('quantidade') - $this->saidas->sum('quantidade');
    }
}
