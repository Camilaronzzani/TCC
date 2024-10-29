<?php
namespace App\Models\Estoque;

use App\Models\TipoSanguineo;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstoqueSangues extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'estoque_sangues';

    public function tipos()
    {
        return $this->belongsTo(TipoSanguineo::class, 'id_tipo_sanguineo', 'id');
    }

    public function saidas()
    {
        return $this->hasMany(EstoqueSaidas::class, 'id_estoque');
    }

    public function entradas()
    {
        return $this->hasMany(EstoqueEntradas::class, 'id_estoque');
    }

    public function getQuantidadeAtualAttribute()
    {
        // Garante que as relações estão carregadas
        $this->loadMissing('entradas', 'saidas');

        return $this->entradas->sum('quantidade') - $this->saidas->sum('quantidade');
    }

    public function getStatusAttribute()
    {
        $quantidadeAtual = $this->quantidade_atual;

        if ($quantidadeAtual >= 1000) {
            return 'Estável';
        } elseif ($quantidadeAtual >= 500) {
            return 'Alerta';
        } else {
            return 'Crítico';
        }
    }
}
