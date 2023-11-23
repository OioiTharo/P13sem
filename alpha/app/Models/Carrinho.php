<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Carrinho extends Model
{
    use HasFactory;
    protected $fillable = ['USUARIO_ID',  'PRODUTO_ID', 'ITEM_QTD'];
    protected $table = "CARRINHO_ITEM";
    public $timestamps = false;
    //protected $primaryKey = ['USUARIO_ID', 'PRODUTO_ID'];

    public function produto(){
        return $this->belongsTo(Produto::class, 'PRODUTO_ID', 'PRODUTO_ID');
    }

    protected function setKeysForSaveQuery($query){
        return $query->where('USUARIO_ID', $this->getAttribute('USUARIO_ID'))
                     ->where('PRODUTO_ID', $this->getAttribute('PRODUTO_ID'));
    }
}
