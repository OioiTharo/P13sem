<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['USUARIO_ID',  'ENDERECO_ID', 'STATUS_ID', 'PEDIDO_DATA'];
    protected $table = "PEDIDO";
    protected $primaryKey = "PEDIDO_ID";
    public $timestamps = false;

    public function produto(){
        return $this->belongsTo(Produto::class, 'PRODUTO_ID', 'PRODUTO_ID');
    }
    
    public function endereco(){
        return $this->belongsTo(Endereco::class, 'ENDERECO_ID', 'ENDERECO_ID');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'USUARIO_ID', 'USUARIO_ID');
    }
}
