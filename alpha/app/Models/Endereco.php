<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    protected $fillable = ['ENDERECO_NOME',  'ENDERECO_LOGRADOURO', 'ENDERECO_NUMERO', 'ENDERECO_COMPLEMENTO','ENDERECO_CEP','ENDERECO_CIDADE','ENDERECO_ESTADO', 'USUARIO_ID'];
    protected $table = "ENDERECO";
}
