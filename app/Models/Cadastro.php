<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "cadastros";


    public function agendamento()
    {
        return $this->hasMany(AgendamentoDoacao::class, 'id_cadastros', 'id');
    }
}
