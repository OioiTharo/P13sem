<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoImagem extends Model
{
    use HasFactory;
    protected $fillable = ['IMAGEM_URL',  'PRODUTO_ID'];
    protected $table = "PRODUTO_IMAGEM";
}
