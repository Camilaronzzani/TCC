<?php

namespace App\Models\Estoque;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstoqueEntradas extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;
    protected $table = 'estoque_sangues_entradas';
}
